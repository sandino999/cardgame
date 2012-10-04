<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Recover extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->forgot_password= view::factory('forgot_password');
	}

	public function action_index()
	{
		if(isset($_POST['btnrecover']))
		{
			$this->recover_password();
		}
		else
		{
		$this->response->body($this->forgot_password);
		}
	}
	
	public function recover_password()
	{  
		$this->model->recover($_POST['txtemail']);
	}

} 
