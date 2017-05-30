<div class="video">
	<div class="head">
		<div class="right">
			<div class="identifier">
				{if $link > 0}
					<a href="/video/{$video->id}" title="Прямая ссылка на видео">#{$video->id}</a>
				{else}
					#{$video->id}
				{/if}
			</div>
			<div class="date">
				{$video->date|date}
			</div>	
		</div>
		<div class="left">
			<div class="title">
				{if $link > 0}
					<a href="/video/{$video->id}">{$video->title}</a>
				{else}
					{$video->title}
				{/if}
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">
		<div class="clip">
			<iframe width="788" height="443" src="//www.youtube.com/embed/{$video->youtube}" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="description">
			{$video->get_parsed_description()}
		</div>
		{if $video->collections->count_all() > 0}
			<div class="collections">
				<strong>коллекции:</strong>
				{if $video->active < 1}&diams;{/if}
				{foreach from=$video->collections->find_all() item=collection}
					{if $video->active == 1}
						<a href="/collection/{$collection->shortcut}">{$collection->name}</a>
					{else}
						{$collection->name} &diams;
					{/if}
				{/foreach}
			</div>
		{/if}
	</div>
	{if $video->active >= 0 || $auth}
		<div class="foot">
			<div class="actions">
				{if ! $pda}
					<div class="share">
						<div class="addthis_toolbox" addthis:url="http://kriper.ru/video/{$video->id}/" addthis:title="{$video->title} - Страшные видео">
							<a class="addthis_button_compact"><div class="share_more"></div></a>
							<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
							<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
							<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
						</div>
					</div>
					<div class="moderate">
						{if $video->topic > 0}
							<a href="/forum/viewtopic.php?f=19&t={$video->topic}">обсудить ({$video->get_comments_count()})</a>
						{else}
							<a href="/topic/video/{$video->id}">обсудить (0)</a>
						{/if}
						{if $auth && ($user->role == $smarty.const.USER_ROLE_ADMIN || $video->id > $smarty.const.UNTOUCHABLE_VIDEO_IDENTIFIER)}
							{if $video->active < 1}<a href="/admin/videoforce/{$video->id}">одобрить</a>{/if}
							<a href="/admin/videoedit/{$video->id}">редактировать</a>
							<a href="/admin/videodelete/{$video->id}">удалить</a>
						{/if}
					</div>
					{if $video->active == 1}
						<div class="approve">
							&diams; {if $video->user->sex == 0}одобрил{else}одобрила{/if} <strong>{$video->user->name}</strong> &diams;
						</div>
					{/if}
				{/if}
			</div>
			{if $video->active >= 0}
				<div class="votes">
					<div class="votes_count" video="{$video->id}">
						{if $video->votes > 0}+{/if}{$video->votes}
					</div>
					{if $voting > 0}
						<a class="vote_up" video="{$video->id}" href="#" title="Страшно">страшно</a>
						{if $video->active == 0 || $video->votes > 0}
							<a class="vote_down" video="{$video->id}" href="#" title="Не страшно">не страшно</a>
						{/if}
						<div class="thanks" video="{$video->id}"></div>
					{/if}
				</div>
			{/if}
			<div class="clear"></div>
		</div>
	{/if}
</div>