{extend template="template"}
	
	{container name="title"}Рассказы, присланные на конкурс{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_cvote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<h2>Рассказы, присланные на конкурс</h2>
		<div class="disclaimer">
			Здесь вы видите истории, присланные на конкурс и пока не прошедшие проверку.<br />
			ВНИМАНИЕ! Так как это конкурсные работы, перед одобрением можно сделать лишь грамматическую правку, не более.
		</div>
		{if count($ctales) > 0}
			<div class="tales">
				{$pager->render()}
				{foreach from=$ctales item=ctale name=ctales}
					{include file="includes/ctale.tpl" link="1" voting="1"}
				{/foreach}
				{$pager->render()}
			</div>
		{else}
			Пока нет историй, не прошедших проверку...
		{/if}
	{/container}
	
{/extend}