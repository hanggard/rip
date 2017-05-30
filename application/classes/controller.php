<?php defined('SYSPATH') or die('No direct script access.');

require_once(LIBPATH.'shared.php');

class Controller extends Kohana_Controller {

	protected $auth;
	protected $user;
	protected $pda;

	public function __construct(Request $request)
	{	
		parent::__construct($request);
		
		$this->auth = Session::instance()->get('auth', FALSE);
		if ($this->auth == FALSE)
			$this->auth = Cookie::get('auth', FALSE);
		if ($this->auth)
		{
			$this->user = ORM::factory('user')->where('id', '=', $this->auth)->find();
			if ( ! $this->user->loaded())
			{
				$this->auth = FALSE;
			}
		}
		$this->pda = ($_SERVER['HTTP_HOST'] == PDA_DOMAIN);
		
	}
	
}