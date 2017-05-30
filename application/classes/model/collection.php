<?php defined('SYSPATH') or die('No direct script access.');

class Model_Collection extends ORM {

	protected $_sorting = array(
		'name' => 'asc',
	);

	protected $_has_many = array(
		'videos' => array(
			'model'       => 'video',
			'foreign_key' => 'collection_id',
			'through'     => 'videocollections',
			'far_key'     => 'video_id',
		),
		'videocollections' => array(
			'model'       => 'videocollection',
			'foreign_key' => 'collection_id',
		),
	);

	protected $_rules = array(
		'name' => array(
			'not_empty'  => NULL,
		),
	);
	
	protected $_callbacks = array(
		'name'     => array('unique'),
		'shortcut' => array('unique'),
	);
	
	public function unique(Validate $array, $field)
	{
		$duplicate_collection = ORM::factory('collection')
			->where($field, '=', $array[$field])
			->find();
		if ($duplicate_collection->loaded())
		{			
			if ($duplicate_collection->id != $this->id)
				$array->error($field, 'unique');
		}
	}
	
	public static function get_collections()
	{
		$collections = ORM::factory('collection')
			->where('count', '>', 0)
			->find_all();
		return $collections;
	}
	
}