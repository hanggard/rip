{extend template="template"}
	
	{container name="title"}Метки{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Метки</h2>
		<div id="tags" style="line-height:{$smarty.const.TAG_FONT_SIZE_MAX}px;">
			{foreach from=$tags item=tag}
				<a href="/tag/{$tag->shortcut}" style="font-size:{floor($smarty.const.TAG_FONT_SIZE_MIN + ($smarty.const.TAG_FONT_SIZE_MAX - $smarty.const.TAG_FONT_SIZE_MIN) * ($tag->count / $max_count))}px;">{$tag->text}</a>
			{/foreach}
		</div>
	{/container}
	
{/extend}