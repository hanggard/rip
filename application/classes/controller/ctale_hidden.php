<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CTale extends Controller {

	public function action_index($ctale_id)
	{
	
		if ($this->auth)
		{
			$ctale = ORM::factory('ctale')
				->where('id', '=', Shared::purify_plain_text($ctale_id))
				->find();
		}
		else
		{
			$ctale = ORM::factory('ctale')
				->where('id', '=', Shared::purify_plain_text($ctale_id))
				->where('active', '>=', 0)
				->find();
		}
		if ( ! $ctale->loaded())
			throw new Kohana_Exception404;
			
		$tpl                 = View::factory('ctale');
		$tpl->ctale          = $ctale;
		$tpl->og_description = $ctale->text;
		
		$this->request->response = $tpl;
	}
	
}