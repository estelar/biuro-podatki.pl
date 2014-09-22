// JavaScript Document

bChange = false;

function qaz(aaa){
	alert(aaa);
}

function DOMcleanDiv(div){
	if(div.indexOf('|')!=-1){
		tablica = div.split('|');
		var ile=tablica.length;
	    for (i = 0; ile > i; i++ ) {
			document.getElementById(tablica[i]).className='';
			document.getElementById(tablica[i]).innerHTML='';
			document.getElementById(tablica[i]).style.display='none';
		}
	}else{
		document.getElementById(div).className='';
		document.getElementById(div).innerHTML='';
		document.getElementById(div).style.display='none';
	}
	return true;
}


function DOMformCloseCheck(sFormId, sDivId){
	/**
	 *	Sprawdzenie czy są zmiany
	 */
	if(DOMchangeCheck(sFormId)){
		DOMcleanDiv(sDivId);
	}	 	
}

function DOMformClose(sFormId, sDivId){
	/**
	 *	Z
	 */
	DOMchangeUnset(sFormId)
	DOMcleanDiv(sDivId);
}


function DOMchangeCheck(sFormName){
    //alert(url);
	if(!bChange){
        return true;
    }
     
    var response = window.confirm("Dane formularza zostały zmienione.\n    [OK] - utrata zmian\n    [Anuluj] - powrót do edycji");
    if (response) {
        bChange = false;
        return true;
    }else{
        //akcja anulowana
        return false;
    }
}
function DOMchangeSet(sFormName){
    bChange = true;
}
function DOMchangeUnset(sFormName){
    bChange = false;
}