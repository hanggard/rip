{extend template="videotemplate"}
	
	{container name="title"}{/container}
	
	{container name="script"}		
		<script type="text/javascript">
			$(document).ready(function(){
				init_video_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<div class="videos">
			{$pager->render()}
			{foreach from=$videos item=video name=videos}
				{include file="includes/video.tpl" link="1" voting="1"}
			{/foreach}
			{$pager->render()}
		</div>
	{/container}
	
{/extend}