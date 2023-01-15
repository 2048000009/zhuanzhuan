$(document).ready(function () {
    //! TODO 消息按钮拖拽 start

    let screenWdith = $(window).width()
    let screenHeight = $(window).height()
    let messBtnWidth = $("#message-number").width()
    let messBtnHeight = $("#message-number").height()
    let listTop = 0
    let edgeY = 10
    let curpage = $("#message-number").attr("data-page") || "list"
    let drap = false

    $("#message-number").on("touchstart", function (re) {
        drap = false
        $('html,body').css("overflow", "hidden");
        let downTaget = re.originalEvent.targetTouches[0]

        let tageX = parseInt($("#message-number").css('left'))
        let tageY = parseInt($("#message-number").css('top'))

        // console.log($("#thelist").offset())
        if (curpage == "list") {
            listTop = parseInt($("#thelist").offset().top)
            edgeY = 10
        } else if (curpage == "detail") {
            edgeY = 40
        }


        let spacingX = downTaget.screenX - tageX
        let spacingY = downTaget.screenY - tageY
        $(this).on("touchmove", function (mre) {
            drap = true
            let taget = mre.originalEvent.targetTouches[0]
            let mX = taget.screenX - spacingX
            let mY = taget.screenY - spacingY

            //边界保留10px 详情页面上下边界保留40px
            if (mX > 10 && mX + messBtnWidth < screenWdith - 10) {
                $("#message-number").css({
                    "left": mX + 'px',
                })
            }
            if (mY > listTop + edgeY && mY + messBtnHeight < screenHeight - edgeY) {
                $("#message-number").css({
                    "top": mY + 'px'
                })
            }

        })
    })

    $("#message-number").on("touchend", function () {
        if (drap == false) {
            return
        }
        let tageX = parseInt($("#message-number").css('left'))
        if (tageX + messBtnWidth / 2 > screenWdith / 2) {
            $(this).css({
                right: "10px",
                left: "auto",
                bottom: "auto"
            });
        } else if (tageX + messBtnWidth / 2 < screenWdith / 2) {
            $(this).css({
                left: "10px",
                right: "auto",
                bottom: "auto"
            });
        } else {
            $(this).css({
                left: "10px",
                right: "auto",
                bottom: "auto"
            });
        }
        $('html,body').css("overflow", "auto");
    })

    //! TODO 消息按钮拖拽 end

    var nim, data = {}, chatList = [], imUnread = 0, sysCnt = 0, isStart = false;
    $.ajax({
        type: "GET",
        url: "/im/api/status",
        dataType: "json",
        error: function (xmlHttpRequest, textStatus, errorThrown) {
            console.log(xmlHttpRequest);
        },
        success: function (status) {
            sysCnt = status.data.sysCnt;
            if (status.data.isOpen == 1) {
                $.ajax({
                    type: "GET",
                    url: "/im/api/token",
                    dataType: "json",
                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                        console.log(xmlHttpRequest);
                    },
                    success: function (im) {
                        console.log('正在加载IM,获取token...');
                        //TODO 提交之前把它恢复
                        // $('#message-number').hide();
                        console.log(im)
                        if (im.errCode != 1) {
                            loadIm(im);
                            var isresell = localStorage.getItem('isresell');

                            if (isresell == 1) {
                                //TODO 提交之前把它恢复
                                // $('#message-number').hide();
                            } else {

                                $('#message-number').show();
                            }
                            changeTips();
                        }
                    }
                });
            } else {
                changeTips();
            }
        }
    });

    function loadIm(im) {
        nim = new NIM({
            // 初始化SDK
            appKey: im.data.appKey,
            account: im.data.account,
            token: im.data.token,
            onconnect: onConnect,
            onerror: onError,
            onwillreconnect: onWillReconnect,
            ondisconnect: onDisconnect,
            // 多端
            onloginportschange: onLoginPortsChange,
            // 会话
            onsessions: onSessions,
            onupdatesession: onUpdateSession,
            //使用数据库
            db: true,
            //同步未读数量
            syncSessionUnread: true,
            // 同步完成
            onsyncdone: onSyncDone
        });
    }



    function onConnect() {
        console.log('连接成功');
    }
    function onWillReconnect(obj) {
        // 此时说明 `SDK` 已经断开连接, 请开发者在界面上提示用户连接已断开, 而且正在重新建立连接
        console.log('即将重连', obj);
    }
    function onDisconnect(error) {
        // 此时说明 `SDK` 处于断开状态, 开发者此时应该根据错误码提示相应的错误信息, 并且跳转到登录页面
        console.log('连接断开', error);
        if (error) {
            switch (error.code) {
                // 账号或者密码错误, 请跳转到登录页面并提示错误
                case 302:
                    break;
                // 重复登录, 已经在其它端登录了, 请跳转到登录页面并提示错误
                case 417:
                    break;
                // 被踢, 请提示错误后跳转到登录页面
                case 'kicked':
                    break;
                default:
                    break;
            }
        }
    }

    function onError(error, obj) {
        console.log('发生错误', error, obj);
    }

    function onLoginPortsChange(loginPorts) {
        console.log('当前登录帐号在其它端的状态发生改变了', loginPorts);
    }

    function onSessions(sessions) {
        console.log('收到会话列表', sessions);
        data.sessions = nim.mergeSessions(data.sessions, sessions);
        updateSessionsUI(sessions);

    }

    //会话信息储存
    function updateSessionsUI(sessions) {
        for (var i = sessions.length - 1; i >= 0; i--) {
            if (sessions[i].id.indexOf("p2p-push") == -1) {
                chatList.push(sessions[i]);
            }
        }
    }

    //会话更新
    function onUpdateSession(session) {
        console.log('会话更新了', session);
        localStorage.setItem("hua", '会话更新了');
        if (isStart) {
            data.sessions = nim.mergeSessions(data.sessions, session);
            updateSessionUI(session);
            if (chatList.length > 0) {
                for (var i = 0; i < chatList.length; i++) {
                    if (chatList[i].id == session.id) {
                        imUnread = imUnread - chatList[i].unread;
                        chatList.splice([i]);
                    }
                }
            } else {
                imUnread = session.unread;
            }

            chatList.push(session);
            changeTips();

        }
    }

    //输出聊天信息，确认会话类型
    function updateSessionUI(session) {
        if (session.scene == "p2p") {    //p2p用户聊天
            if (session.id.indexOf("p2p-push") != -1) { return; }
            if ($("#chat-" + session.to).length > 0) {
                $("#chat-" + session.to).parent().remove();
            }
        } else if (session.scene == "team") {     //客服聊天
            if ($("#chat-" + session.to).length > 0) {
                $("#chat-" + session.to).parent().remove()
            }
        }
        pushChat(session);
    }

    //同步完成后获取历史信息
    function onSyncDone() {
        console.log('同步完成,开始组装会话')
        chatList = chatList.sort(function (a, b) {   //会话、群按更新时间排序
            return a.updateTime - b.updateTime;
        })
        for (var i = 0; i < chatList.length; i++) {
            //过滤系统消息后输出元素
            if (chatList[i].type == "notification") { continue; }
            if ((i + 1) == chatList.length) {
                isStart = true;
            }
            pushChat(chatList[i]);
        }
        isStart = true;
    }


    function pushChat(chat) {
        if (chat.scene && chat.scene == "p2p") {
            //获取会话所属用户名片
            $('#nim_sessionslist').prepend("<a><table id='chat-" + chat.to + "' class='chat-items'></table></a>");
            nim.getUser({
                account: chat.to,
                done: function (error, card) {
                    if (!error && card) {
                        if (card.avatar.length == "") {   //用户无头像则使用默认头像
                            card.avatar = "http://img.taoshouyou.com/img/default-avatar/2.jpg";
                        }
                        structure(chat, card.avatar, card.nick, "");
                    }
                }
            });
        } else if (chat.scene && chat.scene == "team") {
            $('#nim_sessionslist').prepend("<a><table id='chat-" + chat.to + "' class='chat-items'></table></a>");
            //获取群资料
            nim.getTeam({
                teamId: chat.to,
                done: function (error, teamobj) {
                    if (teamobj.serverCustom) {
                        var custom = eval('(' + teamobj.serverCustom + ')');
                        structure(chat, "../../img/im/normal.png", "", custom.tradeid);
                    } else {
                        $("#chat-" + chat.to).remove();
                    }
                }
            });
        }
    }

    //构建元素
    function structure(chat, avatar, nick, tradeid) {
        imUnread += chat.unread;
        var lastPic = "", chatlastMsg = "", unread = "", logid, updateTime = "";
        changeTips();
    }
    function changeTips() {
        console.log('聊天未读信息数量');
        //聊天未读信息数量
        var count = Number(sysCnt) + Number(imUnread);
        console.log('count:' + count);
        if (count > 0) {
            if (count > 99) {
                count = 99;
            }
            var isresell = localStorage.getItem('isresell');
            if (isresell == 1) {
                $('#message-number').hide();
            } else {

                $('#message-number').show();
            }
            $('#mi-message').html(count);
        } else {
            $('#message-number').hide();
            $('#mi-message').html('0');
        }
    }



    function timestampFormat(timestamp) {
        function zeroize(num) {
            return (String(num).length == 1 ? '0' : '') + num;
        }
        var curTimestamp = Math.round(new Date() / 1000); //当前时间戳
        var timestampDiff = curTimestamp - timestamp; // 参数时间戳与当前时间戳相差秒数
        var curDate = new Date(curTimestamp * 1000); // 当前时间日期对象
        var tmDate = new Date(timestamp * 1000);  // 参数时间戳转换成的日期对象
        var Y = tmDate.getFullYear(), m = tmDate.getMonth() + 1, d = tmDate.getDate();
        var H = tmDate.getHours(), i = tmDate.getMinutes(), s = tmDate.getSeconds();
        if (timestampDiff < 60) { // 一分钟以内
            return "刚刚";
        } else if (timestampDiff < 3600) { // 一小时前之内
            return Math.floor(timestampDiff / 60) + "分钟前";
        } else if (curDate.getFullYear() == Y && curDate.getMonth() + 1 == m && curDate.getDate() == d) {
            return '今天 ' + H + ':' + zeroize(i);
        } else {
            var newDate = new Date((curTimestamp - 86400) * 1000); // 参数中的时间戳加一天转换成的日期对象
            if (newDate.getFullYear() == Y && newDate.getMonth() + 1 == m && newDate.getDate() == d) {
                return '昨天 ' + H + ':' + zeroize(i);
            } else if (curDate.getFullYear() == Y) {
                return m + '月' + d + '日 ' + H + ':' + zeroize(i);
            } else {
                return Y + '年' + m + '月' + d + '日 ' + H + ':' + zeroize(i);
            }
        }
    }
});