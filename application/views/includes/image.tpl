<div class="image {if $last > 0}image_last{/if}">
	<div class="head">
		<div class="identifier">
			<a href="/image/{$image->id}" title="Прямая ссылка на картинку">#{$image->id}</a>
		</div>
		<div class="date">
			{$image->date|date}
		</div>
		<div class="clear"></div>
	</div>
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="middle" align="center">
				<a href="/image/{$image->id}"><img src="/media/uploads/images/thumbnails/{$image->file}" title="{$image->description|truncate:100}" /></a>
			</td>
		</tr>
	</table>
	<div class="foot">
		{if $image->active >= 0}
			<div class="votes">
				<div class="votes_count" tale="{$image->id}">
					{if $image->votes > 0}+{/if}{$image->votes}
				</div>
			</div>
			<div class="clear"></div>
		{/if}
		<div class="clear"></div>
	</div>	
</div>