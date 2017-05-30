<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Videorandom extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		$videos_count = ORM::factory('video')
			->where('active', '=', 1)
			->count_all();
	
		$offset = rand(0, $videos_count - 1);
	
		$video = ORM::factory('video')
			->where('active', '=', 1)
			->offset($offset)
			->find();
	
		$this->request->redirect('/video/'.$video->id);
	}
	
}