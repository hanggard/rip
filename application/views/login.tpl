{extend template="template"}
	
	{container name="title"}Авторизация{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Авторизация</h2>
		{if $error}
			<div class="error">
				Неверный пароль.
			</div>
		{/if}
		<form method="post">
			Введите пароль администратора:
			<input type="password" class="standard_input" name="password" />
		</form>
	{/container}

{/extend}