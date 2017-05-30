{extend template="imagetemplate"}
	
	{container name="title"}Картинки{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_images_list();
			});
		</script>
	{/container}
	
	{container name="content"}
		<div class="images">
			{$pager->render()}
			{foreach from=$images item=image name=images}
				{if $smarty.foreach.images.index % 4 == 3}
					{assign var=last value=1}
				{else}
					{assign var=last value=0}
				{/if}
				{include file="includes/image.tpl" last=$last}
			{/foreach}
			<div class="clear"></div>
			{$pager->render()}
		</div>
	{/container}
	
{/extend}