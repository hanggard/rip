<?php

class Shared {

	// Делает компрессию HTML-кода (осторожно, некорректно работает с JS-скриптами!)
	
	public static function compress($html) {
		$compressed_html = preg_replace('/[\r\n\t]+/', ' ', $html);
		$compressed_html = preg_replace('/>[\s]+</', '><', $compressed_html);
		return $compressed_html;
	}

	// Преобразует строку со значением типа SQL TIMESTAMP в PHP-объект time

	public static function timestamp2time($timestamp)
	{
		$year = substr($timestamp, 0, 4);
		$month = substr($timestamp, 5, 2);
		$day = substr($timestamp, 8, 2);
		$hour = substr($timestamp, 11, 2);
		$minute = substr($timestamp, 14, 2);
		$second = substr($timestamp, 17, 2);
		return mktime($hour, $minute, $second, $month, $day, $year);
	}
	
	// Преобразует строку со значением типа SQL DATE в PHP-объект time

	public static function date2time($timestamp)
	{
		$date_items = explode('-', $timestamp);
		if (count($date_items) == 3 && is_numeric($date_items[0]) && is_numeric($date_items[1]) && is_numeric($date_items[2]))
		{
			$year = $date_items[0];
			$month = $date_items[1];
			$day = $date_items[2];
			return mktime(0, 0, 0, $month, $day, $year);		
		}
		else
		{
			return FALSE;
		}
	}

	// "Очищает" заданный текст, экранируя опасные символы (только для плоского текста, т. к. HTML-тэги также экранируются)

	public static function purify_plain_text($dirty_text)
	{		
		$clean_text = Shared::replace_quotes($dirty_text);		 
		$clean_text = str_replace("– ", "— ", $clean_text);
		$clean_text = str_replace("- ", "— ", $clean_text);
		$clean_text = htmlspecialchars($clean_text);
		$clean_text = str_replace(array("\r", "\n"), '', $clean_text);
		$clean_text = trim($clean_text);
		return $clean_text;
	}
	
	// "Очищает" заданный текст, экранируя опасные символы (отсутствует замена кавычек)

	public static function purify_plain_text_without_quotes($dirty_text)
	{		
		$clean_text = str_replace("– ", "— ", $dirty_text);
		$clean_text = str_replace("- ", "— ", $clean_text);
		$clean_text = htmlspecialchars($clean_text);
		$clean_text = str_replace(array("\r", "\n"), '', $clean_text);
		$clean_text = trim($clean_text);
		return $clean_text;
	}	
	
	// "Очищает" заданный многострочный текст, экранируя опасные символы (только для плоского текста, т. к. HTML-тэги также экранируются)
	
	public static function purify_multiline_plain_text($dirty_text)
	{		
		$clean_text = Shared::replace_quotes($dirty_text);
		$clean_text = str_replace("– ", "— ", $clean_text);
		$clean_text = str_replace("- ", "— ", $clean_text);
		$clean_text = htmlspecialchars($clean_text);
		$clean_text = trim($clean_text);
		return $clean_text;
	}
	
	// "Очищает" заданный многострочный текст, экранируя опасные символы (отсутствует замена кавычек)
	
	public static function purify_multiline_plain_text_without_quotes($dirty_text)
	{		
		$clean_text = str_replace("– ", "— ", $dirty_text);
		$clean_text = str_replace("- ", "— ", $clean_text);
		$clean_text = htmlspecialchars($clean_text);
		$clean_text = trim($clean_text);
		return $clean_text;
	}
	
	// Заменяет одинарные кавычки в заданном тексте на двойные

	public static function replace_quotes($text)
	{
		return preg_replace ("#([^=])\"([^\"]+)\"#", "\\1«\\2»", $text);
	}
	
	// Генерирует случайную строку заданной длины
	
	public static function generate_string($length = 16)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$num_chars = strlen($chars);
		$string = '';
		for ($i = 0; $i < $length; $i++)
		{
			$string .= substr($chars, rand(1, $num_chars) - 1, 1);
		}
		return $string;
	}
	
	// Сокращает длинный текст

	public static function truncate_text($string, $length = 80, $etc = '...', $break_words = false, $middle = false)
	{
		if ($length == 0)
			return '';

		if (is_callable('mb_strlen')) {
			if (mb_strlen($string) > $length) {
				$length -= min($length, mb_strlen($etc));
				if (!$break_words && !$middle) {
					$string = mb_ereg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length + 1), 'p');
				} 
				if (!$middle) {
					return mb_substr($string, 0, $length) . $etc;
				} else {
					return mb_substr($string, 0, $length / 2) . $etc . mb_substr($string, - $length / 2);
				} 
			} else {
				return $string;
			} 
		} else {
			if (strlen($string) > $length) {
				$length -= min($length, strlen($etc));
				if (!$break_words && !$middle) {
					$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
				} 
				if (!$middle) {
					return substr($string, 0, $length) . $etc;
				} else {
					return substr($string, 0, $length / 2) . $etc . substr($string, - $length / 2);
				} 
			} else {
				return $string;
			} 
		} 
	}

	// Транслитерирует текст из русского в английский
	
	public static function rus2eng($rus_text)
	{
		$eng_text = strtr($rus_text, array(
			'А' => 'A',
			'а' => 'a',
			'Б' => 'B',
			'б' => 'b',
			'В' => 'V',
			'в' => 'v',
			'Г' => 'G',
			'г' => 'g',
			'Д' => 'D',
			'д' => 'd',
			'Е' => 'E',
			'е' => 'e',
			'Ё' => 'E',
			'ё' => 'e',
			'Ж' => 'Zh',
			'ж' => 'zh',
			'З' => 'Z',
			'з' => 'z',
			'И' => 'I',
			'и' => 'i',
			'Й' => 'Y',
			'й' => 'y',
			'К' => 'K',
			'к' => 'k',
			'Л' => 'L',
			'л' => 'l',
			'М' => 'M',
			'м' => 'm',
			'Н' => 'N',
			'н' => 'n',
			'О' => 'O',
			'о' => 'o',
			'П' => 'P',
			'п' => 'p',
			'Р' => 'R',
			'р' => 'r',
			'С' => 'S',
			'с' => 's',
			'Т' => 'T',
			'т' => 't',
			'У' => 'U',
			'у' => 'u',
			'Ф' => 'F',
			'ф' => 'f',
			'Х' => 'H',
			'х' => 'h',
			'Ц' => 'Ts',
			'ц' => 'ts',
			'Ч' => 'Ch',
			'ч' => 'ch',
			'Ш' => 'Sh',
			'ш' => 'sh',
			'Щ' => 'Sh',
			'щ' => 'sh',
			'Ъ' => '',
			'ъ' => '',
			'Ы' => 'Y',
			'ы' => 'y',
			'Ь' => '',
			'ь' => '',
			'Э' => 'E',
			'э' => 'e',
			'Ю' => 'Yu',
			'ю' => 'yu',
			'Я' => 'Ya',
			'я' => 'ya',
			' ' => '-',
			'_' => '-',
			'(' => '',
			')' => '',
			',' => '',
			'.' => '',
			'?' => '',
			'!' => '',			
		));
		return $eng_text;
	}
	
	// Недостающая в стандартной поставке PHP функция обработки строки
	
	public static function mb_str_ireplace($co, $naCo, $wCzym, $encoding = 'UTF-8')
	{ 
		$wCzymM = mb_strtolower($wCzym, $encoding); 
		$coM    = mb_strtolower($co, $encoding); 
		$offset = 0; 

		while(!is_bool($poz = mb_stripos($wCzymM, $coM, $offset, $encoding)))
		{ 
			$offset = $poz + mb_strlen($naCo, $encoding);
			$wCzym = mb_substr($wCzym, 0, $poz, $encoding). $naCo .mb_substr($wCzym, $poz + mb_strlen($co, $encoding), -1, $encoding);
			$wCzymM = mb_strtolower($wCzym, $encoding);
		}

		return $wCzym;
	}
	
	// Определяет, является ли пользовательское устройство мобильной платформой
	
	public static function is_pda($useragent)
	{
		if (strstr($useragent,'iPhone') || strstr($useragent,'iPod'))
			return TRUE;
		return (preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|meego.+mobile|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));
	}
	
	// Определяет, является ли пользовательское устройство iPad'ом
	
	public static function is_ipad($useragent)
	{
		return (stripos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipad') !== false);
	}
	
	// Определяет, является ли пользовательское устройство Android'ом
	
	public static function is_android($useragent)
	{
		return (stripos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android') !== false);
	}
	
	// Выполняет POST-запрос с заданными данными на заданный адрес
	
	public static function post_request($url, $data, $referer = '')
	{
	
		// Convert the data array into URL Parameters like a=b&foo=bar etc.
		$data = http_build_query($data, '', '&');
		
		// parse the given URL
		$url = parse_url($url);
	 
		if ($url['scheme'] != 'http') {
			die('Error: Only HTTP requests are supported!');
		}
	 
		// extract host and path:
		$host = $url['host'];
		$path = $url['path'];
	 
		// open a socket connection on port 80 - timeout: 30 sec
		$fp = fsockopen($host, 80, $errno, $errstr, 30);
	 
		if ($fp){
	 
			// send the request headers:
			fputs($fp, "POST $path HTTP/1.1\r\n");
			fputs($fp, "Host: $host\r\n");
	 
			if ($referer != '')
				fputs($fp, "Referer: $referer\r\n");
	 
			fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
			fputs($fp, "Content-length: ". strlen($data) ."\r\n");
			fputs($fp, "Connection: close\r\n\r\n");
			fputs($fp, $data);
	 
			$result = ''; 
			while(!feof($fp)) {
				// receive the results of the request
				$result .= fgets($fp, 128);
			}
		}
		else { 
			return array(
				'status' => 'err', 
				'error' => "$errstr ($errno)"
			);
		}
	 
		// close the socket connection:
		fclose($fp);
	 
		// split the result header from the content
		$result = explode("\r\n\r\n", $result, 2);
		$header = isset($result[0]) ? $result[0] : '';
		$content = isset($result[1]) ? $result[1] : '';
	 
		// return as structured array:
		return array(
			'status' => 'ok',
			'header' => $header,
			'content' => $content
		);
		
	}
	
}