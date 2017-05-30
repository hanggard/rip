<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Imagedark extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		
		$pager = Pagination::factory(array('group' => 'images'));
		if ($this->auth)
		{			
			$pager->total_items = ORM::factory('image')
				->where('active', '=', 0)
				->count_all();
		}
		else
		{
			$pager->total_items = ORM::factory('image')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
		}
		
		$images = array();
		if ($pager->total_items > 0)
		{
			if ($this->auth)
			{
				$images = ORM::factory('image')
					->where('active', '=', 0)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();
			}
			else
			{
				$images = ORM::factory('image')
					->where('active', '=', 0)
					->where('votes', '>', HIDE_VOTES_COUNT)
					->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
					->limit($pager->items_per_page)
					->find_all();				
			}
		}
	
		$tpl         = View::factory('imagedark');
		$tpl->images = $images;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
}