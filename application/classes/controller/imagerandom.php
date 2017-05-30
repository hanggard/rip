<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Imagerandom extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		$images_count = ORM::factory('image')
			->where('active', '=', 1)
			->count_all();
	
		$offset = rand(0, $images_count - 1);
	
		$image = ORM::factory('image')
			->where('active', '=', 1)
			->offset($offset)
			->find();
	
		$this->request->redirect('/image/'.$image->id);
	}
	
}