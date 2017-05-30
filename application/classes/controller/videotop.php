<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Videotop extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{

		$ever_videos = ORM::factory('video')
			->where('active', '=', 1)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_VIDEOS_COUNT)
			->find_all();
			
		$bound_video = ORM::factory('video')
			->where('active', '=', 1)
			->offset(RECENT_VIDEOS_COUNT)
			->find();
		
		$recent_videos = ORM::factory('video')
			->where('active', '=', 1)
			->where('date', '>=', $bound_video->date)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_VIDEOS_COUNT)
			->find_all();
			
		$tpl                = View::factory('videotop');
		$tpl->ever_videos   = $ever_videos;
		$tpl->recent_videos = $recent_videos;
		
		$this->request->response = $tpl;
	}
	
}