<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CTopic extends Controller {

	public function action_ctale($ctale_id)
	{
	
		$ctale = ORM::factory('ctale')
			->where('id', '=', Shared::purify_plain_text($ctale_id))
			->find();
			
		if ( ! $ctale->loaded())
			throw new Kohana_Exception404;
			
		if ( ! empty($ctale->topic))
			$this->request->redirect('/forum/viewtopic.php?f=20&t='.$ctale->topic);
		
		$sql = "SELECT * FROM phpbb_topics WHERE ctale_id = ".$ctale->id;
		$result = DB::query(Database::SELECT, $sql)
			->execute()
			->as_array();
			
		if (count($result) == 0)
		{
			$subject = $ctale->title;
			$author = ! empty($ctale->author) ? "\n\n[i]Автор: ".$ctale->author."[/i]" : "";
			$text = "[i]История на сайте: [url]http://kriper.ru/ctale/".$ctale->id."[/url][/i]".$author."\n\n[quote]".str_ireplace('[cut]', '', $ctale->text)."[/quote]";
			$hash = md5($ctale->id.'3'.$subject.$text.'people are strange');
			
			$data = array(
				'entity_id' => $ctale->id,
				'mode'      => 3,
				'subject'   => $subject,
				'text'      => $text,
				'hash'      => $hash
			);
			
			$response = Shared::post_request('http://kriper.ru/forum/topic.php', $data);
			$response_content_1 = $response['content'];
			$response_content_2 = substr($response_content_1, strpos($response_content_1, '{'));
			$response_content_3 = substr($response_content_2, 0, strrpos($response_content_2, '}') + 1);
			
			$response_data = json_decode($response_content_3);
			
			$topic_id = Shared::purify_plain_text($response_data->topic_id);
			$hash = $response_data->hash;
			
			if (md5($topic_id.'light my fire') != $hash)
				throw new Kohana_Exception500;
				
			$sql = "SELECT * FROM phpbb_topics WHERE topic_id = ".$topic_id." AND ctale_id IS NULL";
			$result = DB::query(Database::SELECT, $sql)
				->execute()
				->as_array();
				
			if (count($result) == 0)
				throw new Kohana_Exception500;
			
			$ctale->topic = $topic_id;
			$ctale->save();

			$sql = "UPDATE phpbb_topics SET ctale_id = ".$ctale->id." WHERE topic_id = ".$topic_id;
			DB::query(Database::UPDATE, $sql)->execute();
					
			$this->request->redirect('/forum/viewtopic.php?f=20&t='.$topic_id);
		}
		else
		{
			$topic_id = $result[0]['topic_id'];
			$ctale->topic = $topic_id;
			$ctale->save();
			
			$this->request->redirect('/forum/viewtopic.php?f=20&t='.$topic_id);
		}
	
	}
	
}