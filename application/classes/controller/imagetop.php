<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Imagetop extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		
		$ever_images = ORM::factory('image')
			->where('active', '=', 1)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_IMAGES_COUNT)
			->find_all();
			
		$bound_image = ORM::factory('image')
			->where('active', '=', 1)
			->offset(RECENT_IMAGES_COUNT)
			->find();
		
		$recent_images = ORM::factory('image')
			->where('active', '=', 1)
			->where('date', '>=', $bound_image->date)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_IMAGES_COUNT)
			->find_all();
	
		$tpl                = View::factory('imagetop');
		$tpl->ever_images   = $ever_images;
		$tpl->recent_images = $recent_images;
		
		$this->request->response = $tpl;
	}
	
}