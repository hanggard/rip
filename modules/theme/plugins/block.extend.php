<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Блок, наследующий шаблон
 *
 * @param  array   $params   Список параметров, указанных в вызове блока
 * @param  string  $content  Текст между тегами {extend}..{/extend}
 * @param  mySmarty  $smarty   Ссылка на объект Smarty
 */
function smarty_block_extend($params, $content, Smarty $smarty)
{
	if ( ! array_key_exists('template', $params)) {
		$smarty->trigger_error('Укажите шаблон, от которого наследуетесь!');
	}
	return View::factory($params['template']);
}
