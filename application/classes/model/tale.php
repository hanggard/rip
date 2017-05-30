<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tale extends ORM {

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
			'foreign_key' => 'tale_id',
		),
		'taletags' => array(
			'model'       => 'taletag',
			'foreign_key' => 'tale_id',
		),
		'tags' => array(
			'model'       => 'tag',
			'foreign_key' => 'tale_id',
			'through'     => 'taletags',
			'far_key'     => 'tag_id',
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
	);
	
	public function get_tags_string()
	{
		$tags = $this
			->tags
			->find_all()
			->as_array();
		$tag_texts = array();
		foreach ($tags as $tag)
		{
			$tag_texts[] = $tag->text;
		}
		$tags_string = implode(', ', $tag_texts);
		return $tags_string;
	}
	
	public function clear_tags()
	{
		$taletags = $this
			->taletags
			->find_all()
			->as_array();
		if ($this->active)
		{
			foreach ($taletags as $taletag)
			{
				$tag = $taletag->tag;
				$tag->count--;
				$tag->save();
				
				$taletag->delete();
			}
		}
	}
	
	public function get_parsed_text()
	{
		$text = str_ireplace('[cut]', '', $this->text);
		if ($this->id == 4216)
			$text .= "<div style='text-align:center;'><img src='http://kriper.ru/media/uploads/images/vk.jpg' /></div>";
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
			if ($this->id == 4216)
			{
				$text .= "<div style='text-align:center;'><img src='http://kriper.ru/media/uploads/images/vk_announce.jpg' /></div>";
			}
			else
			{
				$text .= "\n";
			}
			$text .= "\n<strong>Эта история слишком длинная для отображения в ленте. <a href='/tale/".$this->id."'>Читать полностью...</a></strong>";
			return nl2br($text);
		}
	}
	
	public function get_url_host()
	{
		$url = parse_url($this->url);
		if ($url)
		{
			return mb_strtolower($url['host'], 'UTF-8');
		}
		else
		{
			return '[неизвестный сайт]';
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