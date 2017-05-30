<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:10:"F227186582";a:2:{i:0;s:59:"/home/bh59538/public_html/application/views//admin/edit.tpl";i:1;i:1449740874;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 18:15:17
         compiled from "/home/bh59538/public_html/application/views//admin/edit.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Редактирование истории | Админка<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Редактирование истории</h2>
		<?php if (count($_smarty_tpl->getVariable('errors')->value)>0){?>
			<div class="error">
				<?php if (array_key_exists('title',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['title'])){?>
						Введите заголовок истории.<br />
					<?php }?>
					<?php if (in_array('max_length',$_smarty_tpl->getVariable('errors')->value['title'])){?>
						Слишком длинный заголовок истории (более 256 символов).<br />
					<?php }?>				
				<?php }?>
				<?php if (array_key_exists('text',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['text'])){?>
						Введите текст истории.<br />
					<?php }?>
				<?php }?>
			</div>
		<?php }?>
		<form method="post">
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('tale')->value->title;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Текст:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="text"><?php echo $_smarty_tpl->getVariable('tale')->value->text;?>
</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Метки:</label>
			</div>			
			<div class="right">
				<input type="text" name="tags" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('tags')->value;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Источник:</label>
			</div>
			<div class="right">
				<input type="text" name="url" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('tale')->value->url;?>
" />
				<div class="clear"></div>
				<small>Если вы скопировали историю с другого сайта, введите здесь ссылку на соответствующую страницу</small>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Автор:</label>
			</div>
			<div class="right">
				<input type="text" name="author" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('tale')->value->author;?>
" />
				<div class="clear"></div>
				<small>Если история является авторской, введите здесь имя её автора</small>
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
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"template"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>