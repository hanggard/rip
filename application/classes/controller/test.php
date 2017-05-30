<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Test extends Controller {

	public function action_index()
	{
		
		if ( ! DEBUG_MODE)
		 	throw new Kohana_Exception404;
		
		$tpl = View::factory('test');
		
		$this->request->response = $tpl;
		
	}
	
}