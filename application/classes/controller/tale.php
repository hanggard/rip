<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tale extends Controller {

	public function action_index($tale_id)
	{
	
		if ($this->auth)
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->find();
		}
		else
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->where('active', '>=', 0)
				->find();
		}
		if ( ! $tale->loaded())
			throw new Kohana_Exception404;
			
		$tpl                 = View::factory('tale');
		$tpl->tale           = $tale;
		$tpl->og_description = $tale->text;
		
		$this->request->response = $tpl;
	}
	
}