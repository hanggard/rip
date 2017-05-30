<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Topic extends Controller {

	public function action_tale($tale_id)
	{
	
		$tale = ORM::factory('tale')
			->where('id', '=', Shared::purify_plain_text($tale_id))
			->find();
			
		if ( ! $tale->loaded())
			throw new Kohana_Exception404;
			
		if ( ! empty($tale->topic))
			$this->request->redirect('/forum/viewtopic.php?f=2&t='.$tale->topic);
			
		$sql = "SELECT * FROM phpbb_topics WHERE tale_id = ".$tale->id;
		$result = DB::query(Database::SELECT, $sql)
			->execute()
			->as_array();
			
		if (count($result) == 0)
		{
			$subject = $tale->title;
			$url = ! empty($tale->url) ? "\n\n[i]Первоисточник: [url=".$tale->url."]".$tale->get_url_host()."[/url][/i]" : "";
			$author = ! empty($tale->author) ? "\n\n[i]Автор: ".$tale->author."[/i]" : "";
			$text = "[i]История на сайте: [url]http://kriper.ru/tale/".$tale->id."[/url][/i]".$url.$author."\n\n[i]ВНИМАНИЕ! Здесь приведён текст истории на момент начала обсуждения, отредактированная версия на сайте может отличаться от него.[/i]\n\n[quote]".str_ireplace('[cut]', '', $tale->text)."[/quote]";
			$hash = md5($tale->id.'0'.$subject.$text.'people are strange');
			
			$data = array(
				'entity_id' => $tale->id,
				'mode'      => 0,
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
				
			$sql = "SELECT * FROM phpbb_topics WHERE topic_id = ".$topic_id." AND tale_id IS NULL AND image_id IS NULL AND video_id IS NULL";
			$result = DB::query(Database::SELECT, $sql)
				->execute()
				->as_array();
				
			if (count($result) == 0)
				throw new Kohana_Exception500;
			
			$tale->topic = $topic_id;
			$tale->save();

			$sql = "UPDATE phpbb_topics SET tale_id = ".$tale->id." WHERE topic_id = ".$topic_id;
			DB::query(Database::UPDATE, $sql)->execute();
					
			$this->request->redirect('/forum/viewtopic.php?f=2&t='.$topic_id);
		}
		else
		{
			$topic_id = $result[0]['topic_id'];
			$tale->topic = $topic_id;
			$tale->save();
			
			$this->request->redirect('/forum/viewtopic.php?f=2&t='.$topic_id);
		}
	
	}
	
	public function action_image($image_id)
	{
	
		$image = ORM::factory('image')
			->where('id', '=', Shared::purify_plain_text($image_id))
			->find();
			
		if ( ! $image->loaded())
			throw new Kohana_Exception404;
			
		if ( ! empty($image->topic))
			$this->request->redirect('/forum/viewtopic.php?f=13&t='.$image->topic);
			
		$sql = "SELECT * FROM phpbb_topics WHERE image_id = ".$image->id;
		$result = DB::query(Database::SELECT, $sql)
			->execute()
			->as_array();
			
		if (count($result) == 0)
		{
			$subject = ! empty($image->description) ? "Картинка #".$image->id.": ".Shared::truncate_text($image->description, 60, '...', true) : "Картинка #".$image->id;
			$subject_array = explode("\n", $subject);
			$subject = $subject_array[0];
			$description = ! empty($image->description) ? "\n\n[center]".$image->description."[/center]" : "";
			$text = "[center][i]Картинка на сайте: [url]http://kriper.ru/image/".$image->id."[/url][/i][/center]\n\n[center][img]http://kriper.ru/media/uploads/images/originals/".$image->file."[/img][/center]".$description;
			$hash = md5($image->id.'1'.$subject.$text.'people are strange');
			
			$data = array(
				'entity_id' => $image->id,
				'mode'      => 1,
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
				
			$sql = "SELECT * FROM phpbb_topics WHERE topic_id = ".$topic_id." AND tale_id IS NULL AND image_id IS NULL AND video_id IS NULL";
			$result = DB::query(Database::SELECT, $sql)
				->execute()
				->as_array();
				
			if (count($result) == 0)
				throw new Kohana_Exception500;
			
			$image->topic = $topic_id;
			$image->save();

			$sql = "UPDATE phpbb_topics SET image_id = ".$image->id." WHERE topic_id = ".$topic_id;
			DB::query(Database::UPDATE, $sql)->execute();
					
			$this->request->redirect('/forum/viewtopic.php?f=13&t='.$topic_id);
		}
		else
		{
			$topic_id = $result[0]['topic_id'];
			$image->topic = $topic_id;
			$image->save();
			
			$this->request->redirect('/forum/viewtopic.php?f=13&t='.$topic_id);
		}
		
	}
		
	public function action_video($video_id)
	{
	
		$video = ORM::factory('video')
			->where('id', '=', Shared::purify_plain_text($video_id))
			->find();
			
		if ( ! $video->loaded())
			throw new Kohana_Exception404;
			
		if ( ! empty($video->topic))
			$this->request->redirect('/forum/viewtopic.php?f=19&t='.$video->topic);
			
		$sql = "SELECT * FROM phpbb_topics WHERE video_id = ".$video->id;
		$result = DB::query(Database::SELECT, $sql)
			->execute()
			->as_array();
			
		if (count($result) == 0)
		{
			$subject = $video->title;
			$text = "[center][i]Видео на сайте: [url]http://kriper.ru/video/".$video->id."[/url][/i][/center]\n\n[center][video]http://youtube.com/watch?v=".$video->youtube."[/video][/center]\n\n[center]".$video->description."[/center]";
			$hash = md5($video->id.'2'.$subject.$text.'people are strange');
			
			$data = array(
				'entity_id' => $video->id,
				'mode'      => 2,
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
				
			$sql = "SELECT * FROM phpbb_topics WHERE topic_id = ".$topic_id." AND tale_id IS NULL AND image_id IS NULL AND video_id IS NULL";
			$result = DB::query(Database::SELECT, $sql)
				->execute()
				->as_array();
				
			if (count($result) == 0)
				throw new Kohana_Exception500;
			
			$video->topic = $topic_id;
			$video->save();

			$sql = "UPDATE phpbb_topics SET video_id = ".$video->id." WHERE topic_id = ".$topic_id;
			DB::query(Database::UPDATE, $sql)->execute();
					
			$this->request->redirect('/forum/viewtopic.php?f=19&t='.$topic_id);
		}
		else
		{
			$topic_id = $result[0]['topic_id'];
			$video->topic = $topic_id;
			$video->save();
			
			$this->request->redirect('/forum/viewtopic.php?f=19&t='.$topic_id);
		}
	
	}
	
}