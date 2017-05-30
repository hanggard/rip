{extend template="imagetemplate"}
	
	{container name="title"}{if empty($image->description)}Картинка без описания{else}{$image->description|truncate:100}{/if}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_image_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		{include file="includes/image_full.tpl" link="0" voting="1"}
	{/container}
	
{/extend}