$(function() {

	var form = $('#ajaxdisplay');
	
	var formMessages = $('#ajaxdisplay-messages');
	
	$(form).submit(function(e) {
		e.preventDefault();
		var formData = $(form).serialize();
		$.ajax({
			type: 'GET',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');
			$(formMessages).html(response);
		});
	});
});