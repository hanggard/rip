{extend template="imagetemplate"}
	
	{container name="title"}Альбомы{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Альбомы</h2>
		<div id="tags" style="line-height:{$smarty.const.TAG_FONT_SIZE_MAX}px;">
			{foreach from=$albums item=album}
				<a href="/album/{$album->shortcut}" style="font-size:{floor($smarty.const.TAG_FONT_SIZE_MIN + ($smarty.const.TAG_FONT_SIZE_MAX - $smarty.const.TAG_FONT_SIZE_MIN) * ($album->count / $max_count))}px;">{$album->name}</a>
			{/foreach}
		</div>
	{/container}
	
{/extend}