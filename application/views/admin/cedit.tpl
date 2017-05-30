{extend template="template"}
	
	{container name="title"}Редактирование истории | Админка{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Редактирование истории</h2>
		{if count($errors) > 0}
			<div class="error">
				{if array_key_exists('title', $errors)}
					{if in_array('not_empty', $errors.title)}
						Введите заголовок истории.<br />
					{/if}
					{if in_array('max_length', $errors.title)}
						Слишком длинный заголовок истории (более 256 символов).<br />
					{/if}				
				{/if}
				{if array_key_exists('text', $errors)}
					{if in_array('not_empty', $errors.text)}
						Введите текст истории.<br />
					{/if}
				{/if}
				{if array_key_exists('author', $errors)}
					{if in_array('not_empty', $errors.author)}
						Введите имя автора истории.<br />
					{/if}
				{/if}
			</div>
		{/if}
		<form method="post">
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="{$ctale->title}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Текст:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="text">{$ctale->text}</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Автор:</label>
			</div>
			<div class="right">
				<input type="text" name="author" class="standard_input" value="{$ctale->author}" />
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