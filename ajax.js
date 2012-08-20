/*

Ajax Debugger.
Provides an in-depth tool to analyze Ajax interactions with web servers.
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


// THREADSAFE ASYNCHRONOUS XMLHTTPRequest
// url = url to send to server
// pageElement = page element to replace when data arrives
// waitMessage =  info to display while waiting for return from server
//                if waitMessage not sent, content will not "blink"
// callBack = javascript function name to run after data has been returned from server
function getPage( url, pageElement, waitMessage, callBack ) {
		var timer = new Date();
		var t_start = timer.getTime();
		//debugEvent(url, "get");

  // DON'T DISTURB CONTENT UNLESS NESSISARY
  if ( waitMessage != "" ) {  document.getElementById(pageElement).innerHTML = waitMessage; }

// WE USE A JAVASCRIPT FEATURE HERE CALLED "INNER FUNCTIONS"
// USING THESE MEANS THE LOCAL VARIABLES RETAIN THEIR VALUES AFTER THE OUTER FUNCTION
// HAS RETURNED. THIS IS USEFUL FOR THREAD SAFETY, SO
// REASSIGNING THE ONREADYSTATECHANGE FUNCTION DOESN'T STOMP OVER EARLIER REQUESTS.
	function ajaxBindCallback(){
		if(ajaxRequest.readyState == 0) { window.status = "Waiting...";      }
		if(ajaxRequest.readyState == 1) { window.status = "Loading Page..."; }
		if(ajaxRequest.readyState == 2) { window.status = "Data Received...";}
		if(ajaxRequest.readyState == 3) { window.status = "Interactive...";  }
		if(ajaxRequest.readyState == 4) {
			window.status = "Transaction Complete...";

      // STOP TIMER AND FIND DIFFERENCE
      // MUST CREATE NEW TIMER INSTANCE :)
      var timer2 = new Date();
      var t_end = timer2.getTime();
      var t_diff = t_end - t_start;

      // TEST HTTP STATUS CODE - DISPLAY IN DUBUGGER AND STATUS
      switch (ajaxRequest.status.toString()) {
        case "200" :
          window.status = "Page Loaded Sucessfully";
          document.getElementById(pageElement).innerHTML = ajaxRequest.responseText;
          debugEvent(url, "got", ajaxRequest.responseText, t_diff);
          break;
        case "403" :
          window.status = "Forbidden...";
          debugEvent(url, "error_403", ajaxRequest.responseText, t_diff);
          break;
        case "404" :
          window.status = "File Not Found...";
          debugEvent(url, "error_404", ajaxRequest.responseText, t_diff);
          break;
        case "500" :
          window.status = "File Not Found...";
          debugEvent(url, "error_500", ajaxRequest.responseText, t_diff);
          break;
        default :
          window.status = "Unknown Ajax Error..."+ajaxRequest.status.toString();
        }
			}
	}
	var ajaxRequest = null;
	// BIND OUR CALLBACK THEN HIT THE SERVER...
	if (window.XMLHttpRequest) {
		ajaxRequest = new XMLHttpRequest();
		ajaxRequest.onreadystatechange = ajaxBindCallback;
		ajaxRequest.open("GET", url, true);
		ajaxRequest.send(null);
	} else if (window.ActiveXObject) {
		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		if (ajaxRequest) {
			ajaxRequest.onreadystatechange = ajaxBindCallback;
			ajaxRequest.open("GET", url, true);
			ajaxRequest.send();
			}
		}
	if (callBack != null ) { eval(callBack+'()'); }
}

function sendData(url){
		// START TIMER
		var timer = new Date();
		var t_start = timer.getTime();
// WE USE A JAVASCRIPT FEATURE HERE CALLED "INNER FUNCTIONS"
// USING THESE MEANS THE LOCAL VARIABLES RETAIN THEIR VALUES AFTER THE OUTER FUNCTION
// HAS RETURNED. THIS IS USEFUL FOR THREAD SAFETY, SO
// REASSIGNING THE ONREADYSTATECHANGE FUNCTION DOESN'T STOMP OVER EARLIER REQUESTS.
	function ajaxBindCallback(){
		if(ajaxRequest.readyState == 0) { window.status = "Waiting...";      }
		if(ajaxRequest.readyState == 1) { window.status = "Loading Page..."; }
		if(ajaxRequest.readyState == 2) { window.status = "Data Received...";}
		if(ajaxRequest.readyState == 3) { window.status = "Interactive...";  }
		if(ajaxRequest.readyState == 4) {
			window.status = "Transaction Complete...";

      // STOP TIMER AND FIND DIFFERENCE
      // MUST CREATE NEW TIMER INSTANCE :)
      var timer2 = new Date();
      var t_end = timer2.getTime();
      var t_diff = t_end - t_start;

      // TEST HTTP STATUS CODE - DISPLAY IN DUBUGGER AND STATUS
      switch (ajaxRequest.status.toString()) {
        case "200" :
          debugEvent(url, "got", ajaxRequest.responseText, t_diff);
          break;
        case "403" :
          debugEvent(url, "error_403", ajaxRequest.responseText, t_diff);
          break;
        case "404" :
          debugEvent(url, "error_404", ajaxRequest.responseText, t_diff);
          break;
        case "500" :
          debugEvent(url, "error_500", ajaxRequest.responseText, t_diff);
          break;
        }
			}
	}
	var ajaxRequest = null;
	// BIND OUR CALLBACK THEN HIT THE SERVER...
	if (window.XMLHttpRequest) {
		ajaxRequest = new XMLHttpRequest();
		ajaxRequest.onreadystatechange = ajaxBindCallback;
		ajaxRequest.open("GET", url, true);
		ajaxRequest.send(null);
	} else if (window.ActiveXObject) {
		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		if (ajaxRequest) {
			ajaxRequest.onreadystatechange = ajaxBindCallback;
			ajaxRequest.open("GET", url, true);
			ajaxRequest.send();
			}
		}
}
