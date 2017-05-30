<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller {

	public function action_index($name = '')
	{
		try
		{
			$tpl = View::factory('pages/'.Shared::purify_plain_text($name));
		}
		catch (Exception $e)
		{
			throw new Kohana_Exception404;
		}
		
		$this->request->response = $tpl;
	}
			
}