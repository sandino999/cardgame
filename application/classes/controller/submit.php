<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Submit extends Controller {
	
	private $model;

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
	}
	
	public function action_index()
	{
		if(isset($_GET['btnreg']))
		{
			$fname=$_GET['txtfname'];
			$mname=$_GET['txtmname'];
			$lname=$_GET['txtlname'];
			$user=$_GET['txtuser'];
			$pass=$_GET['txtpass'];
			$contact=$_GET['txtcontact'];
			$addr=$_GET['txtaddr'];
			$email=$_GET['txtemail'];
		
			$this->model->register($fname,$mname,$lname,$user,$pass,$contact,$addr,$email);
		}
		elseif(isset($_GET['btnlogin']))
		{
		   $user=$_GET['txtuser'];
		   $pass=$_GET['txtpass'];
		   
		   $this->model->login($user,$pass);
		   
		}
	}

} 
