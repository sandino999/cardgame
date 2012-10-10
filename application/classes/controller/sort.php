<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sort extends Controller {
	
	const STR_ASC = 'Str Asc';
	const STR_DESC = 'Str Desc';
	const DEF_ASC = 'Def Asc';
	const DEF_DESC = 'Def Desc';
	
	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->view = view::factory('cardview');
		$this->login = view::factory('loginview');
		$this->id = session::instance()->get('id');
	}

	public function action_index()
	{
		$validate = $this->model->validate_id_if_logged($this->id);
		if($validate==false)
		{
			$this->request->redirect('index.php/accounts/not_logged');
		}
		
	
		if(isset($_GET['btnsort']))
		{
			if($_GET['select_sort']=='')
			{
			$this->action_default();
			}
			elseif($_GET['select_sort']==self::STR_ASC)
			{
			$this->str_ascending();
			}
			elseif($_GET['select_sort']==self::STR_DESC)
			{
			$this->str_descending();
			}
			elseif($_GET['select_sort']==self::DEF_ASC)
			{
			$this->def_ascending();
			}
			elseif($_GET['select_sort']==self::DEF_DESC)
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
