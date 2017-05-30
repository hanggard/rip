{extend template="videotemplate"}
	
	{container name="title"}Самые страшные{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Самые страшные за последнее время</h2>
		<div class="videos">
			{foreach from=$recent_videos item=video name=recent_videos}
				{include file="includes/video.tpl" link="1" voting="0"}
			{/foreach}
		</div>
	{/container}
	
{/extend}