<?php defined('SYSPATH') or die('No direct script access.');

class View extends Theme_View {

	public function __construct($file = NULL, array $data = NULL)
	{
	
		parent::__construct($file, $data);
		
		$auth = Session::instance()->get('auth', FALSE);
		if ($auth == FALSE)
			$auth = Cookie::get('auth', FALSE);
		if ($auth)
		{
			$user = ORM::factory('user')->where('id', '=', $auth)->find();
			$dark_count = ORM::factory('tale')
				->where('active', '=', 0)
				->count_all();
			$cdark_count = ORM::factory('ctale')
				->where('active', '=', 0)
				->count_all();
			$image_dark_count = ORM::factory('image')
				->where('active', '=', 0)
				->count_all();
			$video_dark_count = ORM::factory('video')
				->where('active', '=', 0)
				->count_all();
		}
		else
		{
			$user = ORM::factory('user');
			$dark_count = ORM::factory('tale')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
			$cdark_count = 0;
			$image_dark_count = ORM::factory('image')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
			$video_dark_count = ORM::factory('video')
				->where('active', '=', 0)
				->where('votes', '>', HIDE_VOTES_COUNT)
				->count_all();
		}
		$ctales_count = ORM::factory('ctale')
			->where('active', '=', 1)
			->count_all();
		
		$this->set('auth', $auth);
		$this->set('user', $user);
		$this->set('light', Session::instance()->get('light', FALSE) ||  Cookie::get('light', FALSE));
		$this->set('nosnow', Session::instance()->get('nosnow', FALSE) ||  Cookie::get('nosnow', FALSE));
		$this->set('pda', ($_SERVER['HTTP_HOST'] == PDA_DOMAIN));
		$this->set('pda_agent', Shared::is_pda($_SERVER['HTTP_USER_AGENT']));
		$this->set('dark_count', $dark_count);
		$this->set('cdark_count', $cdark_count);
		$this->set('image_dark_count', $image_dark_count);
		$this->set('video_dark_count', $video_dark_count);
		$this->set('ctales_count', $ctales_count);
		
	}

}