{extend template="template"}
	
	{container name="title"}Конкурс на лучшую страшную историю{/container}
	
	{container name="script"}
		<link type="text/css" href="/media/css/colorbox/colorbox.css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="/media/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('div.imagead a.ad').colorbox();
				init_cvote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		<div class="disclaimer">
			Kriper.Ru совместно с издательством «АСТ» проводит конкурс на лучшую страшную историю!<br />
			Конкурс посвящён выходу сборника рассказов ужасов Дарьи Бобылевой <a href="http://shop.ast.ru/catalog/fiction/fantastika-fentezi/zabytyy-chelovek-1-1_ID490832/" target="_blank">«Забытый человек»</a>.<br />
			Конкурс завершён, вы можете посмотреть <a href="http://kriper.ru/forum/viewtopic.php?f=14&t=5957">итоги</a>.
		</div>
		{if ! $pda}
			<div class="images">
				<div class="imagead">
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td valign="middle" align="center">
								<a class="ad" href="/media/images/ast1.png" title="«Забытый человек»"><img src="/media/images/ast1_thumb.png" /></a>
							</td>
						</tr>
					</table>
				</div>
				<div class="imagead">
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td valign="middle" align="center">
								<a class="ad" href="/media/images/ast2.jpg" title="Дарья Бобылева, автор книги «Забытый человек»"><img src="/media/images/ast2_thumb.jpg" /></a>
							</td>
						</tr>
					</table>
				</div>
				<div class="imagead imagead_last">
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td valign="middle" align="center">
								<a class="ad" href="/media/images/ast3.png" title="Издательство «АСТ»"><img src="/media/images/ast3_thumb.png" /></a>
							</td>
						</tr>
					</table>
				</div>
				<div class="clear"></div>
			</div>
		{/if}
		{if count($ctales) > 0}
			<h2>Истории, участвующие в конкурсе</h2>
		{/if}
		<div class="tales">
			{$pager->render()}
			{foreach from=$ctales item=ctale name=ctales}
				{include file="includes/ctale.tpl" link="1" voting="1"}
			{/foreach}
			{$pager->render()}
		</div>
	{/container}
	
{/extend}