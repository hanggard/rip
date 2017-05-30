{extend template="template"}
	
	{container name="title"}Напишите свою страшную историю{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Напишите свою страшную историю</h2>
		<p>Если вы хотите поделиться с посетителями сайта своей страшной историей, напишите её прямо здесь.</p>
		<p>Отправляя историю, вы соглашаетесь, что она пройдёт через редактирование и может быть существенно изменена.</p>
		<p>Не рекомендуем отправлять тексты, защищённые авторским правом. В противном случае укажите в тексте имя автора и/или ссылку на первоисточник.</p>
		<div class="blank_10"></div>
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
				{if array_key_exists('captcha', $errors)}
					{if in_array('match', $errors.captcha)}
						Вы неправильно ввели защитный код.<br />
					{/if}
				{/if}
			</div>
		{/if}
		<form method="post">
			<div class="left">
				<label>Заголовок:</label>
			</div>
			<div class="right">
				<input type="text" name="title" class="standard_input" value="{$new_tale->title}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Текст:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="text">{$new_tale->text}</textarea>
			</div>
			<div class="clear"></div>
			{if $auth}
				<div class="left">
					<label>Метки:</label>
				</div>
				<div class="right">
					<input type="text" name="tags" class="standard_input" value="{$tags}" />
				</div>
				<div class="clear"></div>
			{/if}
			<div class="left">
				<label>Источник:</label>
			</div>
			<div class="right">
				<input type="text" name="url" class="standard_input" value="{$new_tale->url}" />
				<div class="clear"></div>
				<small>Если вы скопировали историю с другого сайта, введите здесь ссылку на соответствующую страницу</small>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Автор:</label>
			</div>
			<div class="right">
				<input type="text" name="author" class="standard_input" value="{$new_tale->author}" />
				<div class="clear"></div>
				<small>Если история является авторской, введите здесь имя её автора</small>
			</div>
			<div class="clear"></div>
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