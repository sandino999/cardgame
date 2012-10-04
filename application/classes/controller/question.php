<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Forgot extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->forgot_password = view::factory('forgotview');
		$this->secret_question = view::factory('secret_question');
	}	
	
	public function action_index()
	{
		if(isset($_POST['btnrecover']))
		{
		 $email = $_POST['txtemail'];
		 $sq = $this->model->get_secret_question($email);
		 $this->secret_question->bind('secret',$sq);
		 $this->response->body($this->secret_question);
		}
	}

} 
