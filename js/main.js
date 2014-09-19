var per = "";
var debug = false;

$(document).ready(function() {
});

setInterval(function(){	
	// Weekend Check
	var dt = new Date();
	if (dt.getDay() === 0 || dt.getDay() == 6) {
		$(".right").html("N/A");
		$(".period").html("HAVE A NICE DAY");
	} else {
		// All weekday commands goes here
		getDay();
		getPeriod();
	}
}, 1000);

// Server Related Time Scheduling System
function getDay() {
	$.ajax ({
		url: "fetchdata.php",
		type: "POST",
		data: {request : "day_type"},
		cache: false,
		success: function (data) {
		    if (data === "NULL") $(".right").html("N/A");
			else $(".right").html(data);
		}
	});
}

function getPeriod() {
	var currentTime = new Date();
    var h = currentTime.getHours();
    var m = currentTime.getMinutes();
	var s = currentTime.getSeconds();
	
	var time;
	if (s < 10) time = h + ":" + m + ":0" + s;
	else time = h + ":" + m +":" + s;
	
    $.ajax ({
        url: "fetchdata.php",
        type: "POST",
        data: {request : "period", jikan: time},
        cache: false,
        success: function (data) {
			if (per != data) {
				if (data == "Period 1" || per != "") {
					$.ionSound.play("chime");
					if (per != "Period 9" && data != "") setInterval(speak("Please proceed to " + data), 60000);
				}
				per = data;
			}
			$(".period").html(data);
		}
    });
}

var msg = new SpeechSynthesisUtterance();

function speak(text) {
	var u = new SpeechSynthesisUtterance(text);
    speechSynthesis.speak(u);
}

function ttsTest() {
	$.ionSound.play("chime");
	
	var u = new SpeechSynthesisUtterance("Hello Tenafly High School. This is a test of CHRONOS, the school's new unified clock and bell system.");
	speechSynthesis.speak(u);
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

$.ionSound({
    sounds: [                       // set needed sounds names
        "chime",
    ],
    path: "sound/",                // set path to sounds
    multiPlay: false,               // playing only 1 sound at once
    volume: "0.3"                   // not so loud please
});

