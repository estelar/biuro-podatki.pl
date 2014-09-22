/* MarcGrabanski.com */

/* Pop-Up Calendar Built from Scratch by Marc Grabanski */

var popUpCal = {
    selectedMonth: new Date().getMonth(), // 0-11
    selectedYear: new Date().getFullYear(), // 4-digit year
    selectedDay: new Date().getDate(),
    calendarId: 'caleDiv',
    inputClass: 'caleId',
    /*
	init: function () {
        var x = getElementsByClass(popUpCal.inputClass, document, 'input');
        var y = document.getElementById(popUpCal.calendarId);
        // set the calendar position based on the input position
        for (var i=0; i<x.length; i++) {
            x[i].onfocus = function () {
            	alert('in');
				popUpCal.selectedMonth = new Date().getMonth();
                setPos(this, y); // setPos(targetObj,moveObj)
                y.style.display = 'block';
                popUpCal.drawCalendar(this); 
                popUpCal.setupLinks(this);
            }
        }
    },
    */
    
    init: function (x) {
        //var x = getElementsByClass(popUpCal.inputClass, document, 'input');
        var y = document.getElementById(popUpCal.calendarId);
        
        // set the calendar position based on the input position
        //popUpCal.selectedYear =  new Date().getFullYear()
        //popUpCal.selectedMonth = new Date().getMonth();
        
        // ustawienie kalendarza na dzień z inputu, lub gdy input pusty to na bieżący dzień
        var data0_val = x.value;
        if(data0_val == ""){
			popUpCal.selectedYear =  new Date().getFullYear()
        	popUpCal.selectedMonth = new Date().getMonth();
		}else{
			var arrDate = data0_val.split("-");
        	popUpCal.selectedYear = arrDate[0];
        	popUpCal.selectedMonth = arrDate[1]-1;
		}
        
        setPos(x, y); // setPos(targetObj,moveObj)
        y.style.display = 'block';
        popUpCal.drawCalendar(x); 
        popUpCal.setupLinks(x);
		//alert(popUpCal.selectedMonth + " - " + popUpCal.selectedYear);
    },
    drawCalendar: function (inputObj) {
		
		var html = '';
		html += '<table cellpadding="0" cellspacing="0" id="linksTable"><tr>';
    	html += '	<td><a id="prevMonth"><<<</a></td>';
    	html += '	<td><a id="nextMonth">>>></a></td>';
		html += '</tr></table>';
		html += '<table id="calendar" cellpadding="0" cellspacing="0"><tr>';
		html += '<th colspan="7" class="calendarHeader">'+getMonthName(popUpCal.selectedMonth)+' '+popUpCal.selectedYear+'</th>';
		html += '</tr><tr class="weekDaysTitleRow">';
        var weekDays = new Array('Ni','Po','Wt','Śr','Cz','Pi','So');
        for (var j=0; j<weekDays.length; j++) {
			html += '<td>'+weekDays[j]+'</td>';
        }
		
        var daysInMonth = getDaysInMonth(popUpCal.selectedYear, popUpCal.selectedMonth);
        var startDay = getFirstDayofMonth(popUpCal.selectedYear, popUpCal.selectedMonth);
        var numRows = 0;
        var printDate = 1;
        if (startDay != 7) {
            numRows = Math.ceil(((startDay+1)+(daysInMonth))/7); // calculate the number of rows to generate
        }
		
        // calculate number of days before calendar starts
        if (startDay != 7) {
            var noPrintDays = startDay + 1; 
        } else {
            var noPrintDays = 0; // if sunday print right away	
        }
		var today = new Date().getDate();
		var thisMonth = new Date().getMonth();
		var thisYear = new Date().getFullYear();
        // create calendar rows
        for (var e=0; e<numRows; e++) {
			html += '<tr class="weekDaysRow">';
            // create calendar days
            for (var f=0; f<7; f++) {
				if ( (printDate == today) 
					 && (popUpCal.selectedYear == thisYear) 
					 && (popUpCal.selectedMonth == thisMonth) 
					 && (noPrintDays == 0)) {
					html += '<td id="today" class="weekDaysCell">';
				} else {
                	html += '<td class="weekDaysCell">';
				}
                if (noPrintDays == 0) {
					if (printDate <= daysInMonth) {
						html += '<a>'+printDate+'</a>';
					}
                    printDate++;
                }
                html += '</td>';
                if(noPrintDays > 0) noPrintDays--;
            }
            html += '</tr>';
        }
		html += '</table>';
		html += '<table cellpadding="0" cellspacing="0" id="linksTable"><tr>';
    	html += '	<td><a id="closeCalender">zamknij</a></td>';
		html += '</tr></table>';
        
        // add calendar to element to calendar Div
        var calendarDiv = document.getElementById(popUpCal.calendarId);
        calendarDiv.innerHTML = html;
        
        // close button link
        document.getElementById('closeCalender').onclick = function () {
            calendarDiv.style.display = 'none';
        }
		// setup next and previous links
        document.getElementById('prevMonth').onclick = function () {
            popUpCal.selectedMonth--;
            if (popUpCal.selectedMonth < 0) {
                popUpCal.selectedMonth = 11;
                popUpCal.selectedYear--;
            }
            popUpCal.drawCalendar(inputObj); 
            popUpCal.setupLinks(inputObj);
        }
        document.getElementById('nextMonth').onclick = function () {
            popUpCal.selectedMonth++;
            if (popUpCal.selectedMonth > 11) {
                popUpCal.selectedMonth = 0;
                popUpCal.selectedYear++;
            }
            popUpCal.drawCalendar(inputObj); 
            popUpCal.setupLinks(inputObj);
        }
        
    }, // end drawCalendar function
    
    setupLinks: function (inputObj) {
        // set up link events on calendar table
        var y = document.getElementById('calendar');
        var x = y.getElementsByTagName('a');
        for (var i=0; i<x.length; i++) {
            x[i].onmouseover = function () {
                this.parentNode.className = 'weekDaysCellOver';
            }
            x[i].onmouseout = function () {
                this.parentNode.className = 'weekDaysCell';
            }
            x[i].onclick = function () {
                document.getElementById(popUpCal.calendarId).style.display = 'none';
                popUpCal.selectedDay = this.innerHTML;
                inputObj.value = formatDate(popUpCal.selectedDay, popUpCal.selectedMonth, popUpCal.selectedYear);	
				inputObj.onchange();	
            }
        }
    }
    
}
// Add calendar event that has wide browser support

//caleInit();

function caleInit(obj){
	popUpCal.init(obj);
}
/*
function caleInit(){
	alert('caleInit');
	if ( typeof window.addEventListener != "undefined" )
	    window.addEventListener( "load", popUpCal.init, false );
	else if ( typeof window.attachEvent != "undefined" )
	    window.attachEvent( "onload", popUpCal.init );
	else {
	    if ( window.onload != null ) {
	        var oldOnload = window.onload;
	        window.onload = function ( e ) {
	            oldOnload( e );
	            popUpCal.init();
	        };
	    }
	    else
	        window.onload = popUpCal.init;
	}

}
*/
/* Functions Dealing with Dates */

function formatDate(Day, Month, Year) {
    Month++; // adjust javascript month
    if (Month <10) Month = '0'+Month; // add a zero if less than 10
    if (Day < 10) Day = '0'+Day; // add a zero if less than 10
    var dateString = Year+'-'+Month+'-'+Day;
    return dateString;
}

function getMonthName(month) {
    var monthNames = new Array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
    return monthNames[month];
}

function getDayName(day) {
    var dayNames = new Array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela')
    return dayNames[day];
}

function getDaysInMonth(year, month) {
    return 32 - new Date(year, month, 32).getDate();
}

function getFirstDayofMonth(year, month) {
    var day;
    day = new Date(year, month, 0).getDay();
    return day;
}

/* Common Scripts */

function getElementsByClass(searchClass,node,tag) {
    var classElements = new Array();
    if ( node == null ) node = document;
    if ( tag == null ) tag = '*';
    var els = node.getElementsByTagName(tag);
    var elsLen = els.length;
    var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
    for (i = 0, j = 0; i < elsLen; i++) {
        if ( pattern.test(els[i].className) ) {
            classElements[j] = els[i];
            j++;
        }
    }
    return classElements;
}

/* Position Functions */

function setPos(targetObj,moveObj) {
    var coors = findPos(targetObj);
    moveObj.style.position = 'absolute';
    moveObj.style.top = coors[1]+20 + 'px';
    moveObj.style.left = coors[0] + 'px';
}

function findPos(obj) {
    var curleft = curtop = 0;
    if (obj.offsetParent) {
        curleft = obj.offsetLeft
        curtop = obj.offsetTop
        while (obj = obj.offsetParent) {
            curleft += obj.offsetLeft
            curtop += obj.offsetTop
        }
    }
    return [curleft,curtop];
}
