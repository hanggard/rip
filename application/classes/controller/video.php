<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Video extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index($video_id)
	{
	
		if ($this->auth)
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->find();
		}
		else
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->where('active', '>=', 0)
				->find();
		}
		if ( ! $video->loaded())
			throw new Kohana_Exception404;
			
		$tpl                 = View::factory('video');
		$tpl->video          = $video;
		$tpl->og_description = $video->description;
		
		$this->request->response = $tpl;
	}
	
}