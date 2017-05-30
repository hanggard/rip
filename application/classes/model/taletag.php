<?php defined('SYSPATH') or die('No direct script access.');

class Model_Taletag extends ORM {

	protected $_belongs_to = array(
		'tale' => array(
			'model'       => 'tale',
			'foreign_key' => 'tale_id',
		),
		'tag' => array(
			'model'       => 'tag',
			'foreign_key' => 'tag_id',
		),		
	);

}