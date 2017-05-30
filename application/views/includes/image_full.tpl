<div class="image_full">
	<div class="head">
		<div class="right">
			<div class="identifier">
				{if $link > 0}
					<a href="/image/{$image->id}" title="Прямая ссылка на картинку">#{$image->id}</a>
				{else}
					#{$image->id}
				{/if}
			</div>
		</div>
		<div class="left">
			<div class="date">
				{$image->date|date}
			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">
		<div class="picture">
			<img src="/media/uploads/images/originals/{$image->file}" title="{$image->description|truncate:100}" />
		</div>
		<div class="description">
			{$image->get_parsed_description()}
		</div>
		{if $image->albums->count_all() > 0}
			<div class="albums">
				<strong>альбомы:</strong>
				{if $image->active < 1}&diams;{/if}
				{foreach from=$image->albums->find_all() item=album}
					{if $image->active == 1}
						<a href="/album/{$album->shortcut}">{$album->name}</a>
					{else}
						{$album->name} &diams;
					{/if}
				{/foreach}
			</div>
		{/if}
	</div>
	{if $image->active >= 0 || $auth}
		<div class="foot">
			<div class="actions">
				<div class="share">
					<div class="addthis_toolbox" addthis:url="http://kriper.ru/image/{$image->id}/" addthis:title="{$image->description|truncate:100} - Страшные картинки">
						<a class="addthis_button_compact"><div class="share_more"></div></a>
						<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
						<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
						<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
					</div>
				</div>
				<div class="moderate">
					{if $image->topic > 0}
						<a href="/forum/viewtopic.php?f=13&t={$image->topic}">обсудить ({$image->get_comments_count()})</a>
					{else}
						<a href="/topic/image/{$image->id}">обсудить (0)</a>
					{/if}
					{if $auth && ($user->role == $smarty.const.USER_ROLE_ADMIN || $image->id > $smarty.const.UNTOUCHABLE_IMAGE_IDENTIFIER)}
						{if $image->active < 1}<a href="/admin/imageforce/{$image->id}">одобрить</a>{/if}
						<a href="/admin/imageedit/{$image->id}">редактировать</a>
						<a href="/admin/imagedelete/{$image->id}">удалить</a>
					{/if}
				</div>
				{if $image->active == 1}
					<div class="approve">
						&diams; {if $image->user->sex == 0}одобрил{else}одобрила{/if} <strong>{$image->user->name}</strong> &diams;
					</div>
				{/if}				
			</div>
			{if $image->active >= 0}
				<div class="votes">
					<div class="votes_count" image="{$image->id}">
						{if $image->votes > 0}+{/if}{$image->votes}
					</div>
					{if $voting > 0}
						<a class="vote_up" image="{$image->id}" href="#" title="Страшно">страшно</a>
						{if $image->active == 0 || $image->votes > 0}
							<a class="vote_down" image="{$image->id}" href="#" title="Не страшно">не страшно</a>
						{/if}
						<div class="thanks" image="{$image->id}"></div>
					{/if}
				</div>
			{/if}
			<div class="clear"></div>
		</div>
	{/if}
</div>