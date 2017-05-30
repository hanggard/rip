<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller {

	public function action_index()
	{	
		$query = Shared::purify_plain_text(arr::get($_GET, 'query', ''));
		$tales = array();
		$error = FALSE;
		
		if  ( ! empty($query))
		{
			if (mb_strlen($query, 'UTF-8') >= SEARCH_QUERY_LENGTH_MIN)
			{				
				$tales = ORM::factory('tale')
					->where_open()
					->where('title', 'LIKE', '%'.$query.'%')
					->or_where('text', 'LIKE', '%'.$query.'%')
					->or_where('author', 'LIKE', '%'.$query.'%')
					->or_where('url', 'LIKE', '%'.$query.'%')					
					->where_close()
					->and_where('active', '=', 1)
					->limit(20)
					->find_all()
					->as_array();
			}
			else
			{
				$error = TRUE;
			}
		}
	
		$tpl        = View::factory('search');
		$tpl->query = $query;
		$tpl->tales = $tales;
		$tpl->error = $error;
		
		$this->request->response = $tpl;
	}
	
}