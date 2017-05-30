<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tag extends Controller {

	public function action_index($tag_shortcut = '')
	{
		$tag = ORM::factory('tag')
			->where('shortcut', '=', Shared::purify_plain_text($tag_shortcut))
			->find();
		if ( ! $tag->loaded())
			throw new Kohana_Exception404;

		$pager = Pagination::factory(array('group' => 'default'));
		$pager->total_items = ORM::factory('tale')
			->join('taletags')
			->on('tales.id', '=', 'taletags.tale_id')
			->join('tags')
			->on('tags.id', '=', 'taletags.tag_id')
			->where('tags.id', '=', $tag->id)
			->where('tales.active', '=', 1)
			->count_all();
	
		$tales = ORM::factory('tale')
			->join('taletags')
			->on('tales.id', '=', 'taletags.tale_id')
			->join('tags')
			->on('tags.id', '=', 'taletags.tag_id')
			->where('tags.id', '=', $tag->id)
			->where('tales.active', '=', 1)			
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
	
		$tpl        = View::factory('tag');
		$tpl->tag   = $tag;
		$tpl->tales = $tales;
		$tpl->pager = $pager;
		
		$this->request->response = $tpl;
	}
	
}