<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Album extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index($album_shortcut = '')
	{
		$album = ORM::factory('album')
			->where('shortcut', '=', Shared::purify_plain_text($album_shortcut))
			->find();
		if ( ! $album->loaded())
			throw new Kohana_Exception404;

		$pager = Pagination::factory(array('group' => 'images'));
		$pager->total_items = ORM::factory('image')
			->join('imagealbums')
			->on('images.id', '=', 'imagealbums.image_id')
			->join('albums')
			->on('albums.id', '=', 'imagealbums.album_id')
			->where('albums.id', '=', $album->id)
			->where('images.active', '=', 1)
			->count_all();
	
		$images = ORM::factory('image')
			->join('imagealbums')
			->on('images.id', '=', 'imagealbums.image_id')
			->join('albums')
			->on('albums.id', '=', 'imagealbums.album_id')
			->where('albums.id', '=', $album->id)
			->where('images.active', '=', 1)			
			->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
			->limit($pager->items_per_page)
			->find_all();
	
		$tpl         = View::factory('album');
		$tpl->album  = $album;
		$tpl->images = $images;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
}