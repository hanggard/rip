<div class="tale">
	<div class="head">
		{if ! $pda}
			<div class="right">
				<div class="identifier">
					{if $link > 0}
						<a href="/ctale/{$ctale->id}" title="Прямая ссылка на историю">#{$ctale->id}</a>
					{else}
						#{$ctale->id}
					{/if}
				</div>
				<div class="date">
					{$ctale->date|date}
				</div>			
			</div>
		{/if}
		<div class="left">
			<div class="title">
				{if $link > 0}
					<a href="/ctale/{$ctale->id}">{$ctale->title}</a>
				{else}
					{$ctale->title}
				{/if}
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="body">		
		<div class="text">
			<strong><i>Автор:</i></strong> <i>{$ctale->author}</i>
			<br />
			<br />
			{if $link > 0}
				{$ctale->get_announce_text()}
			{else}
				{$ctale->get_parsed_text()}
			{/if}
		</div>
	</div>
	{if $ctale->active >= 0 || $auth}
		<div class="foot">
			<div class="actions">
				{if ! $pda}
					<div class="share">
						<div class="addthis_toolbox" addthis:url="http://kriper.ru/ctale/{$ctale->id}/" addthis:title="{$ctale->title} - Страшные истории">
							<a class="addthis_button_compact"><div class="share_more"></div></a>
							<a class="addthis_button_twitter" title="Поделиться в Twitter"><div class="share_twitter"></div></a>
							<a class="addthis_button_facebook" title="Поделиться в Facebook"><div class="share_facebook"></div></a>
							<a class="addthis_button_vk" title="Поделиться ВКонтакте"><div class="share_vk"></div></a>
						</div>
					</div>
					<div class="moderate">
						{if $ctale->topic > 0}
							<a href="/forum/viewtopic.php?f=2&t={$ctale->topic}">обсудить ({$ctale->get_comments_count()})</a>
						{else}
							<a href="/ctopic/ctale/{$ctale->id}">обсудить (0)</a>
						{/if}
						{if $auth}
							{if $ctale->active < 1}<a href="/admin/cforce/{$ctale->id}">принять</a>{/if}
							<a href="/admin/cedit/{$ctale->id}">редактировать</a>
							<a href="/admin/cdelete/{$ctale->id}">удалить</a>
						{/if}
					</div>
					{if $ctale->active == 1}
						<div class="approve">
							&diams; {if $ctale->user->sex == 0}принял{else}приняла{/if} <strong>{$ctale->user->name}</strong> &diams;
						</div>
					{/if}
				{/if}
			</div>
			{if $ctale->active >= 0}
				<div class="votes">
					<div class="votes_count" tale="{$ctale->id}">
						{if $ctale->votes > 0}+{/if}{$ctale->votes}
					</div>
					{if $voting > 0}
						<a class="vote_up" tale="{$ctale->id}" href="#" title="Страшно">страшно</a>
						{if $ctale->active == 0 || $ctale->votes > 0}
							<a class="vote_down" tale="{$ctale->id}" href="#" title="Не страшно">не страшно</a>
						{/if}
						<div class="thanks" tale="{$ctale->id}"></div>
					{/if}
				</div>
			{/if}
			<div class="clear"></div>
		</div>
	{/if}
</div>