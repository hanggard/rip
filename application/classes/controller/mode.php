<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mode extends Controller {

	public function action_light()
	{
	
		Session::instance()->set('light', TRUE);
		Cookie::set('light', TRUE, 60 * 60 * 24 * 365);
		
		$this->request->redirect(Request::$referrer);
		
	}
	
	public function action_dark()
	{
	
		Session::instance()->delete('light');
		Cookie::delete('light');
		
		$this->request->redirect(Request::$referrer);
		
	}
	
}