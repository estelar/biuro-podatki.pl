// JavaScript Document
var logout = 0;
var bkColor="#cfc";

function fLogout(type){
	if(logout == 1) return true;
	
	logout = 1;
	if(type == 0){
		window.location = 'index.php';
	} else if(type == 1){
		window.location = 'index.php?logout=1';
	}
}

function getEvent(e){
  if(window.event != null) {
    return event;
  }
  return e;
}

function sC(e){
 e = getEvent(e);
 var src =  e.srcElement || e.target;
 if(src != null) {
   src.style.bkColor = src.style.backgroundColor;
   src.style.backgroundColor = bkColor;
 }
}

function rC(e){
 e = getEvent(e);
 var src =  e.srcElement || e.target;
 if(src != null) {
   src.style.backgroundColor = src.style.bkColor;
 }
}