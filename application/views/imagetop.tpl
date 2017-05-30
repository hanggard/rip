{extend template="imagetemplate"}
	
	{container name="title"}Самые страшные{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Самые страшные за последнее время</h2>
		<div class="images">
			{foreach from=$recent_images item=image name=recent_images}
				{if $smarty.foreach.recent_images.index % 4 == 3}
					{assign var=last value=1}
				{else}
					{assign var=last value=0}
				{/if}
				{include file="includes/image.tpl" last=$last}
			{/foreach}
			<div class="clear"></div>
		</div>	
		<h2>Самые страшные за всё время</h2>
		<div class="images">
			{foreach from=$ever_images item=image name=ever_images}
				{if $smarty.foreach.ever_images.index % 4 == 3}
					{assign var=last value=1}
				{else}
					{assign var=last value=0}
				{/if}
				{include file="includes/image.tpl" last=$last}
			{/foreach}
			<div class="clear"></div>
		</div>
	{/container}
	
{/extend}