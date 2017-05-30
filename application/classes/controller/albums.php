<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Albums extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{

		$albums = ORM::factory('album')
			->where('count', '>', 0)
			->find_all();
			
		$max_count = ORM::factory('album')
			->order_by('count', 'desc')
			->find()
			->count;
	
		$tpl            = View::factory('albums');
		$tpl->albums    = $albums;
		$tpl->max_count = $max_count;
		
		$this->request->response = $tpl;
	}
	
}