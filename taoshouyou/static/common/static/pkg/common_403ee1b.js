;/*!common:static/js/common/common.js*/
function showHeaderMune(){var e,t=document.getElementById("header_mune_list"),n=document.getElementById("header_mune_bg");switch(t.style.display){case"block":t.style.display="none",n.style.display="none",document.body.removeEventListener("touchmove",e,!1);break;default:t.style.display="block",n.style.display="block",document.body.addEventListener("touchmove",e,!1)}}function CheckMobileExits(e,t){var n=$("#mobile").val(),s=validatemobile(n);s&&$.ajax({url:"/user/verify/checkmobileisexist",data:{mobile:n,_csrf:$('meta[name="csrf-token"]').attr("content")},type:"post",async:!1,cache:!1,dataType:"json",success:function(t){0!=t.errcode?showmessage(t.msg,3e3):SendMobileVerify(e)}})}function SendMobileVerify(e,t){var n=$.trim($("#mobile").val()),s=validatemobile(n);if(s){var a=commonSendSmscode(n,t);""==a?($(e).addClass("ui-state-disabled",!1),settime($(e))):showmessage(a,3e3)}}function SendMobileVerifyQuery(e){$.ajax({url:"/user/verify/querymobilesendsms",data:{_csrf:$('meta[name="csrf-token"]').attr("content")},type:"post",async:!1,cache:!1,dataType:"json",success:function(t){0!=t.errcode?showmessage(t.errmsg,3e3):($(e).addClass("ui-state-disabled",!1),settime($(e)))}})}function SendEmailVerify(e){var t=$.trim($("#email").val()),n=validateEmail(t);n&&$.ajax({url:"/user/verify/emailsendsms",data:{email:t,_csrf:$('meta[name="csrf-token"]').attr("content")},type:"post",async:!1,cache:!1,dataType:"json",success:function(t){0!=t.errcode?showmessage(t.errmsg,3e3):($(e).addClass("ui-state-disabled",!1),settime1($(e)))}})}function SendEmailVerifyQuery(e){$.ajax({url:"/user/verify/queryemailsendsms",data:{_csrf:$('meta[name="csrf-token"]').attr("content")},type:"post",async:!1,cache:!1,dataType:"json",success:function(t){0!=t.errcode?showmessage(t.errmsg,3e3):($(e).addClass("ui-state-disabled",!1),settime1($(e)))}})}function settime(e){0==countdown?(e.removeClass("ui-state-disabled"),e.html("获取校验码"),countdown=60,$("#js-gb-pcheckcode-get").show(),clearTimeout(tempfun)):(e.html(countdown+"秒后可重新操作"),countdown--,tempfun=setTimeout(function(){settime(e)},1e3))}function settime1(e){0==countdown1?(e.removeClass("ui-state-disabled"),e.html("获取校验码"),countdown1=60,clearTimeout(tempfun1)):(e.html(countdown1+"秒后可重新操作"),countdown1--,tempfun1=setTimeout(function(){settime1(e)},1e3))}function CheckSmscode(e){var t=$("#smscode").val(),n=$("#mobile").val();if(t=t.replace(/\D/g,""),""==t)return showmessage("验证码不可为空",3e3),!1;if(6!=t.length)return showmessage("您输入的验证码不正确，请重新输入",3e3),!1;var s=!1;if(0==e){var a=commonCheckCode(n,t);return""==a?s=!0:(showmessage(a,3e3),s=!1),s}var a=commonCheckEmail(t);return""==a?s=!0:(showmessage(a,3e3),s=!1),s}function showmessage(e,t){$(".message").css("display","block"),$("#top_alert span").text()&&$("#top_alert span").text().length>0?($("#top_alert").empty().append("<span>"+e+"</span>"),$("#top_alert").css("display","block")):$(".message").prepend('<div id="top_alert"><span>'+e+"</span></div>"),$(".message").css("opacity","1"),$(".message").stop(),$(".message").animate({opacity:0},t,function(){$(".message").css("display","none")})}function validatemobile(e){if(0==trim(e).length)return showmessage("请输入手机号码！",3e3),$("#mobile").focus(),!1;if(11!=trim(e).length)return showmessage("请输入有效的手机号码！",3e3),$("#mobile").focus(),!1;var t=/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;return t.test(trim(e))?!0:(alert("请输入有效的手机号码！"),showmessage("请输入有效的手机号码！",3e3),$("#mobile").focus(),!1)}function validateEmail(e){return""==e?(showmessage("请输入邮箱地址",3e3),!1):/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(e)?!0:(showmessage("请输入一个有效的邮箱地址",3e3),!1)}function isQQ(e){var t=RegExp(/^[1-9][0-9]{4,9}$/).test(e);return t?!0:!1}function validatePsw(e){var t=$.trim(e.val());return 0==t.length?(showmessage("密码不能为空",3e3),!1):t.length<6?(showmessage("密码不能小于六位",3e3),!1):!0}function validatePass(e,t){return""==e?(showmessage("密码不能为空",3e3),!1):e==t?(showmessage("密码不能与用户名相同",3e3),!1):e.length<6?(showmessage("密码不能少于6位",3e3),!1):!0}function validatePasswordstrength(e){var t=0;if(e.length<6)return t;switch(/\d/.test(e)&&t++,/[a-z]/.test(e)&&t++,/[A-Z]/.test(e)&&t++,/\W/.test(e)&&t++,t){case 0:return 0;case 1:return 1;case 2:return 2;case 3:case 4:return e.length<12?3:4}}function validateRepassword(e,t){return""==e||""==t?(showmessage("密码不能为空，请重新输入",3e3),"密码不能为空，请重新输入"):t!=e?(showmessage("俩次输入密码不符，请重新输入",3e3),"俩次输入密码不符，请重新输入"):!0}function validateRepassword1(e,t){return""==e||""==t?(showmessage("密码不能为空，请重新输入",3e3),!1):e.length<6?(showmessage("密码不能小于6位，请重新输入",3e3),!1):t!=e?(showmessage("俩次输入密码不符，请重新输入",3e3),!1):!0}function formatCurrency(e){e=e.toString().replace(/\$|\,/g,""),isNaN(e)&&(e="0"),sign=e==(e=Math.abs(e)),e=Math.floor(100*e+.50000000001),cents=e%100,e=Math.floor(e/100).toString(),10>cents&&(cents="0"+cents);for(var t=0;t<Math.floor((e.length-(1+t))/3);t++)e=e.substring(0,e.length-(4*t+3))+","+e.substring(e.length-(4*t+3));return(sign?"":"-")+e+"."+cents}function trim(e){return(e+"").replace(/(\s+)$/g,"").replace(/^\s+/g,"")}function strlen(e){for(var t=0,n=0;n<e.length;n++)t+=null!=e[n].match(/[^\x00-\xff]/gi)?2:1;return t}function strlen2(e){return-1!=e.indexOf("\n")?e.replace(/\r?\n/g,"_").length:e.length}function _attachEvent(e,t,n,s){s=s?s:e,e.addEventListener?e.addEventListener(t,n,!1):s.attachEvent&&e.attachEvent("on"+t,n)}function _detachEvent(e,t,n,s){s=s?s:e,e.removeEventListener?e.removeEventListener(t,n,!1):s.detachEvent&&e.detachEvent("on"+t,n)}function browserVersion(types){var other=1;for(i in types){var v=types[i]?types[i]:i;if(-1!=USERAGENT.indexOf(v)){var re=new RegExp(v+"(\\/|\\s|:)([\\d\\.]+)","ig"),matches=re.exec(USERAGENT),ver=null!=matches?matches[2]:0;other=0!==ver&&"mozilla"!=v?0:other}else var ver=0;eval("BROWSER."+i+"= ver")}BROWSER.other=other}function getEvent(){if(document.all)return window.event;for(func=getEvent.caller;null!=func;){var e=func.arguments[0];if(e&&(e.constructor==Event||e.constructor==MouseEvent||"object"==typeof e&&e.preventDefault&&e.stopPropagation))return e;func=func.caller}return null}function isUndefined(e){return"undefined"==typeof e?!0:!1}function in_array(e,t){if("string"==typeof e||"number"==typeof e)for(var n in t)if(t[n]==e)return!0;return!1}function mb_strlen(e){for(var t=0,n=0;n<e.length;n++)t+=e.charCodeAt(n)<0||e.charCodeAt(n)>255?"utf-8"==charset?3:2:1;return t}function mb_cutstr(e,t,n){var s=0,a="",n=n?n:"...";t-=n.length;for(var i=0;i<e.length;i++){if(s+=e.charCodeAt(i)<0||e.charCodeAt(i)>255?"utf-8"==charset?3:2:1,s>t){a+=n;break}a+=e.substr(i,1)}return a}function preg_replace(e,t,n,s){for(var s=s?s:"ig",a=e.length,i=0;a>i;i++)re=new RegExp(e[i],s),n=n.replace(re,"string"==typeof t?t:t[i]?t[i]:t[0]);return n}function htmlspecialchars(e){return preg_replace(["&","<",">",'"'],["&amp;","&lt;","&gt;","&quot;"],e)}function display(e){var t=$(e);t.style.visibility?t.style.visibility="visible"==t.style.visibility?"hidden":"visible":t.style.display=""==t.style.display?"none":""}function checkall(e,t,n){var n=n?n:"chkall";count=0;for(var s=0;s<e.elements.length;s++){var a=e.elements[s];a.name&&a.name!=n&&!a.disabled&&(!t||t&&a.name.match(t))&&(a.checked=e.elements[n].checked,a.checked&&count++)}return count}function setcookie(e,t,n,s,a,i){if((""==t||0>n)&&(t="",n=-2592e3),n){var o=new Date;o.setTime(o.getTime()+1e3*n)}a=a?a:cookiedomain,s=s?s:cookiepath,document.cookie=escape(cookiepre+e)+"="+escape(t)+(o?"; expires="+o.toGMTString():"")+(s?"; path="+s:"/")+(a?"; domain="+a:"")+(i?"; secure":"")}function getcookie(e,t){e=cookiepre+e;var n=document.cookie.indexOf(e),s=document.cookie.indexOf(";",n);if(-1==n)return"";var a=document.cookie.substring(n+e.length+1,s>n?s:document.cookie.length);return t?a:unescape(a)}function Ajax(e,t){var n=new Object;return n.loading="请稍候...",n.recvType=e?e:"XML",n.waitId=t?$(t):null,n.resultHandle=null,n.sendString="",n.targetUrl="",n.setLoading=function(e){"undefined"!=typeof e&&null!==e&&(n.loading=e)},n.setRecvType=function(e){n.recvType=e},n.setWaitId=function(e){n.waitId="object"==typeof e?e:$(e)},n.createXMLHttpRequest=function(){var e=!1;if(window.XMLHttpRequest)e=new XMLHttpRequest,e.overrideMimeType&&e.overrideMimeType("text/xml");else if(window.ActiveXObject)for(var t=["Microsoft.XMLHTTP","MSXML.XMLHTTP","Microsoft.XMLHTTP","Msxml2.XMLHTTP.7.0","Msxml2.XMLHTTP.6.0","Msxml2.XMLHTTP.5.0","Msxml2.XMLHTTP.4.0","MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP"],n=0;n<t.length;n++)try{if(e=new ActiveXObject(t[n]))return e}catch(s){}return e},n.XMLHttpRequest=n.createXMLHttpRequest(),n.showLoading=function(){!n.waitId||4==n.XMLHttpRequest.readyState&&200==n.XMLHttpRequest.status||(n.waitId.style.display="",n.waitId.innerHTML='<span><img src="'+IMGDIR+'/loading.gif" class="vm"> '+n.loading+"</span>")},n.processHandle=function(){if(4==n.XMLHttpRequest.readyState&&200==n.XMLHttpRequest.status)if(n.waitId&&(n.waitId.style.display="none"),"HTML"==n.recvType)n.resultHandle(n.XMLHttpRequest.responseText,n);else if("XML"==n.recvType)n.XMLHttpRequest.responseXML&&n.XMLHttpRequest.responseXML.lastChild&&"parsererror"!=n.XMLHttpRequest.responseXML.lastChild.localName?n.resultHandle(n.XMLHttpRequest.responseXML.lastChild.firstChild.nodeValue,n):n.resultHandle("",n);else if("JSON"==n.recvType){var e=null;try{e=new Function("return ("+n.XMLHttpRequest.responseText+")")()}catch(t){e=null}n.resultHandle(e,n)}},n.get=function(e,t){e=hostconvert(e),setTimeout(function(){n.showLoading()},250),n.targetUrl=e,n.XMLHttpRequest.onreadystatechange=n.processHandle,n.resultHandle=t;var s=isUndefined(s)?0:s;window.XMLHttpRequest?(n.XMLHttpRequest.open("GET",n.targetUrl),n.XMLHttpRequest.setRequestHeader("X-Requested-With","XMLHttpRequest"),n.XMLHttpRequest.send(null)):(n.XMLHttpRequest.open("GET",e,!0),n.XMLHttpRequest.setRequestHeader("X-Requested-With","XMLHttpRequest"),n.XMLHttpRequest.send())},n.post=function(e,t,s){e=hostconvert(e),setTimeout(function(){n.showLoading()},250),n.targetUrl=e,n.sendString=t,n.XMLHttpRequest.onreadystatechange=n.processHandle,n.resultHandle=s,n.XMLHttpRequest.open("POST",e),n.XMLHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),n.XMLHttpRequest.setRequestHeader("X-Requested-With","XMLHttpRequest"),n.XMLHttpRequest.send(n.sendString)},n.getJSON=function(e,t){n.setRecvType("JSON"),n.get(e+"&ajaxdata=json",t)},n.getHTML=function(e,t){n.setRecvType("HTML"),n.get(e+"&ajaxdata=html",t)},n}function getHost(e){var t="null";("undefined"==typeof e||null==e)&&(e=window.location.href);var n=/^\w+\:\/\/([^\/]*).*/,s=e.match(n);return"undefined"!=typeof s&&null!=s&&(t=s[1]),t}function hostconvert(e){e.match(/^https?:\/\//)||(e=SITEURL+e);var t=getHost(e),n=getHost().toLowerCase();return t&&n!=t&&(e=e.replace(t,n)),e}function newfunction(e){for(var t=[],n=1;n<arguments.length;n++)t.push(arguments[n]);return function(n){return doane(n),window[e].apply(window,t),!1}}function evalscript(e){if(-1==e.indexOf("<script"))return e;for(var t=/<script[^\>]*?>([^\x00]*?)<\/script>/gi,n=[];n=t.exec(e);){var s=/<script[^\>]*?src=\"([^\>]*?)\"[^\>]*?(reload=\"1\")?(?:charset=\"([\w\-]+?)\")?><\/script>/i,a=[];a=s.exec(n[0]),a?appendscript(a[1],"",a[2],a[3]):(s=/<script(.*?)>([^\x00]+?)<\/script>/i,a=s.exec(n[0]),appendscript("",a[2],-1!=a[1].indexOf("reload=")))}return e}function safescript(id,call,seconds,times,timeoutcall,endcall,index){seconds=seconds||1e3,times=times||0;var checked=!0;try{"function"==typeof call?call():eval(call)}catch(e){checked=!1}if(checked)try{index=(index||1)-1,safescripts[id][index].si&&clearInterval(safescripts[id][index].si),"function"==typeof endcall?endcall():eval(endcall)}catch(e){}else safescripts[id]&&index?(index=(index||1)-1,safescripts[id][index].times++,safescripts[id][index].times>=times&&(clearInterval(safescripts[id][index].si),"function"==typeof timeoutcall?timeoutcall():eval(timeoutcall))):(safescripts[id]=safescripts[id]||[],safescripts[id].push({times:0,si:setInterval(function(){safescript(id,call,seconds,times,timeoutcall,endcall,safescripts[id].length)},seconds)}))}function appendscript(e,t,n,s){var a=hash(e+t);if(n||!in_array(a,evalscripts)){n&&$(a)&&$(a).parentNode.removeChild($(a)),evalscripts.push(a);var i=document.createElement("script");i.type="text/javascript",i.id=a,i.charset=s?s:BROWSER.firefox?document.characterSet:document.charset;try{e?(i.src=e,i.onloadDone=!1,i.onload=function(){i.onloadDone=!0,JSLOADED[e]=1},i.onreadystatechange=function(){"loaded"!=i.readyState&&"complete"!=i.readyState||i.onloadDone||(i.onloadDone=!0,JSLOADED[e]=1)}):t&&(i.text=t),document.getElementsByTagName("head")[0].appendChild(i)}catch(o){}}}function hash(e,t){var t=t?t:32,n=0,s=0,a="";for(filllen=t-e.length%t,s=0;filllen>s;s++)e+="0";for(;n<e.length;)a=stringxor(a,e.substr(n,t)),n+=t;return a}function RndNum(e){for(var t="",n=0;e>n;n++)t+=Math.floor(10*Math.random());return t}function stringxor(e,t){for(var n="",s="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",a=Math.max(e.length,t.length),i=0;a>i;i++){var o=e.charCodeAt(i)^t.charCodeAt(i);n+=s.charAt(o%52)}return n}function hasbtnDolig(e,t,n){var s="";s='<div class="dolig-cont"><p class="tit">'+t+'</p><p class="btn-box"><span class="btn1">取消</span><span class="btn2">确定</span></p></div>',e.html(s),e.show(),$(".dolig-cont").one("click","span.btn1",function(){e.hide()}),$(".dolig-cont").one("click","span.btn2",function(){n()})}$(document).bind("mobileinit",function(){$.mobile.ajaxEnabled=!1}),function(e){e.fn.scrollToTop=function(t){var n={speed:800};return t&&e.extend(n,{speed:t}),this.each(function(){var t=e(this);e(window).scroll(function(){100<e(this).scrollTop()?t.fadeIn():t.fadeOut()}),t.click(function(t){t.preventDefault(),e("body, html").animate({scrollTop:0},n.speed)})})}}($);var countdown=60,tempfun,countdown1=60,tempfun1,shenceAjax={clkAjax:function(e,t){$.ajax({type:"post",url:e,data:t,success:function(){},error:function(){}})}};$.fn.animateCss=function(e,t){var n=function(e){var t={animation:"animationend",OAnimation:"oAnimationEnd",MozAnimation:"mozAnimationEnd",WebkitAnimation:"webkitAnimationEnd"};for(var n in t)if(void 0!==e.style[n])return t[n]}(document.createElement("div"));return this.addClass("animated "+e).one(n,function(){$(this).removeClass("animated "+e),"function"==typeof t&&t()}),this};var _is_app=localStorage.getItem("isapp");1==_is_app&&$("#footer-box").hide();var isapp=$("#isApp").val();1==isapp&&(localStorage.setItem("isapp","1"),$("#footer-box").hide());
;/*!common:widget/common/adpop/adpop.js*/
define("common.widget.common.adpop.adpop",function(){var a=$(".js-ad-pop");a.on("click","a",function(){var a=$(this).attr("href"),t=$(this).attr("data-adpage"),c=$(this).attr("data-adpageen");$.ajax({type:"post",dataType:"json",url:"/com/statistics/cm-click",data:{clk_page_uri:t,clk_target_url:a,clk_item_index:1,clk_name_en:c}})})});
;/*!common:widget/common/authentication/face.js*/
define("common.widget.common.authentication.face", function (require, exports, module) {
    $('.camera-input').change(function (event) {
        record(event)
    })
    $('.face-title img').click(function () {
        $('.face-contont').hide()
        $('.realname-contont').show()
        $('#face-setp1').show()
        $('#face-setp2').hide()
        $('#face-setp3').hide()
        $('.camera-input').show()
        $('.camera-input').css('opacity',0)

    })
    $('.btn-close').click(function () {
        $('#face-box').hide()
    })
    $('.btn-rn').click(function () {
        var certNo = $('#certNo-input').val()
        var realName = $('#realName-input').val()
        if(certNo && realName){
            if(face_verifyRequired==1){
                $('.face-contont').show()
                $('.realname-contont').hide()
            }else{
                faceinfo()
            }
            
        }else{
            showToast('请输入姓名和身份证号', 1000)
        }
    })
    function faceinfo(){
        var certNo = $('#certNo-input').val()
        var realName = $('#realName-input').val()
        $.ajax({
            type: "post",
            url: "/user/maintenance/save-cert-info",
            data: {
                "certno": certNo,
                "realname": realName,
            },
            dataType: "json",
            success: function (data) {
                if (data.errcode == 0) {
                    showToast(data.msg, 2000)
                    $('#face-box').hide()
                    face_callback(face_evetn)
                } else {
                    showToast(data.msg, 2000)
                }
            }
        });
    }
    function record(event) {
        const files = event.target.files;
        if (files && files.length > 0) {
            let file = files[0];
            if (file.size > 9 * 1024 * 1024) {
                showToast('视频大小不得超过9M，请录制1-3秒');
                return;
            }
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.addEventListener('loadend', function () {
                $('#face-setp1').hide()
                $('#face-setp2').show()
                $('#face-setp3').hide()
                upload(reader.result.split(',')[1])
            })
        }
        else {
            showToast('请重新上传视频');
        }
    }
    var prePageError;
    function upload(file) {
        var certNo = $('#certNo-input').val()
        var realName = $('#realName-input').val()
        $.ajax({
            type: "post",
            url: "/user/face-recognition/verify",
            data: {
                "verifyType": face_verifyType,
                "certNo": certNo,
                "realName": realName,
                "video": file
            },
            dataType: "json",
            success: function (data) {
                if (data.errcode == 0) {
                    showToast('验证成功', 2000)
                    $('#face-box').hide()
                    face_callback(face_evetn)
                } else {
                    $('#face-setp2').hide()
                    $('#face-setp3').show()
                    $('.surplus-number').html(data.data.leftTimes)
                    $('.face-error-msg').html(data.msg)
                    prePageError = data.data.prePageError
                    if (data.data.prePageError == 1) {
                        $('.camera-input').hide()
                    }
                }
            }
        });
    }
    $('.fail-again-btn').click(function () {
        if (prePageError == 1) {
            $('#face-setp1').show()
            $('#face-setp2').hide()
            $('#face-setp3').hide()
            $('.face-contont').hide()
            $('.realname-contont').show()
            $('.camera-input').show()
            $('.camera-input').css('opacity',0)
        }
    })


})
;/*!common:widget/common/bottomSelectModal/script.js*/
define("common.widget.common.bottomSelectModal.script", function () {
  var successCallBack = null
  var select_option_list = []
  var option_keyMap = { id: "id", value: "value", childs:"childs" }
  $(function () {
    $(".bottomSelectModal .heder-bar .closeBtn").on("click",function(){
      closeModal()
    })

    $(".bottomSelectModal .maskBg").on("click",function(ev){
      closeModal()
      ev.stopPropagation();
    })

    //选项选择处理
    $(".bottomSelectModal").on("click",".select-item",function(){
      //防止重复点击
      if($(this).hasClass("select-active")){
        return;
      }

      $(this).siblings(".select-active").removeClass("select-active")
      $(this).addClass("select-active")

      //!:移除掉其他未选的子级选项 
      $(".bottomSelectModal .content-area").each(function () {
        let item_id = $(this).attr("data-parent-id")
        if (item_id == 0) {
          return
        }
        if (!$(".select-item[data-item-id='" + item_id + "']").hasClass("select-active")) {
          $(this).remove()
        }
      })


      //!:渲染子级选项
      let curItemData = JSON.parse($(this).find(".item-data").html())
      if (typeof curItemData[option_keyMap["childs"]] != undefined && typeof curItemData[option_keyMap["childs"]] != "undefined"){
        let childsList = curItemData[option_keyMap["childs"]]
        renderSelectItem(childsList.data, childsList.title, $(this).attr("data-Item-id"), childsList.model || '', typeof childsList.required != "undefined" ? childsList.required : true)
      }
      
      
      if($(".bottomSelectModal .select-item").hasClass("select-active")==true){
        $(".bottomSelectModal .confirm-Btn").removeAttr("disabled")
      }
    })


    //星星选择
    $(".bottomSelectModal").on("click", ".select-star-item", function () {
      if (typeof($(this).attr("disabled")) != "undefined"){
        return
      }
      let curIndex = $(this).index()
      renderActiveStar($(this).parent(".area-select"),curIndex)
    })




    //确定选择
   
    $(".bottomSelectModal").on("click",".confirm-Btn",function(){
        var activeItemList = []
        var activeItemId=[]
        let checkout = true
        if (typeof ($(this).attr("disabled")) != "undefined"){
          return
        }
        
        
        $(".bottomSelectModal .content-area").each(function(){
          $(this).find(".area-title .msg").text("此项必选")
          if ($(this).attr("data-required") == "true" ){
            if ($(this).attr("data-model") == "star"){
              if ($(this).find(".select-star-item[data-check=true]").length == 0 && $(this).find(".select-star-item").length!=0) {
                $(this).find(".area-title .msg").show()
                checkout = false
                return false
              }else{
                let min_num = Number($(this).find(".inputStarBox .inputStar").attr("data-min"))
                let max_num = Number($(this).find(".inputStarBox .inputStar").attr("data-max"))
                let inputValue = parseInt($(this).find(".inputStarBox .inputStar").val())
                if (inputValue == 0 || inputValue == "") {
                  $(this).find(".area-title .msg").show()
                  checkout = false
                  return false
                } else if (inputValue < min_num || inputValue > max_num){
                  checkout = false
                  $(this).find(".area-title .msg").text("请输入" + min_num + "~" + max_num + "范围类的数值")
                  $(this).find(".area-title .msg").show()
                  return false
                }
              }
            }else{
              if ($(this).find(".select-item.select-active").length == 0) {
                $(this).find(".area-title .msg").show()
                checkout = false
                return false
              }

            }
          
            checkout = true
            $(this).find(".area-title .msg").hide()
          }else{
            checkout = true
            $(this).find(".area-title .msg").hide()
          }
        
        })


        $(".bottomSelectModal .select-item.select-active").each(function(){
          activeItemList.push(JSON.parse($(this).find(".item-data").html()))
          activeItemId.push($(this).attr("data-item-id"))
        })

        
        //星级数据
        if ($(".select-star-item[data-check=true]").length>0){
          let el = $(".select-star-item[data-check=true]")
          let starGrade = el.find(".item-data").html()
          activeItemList.push(JSON.parse(starGrade))
          activeItemId.push(el.attr("data-item-id"))
        }

        //输入型 星星数量
        let customStar = $(".inputStarBox .inputStar").val()
        if (customStar != "undefined" && customStar != "" && customStar != undefined) {
          activeItemId.push("customStar-"+customStar)
          activeItemList.push({[option_keyMap["id"]]: customStar, [option_keyMap["value"]]: customStar+"星" })
        }


        if (checkout == true){
          closeModal()
          successCallBack && successCallBack({ activeItemId, activeItemList })
        }
    })

    $(document).on("input propertychange", ".inputStarBox .inputStar",function(){
      let min_num = parseInt($(this).attr("data-min"))
      let max_num = parseInt($(this).attr("data-max"))
      let curVal = parseInt($(this).val())
      $(this).val(curVal)
      if (min_num == max_num){
        $(this).val(max_num)
      } else if (curVal>max_num){
        $(this).val(max_num)
      } else if (curVal < 0){
        $(this).val(min_num)
      }
    })
  })



  

 
  function showSelectModal({ itemList, title, activeItem, keyMap=null,success=null}){
    if (itemList == [] || !itemList.data){
      return
    }
    successCallBack = success
    select_option_list = itemList.data
    option_keyMap = keyMap == null ? { id: "id", value: "value", childs: "childs" } : keyMap

    $(".bottomSelectModal .heder-bar .title").text("请选择"+title)
    $(".bottomSelectModal .modal-content").html('')
    
    renderSelectItem(itemList.data, itemList.title, 0, itemList.model || '', typeof itemList.required != "undefined" ? itemList.required :  true)

    if(activeItem.length==0){
      $(".bottomSelectModal .confirm-Btn").attr("disabled", "")
    }
    showModal()
    renderActiveItem(activeItem)
  }
  

   //渲染选择项
  function renderSelectItem(list, title, parentId, model, required){
    if (!Array.isArray(list)){
      return
    }
     var html = $(".bottomSelectModal .modal-content").html()
     var select_item = ''

    if (model == "star") { //模式为star用星星来表示
      let min_star = parseInt(list[0][option_keyMap["value"]])
      let max_star = parseInt(list[list.length - 1][option_keyMap["value"]])
      let star_num = min_star == 0 ? list.length - 1 : list.length
      if (max_star > 5) { // 星级数量超过5颗时用输入框来表示
        select_item += `
          <div class="inputStarBox">
            <span class="star-Icon"></span>
            <input class="inputStar" placeholder="请输入" value="${min_star}" type="number" data-min="${min_star}" data-max="${max_star}" />
            <sapn>个</span>
          </div>
        `
      } else {//模式为star 数量不超过5颗时 使用星星 来表示等级 
        
        list.forEach((item,index)=>{
          if (parseInt(item[option_keyMap["value"]])==0)return;
          select_item += `
                <span class="select-star-item" data-Item-id="item-${parentId}-${index}">
                  <div style="display:none" class="item-data">${JSON.stringify(item)}</div>
                </span>
              `
        })

        let tmp=""
        let min_star = parseInt(list[0][option_keyMap["value"]])
        for (i = 1; i < min_star;i++){
          tmp += `<span class="select-star-item select-star-active" disabled></span>`
        }
        select_item = tmp + select_item 
      }
    }else{
      list.forEach((item, index) => {
        let activeClass = ""
        if (item[option_keyMap["value"]] == "默认服") {
          activeClass = "select-active"
        }
        select_item += `
          <span class="select-item ${activeClass}"   data-Item-id="item-${parentId}-${index}" style="${list.length > 4 ? '' : 'width: calc(calc(100% / 3) - 0.1rem);'}">
            ${item[option_keyMap["value"]]}
            <div style="display:none" class="item-data">${JSON.stringify(item)}</div>
          </span>
        `
      })
    }

    
     var tpl = `
      <div class="content-area" data-parent-id="${parentId}" data-required = ${required} data-model="${model}">
        <div class="area-title">${title} <sapn class="msg">此项必选</sapn></div>
        <div class="area-select">
          ${select_item}
        </div>
      </div>
     `
     html += tpl
     $(".bottomSelectModal .modal-content").html(html)
   }



   //星星等级渲染
  function renderActiveStar(obj,num){
    let totalNum = $(obj).find(".select-star-item").length
    if ($(obj).find(".select-star-item").eq(num).attr("data-check")=="true"){
      $(obj).find(".select-star-item").removeClass("select-star-active")
      $(obj).find(".select-star-item[disabled]").addClass("select-star-active")
      $(obj).find(".select-star-item").attr("data-check", false)
    }else{
      $(obj).find(".select-star-item").attr("data-check", false)
      $(obj).find(".select-star-item").eq(num).attr("data-check", true)
      for (let i = 0; i < totalNum; i++) {
        if (i <= num) {
          $(obj).find(".select-star-item").eq(i).addClass("select-star-active")
        } else {
          $(obj).find(".select-star-item").eq(i).removeClass("select-star-active")
        }
      }    
    }

    
  } 

  //已选项回显
  function renderActiveItem(items) {
    items.forEach((item, index) => {
      let query = ".select-item[data-item-id='" + item + "']"
      
      //星形等级回显
      let starIndex = $(".select-star-item[data-item-id='" + item + "']").index()
      renderActiveStar($(".select-star-item[data-item-id='" + item + "']").parent(".area-select"),starIndex)


      //输入框自定义数量内容回显
      if (item.indexOf("customStar")!=-1){
        let arr = item.split("-")
        $(".inputStarBox .inputStar").val(arr[1])
      }
      


      $(query).addClass("select-active")
      let childsText=$(query).find(".item-data").html()
      if (childsText!=""){
        let objJson =  JSON.parse(childsText)
        if (objJson!=null && typeof objJson[option_keyMap["childs"]] != undefined && typeof objJson[option_keyMap["childs"]] != "undefined"){
          let childsList = objJson[option_keyMap["childs"]]
          renderSelectItem(childsList.data, childsList.title, item, childsList.model || '', typeof childsList.required != "undefined" ? childsList.required : true)
        }
      }
      
    })
  }

 

  //关闭底部选择框
  function closeModal(){
    $(".bottomModal").animate({ height: 0 }, function () {
      $(".bottomSelectModal .maskBg").hide()
      $(".bottomSelectModal").hide()
      $("html,body").css("overflow-y", "auto")
    })
  }
  
  //打开底部选择框
  function showModal(){
    $("html,body").css("overflow-y","hidden")
    $(".bottomSelectModal").show()
    $(".bottomSelectModal .maskBg").show()
    $(".bottomModal").animate({ height: "80%" })
  }

  return { showSelectModal}
})
;/*!common:widget/common/couponpop/couponpop.js*/
define("common.widget.common.couponpop.couponpop",function(){function o(){$.ajax({type:"get",dataType:"json",url:"/indexpage/index/set-hide-coupon",async:!0,success:function(){c.hide(),window.location.href="/user/coupon/index"}})}var n=$("#js-close"),c=$("#js-coupon-wrap"),e=$("#js-check-btn"),i=$("#js-isshow").val(),s=$("#js-return-url").val();n.on("click",function(){0==i?(c.hide(),console.log(s+"$returnUrl"),window.location.href=s):o()}),e.on("click",function(){o()})});
;/*!common:widget/common/couponpopget/couponpopget.js*/
define("common.widget.common.couponpopget.couponpopget",function(){var o=$("#js-close"),n=$("#js-coupon-wrap"),c=$("#js-check-btn"),e=($("#js-isshow").val(),$("#js-return-url").val());o.on("click",function(){n.hide(),console.log(e+"$returnUrl"),window.location.href=e}),c.on("click",function(){n.hide(),window.location.href="/user/coupon/index"})});
;/*!common:widget/common/download/download.js*/
define("common.widget.common.download.download",function(){function o(o){for(var d=o+"=",e=document.cookie.split(";"),a=0;a<e.length;a++){var n=e[a].trim();if(0==n.indexOf(d))return n.substring(d.length,n.length)}return""}$(function(){var d=o("iscloseApp");1==d?($(".download-app").hide(),$(".header").removeClass("download"),$("#search_keyword").removeClass("download"),$(".search_keyword_height").removeClass("download")):($(".download-app").show(),$(".header").addClass("download"),$("#search_keyword").addClass("download"),$(".search_keyword_height").addClass("download"))}),$(".download-app .cancel-img").on("click",function(){document.cookie="iscloseApp=1",$(".download-app").hide(),$(".header").removeClass("download"),$("#search_keyword").removeClass("download"),$(".search_keyword_height").removeClass("download")})});
;/*!common:widget/common/friendlink/friendlink.js*/
define("common.widget.common.friendlink.friendlink",function(){function n(){var t=$("#js-friendlink-box").children().length,a=(t+1)*e;i.css({width:a,transform:"translateX(0px)"}),t>4&&i.animate({translateX:-(t-4)*e+"px"},3e3*(t-4),"linear",function(){n()})}var i=$("#js-friendlink-box"),e=$("#js-friendlink-box").children().eq(0).width();n();var t=$("#js-friendlink-box");t.on("click","a",function(){var n=$(this).attr("data-id");$.ajax({url:"/com/friendlink?id="+n,type:"get",dataType:"json",success:function(){}})})});
;/*!common:widget/common/index-adv/clipboard.min.js*/
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.ClipboardJS=e():t.ClipboardJS=e()}(this,function(){return function(t){function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}var n={};return e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:r})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(e.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var o in t)e.d(r,o,function(e){return t[e]}.bind(null,o));return r},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="",e(e.s=0)}([function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}function o(t,e){var n="data-clipboard-"+t;return e.hasAttribute(n)?e.getAttribute(n):void 0}var i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},a=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),u=r(n(1)),c=r(n(3)),l=r(n(4)),s=function(){function t(e,n){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t);var r=function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return r.resolveOptions(n),r.listenClick(e),r}return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(t,c.default),a(t,[{key:"resolveOptions",value:function(){var t=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};this.action="function"==typeof t.action?t.action:this.defaultAction,this.target="function"==typeof t.target?t.target:this.defaultTarget,this.text="function"==typeof t.text?t.text:this.defaultText,this.container="object"===i(t.container)?t.container:document.body}},{key:"listenClick",value:function(t){var e=this;this.listener=l.default(t,"click",function(t){return e.onClick(t)})}},{key:"onClick",value:function(t){var e=t.delegateTarget||t.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new u.default({action:this.action(e),target:this.target(e),text:this.text(e),container:this.container,trigger:e,emitter:this})}},{key:"defaultAction",value:function(t){return o("action",t)}},{key:"defaultTarget",value:function(t){var e=o("target",t);return e?document.querySelector(e):void 0}},{key:"defaultText",value:function(t){return o("text",t)}},{key:"destroy",value:function(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}],[{key:"isSupported",value:function(){var t=0<arguments.length&&void 0!==arguments[0]?arguments[0]:["copy","cut"],e="string"==typeof t?[t]:t,n=!!document.queryCommandSupported;return e.forEach(function(t){n=n&&!!document.queryCommandSupported(t)}),n}}]),t}();t.exports=s},function(t,e,n){"use strict";var r,o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},i=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),a=n(2),u=(r=a)&&r.__esModule?r:{"default":r},c=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.resolveOptions(e),this.initSelection()}return i(t,[{key:"resolveOptions",value:function(){var t=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};this.action=t.action,this.container=t.container,this.emitter=t.emitter,this.target=t.target,this.text=t.text,this.trigger=t.trigger,this.selectedText=""}},{key:"initSelection",value:function(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"selectFake",value:function(){var t=this,e="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandlerCallback=function(){return t.removeFake()},this.fakeHandler=this.container.addEventListener("click",this.fakeHandlerCallback)||!0,this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[e?"right":"left"]="-9999px";var n=window.pageYOffset||document.documentElement.scrollTop;this.fakeElem.style.top=n+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,this.container.appendChild(this.fakeElem),this.selectedText=u.default(this.fakeElem),this.copyText()}},{key:"removeFake",value:function(){this.fakeHandler&&(this.container.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(this.container.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function(){this.selectedText=u.default(this.target),this.copyText()}},{key:"copyText",value:function(){var t=void 0;try{t=document.execCommand(this.action)}catch(e){t=!1}this.handleResult(t)}},{key:"handleResult",value:function(t){this.emitter.emit(t?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function(){this.trigger&&this.trigger.focus(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function(){this.removeFake()}},{key:"action",set:function(){var t=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=t,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function(){return this._action}},{key:"target",set:function(t){if(void 0!==t){if(!t||"object"!==(void 0===t?"undefined":o(t))||1!==t.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&t.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(t.hasAttribute("readonly")||t.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=t}},get:function(){return this._target}}]),t}();t.exports=c},function(t){t.exports=function(t){var e;if("SELECT"===t.nodeName)t.focus(),e=t.value;else if("INPUT"===t.nodeName||"TEXTAREA"===t.nodeName){var n=t.hasAttribute("readonly");n||t.setAttribute("readonly",""),t.select(),t.setSelectionRange(0,t.value.length),n||t.removeAttribute("readonly"),e=t.value}else{t.hasAttribute("contenteditable")&&t.focus();var r=window.getSelection(),o=document.createRange();o.selectNodeContents(t),r.removeAllRanges(),r.addRange(o),e=r.toString()}return e}},function(t){function e(){}e.prototype={on:function(t,e,n){var r=this.e||(this.e={});return(r[t]||(r[t]=[])).push({fn:e,ctx:n}),this},once:function(t,e,n){function r(){o.off(t,r),e.apply(n,arguments)}var o=this;return r._=e,this.on(t,r,n)},emit:function(t){for(var e=[].slice.call(arguments,1),n=((this.e||(this.e={}))[t]||[]).slice(),r=0,o=n.length;o>r;r++)n[r].fn.apply(n[r].ctx,e);return this},off:function(t,e){var n=this.e||(this.e={}),r=n[t],o=[];if(r&&e)for(var i=0,a=r.length;a>i;i++)r[i].fn!==e&&r[i].fn._!==e&&o.push(r[i]);return o.length?n[t]=o:delete n[t],this}},t.exports=e},function(t,e,n){var r=n(5),o=n(6);t.exports=function(t,e,n){if(!t&&!e&&!n)throw new Error("Missing required arguments");if(!r.string(e))throw new TypeError("Second argument must be a String");if(!r.fn(n))throw new TypeError("Third argument must be a Function");if(r.node(t))return d=e,h=n,(f=t).addEventListener(d,h),{destroy:function(){f.removeEventListener(d,h)}};if(r.nodeList(t))return c=t,l=e,s=n,Array.prototype.forEach.call(c,function(t){t.addEventListener(l,s)}),{destroy:function(){Array.prototype.forEach.call(c,function(t){t.removeEventListener(l,s)})}};if(r.string(t))return i=t,a=e,u=n,o(document.body,i,a,u);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList");var i,a,u,c,l,s,f,d,h}},function(t,e){e.node=function(t){return void 0!==t&&t instanceof HTMLElement&&1===t.nodeType},e.nodeList=function(t){var n=Object.prototype.toString.call(t);return void 0!==t&&("[object NodeList]"===n||"[object HTMLCollection]"===n)&&"length"in t&&(0===t.length||e.node(t[0]))},e.string=function(t){return"string"==typeof t||t instanceof String},e.fn=function(t){return"[object Function]"===Object.prototype.toString.call(t)}},function(t,e,n){function r(t,e,n,r,i){var a=function(t,e,n,r){return function(n){n.delegateTarget=o(n.target,e),n.delegateTarget&&r.call(t,n)}}.apply(this,arguments);return t.addEventListener(n,a,i),{destroy:function(){t.removeEventListener(n,a,i)}}}var o=n(7);t.exports=function(t,e,n,o,i){return"function"==typeof t.addEventListener?r.apply(null,arguments):"function"==typeof n?r.bind(null,document).apply(null,arguments):("string"==typeof t&&(t=document.querySelectorAll(t)),Array.prototype.map.call(t,function(t){return r(t,e,n,o,i)}))}},function(t){if("undefined"!=typeof Element&&!Element.prototype.matches){var e=Element.prototype;e.matches=e.matchesSelector||e.mozMatchesSelector||e.msMatchesSelector||e.oMatchesSelector||e.webkitMatchesSelector}t.exports=function(t,e){for(;t&&9!==t.nodeType;){if("function"==typeof t.matches&&t.matches(e))return t;t=t.parentNode}}}])});
;/*!common:widget/common/index-adv/index-adv.js*/
define("common.widget.common.indexadv.indexadv",function(){function e(e){for(var n=e+"=",i=document.cookie.split(";"),o=0;o<i.length;o++){var t=i[o].trim();if(0==t.indexOf(n))return t.substring(n.length,t.length)}return""}var n=localStorage.getItem("isapp"),i=$(".js-index-ad-popbox"),o="#js-index-ad-closeBtn",t=e("iscloseIndexad");1==t||1==n?i.hide():(i.show(),i.animate({opacity:1},2e3)),i.on("click",o,function(){document.cookie="iscloseIndexad=1",i.hide()}),$("#index-box").on("click",function(){$(this).hide()});var a=$("#js-index-ad-btn");a.on("click",function(){var e=$(this).attr("href"),n=$(this).attr("data-adpageen"),i={eventName:"recommendation_click",properties:{click_target_url:e,click_item_index:"0",click_name_en:n,click_name_zh:"H5-首页弹框广告",content_theme:a.find("img").attr("alt")},eventType:"WebClick"};console.log(i),sc.send(i)});var c=navigator.userAgent,r=(navigator.appVersion,c.indexOf("Android")>-1||c.indexOf("Linux")>-1),s=!!c.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);r&&$("#AndBox").show(),s&&$("#iosBox").show(),$(".copy-btn").click(function(e){e&&e.stopPropagation?e.stopPropagation():window.event.cancelBubble=!0;var n=new ClipboardJS("#codeBtn");n.on("success",function(){}),alert("复制成功"),$(".modleBox").hide()}),$(".safari-btn").click(function(){$("#index-box").hide(),!/Safari/.test(navigator.userAgent)||/Chrome/.test(navigator.userAgent)||/Baidu/.test(navigator.userAgent)||/QQBrowser/.test(navigator.userAgent)?$(".modleBox").show():($(".modleBox").hide(),$("#desktop-safari").show())}),$(".closeBtn-safari").click(function(){$("#desktop-safari").hide()}),$(function(){$("#iosBox").click(function(e){e.stopPropagation()})})});
;/*!common:widget/common/realName/realName.js*/
define("common.widget.common.realName.realName",function(){function e(){$("#popMessage ").hide()}function a(a){n&&clearTimeout(n),$("#popMessage").show(),$("#popMessage .pop-val").text(a),n=setTimeout(e,2e3)}$(".real-btn").click(function(){$(".real-btn").attr("disabled","ture");const e=$(".real-name").val(),n=$(".real-num").val();$.ajax({type:"POST",dataType:"json",url:"/user/maintenance/save-cert-info",data:{realname:e,certno:n},success:function(e){$(".real-btn").removeAttr("disabled"),0==e.errcode?(a("认证成功"),$(".shade-xy").hide()):a(e.msg)},error:function(e){console.log("fail",e),$(".real-btn").removeAttr("disabled")}})}),$(".close-btn").click(function(){$(".shade-xy").hide()});var n=0});
;/*!common:widget/common/sdk/sdkad.js*/
define("common.widget.common.sdk.sdkad",function(){var e=$(".js-sdkad-btn");e.on("click",function(){var a=$(this).find(".js-url").val(),n=$(this).attr("data-adpagezh");adpage_en=$(this).attr("data-adpageen");var t={eventName:"recommendation_click",properties:{click_target_url:a,click_item_index:"0",click_name_en:adpage_en,click_name_zh:"H5-"+n,content_theme:e.find("a").find("img").attr("alt")},eventType:"WebClick"};sc.send(t)})});
;/*!common:widget/common/topNew/topNew_peiwan.js*/
define("common.widget.common.topNew.topNew_peiwan",function(){function e(){$.ajax({url:"/peiwan/index/ajax-msg-count",type:"get",dataType:"json",success:function(e){e.count>0?($(".header-message-i").text(e.count),$(".header-message-i").show()):$(".header-message-i").hide()},error:function(){console.log("peiwan-msg-count:ajax error ")}})}$(document).ready(function(){console.log("page is loaded"),e()})});
;/*!common:widget/common/topNew/topNew_toppic.js*/
define("common.widget.common.topNew.topNew_toppic",function(){var o=document.referrer;console.log(o),o.indexOf("/siteauth/auth/login")>=0?$(".back").attr("href","javascript:history.go(-2)"):$(".back").attr("href","javascript:history.go(-1)")});
;/*!common:widget/common/topNew/topNew.js*/
define("common.widget.common.topNew.topNew",function(){var i=localStorage.getItem("isapp");1==i&&($("#header_app").hide(),$(".p-goodslist-filter-menu").attr("id","isapp_list"),$(".division").attr("id","app_division"),$(".division1").attr("id","app_division1"),$(".p-goodslist-filter-specialsearch-menu").attr("id","p-goodslist-filter-specialsearch-menu"))});