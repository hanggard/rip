{extend template="template"}
	
	{container name="title"}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		{if ! $pda}
			<div class="images">
				{foreach from=$images item=image name=images}
					{if $smarty.foreach.images.index % 4 == 3}
						{assign var=last value=1}
					{else}
						{assign var=last value=0}
					{/if}
					{include file="includes/image_reduced.tpl" last=$last}
				{/foreach}
				<div class="clear"></div>
			</div>
		{/if}
		<div class="tales">
			{$pager->render()}
			{foreach from=$tales item=tale name=tales}
				{include file="includes/tale.tpl" link="1" voting="1"}
				{if ! $pda && $smarty.foreach.tales.index == 2}
					<div class="banner"><a href="http://g-starkov.ru" title="Сайт Георгия Старкова" target="_blank"><img src="/media/images/banner.png?20140319" /></a></div>
					<div class="blank_20"></div>
				{/if}
			{/foreach}
			{$pager->render()}
		</div>
	{/container}
	
{/extend}