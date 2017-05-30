<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F2509903387";a:2:{i:0;s:67:"/home/bh59538/public_html/application/views/includes/image_full.tpl";i:1;i:1449740876;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:01:31
         compiled from "/home/bh59538/public_html/application/views/includes/image_full.tpl" */ ?>
<div class="image_full">
	<div class="head">
		<div class="right">
			<div class="identifier">
				<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
					<a href="/image/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
" title="Прямая ссылка на картинку">#<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
</a>
				<?php }else{ ?>
					#<?php echo $_smarty_tpl->getVariable('image')->value->id;?>

				<?php }?>
			</div>
		</div>
		<div class="left">
			<div class="date">
				<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('date',array($_smarty_tpl->getVariable('image')->value->date),true);?>

			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">
		<div class="picture">
			<img src="/media/uploads/images/originals/<?php echo $_smarty_tpl->getVariable('image')->value->file;?>
" title="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('image')->value->description,100),true);?>
" />
		</div>
		<div class="description">
			<?php echo $_smarty_tpl->getVariable('image')->value->get_parsed_description();?>

		</div>
		<?php if ($_smarty_tpl->getVariable('image')->value->albums->count_all()>0){?>
			<div class="albums">
				<strong>альбомы:</strong>
				<?php if ($_smarty_tpl->getVariable('image')->value->active<1){?>&diams;<?php }?>
				<?php  $_smarty_tpl->tpl_vars['album'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('image')->value->albums->find_all(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['album']->key => $_smarty_tpl->tpl_vars['album']->value){
?>
					<?php if ($_smarty_tpl->getVariable('image')->value->active==1){?>
						<a href="/album/<?php echo $_smarty_tpl->getVariable('album')->value->shortcut;?>
"><?php echo $_smarty_tpl->getVariable('album')->value->name;?>
</a>
					<?php }else{ ?>
						<?php echo $_smarty_tpl->getVariable('album')->value->name;?>
 &diams;
					<?php }?>
				<?php }} ?>
			</div>
		<?php }?>
	</div>
	<?php if ($_smarty_tpl->getVariable('image')->value->active>=0||$_smarty_tpl->getVariable('auth')->value){?>
		<div class="foot">
			<div class="actions">
				<div class="share">
					<div class="addthis_toolbox" addthis:url="http://kriper.ru/image/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
/" addthis:title="<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('truncate',array($_smarty_tpl->getVariable('image')->value->description,100),true);?>
 - Страшные картинки">
						<a class="addthis_button_compact"><div class="share_more"></div></a>
						<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
						<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
						<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
					</div>
				</div>
				<div class="moderate">
					<?php if ($_smarty_tpl->getVariable('image')->value->topic>0){?>
						<a href="/forum/viewtopic.php?f=13&t=<?php echo $_smarty_tpl->getVariable('image')->value->topic;?>
">обсудить (<?php echo $_smarty_tpl->getVariable('image')->value->get_comments_count();?>
)</a>
					<?php }else{ ?>
						<a href="/topic/image/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">обсудить (0)</a>
					<?php }?>
					<?php if ($_smarty_tpl->getVariable('auth')->value&&($_smarty_tpl->getVariable('user')->value->role==@USER_ROLE_ADMIN||$_smarty_tpl->getVariable('image')->value->id>@UNTOUCHABLE_IMAGE_IDENTIFIER)){?>
						<?php if ($_smarty_tpl->getVariable('image')->value->active<1){?><a href="/admin/imageforce/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">одобрить</a><?php }?>
						<a href="/admin/imageedit/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">редактировать</a>
						<a href="/admin/imagedelete/<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">удалить</a>
					<?php }?>
				</div>
				<?php if ($_smarty_tpl->getVariable('image')->value->active==1){?>
					<div class="approve">
						&diams; <?php if ($_smarty_tpl->getVariable('image')->value->user->sex==0){?>одобрил<?php }else{ ?>одобрила<?php }?> <strong><?php echo $_smarty_tpl->getVariable('image')->value->user->name;?>
</strong> &diams;
					</div>
				<?php }?>				
			</div>
			<?php if ($_smarty_tpl->getVariable('image')->value->active>=0){?>
				<div class="votes">
					<div class="votes_count" image="<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">
						<?php if ($_smarty_tpl->getVariable('image')->value->votes>0){?>+<?php } echo $_smarty_tpl->getVariable('image')->value->votes;?>

					</div>
					<?php if ($_smarty_tpl->getVariable('voting')->value>0){?>
						<a class="vote_up" image="<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
" href="#" title="Страшно">страшно</a>
						<?php if ($_smarty_tpl->getVariable('image')->value->active==0||$_smarty_tpl->getVariable('image')->value->votes>0){?>
							<a class="vote_down" image="<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
" href="#" title="Не страшно">не страшно</a>
						<?php }?>
						<div class="thanks" image="<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
"></div>
					<?php }?>
				</div>
			<?php }?>
			<div class="clear"></div>
		</div>
	<?php }?>
</div>