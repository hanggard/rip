{extend template="template"}
	
	{container name="title"}{if empty($query)}Поиск{else}Результаты поиска по запросу «{$query}»{/if}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>{if empty($query)}Поиск{else}Результаты поиска{/if}</h2>
		{if $error}
			<div class="error">
				Ваш запрос слишком короткий (менее {$smarty.const.SEARCH_QUERY_LENGTH_MIN} знаков).
			</div>
		{/if}
		<form method="get">
			{if $pda}
				<input type="text" class="short_search_input" name="query" value="{$query}" />
			{else}
				<input type="text" class="search_input" name="query" value="{$query}" />
			{/if}
			<input type="submit" class="search_button" value="Поиск" />
			<div class="blank_10"></div>
			<div class="blank_10"></div>
		</form>
		{if ! empty($query)}
			{if count($tales) > 0}
				<div class="tales">
					{foreach from=$tales item=tale name=tales}
						{include file="includes/tale.tpl" link="1" voting="1"}
					{/foreach}
				</div>
			{else}
				<p>Не найдено ни одной истории, соответствующей вашему запросу.</p>
			{/if}
		{/if}
	{/container}
	
{/extend}