<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Random extends Controller {

	public function action_index()
	{
		$tales_count = ORM::factory('tale')
			->where('active', '=', 1)
			->count_all();
	
		$offset = rand(0, $tales_count - 1);
	
		$tale = ORM::factory('tale')
			->where('active', '=', 1)
			->offset($offset)
			->find();
	
		$this->request->redirect('/tale/'.$tale->id);
	}
	
}