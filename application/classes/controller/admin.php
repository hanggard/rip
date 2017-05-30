<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
		
		if ( ! $this->auth)
			throw new Kohana_Exception403;
	}
	
	public function action_force($tale_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->where('active', '<', 1)
				->find();
		}
		else
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->where('id', '>', UNTOUCHABLE_TALE_IDENTIFIER)
				->where('active', '<', 1)
				->find();
		}
		if ( ! $tale->loaded())
			throw new Kohana_Exception404;
			
		$tale->active = 1;
		$tale->user_id = $this->user->id;
		$tale->date = date('Y-m-d H:i:s');
		$tale->save();
		
		$tags = $tale
			->tags
			->find_all()
			->as_array();
		
		foreach($tags as $tag)
		{
			$tag->count++;
			$tag->save();
		}
		
		$this->request->redirect('/');
	}
	
	public function action_delete($tale_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->find();
		}
		else
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->where('id', '>', UNTOUCHABLE_TALE_IDENTIFIER)
				->find();
		}
		if ( ! $tale->loaded())
			throw new Kohana_Exception404;
		
		if ($tale->active == 1)
		{
			$tags = $tale
				->tags
				->find_all()
				->as_array();
			
			foreach($tags as $tag)
			{
				$tag->count--;
				$tag->save();
			}
		}
		
		$tale->delete();
		
		$this->request->redirect(Request::$referrer);
	}
	
	public function action_edit($tale_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->find();
		}
		else
		{
			$tale = ORM::factory('tale')
				->where('id', '=', Shared::purify_plain_text($tale_id))
				->where('id', '>', UNTOUCHABLE_TALE_IDENTIFIER)
				->find();
		}
		if ( ! $tale->loaded())
			throw new Kohana_Exception404;
		
		$errors = array();
		$tags = $tale->get_tags_string();

		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$text = Shared::purify_multiline_plain_text(arr::get($_POST, 'text', ''));			
			$tags = Shared::purify_plain_text(arr::get($_POST, 'tags', ''));
			$url = Shared::purify_plain_text(arr::get($_POST, 'url', ''));
			$author = Shared::purify_plain_text(arr::get($_POST, 'author', ''));
			if ( ! empty($url) && (strlen($url) < 7 || (strlen($url) >= 7 && strtolower(substr($url, 0, 7)) != 'http://') || (strlen($url) >= 8 && strtolower(substr($url, 0, 7)) != 'http://' && strtolower(substr($url, 0, 8)) != 'https://')))
			{
				$url = 'http://'.$url;
			}
			
			$tale->title = $title;
			$tale->text = $text;
			$tale->url = $url;
			$tale->author = $author;
			if ($tale->check())
			{
				$tale->save();
				
				$tale->clear_tags();
				$tags_array = explode(',', $tags);
				foreach ($tags_array as $tags_array_item)
				{
					$tag_text = trim($tags_array_item);
					$tag = ORM::factory('tag')
						->where('text', '=', $tag_text)
						->find();
					
					if ( ! $tag->loaded())
					{
						$tag = ORM::factory('tag');
						$tag->text = mb_strtolower($tag_text, 'UTF-8');
						$tag->shortcut = Shared::rus2eng($tag_text);
						$tag->count = 0;
						if ($tag->check())
						{
							$tag->save();
						}
						else
						{
							break;
						}
					}
					
					$old_taletag = ORM::factory('taletag')
						->where('tale_id', '=', $tale->id)
						->where('tag_id', '=', $tag->id)
						->find();
					if ( ! $old_taletag->loaded())
					{
						$new_taletag = ORM::factory('taletag');
						$new_taletag->tale_id = $tale->id;
						$new_taletag->tag_id = $tag->id;
						$new_taletag->save();
						
						if ($tale->active == 1)
						{
							$tag->count++;
							$tag->save();
						}
					}
				}
				
				$this->request->redirect('/tale/'.$tale->id);
			}
			
			$errors = $tale->validate()->errors();
		}
	
		$tpl         = View::factory('admin/edit');
		$tpl->tale   = $tale;
		$tpl->tags   = $tags;
		$tpl->errors = $errors;
		
		$this->request->response = $tpl;
	}
	
	public function action_cforce($ctale_id)
	{
		$ctale = ORM::factory('ctale')
			->where('id', '=', Shared::purify_plain_text($ctale_id))
			->where('active', '<', 1)
			->find();
		if ( ! $ctale->loaded())
			throw new Kohana_Exception404;
			
		$ctale->active = 1;
		$ctale->user_id = $this->user->id;
		$ctale->date = date('Y-m-d H:i:s');
		$ctale->save();
		
		$this->request->redirect('/contest');
	}
	
	public function action_cdelete($ctale_id)
	{
		$ctale = ORM::factory('ctale')
			->where('id', '=', Shared::purify_plain_text($ctale_id))
			->find();
		if ( ! $ctale->loaded())
			throw new Kohana_Exception404;
		
		$ctale->delete();
		
		$this->request->redirect(Request::$referrer);
	}
	
	public function action_cedit($ctale_id)
	{
		$ctale = ORM::factory('ctale')
			->where('id', '=', Shared::purify_plain_text($ctale_id))
			->find();
		if ( ! $ctale->loaded())
			throw new Kohana_Exception404;
		
		$errors = array();

		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$text = Shared::purify_multiline_plain_text(arr::get($_POST, 'text', ''));						
			$author = Shared::purify_plain_text(arr::get($_POST, 'author', ''));
			
			$ctale->title = $title;
			$ctale->text = $text;			
			$ctale->author = $author;
			if ($ctale->check())
			{
				$ctale->save();
				
				$this->request->redirect('/ctale/'.$ctale->id);
			}
			
			$errors = $ctale->validate()->errors();
		}
	
		$tpl         = View::factory('admin/cedit');
		$tpl->ctale  = $ctale;
		$tpl->errors = $errors;
		
		$this->request->response = $tpl;
	}	
	
	public function action_imageforce($image_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->where('active', '<', 1)
				->find();
		}
		else
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->where('id', '>', UNTOUCHABLE_IMAGE_IDENTIFIER)
				->where('active', '<', 1)
				->find();
		}
		if ( ! $image->loaded())
			throw new Kohana_Exception404;
			
		$image->active = 1;
		$image->user_id = $this->user->id;
		$image->date = date('Y-m-d H:i:s');
		$image->save();
		
		$albums = $image
			->albums
			->find_all()
			->as_array();
		
		foreach($albums as $album)
		{
			$album->count++;
			$album->save();
		}
		
		$this->request->redirect('/images');
	}
	
	public function action_imagedelete($image_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->find();
		}
		else
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->where('id', '>', UNTOUCHABLE_IMAGE_IDENTIFIER)
				->find();
		}
		if ( ! $image->loaded())
			throw new Kohana_Exception404;
		
		if ($image->active == 1)
		{
			$albums = $image
				->albums
				->find_all()
				->as_array();
			
			foreach($albums as $album)
			{
				$album->count--;
				$album->save();
			}
		}
		
		@unlink(DOCROOT.'media/uploads/images/originals/'.$image->file);
		@unlink(DOCROOT.'media/uploads/images/thumbnails/'.$image->file);
		
		$image->delete();
		
		$this->request->redirect('/images');
	}
	
	public function action_imageedit($image_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->find();
		}
		else
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->where('id', '>', UNTOUCHABLE_IMAGE_IDENTIFIER)
				->find();
		}
		if ( ! $image->loaded())
			throw new Kohana_Exception404;
		
		$errors = array();
		$albums = $image->get_albums_string();

		if (Request::$method == 'POST')
		{
			$description = Shared::purify_multiline_plain_text(arr::get($_POST, 'description', ''));
			$albums = Shared::purify_plain_text(arr::get($_POST, 'albums', ''));
			
			$image->description = $description;
			$image->save();
			
			$image->clear_albums();
			$albums_array = explode(',', $albums);
			foreach ($albums_array as $albums_array_item)
			{
				$album_name = trim($albums_array_item);
				$album = ORM::factory('album')
					->where('name', '=', $album_name)
					->find();
				
				if ( ! $album->loaded())
				{
					$album = ORM::factory('album');
					$album->name = mb_strtolower($album_name, 'UTF-8');
					$album->shortcut = Shared::rus2eng($album_name);
					$album->count = 0;
					if ($album->check())
					{
						$album->save();
					}
					else
					{
						break;
					}
				}
				
				$old_imagealbum = ORM::factory('imagealbum')
					->where('image_id', '=', $image->id)
					->where('album_id', '=', $album->id)
					->find();
				if ( ! $old_imagealbum->loaded())
				{
					$new_imagealbum = ORM::factory('imagealbum');
					$new_imagealbum->image_id = $image->id;
					$new_imagealbum->album_id = $album->id;
					$new_imagealbum->save();
					
					if ($image->active == 1)
					{
						$album->count++;
						$album->save();
					}
				}
			}
			
			$this->request->redirect('/image/'.$image->id);
		}
	
		$tpl         = View::factory('admin/imageedit');
		$tpl->image  = $image;
		$tpl->albums = $albums;
		
		$this->request->response = $tpl;
	}
	
	public function action_videoforce($video_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->where('active', '<', 1)
				->find();
		}
		else
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->where('id', '>', UNTOUCHABLE_VIDEO_IDENTIFIER)
				->where('active', '<', 1)
				->find();
		}
		if ( ! $video->loaded())
			throw new Kohana_Exception404;
			
		$video->active = 1;
		$video->user_id = $this->user->id;
		$video->date = date('Y-m-d H:i:s');
		$video->save();
		
		$collections = $video
			->collections
			->find_all()
			->as_array();
		
		foreach($collections as $collection)
		{
			$collection->count++;
			$collection->save();
		}
		
		$this->request->redirect('/videos');
	}
	
	public function action_videodelete($video_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->find();
		}
		else
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->where('id', '>', UNTOUCHABLE_VIDEO_IDENTIFIER)
				->find();
		}
		if ( ! $video->loaded())
			throw new Kohana_Exception404;
		
		if ($video->active == 1)
		{
			$collections = $video
				->collections
				->find_all()
				->as_array();
			
			foreach($collections as $collection)
			{
				$collection->count--;
				$collection->save();
			}
		}
		
		$video->delete();
		
		$this->request->redirect(Request::$referrer);
	}
	
	public function action_videoedit($video_id)
	{
		if ($this->user->role == USER_ROLE_ADMIN)
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->find();
		}
		else
		{
			$video = ORM::factory('video')
				->where('id', '=', Shared::purify_plain_text($video_id))
				->where('id', '>', UNTOUCHABLE_VIDEO_IDENTIFIER)
				->find();
		}
		if ( ! $video->loaded())
			throw new Kohana_Exception404;
		
		$errors = array();
		$collections = $video->get_collections_string();

		if (Request::$method == 'POST')
		{
			$title = Shared::purify_plain_text(arr::get($_POST, 'title', ''));
			$description = Shared::purify_multiline_plain_text(arr::get($_POST, 'description', ''));
			$collections = Shared::purify_plain_text(arr::get($_POST, 'collections', ''));
			$youtube = Shared::purify_plain_text(arr::get($_POST, 'youtube', ''));
			
			$video->title = $title;
			$video->description = $description;
			$video->youtube = $youtube;
			if ($video->check())
			{
				$video->save();
				
				$video->clear_collections();
				$collections_array = explode(',', $collections);
				foreach ($collections_array as $collections_array_item)
				{
					$collection_name = trim($collections_array_item);
					$collection = ORM::factory('collection')
						->where('name', '=', $collection_name)
						->find();
					
					if ( ! $collection->loaded())
					{
						$collection = ORM::factory('collection');
						$collection->name = mb_strtolower($collection_name, 'UTF-8');
						$collection->shortcut = Shared::rus2eng($collection_name);
						$collection->count = 0;
						if ($collection->check())
						{
							$collection->save();
						}
						else
						{
							break;
						}
					}
					
					$old_videocollection = ORM::factory('videocollection')
						->where('video_id', '=', $video->id)
						->where('collection_id', '=', $collection->id)
						->find();
					if ( ! $old_videocollection->loaded())
					{
						$new_videocollection = ORM::factory('videocollection');
						$new_videocollection->video_id = $video->id;
						$new_videocollection->collection_id = $collection->id;
						$new_videocollection->save();
						
						if ($video->active == 1)
						{
							$collection->count++;
							$collection->save();
						}
					}
				}
				
				$this->request->redirect('/video/'.$video->id);
			}
			
			$errors = $video->validate()->errors();
		}
	
		$tpl              = View::factory('admin/videoedit');
		$tpl->video       = $video;
		$tpl->collections = $collections;
		$tpl->errors      = $errors;
		
		$this->request->response = $tpl;
	}
	
	public function action_reset()
	{
		
		$query = DB::query(Database::UPDATE, 'UPDATE tags SET count = (SELECT COUNT(*) FROM taletags INNER JOIN tales ON taletags.tale_id = tales.id WHERE taletags.tag_id = tags.id AND tales.active = 1)');
		$query->execute();
		$query = DB::query(Database::DELETE, 'DELETE FROM tags WHERE count = 0');
		$query->execute();
		$query = DB::query(Database::UPDATE, 'UPDATE tales SET votes = (SELECT SUM(value) FROM votes WHERE votes.tale_id = tales.id)');
		$query->execute();
		
		$query = DB::query(Database::UPDATE, 'UPDATE albums SET count = (SELECT COUNT(*) FROM imagealbums INNER JOIN images ON imagealbums.image_id = images.id WHERE imagealbums.album_id = albums.id AND images.active = 1)');
		$query->execute();
		$query = DB::query(Database::DELETE, 'DELETE FROM albums WHERE count = 0');
		$query->execute();
		$query = DB::query(Database::UPDATE, 'UPDATE images SET votes = (SELECT SUM(value) FROM imagevotes WHERE imagevotes.image_id = images.id)');
		$query->execute();
	
		$tpl = View::factory('admin/reset');
		
		$this->request->response = $tpl;
	}
	
}