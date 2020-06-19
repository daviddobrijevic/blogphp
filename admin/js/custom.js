

$(document).ready(function() {

	$('.checking_email').keyup(function (e) {
		var email = $('.checking_email').val();
			
			$.ajax({
			type: 'post',
			url: 'db/code_register.php',
			data: {
				'check_submit_btn': 1,
				'email_id': email,
			},
			success: function(response) {
				// alert(response);
				$('.error_email').text(response);

			}
		});

	});

});