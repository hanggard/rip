<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Snow extends Controller {

	public function action_on()
	{
	
		Session::instance()->delete('nosnow');
		Cookie::delete('nosnow');
		
		$this->request->redirect(Request::$referrer);
		
	}

	public function action_off()
	{
	
		Session::instance()->set('nosnow', TRUE);
		Cookie::set('nosnow', TRUE, 60 * 60 * 24 * 365);
		
		$this->request->redirect(Request::$referrer);
		
	}
		
}