<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1565067813";a:2:{i:0;s:55:"/home/bh59538/public_html/application/views//search.tpl";i:1;i:1449740858;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:11:37
         compiled from "/home/bh59538/public_html/application/views//search.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); if (empty($_smarty_tpl->getVariable('query')->value)){?>Поиск<?php }else{ ?>Результаты поиска по запросу «<?php echo $_smarty_tpl->getVariable('query')->value;?>
»<?php } $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2><?php if (empty($_smarty_tpl->getVariable('query')->value)){?>Поиск<?php }else{ ?>Результаты поиска<?php }?></h2>
		<?php if ($_smarty_tpl->getVariable('error')->value){?>
			<div class="error">
				Ваш запрос слишком короткий (менее <?php echo @SEARCH_QUERY_LENGTH_MIN;?>
 знаков).
			</div>
		<?php }?>
		<form method="get">
			<?php if ($_smarty_tpl->getVariable('pda')->value){?>
				<input type="text" class="short_search_input" name="query" value="<?php echo $_smarty_tpl->getVariable('query')->value;?>
" />
			<?php }else{ ?>
				<input type="text" class="search_input" name="query" value="<?php echo $_smarty_tpl->getVariable('query')->value;?>
" />
			<?php }?>
			<input type="submit" class="search_button" value="Поиск" />
			<div class="blank_10"></div>
			<div class="blank_10"></div>
		</form>
		<?php if (!empty($_smarty_tpl->getVariable('query')->value)){?>
			<?php if (count($_smarty_tpl->getVariable('tales')->value)>0){?>
				<div class="tales">
					<?php  $_smarty_tpl->tpl_vars['tale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tales')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tale']->key => $_smarty_tpl->tpl_vars['tale']->value){
?>
						<?php $_template = new Smarty_Template ("includes/tale.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id,  $_smarty_tpl->compile_id);$_template->assign('link',"1");$_template->assign('voting',"1");$_template->caching = 0; echo $_template->getRenderedTemplate();  unset($_template); ?>
					<?php }} ?>
				</div>
			<?php }else{ ?>
				<p>Не найдено ни одной истории, соответствующей вашему запросу.</p>
			<?php }?>
		<?php }?>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>