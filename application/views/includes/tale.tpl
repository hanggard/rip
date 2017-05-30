<div class="tale {if $tale->special == 1}tale_special{/if}">
	<div class="head">
		{if ! $pda}
			<div class="right">
				<div class="identifier">
					{if $link > 0}
						<a href="/tale/{$tale->id}" title="Прямая ссылка на историю">#{$tale->id}</a>
					{else}
						#{$tale->id}
					{/if}
				</div>
				<div class="date">
					{$tale->date|date}
				</div>			
			</div>
		{/if}
		<div class="left">
			<div class="title">
				{if $link > 0}
					<a href="/tale/{$tale->id}">{$tale->title}</a>
				{else}
					{$tale->title}
				{/if}
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">		
		<div class="text">
			{if ! empty($tale->url)}
				<strong><i>Первоисточник:</i></strong> <a href="{$tale->url}" target="_blank"><i>{$tale->get_url_host()}</i></a>
				<br />
				<br />
			{/if}
			{if ! empty($tale->author)}
				<strong><i>Автор:</i></strong> <i>{$tale->author}</i>
				<br />
				<br />
			{/if}
			{if $link > 0}
				{$tale->get_announce_text()}
			{else}
				{$tale->get_parsed_text()}
			{/if}
		</div>
		{if $tale->tags->count_all() > 0}
			<div class="tags">
				<strong>метки:</strong>
				{if $tale->active < 1}&diams;{/if}
				{foreach from=$tale->tags->find_all() item=tag}
					{if $tale->active == 1}
						<a href="/tag/{$tag->shortcut}">{$tag->text}</a>
					{else}
						{$tag->text} &diams;
					{/if}
				{/foreach}
			</div>
		{/if}
	</div>
	{if $tale->active >= 0 || $auth}
		<div class="foot">
			<div class="actions">
				{if ! $pda}
					<div class="share">
						<div class="addthis_toolbox" addthis:url="http://kriper.ru/tale/{$tale->id}/" addthis:title="{$tale->title} - Страшные истории">
							<a class="addthis_button_compact"><div class="share_more"></div></a>
							<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
							<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
							<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
						</div>
					</div>
					<div class="moderate">
						{if $tale->topic > 0}
							<a href="/forum/viewtopic.php?f=2&t={$tale->topic}">обсудить ({$tale->get_comments_count()})</a>
						{else}
							<a href="/topic/tale/{$tale->id}">обсудить (0)</a>
						{/if}
						{if $auth && ($user->role == $smarty.const.USER_ROLE_ADMIN || $tale->id > $smarty.const.UNTOUCHABLE_TALE_IDENTIFIER)}
							{if $tale->active < 1}<a href="/admin/force/{$tale->id}">одобрить</a>{/if}
							<a href="/admin/edit/{$tale->id}">редактировать</a>
							<a href="/admin/delete/{$tale->id}">удалить</a>
						{/if}
					</div>
					{if $tale->active == 1}
						<div class="approve">
							&diams; {if $tale->user->sex == 0}одобрил{else}одобрила{/if} <strong>{$tale->user->name}</strong> &diams;
						</div>
					{/if}
				{/if}
			</div>
			{if $tale->active >= 0}
				<div class="votes">
					<div class="votes_count" tale="{$tale->id}">
						{if $tale->votes > 0}+{/if}{$tale->votes}
					</div>
					{if $voting > 0}
						<a class="vote_up" tale="{$tale->id}" href="#" title="Страшно">страшно</a>
						{if $tale->active == 0 || $tale->votes > 0}
							<a class="vote_down" tale="{$tale->id}" href="#" title="Не страшно">не страшно</a>
						{/if}
						<div class="thanks" tale="{$tale->id}"></div>
					{/if}
				</div>
			{/if}
			<div class="clear"></div>
		</div>
	{/if}
</div>