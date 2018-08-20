$(function() {

	var form = $('#ajaxadd');
	
	var formMessages = $('#ajaxadd-messages');
	
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
			$('#Name').val('');
			$('#Phone').val('');
		});
	});
});