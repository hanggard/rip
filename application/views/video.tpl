{extend template="videotemplate"}
	
	{container name="title"}{$video->title}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_video_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		{include file="includes/video.tpl" link="0" voting="1"}
	{/container}
	
{/extend}