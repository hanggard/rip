<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3995434114";a:2:{i:0;s:60:"/home/bh59538/public_html/application/views//collections.tpl";i:1;i:1449740856;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-12 17:56:08
         compiled from "/home/bh59538/public_html/application/views//collections.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Коллекции<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Коллекции</h2>
		<div id="tags" style="line-height:<?php echo @TAG_FONT_SIZE_MAX;?>
px;">
			<?php  $_smarty_tpl->tpl_vars['collection'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('collections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['collection']->key => $_smarty_tpl->tpl_vars['collection']->value){
?>
				<a href="/collection/<?php echo $_smarty_tpl->getVariable('collection')->value->shortcut;?>
" style="font-size:<?php echo floor(@TAG_FONT_SIZE_MIN + (@TAG_FONT_SIZE_MAX - @TAG_FONT_SIZE_MIN) * ($_smarty_tpl->getVariable('collection')->value->count / $_smarty_tpl->getVariable('max_count')->value));?>
px;"><?php echo $_smarty_tpl->getVariable('collection')->value->name;?>
</a>
			<?php }} ?>
		</div>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>