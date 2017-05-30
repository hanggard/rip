<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Videos extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{

		$pager = Pagination::factory(array('group' => 'videos'));
		$pager->total_items = ORM::factory('video')
			->where('active', '=', 1)
			->count_all();
			
		$videos = ORM::factory('video')
			->where('active', '=', 1)
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
			
		$tpl         = View::factory('videos');
		$tpl->videos = $videos;
		$tpl->pager  = $pager;
		$tpl->index  = TRUE;
		
		$this->request->response = $tpl;
	}
	
	public function action_vote_up()
	{
		$video_id = Shared::purify_plain_text(arr::get($_POST, 'video_id', 0));
		$video = ORM::factory('video')
			->where('id', '=', $video_id)
			->find();
		if ($video->loaded())
		{
			$this->request->response = $this->vote($video, 1) ? 1 : 0;
		}
	}
	
	public function action_vote_down()
	{
		$video_id = Shared::purify_plain_text(arr::get($_POST, 'video_id', 0));
		$video = ORM::factory('video')
			->where('id', '=', $video_id)
			->where_open()
			->where('active', '=', 0)
			->or_where('votes', '>', 0)
			->where_close()
			->find();
		if ($video->loaded())
		{
			$this->request->response = $this->vote($video, -1) ? 1 : 0;
		}
	}
	
	private function vote($video, $value)
	{
		$vote = ORM::factory('videovote')
			->where('video_id', '=', $video->id)
			->where('ip', '=', Request::$client_ip)
			->find();
		if ( ! $vote->loaded())
		{
			$new_vote = ORM::factory('videovote');
			$new_vote->video_id = $video->id;
			$new_vote->value = $value;
			$new_vote->ip = Request::$client_ip;
			$new_vote->save();
			$video->votes = $video->votes + $value;
			$video->save();
			return true;
		}
		return false;
	}

}