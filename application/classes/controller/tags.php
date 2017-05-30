<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tags extends Controller {

	public function action_index()
	{
	
		$tags = ORM::factory('tag')
			->where('count', '>', 0)
			->find_all();
			
		$max_count = ORM::factory('tag')
			->order_by('count', 'desc')
			->find()
			->count;
	
		$tpl            = View::factory('tags');
		$tpl->tags      = $tags;
		$tpl->max_count = $max_count;
		
		$this->request->response = $tpl;
	}
	
}