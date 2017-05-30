{extend template="template"}
	
	{container name="title"}Примите участие в конкурсе{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Примите участие в конкурсе</h2>
		<p>Здесь вы можете прислать своё произведение для конкурса на лучшую страшную историю.</p>
		<p>С условиями конкурса вы можете ознакомиться <a href="http://kriper.ru/forum/viewtopic.php?f=14&t=5823">здесь</a>. Если ваша история не соответствует требованиям для участия в конкурсе, она может быть отклонена администраторами.</p>
		<p>Отправляя историю, вы соглашаетесь, что она пройдёт через редактирование.</p>
		<div class="blank_10"></div>
		{if $received}
			<div class="success">
				Спасибо! Ваша история принята и будет опубликована на странице конкурса после проверки администраторами.
			</div>
		{/if}
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
						Введите ваше имя.<br />
					{/if}
				{/if}
				{if array_key_exists('email', $errors)}
					{if in_array('not_empty', $errors.email)}
						Укажите свой адрес электронной почты.<br />
					{/if}
					{if in_array('max_length', $errors.email)}
						Слишком длинный адрес электронной почты (более 1024 символов).<br />
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
				<input type="text" name="title" class="standard_input" value="{$new_ctale->title}" />
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Текст:</label>
			</div>
			<div class="right">
				<textarea class="standard_textarea" name="text">{$new_ctale->text}</textarea>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>Автор:</label>
			</div>
			<div class="right">
				<input type="text" name="author" class="standard_input" value="{$new_ctale->author}" />
				<div class="clear"></div>
				<small>Введите ваше имя или псевдоним, под которым будет опубликована история</small>
			</div>
			<div class="clear"></div>
			<div class="left">
				<label>E-mail:</label>
			</div>
			<div class="right">
				<input type="text" name="email" class="standard_input" value="{$new_ctale->email}" />
				<div class="clear"></div>
				<small>Укажите адрес E-mail, по которому администрация свяжется с вами в случае занятия призового места</small>
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