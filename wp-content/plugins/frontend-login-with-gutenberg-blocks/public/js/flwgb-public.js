jQuery(document).ready(function ($) {
	$('#flwgb-login-form').on('submit', function (e) {
		e.preventDefault();
		const form = $(this);
		const formData = new FormData(
			document.getElementById('flwgb-login-form')
		);
		const submitBtn = form.find('#flwgb-login-submit');
		const formResult = $('#flwgb-login-form-result');
		const loadingBtn = $('#flwgb-login-loading');

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function () {
				formBeforeSend(formResult, submitBtn, loadingBtn)
			},
			success: function (response) {
				formSuccess(response, formResult, submitBtn, loadingBtn)
			},
			error: function (xhr) {
				formError(xhr, formResult)
			},
		});
	});

	//Lost password request form
	$('#flwgb-reset-pass-request-form').on('submit', function (e) {
		e.preventDefault();
		const form = $(this);
		const formData = new FormData(
			document.getElementById('flwgb-reset-pass-request-form')
		);
		const submitBtn = form.find('#flwgb-reset-request-submit');
		const formResult = $('#flwgb-reset-request-form-result');
		const loadingBtn = $('#flwgb-reset-request-loading');

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function () {
				formBeforeSend(formResult, submitBtn, loadingBtn)
			},
			success: function (response) {
				formSuccess(response, formResult, submitBtn, loadingBtn)
			},
			error: function (xhr) {
				formError(xhr, formResult)
			},
		});
	});

	// Reset Password Form
	$('#resetpassform').on('submit', function (e) {
		e.preventDefault();

		var formData = new FormData();

		formData.append('action', 'flwgbresetpasswordhandle');

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function () {
				$('.flwgb-loading').removeClass('flwgb-hide');
			},
			success: function (response) {
				$('.flwgb-form-result').html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');
			},
			error: function (xhr, status, error) {
				$('.flwgb-register-result').html(xhr.responseText);
			},
		});
	});

	// Registration Form
	$('#flwgb-register-form').on('submit', function (e) {
		e.preventDefault();

		var formData = new FormData();

		formData.append('action', 'flwgbregisterhandle');

		$.ajax({
			url: flwgb_ajax_object.ajax_url,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			beforeSend: function () {
				$('.flwgb-loading').removeClass('flwgb-hide');
			},
			success: function (response) {
				$('.flwgb-form-result').html(response.message);

				$('.flwgb-loading').addClass('flwgb-hide');

				if (response.return_url != null) {
					window.location.href = response.return_url;
				}
			},
			error: function (xhr, status, error) {
				$('.flwgb-register-result').html(xhr.responseText);
			},
		});
	});

	function formBeforeSend(form_result, submitBtn, loadingBtn) {
		loadingBtn.removeClass('flwgb-hide');
		form_result.html('');
		submitBtn.prop('disabled', true);
	}

	function formSuccess(response, form_result, submitBtn, loadingBtn) {
		if (response.loggedin) {
			form_result.addClass('flwgb-success');
		} else {
			form_result.addClass('flwgb-danger');
		}

		form_result.html(response.message);

		loadingBtn.addClass('flwgb-hide');

		submitBtn.prop('disabled', false);

		if (response.return_url != null) {
			window.location.href = response.return_url;
		}
	}

	function formError(xhr, form_result){
		form_result.addClass('flwgb-danger');
		form_result.html(xhr.responseText);
	}

});


