<?php defined('SYSPATH') or die('No direct script access.');

Route::set('getfile', '<action>/<file>.<ext>', array(
		'action' => '(js|css|img)',
		'file'   => '.+',
		'ext'    => '.{2,4}'
	))
	->defaults(array(
		'controller' => 'getfile'
	));
