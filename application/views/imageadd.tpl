{extend template="imagetemplate"}
	
	{container name="title"}Загрузите свою страшную картинку{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Загрузите свою страшную картинку</h2>
		<p>Если вы хотите поделиться с посетителями сайта своими страшными картинками, загрузите их прямо здесь.</p>
		<p>Не будут приниматься картинки, эффект которых основан только на демонстрации сцен, вызывающих отвращение.</p>
		<p>Не рекомендуем отправлять картинки, защищённые авторским правом. В противном случае укажите в описании имя автора и/или ссылку на первоисточник.</p>
		<div class="blank_10"></div>
		{if count($errors) > 0}
			<div class="error">
				{if array_key_exists('files', $errors)}
					{if in_array('not_empty', $errors.files)}
						Не загружен ни один файл - либо вы отправили пустую форму, либо файлы у вас неправильного формата.<br />					{/if}
				{/if}
				{if array_key_exists('captcha', $errors)}
					{if in_array('match', $errors.captcha)}
						Вы неправильно ввели защитный код. К сожалению, вам нужно выбрать файлы для загрузки заново.<br />
					{/if}
				{/if}
				{if array_key_exists('rule', $errors)}
					{if in_array('ban', $errors.rule)}
						Вам запрещено загружать файлы на этот сайт.<br />
					{/if}
				{/if}				
			</div>
		{/if}
		<form method="post" enctype="multipart/form-data">
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_1" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_1" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				{if $auth}
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_1" class="standard_input" />
					</div>
					<div class="clear"></div>
				{/if}
			</div>
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_2" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_2" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				{if $auth}
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_2" class="standard_input" />
					</div>
					<div class="clear"></div>
				{/if}
			</div>
			<div class="area">
				<div class="left">
					<label>Файл:</label>
				</div>
				<div class="right">
					<input type="file" name="image_3" class="standard_input" />
				</div>
				<div class="clear"></div>
				<div class="left">
					<label>Описание:</label>
				</div>
				<div class="right">
					<textarea name="description_3" class="description_textarea"></textarea>
				</div>
				<div class="clear"></div>
				{if $auth}
					<div class="left">
						<label>Альбомы:</label>
					</div>
					<div class="right">
						<input type="text" name="albums_3" class="standard_input" />
					</div>
					<div class="clear"></div>
				{/if}
			</div>			
			{if ! $auth}
				<div class="area">
					<div class="left">
						<label>Код защиты:</label>
					</div>
					<div class="right">
						<input type="text" name="captcha" class="short_input" value="" maxlength="4" />
						<span>(введите текст, который вы видите на картинке ниже)</span>
						<div class="captcha">{$captcha->render()}</div>
					</div>
					<div class="clear"></div>
				</div>
			{/if}
			<div class="left">
				<input type="submit" class="standard_button" value="Отправить" />
			</div>
			<div class="clear"></div>
		</form>
	{/container}
	
{/extend}