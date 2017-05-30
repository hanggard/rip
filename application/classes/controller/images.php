<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Images extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		
		$pager = Pagination::factory(array('group' => 'images'));
		$pager->total_items = ORM::factory('image')
			->where('active', '=', 1)
			->count_all();

		$images = ORM::factory('image')
			->where('active', '=', 1)
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
	
		$tpl         = View::factory('images');
		$tpl->images = $images;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
	public function action_vote_up()
	{
		$image_id = Shared::purify_plain_text(arr::get($_POST, 'image_id', 0));
		$image = ORM::factory('image')
			->where('id', '=', $image_id)
			->where('active', '>=', 0)
			->find();
		if ($image->loaded())
		{
			$this->request->response = $this->vote($image, 1) ? 1 : 0;
		}
	}
	
	public function action_vote_down()
	{
		$image_id = Shared::purify_plain_text(arr::get($_POST, 'image_id', 0));
		$image = ORM::factory('image')
			->where('id', '=', $image_id)
			->where('active', '=', 0)
			->find();
		if ($image->loaded())
			$this->request->response = $this->vote($image, -1) ? 1 : 0;
	}
	
	private function vote($image, $value)
	{
		$vote = ORM::factory('imagevote')
			->where('image_id', '=', $image->id)
			->where('ip', '=', Request::$client_ip)
			->find();
		if ( ! $vote->loaded())
		{
			$new_vote = ORM::factory('imagevote');
			$new_vote->image_id = $image->id;
			$new_vote->value = $value;
			$new_vote->ip = Request::$client_ip;
			$new_vote->save();
			$image->votes = $image->votes + $value;
			if ($image->active == 0 && $image->votes < HIDE_VOTES_COUNT)
				Cache::instance()->delete_all();
			$image->save();
			return true;
		}
		return false;
	}

}