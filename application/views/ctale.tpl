{extend template="template"}
	
	{container name="title"}{$ctale->title}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_cvote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		{include file="includes/ctale.tpl" link="0" voting="1"}
	{/container}
	
{/extend}