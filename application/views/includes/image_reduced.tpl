<div class="image {if $last > 0}image_last{/if}">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="middle" align="center">
				<a href="/image/{$image->id}"><img src="/media/uploads/images/thumbnails/{$image->file}" title="{$image->description|truncate:100}" /></a>
			</td>
		</tr>
	</table>
</div>