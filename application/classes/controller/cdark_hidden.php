<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CDark extends Controller {

	public function action_index()
	{
	
		if ( ! $this->auth)
			throw new Kohana_Exception403;

		$pager = Pagination::factory(array('group' => 'default'));
		$pager->total_items = ORM::factory('ctale')
			->where('active', '=', 0)
			->count_all();
		
		$ctales = array();
		if ($pager->total_items > 0)
		{
			$ctales = ORM::factory('ctale')
				->where('active', '=', 0)
				->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
				->limit($pager->items_per_page)
				->find_all();
		}
	
		$tpl         = View::factory('cdark');
		$tpl->ctales = $ctales;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
}