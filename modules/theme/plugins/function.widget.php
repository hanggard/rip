<?php defined('SYSPATH') OR die('No direct access allowed.');

function smarty_function_widget($params, $smarty, $template)
{
	$name   = array_shift($params);
	$widget =  Widget::factory($name);
	return call_user_func_array(array($widget, 'execute'), $params);
}
