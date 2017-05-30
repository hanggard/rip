{extend template="videotemplate"}
	
	{container name="title"}Видео из коллекции «{$collection->name|upper}»{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_video_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Видео из коллекции «{$collection->name|upper}»</h2>
		{if count($videos) > 0}
			{$pager->render()}
			<div class="videos">
				{foreach from=$videos item=video name=videos}
					{include file="includes/video.tpl" link="1" voting="1"}
				{/foreach}
			</div>
			{$pager->render()}
		{else}
			<p>Коллекция пуста.</p>
		{/if}
	{/container}
	
{/extend}