<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1932858456";a:2:{i:0;s:70:"/home/bh59538/public_html/application/views/includes/image_reduced.tpl";i:1;i:1449740879;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 15:54:42
         compiled from "/home/bh59538/public_html/application/views/includes/image_reduced.tpl" */ ?>
<div class="image <?php if ($_smarty_tpl->getVariable('last')->value>0){?>image_last<?php }?>">
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
</div>