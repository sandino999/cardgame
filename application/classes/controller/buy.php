<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Buy extends Controller {

	public function __construct(Request $request,Response $response)
	{
		parent::__construct($request,$response);
		$this->model = model::factory('cards');
		$this->buy = view::factory('buy_cards');
		$this->id = session::instance()->get('id');
		$this->confirm_buy = view::factory('confirm_buy');
		$this->purchase = view::factory('messages/purchase_success');
	}

	public function action_index()
	{
		$validate = $this->model->validate_id_if_logged($this->id);
		
		if($validate==false)
		{
			$this->request->redirect('index.php/accounts/not_logged');
		}
		else
		{	
			$card_name=null;
			$card_info = $this->model->get_cards();
			$this->buy->bind('card_info',$card_info)->bind('card_name',$card_name);
			$this->buy->bind('card_info',$card_info);
			$this->response->body($this->buy);	
		}	
	}
	
	public function action_choose_cards($card_name)
	{
		$id = session::instance()->get('id');
		$this->model->buy_cards($card_name,$id);
		$this->response->body($this->purchase);
	}

} 