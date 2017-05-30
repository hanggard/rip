<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1672604128";a:2:{i:0;s:61:"/home/bh59538/public_html/application/views/includes/tale.tpl";i:1;i:1449740876;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2015-12-11 15:54:42
         compiled from "/home/bh59538/public_html/application/views/includes/tale.tpl" */ ?>
<div class="tale <?php if ($_smarty_tpl->getVariable('tale')->value->special==1){?>tale_special<?php }?>">
	<div class="head">
		<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
			<div class="right">
				<div class="identifier">
					<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
						<a href="/tale/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
" title="Прямая ссылка на историю">#<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
</a>
					<?php }else{ ?>
						#<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>

					<?php }?>
				</div>
				<div class="date">
					<?php echo $_smarty_tpl->smarty->plugin_handler->executeModifier('date',array($_smarty_tpl->getVariable('tale')->value->date),true);?>

				</div>			
			</div>
		<?php }?>
		<div class="left">
			<div class="title">
				<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
					<a href="/tale/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('tale')->value->title;?>
</a>
				<?php }else{ ?>
					<?php echo $_smarty_tpl->getVariable('tale')->value->title;?>

				<?php }?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">		
		<div class="text">
			<?php if (!empty($_smarty_tpl->getVariable('tale')->value->url)){?>
				<strong><i>Первоисточник:</i></strong> <a href="<?php echo $_smarty_tpl->getVariable('tale')->value->url;?>
" target="_blank"><i><?php echo $_smarty_tpl->getVariable('tale')->value->get_url_host();?>
</i></a>
				<br />
				<br />
			<?php }?>
			<?php if (!empty($_smarty_tpl->getVariable('tale')->value->author)){?>
				<strong><i>Автор:</i></strong> <i><?php echo $_smarty_tpl->getVariable('tale')->value->author;?>
</i>
				<br />
				<br />
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('link')->value>0){?>
				<?php echo $_smarty_tpl->getVariable('tale')->value->get_announce_text();?>

			<?php }else{ ?>
				<?php echo $_smarty_tpl->getVariable('tale')->value->get_parsed_text();?>

			<?php }?>
		</div>
		<?php if ($_smarty_tpl->getVariable('tale')->value->tags->count_all()>0){?>
			<div class="tags">
				<strong>метки:</strong>
				<?php if ($_smarty_tpl->getVariable('tale')->value->active<1){?>&diams;<?php }?>
				<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tale')->value->tags->find_all(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
?>
					<?php if ($_smarty_tpl->getVariable('tale')->value->active==1){?>
						<a href="/tag/<?php echo $_smarty_tpl->getVariable('tag')->value->shortcut;?>
"><?php echo $_smarty_tpl->getVariable('tag')->value->text;?>
</a>
					<?php }else{ ?>
						<?php echo $_smarty_tpl->getVariable('tag')->value->text;?>
 &diams;
					<?php }?>
				<?php }} ?>
			</div>
		<?php }?>
	</div>
	<?php if ($_smarty_tpl->getVariable('tale')->value->active>=0||$_smarty_tpl->getVariable('auth')->value){?>
		<div class="foot">
			<div class="actions">
				<?php if (!$_smarty_tpl->getVariable('pda')->value){?>
					<div class="share">
						<div class="addthis_toolbox" addthis:url="http://kriper.ru/tale/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
/" addthis:title="<?php echo $_smarty_tpl->getVariable('tale')->value->title;?>
 - Страшные истории">
							<a class="addthis_button_compact"><div class="share_more"></div></a>
							<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
							<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
							<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
						</div>
					</div>
					<div class="moderate">
						<?php if ($_smarty_tpl->getVariable('tale')->value->topic>0){?>
							<a href="/forum/viewtopic.php?f=2&t=<?php echo $_smarty_tpl->getVariable('tale')->value->topic;?>
">обсудить (<?php echo $_smarty_tpl->getVariable('tale')->value->get_comments_count();?>
)</a>
						<?php }else{ ?>
							<a href="/topic/tale/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
">обсудить (0)</a>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('auth')->value&&($_smarty_tpl->getVariable('user')->value->role==@USER_ROLE_ADMIN||$_smarty_tpl->getVariable('tale')->value->id>@UNTOUCHABLE_TALE_IDENTIFIER)){?>
							<?php if ($_smarty_tpl->getVariable('tale')->value->active<1){?><a href="/admin/force/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
">одобрить</a><?php }?>
							<a href="/admin/edit/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
">редактировать</a>
							<a href="/admin/delete/<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
">удалить</a>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('tale')->value->active==1){?>
						<div class="approve">
							&diams; <?php if ($_smarty_tpl->getVariable('tale')->value->user->sex==0){?>одобрил<?php }else{ ?>одобрила<?php }?> <strong><?php echo $_smarty_tpl->getVariable('tale')->value->user->name;?>
</strong> &diams;
						</div>
					<?php }?>
				<?php }?>
			</div>
			<?php if ($_smarty_tpl->getVariable('tale')->value->active>=0){?>
				<div class="votes">
					<div class="votes_count" tale="<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
">
						<?php if ($_smarty_tpl->getVariable('tale')->value->votes>0){?>+<?php } echo $_smarty_tpl->getVariable('tale')->value->votes;?>

					</div>
					<?php if ($_smarty_tpl->getVariable('voting')->value>0){?>
						<a class="vote_up" tale="<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
" href="#" title="Страшно">страшно</a>
						<?php if ($_smarty_tpl->getVariable('tale')->value->active==0||$_smarty_tpl->getVariable('tale')->value->votes>0){?>
							<a class="vote_down" tale="<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
" href="#" title="Не страшно">не страшно</a>
						<?php }?>
						<div class="thanks" tale="<?php echo $_smarty_tpl->getVariable('tale')->value->id;?>
"></div>
					<?php }?>
				</div>
			<?php }?>
			<div class="clear"></div>
		</div>
	<?php }?>
</div>