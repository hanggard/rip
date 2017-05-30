<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F2819130752";a:2:{i:0;s:60:"/home/bh59538/public_html/application/views//pages/about.tpl";i:1;i:1449740877;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 17:14:42
         compiled from "/home/bh59538/public_html/application/views//pages/about.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>О проекте<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>О проекте</h2>
		<p><i>Итак, дети, все собрались у костра? Хорошо, теперь придвиньтесь поближе к огню и не оглядывайтесь назад, потому что я собираюсь рассказать вам очень страшную историю...</i></p>
		<br />
		<p>Наш сайт создан для того, чтобы стать коллекцией лучших страшных историй и жутких картинок. Каждый день мы публикуем тщательно отобранные тексты и изображения, способные вызвать холодный пот у любого смельчака.</p>
		<p>Читайте нас и пугайтесь на здоровье. Помните: в том, чтобы бояться, нет ничего плохого, ведь лучший способ борьбы со страхами — это не избегать их, а встретиться с ними лицом к лицу.</p>
		<p>Знаете хорошие страшные истории или картинки, которых нет на нашем сайте? Поделитесь ими с нами, чтобы мы могли предоставить их на суд читателей.</p>
		<?php if ($_smarty_tpl->getVariable('pda')->value){?>
			<p>Если вы заметили на сайте тексты или изображения, защищённые авторским правом, пожалуйста, напишите об этом на адрес электронной почты <a href="mailto:webmaster@kriper.ru">webmaster@kriper.ru</a>. По желанию авторов или правообладателей мы можем поставить ссылку на первоисточник либо убрать текст или картинку с нашего сайта.</p>
		<?php }else{ ?>
			<p>Если вы заметили на сайте тексты или изображения, защищённые авторским правом, пожалуйста, напишите об этом в наш форум или на адрес электронной почты <a href="mailto:webmaster@kriper.ru">webmaster@kriper.ru</a>. По желанию авторов или правообладателей мы можем поставить ссылку на первоисточник либо убрать текст или картинку с нашего сайта.</p>
		<?php }?>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>