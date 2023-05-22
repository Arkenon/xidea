jQuery(document).ready(function ($) {

	$(document).on("submit", ".flwgb-register-form", function () {

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

				$(".flwgb-register-result").html(response.message);

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


});
