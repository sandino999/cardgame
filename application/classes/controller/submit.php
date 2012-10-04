<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Submit extends Controller {
		

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->view = view::factory('cardview');
		$this->nocards = view::factory('nocards');
		$this->buy = view::factory('buy');
		$this->regview = view::factory('registerview');
	}
	
	public function action_index()
	{
		if(isset($_POST['btnreg']))
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
		  	
			$return = $this->model->register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email);
		    if($return == false)
			{
			  $this->response->body($this->regview);
			}
		   
		}

		elseif(isset($_POST['btnlogin']))
		{
		   $user=$_POST['txtuser'];
		   $pass=$_POST['txtpass'];
		   
		   $id=$this->model->login($user,$pass);
		   session::instance()->set('id',$id);		  		   
		  
			  $this->check_owning($id);	   
		}
		elseif(isset($_POST['btnbuy']))
		{
		  $card_info = $this->model->get_card_info();
		  $this->buy->bind('card_info',$card_info);
		  $this->response->body($this->buy);
		}
		elseif(isset($_POST['btnback']))
		{
		  $this->request->redirect('index.php/mycardlist');
		}
		elseif(isset($_POST['btnregister']))
		{
		  $this->request->redirect('index.php/register');
		}
	}
	
	public function check_owning($id)
	{
		$card_owning = $this->model->check_card_owning($id);
		
		if($card_owning==true)
		{  
		  $this->request->redirect('index.php/sort');
		}
		else
		{
		$this->response->body($this->nocards);	
		}
			
	}
	


} 
