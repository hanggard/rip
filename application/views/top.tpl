{extend template="template"}
	
	{container name="title"}Самые страшные{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Самые страшные за последнее время</h2>
		<div class="tales">
			{foreach from=$recent_tales item=tale name=recent_tales}
				{include file="includes/tale.tpl" link="1" voting="0"}
				{if ! $pda && $smarty.foreach.recent_tales.index == 2}
					<div class="banner"><a href="http://g-starkov.ru" title="Сайт Георгия Старкова" target="_blank"><img src="/media/images/banner.png?20140319" /></a></div>
					<div class="blank_20"></div>
				{/if}
			{/foreach}
		</div>
		<h2>Самые страшные за всё время</h2>
		<div class="tales">
			{foreach from=$ever_tales item=tale name=ever_tales}
				{include file="includes/tale.tpl" link="1" voting="0"}
			{/foreach}
		</div>
	{/container}
	
{/extend}