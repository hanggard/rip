<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Imageadd extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index()
	{
		$errors = array();
		
		if (Request::$method == 'POST')
		{
			$captcha_text = Shared::purify_plain_text(arr::get($_POST, 'captcha', ''));			
			if ($this->auth || Captcha::valid($captcha_text))
			{
				$images_count = 0;
			
				for($i = 1; $i <= 3; $i++)
				{
					$key = 'image_'.$i;
					$description = Shared::purify_multiline_plain_text(arr::get($_POST, 'description_'.$i, ''));
					$albums = Shared::purify_plain_text(arr::get($_POST, 'albums_'.$i, ''));
					
					if (Upload::not_empty($_FILES[$key]) && Upload::valid($_FILES[$key]))
					{
						$tmp = Upload::save($_FILES[$key], NULL, DOCROOT.'media/uploads/images/tmp/');
						
						try
						{
							$image = Image::factory($tmp);
						}
						catch (Exception $e)
						{
							@unlink($tmp);
						}
						
						if (file_exists($tmp))
						{
							$path_array = explode(".", $tmp);
							$extension = strtolower($path_array[count($path_array) - 1]);
							
							if ($extension == 'jpg' || $extension == 'jpg' || $extension == 'png')
							{
								$subdirectory = date("Ymd");
								if ( ! file_exists(DOCROOT.'media/uploads/images/originals/'.$subdirectory))
									mkdir(DOCROOT.'media/uploads/images/originals/'.$subdirectory);
								if ( ! file_exists(DOCROOT.'media/uploads/images/thumbnails/'.$subdirectory))
									mkdir(DOCROOT.'media/uploads/images/thumbnails/'.$subdirectory);
								
								$filename = $subdirectory.'/'.Shared::generate_string().'.'.$extension;
								
								$master_dimension = Image::WIDTH;
								if ($image->width < $image->height)
									$master_dimension = Image::HEIGHT;
								
								$image_path = DOCROOT.'media/uploads/images/originals/'.$filename;
								if ($image->width > IMAGE_MAX_WIDTH || $image->height > IMAGE_MAX_HEIGHT)
								{
									if ($image->height <= IMAGE_MAX_HEIGHT)
										$master_dimension = Image::WIDTH;
									if ($image->width <= IMAGE_MAX_WIDTH)
										$master_dimension = Image::HEIGHT;
									if ($image->width > IMAGE_MAX_WIDTH && $image->height > IMAGE_MAX_HEIGHT)
										$master_dimension = Image::WIDTH;
									$image
										->resize(IMAGE_MAX_WIDTH, IMAGE_MAX_HEIGHT, $master_dimension)
										->save($image_path);
								}
								else
								{
									$image->save($image_path);
								}
								
								$thumb_path = DOCROOT.'media/uploads/images/thumbnails/'.$filename;
								$image
									->resize(IMAGE_THUMBNAIL_WIDTH, IMAGE_THUMBNAIL_HEIGHT, Image::HEIGHT)
									->crop(IMAGE_THUMBNAIL_WIDTH, IMAGE_THUMBNAIL_HEIGHT)
									->save($thumb_path);
									
								@unlink($tmp);
								
								$new_image = ORM::factory('image');
								$new_image->user_id = $this->auth ? $this->user->id : NULL;
								$new_image->file = $filename;
								$new_image->description = $description;
								$new_image->ip = Request::$client_ip;
								$new_image->votes = 0;
								$new_image->active = $this->auth ? 1 : 0;
								$new_image->save();
								
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
										->where('image_id', '=', $new_image->id)
										->where('album_id', '=', $album->id)
										->find();
									if ( ! $old_imagealbum->loaded())
									{
										$new_imagealbum = ORM::factory('imagealbum');
										$new_imagealbum->image_id = $new_image->id;
										$new_imagealbum->album_id = $album->id;
										$new_imagealbum->save();
										
										if ($new_image->active == 1)
										{
											$album->count++;
											$album->save();
										}
									}
								}
								
								$images_count++;
							}
						}
					}
				}
				if ($images_count == 0)
					$errors['files'] = array('not_empty');
			}
			else
			{
				$errors['captcha'] = array('match');
			}
			
			if (count($errors) == 0)
			{
				if ($this->auth)
				{
					$this->request->redirect('/images');
				}
				else
				{
					$this->request->redirect('/imagedark');
				}
			}
		}
	
		$captcha = Captcha::instance();
	
		$tpl           = View::factory('imageadd');
		$tpl->errors   = $errors;
		$tpl->captcha  = $captcha;
		
		$this->request->response = $tpl;	
	}
	
}