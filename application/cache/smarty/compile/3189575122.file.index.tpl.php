<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3189575122";a:2:{i:0;s:54:"/home/bh59538/public_html/application/views//index.tpl";i:1;i:1449740858;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 15:54:42
         compiled from "/home/bh59538/public_html/application/views//index.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
			<div class="images">
				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['index']=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['index']++;
?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['images']['index'] % 4==3){?>
						<?php $_smarty_tpl->assign('last',1,null,null);?>
					<?php }else{ ?>
						<?php $_smarty_tpl->assign('last',0,null,null);?>
					<?php }?>
					<?php $_template = new Smarty_Template ("includes/image_reduced.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('last',$_smarty_tpl->getVariable('last')->value);$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
				<?php }} ?>
				<div class="clear"></div>
			</div>
		<?php }?>
		<div class="tales">
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

			<?php  $_smarty_tpl->tpl_vars['tale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tales')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tales']['index']=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tale']->key => $_smarty_tpl->tpl_vars['tale']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tales']['index']++;
?>
				<?php $_template = new Smarty_Template ("includes/tale.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"1");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
				<?php if (!$_smarty_tpl->getVariable('pda')->value&&$_smarty_tpl->getVariable('smarty')->value['foreach']['tales']['index']==2){?>
					<div class="banner"><a href="http://g-starkov.ru" title="Сайт Георгия Старкова" target="_blank"><img src="/media/images/banner.png?20140319" /></a></div>
					<div class="blank_20"></div>
				<?php }?>
			<?php }} ?>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

		</div>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>