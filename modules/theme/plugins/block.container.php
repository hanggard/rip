<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Создаёт именованные блоки в тексте шаблона
 * 
 * @param  array   $params   Список параметров, указанных в вызове блока
 * @param  string  $content  Текст между тегами {container}..{/container}
 * @param  mySmarty  $smarty   Ссылка на объект Smarty
 */
function smarty_block_container($params, $content, Smarty $smarty)
{
	static $blocks = array();
	if ( ! array_key_exists('name', $params)) {
		$smarty->trigger_error('Не указано имя блока');
	}
	$name = $params['name'];
	if ($content) {
		if ( ! array_key_exists($name, $blocks)) {
			$blocks[$name] = array();
		}
		if ( ! in_array($content, $blocks[$name])) {
			array_push($blocks[$name], $content);
		}
	}
	if (array_key_exists($name, $blocks)) {
		return $blocks[$name][count($blocks[$name]) - 1];
	}
	return '';
}
