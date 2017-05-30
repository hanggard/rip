{extend template="videotemplate"}
	
	{container name="title"}Редактирование видео | Админка{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Редактирование видео</h2>
		{if count($errors) > 0}
			<div class="error">
				{if array_key_exists('youtube', $errors)}
					{if in_array('not_empty', $errors.youtube)}
						Введите ссылку на видеоролик на <strong>YouTube</strong>.<br />
					{/if}				
					{if in_array('format', $errors.youtube)}
						Введенная ссылка не ведёт к видеоролику на <strong>YouTube</strong>.<br />
					{/if}
				{/if}
				{if array_key_exists('title', $errors)}
					{if in_array('not_empty', $errors.title)}
						Введите заголовок видеоролика.<br />
					{/if}
					{if in_array('max_length', $errors.title)}
						Слишком длинный заголовок видеоролика (более 256 символов).<br />
					{/if}
				{/if}
				{if array_key_exists('description', $errors)}
					{if in_array('not_empty', $errors.description)}
						Введите описание видеоролика.<br />
					{/if}
				{/if}				
				{if array_key_exists('captcha', $errors)}
					{if in_array('match', $errors.captcha)}
						Вы неправильно ввели защитный код.<br />
					{/if}
				{/if}
			</div>
		{/if}
		<form method="post">
			<div class="left">
				<label>Ссылка:</label>
			</div>
			<div class="right">
				<input type="text" name="youtube" class="standard_input" value="http://youtube.com/watch?v={$video->youtube}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="{$video->title}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="description">{$video->description}</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Коллекции:</label>
			</div>
			<div class="right">
				<input type="text" name="collections" class="standard_input" value="{$collections}" />
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