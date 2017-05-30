<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1780644760";a:2:{i:0;s:62:"/home/bh59538/public_html/application/views//imagetemplate.tpl";i:1;i:1450022964;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-14 01:09:27
         compiled from "/home/bh59538/public_html/application/views//imagetemplate.tpl" */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="ru" />
		<meta name="keywords" content="страшные картинки, страшные картины, страшные рисунки, страшные изображения" />
		<meta property="og:sitename" content="Страшные истории" />
		<meta property="og:image" content="<?php if (empty($_smarty_tpl->getVariable('og_image')->value)){?>http://kriper.ru/media/images/logo.png<?php }else{  echo $_smarty_tpl->getVariable('og_image')->value; }?>" />
		<?php if ($_smarty_tpl->getVariable('og_description')->value){?>
			<meta property="og:description" content="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('og_description')->value,250),true);?>
" />
		<?php }?>
		<meta name="google-site-verification" content="JjyZV1ucF-XUZRN6lyrsPhJdQHbgEBjWZiY8-kOiX0k" />
		<title><?php if ($_smarty_tpl->getVariable('index')->value){?>Kriper.Ru - Страшные картинки<?php }else{  $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?> | Kriper.Ru - Страшные картинки<?php }?></title>
		<link type="text/css" href="/media/css/style.css.php?20150119" rel="stylesheet" media="all" />
		<?php if ($_smarty_tpl->getVariable('light')->value){?>
			<link type="text/css" href="/media/css/alt.css?20150119" rel="stylesheet" media="all" />
		<?php }?>
		<link rel="icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="shortcut icon" href="/media/images/favicon.ico?20150119" type="image/x-icon">
		<link rel="alternate" type="application/rss+xml" title="Kriper.Ru - Страшные истории" href="http://feeds.feedburner.com/kriperru" />
		<script type="text/javascript" src="/media/js/jquery-1.4.2.min.js.php"></script>
		<script type="text/javascript" src="/media/js/functions.js?20150119"></script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e864c1c1833f709"></script>
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
					<?php if ($_smarty_tpl->getVariable('image_dark_count')->value>0){?>
						<a href="/imagedark">тёмная комната <strong>(<?php echo $_smarty_tpl->getVariable('image_dark_count')->value;?>
)</strong></a>
						&diams;
					<?php }?>
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
					<?php if ($_smarty_tpl->getVariable('light')->value){?>
						<a href="/mode/dark">выключить свет</a>
					<?php }else{ ?>
						<a href="/mode/light">включить свет</a>
					<?php }?>
					<?php if ($_smarty_tpl->getVariable('auth')->value){?>
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
				<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
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