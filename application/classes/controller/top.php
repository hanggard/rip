<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Top extends Controller {

	public function action_index()
	{

		$ever_tales = ORM::factory('tale')
			->where('active', '=', 1)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_TALES_COUNT)
			->find_all();
			
		$bound_tale = ORM::factory('tale')
			->where('active', '=', 1)
			->offset(RECENT_TALES_COUNT)
			->find();
		
		$recent_tales = ORM::factory('tale')
			->where('active', '=', 1)
			->where('date', '>=', $bound_tale->date)
			->order_by('votes', 'desc')
			->order_by('date', 'desc')
			->limit(TOP_TALES_COUNT)
			->find_all();
			
		$tpl               = View::factory('top');
		$tpl->ever_tales   = $ever_tales;
		$tpl->recent_tales = $recent_tales;
		
		$this->request->response = $tpl;
	}
	
}