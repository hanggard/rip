<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ContestAdd extends Controller {

	public function action_index()
	{	
		$received = isset($_GET['r']);
		$new_ctale = ORM::factory('ctale');
		$errors = array();
		
		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$text = Shared::purify_multiline_plain_text(arr::get($_POST, 'text', ''));
			$author = Shared::purify_plain_text(arr::get($_POST, 'author', ''));
			$email = Shared::purify_plain_text(arr::get($_POST, 'email', ''));
			$captcha_text = Shared::purify_plain_text(arr::get($_POST, 'captcha', ''));
			
			$new_ctale->title = $title;
			$new_ctale->text = $text;			
			$new_ctale->author = $author;
			$new_ctale->email = $email;
			if ($new_ctale->check())
			{
				if ($this->auth || Captcha::valid($captcha_text))
				{
					$new_ctale->ip = Request::$client_ip;
					$new_ctale->votes = 0;
					$new_ctale->active = 0;
					$new_ctale->save();
					
					if ($new_ctale->active == 1)
					{
						$this->request->redirect('/contest');
					}
					else
					{
						$this->request->redirect('/contestadd?r=1');
					}
				}
				else
				{
					$errors['captcha'] = array('match');
				}
			}
			
			$errors = array_merge($errors, $new_ctale->validate()->errors());
		}
		
		$captcha = Captcha::instance();
	
		$tpl            = View::factory('contestadd');
		$tpl->new_ctale = $new_ctale;
		$tpl->errors    = $errors;
		$tpl->received  = $received;
		$tpl->captcha   = $captcha;
		
		$this->request->response = $tpl;
	}
	
}