<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1599273134";a:2:{i:0;s:57:"/home/bh59538/public_html/application/views//rss/item.tpl";i:1;i:1449740878;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:17:22
         compiled from "/home/bh59538/public_html/application/views//rss/item.tpl" */ ?>
<item>
	<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
	<link><?php echo $_smarty_tpl->getVariable('link')->value;?>
</link>
	<guid isPermaLink="true"><?php echo $_smarty_tpl->getVariable('link')->value;?>
</guid>
	<description><![CDATA[<?php echo $_smarty_tpl->getVariable('description')->value;?>
]]></description>
	<pubDate><?php echo $_smarty_tpl->getVariable('date')->value;?>
</pubDate>
</item>