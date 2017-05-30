<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Videoadd extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()	
	{
		$new_video = ORM::factory('video');
		$collections = '';
		$errors = array();
		
		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$description = Shared::purify_multiline_plain_text(arr::get($_POST, 'description', ''));
			$collections = Shared::purify_plain_text(arr::get($_POST, 'collections', ''));
			$youtube = Shared::purify_plain_text(arr::get($_POST, 'youtube', ''));
			$captcha_text = Shared::purify_plain_text(arr::get($_POST, 'captcha', ''));
			
			$new_video->title = $title;
			$new_video->description = $description;
			$new_video->youtube = $youtube;
			if ($new_video->check())
			{
				if ($this->auth || Captcha::valid($captcha_text))
				{
					$new_video->ip = Request::$client_ip;
					$new_video->votes = 0;
					$new_video->active = 0;
					$new_video->save();
					
					$collections_array = explode(',', $collections);
					foreach ($collections_array as $collections_array_item)
					{
						$collection_name = trim($collections_array_item);
						$collection = ORM::factory('collection')
							->where('name', '=', $collection_name)
							->find();
						
						if ( ! $collection->loaded())
						{
							$collection = ORM::factory('collection');
							$collection->name = mb_strtolower($collection_name, 'UTF-8');
							$collection->shortcut = Shared::rus2eng($collection_name);
							$collection->count = 0;
							if ($collection->check())
							{
								$collection->save();
							}
							else
							{
								break;
							}
						}
						
						$old_videocollection = ORM::factory('videocollection')
							->where('video_id', '=', $new_video->id)
							->where('collection_id', '=', $collection->id)
							->find();
						if ( ! $old_videocollection->loaded())
						{
							$new_videocollection = ORM::factory('videocollection');
							$new_videocollection->video_id = $new_video->id;
							$new_videocollection->collection_id = $collection->id;
							$new_videocollection->save();
							
							if ($new_video->active == 1)
							{
								$collection->count++;
								$collection->save();
							}
						}
					}
					
					if ($new_video->active == 1)
					{
						$this->request->redirect('/');
					}
					else
					{
						$this->request->redirect('/videodark');
					}
				}
				else
				{
					$errors['captcha'] = array('match');
				}
			}
			
			$errors = array_merge($errors, $new_video->validate()->errors());
		}
		
		$captcha = Captcha::instance();
	
		$tpl              = View::factory('videoadd');
		$tpl->new_video   = $new_video;
		$tpl->collections = $collections;
		$tpl->errors      = $errors;
		$tpl->captcha     = $captcha;
		
		$this->request->response = $tpl;
	}
	
}