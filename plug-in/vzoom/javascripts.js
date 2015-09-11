function ClearForm()
{
	var FieldType;
	for (var i = 0; i < document.EditForm.length; i++) {
		FieldType = document.EditForm.elements[i].type
		if (FieldType == "text" || FieldType == "textarea") {
			document.EditForm.elements[i].value = ""
		}
		if (FieldType == "select-one") {
			document.EditForm.elements[i].options.selectedIndex = 0
		}
	}
}

function OpenNewWindow(url, width, height)
{
	var randomnumber=Math.floor(Math.random()*5001)
	window.open(url, randomnumber, "top=10,left=10,menubar=0,resizable=1,scrollbars=1,width=" + width + ",height=" + height)
}

function OpenWindowNoScroll(url, width, height) { 
	window.open(url, 'popup_noscroll',
	  "top=10,left=10,menubar=0,resizable=0,scrollbars=0,width=" + width + ",height=" + height)
}

function protect_images2(e) {
var msg = "Sorry, our images are copyrighted.";
if (navigator.appName == 'Netscape' && e.which == 3) {
	alert(msg);
	return false;
}
if (navigator.appName == 'Microsoft Internet Explorer' && event.button==2) {
	alert(msg);
	return false;
}
else return true;
}

function protect_images1() {
	if(document.images) {
	    for(i=0;i<document.images.length;i++) {
			document.images[i].onmousedown = protect_images2;
			document.images[i].onmouseup = protect_images2;
		}
	}
}

function OpenSideWindow(url){
	rightwidth=300;
	if (document.all) {
		windowheight = screen.availHeight;		
		leftwidth=screen.availWidth-rightwidth-11;
		SideWindow=window.open(url,'SideWindow','width='+rightwidth+',height='+(windowheight-60)+',screenX='+leftwidth+',screenY=0,top=0,left=' +leftwidth+',toolbar=0,location=0,status=1,menubar=0,resizable=1');
		SideWindow.focus();
	} else {
		SideWindow=window.open(url,'','width=280,height=480,toolbar=0,location=0,status=1,menubar=0,resizable=1');
	}
}

function PageName() {
	var pageName = window.location.href.toLowerCase();
	if (pageName.indexOf('_p/') != -1 || pageName.indexOf('-p/') != -1) {
		pageName = 'productdetails.asp';
	}
	else if (pageName.indexOf('_s/') != -1 || pageName.indexOf('-s/') != -1) {
		pageName = 'searchresults.asp';
	}
	else {
		pageName = pageName.substr(pageName.lastIndexOf("/") + 1).replace(/\?[\s\S]*/, "");
	}
	return pageName;
}

function PagePath() {
	return window.location.href.toLowerCase().replace(/http[s]?:\/\/[^\/]*\/?/, "").replace(/\?[\s\S]*/, "");
}

function QueryString(name) {
	var qsRE = new RegExp("[?&]" + name + "=([^&]*)", "i");
	var value = qsRE.exec(location.href);
	return (value) ? decode(value[1]) : "";
}

function GetCookieArray() {
	if (document.cookie.length > 0) {
		var cookieRE = new RegExp("(?:^|;)[\\s]*([^=]*)=([^;]*)", "gi");
		var cookie, cookieArray = new Array();
		cookie = cookieRE.exec(unescape(document.cookie.toString()))
		while (cookie) {
			cookieArray[cookie[1]] = cookie[2];
			cookie = cookieRE.exec(unescape(document.cookie.toString()))
		}
		return cookieArray;
	}
	return "";
}

function GetCookie(name, key, encoded) {
	var value = '', cookies = ';' + document.cookie;
	if (cookies.length > 1) {
		if (key) {
			var cookieRE = new RegExp(';[\\s]*' + name + '=[^;]*' + key + '=([^&;]*)[^;]*', 'i')
		}
		else {
			var cookieRE = new RegExp(';[\\s]*' + name + '=([^;]*)', 'i');
		}
		value = cookieRE.exec(cookies);
		value = (value) ? value[1] : '';
		if (!encoded) {
			value = decode(value);
		}
	}
	return value;
}

var c_minutes = 1, c_hours = 60, c_days = 1440, c_years = 525600;
function SetCookie(name, value, duration, key) {
	var cookie = '';
	if (key) {
		cookie = GetCookie(name, '', true);
		if (cookie != '') {
			cookie = '&' + cookie;
			var keyRE = new RegExp('([\\s\\S]*?)(&' + key + '=)[^&]*([\\s\\S]*)', 'i');
			if (keyRE.test(cookie)) {
				if (value == '') {
					cookie = cookie.replace(keyRE, '$1$3');
				}
				else {
					cookie = cookie.replace(keyRE, '$1$2' + encode(value) + '$3');
				}
			}
			else if (value != '') {
				cookie += '&' + key + '=' + encode(value);
			}
			cookie = cookie.substr(1);
		}
		else if (value == '') {
				cookie = '';
		}
		else {
			cookie = key + '=' + encode(value);
		}
	}
	else if (value != '') {
		cookie = encode(value);
	}
	if (cookie == '') {
		duration = -1000;
	}
	cookie = name + '=' + cookie + ';path=/';

	if (duration) {
		var expireDate = new Date();
		expireDate.setMinutes(expireDate.getMinutes() + parseInt(duration));
		cookie = cookie + ';expires=' + expireDate.toGMTString();
	}
	document.cookie = cookie;
	return value;
}

function encode(value) {
	value = escape(value);
	value = value.replace(/@/gi, "%40");
	value = value.replace(/\*/gi, "%2A");
	value = value.replace(/_/gi, "%5F");
	value = value.replace(/-/gi, "%2D");
	value = value.replace(/\+/gi, "%2B");
	value = value.replace(/\./gi, "%2E");
	value = value.replace(/\//gi, "%2F");
	value = value.replace(/%20/gi, "+");
	return value;
}

function decode(value) {
	value = value.replace(/\+/g, " ");
	value = unescape(value);
	return value;
}

function v$(id) {
	if (typeof(id) == 'string') {
		return document.getElementById(id);
	}
	else {
		return id;
	}
}

function FixEvent(event) {
	if (window.event) {
		var event = window.event;
		event.target = event.srcElement;
	}
	else {
		var event = event;
	}
	return event;
}

function AttachEvent(element, event, func) {
	if (element.addEventListener) {
		element.addEventListener(event.toLowerCase(), func, false);
	}
	else {
		element.attachEvent('on' + event.toLowerCase(), func);
	}
}

function DetachEvent(element, event, func) {
	if (element.removeEventListener) {
		element.removeEventListener(event.toLowerCase(), func, false);
	}
	else {
		element.detachEvent('on' + event.toLowerCase(), func);
	}
}

function ShowHide(Element_ID, Show) {
	var Element = v$(Element_ID);
	if (Element) {
		Show = eval(Show)
		if (typeof(Show) == 'undefined' && Element.style['display'] != 'none' || Show == false) {
			Element.style['display'] = 'none';
			return false;
		}
		else {
			Element.style['display'] = '';
			return true;
		}
	}
}


function vPlacement(element) {
	var isSafari = false;
	var foundPositionedElement = false;
	
	if (navigator.vendor) {
		if (navigator.vendor.toLowerCase().indexOf('apple') != -1) {
			isSafari = true;
			var getComputedStyle = document.defaultView.getComputedStyle;
		}
	}
	
	var left = element.offsetLeft;
	var top = element.offsetTop;
	var parent = element.offsetParent;
	while (parent) {
		left += parent.offsetLeft;
		top += parent.offsetTop;
		
		var position = computedStyle(parent, 'position', 'position');
		if (parent.nodeName.toLowerCase() != 'body') {
			left -= parent.scrollLeft;
			top -= parent.scrollTop;
		}
		if (position == 'absolute' || position == 'relative') {
			foundPositionedElement = true;
		}

		if (document.all) {
			if (parent.nodeName.toUpperCase() == 'TABLE') {
				left += (parseFloat(parent.border) || 0) ? 1 : 0;
				top += (parseFloat(parent.border) ||  0) ? 1 : 0;
			}
		}
		else if (isSafari) {
			if (parent.nodeName.toUpperCase() == 'TD' || parent.nodeName.toUpperCase() == 'TABLE') {
				left += parseFloat(getComputedStyle(parent, null).getPropertyValue('border-left-width')) || 0;
				top += parseFloat(getComputedStyle(parent, null).getPropertyValue('border-top-width')) || 0;
			}
		}
		parent = parent.offsetParent;
	}
	delete(parent);
	if (foundPositionedElement) {
		left += document.documentElement.scrollLeft || document.body.scrollLeft;
		top += document.documentElement.scrollTop || document.body.scrollTop;
	}
	return {'left':left, 'top':top, 'width':element.offsetWidth, 'height':element.offsetHeight}
}

// 05/08/2007 - vTrim() Added by ERW1N GUNG0N - changed to regex brad
function vTrim(arg_value) {
	return arg_value.toString().replace(/^[\s]+|[\s]+$/g, '');
}


function computedStyle(element, ieStyle, ffStyle) {
		if (element.currentStyle) {
			return element.currentStyle[ieStyle];
		}
		else if (document.defaultView && document.defaultView.getComputedStyle) {
			return document.defaultView.getComputedStyle(element, null).getPropertyValue(ffStyle);
		}
		else {
			return element.style[ieStyle];
		}
}

var agt = '';
if (navigator.userAgent) { agt=navigator.userAgent.toLowerCase(); }
// *** BROWSER VERSION *** 
// note: on IE5, these return 4, so use is_ie5up to detect IE5. 
var is_major = parseInt(navigator.appVersion); 
var is_minor = parseFloat(navigator.appVersion); 
var is_nav  = ((agt.indexOf('mozilla')!=-1) && (agt.indexOf('spoofer')==-1) 
			&& (agt.indexOf('compatible') == -1) && (agt.indexOf('opera')==-1) 
			&& (agt.indexOf('webtv')==-1)); 
var is_nav4 = (is_nav && (is_major == 4)); 
var is_nav4up = (is_nav && (is_major >= 4)); 
var is_navonly      = (is_nav && ((agt.indexOf(";nav") != -1) || 
					  (agt.indexOf("; nav") != -1)) ); 
var is_nav5 = (is_nav && (is_major == 5)); 
var is_nav5up = (is_nav && (is_major >= 5)); 
var is_ie   = (agt.indexOf("msie") != -1); 
var is_ie3  = (is_ie && (is_major < 4)); 
var is_ie4  = (is_ie && (is_major == 4) && (agt.indexOf("msie 5.0")==-1) ); 
var is_ie4up  = (is_ie  && (is_major >= 4)); 
var is_ie5  = (is_ie && (is_major == 4) && (agt.indexOf("msie 5.0")!=-1) ); 
var is_ie5up  = (is_ie  && !is_ie3 && !is_ie4); 