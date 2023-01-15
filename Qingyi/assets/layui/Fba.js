function fuckyou() {
	window.close();
	window.location = "about:blank";
}
document.onkeydown = function(event) {
	var ev = event || window.event || arguments.callee.caller.arguments[0];
	if (ev.keyCode == 123) {
		alert("拜拜了您勒~")
		fuckyou()
		return false;
	}
}
document.oncontextmenu = function(event) {
	if (window.event) {
		event = window.event;
	}
	try {
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
			return false;
		}
		return true;
	} catch (e) {
		return false;
	}
}
document.onpaste = function(event) {
	if (window.event) {
		event = window.event;
	}
	try {
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
			return false;
		}
		return true;
	} catch (e) {
		return false;
	}
}
document.oncopy = function(event) {
	if (window.event) {
		event = window.event;
	}
	try {
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
		return false;
		}
		return true;
	} catch (e) {
		return false;
	}
}
document.oncut = function(event) {
	if (window.event) {
		event = window.event;
	}
	try {
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
		return false;
		}
		return true;
	} catch (e) {
		return false;
	}
}
document.onselectstart = function(event) {
	if (window.event) {
		event = window.event;
	}
	try {
		var the = event.srcElement;
	if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
		return false;
		}
		return true;
	} catch (e) {
		return false;
	}
}