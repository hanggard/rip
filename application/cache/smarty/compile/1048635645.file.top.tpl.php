<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1048635645";a:2:{i:0;s:52:"/home/bh59538/public_html/application/views//top.tpl";i:1;i:1449740862;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:01:44
         compiled from "/home/bh59538/public_html/application/views//top.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Самые страшные<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Самые страшные за последнее время</h2>
		<div class="tales">
			<?php  $_smarty_tpl->tpl_vars['tale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recent_tales')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recent_tales']['index']=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tale']->key => $_smarty_tpl->tpl_vars['tale']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recent_tales']['index']++;
?>
				<?php $_template = new Smarty_Template ("includes/tale.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"0");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
				<?php if (!$_smarty_tpl->getVariable('pda')->value&&$_smarty_tpl->getVariable('smarty')->value['foreach']['recent_tales']['index']==2){?>
					<div class="banner"><a href="http://g-starkov.ru" title="Сайт Георгия Старкова" target="_blank"><img src="/media/images/banner.png?20140319" /></a></div>
					<div class="blank_20"></div>
				<?php }?>
			<?php }} ?>
		</div>
		<h2>Самые страшные за всё время</h2>
		<div class="tales">
			<?php  $_smarty_tpl->tpl_vars['tale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ever_tales')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tale']->key => $_smarty_tpl->tpl_vars['tale']->value){
?>
				<?php $_template = new Smarty_Template ("includes/tale.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"0");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
			<?php }} ?>
		</div>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>