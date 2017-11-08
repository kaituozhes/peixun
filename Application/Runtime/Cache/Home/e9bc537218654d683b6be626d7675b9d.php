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
<div class="fyMain">
  <div class="pronaa">
  </div>
  <!--栏目分类开始-->
  <!--栏目分类结束--> 
  
  <!--图片内容开始-->
  <div class="productfra">
    <h2 class="center"><?php echo ($duart['title']); ?></h2>
    <div class="title_s">
      <div class="divleft">浏览次数：<span id="hits"><?php echo ($duart['click']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo (date("Y-m-d",$duart['pubdate'])); ?></div>
      <div class="divright"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more" style="line-height:16px;">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script> 
        <!-- Baidu Button END --></div>
    </div>
    <div class="padding25">
      <div class="newsview">
        <p><?php echo html_entity_decode(html_entity_decode($duart['body'])); ?></p>
      </div>
      <div class="viewpage">
      	<!--上一篇 下一篇 开始-->
        <div class="main_r_nav">
        	<?php if($sortart['prev'] == '没有了' ): ?>上一篇：<?php echo ($sortart['prev']); ?>
				<a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['next']['tid']));?>">下一篇：<?php echo ($sortart['next']['name']); ?></a>
			<?php elseif($sortart['next'] == '没有了' ): ?>
				<a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['prev']['tid']));?>">上一篇：<?php echo ($sortart['prev']['name']); ?></a>
				下一篇：<?php echo ($sortart['next']); ?>
			<?php else: ?>
				<a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['prev']['tid']));?>">上一篇：<?php echo ($sortart['prev']['name']); ?></a>
				<a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['next']['tid']));?>">下一篇：<?php echo ($sortart['next']['name']); ?></a><?php endif; ?>
        </div>
        <!--上一篇 下一篇 结束-->
        <div class="returnlist"> <a href="javascript:;" onclick="window.history.go(-1)" title="返回列表">返回上页</a> </div>
      </div>
    </div>
  </div>
  <!--图片内容结束--> 
</div>
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