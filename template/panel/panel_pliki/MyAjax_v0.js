var lnSave = '';

var nTimeout = 120000;
var nRetry = 60;
var nRetryDelay = 2000;

var nActiRequ = 0;

function axSend(url){
	advAJAX.get({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) {
        	loadingDiv(0);
			var ret = przetwarzajOdp(obj.responseText);
            if(ret[0]!=undefined) komunikaty(ret[0]);
        },
        onLoading : function(obj){
        	loadingDiv(1);
			var load=document.getElementById('load');
            if(load) load.style.visibility='visible';
            document.body.style.cursor = 'wait';
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}

/**
 *	toDel string oddzielony | z nazawami pól formularza które nie maja być dodane do linku
 *	fm - nazwa formularza
 *	  
 */ 
function axSendForm(url,fm,toDel){
	var fm = document.getElementById(fm); 
	url = url+ "?";
    var ile=fm.length;
	for (i = 0; ile > i; i++){
		var wartosc	=	encodeURIComponent(fm.elements[i].value);
		var nazwa	=	fm.elements[i].name;
		if(toDel != undefined && nazwa != "a" && toDel.indexOf(nazwa) != -1) continue;
		
		url += fm.elements[i].name + "=";
        if(i==ile-1){
			url += wartosc;
		}else{
			url += wartosc+"&";
		}
	}
    //alert(url);
    advAJAX.get({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) {
            loadingDiv(0);
            var ret = przetwarzajOdp(obj.responseText);
            if(ret[0]!=undefined){
            	//alert(ret[0]);
				komunikaty(ret[0]);
			}
        },
        onLoading : function(obj){
        	loadingDiv(1);
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}
function axSendFormPost(url,fm,toDel){
	var fm = document.getElementById(fm);
	url = url+ "?";
    var ile=fm.length;
	for (i = 0; ile > i; i++){
		var wartosc	=	encodeURIComponent(fm.elements[i].value);
		var nazwa	=	fm.elements[i].name;
		if(toDel != undefined && nazwa != "a" && toDel.indexOf(nazwa) != -1) continue;
		url += fm.elements[i].name + "=";
        if(i==ile-1){
			url += wartosc;
		}else{
			url += wartosc+"&";
		}
	}
    //alert(url);
    advAJAX.post({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) {
        	loadingDiv(0);
			var ret = przetwarzajOdp(obj.responseText);
            if(ret[0]!=undefined) komunikaty(ret[0]);
        },
        onLoading : function(obj){
        	loadingDiv(1);
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}

function axGet(url,cel){
	if(url=='') return;
	if(lnSave!=''){
		eval(lnSave+'="'+url+'"');
		lnSave='';
	}
	url=encodeURI(url);
	
	advAJAX.get({
		url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) { 
            var test=document.getElementById(cel);
			/**
             *	Sprawdzenie czy istnieje DIV
             */			             
            //Assert.isTrue(test,'<br>Brak diva<br>div - '+cel+'<br>url - '+url);
			
			if(obj.responseText=='') return;
			
			ret = przetwarzajOdp(obj.responseText);
			if(ret[1]!=undefined && ret[1]!=''){
				test.style.display='block';
				test.innerHTML = ret[1];
			}
			if(ret[0]!=undefined) komunikaty(ret[0]);
			
			// wyłączenie diva ładowania
            loadingDiv(0);
        },
        onLoading : function(obj){
        	loadingDiv(1);
        	
        	if(cel != 'druk'){
				var diiiv = document.getElementById(cel);
				diiiv.style.display='block';
				diiiv.innerHTML='<img src="gfx/ajax_load_bar_blue.gif">';
			}	
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}

function przetwarzajOdp(odp){
	var ret = [];
	var ojs0 = odp.indexOf('<ojs>');
	var ojs1 = odp.indexOf('</ojs>');
	if(ojs0!=-1 && ojs1!=-1){
		ojs0+=5;
		ret[0] = odp.substring(ojs0,ojs1);
	}
	
	// sprawdzanie czy nie ma podwójnego ojs np z błędem
	// ostatnie wystąpienia
	var ojs0l = odp.lastIndexOf('<ojs>');
	var ojs1l = odp.lastIndexOf('</ojs>');
	// jesli wartosci ojs sa rozne to jest podwojne ojs
	if(ojs0l!=-1 && ojs1l!=-1 && ojs0!=ojs0l && ojs1!=ojs1l){
		ojs0l+=5;
		ret[0] = ret[0] + "^" + odp.substring(ojs0l,ojs1l);
	}
	
	var oht0 = odp.indexOf('<oht>');
	var oht1 = odp.indexOf('</oht>');
	
	if(oht0!=-1 && oht1!=-1){
		oht0+=5;
		ret[1] = odp.substring(oht0,oht1);
		//return odpHtml;
	}
	return ret;	
}

function axSendConf2(url,pytanie){
	var response = window.confirm(pytanie);
    if (response) {
        response = window.confirm('Jesteś pewnien?');
    	if (response) {
    		
		}else{
        	//akcja anulowana
        	return false;
    	}
    }else{
    	//akcja anulowana
        return false;
    }
    
	advAJAX.get({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) {
        	loadingDiv(0);
			var ret = przetwarzajOdp(obj.responseText);
            if(ret[0]!=undefined) komunikaty(ret[0]);
        },
        onLoading : function(obj){
        	loadingDiv(1);
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}

function komunikaty(tablica){
	if(tablica.indexOf("^")==-1){
		//alert('POJEDYNCZE ' + tablica);
		komunikaty1(tablica);
	}else{
		var komunikaty=tablica.split("^");
		var ile=komunikaty.length;
		for (i = 0; ile > i; i++){
			//alert('WIELE ' + komunikaty[i]);
	        komunikaty1(komunikaty[i]);
	    }
	}
}

function komunikaty1(tekst){
    var tab=tekst.split("|")
    if(tab[0]=="foo"){
        var obj=document.getElementById('footer');
        if(!obj) return;
		var tmp = obj.innerHTML;
		if(tmp.length>16364){
			tmp = tmp.substring(0,16364);
		}
		obj.innerHTML='<div class="' + tab[1] + '">' + tab[2] + '</div>' + tmp;
		
		var obj=document.getElementById('foo');
		
		setTimeout("h1(" + obj.id + ")", 0);
		setTimeout("h2(" + obj.id + ")", 100);
		setTimeout("h1(" + obj.id + ")", 200);
		setTimeout("h2(" + obj.id + ")", 300);
	    
	    return true;
    }
	if(tab[0]=="ok"){
        alert(tab[1]);
        return true;
    }
	if(tab[0]=="run"){
		eval(tab[1]);
        return true;
    }
    if(tab[0]=="set"){
        var obj=document.getElementById(tab[1]);
        //Assert.isTrue(obj,'<br>Brak diva dla <br>div - '+tab[1]+'<br>value - '+tab[2]);
		//test.style.display='block';
		if(obj) obj.innerHTML=tab[2];
        return true;
    }
    
	if(tab[0]=="err"){
        if(tab[1]=="unk"){
        	alert("Wystąpił błąd. Kod błędu\n"+tab[1]+"\n"+tab[2]);
        	return true;
		}
		if(tab[1]=="emp"){
			alert("Pole nie może być puste "+tab[2]);
			var elementy = document.body.getElementsByTagName("input");
        	var ile=elementy.length;
    
   			for (i = 0; i < ile; i++){
        		if(elementy[i].name==tab[2]){
					elementy[i].focus();
					return true;				
				}
    		}
    		var elementy = document.body.getElementsByTagName("textarea");
        	var ile=elementy.length;
    
   			for (i = 0; i < ile; i++){
        		if(elementy[i].name==tab[2]){
					elementy[i].focus();
					return true;				
				}
    		}
		}
		if(tab[1]=="vali"){
			alert("vali");
			if(!tab[3]) return true;
			// INPUT
			var elementy = document.body.getElementsByTagName("input");
        	for (i = 0; i < elementy.length; i++){
        		if(elementy[i].name==tab[3]){
        			alert(tab[2]);
					elementy[i].focus();
					return true;				
				}
    		}
    		
    		// TEXTAREA
			var elementy = document.body.getElementsByTagName("textarea");
        	for (i = 0; i < elementy.length; i++){
        		if(elementy[i].name==tab[3]){
					alert(tab[2]);
					elementy[i].focus();
					return true;				
				}
    		}
    		
			// SELECT
			var elementy = document.body.getElementsByTagName("select");
        	for (i = 0; i < elementy.length; i++){
        		if(elementy[i].name==tab[3]){
					alert(tab[2]);
					elementy[i].focus();
					return true;				
				}
    		}
		}
		if(tab[1]=="dup"){
        	alert("Wartość '"+tab[2]+"' jest już w bazie.");
        	
			var elementy = document.body.getElementsByTagName("input");
        	var ile=elementy.length;
    
   			for (i = 0; i < ile; i++){
        		if(elementy[i].value==tab[2]){
					elementy[i].focus();
					return true;		
				}
    		}
		}
		if(tab[1]=="zal"){
        	alert("Nie można usunąć rekordu. Rekord posiada rekordy zależne.\n"+tab[2]);
		}
		
		// 1452 - Cannot add or update a child row: a foreign key constraint fails
		if(tab[1]=="obc"){
        	alert("Błąd klucza obcego.\n"+tab[2]);
		}
    }
}

/**
 *	Funkcja włączająca lub wyłączająca div ładowania
 */
function loadingDiv(mode){
	if(mode==0){
		nActiRequ--;
	}
	if(mode==1){
		nActiRequ++;
	}
	
	if(nActiRequ > 0){
		var tmp=document.getElementById('load');
		if(tmp) tmp.style.visibility='visible';
		document.body.style.cursor = 'wait';
	}else{
		var tmp=document.getElementById('load');
        if(tmp) tmp.style.visibility='hidden';
        document.body.style.cursor = 'default';
	}	
}

function axGetConf2(url,cel,pytanie,evalOnSuccess){
	var response = window.confirm(pytanie);
    if (response) {
        response = window.confirm('Jesteś pewnien?');
    	if (response) {
    		
		}else{
        	//akcja anulowana
        	return false;
    	}
    }else{
    	//akcja anulowana
        return false;
    }
	advAJAX.get({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) { 
        	var test=document.getElementById(cel);
			/**
             *	Sprawdzenie czy istnieje DIV
             */			             
            //Assert.isTrue(test,'<br>Brak diva<br>div - '+cel+'<br>url - '+url);
			
			if(obj.responseText=='') return;
			test.style.display='block';
			ret = przetwarzajOdp(obj.responseText);
			
			if(ret[1]!=undefined && ret[1]!='') test.innerHTML = ret[1];
			if(ret[0]!=undefined) komunikaty(ret[0]);
			
			// wyłączenie diva ładowania
            loadingDiv(0);
       	},
       	onLoading : function(obj){
        	loadingDiv(1);
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}

function axSendConf(url,pytanie){
	var response = window.confirm(pytanie);
    if (response) {
        
    }else{
        //akcja anulowana
        return false;
    }
	advAJAX.get({
        url: url,
        uniqueParameter: "cup",
        timeout : nTimeout,
        onTimeout : function() { alert("Czas połączenia przekroczony."); },
        retry: nRetry,
        retryDelay: nRetryDelay,
        onSuccess : function(obj) {
        	loadingDiv(0);
        	var ret = przetwarzajOdp(obj.responseText);
            if(ret[0]!=undefined) komunikaty(ret[0]);
        },
        onLoading : function(obj){
        	loadingDiv(1);
		},
        onError : function(obj) { alert("Error: " + obj.status); }
    });
}