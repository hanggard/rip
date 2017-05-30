<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Forum extends Controller {

	public function action_index()
	{
	
		$this->request->redirect('/forum/');
		
	}
	
}