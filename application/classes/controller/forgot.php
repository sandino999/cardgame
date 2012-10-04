<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Forgot extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->secret_question = view::factory('secret_question');
		$this->email_not_exists_view = view::factory('email_not_exists');
		$this->forgot_view = view::factory('forgot_password');
	}	
	
	public function action_index()
	{
		if(isset($_POST['btnrecover']))
		{
			$email = $_POST['txtemail'];
		 
			$check = $this->model->check_if_email_exists($email);
			if($check == false)
			{
			$this->response->body($this->email_not_exists_view);
			}
			else
			{
			
			$sq = $this->model->get_secret_question($email);
			$this->secret_question->bind('secret',$sq);
			$this->response->body($this->secret_question);
			}
		}
	}

} 
