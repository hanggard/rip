{extend template="imagetemplate"}
	
	{container name="title"}Картинки из альбома «{$album->name|upper}»{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_images_list();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Картинки из альбома «{$album->name|upper}»</h2>
		{if count($images) > 0}
			{$pager->render()}
			<div class="images">
				{foreach from=$images item=image name=images}
					{if $smarty.foreach.images.index % 4 == 3}
						{assign var=last value=1}
					{else}
						{assign var=last value=0}
					{/if}
					{include file="includes/image.tpl" last=$last}
				{/foreach}
				<div class="clear"></div>
			</div>
			{$pager->render()}
		{else}
			<p>Альбом пуст.</p>
		{/if}		
	{/container}
	
{/extend}