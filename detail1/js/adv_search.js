(function() {

    function ajax(params) {
        params = params || {};
        params.data = params.data || {};
        var json = params.jsonp ? jsonp(params) : json(params);
        // jsonp请求
        function jsonp(params) {
            //创建script标签并加入到页面中
            var callbackName = params.jsonp;
            var head = document.getElementsByTagName('head')[0];
            // 设置传递给后台的回调参数名
            params.data['callback'] = callbackName;
            var data = formatParams(params.data);
            var script = document.createElement('script');
            head.appendChild(script);
            //创建jsonp回调函数
            window[callbackName] = function(json) {
                head.removeChild(script);
                clearTimeout(script.timer);
                window[callbackName] = null;
                params.success && params.success(json);
            };
            //发送请求
            script.src = params.url + '?' + data;
            //为了得知此次请求是否成功，设置超时处理
            if (params.time) {
                script.timer = setTimeout(function() {
                    window[callbackName] = null;
                    head.removeChild(script);
                    params.error && params.error({
                        message: '超时'
                    });
                }, time);
            }
        };
        //格式化参数
        function formatParams(data) {
            var arr = [];
            for (var name in data) {
                arr.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
            };
            // 添加一个随机数，防止缓存
            arr.push('v=' + random());
            return arr.join('&');
        }
        // 获取随机数
        function random() {
            return Math.floor(Math.random() * 10000 + 500);
        }
    }

    function contains(arr, obj) {
        var i = arr.length;
        while (i--) {
            if (arr[i] === obj) {
                return true;
            }
        }
        return false;
    }

    function iOffsetTop(elements) {
        var top = elements.offsetTop;
        var parent = elements.offsetParent;
        while (parent != null) {
            top += parent.offsetTop;
            parent = parent.offsetParent;
        }
        return top;
    }

    function iOffsetLeft(elements) {
        var left = elements.offsetLeft;
        var parent = elements.offsetParent;
        while (parent != null) {
            left += parent.offsetLeft;
            parent = parent.offsetParent;
        }
        return left;
    }

    var getUrlParam = function(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return (r[2]);
        return null;
    };

    function showSearchAd(res, wd) {

        //load cs
        var href = DoAdv.statUrl + "adv_search.css" + DoAdv.env;

        var oCss = document.createElement("link");
        oCss.setAttribute("rel", "stylesheet");
        oCss.setAttribute("type", "text/css");
        oCss.setAttribute("href", href);
        document.getElementsByTagName('head')[0].appendChild(oCss);
        //判断关键词是否等同后台配置
        for (var i = 0; i < res.length; i++) {
            var key_word = res[i]['key_word'];
            key_word = key_word.split(',');

            //等同则展示广告
            if (contains(key_word, wd)) {
                var elm = document.getElementById('content_right');

                if (!elm) {
                    return false;
                }

                // var elm = document.getElementsByClassName('relatedWrapperB');
                // elm = elm[0];
                var left = iOffsetLeft(elm);
                var top = iOffsetTop(elm);
                var width = elm.offsetWidth;
                var height = elm.offsetHeight;

                //写入div广告
                var html = document.createElement("div");
                html.className = "baidu_browser_fixed";
                html.style.left = '50%';
                html.style.marginLeft = '610px';
                html.style.top = '45px';
                html.style.height = height + 'px';

                html.innerHTML = '<div class="baidu_borwser_content_top"><img src="' + res[i]['pic'] + '" /></div>';
                html.innerHTML += '<p>' + res[i]['content'] + '</p>';
                html.innerHTML += '<ul>';
                html.innerHTML += '<li><a target="_blank" href="' + res[i]['link_1_url'] + '">' + res[i]['link_1_content'] + '</a></li>';
                html.innerHTML += '<li><a target="_blank" href="' + res[i]['link_2_url'] + '">' + res[i]['link_2_content'] + ' </a></li>';
                html.innerHTML += '</ul>';
                // var el = document.getElementsByClassName('mainWrapper');
                // el = el[0];
                var el = document.getElementById('container');
                var bd = document.getElementsByClassName('baidu_browser_fixed');
                if (bd.length > 0) {
                    bd = bd[0];
                    bd.parentNode.removeChild(bd);
                }
                el.appendChild(html);

                res[i].adPos = '百度搜索广告_ID_' + res[i]['id'];
                DoAdv.bindEvent('.baidu_borwser_content_top', [res[i]], res[i].link, res[i].gameid);
                //pv
                DoAdv.reportLog([res[i]], 1);

            }
        }

    }

    var url = window.location.href;
    //判断是否百度搜索
    // if (url.indexOf('www.chinaso.com/search/pagesearch.htm?q=')) {
    if (url.indexOf('www.baidu.com') !== -1) {
        ajax({
            url: DoNoJquery.searchAjaxUrl, // 请求地址
            jsonp: 'searchCallback', // 采用jsonp请求，且回调函数名为"urlCallback"，可以设置为合法的字符串
            data: {}, // 传输数据
            success: function(res) { // 请求成功的回调函数
                if (res.length > 0) {
                    if ((url.indexOf('www.baidu.com/s') !== -1) && (url.indexOf('wd=') > 0 || url.indexOf('word=') > 0)) {
                        //获取关键词
                        // var wd = getUrlParam('q');
                        var wd = url.indexOf('wd=') > 0 ? getUrlParam('wd') : getUrlParam('word');

                        wd = decodeURIComponent(wd);

                        showSearchAd(res, wd);
                    }

                    document.getElementById('kw').onchange = function() {
                        var wd = document.getElementById('kw').value;
                        setTimeout(function() {
                            showSearchAd(res, wd)
                        }, 1000);
                    }
                }
            },
            error: function(error) {} // 请求失败的回调函数
        });
    }

    // ajax({
    //     url: DoNoJquery.searchAjaxUrl,  // 请求地址
    //     jsonp: 'searchCallback', // 采用jsonp请求，且回调函数名为"urlCallback"，可以设置为合法的字符串
    //     data: {},  // 传输数据
    //     success:function(res){  // 请求成功的回调函数
    //         if (res.length > 0) {
    //             var url = window.location.href;
    //             //判断是否百度搜索
    //             // if (url.indexOf('www.chinaso.com/search/pagesearch.htm?q=')) {
    //             if (url.indexOf('www.baidu.com')) {
    //
    //                 if (url.indexOf('www.baidu.com/s') && (url.indexOf('wd=')>0 || url.indexOf('word=')>0)) {
    //                     //获取关键词
    //                     // var wd = getUrlParam('q');
    //                     var wd = url.indexOf('wd=') > 0 ? getUrlParam('wd') : getUrlParam('word');
    //
    //                     wd = decodeURIComponent(wd);
    //
    //                     showSearchAd(res, wd);
    //                 }
    //
    //                 document.getElementById('kw').onchange = function () {
    //                     var wd = document.getElementById('kw').value;
    //                     setTimeout(function() {showSearchAd(res, wd)}, 1000);
    //                 }
    //             }
    //         }
    //     },
    //     error: function(error) {}  // 请求失败的回调函数
    // });

})();