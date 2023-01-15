!function(){var U=window.U={};String.format=function(){var e=arguments[0];if(arguments.length>1)if(2==arguments.length&&"object"==typeof arguments[1]){var n=arguments[1];for(var t in n)if(void 0!=n[t]){var r=new RegExp("({"+t+"})","g");e=e.replace(r,n[t])}}else for(var o=1;o<arguments.length;o++)if(void 0!=arguments[o]){var r=new RegExp("({["+(o-1)+"]})","g");e=e.replace(r,arguments[o])}return e},U.fn={$:function(e,n){return n=n&&this.$(n)||document,U.lang.isString(e)&&""!=e?n.querySelector(e):e},$a:function(e,n){return n=n&&this.$(n)||document,U.lang.isString(e)&&""!=e?n.querySelectorAll(e):e},getParam:function(e,n){var t=n||window.location.href;if(e&&t){var r=new RegExp("(\\?|#|&)"+e+"=([^&^#]*)(#|&|$)"),o=t.match(r);return o?o[2]:""}return""},delParam:function(e,n){return!e instanceof Array&&(e=[e]),U.fn.each(e,function(e){n=n.replace(new RegExp("(?:&"+e+"=[^&]*)","g"),""),n=n.replace(new RegExp("(?:\\?"+e+"=[^&]*&?)","g"),"?")}),n},addParam:function(e,n){var t=[];U.fn.each(e,function(e,n){t.push(n)}),n=U.fn.delParam(t,n);var r=U.req.serializeParam(e);return n+=/\?/.test(n)?"&"+r:"?"+r},getParams:function(e){e=e||location.href;var n=e.replace(/.+?\?/g,"").replace(/#.*/,"").split("&"),t={};for(var r in n){var o=n[r].split("=");2===o.length&&(t[o[0]]=o[1])}return t},each:function(e,n){var t,r=0,o=e.length,i=void 0===o&&U.lang.isObject(e);if(i){for(var a in e)if(n.call(e[a],e[a],a,e)===!1)break}else for(t=e[0];o>r&&!1!==n.call(t,t,r,e);t=e[++r]);return e},log:function(e){window.console&&console.log(e)},logError:function(e){this.log(e.name+" : "+e.message+" \n stack :"+e.stack)},stringify:function(e){var n="";try{n=JSON.stringify(e)}catch(t){this.logError(t)}return n},extend:function(e,n){for(var t in n)e[t]=n[t];return e},parseJSON:function(e){var n=null;try{n=JSON.parse(e)}catch(t){this.logError(t)}return n},domReady:function(e,n){"complete"==document.readyState||"interactive"==document.readyState?e.call():document.addEventListener("DOMContentLoaded",function(n){document.removeEventListener("DOMContentLoaded",arguments.callee,!1),e.call()},!1)},formatFloat:function(e,n,t,r){return r=~~r?~~r:n+1,intNumber=Math.round(e*Math.pow(10,r)),Math[t](intNumber/Math.pow(10,r-n))/Math.pow(10,n)},animate:function(e,n,t,r){function o(e){return""===vendor?e:(e=e.charAt(0).toUpperCase()+e.substr(1),vendor+e)}dummyStyle=document.createElement("div").style,vendor=function(){for(var e,n="t,webkitT,MozT,msT,OT".split(","),t=0,r=n.length;r>t;t++)if(e=n[t]+"ransform",e in dummyStyle)return n[t].substr(0,n[t].length-1);return!1}(),cssVendor=vendor?"-"+vendor.toLowerCase()+"-":"",transform=o("transform"),transitionProperty=o("transitionProperty"),transitionDuration=o("transitionDuration"),transitionTimingFunction=o("transitionTimingFunction"),transitionDelay=o("transitionDelay"),hasTransitionEnd=o("transition")in dummyStyle,TRNEND_EV=function(){if(vendor===!1)return!1;var e={"":"transitionend",webkit:"webkitTransitionEnd",Moz:"transitionend",O:"oTransitionEnd",ms:"MSTransitionEnd"};return e[vendor]}(),hasTransitionEnd&&r&&(e.style[transitionProperty]=n||transform,e.style[transitionDuration]=r+"ms",e.style[transitionTimingFunction]="cubic-bezier(0.33,0.66,0.66,1)"),e.style[transform]=n||t},uuid:function(e,n){var t,r="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split(""),o=r,i=[];if(n=n||o.length,e)for(t=0;e>t;t++)i[t]=o[0|Math.random()*n];else{var a;for(i[8]=i[13]=i[18]=i[23]="-",i[14]="4",t=0;36>t;t++)i[t]||(a=0|16*Math.random(),i[t]=o[19==t?3&a|8:a])}return i.join("")},emptyFun:function(){}},U.$=U.fn.$,U.getParam=U.fn.getParam,U.lang={is:function(e,n){var t=Object.prototype.toString.call(n).slice(8,-1);return void 0!==n&&null!==n&&t===e},isNumber:function(e){return this.is("Number",e)},isString:function(e){return this.is("String",e)},isFunction:function(e){return this.is("Function",e)},isObject:function(e){return this.is("Object",e)},isArray:function(e){return this.is("Array",e)}},U.string={escHTML:function(e,n){var t=["&","&amp;","<","&lt;",">","&gt;"," ","&nbsp;",'"',"&quot;","'","&#39;","\\r","<br>","\\n","<br>"];n&&t.reverse();for(var r=0,o=e;r<t.length;r+=2)o=o.replace(new RegExp(t[r],"g"),t[1+r]);return o},tmpl:function(e,n){return"string"==typeof e?e.replace(/\$([a-zA-Z0-9_]*)\$/g,function(e,t){return"undefined"!=typeof n[t]?n[t]:""}):e}},U.tmpl=U.string.tmpl,U.req={log:function(){var e=[];return function(n){var t=new Image;e.push(t),t.onload=t.onerror=t.onabort=function(){t=t.onload=t.onerror=t.onabort=null;for(var n=0,r=e.length;r>n;++n)e[n]===t&&e.splice(n,1)},t.src=n}}(),serializeParam:function(e){if(!e)return"";var n=[];for(var t in e)n.push(t+"="+e[t]);return n.join("&")},getJsonp:function(e,n,t){t=U.fn.extend({onSucess:U.fn.emptyFun,onFailed:U.fn.emptyFun},t);var r=null,o=String.format("c{0}{1}",U.fn.uuid(4,10),+new Date),i=n.fixedCB?n.fixedCB:o;delete n.fixedCB,window[i]=function(e){r=e,delete window[i]};var a={};n.fixedCBR?(a[n.fixedCBR]=o,delete n.fixedCBR):a={format:String.format("jsonp_{0}",o)};var s=U.fn.extend(a,n),c=this.serializeParam(s);e+=(e.indexOf("?")>-1?"&":"?")+c,this.loadScript(e,function(e,n){r&&n?t.onSucess&&t.onSucess.apply(window,[r]):(r={ret:-9999,path:e,msg:"系统繁忙，请稍后再试！"},t.onFailed&&t.onFailed.apply(window,[r]))},e)},ajax:function(option){var o=option,m=o.method.toLocaleUpperCase(),isPost="POST"==m,xhr=window.XMLHttpRequest?new XMLHttpRequest:!1;if(!xhr)return o.error&&o.error.call(null,{ret:999,msg:"Create XHR Error!"}),!1;var qstr=this.serializeParam(o.param);return qstr&&!isPost&&(o.url+=(o.url.indexOf("?")>-1?"&":"?")+qstr),xhr.open(m,o.url,!0),isPost&&xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),xhr.onreadystatechange=function(){if(4==xhr.readyState){var status=xhr.status;if(status>=200&&300>status){var response=xhr.responseText.replace(/(\r|\n|\t)/gi,""),m=/(?:callback\()?(.+)(?:\))?/gi.exec(response),result={ret:998,msg:"解析数据出错，请稍后再试"};try{result=eval("("+m[1]+")")}catch(e){}o.success&&o.success.call(xhr,result)}else o.error&&o.error.call(xhr,{ret:997,msg:"连接错误，请稍后再试",status:status})}},xhr.send(isPost?qstr:void 0),xhr},css:function(e,n){var t,r,o,i,a;"string"==typeof n&&(t=n),n="object"==typeof n?n:{},t=n.linkID||t,r=n.doc||document,a=r.getElementsByTagName("head")[0],i=(o=r.getElementById(t))&&"LINK"==o.nodeName?o:null,i||(i=r.createElement("link"),t&&(i.id=t),i.rel=i.rev="stylesheet",i.type="text/css",i.media=n.media||"screen",a.appendChild(i));try{e&&(i.href=e)}catch(s){}return i},loadScript:function(e,n,t){var r=document.getElementsByTagName("head")[0],o=document.createElement("script"),i=function(){if(o){try{o.src=""}catch(e){}U.dom.unon(o,"load",i),r.removeChild(o),o=null,"function"==typeof n&&n(t,!0)}},a=function(){if(o){try{o.src=""}catch(e){}U.dom.unon(o,"error",a),r.removeChild(o),o=null,"function"==typeof n&&n(t,!1)}};U.dom.on(o,"load",i),U.dom.on(o,"error",a),o.charset=t?t.charset:"utf-8",o.src=e,r.insertBefore(o,r.firstChild)},report:function(e){var n=[];e[6]=10,e[7]=0,U.fn.each(e,function(e,t){n.push(t+"="+encodeURIComponent(e))}),(new Image).src="//api.unipay.qq.com/v1/900/15499/log_data?num=1&record0="+n.join("|")+"&junhan="+Math.random()},isdR:function(){},isdV:function(){}};var ua=U.ua={},agent=navigator.userAgent,chrome=agent.match(/Chrome\/([\d.]+)/)||agent.match(/CriOS\/([\d.]+)/),webview=!chrome&&agent.match(/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/),safari=webview||agent.match(/Version\/([\d.]+)([^S](Safari)|[^M]*(Mobile)[^S]*(Safari))/);ua.iPod=agent.indexOf("iPod")>-1,ua.iPad=agent.indexOf("iPad")>-1,ua.iPhone=agent.indexOf("iPhone")>-1,agent.indexOf("Android")>-1&&(ua.android=parseFloat(agent.slice(agent.indexOf("Android")+8)),ua.androidVersion=(/Android.([0-9\.]+)/.exec(agent)||["",""])[1]),ua.iOS=ua.iPad||ua.iPhone||ua.iPod,ua.wp=agent.indexOf("Windows Phone")>-1,safari&&ua.iOS&&(ua.safari=!0),webview&&(ua.webview=!0);var m=/MicroMessenger\/([0-9\.]+)/i.exec(agent);m&&(ua.weixin=parseFloat(m[1],10)),m=/ QQ\/([0-9\.]+)/i.exec(agent),m&&(ua.mqq=m[1]),function(e,n,t){for(var r,o="atchesSelector",i=n.documentElement,a=["webkitM","mozM","msM","oM","m"],s=a.length;s--;)if(a[s]+o in i){r=a[s]+o;break}e.matchesSelector=r?function(e,n){return e[r](n)}:t?function(e,r){return-1!==t.call((e.parentNode||n).querySelectorAll(r)||[],e)}:function(e,t){for(var r=(e.parentNode||n).querySelectorAll(t)||[],o=r.length;o--;)if(r[o]==e)return!0;return!1}}(window,document,Array.prototype.indexOf),U.dom={setStyle:function(e,n,t){e=U.$(e),U.lang.isObject(n)?U.each(n,function(n,t){e.style[t]=n}):e.style[n]=t},hide:function(e){return this.setStyle(e,"display","none")},show:function(e){return this.setStyle(e,"display","")},visible:function(e){return this.setStyle(e,"visibility","visible")},hidden:function(e){return this.setStyle(e,"visibility","hidden")},removeClass:function(e,n){return e=U.$(e),e.className=e.className.replace(new RegExp("\\b"+n+"\\b"),"")},addClass:function(e,n){return e=U.$(e),!U.dom.hasClass(e,n)&&(e.className+=" "+n)},hasClass:function(e,n){return new RegExp("\\b"+n+"\\b").test(U.$(e).className)},getScrollLeft:function(e){var n=e||document;return n.body.scrollLeft},getScrollTop:function(e){var n=e||document;return n.body.scrollTop},getClientHeight:function(e){var n=e||document;return"CSS1Compat"==n.compatMode?n.documentElement.clientHeight:n.body.clientHeight},getClientWidth:function(e){var n=e||document;return"CSS1Compat"==n.compatMode?n.documentElement.clientWidth:n.body.clientWidth},getScrollHeight:function(e){return e=e||document.documentElement,e.scrollHeight},getScrollWidth:function(e){return e=e||document.documentElement,e.scrollWidth},on:function(e,n,t,r,o,i){i=!!i,e=U.$(e);var a=function(n){if(!o)return t.apply(n.target,[n].concat(U.lang.isArray(r)&&[r]));for(var i=null,a=n.target;a&&a!=e;){if(matchesSelector(a,o)){i=a;break}a=a.parentNode}i&&t.apply(i,[n].concat(U.lang.isArray(r)&&[r]))};return e.addEventListener(n,a,i),a},unon:function(e,n,t,r){e.removeEventListener(n,t,r)}},U.cookie={get:function(e){var n=document.cookie.match(new RegExp("(?:^|;\\s)"+e+"=(.*?)(?:;\\s|$)"));return n?n[1]:""},set:function(e,n,t){t=t||{};var r=new Date,o=t.domain||"pay.qq.com",i=t.path||"/",a=t.time||31536e7;r.setTime(r.getTime()+a),document.cookie=e+"="+n+"; path="+i+"; domain="+o+"; expires="+r.toUTCString()},del:function(e,n){n=n||{},n.time=-new Date,U.cookie.set(e,"",n)}}}();