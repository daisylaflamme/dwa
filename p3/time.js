$(document).ready(function() {

var work = 2400000; //40 minutes of work
var t1; // represents the time interval of work or break 
var alarm; // audio sound 
//initialize and start playing the alarm
var alarmStart = function () {
	alarm = document.getElementById("alarm");
	if (alarm == null) alert("Failed to initialize alarm.");
	//alarm.load();
	alarm.play();
}
//setting the time for 40 minutes,then playing the alarm and giving alert of choice
 $('.start').click(function(event){
	t1 = window.setTimeout(function() {
    alarmStart();	
	alert("Press Break or Continue button!");
	
		}, work);	
	})
//reseting the set time of work or break
$('#pause').click(function(event) {
	 clearTimeout(t1);	
	});	
//stop counting the time of work or break
$('#reset').click(function(event) {
	 clearTimeout(t1);	
	});	
//setting interval of 10 minutes break, then playing the alarm, alerting for break end, and setting the work time for 40 minutes	
$('#break').click(function(event) {
	var rest = 600000;
	t1 = window.setTimeout(function() {
    	alarmStart();
		alert("End of Break!");
		
		window.setTimeout(function() {
    	alarmStart();
		alert("Press Break or Continue button!");
		}, work);	
	}, rest);	
});
/*
$('#sound_stop').click(function(event){
	  $('#alarm').stop();	
});
	
var d = new Date();
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