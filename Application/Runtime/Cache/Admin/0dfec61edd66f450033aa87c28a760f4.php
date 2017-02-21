<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>登录-<?php echo (C("CFG_WEBNAME")); ?>-管理系统</title>

<link rel="stylesheet" type="text/css" href="/Application/Admin/View/css/base.css" />
<link rel="stylesheet" type="text/css" href="/Public/js/asyncbox/skins/default.css" />

<script type="text/javascript" src="/Public/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/Application/Admin/View/js/base.js"></script>

<script type="text/javascript" src="/Public/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/js/asyncbox/asyncbox.js"></script>
<script type="text/javascript" src="/Public/js/functions.js"></script>
<script src="/Public/js/main.js"></script>

</head>

<body class="loginWeb">
    <div class="loginBox">
        <div class="innerBox">
            <div class="logo"> <img src="/Application/Admin/View/images/logo.png" /></div>
            <form id="form" action="/admin.php/index/login/login" method="post">
                <div class="loginInfo">
                    <ul>
                        <li class="row1">登录账号：</li>
                        <li class="row2"><input class="input" name="uname" id="uname" size="30" type="text" /></li>
                    </ul>
                    <ul>
                        <li class="row1">登录密码：</li>
                        <li class="row2"><input class="input" name="upass" id="upass" size="30" type="password" /></li>
                    </ul>
                    <ul>
                        <li class="row1">验证码：</li>
                        <li class="row2"><input class="input" id="verify_code" name="verify_code" type="text" style="width:100px;" /> <img src="/admin.php/login/verify"  title="看不清？单击此处刷新" onclick="this.src+='?rand='+Math.random();"  style="cursor: pointer; vertical-align: middle;"/></li>
                    </ul>
                </div>
                <input type="hidden" name="op_type" id="op_type" value="1"/>
            </form>
            <div class="clear"></div>
            <div class="operation">
            <button class="btn submit">登录</button>   
            <button class="btn findPwd">忘记用户名？</button>
            <button class="btn findPwd">忘记密码？</button>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
$(function(){
    $(".submit").click(function(){
        loginSubmit();
    });

    //找回密码
    $(".findPwd").click(function(){
        popup.alert("忘记用户名和密码，请与网站管理员联系修改，联系电话：7212302。");
        return false;
        $("#op_type").val("2");
        if($("#email").val()==''){
            popup.alert("忘记用户名和密码，请与网站管理员联系修改，联系电话：7212302。");
            return false;
        }
        if($("#verify_code").val()==''){
            popup.alert("忘记用户名和密码，请与网站管理员联系修改，联系电话：7212302。");
            return false;
        }
        commonAjaxSubmit();
    });

    //回车事件
    document.onkeydown = function(e){
        var loginStatus = $("#loginStatus").val();
        var ev = document.all ? window.event : e;
        if(ev.keyCode==13) {
             loginSubmit();
        }
    }
});


//登录方法
function loginSubmit(){
    $("#op_type").val("1");
    if($("#email").val()==''||$("#pwd").val()==''||$("#verify_code").val()==''){
        popup.alert("填写完整方可登陆");
        return false;
    }
    //commonAjaxSubmit('/admin.php/login/login');
    $("#form").ajaxSubmit({
        url:'/admin.php/login/login',
        type:"POST",
        success:function(data, st) {
            if(data.status==1){
                popup.success(data.info);
                setTimeout(function(){
                    popup.close("asyncbox_success");
                },2000);
            }else{
                popup.error(data.info);
                setTimeout(function(){
                    popup.close("asyncbox_error");
                },2000);
            }
            if(data.url&&data.url!=''){
                top.window.location.href=data.url;
            }
        }
    });
}
</script>