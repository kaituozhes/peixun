<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网站后台登录</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/web/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/web/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/web/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/Public/web/assets/css/admin.css">
  <link rel="stylesheet" href="/Public/web/assets/css/app.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				网站后台<span> 登录</span> <i class="am-icon-skyatlas"></i>
			</div>
		</div>

		<div class="login-font">
			<i>Log In </i> or <span> Sign Up</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form action="<?php echo U('Login/dologin');?>" class="am-form" role="form" method="post">
				<fieldset>
					<div class="am-form-group">
						<input type="text" class="" name="username" id="doc-ipt-email-1" placeholder="输入登录账号">
					</div>
					<div class="am-form-group">
						<input type="password" name="password"  class="" id="doc-ipt-pwd-1" placeholder="登录密码">
					</div>
					<p><button type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

  <script src="/Public/qingchunpao/assets/js/jquery.min.js"></script>
  <script src="/Public/qingchunpao/assets/js/amazeui.min.js"></script>
  <script src="/Public/qingchunpao/assets/js/app.js"></script>
</body>

</html>