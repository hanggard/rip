<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F2059244242";a:2:{i:0;s:62:"/home/bh59538/public_html/application/views/includes/image.tpl";i:1;i:1449740875;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:00:52
         compiled from "/home/bh59538/public_html/application/views/includes/image.tpl" */ ?>
<div class="image <?php if ($_smarty_tpl->getVariable('last')->value>0){?>image_last<?php }?>">
	<div class="head">
		<div class="identifier">
			<a href="/image/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
" title="Прямая ссылка на картинку">#<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
</a>
		</div>
		<div class="date">
			<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('date',array($_smarty_tpl->getVariable('image')->value->date),true);?>

		</div>
		<div class="clear"></div>
	</div>
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="middle" align="center">
				<a href="/image/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
"><img src="/media/uploads/images/thumbnails/<?php echo $_smarty_tpl->getVariable('image')->value->file;?>
" title="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('image')->value->description,100),true);?>
" /></a>
			</td>
		</tr>
	</table>
	<div class="foot">
		<?php if ($_smarty_tpl->getVariable('image')->value->active>=0){?>
			<div class="votes">
				<div class="votes_count" tale="<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">
					<?php if ($_smarty_tpl->getVariable('image')->value->votes>0){?>+<?php } echo $_smarty_tpl->getVariable('image')->value->votes;?>

				</div>
			</div>
			<div class="clear"></div>
		<?php }?>
		<div class="clear"></div>
	</div>	
</div>