<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>首页</title>
<link href="/Public/web/css/style.css" rel="stylesheet">
<script src="/Public/web/js/jquery.js"></script>
<script src="/Public/web/js/jquery.flexslider-min.js"></script>
</head>
<body>
<!-- header 头部 和 左侧栏 -->
<div id="gHead">
	<div class="gHeadM1">
		<div class="gHeadM1M margin1200">
			<p>欢迎来到云计算开源技术架构师系列培训网站 </p>
			<?php if($logintype == 2): ?><p>请 <a href="<?php echo U('user/login');?>">登录</a> 或 <a href="<?php echo U('user/register');?>">免费注册</a></p>
			<?php elseif($logintype == 1): ?>
				<p>欢迎您,<a href="<?php echo U('member/index');?>"><?php echo ($visitor['member_name']); ?></a> | <a href="<?php echo U('user/loginout');?>">退出</a></p><?php endif; ?>
		</div>
	</div>
	<div id="gHeadM2M" class="margin1200">
		<h1><a href="#"><img src="/Public/web/images/logo_Px.png" alt="中国开源云联盟"></a></h1>
	</div>
	<div id="gHeadM3">
		<ul class="gHeadM3Nav margin1200">
			<li><a href="/">首页</a></li>
			<?php if(is_array($topcate)): $i = 0; $__LIST__ = $topcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/<?php echo ($top['controller']); ?>/<?php echo ($top['function']); ?>/id/<?php echo ($top['id']); ?>"><?php echo ($top['catename']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- <?php if($logintype == 2): ?><li><a href="<?php echo U('user/login');?>">登录</a></li>
			<?php else: ?>
				<li><a href="<?php echo U('user/loginout');?>">退出</a></li><?php endif; ?> -->
		</ul>
	</div>
</div>
<!-- Page Content 主题内容 -->
    
<div class="clear"></div>
<div class="slides">
  <!-- header END -->
  <div class="slide slide-2325" id="id_ec2647d10d904a86a9a153a6b3be60fe" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; -webkit-animation-iteration-count:1; border-bottom-width:0px; -webkit-animation-duration:1s; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; animation-delay:0; z-index:0; animation-iteration-count:1; animation-duration:1s; border-bottom-style:solid; -webkit-animation-delay:0; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <div class="mianbiaoxie d-legacy">
            <div class="b-macros-breadcrumb b-breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <a class="u-cursor" href="/">首页</a></li>
                <li>
                  <a class="u-cursor" href="/index.php/Home/listarticle/indexs/id/86">培训介绍</a></li>
              </ol>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2421" id="id_671b6a4c136c477f9d5b5dfff3cfb29a" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; background-position:50% 50%; border-left-color:#DDD; border-bottom-style:solid; background-size:cover; background-repeat:no-repeat; border-bottom-width:0px; border-right-color:#DDD; border-right-width:0px; border-right-style:solid; z-index:0; border-left-style:solid; padding-bottom:20px; border-top-color:rgb(221, 221, 221); border-top-width:0px; padding-top:20px; border-left-width:0px; border-bottom-color:rgb(221, 221, 221); ">
      <div class="s-container" style="background-size:cover; border-top-width:0px; border-left-color:#DDD; background-repeat:no-repeat; border-top-style:solid; border-left-width:0px; border-bottom-width:0px; border-right-color:#DDD; margin-right:auto; border-right-style:solid; border-right-width:0px; margin-left:auto; border-left-style:solid; border-bottom-style:solid; max-width:1100px; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; ">
        <div no-link="true">
          <link href="//cdn.bootcss.com/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">
          <script src="//cdn.bootcss.com/lightbox2/2.8.2/js/lightbox.min.js"></script>
          <div class="a-container">
            <div class="a-left b-group-border2">
              <div class="a-top u-mg-b-10">
                <h4 class="a-head b-group-border3">
                  <div class="s-components-text s-text1 " style="text-align:inherit; ">
                    <span style="font-size:18px; font-family:microsoft yahei; color:rgb(16, 70, 128); line-height:2.0; padding-top:0px; font-weight:bold; display:block; padding-left:0px; " id="id_fa7f9c0b7db4df6659428728"><a href="/index.php/Home/listarticle/indexs/id/86">培训介绍</a></span></div>
                </h4>
                <div class="">
                  <ul class="nav nav-pills" role="tablist">
                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation" class="u-cursor active b-group-border1">
                      <a href="/index.php/Home/<?php echo ($vo['controller']); ?>/<?php echo ($vo['function']); ?>/id/<?php echo ($vo["id"]); ?>" class="b-group-text1"><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>


                  </ul>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="a-right">
              <div class="b-group-border2">
                <h4 class="a-head b-group-text2 b-group-border3"><?php echo ($categroy["catename"]); ?></h4>
                <?php echo htmlspecialchars_decode(htmlspecialchars_decode($categroy[content])); ?>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer START --></div>
<div class="footclear"></div>

<!-- 底部文件 -->
<div id="gFooter">
    <div class="gFooterM" class="margin1487">
        Copyright © 2002-2017 培训 版权所有&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.yunpengnet.com/" target="_blank">技术支持</a><br>
    渝ICP备12345678号  &nbsp;&nbsp;
    </div>
</div>

</body>
</html>