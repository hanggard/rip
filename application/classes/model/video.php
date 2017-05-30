<?php defined('SYSPATH') or die('No direct script access.');

class Model_Video extends ORM {

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
			'model'       => 'vote',
			'foreign_key' => 'video_id',
		),
		'videocollections' => array(
			'model'       => 'videocollection',
			'foreign_key' => 'video_id',
		),
		'collections' => array(
			'model'       => 'collection',
			'foreign_key' => 'video_id',
			'through'     => 'videocollections',
			'far_key'     => 'collection_id',
		),
	);

	protected $_rules = array(
		'title' => array(
			'not_empty'  => NULL,
			'max_length' => array(256),
		),
		'description' => array(
			'not_empty'  => NULL,
		),
		'youtube' => array(
			'not_empty'  => NULL,
		),
	);
	
	protected $_callbacks = array(
		'youtube' => array('format'),
	);
	
	public function format(Validate $array, $field)
	{
		$url = $array[$field];
		if (preg_match('/[^A-Za-z0-9_\-]/', $url))
		{
			$is_correct = FALSE;
			$url_parsed = parse_url($url);
			if ($url_parsed)
			{
				$host = mb_strtolower($url_parsed['host'], 'UTF-8');
				if ($host == 'youtube.com' || $host = 'www.youtube.com')
				{
					$query_string = $url_parsed['query'];
					parse_str($query_string, $query_string_parsed);
					if (isset($query_string_parsed['v']))
					{
						$video_identifier = $query_string_parsed['v'];
						$array[$field] = $video_identifier;
						$is_correct = TRUE;
					}
				}
			}
			if ( ! $is_correct)
				$array->error($field, 'format');
		}
	}
	
	public function get_collections_string()
	{
		$collections = $this
			->collections
			->find_all()
			->as_array();
		$collection_names = array();
		foreach ($collections as $collection)
		{
			$collection_names[] = $collection->name;
		}
		$collections_string = implode(', ', $collection_names);
		return $collections_string;
	}
	
	public function clear_collections()
	{
		$videocollections = $this
			->videocollections
			->find_all()
			->as_array();
		if ($this->active)
		{
			foreach ($videocollections as $videocollection)
			{
				$collection = $videocollection->collection;
				$collection->count--;
				$collection->save();
				
				$videocollection->delete();
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