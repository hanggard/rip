<?php defined('SYSPATH') or die('No direct script access.');

class Model_Imagevote extends ORM {

	protected $_belongs_to = array(
		'image' => array(
			'model'       => 'image',
			'foreign_key' => 'image_id',
		),
	);

}