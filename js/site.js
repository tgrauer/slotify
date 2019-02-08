$(document).ready(function(){

	$('.hideLogin').on('click', function(){
		$('#loginForm').hide();
		$('#registerForm').show();
	});

	$('.hideReg').on('click', function(){
		$('#loginForm').show();
		$('#registerForm').hide();
	});
});