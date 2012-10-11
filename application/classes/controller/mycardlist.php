<?php defined('SYSPATH') or die('No direct script access.');

class Controller_MyCardList extends Controller {
	
	
	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->login= view::factory('loginview');
		$this->id = session::instance()->get('id');
		$this->display = view::factory('cardview');
		$this->model = model::factory('cards');
		$this->no_cards = view::factory('nocards');
		$this->confirm_buy = view::factory('confirm_buy');
	
	}
		
	public function action_index()
	{
		$this->model->get_server_name();
		$this->check_if_logged();
		
	}
	
	public function get_server()
	{
		$server_name = $this->model->get_server_name();
		session::instance()->set('server');
	}
	
	public function check_if_logged()
	{	
		if($this->id!=null)		// checks if user is still logged
		{
			$card_owning = $this->model->check_card_owning($this->id);
			
			if($card_owning==true)
			{
				$initial_display = $this->model->get_list($this->id);
				$view = $this->display->bind('card_list',$initial_display)->bind('id',$this->id);
				$this->response->body($this->display);
			}
			else
			{	
				$this->no_cards->bind('id',$this->id);
				$this->response->body($this->no_cards);	
			}
		
		}	// else redirects to login page
		else
		{
			$message=null;
			$this->login->bind('message',$message);
			$this->response->body($this->login); 	
		}
	}
				
} 
