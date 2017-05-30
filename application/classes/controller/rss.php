<?php defined('SYSPATH') or die('No direct script access.');

class Controller_RSS extends Controller {

	public function action_index()
	{
	
		$tales = ORM::factory('tale')
			->where('active', '=', 1)
			->limit(RSS_ITEMS_COUNT)
			->find_all()
			->as_array();
	
		$items = '';
		foreach ($tales as $tale)
		{
			$tpl = View::factory('rss/item');
			$tpl->title = $tale->title;
			$tpl->link = 'http://kriper.ru/tale/'.$tale->id.'/';
			$tpl->guid = $tale->id;
			$tpl->description = $tale->get_parsed_text();
			$tpl->date = date('D, j M Y H:i:s', Shared::timestamp2time($tale->date)).' +1000';
			
			$items .= $tpl->render();
		}
		
		$tpl        = View::factory('rss/channel');
		$tpl->items = $items;
		$tpl->date  = date('D, j M Y H:i:s').' +1000';
		
		$this->request->headers['content-type'] = 'application/rss+xml; charset=UTF-8';
		$this->request->headers['content-language'] = 'ru';
		$this->request->response = $tpl;

	}
	
}