{extend template="template"}
	
	{container name="title"}{$tale->title}{/container}
	
	{container name="script"}
		<script type="text/javascript">
			$(document).ready(function(){
				init_vote_buttons();
			});
		</script>
	{/container}
	
	{container name="content"}
		{include file="includes/tale.tpl" link="0" voting="1"}
	{/container}
	
{/extend}