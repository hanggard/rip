<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3785747124";a:2:{i:0;s:53:"/home/bh59538/public_html/application/views//dark.tpl";i:1;i:1449740860;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 15:57:41
         compiled from "/home/bh59538/public_html/application/views//dark.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Тёмная комната<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Тёмная комната</h2>
		<div class="disclaimer">
			В тёмную комнату попадают истории, присланные читателями сайта.<br />
			Если история хорошая, она будет отредактирована и перемещена в основную ленту.<br />
			В противном случае история будет удалена.
		</div>
		<?php if (count($_smarty_tpl->getVariable('tales')->value)>0){?>
			<div class="tales">
				<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

				<?php  $_smarty_tpl->tpl_vars['tale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tales')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tale']->key => $_smarty_tpl->tpl_vars['tale']->value){
?>
					<?php $_template = new Smarty_Template ("includes/tale.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"1");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
				<?php }} ?>
				<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

			</div>
		<?php }else{ ?>
			Пока в тёмной комнате нет историй...
		<?php }?>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>