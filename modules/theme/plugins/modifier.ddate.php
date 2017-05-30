<?php

function smarty_modifier_ddate($timestamp, $granularity = 1, $use_terms = true, $format = 'j M Y, H:i') {

	$original   = is_numeric($timestamp) ? $timestamp : strtotime($timestamp);
	$tense      = time() >= $original ? 'past' : 'future';
	$difference = abs(time() - $original);

	if ($difference >= 259200)
	{
		if (date('Y') == date('Y', $original)) {
			$format = preg_replace('/o| o|y| y|Y| Y/', '', $format);
		}
		$month  = abs(date('n', $original)-1);
		$rus    = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
		$rus2   = array('январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
		$format = preg_replace(array("'M'", "'F'"), array($rus[$month], $rus2[$month]), $format);
		return date($format, $original);
	}
	else
	{
		$units = array(
			'years' => 31536000,
			'weeks' => 604800,
			'days'  => 86400,
			'hours' => 3600,
			'min'   => 60,
			'sec'   => 1
		);
		$titles = array(
			'years' => array('год',     'года',    'лет'),
			'weeks' => array('неделя',  'недели',  'недель'),
			'days'  => array('день',    'дня',     'дней'),
			'hours' => array('час',     'часа',    'часов'),
			'min'   => array('минуту',  'минуты',  'минут'),
			'sec'   => array('секунда', 'секунды', 'секунд')
		);
		$output    = '';
		foreach ($units as $key => $value) {
			if ($difference >= $value AND $granularity > 0) {
				$number  = floor($difference / $value);
				$output .= ($output ? ($granularity == 1 ? ' и ' : ' ') : '').$number.' ';
				$number  = $number > 20 ? $number % 10 : $number;

				$output .= $number == 1                 ? $titles[$key][0] : '';
				$output .= $number >= 2 && $number <= 4 ? $titles[$key][1] : '';
				$output .= $number >  4 || $number <  1 ? $titles[$key][2] : '';

				$difference %= $value;
				$granularity--;
			}
		}
		$output = trim($tense == 'future' ? 'через '.$output : $output.' назад');
		if ($use_terms) {
			$terms = array(
				'назад'        => 'только что',
				'через'        => 'сию минуту',
				'через 1 день' => 'завтра',
				'1 день назад' => 'вчера',
				'2 дня назад'  => 'позавчера'
			);
			if (isset($terms[$output])) {
				$output = $terms[$output];
			}
		}
		return $output;
	}

	
}

?>