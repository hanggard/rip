<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3881585608";a:2:{i:0;s:57:"/home/bh59538/public_html/application/views//template.tpl";i:1;i:1452917849;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2016-01-16 13:17:31
         compiled from "/home/bh59538/public_html/application/views//template.tpl" */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="ru" />
		<?php if ($_smarty_tpl->getVariable('pda')->value){?>
			<meta name="robots" content="noindex" />
			<meta name="viewport" content="width=device-width">
		<?php }?>
		<meta name="keywords" content="страшные истории, страшилки, мистические истории, мистика, ужасные истории, страх, ужас, ужастики, неопознанное, необъяснимое" />
		<meta property="og:sitename" content="Страшные истории" />
		<meta property="og:image" content="http://kriper.ru/media/images/logo.png" />
		<?php if ($_smarty_tpl->getVariable('og_description')->value){?>
			<meta property="og:description" content="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('og_description')->value,250),true);?>
" />
		<?php }?>
		<meta name="google-site-verification" content="JjyZV1ucF-XUZRN6lyrsPhJdQHbgEBjWZiY8-kOiX0k" />
		<title><?php if ($_smarty_tpl->getVariable('index')->value){?>Kriper.Ru - Страшные истории<?php }else{  $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?> | Kriper.Ru - Страшные истории<?php }?></title>
		<link type="text/css" href="/media/css/style.css.php?20150119" rel="stylesheet" media="all" />
		<?php if ($_smarty_tpl->getVariable('pda')->value){?>
			<link type="text/css" href="/media/css/pda.css?20150119" rel="stylesheet" media="all" />
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('light')->value){?>
			<link type="text/css" href="/media/css/alt.css?20150119" rel="stylesheet" media="all" />
		<?php }?>
		<link rel="icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="shortcut icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="alternate" type="application/rss+xml" title="Kriper.Ru - Страшные истории" href="http://feeds.feedburner.com/kriperru" />
		<script type="text/javascript" src="/media/js/jquery-1.4.2.min.js.php"></script>
		<?php if ($_smarty_tpl->getVariable('pda')->value){?>
			<script type="text/javascript" src="/media/js/functions-pda.js"></script>
		<?php }else{ ?>			
			<script type="text/javascript" src="/media/js/functions.js?20150119"></script>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e864c1c1833f709"></script>
		<?php }?>
		<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	</head>
	<body>
		<?php if (!$_smarty_tpl->getVariable('pda')->value&&!$_smarty_tpl->getVariable('pda_agent')->value){?><a href="http://theportalwiki.com/wiki/Wheatley/ru" target="_blank" title="Уитли — талисман сайта"><div id="emblem"></div></a><?php }?>
		<div id="wrapper">
			<?php if (!$_smarty_tpl->getVariable('pda')->value&&$_smarty_tpl->getVariable('pda_agent')->value){?>
				<div class="upper_disclaimer">
					Рекомендуем перейти на <a href="http://pda.kriper.ru">мобильную версию</a> сайта.
				</div>
			<?php }?>
			<div id="header">
				<div id="logo">
					<h1><a href="/">Страшные истории</a></h1>
				</div>
				<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
					<div id="third">
						<a href="http://feeds.feedburner.com/kriperru" target="_blank" title="Наша RSS-лента"><div class="third_item rss"></div></a>
						<a href="http://twitter.com/kriperru" target="_blank" title="Наша страница в Twitter"><div class="third_item twitter"></div></a>
						<a href="http://www.facebook.com/kriper.ru" target="_blank" title="Наша страница в Facebook"><div class="third_item facebook"></div></a>
					</div>
				<?php }?>
			</div>
			<div id="menu">
				<div id="right_menu">
					<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
						&diams;
						<a href="/">все</a>
						&diams;
						<?php if ($_smarty_tpl->getVariable('dark_count')->value>0){?>
							<a href="/dark">тёмная комната <strong>(<?php echo $_smarty_tpl->getVariable('dark_count')->value;?>
)</strong></a>
							&diams;
						<?php }?>
						<a href="/top">самые страшные</a>
						&diams;
						<a href="/random">случайная</a>
						&diams;
						<a href="/tags">метки</a>
						&diams;
						<a href="/search">поиск</a>
						&diams;
						<a href="/page/about">о проекте</a>
						&diams;<br />
						&diams;
						<a href="/forum/">форум</a>
						&diams;
						<a href="http://chatlist.su/kriper/">чат</a>
						&diams;
						<a href="/add">добавить</a>
						&diams;
						<a href="http://pda.kriper.ru">мобильная версия</a>
						&diams;
						<?php if ($_smarty_tpl->getVariable('light')->value){?>
							<a href="/mode/dark">выключить свет</a>
						<?php }else{ ?>
							<a href="/mode/light">включить свет</a>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('auth')->value&&!$_smarty_tpl->getVariable('pda')->value){?>
							&diams;<br />
							<?php if ($_smarty_tpl->getVariable('cdark_count')->value>0){?>
								&diams;
								<a href="/cdark">на конкурс <strong>(<?php echo $_smarty_tpl->getVariable('cdark_count')->value;?>
)</strong></a>
							<?php }?>
							&diams;
							<a href="/page/rules">памятка администраторам</a>
							&diams;
							<a href="/logout">выйти из режима администратора (<strong><?php echo $_smarty_tpl->getVariable('user')->value->name;?>
</strong>)</a>
						<?php }?>
						&diams;
					<?php }?>
				</div>
				<div id="left_menu">
					<?php if ($_smarty_tpl->getVariable('pda')->value){?>
						<a href="/">все</a>
						<?php if ($_smarty_tpl->getVariable('dark_count')->value>0){?>
							<a href="/dark">тёмная (<?php echo $_smarty_tpl->getVariable('dark_count')->value;?>
)</a>
						<?php }?>
						<a href="/top">страшные</a>
						<a href="/random">случайная</a>
						<a href="/tags">метки</a>
						<a href="/search">поиск</a>
						<?php if ($_smarty_tpl->getVariable('light')->value){?>
							<a href="/mode/dark">тьма</a>
						<?php }else{ ?>
							<a href="/mode/light">свет</a>
						<?php }?>
					<?php }else{ ?>
						&diams;
						<a href="/images">картинки</a>
						&diams;
						<a href="/videos">видео</a>
						&diams;
					<?php }?>
				</div>
				<div class="clear"></div>		
			</div>
			
<!--			<div class="disclaimer">
				<a href="http://kriper.ru/forum/viewtopic.php?f=2&t=7858">Набираем короткие истории</a>
			</div>
-->		
			<div id="content">
				<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
			</div>
			<div id="footer_push"></div>
		</div>
		<div id="footer">
			<?php if ($_smarty_tpl->getVariable('pda')->value){?>
				<div class="left">
					<script type="text/javascript" src="/media/js/liveinternet-pda.js"></script>
				</div>
			<?php }else{ ?>
				<div class="right">
					<p>E-mail: <a href="mailto:webmaster@kriper.ru">webmaster@kriper.ru</a></p>
					<script type="text/javascript" src="/media/js/liveinternet.js"></script>
				</div>
				<div class="left">
					Страшные истории &copy; 2011 — 2015
				</div>
			<?php }?>
			<div class="clear"></div>
		</div>
	</body>
</html>
