{extend template="videotemplate"}
	
	{container name="title"}Загрузите страшное видео с YouTube{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Загрузите страшное видео с YouTube</h2>
		<p>Если вы хотите поделиться с посетителями сайта видеороликом, найденным на <strong>YouTube</strong>, дайте ссылку на него здесь.</p>
		<p>Не будут приниматься «скримеры» и ролики, эффект которых основан на демонстрации сцен, вызывающих отвращение.</p>
		<p>Перед тем, как загрузить видео, убедитесь, что автор разрешил встраивание ролика на других сайтах (иначе просмотр на нашем сайте будет невозможен).</p>
		<p>Видеоролик обязательно должен сопровождаться коротким описанием, рассказывающим о его содержании.</p>
		<div class="blank_10"></div>
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
				<input type="text" name="youtube" class="standard_input" value="{$new_video->youtube}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="{$new_video->title}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Описание:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="description">{$new_video->description}</textarea>
			</div>
			<div class="clear"></div>
			{if $auth}
				<div class="left">
					<label>Коллекции:</label>
				</div>
				<div class="right">
					<input type="text" name="collections" class="standard_input" value="{$collections}" />
				</div>
				<div class="clear"></div>
			{/if}
			{if ! $auth}
				<div class="left">
					<label>Код защиты:</label>
				</div>
				<div class="right">
					<input type="text" name="captcha" class="short_input" value="" maxlength="4" />
					<span>(введите текст, который вы видите на картинке ниже)</span>
					<div class="captcha">{$captcha->render()}</div>
				</div>
				<div class="clear"></div>
			{/if}
			<div class="left">
				&nbsp;
			</div>
			<div class="right">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
			<div class="clear"></div>
		</form>
	{/container}
	
{/extend}