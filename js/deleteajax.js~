$(function() {

	var form = $('#ajaxdelete');
	
	var formMessages = $('#ajaxdelete-messages');
	
	$(form).submit(function(e) {
		e.preventDefault();
		var formData = $(form).serialize();
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');
			$(formMessages).text(response);
			$('#UserID').val('');
		});
	});
});