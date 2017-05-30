<?php defined('SYSPATH') or die('No direct script access.');

class Model_CVote extends ORM {

	protected $_belongs_to = array(
		'ctale' => array(
			'model'       => 'ctale',
			'foreign_key' => 'ctale_id',
		),
	);

}