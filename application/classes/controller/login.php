<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {

	public function action_index()
	{
		if ($this->pda)
			throw new Kohana_Exception404;
	
		if ($this->auth)
			$this->request->redirect('/');
	
		$error = FALSE;
	
		if (Request::$method == 'POST')
		{
			$password = Shared::purify_plain_text(arr::get($_POST, 'password', ''));
			if ($this->authorize($password))
			{
				$this->request->redirect('/');
			}
			$error = TRUE;
		}
		
		$tpl        = View::factory('login');
		$tpl->error = $error;
		
		$this->request->response = $tpl;
	}
	
	private function authorize($password)
	{
		$password_hash = md5($password);
		$user = ORM::factory('user')->where('password_hash', '=', $password_hash)->find();		
		if ($user->loaded())
		{
			Session::instance()->set('auth', $user->id);
			Cookie::set('auth', $user->id, 60 * 60 * 24 * 365);
			return true;
		}
		return false;
	}
	
}