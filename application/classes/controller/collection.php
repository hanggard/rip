<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Collection extends Controller {

	public function action_index($collection_shortcut = '')
	{
		$collection = ORM::factory('collection')
			->where('shortcut', '=', Shared::purify_plain_text($collection_shortcut))
			->find();
		if ( ! $collection->loaded())
			throw new Kohana_Exception404;

		$pager = Pagination::factory(array('group' => 'videos'));
		$pager->total_items = ORM::factory('video')
			->join('videocollections')
			->on('videos.id', '=', 'videocollections.video_id')
			->join('collections')
			->on('collections.id', '=', 'videocollections.collection_id')
			->where('collections.id', '=', $collection->id)
			->where('videos.active', '=', 1)
			->count_all();
	
		$videos = ORM::factory('video')
			->join('videocollections')
			->on('videos.id', '=', 'videocollections.video_id')
			->join('collections')
			->on('collections.id', '=', 'videocollections.collection_id')
			->where('collections.id', '=', $collection->id)
			->where('videos.active', '=', 1)			
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
	
		$tpl             = View::factory('collection');
		$tpl->collection = $collection;
		$tpl->videos     = $videos;
		$tpl->pager      = $pager;
		
		$this->request->response = $tpl;
	}
	
}