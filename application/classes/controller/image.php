<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Image extends Controller {

	public function __construct(Request $request)
	{
		parent::__construct($request);
		
		if ($this->pda)
			throw new Kohana_Exception404;
	}

	public function action_index($image_id)
	{
	
		if ($this->auth)
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->find();
		}
		else
		{
			$image = ORM::factory('image')
				->where('id', '=', Shared::purify_plain_text($image_id))
				->where('active', '>=', 0)
				->find();
		}
		if ( ! $image->loaded())
			throw new Kohana_Exception404;
			
		$errors = array();
		
		$tpl                 = View::factory('image');
		$tpl->image          = $image;
		$tpl->og_image       = 'http://kriper.ru/media/uploads/images/originals/'.$image->file;
		$tpl->og_description = $image->description;
		
		$this->request->response = $tpl;
	}
	
}