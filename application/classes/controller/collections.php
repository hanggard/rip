<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Collections extends Controller {

	public function action_index()
	{
		
		$collections = ORM::factory('collection')
			->where('count', '>', 0)
			->find_all();
			
		$max_count = ORM::factory('collection')
			->order_by('count', 'desc')
			->find()
			->count;
	
		$tpl              = View::factory('collections');
		$tpl->collections = $collections;
		$tpl->max_count   = $max_count;
		
		$this->request->response = $tpl;
	}
	
}