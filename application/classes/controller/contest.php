<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contest extends Controller {

	public function action_index()
	{
	
		$pager = Pagination::factory(array('group' => 'default'));
		$pager->total_items = ORM::factory('ctale')
			->where('active', '=', 1)
			->count_all();

		$ctales = array();
		if ($pager->total_items > 0)
		{
			$ctales = ORM::factory('ctale')
				->where('active', '=', 1)
				->order_by('date', 'desc')
				->offset(($pager->total_pages - $pager->current_page) * $pager->items_per_page)
				->limit($pager->items_per_page)
				->find_all();
		}
		
		$tpl         = View::factory('contest');
		$tpl->ctales = $ctales;
		$tpl->pager  = $pager;
		
		$this->request->response = $tpl;
	}
	
	public function action_cvote_up()
	{
		$ctale_id = Shared::purify_plain_text(arr::get($_POST, 'tale_id', 0));
		$ctale = ORM::factory('ctale')
			->where('id', '=', $ctale_id)
			->find();
		if ($ctale->loaded())
		{
			$this->request->response = $this->cvote($ctale, 1) ? 1 : 0;
		}
	}
	
	public function action_cvote_down()
	{
		$ctale_id = Shared::purify_plain_text(arr::get($_POST, 'tale_id', 0));
		$ctale = ORM::factory('ctale')
			->where('id', '=', $ctale_id)
			->where_open()
			->where('active', '=', 0)
			->or_where('votes', '>', 0)
			->where_close()
			->find();
		if ($ctale->loaded())
		{
			$this->request->response = $this->cvote($ctale, -1) ? 1 : 0;
		}
	}
	
	private function cvote($ctale, $value)
	{
		$cvote = ORM::factory('cvote')
			->where('ctale_id', '=', $ctale->id)
			->where('ip', '=', Request::$client_ip)
			->find();
		if ( ! $cvote->loaded())
		{
			$new_cvote = ORM::factory('cvote');
			$new_cvote->ctale_id = $ctale->id;
			$new_cvote->value = $value;
			$new_cvote->ip = Request::$client_ip;
			$new_cvote->save();
			$ctale->votes = $ctale->votes + $value;
			$ctale->save();
			return true;
		}
		return false;
	}
	
	private function finalize()
	{
		if ( ! $this->auth)
			throw new Kohana_Exception403;

		$ctales = ORM::factory('ctale')
			->where('active', '=', 1)
			->order_by('id', 'asc')
			->find_all();
			
		foreach ($ctales as $ctale)
		{
			$new_tale = ORM::factory('tale');
			$new_tale->user_id = 1;
			$new_tale->title = $ctale->title;
			$new_tale->text = $ctale->text;
			$new_tale->author = $ctale->author;
			$new_tale->url = "";
			$new_tale->topic = $ctale->topic;
			$new_tale->ip = $ctale->ip;
			$new_tale->votes = $ctale->votes;
			$new_tale->active = 1;
			$new_tale->special = NULL;
			$new_tale->save();
			
			$cvotes = $ctale->cvotes->find_all();
			foreach ($cvotes as $cvote)
			{
				$new_vote = ORM::factory('vote');
				$new_vote->tale_id = $new_tale->id;
				$new_vote->value = $cvote->value;
				$new_vote->ip = $cvote->ip;
				$new_vote->save();
			}
			
			$query = DB::query(Database::UPDATE, 'UPDATE phpbb_topics SET tale_id = '.$new_tale->id.', ctale_id = NULL WHERE topic_id = '.$ctale->topic);
			$query->execute();
		}
		
		echo "BOOM BABY!";
			
	}
	
}