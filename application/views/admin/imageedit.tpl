{extend template="imagetemplate"}
	
	{container name="title"}Редактирование картинки | Админка{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Редактирование картинки</h2>
		<form method="post">
			<div class="centered">
				<img src="/media/uploads/images/originals/{$image->file}" title="{$image->description|truncate:100}" />
			</div>		
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea name="description" class="description_textarea">{$image->description}</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Альбомы:</label>
			</div>
			<div class="right">
				<input type="text" name="albums" class="standard_input" value="{$image->get_albums_string()}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				&nbsp;
			</div>
			<div class="right">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
		</form>
	{/container}
	
{/extend}