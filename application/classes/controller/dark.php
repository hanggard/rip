<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dark extends Controller {

	public function action_index()
	{
		
		$pager = Pagination::factory(array('group' => 'default'));
		if ($this->auth)
		{
			$pager->total_items = ORM::factory('tale')
				->where('active', '=', 0)
				->count_all();
		}
		else
		{
			$pager->total_items = ORM::factory('tale')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
		}
		
		$tales = array();
		if ($pager->total_items > 0)
		{
			if ($this->auth)
			{
				$tales = ORM::factory('tale')
					->where('active', '=', 0)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();
			}
			else
			{
				$tales = ORM::factory('tale')
					->where('active', '=', 0)
					->where('votes', '>', HIDE_VOTES_COUNT)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();
			}
		}
	
		$tpl        = View::factory('dark');
		$tpl->tales = $tales;
		$tpl->pager = $pager;
		
		$this->request->response = $tpl;
	}
	
}