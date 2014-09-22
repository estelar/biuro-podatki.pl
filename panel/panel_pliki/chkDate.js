// JavaScript Document
function chkDate(pole){
	var date;
	var tablica=[];
	var tmp=pole.value;
	if(tmp=='') return true;
	if(ValidateDate(tmp)){
		return true;
	}
	if(tmp.indexOf(',')!=-1){
		tablica=tmp.split(',');
	}
	if(tmp.indexOf('.')!=-1){
		tablica=tmp.split('.');
	}
	if(tablica.length!=3){
		alert('Nieprawidłowa data.');
		setTimeout(function () { pole.focus() }, 50);
		return false;
	}
	
	//rok
	var y=tablica[0];
	if(y.length==0 || y.length>4){
		alert('Nieprawidłowa data.');
		setTimeout(function () { pole.focus() }, 50);
		return false;
	}
	if(y.length==1) y='200'+y;
	if(y.length==2) y='20'+y;
	if(y.length==3) y='2'+y;
	
	//miesiac
	var m=tablica[1];
	if(m.length==0 || m.length>2){
		alert('Nieprawidłowa data.');
		setTimeout(function () { pole.focus() }, 50);
		return false;
	}
	if(m.length==1) m='0'+m;
	
	//dni
	var d=tablica[2];
	if(d.length==0 || d.length>2){
		alert('Nieprawidłowa data.');
		setTimeout(function () { pole.focus() }, 50);
		return false;
	}
	if(d.length==1) d='0'+d;
	
	date=y+'-'+m+'-'+d;
	
	if(ValidateDate(date)){
		pole.value=date;
		return true;
	}else{
		alert('Nieprawidłowa data.');
		setTimeout(function () { pole.focus() }, 50);
		return false;
	}
}

function ValidateDate(date) {
  var segments;
  var year;
  var month;
  var day;
  var status;
  var i;
  var leapYear = false;
  
	if(date.length > 10) {
		var time = date.substring(10, date.length);
		status = ValidateAdvancedTime(time, 2);
		if (status == false) return false;
		date = date.substring(0,10);
	}
	// Get our date in a common format
	for (i = 0; i < 2; i++) {
		date = date.replace(".", "-");
		date = date.replace("/", "-");
	}
	
	var dashIndex = date.indexOf("-");
	
	if (dashIndex == -1) 
	date = HandleDashes(date);
	
	segments = date.split("-");
	year = segments[0];
	month = segments[1];
	day = segments[2];
	
	// Start testing
	if (year.length == 4) {
		status = TestYear(year);
		if(status == false)	return false;
		leapYear = IsLeapYear(year);
	}else{
		return false;
	}
	
	status = TestMonth(month);
	if(status == false) return false;
	
	status = TestDay(day, month, leapYear);
	if(status == true) return true;
	
	return false;
}    
    
function TestYear(year) {
	if(year.length == 4) {
		if (!isNaN(year)) return true;
	}
	return false;
}

function TestMonth(month) {
  if ((isNaN(month)) || (month < 1) || (month > 12)) return false;
  return true;
}

function TestDay(day, month, leapYear) {
  month -= 0;  // Convert the month into a Number for the case's
  
  if(!isNaN(day)) {
    switch(month) {  // Test the days for a particular month
      case 1:
      case 3:
      case 5:
      case 7:
      case 8:
      case 10:
      case 12:
        if ((day >= 1) && (day <= 31)) 
          return true;
        break;
          
      case 4:
      case 6:
      case 9:
      case 11:
        if ((day >= 1) && (day <= 30)) 
          return true;
        break;
          
      case 2:
        if(leapYear) {
          if ((day >= 1) && (day <= 29)) 
            return true;
        }
        else {
          if ((day >= 1) && (day <= 28)) 
            return true;
        }
        break;
            
      default:
        break;
    }
  }  
  return false;  
}


function IsLeapYear(year) {
  var betweenYears = 4;                  // We also know that there is 4 years between leap years
  var leapYear = 2000;
  year = leapYear - year;                // Set year to the difference see if it's divisible by 4
  var remainder = year % betweenYears;

  if (remainder == 0) {
    return true;
  }
  return false;
}

function HandleSlashes(date) {
  date = date.substring(0, 2) + "/" + date.substring(2, 4) + "/" + date.substring(4, date.length);  
  return date;
}
function HandleDashes(date) {
  date = date.substring(0, 4) + "-" + date.substring(4, 6) + "-" + date.substring(6, date.length);
  return date;
}
