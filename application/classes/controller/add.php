<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Add extends Controller {

	public function action_index()
	{	
		if ($this->pda)
			throw new Kohana_Exception404;
	
		$new_tale = ORM::factory('tale');
		$tags = '';
		$errors = array();
		
		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$text = Shared::purify_multiline_plain_text(arr::get($_POST, 'text', ''));
			$tags = Shared::purify_plain_text(arr::get($_POST, 'tags', ''));
			$url = Shared::purify_plain_text(arr::get($_POST, 'url', ''));
			$author = Shared::purify_plain_text(arr::get($_POST, 'author', ''));
			if ( ! empty($url) && (strlen($url) < 7 || (strlen($url) >= 7 && strtolower(substr($url, 0, 7)) != 'http://') || (strlen($url) >= 8 && strtolower(substr($url, 0, 7)) != 'http://' && strtolower(substr($url, 0, 8)) != 'https://')))
			{
				$url = 'http://'.$url;
			}
			$captcha_text = Shared::purify_plain_text(arr::get($_POST, 'captcha', ''));
			
			$new_tale->title = $title;
			$new_tale->text = $text;
			$new_tale->url = $url;
			$new_tale->author = $author;
			if ($new_tale->check())
			{
				if ($this->auth || Captcha::valid($captcha_text))
				{
					$new_tale->ip = Request::$client_ip;
					$new_tale->votes = 0;
					$new_tale->active = 0;
					$new_tale->save();
					
					$tags_array = explode(',', $tags);
					foreach ($tags_array as $tags_array_item)
					{
						$tag_text = trim($tags_array_item);
						$tag = ORM::factory('tag')
							->where('text', '=', $tag_text)
							->find();
						
						if ( ! $tag->loaded())
						{
							$tag = ORM::factory('tag');
							$tag->text = mb_strtolower($tag_text, 'UTF-8');
							$tag->shortcut = Shared::rus2eng($tag_text);
							$tag->count = 0;
							if ($tag->check())
							{
								$tag->save();
							}
							else
							{
								break;
							}
						}
						
						$old_taletag = ORM::factory('taletag')
							->where('tale_id', '=', $new_tale->id)
							->where('tag_id', '=', $tag->id)
							->find();
						if ( ! $old_taletag->loaded())
						{
							$new_taletag = ORM::factory('taletag');
							$new_taletag->tale_id = $new_tale->id;
							$new_taletag->tag_id = $tag->id;
							$new_taletag->save();
							
							if ($new_tale->active == 1)
							{
								$tag->count++;
								$tag->save();
							}
						}
					}
					
					if ($new_tale->active == 1)
					{
						$this->request->redirect('/');
					}
					else
					{
						$this->request->redirect('/dark');
					}
				}
				else
				{
					$errors['captcha'] = array('match');
				}
			}
			
			$errors = array_merge($errors, $new_tale->validate()->errors());
		}
		
		$captcha = Captcha::instance();
	
		$tpl           = View::factory('add');
		$tpl->new_tale = $new_tale;
		$tpl->tags     = $tags;
		$tpl->errors   = $errors;
		$tpl->captcha  = $captcha;
		
		$this->request->response = $tpl;
	}
	
}