<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Recover extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->forgot_view = view::factory('forgot_password');
		
		
	}

	public function action_index()
	{
		
		$this->response->body($this->forgot_view);
		
	}
	
	

} 
