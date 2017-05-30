<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F3637413765";a:2:{i:0;s:62:"/home/bh59538/public_html/application/views/includes/video.tpl";i:1;i:1449740876;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 16:02:11
         compiled from "/home/bh59538/public_html/application/views/includes/video.tpl" */ ?>
<div class="video">
	<div class="head">
		<div class="right">
			<div class="identifier">
				<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
					<a href="/video/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
" title="Прямая ссылка на видео">#<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
</a>
				<?php }else{ ?>
					#<?php echo $_smarty_tpl->getVariable('video')->value->id;?>

				<?php }?>
			</div>
			<div class="date">
				<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('date',array($_smarty_tpl->getVariable('video')->value->date),true);?>

			</div>	
		</div>
		<div class="left">
			<div class="title">
				<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
					<a href="/video/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('video')->value->title;?>
</a>
				<?php }else{ ?>
					<?php echo $_smarty_tpl->getVariable('video')->value->title;?>

				<?php }?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">
		<div class="clip">
			<iframe width="788" height="443" src="//www.youtube.com/embed/<?php echo $_smarty_tpl->getVariable('video')->value->youtube;?>
" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="description">
			<?php echo $_smarty_tpl->getVariable('video')->value->get_parsed_description();?>

		</div>
		<?php if ($_smarty_tpl->getVariable('video')->value->collections->count_all()>0){?>
			<div class="collections">
				<strong>коллекции:</strong>
				<?php if ($_smarty_tpl->getVariable('video')->value->active<1){?>&diams;<?php }?>
				<?php  $_smarty_tpl->tpl_vars['collection'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('video')->value->collections->find_all(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['collection']->key => $_smarty_tpl->tpl_vars['collection']->value){
?>
					<?php if ($_smarty_tpl->getVariable('video')->value->active==1){?>
						<a href="/collection/<?php echo $_smarty_tpl->getVariable('collection')->value->shortcut;?>
"><?php echo $_smarty_tpl->getVariable('collection')->value->name;?>
</a>
					<?php }else{ ?>
						<?php echo $_smarty_tpl->getVariable('collection')->value->name;?>
 &diams;
					<?php }?>
				<?php }} ?>
			</div>
		<?php }?>
	</div>
	<?php if ($_smarty_tpl->getVariable('video')->value->active>=0||$_smarty_tpl->getVariable('auth')->value){?>
		<div class="foot">
			<div class="actions">
				<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
					<div class="share">
						<div class="addthis_toolbox" addthis:url="http://kriper.ru/video/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
/" addthis:title="<?php echo $_smarty_tpl->getVariable('video')->value->title;?>
 - Страшные видео">
							<a class="addthis_button_compact"><div class="share_more"></div></a>
							<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
							<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
							<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
						</div>
					</div>
					<div class="moderate">
						<?php if ($_smarty_tpl->getVariable('video')->value->topic>0){?>
							<a href="/forum/viewtopic.php?f=19&t=<?php echo $_smarty_tpl->getVariable('video')->value->topic;?>
">обсудить (<?php echo $_smarty_tpl->getVariable('video')->value->get_comments_count();?>
)</a>
						<?php }else{ ?>
							<a href="/topic/video/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
">обсудить (0)</a>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('auth')->value&&($_smarty_tpl->getVariable('user')->value->role==@USER_ROLE_ADMIN||$_smarty_tpl->getVariable('video')->value->id>@UNTOUCHABLE_VIDEO_IDENTIFIER)){?>
							<?php if ($_smarty_tpl->getVariable('video')->value->active<1){?><a href="/admin/videoforce/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
">одобрить</a><?php }?>
							<a href="/admin/videoedit/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
">редактировать</a>
							<a href="/admin/videodelete/<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
">удалить</a>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('video')->value->active==1){?>
						<div class="approve">
							&diams; <?php if ($_smarty_tpl->getVariable('video')->value->user->sex==0){?>одобрил<?php }else{ ?>одобрила<?php }?> <strong><?php echo $_smarty_tpl->getVariable('video')->value->user->name;?>
</strong> &diams;
						</div>
					<?php }?>
				<?php }?>
			</div>
			<?php if ($_smarty_tpl->getVariable('video')->value->active>=0){?>
				<div class="votes">
					<div class="votes_count" video="<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
">
						<?php if ($_smarty_tpl->getVariable('video')->value->votes>0){?>+<?php } echo $_smarty_tpl->getVariable('video')->value->votes;?>

					</div>
					<?php if ($_smarty_tpl->getVariable('voting')->value>0){?>
						<a class="vote_up" video="<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
" href="#" title="Страшно">страшно</a>
						<?php if ($_smarty_tpl->getVariable('video')->value->active==0||$_smarty_tpl->getVariable('video')->value->votes>0){?>
							<a class="vote_down" video="<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
" href="#" title="Не страшно">не страшно</a>
						<?php }?>
						<div class="thanks" video="<?php echo $_smarty_tpl->getVariable('video')->value->id;?>
"></div>
					<?php }?>
				</div>
			<?php }?>
			<div class="clear"></div>
		</div>
	<?php }?>
</div>