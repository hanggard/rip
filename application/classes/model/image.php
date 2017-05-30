<?php defined('SYSPATH') or die('No direct script access.');

class Model_Image extends ORM {

	protected $_sorting = array(
		'date' => 'desc',
	);
	
	protected $_belongs_to = array(
		'user' => array(
			'model'       => 'user',
			'foreign_key' => 'user_id',
		),
	);

	protected $_has_many = array(
		'votes' => array(
			'model'       => 'imagevote',
			'foreign_key' => 'image_id',
		),
		'imagealbums' => array(
			'model'       => 'imagealbum',
			'foreign_key' => 'image_id',
		),
		'albums' => array(
			'model'       => 'album',
			'foreign_key' => 'image_id',
			'through'     => 'imagealbums',
			'far_key'     => 'album_id',
		),
	);

	protected $_rules = array(
	);
	
	public function get_albums_string()
	{
		$albums = $this
			->albums
			->find_all()
			->as_array();
		$album_names = array();
		foreach ($albums as $album)
		{
			$album_names[] = $album->name;
		}
		$albums_string = implode(', ', $album_names);
		return $albums_string;
	}
	
	public function clear_albums()
	{
		$imagealbums = $this
			->imagealbums
			->find_all()
			->as_array();
		if ($this->active)
		{
			foreach ($imagealbums as $imagealbum)
			{
				$album = $imagealbum->album;
				$album->count--;
				$album->save();
				
				$imagealbum->delete();
			}
		}
	}
	
	public function get_parsed_description()
	{
		return nl2br($this->description);
	}
	
	public function get_comments_count()
	{

		if ($this->topic == 0)
			return 0;
		$sql = "SELECT COUNT(*) AS cnt FROM phpbb_posts WHERE topic_id = ".$this->topic;
		$result = DB::query(Database::SELECT, $sql)
			->execute()
			->as_array();
		$comments_count = $result[0]['cnt'] - 1;
		return $comments_count;

	}
	
}