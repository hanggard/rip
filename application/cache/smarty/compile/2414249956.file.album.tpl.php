<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F2414249956";a:2:{i:0;s:54:"/home/bh59538/public_html/application/views//album.tpl";i:1;i:1449740856;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:36:59
         compiled from "/home/bh59538/public_html/application/views//album.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Картинки из альбома «<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('upper',array($_smarty_tpl->getVariable('album')->value->name),true);?>
»<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<script type="text/javascript">
			$(document).ready(function(){
				init_images_list();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Картинки из альбома «<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('upper',array($_smarty_tpl->getVariable('album')->value->name),true);?>
»</h2>
		<?php if (count($_smarty_tpl->getVariable('images')->value)>0){?>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

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
					<?php $_template = new Smarty_Template ("includes/image.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('last',$_smarty_tpl->getVariable('last')->value);$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
				<?php }} ?>
				<div class="clear"></div>
			</div>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

		<?php }else{ ?>
			<p>Альбом пуст.</p>
		<?php }?>		
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>