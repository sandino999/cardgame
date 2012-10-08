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
		$this->nocards = view::factory('nocards');
		$this->pass_send = view::factory('password_sent');
		$this->wrong_secret_ans = view::factory('messages/wrong_secret_answer');
		$this->display = view::factory('cardview');
		$this->change_password = view::factory('change_password');
	}
	
	public function action_login()
	{
	
		$username=$_POST['txtuser'];
		$password=$_POST['txtpass'];
		
		$id = $this->model->login($username,$password);
		   
		if($id == false)
		{
			$this->response->body($this->login);
		}
		else
		{
			session::instance()->set('id',$id);		  		   
			$this->check_owning($id);
		}
	}
	
	
	public function action_register()
	{
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
			
		$confirm_register = $this->register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,
											$contact,$addr,$email);	

		if($confirm_register == true)
		{
			$this->response->body($this->login);
		}
		
	}
	
	
	public function action_forgot_password()
	{
		$this->response->body($this->forgot);
	}
	
	public function register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{
		$return = $this->model->register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email);
		    
		if($return == false)
		{
			$this->response->body($this->regview);
		}
	}
	
	public function check_owning($id)
	{
		$card_owning = $this->model->check_card_owning($id);
		
		if($card_owning==true)
		{
			$initial_display = $this->model->get_list($id);
			$view = $this->display->bind('card_list',$initial_display);
			$this->response->body($this->display);
		}
		else
		{
			$this->response->body($this->nocards);	
		}
			
	}
	
	public function action_secret_question()
	{	
		$session=Session::instance();
		$session->set('email',$_POST['txtemail']);
	
		 
		$check = $this->model->check_if_email_exists($_POST['txtemail']);
			
		if($check == false)
		{
			$type=1;
			$message = $this->model->message($type);
			$this->response->body($this->forgot);		
		}
		else
		{
			$secret_question = $this->model->get_secret_question($_POST['txtemail']);
			$this->secret_question->bind('secret',$secret_question);
			$this->response->body($this->secret_question);
		}
	}
	
	public function action_confirm_secret_question()
	{
		$result = $this->model->confirm_secret_question_ans($_POST['txtsecret'],$_POST['email']);	
			
			if($result == true )
			{
				$this->model->send_password($_POST['email']);
					
			}
			else
			{
				$type=2;
				$this->model->message($type);
				
				$email = session::instance()->get('email');
				$secret_question = $this->model->get_secret_question($email);
				$this->secret_question->bind('secret',$secret_question);
				$this->response->body($this->secret_question);
				
			}
	}
	
	public function action_change_password($id)
	{	
		$this->change_password->bind('id',$id);
		$this->response->body($this->change_password);		
	}
	
	public function action_validate_password()
	{
	
		$id = $this->request->param('id');
			
		$validate = $this->model->validate_new_password($_POST['password'],$_POST['confirmpassword'],$id);
		
		if($validate == false)
		{
			$this->change_password->bind('id',$id);
			$this->response->body($this->change_password);	
		}
		else
		{
		
		}
	
		
	}
	
} 
