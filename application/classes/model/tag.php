<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tag extends ORM {

	protected $_sorting = array(
		'text' => 'asc',
	);

	protected $_has_many = array(
		'tales' => array(
			'model'       => 'tale',
			'foreign_key' => 'tag_id',
			'through'     => 'taletags',
			'far_key'     => 'tale_id',
		),
		'taletags' => array(
			'model'       => 'taletag',
			'foreign_key' => 'tag_id',
		),
	);

	protected $_rules = array(
		'text' => array(
			'not_empty'  => NULL,
		),
	);
	
	protected $_callbacks = array(
		'text'     => array('unique'),
		'shortcut' => array('unique'),
	);
	
	public function unique(Validate $array, $field)
	{
		$duplicate_tag = ORM::factory('tag')
			->where($field, '=', $array[$field])
			->find();
		if ($duplicate_tag->loaded())
		{			
			if ($duplicate_tag->id != $this->id)
				$array->error($field, 'unique');
		}
	}
	
	public static function get_tags()
	{
		$tags = ORM::factory('tag')
			->where('count', '>', 0)
			->find_all();
		return $tags;
	}
	
}