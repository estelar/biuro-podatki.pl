function WHCreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    var expires = "; expires=" + date.toGMTString();
	document.cookie = name+"="+value+expires+"; path=/";
}
function WHReadCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

window.onload = WHCheckCookies;

function WHCheckCookies() {
    if (WHReadCookie('cookies_accepted') != 'T') {
        var message_container = document.createElement('div');
        message_container.id = 'cookies-message';
        message_container.innerHTML = 
        	'Ta strona używa plików cookie (ciasteczek). Korzystanie ze strony oznacza zgodę na ich użycie. Rozumiem i ' +
        	'<a href="javascript:WHCloseCookiesWindow();" class="btn btn-info" id="accept-cookies-checkbox" name="accept-cookies">akceptuję</a> pliki cookies.';
        document.body.appendChild(message_container);
    }
}

function WHCloseCookiesWindow() {
    WHCreateCookie('cookies_accepted', 'T', 365);
	var container = document.getElementById('cookies-message');
	container.parentNode.removeChild(container);
}