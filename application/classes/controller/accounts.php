<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Accounts extends Controller{

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->regview = view::factory('registerview');
		$this->login = view::factory('loginview');
		$this->forgot = view::factory('forgot_password');
		$this->secret_question = view::factory('secret_question');
		$this->email_not_exists_view = view::factory('email_not_exists');
		$this->secret_question = view::factory('secret_question');
		$this->no_cards = view::factory('nocards');
		$this->pass_send = view::factory('messages/password_sent');
		$this->wrong_secret_ans = view::factory('messages/wrong_secret_answer');
		$this->display = view::factory('cardview');
		$this->change_password = view::factory('change_password');
		$this->register_success = view::factory('messages/register_succesful');
		
	}
	
	public function action_login()
	{
		$username=$_POST['txtuser'];
		$password=$_POST['txtpass'];
			
		$id = $this->model->login($username,$password);
		$message = $this->model->get_error_message_for_login($username,$password);   
		$this->login->bind('message',$message);
		
		if($id == false)
		{
			$this->response->body($this->login);
		}
		else
		{
			session::instance()->set('username',$username);
			session::instance()->set('id',$id);
			$this->check_owning($id);
		}
	}
	
	public function action_logout()
	{
		session::instance()->destroy();
		$this->request->redirect('index.php/mycardlist');
	}	
	
	public function action_not_logged()
	{
		$type=10;
		$error_message = $this->model->message($type);
		$this->login->bind('message',$error_message);
		$this->response->body($this->login);
	}
	
	public function action_register()
	{
		$message=null;
		$this->regview->bind('message',$message);
		$this->response->body($this->regview);
	}
	
	public function action_confirm()
	{	
		$fname=$_POST['txtfname'];
		$mname=$_POST['txtmname'];
		$lname=$_POST['txtlname'];
		$user=$_POST['txtuser'];
		$pass=$_POST['txtpass'];
		$retype=$_POST['txtretype'];
		$secret=$_POST['secret_question'];
		$ans=$_POST['txtans'];
		$contact=$_POST['txtcontact'];
		$addr=$_POST['txtaddr'];
		$email=$_POST['txtemail'];
			
		$this->register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,
											$contact,$addr,$email);		
	}
	
	
	public function action_forgot_password()
	{	
		$message=null;
		$this->forgot->bind('message',$message);
		$this->response->body($this->forgot);
	}
	
	public function action_user()
	{
		$id = session::instance()->get('id');
		$this->check_owning($id);
	}
	
	public function register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{
		$error_message = $this->model->validate_register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email);
		
		if($error_message != null)
		{	
			$this->regview->bind('message',$error_message);
			$this->response->body($this->regview);
		}
		else
		{
			$this->model->register_to_db($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email);
			$this->response->body($this->register_success);
		}
	}
	
	public function check_owning($id)
	{	
		$card_owning = $this->model->check_card_owning($id);
		
		if($card_owning==true)
		{
			$initial_display = $this->model->get_list($id);
			$view = $this->display->bind('card_list',$initial_display)->bind('id',$id);
			$this->response->body($this->display);
		}
		else
		{	
			$this->no_cards->bind('id',$id);
			$this->response->body($this->no_cards);	
		}	
	}
	
	public function action_secret_question()
	{	
		$session=Session::instance();
		$session->set('email',$_POST['txtemail']);
	
		$validate = $this->model->validate_email($_POST['txtemail']);
			
		if($validate == false)
		{
			$type=1;
			$message = $this->model->message($type);
			$this->forgot->bind('message',$message);
			$this->response->body($this->forgot);		
		}
		else
		{
			$message=null;
			$secret_question = $this->model->get_secret_question($_POST['txtemail']);
			$this->secret_question->bind('secret',$secret_question)->bind('message',$message);
			$this->response->body($this->secret_question);
		}
	}
	
	public function action_confirm_secret_question()
	{
		$validate = $this->model->confirm_secret_question_ans($_POST['txtsecret'],$_POST['email']);	
			
			if($validate == true )
			{
				$this->model->send_password($_POST['email']);	
				$this->response->body($this->pass_send);
			}
			else
			{
				$type=2;
				$message = $this->model->message($type);
				
				$email = session::instance()->get('email');
				$secret_question = $this->model->get_secret_question($email);
				$this->secret_question->bind('secret',$secret_question)->bind('message',$message);
				$this->response->body($this->secret_question);
				
			}
	}
	
	public function action_change_password($id)
	{	
		$message=null;
		$this->change_password->bind('id',$id)->bind('message',$message);
		$this->response->body($this->change_password);		
	}
	
	public function action_validate_password()
	{
		$id = $this->request->param('id');
		$password = $_POST['password'];
		$confirm_password = $_POST['confirmpassword'];
			
		$error_message = $this->model->validate_new_password($password,$confirm_password,$id);
			
		if($error_message != null)
		{
			$this->change_password->bind('id',$id)->bind('message',$error_message);
			$this->response->body($this->change_password);	
		
		}
		else
		{	
			$this->model->reset_password($id,$password);	
		}	
	}
	
} 
