<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3595223583";a:2:{i:0;s:52:"/home/bh59538/public_html/application/views//tag.tpl";i:1;i:1449740859;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:20:24
         compiled from "/home/bh59538/public_html/application/views//tag.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Истории с меткой «<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('upper',array($_smarty_tpl->getVariable('tag')->value->text),true);?>
»<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Истории с меткой «<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('upper',array($_smarty_tpl->getVariable('tag')->value->text),true);?>
»</h2>
		<?php if (count($_smarty_tpl->getVariable('tales')->value)>0){?>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

			<div class="tales">
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
			</div>
			<?php echo $_smarty_tpl->getVariable('pager')->value->render();?>

		<?php }else{ ?>
			<p>Историй с такой меткой нет на сайте.</p>
		<?php }?>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>