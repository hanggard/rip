<?php defined('SYSPATH') or die('No direct script access.');

abstract class Theme_Widget {

	public static function factory($name)
	{
		$class = 'Widget_'.ucfirst($name);
		return new $class;
	}

	abstract public function execute();

} // End Theme_Widget
