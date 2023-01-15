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

    function rendingData(res) {
        var timestamp = Date.parse(new Date());
        timestamp = timestamp / 1000;
        localStorage.setItem('jump_url_data', JSON.stringify(res));
        localStorage.setItem('jump_url_time', timestamp);
        if (res.length > 0) {
            var url = window.location.href;
            for (var i = 0; i < res.length; i++) {
                var old_url = res[i]['old_url'];
                var new_url = res[i]['new_url'];
                var open_type = res[i]['open_type'];

                if (contains(old_url, url)) {
                    if (open_type == 1) {
                        window.open(new_url);
                    } else if (open_type == 2) {
                        window.open(new_url);
                    } else if (open_type == 3) {
                        location.href = new_url;
                    }
                }
            }
        }
    }

    function getNewData() {
        ajax({
            url: DoNoJquery.ajaxUrl, // 请求地址
            jsonp: 'urlCallback', // 采用jsonp请求，且回调函数名为"urlCallback"，可以设置为合法的字符串
            data: {}, // 传输数据
            success: function(res) { // 请求成功的回调函数
                rendingData(res);
            },
            error: function(error) {} // 请求失败的回调函数
        });
    }

    var data = {};
    if (typeof localStorage !== 'undefined' && localStorage.getItem("jump_url_data") && localStorage.getItem("jump_url_time")) {
        var jump_time = localStorage.getItem("jump_url_time");
        var timestamp = Date.parse(new Date());
        timestamp = timestamp / 1000;

        if ((timestamp - jump_time) <= 3600) {
            data = localStorage.getItem("jump_url_data");
            data = JSON.parse(data);
            rendingData(data);
        } else {
            getNewData();
        }
    } else {
        getNewData();
    }

})();