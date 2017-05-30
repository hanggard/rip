<?php defined('SYSPATH') or die('No direct script access.');

require_once(APPPATH.'constants.php');

define('DEBUG_MODE', FALSE);

date_default_timezone_set('Asia/Yakutsk');

spl_autoload_register(array('Kohana', 'auto_load'));

Kohana::init(array(
	'base_url'   => '/',
	'index_file' => ''
));

Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));
Kohana::$config->attach(new Kohana_Config_File);
Kohana::modules(array(
	'captcha'    => MODPATH.'captcha',
	'database'   => MODPATH.'database',
	'image'      => MODPATH.'image',
	'pagination' => MODPATH.'pagination',
	'orm'        => MODPATH.'orm',
	'theme'      => MODPATH.'theme',
));

Route::set('robots', 'robots.txt')
	->defaults(array(
		'controller' => 'robots',
		'action'     => 'index',
	));
Route::set('tale', 'tale(/<param1>)')
	->defaults(array(
		'controller' => 'tale',
		'action'     => 'index',
	));
Route::set('ctale', 'ctale(/<param1>)')
	->defaults(array(
		'controller' => 'ctale',
		'action'     => 'index',
	));
Route::set('tag', 'tag(/<param1>)')
	->defaults(array(
		'controller' => 'tag',
		'action'     => 'index',
	));
Route::set('image', 'image(/<param1>)')
	->defaults(array(
		'controller' => 'image',
		'action'     => 'index',
	));
Route::set('album', 'album(/<param1>)')
	->defaults(array(
		'controller' => 'album',
		'action'     => 'index',
	));
Route::set('video', 'video(/<param1>)')
	->defaults(array(
		'controller' => 'video',
		'action'     => 'index',
	));
Route::set('collection', 'collection(/<param1>)')
	->defaults(array(
		'controller' => 'collection',
		'action'     => 'index',
	));
Route::set('page', 'page(/<param1>)')
	->defaults(array(
		'controller' => 'page',
		'action'     => 'index',
	));
Route::set('default', '(<controller>(/<action>(/<param1>(/<param2>))))')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'index',
	));
Route::set('foobar', '<catcher>', array('catcher' => '.*'))
    ->defaults(array(
        'controller' => 'error',
        'action' => '404',
));
	
$request = Request::instance();
try
{
	$request->execute();
}
catch (Kohana_Exception403 $e)
{
	$request = Request::factory('error/403')->execute();
}
catch (Kohana_Exception404 $e)
{
	$request = Request::factory('error/404')->execute();
}
catch (Kohana_Exception500 $e)
{
	$request = Request::factory('error/500')->execute();
}
catch (Kohana_Request_Exception $e)
{
	$request = Request::factory('error/404')->execute();
}
catch (ReflectionException $e)
{
	$request = Request::factory('error/404')->execute();
}
catch (Exception $e)
{
	if (DEBUG_MODE)
	{
		echo '<pre>';
		print_r($e);
		echo '</pre>';
	}
	else
	{
		$request = Request::factory('error/500')->execute();	
	}
}

$request->send_headers();

$gzip_enabled = FALSE;
if ($request->controller == 'captcha' || $request->controller == 'rss')
	$gzip_enabled = FALSE;
if ($gzip_enabled)
	ob_start ('ob_gzhandler');
echo $request->response;
if ($gzip_enabled)
	ob_end_flush();