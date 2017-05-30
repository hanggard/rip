<?php defined('SYSPATH') or die('No direct access');

class Kohana_Exception500 extends Kohana_Exception {

	public function __construct($message = 'error 500', array $variables = NULL, $code = 0)
	{
		parent::__construct($message, $variables, $code);
	}

}