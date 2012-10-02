<?php defined('SYSPATH') or die('No direct script access.');

class Controller_MyCardList extends Controller {
	
	private $login;
	private $view;
	private $model;

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		
		$this->model = model::factory('card');
		$this->view= view::factory('cardview');
		$this->login= view::factory('login');
	}
		
	public function action_index()
	{	  	
	   $this->login();
	  // $this->show_card_list();	 
	}
	
	public function login()
	{
		$this->response->body($this->login);
	}
	
	public function show_card_list()
	{
		$card_list = Model::factory('Model')->get_list();
		$view = View::factory('view')
			  ->bind('card_list',$card_list);
		$this->response->body($view);  	
	}

} 
