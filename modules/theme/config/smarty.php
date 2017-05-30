<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(
	'integration'	 => TRUE,
	'template_ext'	 => 'tpl',
	'template_dir'	 => array('views'),
	'compile_dir'	 => APPPATH.'cache'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'compile'.DIRECTORY_SEPARATOR,
	'plugins_dir'	 => array(
		MODPATH.'theme'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR,
		MODPATH.'theme'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR
	),
	'cache_dir'	 => APPPATH.'cache'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR,
	'caching'	 => FALSE,
	'force_compile'	 => FALSE,
	'security'	 => FALSE,
	'pre_filters' 	 => array(),
	'post_filters'	 => array(),
	'output_filters' => array()
);