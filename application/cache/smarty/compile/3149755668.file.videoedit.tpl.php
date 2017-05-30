<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3149755668";a:2:{i:0;s:64:"/home/bh59538/public_html/application/views//admin/videoedit.tpl";i:1;i:1449740877;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-20 06:20:59
         compiled from "/home/bh59538/public_html/application/views//admin/videoedit.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Редактирование видео | Админка<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Редактирование видео</h2>
		<?php if (count($_smarty_tpl->getVariable('errors')->value)>0){?>
			<div class="error">
				<?php if (array_key_exists('youtube',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['youtube'])){?>
						Введите ссылку на видеоролик на <strong>YouTube</strong>.<br />
					<?php }?>				
					<?php if (in_array('format',$_smarty_tpl->getVariable('errors')->value['youtube'])){?>
						Введенная ссылка не ведёт к видеоролику на <strong>YouTube</strong>.<br />
					<?php }?>
				<?php }?>
				<?php if (array_key_exists('title',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['title'])){?>
						Введите заголовок видеоролика.<br />
					<?php }?>
					<?php if (in_array('max_length',$_smarty_tpl->getVariable('errors')->value['title'])){?>
						Слишком длинный заголовок видеоролика (более 256 символов).<br />
					<?php }?>
				<?php }?>
				<?php if (array_key_exists('description',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['description'])){?>
						Введите описание видеоролика.<br />
					<?php }?>
				<?php }?>				
				<?php if (array_key_exists('captcha',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('match',$_smarty_tpl->getVariable('errors')->value['captcha'])){?>
						Вы неправильно ввели защитный код.<br />
					<?php }?>
				<?php }?>
			</div>
		<?php }?>
		<form method="post">
			<div class="left">
				<label>Ссылка:</label>
			</div>
			<div class="right">
				<input type="text" name="youtube" class="standard_input" value="http://youtube.com/watch?v=<?php echo $_smarty_tpl->getVariable('video')->value->youtube;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('video')->value->title;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="description"><?php echo $_smarty_tpl->getVariable('video')->value->description;?>
</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Коллекции:</label>
			</div>
			<div class="right">
				<input type="text" name="collections" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('collections')->value;?>
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
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>