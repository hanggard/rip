function init_vote_buttons() {	
	$('.vote_up').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var tale_id = $(this).attr('tale');
			$.post(
				'/index/vote_up',
				{
					'tale_id': tale_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								var votes = $(this).html();
								votes++;
								if (votes > 0)
								{
									votes = '+' + votes;
								}
								$(this).html(votes);
							}
						});
					}
				}
			);
		});
	});
	$('.vote_down').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var tale_id = $(this).attr('tale');
			$.post(
				'/index/vote_down',
				{
					'tale_id': tale_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								var votes = $(this).html();
								votes--;
								if (votes > 0)
								{
									votes = '+' + votes;
								}								
								$(this).html(votes);
							}
						});
					}
				}
			);
		});
	});
}

function init_cvote_buttons() {	
	$('.vote_up').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var tale_id = $(this).attr('tale');
			$.post(
				'/contest/cvote_up',
				{
					'tale_id': tale_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								var votes = $(this).html();
								votes++;
								if (votes > 0)
								{
									votes = '+' + votes;
								}
								$(this).html(votes);
							}
						});
					}
				}
			);
		});
	});
	$('.vote_down').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var tale_id = $(this).attr('tale');
			$.post(
				'/contest/cvote_down',
				{
					'tale_id': tale_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								var votes = $(this).html();
								votes--;
								if (votes > 0)
								{
									votes = '+' + votes;
								}								
								$(this).html(votes);
							}
						});
					}
				}
			);
		});
	});
}