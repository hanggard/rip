<?php defined('SYSPATH') or die('No direct script access.');

class Model_CTale extends ORM {

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
		'cvotes' => array(
			'model'       => 'cvote',
			'foreign_key' => 'ctale_id',
		),
	);

	protected $_rules = array(
		'title' => array(
			'not_empty'  => NULL,
			'max_length' => array(256),
		),
		'text' => array(
			'not_empty'  => NULL,
		),
		'author' => array(
			'not_empty'  => NULL,
			'max_length' => array(256),
		),
		'email' => array(
			'not_empty'  => NULL,
			'max_length' => array(1024),
		),
	);
	
	public function get_parsed_text()
	{
		$text = str_ireplace('[cut]', '', $this->text);
		return nl2br($text);
	}
	
	public function get_announce_text()
	{
		$pos = stripos($this->text, '[cut]');
		if ($pos === FALSE)
		{
			return nl2br($this->text);
		}
		else
		{
			$text = substr($this->text, 0, $pos);
			$text .= "\n\n<strong>Эта история слишком длинная для отображения в ленте. <a href='/ctale/".$this->id."'>Читать полностью...</a></strong>";
			return nl2br($text);
		}
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