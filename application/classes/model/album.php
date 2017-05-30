<?php defined('SYSPATH') or die('No direct script access.');

class Model_Album extends ORM {

	protected $_sorting = array(
		'name' => 'asc',
	);

	protected $_has_many = array(
		'images' => array(
			'model'       => 'image',
			'foreign_key' => 'album_id',
			'through'     => 'imagealbums',
			'far_key'     => 'image_id',
		),
		'imagealbums' => array(
			'model'       => 'imagealbum',
			'foreign_key' => 'album_id',
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
		$duplicate_tag = ORM::factory('album')
			->where($field, '=', $array[$field])
			->find();
		if ($duplicate_tag->loaded())
		{			
			if ($duplicate_tag->id != $this->id)
				$array->error($field, 'unique');
		}
	}
	
	public static function get_albums()
	{
		$tags = ORM::factory('album')
			->where('count', '>', 0)
			->find_all();
		return $tags;
	}
	
}