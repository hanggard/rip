<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Controller {

	public function action_403()
	{
		$this->request->headers['HTTP/1.1'] = '403';
		
		$tpl             = View::factory('error/403');
		$tpl->error_flag = TRUE;
	
		$this->request->response = $tpl;		
	}

	public function action_404()
	{
		$this->request->headers['HTTP/1.1'] = '404';

		$tpl             = View::factory('error/404');
		$tpl->error_flag = TRUE;
	
		$this->request->response = $tpl;
	}
	
	public function action_500()
	{
		$this->request->headers['HTTP/1.1'] = '500';

		$tpl             = View::factory('error/500');
		$tpl->error_flag = TRUE;
	
		$this->request->response = $tpl;
	}

}