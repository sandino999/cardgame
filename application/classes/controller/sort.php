<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sort extends Controller {

	public function action_index()
	{
		if(isset($_GET['btnsort']))
		{
		  if($_GET['select_sort']==0)
		  {
		    $this->action_default();
		  }
		  elseif($_GET['select_sort']==1)
		  {
		    $this->str_ascending();
		  }
		  elseif($_GET['select_sort']==2)
		  {
		    $this->str_descending();
		  }
		  elseif($_GET['select_sort']==3)
		  {
		    $this->def_ascending();
		  }
		  elseif($_GET['select_sort']==4)
		  {
		    $this->def_descending();
		  }
		  
		}
	}
	
	public function action_default()
	{
	   $card_list = Model::factory('Model')->get_list();
		$view = View::factory('view')
			  ->bind('card_list',$card_list);
		$this->response->body($view);
	}
	
	public function str_ascending()
	{
	  $card_list = Model::factory('Model')->str_ascending();
	  $view = View::factory('view')
	          ->bind('card_list',$card_list);
		$this->response->body($view);
	}
	
	public function str_descending()
	{
	  $card_list = Model::factory('Model')->str_descending();
	  $view = View::factory('view')
	          ->bind('card_list',$card_list);
		$this->response->body($view);
	}
	
	public function def_ascending()
	{
	  $card_list = Model::factory('Model')->def_ascending();
	  $view = View::factory('view')
	          ->bind('card_list',$card_list);
		$this->response->body($view);
	}
	
	public function def_descending()
	{
	  $card_list = Model::factory('Model')->def_descending();
	  $view = View::factory('view')
	          ->bind('card_list',$card_list);
		$this->response->body($view);
	}

} 
