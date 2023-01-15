<?php
define("PM_CALL", true);
include dirname(__FILE__) . "/includes/global.class.php";
include dirname(__FILE__) . "/config/mysql.func.php";
include dirname(__FILE__) . "/config/Conn.php";
include dirname(__FILE__) . "/includes/check.class.php";
include dirname(__FILE__) . "/includes/getdata.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台登录</title>
    <link rel="stylesheet" href="/dl/assets/style.css">
    <link rel="stylesheet" href="/dl/assets/iconfont/iconfont.css">
</head>
<body>
    <div class='container' id='container'>
        <div class="form-container sign-up-container">
            <!-- 注册 -->
           <form action="#">
            <h1>用户注册</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="iconfont icon-qq"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weixin"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weibo-copy"></i></a>
                <a href="#" class="social"><i class="iconfont icon-github"></i></a>
            </div>
            <span>您可以选择以上几种方式注册一个您的账户!</span>
            <input type="text" placeholder="用户名">
            <input type="password" placeholder="密码">
            <input type="email" placeholder="邮箱">
            <button id="send_code">发送验证码</button>
            <input type="email" placeholder="验证码">
            <button>注册</button>
           </form>
        </div>
        <div class="form-container sign-in-container">
            <!-- 登陆 -->
        <form action="<?php echo $_AR; ?>/?Admin=adminlogin" method="post" class="layui-form layui-form-pane">
                <h1>后台登陆</h1>

            <span>希望能与你在网银圈的尽头相遇！</span>
            <div class="layui-form-item">
                <label class="layui-form-label"><i class="layui-icon layui-icon-username"></i></label>
                <div class="layui-input-block">
登录账号
                    <input type="text" name="AdminName" class="layui-input" lay-verify="required" placeholder="你的账号" autofocus="autofocus" />
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><i class="layui-icon layui-icon-password"></i></label>
                <div class="layui-input-block">
登录密码
                    <input type="password" name="AdminPass" class="layui-input" lay-verify="required" placeholder="你的密码" />
                </div>
            </div>
            <button>登陆</button>
© 2022-Admin六月4.4
            </form>
        </div>
        <!-- 侧边栏内容 -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>已有帐号？</h1>
                    <p>亲爱的快快点我去进行登陆吧。</p>
                    <button class='ghost' id="signIn">登陆</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>没有账号？</h1>
                    <p>联系作者获取账号叭~</p>
                    <button class='ghost' id="signUp">联系作者</button>
                </div>
            </div>
        </div>
    </div>
<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=1824271286&auto=1&height=66"></iframe>
</body>
<script src="/dl/index.js"></script>
</html>