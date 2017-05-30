<?php defined('SYSPATH') OR die('No direct access allowed.');

class Theme_Theme {

	public static function current()
	{
		$theme = Kohana::config('theme.current');
		return $theme == NULL ? 'default' : $theme;
	}

	public static function path($theme = NULL)
	{
		$theme = $theme === NULL ? Theme::current() : $theme;
		$path  = DOCROOT.'themes'.DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR;
		if ( ! is_dir($path))
			return FALSE;

		return $path;
	}

	public static function all_themes()
	{
		$d      = dir(DOCROOT.'themes');
		$result = array();
		while (($entry = $d->read()) !== FALSE)
		{
			$info = Theme::info($entry);
			if ($info !== FALSE)
			{
				$result[$entry] = $info;
			}
		}
		return $result;
	}

	public static function files($theme = NULL)
	{
		$theme  = $theme == NULL ? Theme::current() : $theme;
		$result = Theme::list_files('', $theme);
		sort($result);
		return $result;
	}

	private static function list_files($dir, $theme)
	{
		$path   = Theme::path($theme).$dir;
		$d      = dir($path);
		$result = array();
		while (($entry = $d->read()) !== FALSE)
		{
			if (is_dir($path.$entry) AND $entry != '.' AND $entry != '..')
			{
				$result = array_merge($result, Theme::list_files($dir.$entry.DIRECTORY_SEPARATOR, $theme));
			}
			elseif (is_file($path.$entry))
			{
				$result[] = $dir.$entry;
			}
		}
		return $result;
	}

	public static function info($theme)
	{
		$path = Theme::path($theme);
		if ( ! $path OR ! is_file($path.'info.txt'))
			return FALSE;

		$info = array(
			'name'    => $theme,
			'title'   => $theme
		);

		if (is_file($path.'preview.jpg'))
		{
			$info['preview'] = Theme::url('preview.jpg', $theme);
		}
		foreach (file($path.'info.txt') as $line)
		{
			if (strpos($line, ':') === FALSE)
				continue;

			list($name, $value) = explode(':', $line, 2);
			switch (trim(strtolower($name)))
			{
				case 'theme name':
					$info['title'] = trim($value);
				break;
				case 'description':
					$info['description'] = trim($value);
				break;
				case 'author':
					$info['author'] = trim($value);
				break;
			}
		}

		return $info;
	}

	public static function template_info($file, $theme = NULL)
	{
		return array();
	}

	public static function url($file, $theme = NULL)
	{
		$theme = $theme == NULL ? Theme::current() : $theme;
		return '/themes/'.$theme.'/'.$file;
	}

} // End Theme_Theme
