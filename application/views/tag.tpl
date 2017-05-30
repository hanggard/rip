{extend template="template"}
	
	{container name="title"}Истории с меткой «{$tag->text|upper}»{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Истории с меткой «{$tag->text|upper}»</h2>
		{if count($tales) > 0}
			{$pager->render()}
			<div class="tales">
				{foreach from=$tales item=tale name=tales}
					{include file="includes/tale.tpl" link="1" voting="1"}
					{if ! $pda && $smarty.foreach.tales.index == 2}
						<div class="banner"><a href="http://g-starkov.ru" title="Сайт Георгия Старкова" target="_blank"><img src="/media/images/banner.png?20140319" /></a></div>
						<div class="blank_20"></div>
					{/if}
				{/foreach}
			</div>
			{$pager->render()}
		{else}
			<p>Историй с такой меткой нет на сайте.</p>
		{/if}
	{/container}
	
{/extend}