<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3410021221";a:2:{i:0;s:64:"/home/bh59538/public_html/application/views//admin/imageedit.tpl";i:1;i:1449740874;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2016-01-04 03:17:07
         compiled from "/home/bh59538/public_html/application/views//admin/imageedit.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Редактирование картинки | Админка<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Редактирование картинки</h2>
		<form method="post">
			<div class="centered">
				<img src="/media/uploads/images/originals/<?php echo $_smarty_tpl->getVariable('image')->value->file;?>
" title="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('image')->value->description,100),true);?>
" />
			</div>		
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea name="description" class="description_textarea"><?php echo $_smarty_tpl->getVariable('image')->value->description;?>
</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Альбомы:</label>
			</div>
			<div class="right">
				<input type="text" name="albums" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('image')->value->get_albums_string();?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				&nbsp;
			</div>
			<div class="right">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
		</form>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>