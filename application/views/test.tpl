{extend template="template"}
	
	{container name="title"}Тестовая страница{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Тестовая страница</h2>
		<form action="/images/vote_up" method="post">
			<input type="hidden" name="image_id" value="6" />
			<input type="submit" value="Тест!" />
		</form>
	{/container}
	
{/extend}