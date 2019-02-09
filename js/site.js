
var current_playlist = array();
var audio_element;

function Audio(){
	this.currently_playing;
	this.audio = document.createElement('audio');

	this.set_track = function(src){
		this.audio.src=src;
	}

}

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