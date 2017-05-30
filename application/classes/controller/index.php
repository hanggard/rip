<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller {

	public function action_index()
	{

		$pager = Pagination::factory(array('group' => 'default'));
		$pager->total_items = ORM::factory('tale')
			->where('active', '=', 1)
			->count_all();

		$tales = ORM::factory('tale')
			->where('active', '=', 1)
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
		
		$images_count = ORM::factory('image')
			->where('active', '=', 1)
			->count_all();
		
		$offsets = array();
		$flag = TRUE;
		while ($flag)
		{
			$offset = rand(0, $images_count - 1);
			if ( ! in_array($offset, $offsets))
			{
				$offsets[] = $offset;
				if (count($offsets) >= 4)
					$flag = FALSE;
			}
		}
		$images = array();
		foreach ($offsets as $offset)
		{
			$image = ORM::factory('image')
				->where('active', '=', 1)					
				->offset($offset)
				->limit(1)
				->find();
			$images[] = $image;
		}
		
		/*
		$images = ORM::factory('image')
			->where('active', '=', 1)
			->order_by('date', 'desc')
			->limit(4)
			->find_all();
		*/
	
		$tpl         = View::factory('index');
		$tpl->tales  = $tales;
		$tpl->images = $images;
		$tpl->pager  = $pager;
		$tpl->index  = TRUE;
		
		$this->request->response = $tpl;
	}
	
	public function action_vote_up()
	{
		$tale_id = Shared::purify_plain_text(arr::get($_POST, 'tale_id', 0));
		$tale = ORM::factory('tale')
			->where('id', '=', $tale_id)
			->find();
		if ($tale->loaded())
		{
			$this->request->response = $this->vote($tale, 1) ? 1 : 0;
		}
	}
	
	public function action_vote_down()
	{
		$tale_id = Shared::purify_plain_text(arr::get($_POST, 'tale_id', 0));
		$tale = ORM::factory('tale')
			->where('id', '=', $tale_id)
			->where_open()
			->where('active', '=', 0)
			->or_where('votes', '>', 0)
			->where_close()
			->find();
		if ($tale->loaded())
		{
			$this->request->response = $this->vote($tale, -1) ? 1 : 0;
		}
	}
	
	private function vote($tale, $value)
	{
		$vote = ORM::factory('vote')
			->where('tale_id', '=', $tale->id)
			->where('ip', '=', Request::$client_ip)
			->find();
		if ( ! $vote->loaded())
		{
			$new_vote = ORM::factory('vote');
			$new_vote->tale_id = $tale->id;
			$new_vote->value = $value;
			$new_vote->ip = Request::$client_ip;
			$new_vote->save();
			$tale->votes = $tale->votes + $value;
			$tale->save();
			return true;
		}
		return false;
	}

}