var thanks_text = 'спасибо!';

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
						$('.thanks').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								$(this).html(thanks_text);
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
						$('.thanks').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								$(this).html(thanks_text);
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
						$('.thanks').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								$(this).html(thanks_text);
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
						$('.thanks').each(function() {
							if ($(this).attr('tale') == tale_id)
							{
								$(this).html(thanks_text);
							}
						});
					}
				}
			);
		});
	});
}

function init_image_vote_buttons() {
	$('.vote_up').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var image_id = $(this).attr('image');			
			$.post(
				'/images/vote_up',
				{
					'image_id': image_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('image') == image_id)
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
						$('.thanks').each(function() {
							if ($(this).attr('image') == image_id)
							{
								$(this).html(thanks_text);
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
			var image_id = $(this).attr('image');
			$.post(
				'/images/vote_down',
				{
					'image_id': image_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('image') == image_id)
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
						$('.thanks').each(function() {
							if ($(this).attr('image') == image_id)
							{
								$(this).html(thanks_text);
							}
						});
					}
				}
			);
		});
	});
}

function init_images_list() {
}

function init_video_vote_buttons() {
	$('.vote_up').each(function() {
		$(this).click(function(e){
			e.preventDefault();
			var el = this;
			var video_id = $(this).attr('video');
			$.post(
				'/videos/vote_up',
				{
					'video_id': video_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('video') == video_id)
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
						$('.thanks').each(function() {
							if ($(this).attr('video') == video_id)
							{
								$(this).html(thanks_text);
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
			var video_id = $(this).attr('video');
			$.post(
				'/videos/vote_down',
				{
					'video_id': video_id
				},
				function(response) {
					if (response == 1)
					{
						$('.votes_count').each(function() {
							if ($(this).attr('video') == video_id)
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
						$('.thanks').each(function() {
							if ($(this).attr('video') == video_id)
							{
								$(this).html(thanks_text);
							}
						});
					}
				}
			);
		});
	});
}