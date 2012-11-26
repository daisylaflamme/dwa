$(document).ready(function() {
var work = 5000;
var t1;
var alarm;
var alarmStart = function () {
	/* alarm */
	alarm = document.getElementById("alarm");
	if (alarm == null) alert("Failed to initialize alarm.");
	//alarm.load();
	alarm.play();
}
 $('.start').click(function(event){
	t1 = window.setTimeout(function() {
    alarmStart();	
	alert("Press Break or Continue button!");
	
		}, 5000);	
	})

$('#pause').click(function(event) {
	 clearTimeout(t1);	
	});	
	
$('#reset').click(function(event) {
	 clearTimeout(t1);	
	});	
	
$('#break').click(function(event) {
	var rest = 2000;
	window.setTimeout(function() {
    	alarmStart();
		alert("Time to work!");
		
		window.setTimeout(function() {
    	alarmStart();
		alert("Your time is up!");
		}, 5000);	
	}, rest);	
});

$('#sound_stop').click(function(event){
	  $('#alarm').stop();	
});
	

/*var d = new Date();
console.log(d.getSeconds());	
var last, diff;
$('div').click(function(event) {
  if ( last ) {
    diff = (event.timeStamp - last)/1000
    $('div').append('time since last event: ' + diff + '<br/>');
  } else {
    $('div').append('Click again.<br/>');
  }
  last = event.timeStamp;
  if( diff > 5.000) {
	alert("Time is up");  
  }
});  
*/

/*
$("#start").click(function() {
	
		// Figure out what is the current time
		var current_time = $(this).now();
		
			
		$("#display_time").html(current_time);
		
	});
*/

});