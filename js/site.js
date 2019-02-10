
var current_playlist = [];
var audio_element;

function Audio(){
	this.currently_playing;
	this.audio = document.createElement('audio');

	this.set_track = function(track){
		this.audio.src=track.path;
		this.currently_playing = track;
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
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