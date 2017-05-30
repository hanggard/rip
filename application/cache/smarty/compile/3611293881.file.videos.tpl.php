<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3611293881";a:2:{i:0;s:55:"/home/bh59538/public_html/application/views//videos.tpl";i:1;i:1449740860;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:02:11
         compiled from "/home/bh59538/public_html/application/views//videos.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>		
		<script type="text/javascript">
			$(document).ready(function(){
				init_video_vote_buttons();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<div class="videos">
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

			<?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
				<?php $_template = new Smarty_Template ("includes/video.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"1");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
			<?php }} ?>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

		</div>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>