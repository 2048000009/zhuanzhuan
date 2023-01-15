var sch = "http://";
if (window.location.protocol == "https:") {
    sch = "https://";
}

var DoAdv = {
    adArr: [
        'http://cf.qq.com/main.shtml',
        'http://dnf.qq.com/main.shtml',
        'http://lol.qq.com/'
    ],

    env: '?17.0',

    regArr: [
        'https://ffb.feihuo.com/welcome',
        'http://dnf.qq.com',
        'http://cf.qq.com',
        'http://nz.qq.com',
        'http://tfol.qq.com',
        'http://nfsol.qq.com',
        'http://x5.qq.com',
        'http://speed.qq.com'
    ],

    ajaxUrl: sch + "ffb.feihuo.com/adviertiseNew/getAd",

    commonAjaxUrl: sch + "ffb.feihuo.com/adviertiseNew/getCommonAd",
    // commonAjaxUrl : sch + "dev.ffb.feihuo.com/adviertiseNew/getCommonAd", //本地开发环境
    // commonAjaxUrl : sch + "test.daohang.feihuo.com/browser/adviertiseNew/getCommonAd", // 测试环境



    statUrl: sch + 'img.feihuo.com/browser/browser/plugins/fhadv_new/',
    // statUrl : sch + 'dev.stc.ffb.feihuo.com/browser/plugins/fhadv_new/', //本地开发环境
    // statUrl : sch + 'test.stc.ffb.feihuo.com/browser/plugins/fhadv_new/',// 测试环境

    init: function() {
        DoAdv.loadJs();
    },

    hex2asc: function(str) {
        var arr = str.split("\\x");
        str = arr.join('');
        var len = str.length;
        var data = '';
        var s = '';
        for (var i = 0; i < len; i += 2) {
            s = str.substr(i, 2);
            s = parseInt(s, 16);
            data += String.fromCharCode(s);
        }
        return data;
    },

    getQqByOid: function(oid) {
        var num = oid.substr(0, 2);
        var left = oid.substr(2, oid.length - 2);
        num = DoAdv.hex2asc(num);
        var len = left.length;
        oid = num;

        var s = '';
        for (i = 0; i <= (len - 2); i += 2) {
            s = left.substr(i, 2);
            s = parseInt(s, 16);
            oid += num ^ s;
        }

        return oid;
    },

    /*
     *  data数组  数组里每个对象固定元素title,link,gameid,adPos
     *  type  1: pv  2: click
     */
    reportLog: function(data, type) {

        if (data.length <= 0 || !type) {
            return false;
        }

        var typeName = '';
        if (type === 2) {
            typeName = 'click';
        } else {
            typeName = 'pv';
        }

        //上报数据部log
        var param = [];
        //上报自己的log
        var par = [];
        var curTime = (new Date()).getTime().toString();
        curTime = parseInt(curTime.substr(0, 10));

        var channel = '';
        var netbar = '';
        var user_id = '';
        var mac_address = '';
        if (typeof window.external.ExtMessage === 'function') {
            var infos = window.external.ExtMessage("getclientinfo", "");
            infos = jQuery.parseJSON(infos);
            if (typeof infos !== 'undefined' && infos != null) {
                channel = infos.oem;
                netbar = infos.nbid;
                user_id = DoAdv.getQqByOid(infos.oid);

            }
        }

        jQuery.each(data, function(k, v) {
            if (!v.title || !v.adPos) {
                return true;
            }
            param.push({
                "id": 1319,
                "start_time": curTime,
                "parameters": {
                    "type": type,
                    "project": 1, //1 浏览器 2 新闻首页
                    "ad_name": v.title,
                    "ad_link": v.link,
                    "ad_gid": Number(v.gameid),
                    "ad_pos": v.adPos,
                    "netbar": netbar,
                    "user_id": user_id,
                    "mac": mac_address
                }
            });
            par.push({
                "event_id": type,
                "event": typeName,
                "channel": channel,
                "n1": 1,
                "v5": v.title,
                "v6": v.link,
                "n2": Number(v.gameid),
                "v7": v.adPos
            });
        });

        if (param.length <= 0 || par.length <= 0) {
            return false;
        }

        var args = {
            "app_id": "210_21",
            "events": param
        };

        jQuery.ajax({
            type: "POST",
            'url': window.location.protocol + '//ykdc.hzyoka.com/bfrd/json',
            data: JSON.stringify(args),
            dataType: 'json',
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });

        var arg = {
            "app_id": 21,
            "ver": "3.0",
            "events": par
        };

        var logUrl = 'https://logs.feihuo.com';

        if (sch === 'http://') {
            logUrl = 'http://logs.v.feihuo.com';
        }
        jQuery.ajax({
            type: "POST",
            'url': logUrl,
            data: JSON.stringify(arg),
            dataType: 'json',
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
    },

    bindEvent: function(line, data, link, gid) {
        jQuery('body').undelegate(line, 'click');
        jQuery('body').delegate(line, 'click', function() {

            DoAdv.reportLog(data, 2);

            var gameID = Number(gid);

            if (typeof window.external.ExtStartLocalGame !== 'function') {
                window.open(link);
            } else if (!window.external.ExtStartLocalGame(gameID)) {
                window.open(link);
            }
        });
    },

    loadJs: function(type) {

        var src_suffix = "";
        var url = window.location.href;
        if (jQuery.inArray(url, DoAdv.adArr) >= 0 || (url.indexOf(DoAdv.adArr[0]) != -1)) {
            var host = window.location.host;
            var arr = host.split('.');
            src_suffix += arr[0];
        } else {
            jQuery.each(DoAdv.regArr, function(k, v) {
                if (url.indexOf(v) != -1) {
                    if (k == 0) {
                        src_suffix += "newtab";
                    } else {
                        src_suffix += "qq";
                    }
                }
            });
        }

        if (src_suffix !== "") {
            var src = this.statUrl + "adv_" + src_suffix + ".js" + this.env;
            var cHref = this.statUrl + "adv_common.css" + this.env;
            var href = this.statUrl + "adv_" + src_suffix + ".css" + this.env;

            if (typeof type != 'undefined') {
                src += '&type=' + type;
                if (type == 0) {
                    src += '&_=' + ~(new Date());
                }
            }

            //load common cs
            if (jQuery('#Css_common').length <= 0) {
                var oCss = document.createElement("link");
                oCss.setAttribute("rel", "stylesheet");
                oCss.setAttribute('id', 'Css_common');
                oCss.setAttribute("type", "text/css");
                oCss.setAttribute("href", cHref);
                document.getElementsByTagName('head')[0].appendChild(oCss);
            }

            if (jQuery('#Css_loader').length <= 0) {
                //load cs
                oCss = document.createElement("link");
                oCss.setAttribute("rel", "stylesheet");
                oCss.setAttribute('id', 'Css_loader');
                oCss.setAttribute("type", "text/css");
                oCss.setAttribute("href", href);
                document.getElementsByTagName('head')[0].appendChild(oCss);
            }

            if (jQuery('#Js_loader').length <= 0) {
                //load js
                var el = document.createElement('script');
                el.setAttribute('id', 'Js_loader');
                el.setAttribute('src', src);
                el.setAttribute('type', 'text/javascript');
                el.setAttribute('charset', 'utf-8');
                document.getElementsByTagName('head')[0].appendChild(el);
            }

        }

        //所有网址都引用
        if (jQuery('#Js_common').length <= 0) {
            src = this.statUrl + 'adv_common.js' + this.env;
            el = document.createElement('script');
            el.setAttribute('id', 'Js_common');
            el.setAttribute('src', src);
            el.setAttribute('type', 'text/javascript');
            el.setAttribute('charset', 'utf-8');
            document.getElementsByTagName('head')[0].appendChild(el);
        }
    }

};

//无需引用jquery
var DoNoJquery = {

    //跳转url
    ajaxUrl: sch + "ffb.feihuo.com/adviertiseNew/getJumpUrl",
    //搜索广告
    searchAjaxUrl: sch + "ffb.feihuo.com/adviertiseNew/getSearchAd",

    init: function() {
        DoNoJquery.loadJs();
    },

    loadJs: function() {

        //所有网址都引用  跳转url
        if (!document.getElementById('Js_jump')) {
            var src = DoAdv.statUrl + 'adv_jump_url.js' + DoAdv.env;
            var el = document.createElement('script');
            el.setAttribute('src', src);
            el.setAttribute('id', 'Js_jump');
            el.setAttribute('type', 'text/javascript');
            el.setAttribute('charset', 'utf-8');
            document.getElementsByTagName('head')[0].appendChild(el);
        }

        var url = window.location.href;
        if (url.indexOf('huya.com') != -1) {
            if (!document.getElementById('Js_huya')) {
                src = DoAdv.statUrl + 'adv_jump_huya.js' + DoAdv.env;
                el = document.createElement('script');
                el.setAttribute('src', src);
                el.setAttribute('id', 'Js_huya');
                el.setAttribute('type', 'text/javascript');
                el.setAttribute('charset', 'utf-8');
                document.getElementsByTagName('head')[0].appendChild(el);
            }
        }

        //所有网址都引用  搜索广告
        if (!document.getElementById('Js_search')) {
            src = DoAdv.statUrl + 'adv_search.js' + DoAdv.env;
            el = document.createElement('script');
            el.setAttribute('src', src);
            el.setAttribute('id', 'Js_search');
            el.setAttribute('type', 'text/javascript');
            el.setAttribute('charset', 'utf-8');
            document.getElementsByTagName('head')[0].appendChild(el);
        }
    }
};

DoNoJquery.init();

/*! jQuery v2.1.4 jquery.com */
//先判断网站是否引入jquery，没有则引入自己的jquery
var num = 0;
var jqueryIntv = setInterval(function() {
    num += 1;
    if (num > 10) {
        clearInterval(jqueryIntv);

        if (!document.getElementById('jq_loader')) {
            var el = document.createElement('script');
            el.setAttribute('id', 'jq_loader');
            el.setAttribute('src', sch + 'apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js');
            el.setAttribute('type', 'text/javascript');
            el.setAttribute('charset', 'utf-8');
            document.getElementsByTagName('head')[0].appendChild(el);
        }
        var intv = setInterval(function() {
            if (typeof jQuery === 'function') {
                clearInterval(intv);

                jQuery.noConflict();
                DoAdv.init();
            }
        }, 100);

    } else {
        if (typeof jQuery === 'function') {
            clearInterval(jqueryIntv);
            DoAdv.init();
        }
    }
}, 100);