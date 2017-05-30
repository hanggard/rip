<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1505118012";a:2:{i:0;s:60:"/home/bh59538/public_html/application/views//rss/channel.tpl";i:1;i:1449740877;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:17:22
         compiled from "/home/bh59538/public_html/application/views//rss/channel.tpl" */ ?>
<?php echo '<?xml';?> version="1.0" encoding="UTF-8"<?php echo '?>';?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Страшные истории</title>
		<link>http://kriper.ru</link>
		<atom:link href="http://kriper.ru/rss" rel="self" type="application/rss+xml" />
		<description>Kriper.Ru - страшные истории каждый день</description>
		<lastBuildDate><?php echo $_smarty_tpl->getVariable('date')->value;?>
</lastBuildDate>		
		<language>ru</language>
		<?php echo $_smarty_tpl->getVariable('items')->value;?>

	</channel>
</rss>