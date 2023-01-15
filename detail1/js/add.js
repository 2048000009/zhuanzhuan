/**
 * 下面是写完一次就看不懂的代码，请勿动，根本没打算维护
 */
$(function($) {

    var good = $(".good");
    var real = $("#real");
    var images = $(".z-swipe-item");
    var count = $("#count");
    images.css("width", $(window).width());
    $(".z-swipe__track").css('width', images.length * parseInt($(window).width()) + 'px')


    $(window).resize(function() { //当浏览器大小变化时
        images.css("width", $(window).width());
        $(".z-swipe__track").css('width', images.length * parseInt($(window).width()) + 'px')
    });
    count.text(1 + '/' + images.length);
    /**
     * 真机实拍点击效果
     */
    good.click(function() {
        block(real);
    });

    /**
     * 
     * @param {轮播图}  
     * @returns 
     */

    //触摸时
    images.on('touchstart', function(e) {

        e.preventDefault();
        var e = e || window.event;

        div = $(this);

        startX = e.originalEvent.touches[0].clientX;


        //触摸移动时
        images.on('touchmove', function(e) {


            var e = e || window.event;
            MoveX = e.originalEvent.touches[0].clientX;

            div.css('margin-left', (MoveX - startX) + 'px');

            var n = div.index() + 1;

        })

        //松手时
        images.on('touchend', function() {
            var x = 0;
            var left = div.css('margin-left');
            console.log(startX);
            console.log(MoveX);
            //当向左滑动距离较小时取消事件
            if (startX - MoveX > 0 && startX - MoveX < 50) {

                return div.css('margin-left', '0px');

            } else if (startX - MoveX > 50) {

                console.log(images.length);


                if (div.index() == images.length - 1) {
                    return div.css('margin-left', '0px');
                }

                var tim = setInterval(function() {

                    console.log(parseInt(left))

                    div.css('margin-left', (parseInt(left) - x) + 'px');

                    //图片移动的速度
                    x += 16;

                    //符合条件和隐藏图片取消动画
                    if (parseInt(div.css('margin-left')) < -530) {
                        clearInterval(tim);
                        div.css('margin-left', '');
                        div.removeClass('opened');
                        div.addClass('close');
                        var n = div.index() + 1;
                        $(images[n]).addClass('opened');

                        count.text(n + 1 + '/' + images.length);

                    }
                }, 10)

            }



            //当向右滑动距离较小时取消事件
            if (startX - MoveX > -50 && startX - MoveX < 0) {

                return div.css('margin-left', '0px');

            } else if (startX - MoveX < -50) {

                if (div.index() == 0) {
                    return div.css('margin-left', '0px');
                }

                var tim = setInterval(function() {


                    div.css('margin-left', (parseInt(left) + x) + 'px');

                    //图片移动的速度

                    x += 16;

                    //符合条件和隐藏图片取消动画
                    if (parseInt(div.css('margin-left')) > 530) {

                        clearInterval(tim);

                        div.css('margin-left', '');
                        div.removeClass('opened');
                        div.addClass('close');

                        var n = div.index() - 1;
                        $(images[n]).removeClass('close');

                        count.text(n + 1 + '/' + images.length);
                    }
                }, 10)

            }

        })

    });

    /**
     * 
     * @param {改变状态的DOM元素} obj
     * @returns 效果
     */
    function block(obj) {
        if (obj.css('display') == 'none') {
            return obj.show();
        }
        return obj.hide();
    }


    /**
     * 弹窗特效
     */

    var pop = $(".pop-wrapper");
    $(".guarantee-line").click(function() {
        $(".z-overlay").removeClass('close');
        pop.removeClass('close');
        pop.animate({
            'max-height': "86%",
        }, 100);
    })
    $(".pop_close").click(function() {
        $(".z-overlay").addClass('close');
        pop.animate({
            'max-height': "0%",
        }, 100);

    })

    /**
     * 收缩栏特效
     */

    var toggle = $('.content-wrap-toggle');
    var arrow = $(".arrow");

    arrow.each(function() {
        var n = $(this).index('.arrow');

        $(this).click(function() {

            var height = $(toggle[n]).css('height');
            console.log(height);


            if (parseInt(height) > 0) {

                $(this).removeClass('active-arrow');
                $(toggle[n]).css('height', '0px')

            } else {
                $(this).addClass('active-arrow');
                $(toggle[n]).css('height', '100%')

            }

        })
    })

    /**
     * 文本收缩栏特效
     */

    /**
     * 收缩栏特效
     */

    var togp = $('.tt+p');
    var normal = $(".tt>img");

    normal.each(function() {

        var n = $(this).index(".tt>img");

        $(this).click(function() {

            if ($(togp[n]).hasClass('active')) {
                $(this).addClass('close-img');
                $(togp[n]).removeClass('active');

            } else {

                togp.each(function() {
                    $(normal[$(this).index()]).addClass('close-img');
                    $(this).removeClass('active');
                });
                $(this).removeClass('close-img');
                $(togp[n]).addClass('active');

            }

        })
    })


    /**
     * 悬浮飘动特效
     */
    var enter = $(".list-enter-active");


    function ofof() {

        //1
        $(enter[0]).animate({
            'margin-left': "0px",
        }, 2000, "linear", function() {
            $(enter[0]).animate({
                'margin-bottom': '30.667vw',
                'opacity': '0'
            }, 3000, "linear", function() {
                $(enter[0]).css('display', 'none')
                $(enter[0]).css({
                    'margin-left': '-250px',
                    'margin-bottom': '2.667vw',
                    'opacity': '1'
                });

                //2
                $(enter[1]).animate({
                    'margin-left': "0px",
                }, 2000, "linear", function() {
                    $(enter[1]).animate({
                        'margin-bottom': '30.667vw',
                        'opacity': '0'
                    }, 3000, "linear", function() {
                        $(enter[1]).css('display', 'none')
                        $(enter[1]).css({
                            'margin-left': '-250px',
                            'margin-bottom': '2.667vw',
                            'opacity': '1'
                        });


                        //3
                        $(enter[2]).animate({
                            'margin-left': "0px",
                        }, 2000, "linear", function() {
                            $(enter[2]).animate({
                                'margin-bottom': '30.667vw',
                                'opacity': '0'
                            }, 3000, "linear", function() {
                                $(enter[2]).css('display', 'none')
                                $(enter[2]).css({
                                    'margin-left': '-250px',
                                    'margin-bottom': '2.667vw',
                                    'opacity': '1'
                                });

                                setTimeout(function() {
                                    enter.each(function() {
                                        $(this).css('display', 'block')
                                    })
                                }, 50)
                                okok();
                            });
                        });

                    });
                });

            });
        });
    }

    /**
     * 无限循环执行
     */
    ofof();

    function okok() {
        return ofof();
    }


    /**
     * 请求参数渲染页面
     */

    function Request_api() {
        var urlpam = window.location.href;

        $.ajax({
            type: "GET",
            url: 'https://app.zhuanzhuan.com/zzopen/waresshow/moreInfo?' + urlpam.match(/infoId=(.){15,30}/i)[0] + '&searchFrom=miniGoodsDetail&requestType=2',
            dataType: "jsonp",
            /*加上datatype*/
            success: function(msg) {
                console.log(msg.respData.introPics.length);
                var Data = msg.respData;

                var list = msg.respData.report.reportItem;


                //生成检测状态
                jan_state(
                    [
                        [list[0]["normalNum"],
                            list[0]["abNormalNum"]
                        ],

                        [
                            list[1]["normalNum"],
                            list[1]["abNormalNum"]
                        ],

                        [
                            list[2]["normalNum"],
                            list[2]["abNormalNum"]
                        ]
                    ], list);


                //生成选择器数组
                var domall = querylistarr([
                    '.info', //检测参数块
                    '.detail', //检测说明
                    '.report-param', //检测参数块
                    '.example-pics',
                    '.grey-bg', //列表
                    '.condition',
                    '.condition-left'
                ]);

                if (msg.respData.introPics) {
                    xiangqing(msg.respData.introPics);
                }

                //生成参数块
                params(Data.report.params, domall[0]);

                //检测说明
                detail(Data.report.checkDesc + Data.report.checkDescSuffix, domall[1])

                //检测参数块渲染
                report(Data.report.params, domall[2]);

                //图片渲染
                picture(msg.respData.report.samplePics, domall[3]);

                //列表一渲染
                listall(Data.report.reportItem, domall[4])


                //列表二渲染
                listalltwo(Data.report.reportItem, domall[4])


                //列表三渲染
                listallthree(Data.report.reportItem, domall[4])

                //等级渲染
                dengji(msg.respData.report.condition, domall[5], domall[6]);
            }
        })
    }

    Request_api();


    function xiangqing(img) {
        console.log(img[i])
        str = '';
        for (i = 0; i < img.length; ++i) {
            str += '<img data-v-74ba40ca="" alt=""data-src="' + img[i] + '"src=' + img[i] + ' lazy="loaded">';
        }

        $("#xiangqing").eq(0).append('<div data-v-74ba40ca="" class="zy-intro" id="tab-detail"><h5 data-v-74ba40ca= "" > 商品详情</h5 ><div data-v-74ba40ca="" class="img-wrap max-wrap">' + str + '</div><div data-v-74ba40ca="" id="show-btn" class="show-btn">展开全部<img data-v-74ba40ca=""src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAV1BMVEUAAAD///+ZmZmioqKqqqqenp6enp6cnJycnJyampqampqcnJyampqbm5uampqbm5uampqZmZmampqampqZmZmampqZmZmZmZmampqampqampqampqZmZmg3vY1AAAAHHRSTlMAAQULDBUiMUNESU1OVFhwiYqiuMvb4uTo8vn+10ZB3gAAAMxJREFUSMftlMkSgzAMQ9mhUKBsYXv//509MAOlGIdrp+hmR8k4khLHuXHjp5CaPrNxnr1J16KHKdH5jwn6tTLAGGv8eATMWuYzMETn/GgA5nxrlABdeMYPO4Dys1UBtIHMD1qA167n1gCNJ/G9BqB2r3S1s/wWoDpuWKb1L93MoseiXbFvFpri8ci35cmkenpYFo5QBxCHVK54IoMkYrAZXFliv9l0bqVsuRYWKWqVGkfJcj3wguWWJyVYbnm0R8tt38IemTHZ/f3+N97qChj2WWnQFgAAAABJRU5ErkJggg==" class="ico"></div></div >');

    }



    function dengji(arr, dom, doma) {
        if (arr.match(/以下/)) {
            dom.append('<span data-v-77d6a2c0="" class="number">瑕疵</span>');
            doma.append('<span data-v-77d6a2c0="" class="number">瑕疵</span>');
        } else {
            dom.append('<span data-v-77d6a2c0="" class="number">' + arr.match(/[0-9]+/)[0] + '</span>');
            dom.append('<span data-v-25359f04="">新</span>');

            doma.append('<span data-v-77d6a2c0="" class="number">' + arr.match(/[0-9]+/)[0] + '</span>');
            doma.append('<span data-v-25359f04="">新</span>');

        }
    }

    //列表1渲染
    function listall(arr, dom) {

        var str = '';
        //大圈 children下的数据  共5圈
        for (n = 0; n < arr[0]["children"].length; ++n) {

            str += '<dt data-v-422d6a4e="" data-v-6e9300e2="">' + arr[0]["children"][n]["name"] + '</dt>';


            //中圈 children下的数据  共5圈
            for (x = 0; x < arr[0]["children"][n]["children"].length; ++x) {


                if (!arr[0]["children"][n]["children"][x]['values'][0]['value'].match(/无|正常/)) {

                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data - v - 422d6a4e = "" data - v - 6e9300e2 = ""class="value-item ab-normal"><div data-v-422d6a4e="" data-v-6e9300e2=""class="con"><span data-v-422d6a4e="" data-v-6e9300e2=""class="k">' + arr[0]["children"][n]["children"][x]['name'] + '</span><!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span><span data-v-422d6a4e="" data-v-6e9300e2="" class="v">' + arr[0]["children"][n]["children"][x]['values'][0]['value'] + '</span></div><!----></div></dd>';

                } else {
                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item"><div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">' + arr[0]["children"][n]["children"][x]['name'] + '</span> <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="">' + arr[0]["children"][n]["children"][x]['values'][0]['value'] + '</span></div> <!----></div></dd>';
                }

            }

        }

        dom.eq(0).append('<dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">' + str + '</dl>');

    }



    //列表2渲染
    function listalltwo(arr, dom) {

        var str = '';
        //大圈 children下的数据  共5圈
        for (n = 0; n < arr[1]["children"].length; ++n) {

            str += '<dt data-v-422d6a4e="" data-v-6e9300e2="">' + arr[1]["children"][n]["name"] + '</dt>';


            //中圈 children下的数据  共5圈
            for (x = 0; x < arr[1]["children"][n]["children"].length; ++x) {

                if (!arr[1]["children"][n]["children"][x]['values'][0]['value'].match(/无|正常/)) {

                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data - v - 422d6a4e = "" data - v - 6e9300e2 = ""class="value-item ab-normal"><div data-v-422d6a4e="" data-v-6e9300e2=""class="con"><span data-v-422d6a4e="" data-v-6e9300e2=""class="k">' + arr[1]["children"][n]["children"][x]['name'] + '</span><!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span><span data-v-422d6a4e="" data-v-6e9300e2="" class="v">' + arr[1]["children"][n]["children"][x]['values'][0]['value'] + '</span></div><!----></div></dd>';

                } else {
                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item"><div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">' + arr[1]["children"][n]["children"][x]['name'] + '</span> <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="">' + arr[1]["children"][n]["children"][x]['values'][0]['value'] + '</span></div> <!----></div></dd>';
                }

            }

        }

        dom.eq(2).append('<dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">' + str + '</dl>');

    }




    //列表3渲染
    function listallthree(arr, dom) {

        var str = '';
        //大圈 children下的数据  共5圈
        for (n = 0; n < arr[2]["children"].length; ++n) {

            str += '<dt data-v-422d6a4e="" data-v-6e9300e2="">' + arr[1]["children"][n]["name"] + '</dt>';


            //中圈 children下的数据  共5圈
            for (x = 0; x < arr[2]["children"][n]["children"].length; ++x) {

                if (!arr[2]["children"][n]["children"][x]['values'][0]['value'].match(/无|正常/)) {

                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data - v - 422d6a4e = "" data - v - 6e9300e2 = ""class="value-item ab-normal"><div data-v-422d6a4e="" data-v-6e9300e2=""class="con"><span data-v-422d6a4e="" data-v-6e9300e2=""class="k">' + arr[2]["children"][n]["children"][x]['name'] + '</span><!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span><span data-v-422d6a4e="" data-v-6e9300e2="" class="v">' + arr[2]["children"][n]["children"][x]['values'][0]['value'] + '</span></div><!----></div></dd>';

                } else {
                    str += '<dd data-v-422d6a4e="" data-v-6e9300e2=""><div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item"><div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">' + arr[2]["children"][n]["children"][x]['name'] + '</span> <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="">' + arr[2]["children"][n]["children"][x]['values'][0]['value'] + '</span></div> <!----></div></dd>';
                }

            }

        }

        dom.eq(3).append('<dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">' + str + '</dl>');

    }



    //检测说明渲染
    function detail(text, dom) {
        dom.text(text)
    }

    //dom生成器
    function querylistarr(arr) {
        var a = [];
        for (i = 0; i < arr.length; ++i) {
            a[i] = $(arr[i]);
        }
        return a;
    }



    //参数模块渲染
    function report(arr, dom) {
        for (i = 0; i < arr.length; ++i) {
            dom.append('<div  data-v-77d6a2c0="" class="report-item"><p class="xuanran" data - v - 77d6a2c0 = "" > ' + arr[i]["key"] + '</p><p data-v-77d6a2c0="">' + arr[i]["value"] + '</p></div >')
        }
    }


    //图片渲染
    function picture(arr, dom) {

        for (i = 0; i < arr.length; ++i) {
            dom.append('<li data-v-422d6a4e="" data-v-6e9300e2="" data-src="https://pic1.zhuanstatic.com/zhuanzh/524cf065-1680-4209-b5d4-58a827687a3b.jpg?w=160&amp;h=160&amp;t=5&amp;qa=90" lazy="loaded" style="background-image: url(&quot;' + arr[i] + '?w=160&amp;h=160&amp;t=5&amp;qa=90&quot;);"></li>')
        }

    }



    //参数模块渲染
    function params(arr, dom) {

        for (i = 0; i < arr.length; ++i) {
            dom.append('<div data-v-422d6a4e="" class="detail-item"><p data - v - 422d6a4e = "" class= "value" >' + arr[i]["value"] + '</p><p data-v-422d6a4e="" class="key">' + arr[i]["key"] + '<span data-v-422d6a4e="" class="tips"><!----></span></p></div>')
        }

    }



    //检测列表渲染
    function jianlist() {

        var toggle = $(".content-wrap-toggle");
    }


    //检测状态生成渲染

    function jan_state(arr, list) {

        var hideCheckedIcon = $(".hideCheckedIcon");



        var yes = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAASxQTFRFAAAAVf+qVeOOZuaZWuGHVdmEU9qGVdiGU9iFUteFUteFUtiEUtiEU9iDUtiEU9iEU9eEUteEUteEUtiEUteDU9iDU9eDUteDU9eDVNeEVdeFVteFVtiGWdiIXdmLYtqPZNuQZtuRZ9ySadyTa9yVbN2Vbt2Xb92Xb92YcN6Yc96adN+bdt+dd9+eeN+ee+CgfOChf+GjgeGlhOKnhuOoieOqi+Ssj+WukeWwlOaylua0mee2oOm6oum8puq/rOvDruzFsu3IuO7Muu/Nve/Qv/DRxfHVyPLY0PTd2fbj4Pfp4fjp4/jr5fns5/nu6vrw6/rw7Prx7vvy8Pv08fv18vz28/z29Pz39fz49v359/35+P36+f37+v37+v78+/78/P79/f7+/v7+////AK3cAAAAABd0Uk5TAAMJChEbN05cYGZ8j6+3y9vm7PL19/mS+y5dAAABpUlEQVRIx52Wd1uDMBDG00nZBAqpe++9t3XvWbVurfL9v4NBrBKSpsT3DzjC7x7I5e4SAOJKS5ph2Z5nW4YmpUETZWW9iCIq6nKWg2dUB1Fy1EwDPKVAxBRUUiw+Z6KGMnM0n4eII5iP8wUXceUWYjxqKsIj7zZ3cCN/lYMogeDvzFMmSiSzHl0FJZTys74wqQMM11xFiaV+55uT3MEJMlFGApKxg84l2nuIRx3XS5HHtxxWhon6SAOJ+4E9369ORAckoPH4bR9rPzqiAYPDbwb8UVt0yABWY34t4I87iDEL2LGo/JlLn5g/7STf28AjnnvPl+vm3DvmL7piX/VIh8FrvzYfmlPPmK/0IcqB+KUTDL1MB9boPTarI9S8bHLSQ3cYexhDqP8GG0+TdCCsWFjHHzF4O9B9iW9vs4zIGfGFm3nF6NUZvnwsskKtUamxUPNDrTLXRqKTbyXkN5g8Tj46vdcDfou9+DqzgMq+v8spIEaJ7hyUOCXKaAKlVl4TEG8zwo1MvFUKN2Pxdi++oYhvWeKbovi2K76xix8d/nE4SXL8+QKBmsD8vLm4GwAAAABJRU5ErkJggg==";

        var no = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAGZQTFRFAAAA/6pV/6o5/5kz/5Yt/5cv/5Qq/5Yr/5Yq/5Uq/5Yq/5Qp/5Qp/5Uq/5Uq/5Qp/5Uq/5Up/5Qp/5Up/5Uq/5Up/5Qq/5Qp/5o2/5s4/8SK/82b/9m0/+bN/+fQ/+7e//fv////xVWibAAAABd0Uk5TAAMJChEbN05cYGZ8j6+3y9vm7PL19/mS+y5dAAABEUlEQVRIx52Wx3LDMAxEV7SK1UU1uJf//8kc4mQcGZC4eUcNVgMSwILAEpdVTdfPc981VeawQZzXo7wx1nm8Er4rB/lgKHdGeFR4UfFFpMUnrZi0yWd86mUFny7j95OsMu0X8bLJH0U6bQumt6wSLwH435NHrQTR/txuIYEUr/oqCR2Ox4OS1HfNS+Vf9+fzrnwuASAewgVDDCCXcIHkAGpGUANuZASjQyaMQDJUnKBCwwkadJygQ88JesycYOYFdEr0oelrpQunt8bpfD4ZraE3n8XojPa2qK0BssitEb1crxdrRGkTUG1GF7xsRjOy2+NxM42Mt0rajHm75xcKv7L4pcivXX6x80+HfzxOQp4/X8kuo/8FjmrSAAAAAElFTkSuQmCC";

        //如果全部正常则直接渲染全部正常
        for (i = 0; i < 3; ++i) {
            if (arr[i][1] == 0) {
                hideCheckedIcon.eq(i).prepend('<div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="' + yes + '"><span data-v-6e9300e2="">全部正常</span></div>');
            } else {

                hideCheckedIcon.eq(i).prepend('<div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="' + no + '">异常' + arr[i][1] + '</span></div>')



                hideCheckedIcon.eq(i).prepend('<div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="' + yes + '">正常' + arr[i][0] + '</span></div>');


            }

        }
    }



    //tab
    $(window).scroll(function() {


        if ($(document).scrollTop() > 300) {
            $(".nav-tab-wrap").show()
        }
        if ($(document).scrollTop() < 300) {
            $(".nav-tab-wrap").hide()
        }
    });

    $(".nav-tab>li").click(function() {
        $(".nav-tab>li").each(function() {
            $(this).removeClass("active")
        })
        $(this).addClass("active");


        //商品
        if ($(this).attr("num") == 1) {


            var timer = setInterval(function() {

                var newTop = $(document).scrollTop();

                if ($(document).scrollTop() < 10) {

                    clearInterval(timer);

                } else {

                    $(document).scrollTop(newTop - 50);

                }

            }, 10);
        }


        //验机
        if ($(this).attr("num") == 2) {

            var top = $("#tab-qcreport").offset().top;

            var timer = setInterval(function() {
                var newTop = $(document).scrollTop();

                if ($(document).scrollTop() > top - 40 && $(document).scrollTop() < top + 40) {

                    clearInterval(timer);

                } else {

                    if ($(document).scrollTop() > top) {

                        $(document).scrollTop(newTop - 30);

                    } else {
                        $(document).scrollTop(newTop + 30);
                    }
                }

            }, 10);
        }

        //推荐

        if ($(this).attr("num") == 3) {

            var top = $(".recommend-wrapper").offset().top;

            var timer = setInterval(function() {
                var newTop = $(document).scrollTop();

                if ($(document).scrollTop() > top - 40 && $(document).scrollTop() < top + 40) {

                    clearInterval(timer);

                } else {

                    if ($(document).scrollTop() > top) {

                        $(document).scrollTop(newTop - 30);

                    } else {
                        $(document).scrollTop(newTop + 30);
                    }
                }

            }, 10);
        }

    })

});