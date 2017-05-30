{extend template="videotemplate"}
	
	{container name="title"}Тёмная комната{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_video_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Тёмная комната</h2>
		<div class="disclaimer">
			В тёмную комнату попадают видеоролики, присланные читателями сайта.<br />
			Если видеоролик хороший, он будет перемещён в основную ленту.<br />
			В противном случае видеоролик будет удалён.
		</div>
		{if count($videos) > 0}
			<div class="videos">
				{$pager->render()}
				{foreach from=$videos item=video name=videos}
					{include file="includes/video.tpl" link="1" voting="1"}
				{/foreach}
				{$pager->render()}
			</div>
		{else}
			Пока в тёмной комнате нет видеороликов...
		{/if}
	{/container}
	
{/extend}