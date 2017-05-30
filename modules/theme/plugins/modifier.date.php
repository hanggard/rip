<?php defined('SYSPATH') OR die('No direct access allowed.');

function smarty_modifier_date($time = '', $format = 'j M Y г.', $cut_year = false) {
	if (empty($time)) {
		$time = time();
	}
	$time = strtotime($time);
	if ($cut_year && date('Y') == date('Y', $time)) {
		$format = preg_replace('/o|y|Y/', '', $format);
	}
	$month   = abs(date('n', $time)-1);
	$weekday = date('w', $time);
	$rus     = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$rus2    = array('январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
	$rus3    = array('вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб');
	$format  = preg_replace(array("'M'", "'F'", "'D'"), array($rus[$month], $rus2[$month], $rus3[$weekday]), $format);
	return date($format, $time);
}
