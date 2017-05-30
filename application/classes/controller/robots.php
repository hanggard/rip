<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Robots extends Controller {

	public function action_index()
	{
		
		echo "User-agent: *\nDisallow";
		die();
		
	}
	
}