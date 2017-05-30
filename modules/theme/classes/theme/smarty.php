<?php defined('SYSPATH') OR die('No direct access allowed.');

require_once Kohana::find_file('vendor', 'smarty/Smarty.class');

abstract class Theme_Smarty {

	protected static $instance;

	public static function instance()
	{
		if (self::$instance === NULL) {
			$smarty = new Smarty();
			$config = Kohana::config('smarty');

			$plugins_dir = array(
				APPPATH.'plugins'.DIRECTORY_SEPARATOR,
				MODPATH.'theme'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR,
			);
			foreach (Kohana::modules() as $path)
			{
				$plugins_dir[] = $path.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR;
			}

			$smarty->template_dir  = array(APPPATH.'views', DOCROOT.'themes'.DIRECTORY_SEPARATOR.Theme::current());
			$smarty->plugins_dir   = $plugins_dir;
			$smarty->compile_dir   = $config->compile_dir;
			$smarty->cache_dir     = $config->cache_dir;
			$smarty->caching       = $config->caching;
			$smarty->force_compile = $config->force_compile;
			$smarty->security      = $config->security;

			$smarty->allow_php_tag = TRUE;

			$smarty->autoload_filters = array(
				'pre'    => $config->pre_filters,
				'post'   => $config->post_filters,
				'output' => $config->output_filters
			);

			self::$instance = $smarty;
		}

		return self::$instance;
	}

} // End Theme_Smarty
