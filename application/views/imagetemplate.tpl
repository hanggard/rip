<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="ru" />
		<meta name="keywords" content="страшные картинки, страшные картины, страшные рисунки, страшные изображения" />
		<meta property="og:sitename" content="Страшные истории" />
		<meta property="og:image" content="{if empty($og_image)}http://kriper.ru/media/images/logo.png{else}{$og_image}{/if}" />
		{if $og_description}
			<meta property="og:description" content="{$og_description|truncate:250}" />
		{/if}
		<meta name="google-site-verification" content="JjyZV1ucF-XUZRN6lyrsPhJdQHbgEBjWZiY8-kOiX0k" />
		<title>{if $index}Kriper.Ru - Страшные картинки{else}{container name="title"}{/container} | Kriper.Ru - Страшные картинки{/if}</title>
		<link type="text/css" href="/media/css/style.css.php?20150119" rel="stylesheet" media="all" />
		{if $light}
			<link type="text/css" href="/media/css/alt.css?20150119" rel="stylesheet" media="all" />
		{/if}
		<link rel="icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="shortcut icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="alternate" type="application/rss+xml" title="Kriper.Ru - Страшные истории" href="http://feeds.feedburner.com/kriperru" />
		<script type="text/javascript" src="/media/js/jquery-1.4.2.min.js.php"></script>
		<script type="text/javascript" src="/media/js/functions.js?20150119"></script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e864c1c1833f709"></script>
		{container name="script"}{/container}
	</head>
	<body>
		{if ! $pda && ! $pda_agent}<a href="http://theportalwiki.com/wiki/Wheatley/ru" target="_blank" title="Уитли — талисман сайта"><div id="emblem"></div></a>{/if}
		<div id="wrapper">
			{if ! $pda && $pda_agent}
				<div class="upper_disclaimer">
					Рекомендуем перейти на <a href="http://pda.kriper.ru">мобильную версию</a> сайта.
				</div>
			{/if}
			<div id="header">
				<div id="logo">
					<h1><a href="/images">Страшные картинки</a></h1>
				</div>
				<div id="third">
					<a href="http://feeds.feedburner.com/kriperru" target="_blank" title="Наша RSS-лента"><div class="third_item rss"></div></a>
					<a href="http://twitter.com/kriperru" target="_blank" title="Наша страница в Twitter"><div class="third_item twitter"></div></a>
					<a href="http://www.facebook.com/kriper.ru" target="_blank" title="Наша страница в Facebook"><div class="third_item facebook"></div></a>
				</div>
			</div>
			<div id="menu">
				<div id="right_menu">
					&diams;
					<a href="/images">все</a>
					&diams;
					{if $image_dark_count > 0}
						<a href="/imagedark">тёмная комната <strong>({$image_dark_count})</strong></a>
						&diams;
					{/if}
					<a href="/imagetop">самые страшные</a>
					&diams;
					<a href="/imagerandom">случайная</a>
					&diams;
					<a href="/albums">альбомы</a>
					&diams;<br />
					&diams;
					<a href="/forum/">форум</a>
					&diams;
					<a href="http://chatlist.su/kriper/">чат</a>
					&diams;
					<a href="/imageadd">добавить</a>
					&diams;
					{if $light}
						<a href="/mode/dark">выключить свет</a>
					{else}
						<a href="/mode/light">включить свет</a>
					{/if}
					{if $auth}
						&diams;<br />
						{if $cdark_count > 0}
							&diams;
							<a href="/cdark">на конкурс <strong>({$cdark_count})</strong></a>
						{/if}
						&diams;
						<a href="/page/rules">памятка администраторам</a>
						&diams;
						<a href="/logout">выйти из режима администратора (<strong>{$user->name}</strong>)</a>
					{/if}
					&diams;
				</div>
				<div id="left_menu">
					&diams;
					<a href="/">истории</a>
					&diams;
					<a href="/videos">видео</a>
					&diams;
				</div>
				<div class="clear"></div>
			</div>
<!--			<div class="disclaimer">
				<a href="http://kriper.ru/forum/viewtopic.php?f=14&t=7768">Kriper.Ru сменил владельца</a>
			</div>
-->			
			<div id="content">
				{container name="content"}{/container}
			</div>
			<div id="footer_push"></div>
		</div>
		<div id="footer">
			<div class="right">
				<p>E-mail: <a href="mailto:webmaster@kriper.ru">webmaster@kriper.ru</a></p>
				<script type="text/javascript" src="/media/js/liveinternet.js"></script>
			</div>
			<div class="left">
				Страшные истории &copy; 2011 — 2015
			</div>
			<div class="clear"></div>
		</div>
	</body>
</html>