/*

Ajax Debugger.
Provides an In-Depth Tool to Analyze Ajax Interactions with Web Servers.
Copyright (C) 2007  Steven Ray Schronk

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.

*/

// DETERMINE WHICH BROWSER IS PRESENT
// FIREFOX DOES NOT SUPPORT SENDING DATA TO THE OS KEYBOARD
// ALSO FIREFOX DOES NOT REACT WELL TO AN UNCOMMENTED PAYLOAD
var agent = navigator.userAgent.toLowerCase();
if ( agent.indexOf("firefox") != -1 ){ agent="firefox"; }
else if ( agent.indexOf("msie") != -1 ){ agent="exploder"; }
else if ( agent.indexOf("opera") != -1 ){ agent="opera"; }
else { agent="unknown"; }

var ajax_event_no = 0; // AJAX EVENT COUNTER
var event_no = 0;      // EVENT COUNTER
var ajax_min = "X";    // AJAX MINIMUM TIME
var ajax_max = "X";    // AJAX MAXIMUM TIME
var ajax_avg = "X";    // AJAX AVERAGE TIME

// OPENS NEW WINDOW THAT WILL DISPLAY ALL DEBUG INFO
function openDebug() {
  //var pageLocation = parent.window.location.toString();
  // RESET ALL COUNTERS AND COLLECTED TIME DATA
  ajax_event_no = 0; // RESET AJAX EVENTS COUNTER
  event_no = 0;      // RESET EVENTS COUNTER
  ajax_min = 0;      // RESET AJAX MINIMUM TIME
  ajax_max = 0;      // RESET AJAX MAXIMUM TIME
  ajax_avg = 0;      // RESET AJAX AVERAGE TIME
  debug = window.open("debug_popup.html", "Debugger","location=no,status=no,toolbar=no,menubar=no,resizable=yes,height=500,width=600,top=550,left-500,scrollbars=1")
  }

// CLEAR ALL DEBUG VALUES MADE SO FAR
function clearDebugger() {
  document.getElementById("main").innerHTML = "";
  }

function copyInfo(pageElement) {
  window.clipboardData.setData('Text', document.getElementById(pageElement).innerHTML);
  }

// DISPLAY RUNNING CLOCK AT TOP OF DEBUGGER
var clockID = 0;

function UpdateClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
      }

   var tDate = new Date();
  // ADD LEADING ZEROS TO TIME VALUES
  var hours = tDate.getHours().toString();
  if (hours < 10) { hours = "0" + hours;}

  var minutes = tDate.getMinutes().toString();
  if (minutes < 10) { minutes = "0" + minutes;}

  var seconds = tDate.getSeconds().toString();
  if (seconds < 10) { seconds = "0" + seconds;}

   document.getElementById("time").innerHTML = "" + hours + ":" + minutes + ":" + seconds;
   clockID = setTimeout("UpdateClock()", 1000);
   }

function StartClock() {
   clockID = setTimeout("UpdateClock()", 500);
   }

function KillClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
     }
   }

// IF DISPLAY IS NONE, DISPLAYS CONTENT - OTHERWISE ERASE CONTENT
function viewContent(pageElement, icon) {
  // INSERT INPUT INTO DIV
  if (document.getElementById(pageElement).style.display == "none") {
    document.getElementById(pageElement).style.display="inline";
    document.getElementById(icon).innerHTML = "~";
    }
  // CLEAR DIV - CONTENT SHOULD DISAPPEAR
  else {
    document.getElementById(pageElement).style.display="none";
    //document.getElementById(pageElement).innerHTML = ""
    document.getElementById(icon).innerHTML = "+";
    }
  }

// BUG WHEN USED IN REMOTE WINDOW, DISPLAYS UNDEFINED AS IT GOES THOUGH ARRAY :(
// PRINTS OUT A COLORED CHART OF NAME VALUE PAIRS
// ALL COOLIES FOR THIS DOMAIN SHOULD BE DISPLAYED
function getAllCookies() {
  if (document.cookie) {
    var everycookievalue  = document.cookie;
    var pairsSplit = everycookievalue.split(";");
    var patternNospace = /[^\s]+/;
    var finalName;
    var finalValue;
    var string = ""; // CONTAINS STRING OF COOKIE VALUES
    for ( count=0 ; ( pairsSplit[count] != undefined ) ; count++ ) {
      elementsSplit = pairsSplit[count].split("=");
      //finalName = ;
      //document.writeln("<div id=right_justify><div id=blue>" + finalName + "</div>&nbsp;&nbsp;=&nbsp;&nbsp;</div>");
      string += "<div id=right_justify><div id=blue>" + elementsSplit[0].match(patternNospace) + "</div>&nbsp;&nbsp;=&nbsp;&nbsp;</div>";
      // finalValue = ;
      //document.writeln("<div id=left_justify><div id=red>" + finalValue + "</div></div><br />");
      string += "<div id=left_justify><div id=red>" + elementsSplit[1].match(patternNospace) + "</div></div><br />";
      }
  }
  return string;
}

// SIMPLIFIED VERSION OF ABOVE SCRIPT
// MIGHT COME IN HANDY SOME DAY
function getAllCookies2() {
  var string;
  var cookies  = document.cookie.replace(/ /g,"").split(";");
  for (var i = 0; i < cookies.length; i++){
    cookiePair = cookies[i].split("=");
    //document.write("["+cookiePair[0]+"] = ["+cookiePair[1]+"]<br><br>");
    string += cookiePair[0] + cookiePair[1] + "<br />";
    return string;
    }
  }

// ADDS EVENT TO DEBUGGER CONSOLE
// url = address of event on page
// style = type (color) of box to be displayed
// payload = data recieved from ajax event
// time = ping time data sent from ajax event - listed in milliseconds
function debugEvent(url, style, payload, time) {
  if (style == "got") { ajax_event_no++; }
  event_no++;  // INCREMENT EVENTS COUNTER
  debug.document.getElementById("events").innerHTML = "Event: "+event_no;

  // ADJUST AJAX TIMES ON BANNER

  if (undefined != time) {
    if ((ajax_min == "X" )) { // AJAX NEVER USED BEFORE - SET MIN,MAX,AVG TO THIS INITAL VALUE
      ajax_max = time;
      ajax_min = time;
      ajax_avg = time;
      } else { // MODIFY AJAX TIMES
        // NEW MAX FOUND?
        if (time > ajax_max) { ajax_max=time}
        // NEW MIN FOUND?
        if (time < ajax_min) { ajax_min=time}
        // RECALCULATE AVERAGE
        //ajax_avg = (ajax_avg + (time * 1/event_no))/2;
        //ajax_avg = (ajax_avg+time)/2;
        ajax_avg = ((ajax_avg*(ajax_event_no-1))+time)/(ajax_event_no);
        // REMOVE DECIMAL
        ajax_avg = Math.round(ajax_avg);
      }
    debug.document.getElementById("ajax_max").innerHTML = "Max: "+ajax_max;
    debug.document.getElementById("ajax_min").innerHTML = "Min: "+ajax_min;
    debug.document.getElementById("ajax_avg").innerHTML = "Avg: "+ajax_avg;
    }

  var tDate = new Date();
  var hours = tDate.getHours().toString();
  if (hours < 10) { hours = "0" + hours; }

  var minutes = tDate.getMinutes().toString();
  if (minutes < 10) { minutes = "0" + minutes; }

  var seconds = tDate.getSeconds().toString();
  if (seconds < 10) { seconds = "0" + seconds; }

  var millisec = tDate.getTime();
  var random   = parseInt(Math.random()*9999);
  // CONVERT BOTH VALUES TO STRINGS AND APPEND THEM
  // PROVIDES A GAURANTEED RANDOM VALUE FOR DIV IDs :)
  var divid = millisec.toString() +"-"+ random.toString();

  var payload_stripped = payload;

  // STRIP HTML TAGS OUT OF PAYLOAD
  if (payload) {
  //payload = payload.replace(/(<([^>]+)>)/ig,"");
    payload_stripped = payload_stripped.replace(/&/g,"&amp;");
    payload_stripped = payload_stripped.replace(/</g,"&lt;");
    payload_stripped = payload_stripped.replace(/>/g,"&gt;");
    payload_stripped = payload_stripped.replace(/[\n\t]{1,}/g,"<br />");

    // ADD INLINE DIVS TO payload_stripped - WILL ADD COLOR
    // ALL TAGS TURN BLUE
    payload_stripped = payload_stripped.replace(/(&lt;.*?&gt;)/g, "<div id=blue>$1</div>&nbsp;");
    // EVERYTHING IN QUOTES TURNS RED
    payload_stripped = payload_stripped.replace(/(".*?")/g, "<div id=red>$1</div>&nbsp;");
    // ALL HTML COMMENTS TURN GRAY
    payload_stripped = payload_stripped.replace(/(&lt;!--.*?--&gt;)/g, "<div id=gray>$1</div>&nbsp;");
    // ALL JAVASCRIPT COMMENTS TURN GRAY
    payload_stripped = payload_stripped.replace(/(\/\/.*?<br \/>)/g, "<div id=gray>$1</div>&nbsp;");
    // ALL JAVASCRIPT VARIABLES TURN GREEN
    payload_stripped = payload_stripped.replace(/(var)/g, "<div id=green>$1</div>&nbsp;");
    // ALL JAVASCRIPT FUNCTIONS TURN BOLD
    payload_stripped = payload_stripped.replace(/(function.*?){/g, "<div id=bold>$1</div>&nbsp;{&nbsp;");
    }
  else { payload = "No Data Sent"; payload_stripped = "No Data Sent"; }

  // DETERMINE TYPE OF EVENT - SETS STYLES IN WINDOW
  if (style == "get") {
    var div= "get_headline";
    var banner = "GET";
  }
  else if (style == "got") {
    var div= "got_headline";
    var banner = "GOT";
  }
  else if (style == "error_403") {
    var div= "error_headline";
    var banner = "ERROR: 403 FORBIDDEN";
  }
  else if (style == "error_404") {
    var div= "error_headline";
    var banner = "ERROR: 404 FILE NOT FOUND";
  }
  else if (style == "error_500") {
    var div= "error_headline";
    var banner = "ERROR: 500 INTERNAL SERVER ERROR";
  }
  else {
    var div= "unknown_headline";
    var banner = "UNKNOWN";
  }

  // IF TIME NOT SENT - PRINT NICE MESSAGE
  if (time == 0 ) { time = "<div id=ping>PING: "+time+"</div>"; }
  else if (time > 0) { time = "<div id=ping>PING: "+time+"</div>"; }
  else { time = ""; }

  var cookies = getAllCookies();
  // NICE MESSAGE IF NO COOKIE FOUND
  if (cookies) { } else { cookies = "No Data Sent"; }

  var event="";

  // THIS DIV CONTAINS AN UN-ESCAPED VERSION OF "PAYLOAD"
  // IT IS NEVER VISIBLE AND IS USED ONLY FOR THE "C" BUTTON
  // FIREFOX DOES NOT LIKE THIS ONE, SO IT ONLY APPLIES TO OTHER BROWSERS
  if (agent != "firefox") {event += "<div id=P"+divid+" style='display:none;'>"+payload+"</div>";}

  // HEAD OF EVENT
  event += "<div id="+div+">";
  event += hours+":"+minutes+":"+seconds+" "+banner;
  event += time;
  event += "<br />URL: ";
  event += "<div class=url id=U"+divid+">"+url+"</div>";
  // THESE NEXT TWO BUTTINS DO NOT WORK IN FIREFOX, SO THEY ARE REMOVED
  if (agent != "firefox") {event += "<div class=content onClick='copyInfo(\"P"+divid+"\")'>P</div>";}
  if (agent != "firefox") {event += "<div class=address onClick='copyInfo(\"U"+divid+"\")'>U</div>";}
  event += "<div class=icon id=B"+divid+" onClick='viewContent(\"A"+divid+"\", \"B"+divid+"\")'>+</div>";
  event += "</div>";

  // TAIL OF EVENT
  event += "<div class=payload id=A"+divid+" style='display:none;'>";
  event += "<div class=code><div id=bold>PAYLOAD DATA:</div><br />"+payload_stripped+"</div>";
  event += "<div class=post><div id=bold>POST DATA:</div><br />No Data Sent</div>";
  event += "<div class=cookie><div id=bold>COOKIE DATA:</div><br />"+cookies+"</div>";
  event += "</div>"

  // MUST GET OLD "MAIN" DATA AND APPENT TO EVENT
  // ALL THIS IS DONE BECUASE FIREFOX DOES NOT SUPPORT insertAdjacentHTML
  event += debug.document.getElementById("main").innerHTML;

  debug.document.getElementById("main").innerHTML = event;
}