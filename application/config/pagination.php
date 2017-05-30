<?php defined('SYSPATH') or die('No direct script access.');

return array(

	'default' => array(
		'current_page'   => array(
			'source' => 'query_string',
			'key'    => 'page'
		),
		'total_items'    => 0,
		'items_per_page' => TALES_PER_PAGE,
		'view'           => 'pagination/default',
		'auto_hide'      => TRUE,
	),
	
	'images' => array(
		'current_page'   => array(
			'source' => 'query_string',
			'key'    => 'page'
		),
		'total_items'    => 0,
		'items_per_page' => IMAGES_PER_PAGE,
		'view'           => 'pagination/default',
		'auto_hide'      => TRUE,
	),
	
	'videos' => array(
		'current_page'   => array(
			'source' => 'query_string',
			'key'    => 'page'
		),
		'total_items'    => 0,
		'items_per_page' => VIDEOS_PER_PAGE,
		'view'           => 'pagination/default',
		'auto_hide'      => TRUE,
	)
	
);