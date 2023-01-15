(function() {

    function startAD() {
        jQuery.ajax({
            type: "GET",
            'url': DoAdv.commonAjaxUrl,
            data: {},
            dataType: 'jsonp',
            jsonp: "callback",
            jsonpCallback: "commonAdCallback",
            success: function succFunction(tt) {
                if (tt.length > 0) {
                    var curUrl = window.location.href;
                    //load css
                    var oCss = document.createElement("link");
                    var href = DoAdv.statUrl + "com.css" + DoAdv.env;

                    oCss.setAttribute("rel", "stylesheet");
                    oCss.setAttribute("type", "text/css");
                    oCss.setAttribute("href", href);
                    document.getElementsByTagName('head')[0].appendChild(oCss);
                    jQuery.each(tt, function(k, v) {
                        //判断是否目标url
                        if (v.url == curUrl) {

                            //日志
                            v.adPos = '自定义广告_ID_' + v.id;
                            DoAdv.bindEvent('.ad_pos_content_' + v.id, [v], v.link, v.gameid);
                            //pv
                            DoAdv.reportLog([v], 1);

                            //判断后缀 img/swf
                            var url = v.pic;
                            var arr = url.split('.');
                            var ext = arr.pop();

                            var pos = '';
                            //判断横向位置
                            if (v.pos_x == 1) {
                                pos += 'left:' + v.pos_x_value + 'px;';
                            } else if (v.pos_x == 2) {
                                pos += 'left:50%;margin-left:-' + ((v.pic_width) / 2) + 'px;';
                            } else {
                                pos += 'right:' + v.pos_x_value + 'px;';
                            }
                            //判断纵向位置
                            var y_pos = '';
                            if (v.pos_y == 1) {
                                pos += 'top:' + v.pos_y_value + 'px;';
                                y_pos = 'top:' + v.pos_y_value + 'px;';
                            } else if (v.pos_y == 2) {
                                var winHeight = jQuery(window).height();
                                pos += 'top:' + (winHeight / 2) + 'px;margin-top:-' + ((v.pic_height) / 2) + 'px;';
                                y_pos = 'top:' + (winHeight / 2) + 'px;margin-top:-' + ((v.pic_height) / 2) + 'px;';
                            } else {
                                pos += 'bottom:' + v.pos_y_value + 'px;';
                                y_pos = 'bottom:' + v.pos_y_value + 'px;';
                            }

                            //是否fixed
                            var position = '';
                            if (v.if_scroll == 1) {
                                pos += 'position: absolute;';
                                position = 'position: absolute;';
                            } else {
                                pos += 'position: fixed;';
                                position = 'position: fixed;';
                            }

                            //是否铺满
                            if (v.if_full_screen == 1) {
                                jQuery('body').delegate('.ad_pos_close_' + v.id, 'click', function() {
                                    jQuery('.ad_pos_' + v.id).hide();
                                    jQuery('.ad_pos_bbg_' + v.id).hide();
                                });
                                var html = '<div class="ad_pos_bbg ad_pos_bbg_' + v.id + '" style="' + position + ';' + y_pos + '; height: ' + v.pic_height + 'px;"></div>';
                                html += '<div class="ad_pos ad_pos_' + v.id + '" style="' + pos + '">';
                            } else {
                                jQuery('body').delegate('.ad_pos_close_' + v.id, 'click', function() {
                                    jQuery('.ad_pos_' + v.id).hide();
                                });
                                var html = '<div class="ad_pos ad_pos_' + v.id + '" style="' + pos + '">';
                            }

                            html += '<div class="ad_pos_content ad_pos_content_' + v.id + '">';
                            if (ext == 'swf') {
                                html += '<div class="loaction_aflash">';
                                html += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0">';
                                html += '<param name="SRC" value="' + url + '">';
                                html += '<param name="quality" value="high" />';
                                html += '<param name="wmode" value="opaque" />';
                                html += '<embed src="' + url + '" loop="true" autostart="true" quality="high" wmode="opaque" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>';
                                html += '</object>';
                                html += '</div>';
                                html += '<div class="ad_bg_cont">';
                                html += '<a target="_blank">';
                                html += '<img src="' + tt[0].mask + '" />';
                                html += '</a>';
                                html += '</div>';
                            } else {
                                html += '<img src="' + url + '" />';
                            }

                            html += '</div>';

                            //是否存在关闭按钮
                            if (v.if_close == 1) {
                                html += '<a class="ad_pos_close ad_pos_close_' + v.id + '"></a>';
                            }
                            html += '</div>';

                            jQuery('body').append(html);
                            if (ext == 'swf') {
                                setTimeout(function() {
                                    jQuery('.ad_pos_' + v.id).css({
                                        width: '100%',
                                        height: '100%',
                                        opacity: 1
                                    });
                                }, 200);
                            } else {
                                if (v.entime) {
                                    setTimeout(function() {
                                        $('.ad_pos_bbg' + v.id).hide();
                                        $('.ad_pos_content_' + v.id).hide();
                                    }, 1000 * v.entime);
                                }
                            }
                        }

                    });
                }

            }
        });
    }

    startAD();

})();