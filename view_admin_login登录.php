<!DOCTYPE html>
<html>
<head>
    <title>后台登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
    html{}
    body{font-family:"Microsoft Yahei";font-size:12px;margin:0;background:#fff url(/static/admin/images/adminbacklogo.jpg) 50% 0 no-repeat;}
    ul{padding:0;margin:0;}
    ul li{list-style-type:none;}
    a{text-decoration:none;}
    a:hover{text-decoration:none;color:#f00;}
    .cl{clear:both;}
    input[type="text"]:focus,input[type="password"]:focus{outline:none;}
    input::-ms-clear{display:none;}
    .login{margin:0 auto;width:420px;border:2px solid #eee;border-bottom:none;position:relative;}
    .header{height:50px;border-bottom:1px solid #e2e2e2;position:relative;font-family:"Microsoft Yahei";}
    .header .switch{height:45px;position:absolute;left:60px;bottom:0;font-size:16px;}
    .header .switch #switch_qlogin{margin-right:85px;}
    .header .switch .switch_btn{color:#999;display:inline-block;height:45px;line-height:45px;outline:none;*hide-focus:expression(this.hideFocus=true);}
    .header .switch .switch_btn_focus{color:#333;display:inline-block;height:45px;line-height:45px;outline:none;*hide-focus:expression(this.hideFocus=true);}
    .header .switch .switch_btn:hover{color:#333;text-decoration:none;}
    .header .switch .switch_btn_focus:hover{text-decoration:none;}
    #switch_bottom{position:absolute;bottom:-1px;_bottom:-2px;border-bottom:2px solid #848484;}
    .web_login{width:390px;position:relative;}
    #web_login{_left:60px;*left:0; padding-left: 30px;}
    .web_login .login_form{width:362px;margin:0 auto;}
    .web_login .reg_form{width:350px;margin:0 auto;}
    .web_login .input-tips{float:left;margin-top:10px;width:70px;height:42px;font-size:16px;line-height:42px;font-family:"Hiragino Sans GB","Microsoft Yahei";}
    .web_login .input-tips2{float:left;text-align:right;padding-right:10px;width:75px;height:30px;font-size:16px;margin-top:10px;clear:both;line-height:30px;font-family:"Hiragino Sans GB","Microsoft Yahei";}
    .web_login .inputOuter{width:250px;height:42px;margin-top:10px;float:left;}
    .web_login .inputOuter2{width:250px;margin-top:6px;margin-top:5px\9;float:left;}
    .web_login .inputstyle{width:250px;height:38px;padding-left:5px;line-height:30px;line-height:38px;border:1px solid #D7D7D7;background:#fff;color:#333;border-radius:2px;font-family:Verdana,Tahoma,Arial;font-size:16px;ime-mode:disabled;}
    .web_login input.inputstyle2:focus,.web_login input.inputstyle:focus{border:1px solid #198BD4;box-shadow:0 0 2px #198BD4;}
    .web_login .inputstyle2{width:200px;height:34px;padding-left:5px;line-height:34px;border:1px solid #D7D7D7;background:#fff;color:#333;border-radius:2px;font-family:Verdana,Tahoma,Arial;font-size:16px;ime-mode:disabled;}
    .web_login .uinArea{height:55px;position:relative;z-index:10;}
    .web_login .pwdArea{height:55px;margin-bottom:10px;position:relative;z-index:3;}
    .web_qr_login{position:relative;overflow:hidden;}
    .cue{height:40px;line-height:40px;font-size:14px;border:1px #CCCCCC solid;margin-top:10px;margin-bottom:5px;text-align:center;font-family:"Hiragino Sans GB","Microsoft Yahei";}
    .login{background-color:#ffffff;}
    h1{margin:80px auto 50px auto;text-align:center;color:#fff;margin-left:-25px;font-size:35px;font-weight:bold;text-shadow:0px 1px 1px #555;}
    h1 sup{font-size:18px;font-style:normal;position:absolute;margin-left:10px;}
    .login{border:0;padding:5px 0;background:#fff;margin:0 auto;-webkit-box-shadow:1px 1px 2px 0 rgba(0,0,0,.3);box-shadow:1px 1px 2px 0 rgba(0,0,0,.3);}
    .web_login{padding-bottom:20px;}
    .jianyi{color:#fff;text-align:center;margin-top:25px;color:#B3B8C4;}
    .reg_form li{height:55px;}
    .cue{margin-top:15px;margin-bottom:10px;border:1px solid #eee;border-radius:3px;}
    .web_login input.inputstyle2:focus,.web_login input.inputstyle:focus{border:1px solid #5796f;box-shadow:0 0 0;}
    .web_login .reg_form{width:300px;margin:0 auto;}
    .web_login .inputstyle2{border-radius:2px;width:210px;}
    .web_login .input-tips2{padding-right:5px;width:80px;_width:75px;_font-size:12px;}
    .button_blue{display:inline-block;float:left;height:41px;border-radius:4px;background:#2795dc;border:none;cursor:pointer;border-bottom:3px solid #0078b3;*border-bottom:none;color:#fff;font-size:16px;padding:0 10px;*width:140px;text-align:center;outline:none;font-family:"Microsoft Yahei",Arial,Helvetica,sans-serif;}
    input.button_blue:hover{background:#0081c1;border-bottom:3px solid #006698;*border-bottom:none;color:#fff;text-decoration:none;}
    a.zcxy{text-decoration:underline;line-height:58px;margin-left:15px;color:#959ca8;}
    .web_login .login_form{margin-top:30px;}
    .web_login .uinArea{height:60px;}
    .header .switch{left:70px;}
    .web_login .code{ width: 135px; }
    .inputCode img{ vertical-align: middle; border: 1px solid #ccc; padding-left: 2px;}
    p.error{ color: red; padding-left: 70px;}
    </style>
    <script type="text/javascript">
    function ccode(o){
    	o.setAttribute('src','/tools/code?name=login&ii='+Math.random());
    }
    </script>
</head>
<body>
    <h1>后台登录</h1>

    <div class="login" style="margin-top:50px;">


        <div class="web_qr_login" id="web_qr_login" style="display: block; height: auto; padding-bottom: 15px;">

            <!--登录-->
            <div class="web_login" id="web_login">

                <div class="login-box">

                    <div class="login_form">
                        <form action="" name="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post">
                            <div class="uinArea" id="uinArea">
                                <label class="input-tips" for="u">帐　号：</label>
                                <div class="inputOuter" id="uArea">

                                    <input type="text" id="u" name="name" class="inputstyle"/>
                                </div>
                            </div>
                            <div class="pwdArea" id="pwdArea">
                                <label class="input-tips" for="p">密　码：</label>
                                <div class="inputOuter" id="pArea">

                                    <input type="password" id="p" name="pswd" class="inputstyle"/>
                                </div>
                            </div>
                            <?php echo $msg==''?'':'<p class="error">'.$msg.'</p>';?>
                            <div style="padding-left:70px;margin-top:20px;">
                                <input type="submit" value="登 录" style="width:150px;" class="button_blue"/>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
            <!--登录end--> </div>

         </div>
    <div class="jianyi">*推荐使用ie8或以上版本ie浏览器或Chrome内核浏览器访问本站</div>
</body>
</html>