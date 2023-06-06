jQuery(document).ready(function ($) {

	$("#flwgb-login-form").on("submit",function (e) {

		e.preventDefault();
		var form = $(this);
		var formData= new FormData(document.getElementById('flwgb-login-form'));
		var submitBtn = form.find('#flwgb-login-submit');

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function() {

				$('.flwgb-loading').removeClass('flwgb-hide');
				$("#flwgb-login-form-result").html("");
				submitBtn.prop('disabled', true);

			},
			success: function (response) {

				if(response.loggedin){
					$("#flwgb-login-form-result").addClass("flwgb-success")
				} else {
					$("#flwgb-login-form-result").addClass("flwgb-danger")
				}

				$("#flwgb-login-form-result").html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');

				submitBtn.prop('disabled', false);

				if (response.return_url != null) {
					window.location.href = response.return_url;
				}

			},
			error: function (xhr, status, error) {

				$(".flwgb-login-form-result").html(xhr.responseText);

			}
		});

	})

	$("#flwgb-register-form").on("submit",function (e) {

		e.preventDefault();

		var formData = new FormData();

		formData.append("action", "flwgbregisterhandle");

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function() {

				$('.flwgb-loading').removeClass('flwgb-hide');

			},
			success: function (response) {

				$(".flwgb-form-result").html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');

				if (response.return_url != null) {
					window.location.href = response.return_url;
				}

			},
			error: function (xhr, status, error) {

				$(".flwgb-register-result").html(xhr.responseText);

			}
		});

	})


	$("#flwgb-reset-pass-request-form").on("submit",function (e) {

		e.preventDefault();

		alert("hello");
		/*var formData = new FormData();

		formData.append("action", "flwgbresetpasswordrequesthandle");

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function() {

				$('.flwgb-loading').removeClass('flwgb-hide');

			},
			success: function (response) {

				$(".flwgb-form-result").html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');

			},
			error: function (xhr, status, error) {

				$(".flwgb-register-result").html(xhr.responseText);

			}
		});*/

	})

	$("#resetpassform").on("submit",function (e) {

		e.preventDefault();

		var formData = new FormData();

		formData.append("action", "flwgbresetpasswordhandle");

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function() {

				$('.flwgb-loading').removeClass('flwgb-hide');

			},
			success: function (response) {

				$(".flwgb-form-result").html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');

			},
			error: function (xhr, status, error) {

				$(".flwgb-register-result").html(xhr.responseText);

			}
		});

	})


});
