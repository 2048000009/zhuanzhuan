(function(){window.addEventListener("load",function(){var d;var c;c=document.getElementsByTagName("head");if(c.length>0){d=document.createElement("script");d.src="//h5.360buyimg.com/ws_js/jdwebm.js?v=JDm";c[0].appendChild(d);console.log("jdwebm is loaded.")}else{console.error("fail load jdwebm.")}})})();(function(){MCommonHeaderBottom=function(b){var g="2.2.2";var h="";var c={useDefaultImp:true,css:["//st.360buyimg.com/common/commonH_B/css/header.css?v="+g],js:[]};if(b){if(typeof(b.useDefaultImp)=="boolean"){c.useDefaultImp=b.useDefaultImp}if(b.css){c.css=b.css}if(b.js){c.js=b.js}}var f={_isIncludedCss:false,debug:false,getSid:function(j,k){if(this._isNotBlank(k)){return j+"sid="+k}return""},ajax:function(k){var j;try{j=new ActiveXObject("Msxml2.XMLHTTP")}catch(l){try{j=new ActiveXObject("Microsoft.XMLHTTP")}catch(l){j=new XMLHttpRequest()}}j.ajaxRunError=true;if(k.withCredentials){try{j.withCredentials=true}catch(l){}}try{j.open(k.method,k.url,k.async);j.onreadystatechange=function(){var n=k.source?k.source:null;if(j.readyState==4){if(j.status==200){j.ajaxRunError=false;var m=j.responseText;k.success.call(n,m)}else{k.error.call(n)}}};j.send(null)}catch(l){}},getCookie:function(n){var l=document.cookie;var m=l.split("; ");for(var k=0;k<m.length;k++){var j=m[k].split("=");if(n==j[0]){return j[1]}}return""},getParam:function(l,j,k){if(typeof(k)!="undefined"){if(this._isNotBlank(l)){return"&"+j+"="+k}else{return"?"+j+"="+k}}else{return""}},templeteOutput:function(l){var j=l.templete;var n=l.param;var k=j;for(var m in n){k=k.replace(new RegExp("{"+m+"}","g"),n[m])}return k},hasClass:function(k,j){if(k){return k.className.match(new RegExp("(\\s|^)"+j+"(\\s|$)"))}else{return false}},addClass:function(k,j){if(k){if(!this.hasClass(k,j)){k.className+=" "+j}}},removeClass:function(l,j){if(this.hasClass(l,j)){var k=new RegExp("(\\s|^)"+j+"(\\s|$)");l.className=l.className.replace(k," ")}},removeClassBatch:function(l,j){for(var k in l){this.removeClass(this.getElementById(l[k]),j)}},includeCss:function(){if(!this._isIncludedCss){for(var j=0;j<c.css.length;j++){this._includeCss(c.css[j])}this._isIncludedCss=true}},innerHtml:function(j){var l=j.sid;var o=j.htmlStr;var m=j.prefix;var k=j.divId;var n=this.templeteOutput({templete:o,param:{prefix:m,sid:l}});this.getElementById(k).innerHTML=n},getElementById:function(j){return document.getElementById(j)},addEvent:function(l,k,j){var m=this.getElementById(l);if(m){m.addEventListener(k,j,false)}},removeEvent:function(l,k,j){var m=this.getElementById(l);if(m){m.removeEventListener(k,j,false)}},divShow:function(j){if(j){j.style.display=""}},divHide:function(j){if(j){j.style.display="none"}},loadJS:function(j,m){var l=document.createElement("script");l.type="text/javascript";l.src=j;l.onload=l.onreadystatechange=function(){if(this.readyState&&this.readyState=="loading"){return}m()};l.onerror=function(){k.removeChild(l);m()};var k=document.getElementsByTagName("head")[0];k.appendChild(l)},runFunction:function(j){if(j){j()}},loadDownloadAppPlugIn:function(j){if(c.useDefaultImp){this.loadJS(c.js[1],function(){j()})}},executeDefaultFunCtion:function(j,k){if(j&&c.useDefaultImp){if(k){j(k)}else{j()}}},_includeCss:function(l){var n=function(q,p){for(var o=0;o<q.length;o++){if(q[o].href&&q[o].href.indexOf(p)!=-1){return true}}return false};var j=document.getElementsByTagName("link");if(n(j,l)){return true}var m=document.createElement("link");m.setAttribute("rel","stylesheet");m.setAttribute("type","text/css");m.setAttribute("charset","utf-8");m.setAttribute("href",l);var k=document.getElementsByTagName("head")[0];k.appendChild(m)},_isNotBlank:function(j){if(j&&j!=""){return true}return false},printDeugInfo:function(j){if(this.debug){console.log(j)}}};var i={shortcutIds:[],args:{hrederId:"m_common_header",sid:"",isUseCommonHeader:true,navList:[{icon:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAdCAYAAAEhlFeZAAAABGdBTUEAALGPC/xhBQAAAptJREFUSA3Nls+rTVEUx++575UfPeRHEUkUZaIkZaKeTIyMlFIGMiADRSlDMzMDZWZm8vwDBlKiGFBSlIS8F1FGUsLrecfnu+217z777HPuub2rrPq+tdb3+93r/Nznvl4vF2VZLuT4HkJZmKLG6nzG8NIpqbUvNiXDDAnEx0BYAfndastwD6wOI7VcIcHypHfNeeJQJM55bZAwnR10UYVwTi35UUQ74mpMYHjleopbsWA1/Cer/0VmvsI9SWU1rcdBPykTcbfVGIuYL4PFhHsH9yzmKjXiDfCrQiYN+lPwPtA0F8HXQHQo8N8Bb4OVpnITaN0LoRxMFKnPaSlpvWUbEPfuVTfBMga9jnbTFn1v8vDMgimwd7gzcbDIvQjkFYnU3GLWKV4Cu4BidbPbK3995Rkz0m/z3HrjatkbTqQC/Cavba5okIUXjlaEqEFf5z3bHU0z4YnDkS9b4tOdVux2bwXFgawzQ+JdrpVOCkXGmFLmbXp7pjH89phOF4fephjhF+jaJ1Ubr2xe+0zGmup+URRuAcbsWWXJdEqut4WddoFOnSFu59ip6hn+RJjw0+ONbF97STr9oc/bz6gnDjADFD/AsrpjjAwHOA30iBXXwWdXleV98tQYD+Ue/QU/XOl8PJx+B5iVQDwBa2N95JoBVzSJ0NWdahuAvgW8BooXYGObv6ax4JpWEvPgWM3QQuDfAJ4DxRuwtdGO2Ac3gUIvyJFGcweB9WvAY6D4AHaGZTTavreB4hs4GMQxFMxbCe4BxRewR5t0P9CPxj6wCjwE4wz9b6f9qa01A46DQbhz4c+AWXqVm2mfo07TGWBbw2ZZnu00IGeyCTlNXE7PcfH6nD7SlcbDllL/Fwd1vxB2S9Lsry7+FRE18po/MiDmblSeG8kAAAAASUVORK5CYII=",isDisplay:true,jumpUrl:"https://m.jd.com",name:"首页",key:"index"},{icon:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAFMN540AAAABGdBTUEAALGPC/xhBQAAApRJREFUSA3Vlr9KXEEUxncFhYCNYBEsTJEi4GNsIdhFxDdIt42PEXyO2CVVCms7DVZiCItik5DSQptYhJvfd2eO82dn7t69IUUOnJ3z5/vOPXNn7syORl6appmZPcqdxjIknm2LhZHkSfBiSzzkKY6ltgO46tgTy86xCBQfMjZGPkLYIPZ7jFFtfowkRLCH6CO62iYwWraNhsbfN1svbufZwRB4JQrsRnZrrgjhg1sGZpzONRQzI1IcDnbnXAMssvRslUWu0R10HT1CJccRNDVJ6kVdp9HgkYsnGRKySOoNr6fR1CNvb2gusVpNuuJT8rcpK/MA7KtIJt+8v5XB+7sUeKUi/RnLICmsuZ+geoEz9LAXH+AxKtHaao211lpzSdiszne/qoylF1X8hIlPhKx2oCQSqmdIcuqgPAUxM3ziktYUwvEVZ3uQ9Q4exKm2FxfM7Hf4n7OYc6l6i06LSYLqDFlr8852v0bwsaQAMX1NT+h7w1VHQOoglwsCd1XSogTkK/RSuPTIXMT0ecjfMU97wv8BbPnTkSY6D+SuJpmvPpzSShBORJhwmeRFE2jkFHD2iWuf6Ays7mzlPEZYSf2ozx9kPiQdRjbDZMMapmuEqyYlquHu2y6C5QDrBJQcWWzZUdy2QuV/RbEeBB27ks67q0j2QXHbCtQyXHWdDMD409vbUWxZ07g/ehPpVNe8RCd1n0aT2uJ4LkNzkCQXORDsktYunSzCW15Y1Hb2W4u3I4miJCAcQOrcPilx9Aa0aXTtaA3tFlXMblLM5hf6Oq83yKeQPjEtgXb8DNUGvEe/oB/QPVQnm5o5RyVf0c1BDxxK4oEv0RtUcoa+GHRN/EUDb+B+RD8NrfH/8gZdbUOnG1+JfwA4qCAoSiTNEwAAAABJRU5ErkJggg==",isDisplay:true,jumpUrl:"https://so.m.jd.com/category/all.html",name:"分类搜索",key:"search"},{icon:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAXCAYAAAFrOM/8AAAABGdBTUEAALGPC/xhBQAAAfFJREFUSA21lb1LA0EQxXPGIrWktLC0ELEQwcLGQggWlmJpIeKfYGFhbSMIdlZiY20hiIVYWImtIATB3u/GD3L+Zm9vs3s37gUTByY7896bt5vlcqmlRC0WiZCBKmiKo5APBhOVhBNQr7vGK4qibY8zJYKVAMsnWLO9hM3BQOk3CI78Pqi1abAxI6LYCdQ0YMfmaoTQpt0ApDtlSQjQJidzFxFURNt3TkTsgIpCtO7MdscP1maSJG+xWebW4GcDDWCTfA9ApUHzJFqF6hPCtUW62xU7DQsuie8a3EHVGZwY5zQflrpqEH5rWBPlJhonGN77LK+OB3gkRx0QKdDdkeNOQrNJ7jkgUqALvxZ9g/yOzDiqNCyMCrqRbpHrhrpQVkGol1jUSV8UHoB9YaBp4xhD9bgiY6Ong5QoPp4lTN1IBsmWT2pY8Gz7Yuo6T1qngP1fy+kOSYkNf5cMGtjnru9taqwnrP19iewTwPfUei+qVpAnVrCsCv4A4lcnP8kO2VAtIOZIiRtV8AcQr3njmKYXMl76NQrIQ3XJckVOIV4QbACR+5xFvdhwyZ7wPCrskcTr2vrNVI4gvLXi6UpxRIDHiPV5ici6FOJV8tkODWTpuvdYsav5t2UtvZl8i151/ky0thuymAjep/4grBwsj191PxQBfCUS+pFvAAAAAElFTkSuQmCC",isDisplay:true,jumpUrl:"https://p.m.jd.com/cart/cart.action",name:"购物车",key:"cart"},{icon:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAEFCu8CAAAABGdBTUEAALGPC/xhBQAAArNJREFUSA2tlr1KXUEUhe8VUSFCUhgkoI2VmCqmEEtNmuQR0gg2eYOUPoAEbKwkTxES8gNiE5NgF4JdrCIBwUKwComefGvO7Lkzc37uj9mwmL3XXnvPuXNm5txOx1tRFDvmdwhmQiAH4gKsOhKnSLJecZyQUo2BuwlbCVBcG4l/JX/MCMZu5CcPOBslnEv1j8AR3AeXgTBHichfN9+NJC8SIg8QLItjPLece1oIrcljT34m/OB8nzBxGOG3QpA7tUWQ++AarIBpsAdkE3mDEJM8BiuBiBxVRmGy7OLfgeexYGCfxovqjr1RUekWZ7UNSM57wUKtwJNovoJy3XE2wGFbQZ5DX3TBTxJzeXKkmGY74BJolcPGipvFm1kLMQG07LfAPbAJvkPtMzYbgiuwnivgtCFqZ3ZakslLtgbQ2kXpmbWkxpbCGXLJOUl+Y9wk87eJX2VcL6TrSxAOljLEy6D2J/QqS+GZCRnfyscWE1EckPzoJEXxmrG82spGL4h13cnS6wviHHyJG+U++QUgm3c5nC3Qu5zyiihGNwvK3xucSNDmoj8EG43vrk+xOx39l7ra5bRKZQyPpY2/C7SPm0w5aZovtKxvbeibaJJfoHJorIjcI69hKHaNH2qkUHeAbG/QQmldRfzRHaJYF45seogafS9k1U+ib9J2iE+85sGgE6IzrdUOXspTLgFthj/gYb9KabxWNUv99LV5CifBeyD7CypXlTifY3DaydpmbSSF+l/0DBwAXd+xuQ+m6iHtFrO8tAdAtW2vq5we0So4BbLfYBvcbnu4OCetr1GtTL3CTRm0kOPgE5B9A3dCckRHPXwvBtd73LUimAK6hmVPRuzfWKaernM5x5Tew5En1hqrbpig/5qf40h/Udwl3MVu2Le13ObRTnoKbKP4B/n/g+bQXP8A8Y9H3Xp0rSoAAAAASUVORK5CYII=",isDisplay:true,jumpUrl:"https://home.m.jd.com",name:"我的京东",key:"home"},{icon:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAhCAYAAAHPIZnHAAAABGdBTUEAALGPC/xhBQAABFFJREFUWAmdll2IVlUUhmcsHSVRUTMl1C4MHU2S/kSKbhpFzAshCsR0oEQRUedGpYukTNKwuskiBalIwX7QTEsUSXFqvBTUm6GLTPybdNT8yfzJ4/Pu1t6zz/7OGef7Frzfetda715nn33O2furqzPLsmyyaC/I9yCD37JalyM/oJcPTTXSx3Uk+sVBSwhigmp8HN+HI292EsgY0AJuA2/fGmnK9SH5jk/AL3gePMnjYHhIFBEE85XH36mok7ySJrV6sj1W6IAvAvVBSLAhBBDiEYrxzkKN6KIP4L94HrzkIYAQ3oxjJfrGopjnhD5A0OF58CQ/U4B/NiRTQnF1mtOIh8DH4E1fhMtG6Ec53C1xbKrXOE/iJBjlk3AJeyvGTzL/ANzbR0ba5N04/DlLyrn3CH/Bcsfwnca3WMMniU+AV12D9EfiNOdjSqfBTB8XejXASkUqFg5Mk+iGFonjXPhS08EWj8bnvgwGXyL3XIk+n0b8sK6GrQY/O5ZlDXlVQYRQ30k7OFBQzqXcLSCcBz4Bg616Dr8WXCL3IVgKZJ250QpIXgW/gsVANhl8DW4qwKbpx7R/QJ8Gw8FY1wwSHgm0H7hh4kfgfY0fhHubC7kDroAvNYO4wVuEh11nfuADwUQfW7NPyf0AVoF2iWYCb5dN1GSJG/gjvogfYnU1aI0bB05hsA3o2pmokhtp+ceDuIgg2gPmldR0S+GWpSl6E0eTP17UoL6+/m/yuq3yl4niHKAN9sGiJuS1iGHjqRBxla0IdADoOPmN+IWk0VnirtMtKeZCGpwCL8dJ4u1gdpwr5QjXgdwmSpxbxNLBKkiMhQWD91ei20FxMRUT6xV+JtZ0yxGfB3oT3wZ3wfZ0QMVTiAU8AW0oWsSnwEDiq3G9am4zweXsOlGjbwZ/DOiLfQW4b8fXSj3Cl8CfILW/SLizA69d7hrQUrgL4t8Hso3gCfAf0DrvAoeBTMsYHmTFJChukwrbnBbJvecq9uXDBwG9h940ocUah59hSR2SrykPNCFNeBj4AGhy3vZCBmmgDjrZowUTaCCvnVUovwsbKA1YCfYBbVlzbXLfwGXLLJ7wf8h/Och48I8lNKv5oBl8B2Sa9Yt+cnDtSCtAO9Ddxab/GZ+DdBNuJKd3JbU3fF9NRMu7CGwCX4BlwP2hs1m/TuyX8BB8OugTGkCIxwJ9/TqnZGfAhFhTE6eJPxWP9LQBY/Q4fgQyTTh3QPS0j9MxWMste76qgYgZs8CNzLKfqh0b9DTYYU2WhGQVhLGtNj49GnrWhcHaA/ZbE7mzoAUUnYgVTdG9C2Qr0mKPGrCF3gVNwBlNFgKthr7z3WnTgniA5f4tqNWe4uLrdVvYmu66UNfBKhvXna7qGg2PurZZNqtsMHV9lrKvyjQ15Wm4xrXlT21ZA+prTdNWpqk5T+Pl1nwnPvcuEU8BOshk62q+yP0G0lwX+l1XSUw7oQ6y3MSK+t0DVG5rShBkLlAAAAAASUVORK5CYII=",isDisplay:true,jumpUrl:"https://home.m.jd.com/myJd/history/wareHistory.action",name:"浏览记录",key:"footprint"}]},create:function(l){var r=this;this.args=l;var n=this.args;if(!this._validate()){return false}var p=this.args.moduleName;var j=this.args.isShowGobackUrl;var s=this.args.isShowShortCutButton;var u=this.args.isUseCommonHeader;var o="//mapi.m.jd.com/commonHeader/headerInfo.action?_format_=json";if(typeof(p)!="undefined"){o+="&from="+p}if(typeof(j)!="undefined"){o+="&isShowGobackUrl="+j}if(typeof(s)!="undefined"){o+="&isShowShortCutButton="+s}if(typeof(u)!="undefined"){o+="&isUseCommonHeader="+u}var k,v,q,t="";var m={url:o,method:"POST",async:true,timeout:3000,withCredentials:true,success:function(w){headObjData=JSON.parse(w);if(headObjData.isForbiddenCommonHeader){f.getElementById(n.hrederId).style.cssText="min-height: 0; height: 0;overflow: hidden;";return false}k=f.getSid("?",n.sid);if(headObjData.isUseCommonHeader&&(typeof(n.isUseCommonHeader)=="undefined"||n.isUseCommonHeader)){htmlStr=r.getTempleNewHeadHtml(headObjData,n,q);r.addWindowMask()}else{htmlStr=r.getTempleteHtml(n)}q=n.hrederId;t=n.hrederId;r._initShortcutId(q);f.innerHtml({divId:t,sid:k,htmlStr:htmlStr,prefix:q});r._setCutrrentSelectedSyle(n.selectedShortCut);r._initShortCutShow(n.isShowShortCut,q);r.addEvnetClick(q,n,function(y){pageBack(headObjData.isHeadReferHref,headObjData.isHeadHistoryState)},r);f.runFunction(n.isPersonalise);try{n.call&&n.call()}catch(x){}},error:function(){k=f.getSid("?",n.sid);htmlStr=r.getTempleteHtml(n);q=n.hrederId;t=n.hrederId;r._initShortcutId(q);f.innerHtml({divId:t,sid:k,htmlStr:htmlStr,prefix:q});r._setCutrrentSelectedSyle(n.selectedShortCut);r._initShortCutShow(n.isShowShortCut,q);r.addEvnetClick(q,n,pageBack,r);try{n.call&&n.call()}catch(w){}}};f.ajax(m)},addEvnetClick:function(o,n,p,m){var k=document.querySelector("#header-mask");f.addEvent(o+"_goback","click",function(){if(n&&n.gobackUrl){window.location.href=n.gobackUrl}else{f.runFunction(n.onClickGoback);f.executeDefaultFunCtion(p)}});f.addEvent(o+"_jdkey","click",function(){f.runFunction(n.onClickJdkey);f.executeDefaultFunCtion(m.shortCutShowHide,o);if(f.getElementById("header-mask")){if(k.style.display=="none"){k.style.display=""}}});f.addEvent(o+"_shortcut_m_index","click",function(){f.runFunction(n.onClickIndex)});f.addEvent(o+"_shortcut_category_search","click",function(){f.runFunction(n.onClickSearch)});f.addEvent(o+"_shortcut_p_cart","click",function(){f.runFunction(n.onClickCart)});f.addEvent(o+"_shortcut_h_home","click",function(){f.runFunction(n.onClickHome)});f.addEvent(o+"_shortcut_h_footprint","click",function(){f.runFunction(n.onClickFootprint)});f.addEvent(o+"_shortcut_h_myfocus","click",function(){f.runFunction(n.onClickMyfocus)});if(n.isShowShortCut){var j=n.isShowShortCut;for(var l=0;l<j.length;l++){if(j[l].key.indexOf("index,search,cart,home,footprint,myfocus")<0){f.addEvent(o+"_shortcut_m"+j[l].key,"click",function(){f.runFunction(n.onClickFun)})}}}window.addEventListener("scroll",function(){var q=document.getElementById(o+"_shortcut");if(q){if(q.style.display=="block"||q.style.display==""){q.style.display="none";if(k){k.style.display="none"}}}});if(k){k.addEventListener("click",function(){this.style.display="none";var q=document.getElementById(o+"_shortcut");if(q){if(q.style.display==""){q.style.display="none"}}})}},getShortcutId:function(j){return this.shortcutIds[j-1]},getTempleteHtml:function(o){var r=false;var k=navigator.userAgent;if(k.indexOf("baiduboxapp")>0){if(k.indexOf("light")>0){r=true}}var u='<header class="jd-header">    <div class="jd-header-bar">'+(r?"":'        <div report-eventid="MCommonHead_Back" id="{prefix}_goback" class="jd-header-icon-back J_ping"><span></span></div>')+'        <div class="jd-header-title">{title}</div>';var t=(r?"":'        <div report-eventid="MCommonHead_NavigateButton"  report-eventparam="" page_name="'+h+'" id="{prefix}_jdkey" class="jd-header-icon-shortcut J_ping"><span></span></div>');var s="    </div>";var q='    <ul id="{prefix}_shortcut" class="jd-header-shortcut" style="display: none">        <li id="{prefix}_shortcut_m_index">            <a class="J_ping" report-eventid="MCommonHead_home"  report-eventparam="" page_name="'+h+'" href="//m.jd.com/index.html{sid}">                <span class="shortcut-home"></span>                <strong>首页</strong>            </a>        </li>        <li class="J_ping" report-eventid="MCommonHead_CategorySearch"  report-eventparam="" page_name="'+h+'" id="{prefix}_shortcut_category_search">            <a href="//so.m.jd.com/category/all.html?searchFrom=header">                <span class="shortcut-categories"></span>                <strong>分类搜索</strong>            </a>        </li>        <li class="J_ping" report-eventid="MCommonHead_Cart"  report-eventparam="" page_name="'+h+'"  id="{prefix}_shortcut_p_cart">            <a href="//p.m.jd.com/cart/cart.action{sid}" id="html5_cart">                <span class="shortcut-cart"></span>                <strong>购物车</strong>            </a>        </li>        <li id="{prefix}_shortcut_h_home">            <a class="J_ping" report-eventid="MCommonHead_MYJD"  report-eventparam="" page_name="'+h+'"  href="//home.m.jd.com/myJd/home.action{sid}">                <span class="shortcut-my-account"></span>                <strong>我的京东</strong>            </a>        </li>    </ul></header>';var p="";if(this.args.title){p=this.args.title}var j="";var m=o.isShowShortCutButton;var l=navigator.userAgent.indexOf("jdmsxh");var n=navigator.userAgent.indexOf("jdmsxh2");if(l>=0&&l!=n){m=false}if(typeof(m)=="undefined"||m){j=u+t+s+q}else{j=u+s}j=f.templeteOutput({templete:j,param:{title:p}});return j},getTempleNewHeadHtml:function(O,m,I){var j=false;var M=navigator.userAgent;var p="";var o=window.location.href;var q=o.split("?");var B=q[0];var P=q[0];var y=m.isShowGobackUrl;var N=m.isShowShortCutButton;var n=navigator.userAgent.indexOf("jdmsxh");var s=navigator.userAgent.indexOf("jdmsxh2");var w=true;var k=f.getCookie("mhome");var L=f.getCookie("sphome");if(k=="1"){w=true}else{if(L=="1"){w=false}}if(M.indexOf("baiduboxapp")>0){if(M.indexOf("light")>0){j=true}}var l=O.navList;var K='<header class="jd-header"><div class="jd-header-new-bar">';var H=(j?"":'<div report-eventid="MCommonHead_Back" report-eventparam="'+P+'" id="{prefix}_goback" class="jd-header-icon-back J_ping"><span></span></div>');var G='<div class="jd-header-new-title">{title}</div>';if(O.btnList.length>0){if(O.btnList[0].icon&&O.btnList[0].jumpUrl){if((typeof(N)=="undefined"||N)&&O.isShowShortCutButton&&(l&&l.length>0)){var F='<a class="J_ping jd-header-personalise-icon" report-eventid="'+O.btnList[0].report_eventid+'" report-eventparam="'+P+'" style="background:url('+O.btnList[0].icon+') no-repeat center center;background-size:20px" href="'+O.btnList[0].jumpUrl+'"></a>'}else{var F='<a class="J_ping jd-header-personalise-icon" report-eventid="'+O.btnList[0].report_eventid+'" report-eventparam="'+P+'" style="background:url('+O.btnList[0].icon+') no-repeat center center;background-size:20px;position:absolute;top:12px;right:12px;" href="'+O.btnList[0].jumpUrl+'"></a>'}}}var E=(j?"":'<div report-eventid="MCommonHead_NavigateButton" report-eventparam="'+P+'" id="{prefix}_jdkey" class="jd-header-icon-new-shortcut J_ping"><span></span></div>');var D="</div>";var x=m.hrederId;var A='<ul id="'+x+'_shortcut" class="jd-header-vertical-shortcut" style="display: none">';for(var J=0;J<l.length;J++){if(l[J].isDisplay&&l[J].icon&&l[J].jumpUrl&&l[J].name&&l[J].key){var C="";var u="";var r=l[J].report_eventid?true:false;var B=l[J].report_eventparam?l[J].report_eventparam:q[0];var t=l[J].jumpUrl;switch(l[J].key){case"index":C="m_index";r?u=l[J].report_eventid:u="";w?t=l[J].jumpUrl:t="//sp.m.jd.com";break;case"search":C="category_search";r?u=l[J].report_eventid:u="";l[J].jumpUrl+="?searchFrom=header";break;case"cart":C="p_cart";r?u=l[J].report_eventid:u="";break;case"home":C="h_home";r?u=l[J].report_eventid:u="";break;case"footprint":C="h_footprint";r?u=l[J].report_eventid:u="";break;case"myfocus":C="h_myfocus";r?u=l[J].report_eventid:u="";break;default:C="m_"+l[J].key;r?u=l[J].report_eventid:u=""}A+='<li id="'+x+"_shortcut_"+C+'"><a class="J_ping" report-eventid="'+u+'"  report-eventparam="'+B+'" href="'+t+'"><span class="shortcut-'+l[J].key+'" style="background: url('+l[J].icon+') no-repeat center center;background-size: 15px"></span><strong>'+l[J].name+"</strong></a></li>"}}A+="</ul>";var z="</header>";var Q="";if(this.args.title){Q=this.args.title}if(n>=0&&n!=s){N=false}p=K;if((typeof(y)=="undefined"||y)&&O.isShowGobackUrl){p+=H}p+=G;if(O.btnList.length>0){if(O.btnList[0].icon&&O.btnList[0].jumpUrl){p+=F}}if((typeof(N)=="undefined"||N)&&O.isShowShortCutButton){if(l&&l.length>0){p+=E}}p+=D;if(l&&l.length>0){var v=document.createElement("div");v.id="header-shortcut-ul";v.innerHTML=A;document.body.appendChild(v)}p+=z;p=f.templeteOutput({templete:p,param:{title:Q}});return p},addWindowMask:function(){var k=document.querySelector("header-mask");if(k){return}var j=document.createElement("div");j.id="header-mask";j.style.display="none";document.body.appendChild(j)},shortCutShowHide:function(k){var m=f.getElementById(k+"_shortcut");if(m){var n=m.style.display;if(n=="none"){if(document.querySelector(".jd-header-new-bar")){if(f.getElementById(k+"_shortcut")){var j=f.getElementById(k).offsetTop;var l=0;if(j||j=="0"){l=j+53;f.getElementById(k+"_shortcut").style.cssText="position: absolute;top: "+l+"px;right: 10px;"}}}f.divShow(m)}else{f.divHide(m)}}},_initShortcutId:function(k){var j=[k+"_shortcut_m_index",k+"_shortcut_category_search",k+"_shortcut_p_cart",k+"_shortcut_h_home"];this.shortcutIds=j},_initShortCutShow:function(k,j){var l=f.getElementById(j+"_shortcut");if(k){f.divShow(l)}else{f.divHide(l)}},_setCutrrentSelectedSyle:function(j){f.removeClassBatch(this.shortcutIds,"current");if(f._isNotBlank(this.getShortcutId(j))){f.addClass(f.getElementById(this.getShortcutId(j)),"current")}},_validate:function(){var j=true;if(!this._isHasHeaderId()){j=false}return j},_isHasHeaderId:function(){var j=false;if(f.getElementById(this.args.hrederId)){j=true}else{f.printDeugInfo("请正确拼写或添加通用头ID.")}return j}};var d={args:{bottomId:"m_common_bottom",sid:"",isShowBottom:true,footerPlatforms:""},create:function(l){this.args=l;if(!this._validate()){return false}var k=f.getSid("?",this.args.sid);var p=this.getTempleteHtml(this.args);var n=this.args.bottomId;var j=this.args.bottomId;f.innerHtml({divId:j,htmlStr:p,prefix:n});var m=this;this._addFooterPlatformEvent();try{this.args.call&&this.args.call()}catch(o){}},getTempleteHtml:function(j){var k='<footer id="{prefix}_jd_footer" class="jd-footer">'+this._getLinksHtml(j)+this._getPlatformsHtml(j)+this._getCopyrightHtml(j)+"</footer>";return k},_getLinksHtml:function(n){var k="";if(n.pin&&n.pin!=""){k='        <li class=""><a class="J_ping" report-eventid="MCommonHTail_Account"  report-eventparam="" page_name="'+h+'" rel="nofollow"  href="//home.m.jd.com/myJd/home.action{sid}">{pin}</a></li>        <li><a class="J_ping" report-eventid="MCommonHTail_Exit"  report-eventparam="" page_name="'+h+'" rel="nofollow" href="https://passport.m.jd.com/user/logout.action{sid}">退出</a></li>'}else{k='        <li class=""><a class="J_ping" report-eventid="MCommonHTail_Login"  report-eventparam="" page_name="'+h+'" rel="nofollow" href="https://passport.m.jd.com/user/login.action{sid}{returnurl}">登录</a></li>        <li><a class="J_ping" report-eventid="MCommonHTail_Register"  report-eventparam="" page_name="'+h+'" rel="nofollow"  href="https://passport.m.jd.com/register/mobileRegister.action{sid}">注册</a></li>'}var o='	<div class="jd-1px-line-up"></div>    <ul class="jd-footer-links">'+k+'        <li><a class="J_ping" report-eventid="MCommonHTail_Feedback"  report-eventparam="" page_name="'+h+'" rel="nofollow" href="//m.jd.com/showvote.html{sid}">反馈</a></li>        <li><a class="J_ping" report-eventid="MCommonHTail_ToTop"  report-eventparam="" page_name="'+h+'" rel="nofollow" href="#top">回到顶部</a></li>    </ul>';var j=f.getSid("?",n.sid);var m=n.pin;var l=f.getParam(j,"returnurl",n.returnurl);o=f.templeteOutput({templete:o,param:{sid:j,pin:m,returnurl:l}});return o},_getPlatformsHtml:function(j){var n=this.args.bottomId;var q=j.footerPlatforms;if(q.length<=0){return""}var p="";var m="";for(var l=0;l<q.length;l++){m=q[l];var k="";if(m.href){k="href='"+m.href+"'"}if(m.name=="standard"){p+='<li id="{prefix}_standard"  class="jd-footer-icon-standard"><a '+k+">标准版</a></li>"}else{if(m.name=="touchscreen"){p+='<li id="{prefix}_touchscreen" class="jd-footer-icon-touchscreen current"><a '+k+' class="J_ping" report-eventid="MCommonHTail_TouchEdition"  report-eventparam="" page_name="'+h+'">触屏版</a></li>'}else{if(m.name=="pc"){p+='<li id="{prefix}_pc" class="jd-footer-icon-pc"><a '+k+' class="J_ping" report-eventid="MCommonHTail_PCEdition"  report-eventparam="" page_name="'+h+'">电脑版</a></li>'}else{if(m.name=="apps"){p+='<li id="{prefix}_apps"  class="jd-footer-icon-apps"><a class="badge" "'+k+' class="J_ping" report-eventid="MCommonHTail_ClientApp"  report-eventparam="" page_name="'+h+'">客户端</a></li>'}}}}}var o='<div class="jd-1px-line-up"></div>    <ul class="jd-footer-platforms">'+p+"    </ul>";return o},_getCopyrightHtml:function(j){var k=new Date();var l='<div class="jd-1px-line-up"></div><div class="jd-footer-copyright">Copyright © 2004-'+k.getFullYear()+" 京东JD.com 版权所有 </div>";return l},_initDefaultFooterPlatforms:function(){this.args.footerPlatforms=this.platformEnum(this.args.sid).enum4},_addFooterPlatformEvent:function(){var k=this;var m=this.args.footerPlatforms;var l=this.args.bottomId;var j=function(o,n){var p=o+"_"+n;if(f.getElementById(p)){f.addEvent(p,"click",function(){for(var q=0;q<m.length;q++){if(m[q].name==n){f.runFunction(m[q].onClickX);break}}})}};j(l,"standard");j(l,"pc");j(l,"touchscreen");j(l,"apps");downloadAppPlugInForBottom(l+"_apps",k.args.downloadAppPlugIn)},_initBottomShow:function(k,j){var l=f.getElementById(j+"_jd_footer");if(k){f.divShow(l)}else{f.divHide(l)}},_validate:function(){var j=true;if(!this._isHasBottomId()){j=false}return j},_isHasBottomId:function(){var j=false;if(f.getElementById(this.args.bottomId)){j=true}else{f.printDeugInfo("请正确拼写或添加通用尾ID.")}return j}};var a={args:{tipId:"m_common_tip",sid:"",isShowTip:true,isfloat:true,onClickTrynow:function(){}},create:function(l){this.args=l;if(!this._validate()){return false}var m=window.localStorage?true:false;var k=f.getSid("?",this.args.sid);var j=this.getTempleteHtml(l);var n=this.args.tipId;var s=this.args.tipId;var q="_"+Math.floor(Math.random()*10)+Math.floor(Math.random()*10);var r=document.getElementById(s);r.setAttribute("id","content"+q);s="content"+q;r=document.getElementById(s);n=s;this.args.tipId=s;f.innerHtml({divId:s,sid:k,htmlStr:j,prefix:n});this._setFloat(this.args.isfloat,n);var o=this;f.addEvent(n+"_x","click",function(){f.runFunction(o.args.onClickTipX)});f.addEvent(n+"_trynow","click",function(){f.runFunction(o.args.onClickTrynow)});if(!this.args.isUseCustomDownloadApp){downloadAppPlugInForFloat(n+"_trynow",n+"_x",n+"_div",o.args.downloadAppPlugIn)}try{this.args.call&&this.args.call()}catch(p){}},getTempleteHtml:function(l){var j="打开京东APP购物";var o="新人领188元红包";var m="";if(l.copyWrite){cw=l.copyWrite;if(l.copyWrite.up){j=l.copyWrite.up;if(l.copyWrite.down){o=l.copyWrite.down}}}if(l.location){var k=l.location;m=' style = "'+localStyle+'"'}var n='	<div  id="{prefix}_div" '+m+' class="download-pannel download-noBg">	    <div class="pannel-bg"><img src="//st.360buyimg.com/common/commonH_B/images/2015/download-bg.png"></div>	    <div id="{prefix}_x" class="download-close"><img src="//st.360buyimg.com/common/commonH_B/images/2015/icon-close.png"></div>	    <div class="download-logo"><img src="//st.360buyimg.com/common/commonH_B/images/2015/top-jdlogo.png"></div>	    <div class="download-txt">	            <span class="download-content">	                <em class="content-up">'+j+'</em>	                <em class="content-down">'+o+'</em>	            </span>	    </div>	    <div id="{prefix}_trynow" class="download-action">	        <span class="font-large">立即打开</span>	    </div>	</div>';if(navigator.userAgent.indexOf("skapp")>-1){return""}else{return n}},_setFloat:function(k,j){var l=f.getElementById(j+"_div");if(l){if(k){}else{}}},_showTip:function(k,j){var l=f.getElementById(j+"_div");if(k){f.divShow(l)}else{f.divHide(l)}},_validate:function(){var j=true;if(!this._isHasTipId()){j=false}return j},_isHasTipId:function(){var j=false;if(f.getElementById(this.args.tipId)){j=true}else{f.printDeugInfo("请正确拼写或添加通用提示ID.")}return j}};var e={args:{tipId:"m_common_tip",sid:"",isShowTip:true,isfloat:true,onClickTrynow:function(){}},create:function(k){this.args=k;if(!this._validate()){return false}var j=this.args.tipId;var m="_"+Math.floor(Math.random()*10)+Math.floor(Math.random()*10);var l=document.getElementById(j);l.setAttribute("id","content"+m);j="content"+m;this.args.tipId=j;$.downloadAppLayerConfigData(this.args)},_validate:function(){var j=true;if(!this._isHasTipId()){j=false}return j},_isHasTipId:function(){var j=false;if(f.getElementById(this.args.tipId)){j=true}else{f.printDeugInfo("请正确拼写或添加通用提示ID.")}return j}};f.includeCss();return{header:function(j){i.create(j)},bottom:function(k){var l=navigator.userAgent.indexOf("jdmsxh");var j=navigator.userAgent.indexOf("jdmsxh2");if(l>=0&&l!=j){}else{d.create(k)}},jdTip:function(j){a.create(j)},jdTipNew:function(j){e.create(j)},platformEnum:function(l,j){var k="";if(j){k=f.getSid("&",j)}return{enum0:[],enum1:[{id:4,name:"apps",href:"",onClickX:function(){}}],enum2:[{id:2,name:"touchscreen",href:"",onClickX:function(){}},{id:4,name:"apps",href:"",onClickX:function(){}}],enum2_1:[{id:2,name:"touchscreen",href:"",onClickX:function(){}},{id:3,name:"pc",href:"",onClickX:function(){skip(l)}}],enum2_2:[{id:4,name:"apps",href:"",onClickX:function(){}},{id:2,name:"touchscreen",href:"",onClickX:function(){}}],enum3:[{id:4,name:"apps",href:"",onClickX:function(){}},{id:2,name:"touchscreen",href:"",onClickX:function(){}},{id:3,name:"pc",href:"",onClickX:function(){skip(l)}}],enum3_1:[{id:3,name:"pc",href:"",onClickX:function(){skip(l)}},{id:2,name:"touchscreen",href:"",onClickX:function(){}},{id:4,name:"apps",href:"",onClickX:function(){}}],enum3_2:[{id:2,name:"touchscreen",href:"",onClickX:function(){}},{id:3,name:"pc",href:"",onClickX:function(){skip(l)}},{id:4,name:"apps",href:"",onClickX:function(){}}]}},version:g}}})();setTimeout(function(){try{MPing.inputs.Click.attachEvent()}catch(a){}},100);