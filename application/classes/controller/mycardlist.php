<?php defined('SYSPATH') or die('No direct script access.');

class Controller_MyCardList extends Controller {
	
	
	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->login= view::factory('loginview');
	
	}
		
	public function action_index()
	{
	  $message=null;
	  $this->login->bind('message',$message);
	  $this->response->body($this->login); 	
	}
				
} 
