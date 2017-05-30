{extend template="videotemplate"}
	
	{container name="title"}Коллекции{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Коллекции</h2>
		<div id="tags" style="line-height:{$smarty.const.TAG_FONT_SIZE_MAX}px;">
			{foreach from=$collections item=collection}
				<a href="/collection/{$collection->shortcut}" style="font-size:{floor($smarty.const.TAG_FONT_SIZE_MIN + ($smarty.const.TAG_FONT_SIZE_MAX - $smarty.const.TAG_FONT_SIZE_MIN) * ($collection->count / $max_count))}px;">{$collection->name}</a>
			{/foreach}
		</div>
	{/container}
	
{/extend}