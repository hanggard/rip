<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F2869315500";a:2:{i:0;s:57:"/home/bh59538/public_html/application/views//videoadd.tpl";i:1;i:1449740862;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-13 04:50:06
         compiled from "/home/bh59538/public_html/application/views//videoadd.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Загрузите страшное видео с YouTube<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Загрузите страшное видео с YouTube</h2>
		<p>Если вы хотите поделиться с посетителями сайта видеороликом, найденным на <strong>YouTube</strong>, дайте ссылку на него здесь.</p>
		<p>Не будут приниматься «скримеры» и ролики, эффект которых основан на демонстрации сцен, вызывающих отвращение.</p>
		<p>Перед тем, как загрузить видео, убедитесь, что автор разрешил встраивание ролика на других сайтах (иначе просмотр на нашем сайте будет невозможен).</p>
		<p>Видеоролик обязательно должен сопровождаться коротким описанием, рассказывающим о его содержании.</p>
		<div class="blank_10"></div>
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
				<input type="text" name="youtube" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('new_video')->value->youtube;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('new_video')->value->title;?>
" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="description"><?php echo $_smarty_tpl->getVariable('new_video')->value->description;?>
</textarea>
			</div>
			<div class="clear"></div>
			<?php if ($_smarty_tpl->getVariable('auth')->value){?>
				<div class="left">
					<label>Коллекции:</label>
				</div>
				<div class="right">
					<input type="text" name="collections" class="standard_input" value="<?php echo $_smarty_tpl->getVariable('collections')->value;?>
" />
				</div>
				<div class="clear"></div>
			<?php }?>
			<?php if (!$_smarty_tpl->getVariable('auth')->value){?>
				<div class="left">
					<label>Код защиты:</label>
				</div>
				<div class="right">
					<input type="text" name="captcha" class="short_input" value="" maxlength="4" />
					<span>(введите текст, который вы видите на картинке ниже)</span>
					<div class="captcha"><?php echo $_smarty_tpl->getVariable('captcha')->value->render();?>
</div>
				</div>
				<div class="clear"></div>
			<?php }?>
			<div class="left">
				&nbsp;
			</div>
			<div class="right">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
			<div class="clear"></div>
		</form>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"videotemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>