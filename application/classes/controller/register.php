<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller {

	private $view;
	private $model;
	
	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->view = view::factory('registerview');
		$this->model = model::factory('cards');
	}
	
	public function action_index()
	{
		$this->response->body($this->view);
	}

} 
