{extend template="template"}
	
	{container name="title"}Тёмная комната{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Тёмная комната</h2>
		<div class="disclaimer">
			В тёмную комнату попадают истории, присланные читателями сайта.<br />
			Если история хорошая, она будет отредактирована и перемещена в основную ленту.<br />
			В противном случае история будет удалена.
		</div>
		{if count($tales) > 0}
			<div class="tales">
				{$pager->render()}
				{foreach from=$tales item=tale name=tales}
					{include file="includes/tale.tpl" link="1" voting="1"}
				{/foreach}
				{$pager->render()}
			</div>
		{else}
			Пока в тёмной комнате нет историй...
		{/if}
	{/container}
	
{/extend}