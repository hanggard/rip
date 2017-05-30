<?php defined('SYSPATH') or die('No direct script access.');

class Model_Videovote extends ORM {

	protected $_belongs_to = array(
		'video' => array(
			'model'       => 'video',
			'foreign_key' => 'video_id',
		),
	);

}