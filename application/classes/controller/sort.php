<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sort extends Controller {
	
	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->view = view::factory('cardview');
		$this->id = session::instance()->get('id',NULL);
	}

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
		else
		{
		  $this->action_default();
		}
	}
	
	public function action_default()
	{
	   $card_list = $this->model->get_list($this->id);
	   $view = $this->view->bind('card_list',$card_list);
	   $this->response->body($this->view);
	  
	  
	}
	
	public function str_ascending()
	{
	  $card_list = $this->model->str_ascending($this->id);
	  $this->view->bind('card_list',$card_list);
	  $this->response->body($this->view);
	}
	
	public function str_descending()
	{
	  $card_list = $this->model->str_descending($this->id);
	  $this->view->bind('card_list',$card_list);
	  $this->response->body($this->view);
	}
	
	public function def_ascending()
	{
	  $card_list = $this->model->def_ascending($this->id);
	  $this->view->bind('card_list',$card_list);
	  $this->response->body($this->view);
	}
	
	public function def_descending()
	{
	  $card_list = $this->model->def_descending($this->id);
	  $this->view->bind('card_list',$card_list);
       $this->response->body($this->view);
	}

} 
