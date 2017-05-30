{extend template="imagetemplate"}
	
	{container name="title"}Тёмная комната{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_images_list();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Тёмная комната</h2>
		<div class="disclaimer">
			В тёмную комнату попадают картинки, присланные читателями сайта.<br />
			Если картинка хорошая, она будет перемещена в основную ленту.<br />
			В противном случае картинка будет удалена.
		</div>
		{if count($images) > 0}
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
		{else}
			Пока в тёмной комнате нет картинок...
		{/if}
	{/container}
	
{/extend}