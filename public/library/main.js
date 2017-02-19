$(document).ready(function(){
	$('#reader').html5_qrcode(function(data){
			$('#read').html(data);
		},
		function(error){
			$('#read_error').html(error);
		}, function(videoError){
			$('#vid_error').html(videoError);
		}
	);
	
	$('#read').on('DOMSubtreeModified', function () {
	    var token = $('#read').text();
        $('#user_token1').val(token);
        $('#user_token2').val(token);

        $('body').css('background-color', '#CCFF90');
    })
});