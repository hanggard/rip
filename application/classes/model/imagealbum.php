<?php defined('SYSPATH') or die('No direct script access.');

class Model_Imagealbum extends ORM {

	protected $_belongs_to = array(
		'image' => array(
			'model'       => 'image',
			'foreign_key' => 'image_id',
		),
		'album' => array(
			'model'       => 'album',
			'foreign_key' => 'album_id',
		),		
	);

}