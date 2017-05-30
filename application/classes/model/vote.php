<?php defined('SYSPATH') or die('No direct script access.');

class Model_Vote extends ORM {

	protected $_belongs_to = array(
		'tale' => array(
			'model'       => 'tale',
			'foreign_key' => 'tale_id',
		),
	);

}