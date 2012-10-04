<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Password  extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		
		$this->model = model::factory('cards');
		$this->pass_send = view::factory('password_sent');
		$this->wrong_secret_ans = view::factory('messages/wrong_secret_answer');
		
	}	

	public function action_index()
	{
		if(isset($_POST['btnsecret']))
		{
			$result = $this->model->confirm_secret_question_ans($_POST['txtsecret'],$_POST['email']);	
			
			if($result == true )
			{
			  $this->model->send_password($_POST['email']);
			  $this->response->body($this->pass_send);
			}
			else
			{
			  $this->response->body($this->wrong_secret_ans);
			}
			
		}
	}

} 
