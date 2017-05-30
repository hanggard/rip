<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1011661225";a:2:{i:0;s:57:"/home/bh59538/public_html/application/views//imageadd.tpl";i:1;i:1449740857;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:00:54
         compiled from "/home/bh59538/public_html/application/views//imageadd.tpl" */ ?>
<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>Загрузите свою страшную картинку<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"title"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start(); $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"script"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
	<?php $_block_repeat=true; $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), null, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block');while ($_block_repeat) { ob_start();?>
		<h2>Загрузите свою страшную картинку</h2>
		<p>Если вы хотите поделиться с посетителями сайта своими страшными картинками, загрузите их прямо здесь.</p>
		<p>Не будут приниматься картинки, эффект которых основан только на демонстрации сцен, вызывающих отвращение.</p>
		<p>Не рекомендуем отправлять картинки, защищённые авторским правом. В противном случае укажите в описании имя автора и/или ссылку на первоисточник.</p>
		<div class="blank_10"></div>
		<?php if (count($_smarty_tpl->getVariable('errors')->value)>0){?>
			<div class="error">
				<?php if (array_key_exists('files',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('not_empty',$_smarty_tpl->getVariable('errors')->value['files'])){?>
						Не загружен ни один файл - либо вы отправили пустую форму, либо файлы у вас неправильного формата.<br />					<?php }?>
				<?php }?>
				<?php if (array_key_exists('captcha',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('match',$_smarty_tpl->getVariable('errors')->value['captcha'])){?>
						Вы неправильно ввели защитный код. К сожалению, вам нужно выбрать файлы для загрузки заново.<br />
					<?php }?>
				<?php }?>
				<?php if (array_key_exists('rule',$_smarty_tpl->getVariable('errors')->value)){?>
					<?php if (in_array('ban',$_smarty_tpl->getVariable('errors')->value['rule'])){?>
						Вам запрещено загружать файлы на этот сайт.<br />
					<?php }?>
				<?php }?>				
			</div>
		<?php }?>
		<form method="post" enctype="multipart/form-data">
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_1" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_1" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				<?php if ($_smarty_tpl->getVariable('auth')->value){?>
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_1" class="standard_input" />
					</div>
					<div class="clear"></div>
				<?php }?>
			</div>
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_2" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_2" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				<?php if ($_smarty_tpl->getVariable('auth')->value){?>
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_2" class="standard_input" />
					</div>
					<div class="clear"></div>
				<?php }?>
			</div>
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_3" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_3" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				<?php if ($_smarty_tpl->getVariable('auth')->value){?>
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_3" class="standard_input" />
					</div>
					<div class="clear"></div>
				<?php }?>
			</div>			
			<?php if (!$_smarty_tpl->getVariable('auth')->value){?>
				<div class="area">
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
				</div>
			<?php }?>
			<div class="left">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
			<div class="clear"></div>
		</form>
	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->container(array(array('name'=>"content"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->plugin_handler->extend(array(array('template'=>"imagetemplate"), $_block_content, $_smarty_tpl->smarty, &$_block_repeat, $_smarty_tpl),'block'); }?>