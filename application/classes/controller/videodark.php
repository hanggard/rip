<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Videodark extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		
		$pager = Pagination::factory(array('group' => 'videos'));
		if ($this->auth)
		{
			$pager->total_items = ORM::factory('video')
				->where('active', '=', 0)
				->count_all();
		}
		else
		{
			$pager->total_items = ORM::factory('video')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
		}
		
		$videos = array();
		if ($pager->total_items > 0)
		{
			if ($this->auth)
			{
				$videos = ORM::factory('video')
					->where('active', '=', 0)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();
			}
			else
			{
				$videos = ORM::factory('video')
					->where('active', '=', 0)
					->where('votes', '>', HIDE_VOTES_COUNT)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();
			}
		}
	
		$tpl         = View::factory('videodark');
		$tpl->videos = $videos;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
}