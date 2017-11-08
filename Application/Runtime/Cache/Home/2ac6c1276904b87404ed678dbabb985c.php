<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta charset="utf-8">
<title><?php echo ($title); ?></title>
<link href="/Public/web/css/style.css" rel="stylesheet">
<script src="/Public/web/js/jquery.js"></script>
<script src="/Public/web/js/jquery.flexslider-min.js"></script>
<!-- <style type="text/css">
	#page1 div{position: relative;padding-left: 0;margin: 1.5rem 0;list-style: none;color: #999;text-align: left;}
#page1 div a{color: #23abf0;border-radius: 3px;padding: 6px 12px;    position: relative;display:inline-block;text-decoration: none;line-height: 1.2;background-color: #fff;border: 1px solid #ddd;margin-bottom: 5px;margin-right: 5px;}
#page1 div span{background: #23abf0;color: #fff;border: 1px solid #23abf0;padding: 2px 12px;border-radius: 3px;display:inline-block;margin-right:5px;}
</style> -->
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
  <div class="slide slide-2346" id="id_26306b21ca1240b0a20a4f6128a9bbba" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; border-bottom-width:0px; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; z-index:0; border-bottom-style:solid; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div>
        <style>#id_26306b21ca1240b0a20a4f6128a9bbba img { max-width: 100%; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb { background-color: rgb(255, 255, 255); border: 1px solid rgb(217, 217, 217); border-radius: 0px; padding: 0; padding-left: 14px; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb:hover { border-color: rgb(217, 217, 217); background-color: rgb(255, 255, 255); } #id_26306b21ca1240b0a20a4f6128a9bbba .breadcrumb > li + li:before { color: rgb(217, 217, 217); } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb li a { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: 37px; text-decoration: none; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb li a:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb li { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: 37px; text-decoration: none; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb li:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_26306b21ca1240b0a20a4f6128a9bbba .mianbiaoxie .breadcrumb li:last-child { color: rgb(255, 105, 0); } .platform-standand { }</style></div>
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <div class="mianbiaoxie d-legacy">
            <div class="b-macros-breadcrumb b-breadcrumb">
              <ol class="breadcrumb b-detail-nav">
                <li>
                  <a href="/">首页</a></li>
<!--                 <li>
  <a href="/news.html">联盟动态</a></li>-->
                <li> <a href="/index.php/home/<?php echo ($cate["controller"]); ?>/<?php echo ($cate["function"]); ?>/id/<?php echo ($cateid); ?>"><?php echo ($cate["catename"]); ?></a></li>
                <li class="active"><?php echo ($arclst["title"]); ?></li></ol>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2365" id="id_9f3038663d68481faec8c6ce0bc5f858" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; border-bottom-width:0px; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; z-index:0; border-bottom-style:solid; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div>
        <style>#id_9f3038663d68481faec8c6ce0bc5f858 img { max-width: 100%; } #id_9f3038663d68481faec8c6ce0bc5f858 .shuxing { display: block; } #id_9f3038663d68481faec8c6ce0bc5f858 .zuihou { float: right; } #id_9f3038663d68481faec8c6ce0bc5f858 .s-icon2 { display: inline-block; } #id_9f3038663d68481faec8c6ce0bc5f858 .idearlist { overflow: hidden; } #id_9f3038663d68481faec8c6ce0bc5f858 .view-build .view-build-screen-mobile .slide { overflow-x: hidden; } #id_9f3038663d68481faec8c6ce0bc5f858 .jichengtu { margin-bottom: 30px; display: block; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-name h3 { color: rgb(102, 102, 102); font-size: 16px; text-align: center; line-height: 25px; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-name h3:hover { color: rgb(255, 105, 0); } #id_9f3038663d68481faec8c6ce0bc5f858 .date { display: block; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian { margin: 10px 0; display: block; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian .b-it { margin: 5px; float: left; text-align: center; } #id_9f3038663d68481faec8c6ce0bc5f858 .s-icon1 { display: inline-block; float: left; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian .b-it .b-group-text1 { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: inherit; text-decoration: none; padding: 0 8px; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian .b-it .b-group-text1:hover { color: rgb(255, 255, 255); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian .b-group-border1 { background-color: #FFF; border: 1px solid rgb(217, 217, 217); border-radius: 0px; } #id_9f3038663d68481faec8c6ce0bc5f858 .biaoqian .b-group-border1:hover { border-color: rgb(255, 105, 0); background-color: rgb(255, 105, 0); } #id_9f3038663d68481faec8c6ce0bc5f858 .s-button_form1 { display: inline-block; line-height: 36px; } #id_9f3038663d68481faec8c6ce0bc5f858 .s-button_form1 a { display: inline-block; vertical-align: inherit; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail li { display: inline-block; } #id_9f3038663d68481faec8c6ce0bc5f858 .s-text1, #id_9f3038663d68481faec8c6ce0bc5f858 .s-text2, #id_9f3038663d68481faec8c6ce0bc5f858 .s-text3 { height: 36px; line-height: 36px; display: inline-block; width: 100%; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail .div_nav { border-bottom: 2px solid rgb(16, 70, 128); } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail li .b-group-border2 a { background-color: rgb(255, 255, 255); border: 1px solid rgb(16, 70, 128); border-radius: 0px; height: 36px; line-height: 36px; border-bottom: 0; display: inline-block; width: 164px; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail li .b-group-border2 a:hover { border: 1px solid rgb(16, 70, 128); background-color: rgb(16, 70, 128); } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail { border-bottom: 1px solid rgb(217, 217, 217); border-radius: 0px; padding: 5px 0; margin-top: 5px; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail:hover { border-color: None; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail .div_nav { margin-bottom: 5px; } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail li a.on { background-color: rgb(16, 70, 128); border: 1px solid rgb(16, 70, 128); } #id_9f3038663d68481faec8c6ce0bc5f858 .info_detail li .on span { color: rgb(255, 255, 255) !important; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text2 { color: rgb(51, 51, 51); font-size: 12px; font-weight: normal; text-align: inherit; font-family: microsoft yahei; line-height: 1.5; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text2:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text3 { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text3:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border4 { background-color: rgba(255, 255, 255, 0); border-bottom: 1px solid rgb(217, 217, 217); border-radius: 0px; padding-top: 5px !important; padding-bottom: 5px !important; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border4:hover { border-color: rgb(255, 105, 0); background-color: rgb(255, 255, 255); } #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a, #id_9f3038663d68481faec8c6ce0bc5f858 .pager > a:focus, #id_9f3038663d68481faec8c6ce0bc5f858 .pager > a:hover, #id_9f3038663d68481faec8c6ce0bc5f858 .pager li > span { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: inherit; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a:hover, #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a:focus, #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a:hover, #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > span:hover { color: rgb(255, 255, 255); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a, #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > span { margin-top: 40px; background-color: #FFF; border: 1px solid rgb(217, 217, 217); border-radius: 50px; } #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > a:hover, #id_9f3038663d68481faec8c6ce0bc5f858 .fanpian .pager li > span:hover { border-color: rgb(255, 105, 0); background-color: rgb(255, 105, 0); } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text5 { color: rgb(153, 153, 153); font-size: 12px; font-weight: normal; text-align: center; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text5:hover { color: None; text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text6 { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: inherit; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text6:hover { color: rgb(255, 255, 255); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border6 { background-color: #FFF; border: 1px solid rgb(217, 217, 217); border-radius: 50px; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border6:hover { border-color: rgb(255, 105, 0); background-color: rgb(255, 105, 0); } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text7 { color: rgb(153, 153, 153); font-size: 12px; font-weight: normal; text-align: center; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text7:hover { color: None; text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border7 { background-color: rgb(255, 255, 255); border: 1px solid rgb(217, 217, 217); border-radius: 0px; padding: 20px; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border7:hover { border-color: rgb(217, 217, 217); background-color: rgb(255,
          255, 255); } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat { background-color: rgb(255, 255, 255); border: 1px solid rgb(217, 217, 217); border-radius: 0px; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat:hover { border-color: rgb(217, 217, 217); background-color: #FFF; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat-content > .dt-tag-list {overflow:hidden; padding: 5px 0; padding-right: 5px; padding-left: 5px; border-left: 1px solid rgb(217, 217, 217); } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat-content > .dt-tag-list:hover { border-color: rgb(217, 217, 217); } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat-title { width: 140px; color: rgb(51, 51, 51); font-size: 20px; font-weight: normal; text-align: center; font-family: microsoft yahei; line-height: inherit; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-cat-title:hover { color: None; text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-tag-list a { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: 1.5; text-decoration: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-tag-list a:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-tag-list a { background-color: #FFF; border: 1px none rgb(217, 217, 217); border-radius: 0px; margin: 5px 5px; padding: 0 15px; } #id_9f3038663d68481faec8c6ce0bc5f858 .a-catgory .dt-tag-list a:hover { border-color: rgb(255, 105, 0); background-color: #FFF; } #id_9f3038663d68481faec8c6ce0bc5f858 .pinbran { text-align: center; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border10 { background-color: #FFF; border: 1px none rgb(217, 217, 217); border-radius: 3px; display: none; padding: 2px; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border10 img { border-radius: 3px; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-border10:hover { border-color: rgb(255, 102, 0); background-color: #FFF; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text10 { color: rgb(0, 0, 0); font-size: 14px; font-weight: normal; text-align: inherit; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; display: none; } #id_9f3038663d68481faec8c6ce0bc5f858 .b-group-text10:hover { color: rgb(255, 102, 0); text-decoration: none; cursor: auto; } .platform-standand { }</style>
      </div>
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <script src="http://s2.d2scdn.com/static/js/jq-plug.js"></script>
          <script src="http://s2.d2scdn.com/static/cart/js/shop_common.js"></script>
          <script>window.CONFIG = window.CONFIG || {};
            window.CONFIG.CART_ACCESSORY_TEMPLATE = 'page/snippets/cart_accessory.html';</script>
          <script src="http://s2.d2scdn.com/static/cart/js/utils.52d75d27.js"></script>
          <div class="a-catgory">
            <style>.dt-cat {height: auto;border: 1px solid #d9d9d9;overflow:hidden;margin-bottom:20px;} .dt-cat .dt-vline {float: left;width: 1px;height: 1px;background-color: #ebebeb;} .dt-cat-inner {display: table;} .dt-cat-title {display: table-cell;vertical-align: middle;width: 222px;text-align: center;font-size: 20px;color: #666;} .dt-cat-content {display: table-cell;} .dt-sub-cat {float: left;margin-left: -1px;padding: 20px 0;} .dt-sub-cat-name {height: 14px;line-height: 14px;padding-left: 26px;font-size: 12px;color: #888888;} .dt-tag-list {padding-top: 10px;padding-right: 10px;} .dt-tag-list a {float: left;margin-left: 18px;font-size: 13px;line-height: 24px;color: #666; border-radius: 3px;padding:0 5px;} .dt-tag-list a:hover{color:#009790;} .dt-tag-list a.cur {background-color:#009790;color: #ffffff;text-decoration: none;} .dt-cat-content > .dt-tag-list {padding: 20px 0;padding-right: 20px;padding-left: 10px;border-left: 1px solid #d9d9d9;} .dt-tag-list .li-level-1 {float: left;display:block;} .dt-tag-list .li-level-1 .pos a{ background-color:#009790; color: #ffffff; text-decoration: none;} .dt-tag-list ul{margin:0;}</style>
            <div class="dt-cat">
              <table class="dt-cat-inner" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td class="dt-cat-title"><?php echo ($cate["catename"]); ?></td>
                    <td class="dt-cat-content">
                      <div class="dt-tag-list clearfix">
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/index.php/home/<?php echo ($vo["controller"]); ?>/<?php echo ($vo["function"]); ?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
<!--                         <a href="/usercategory/news/282212/">会议内容</a>
<a href="/usercategory/news/282213/">最新动态</a>
<a href="/usercategory/news/282214/">技术分享</a> -->
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <script>$(function() {
                $("#dt-cat-" + 282212).addClass("cur");
              });</script>
          </div>
          <div class="clearfix"></div>
          <div class="idearlist  d-legacy">
            <div class="b-group-border7">
              <div class="a-name">
                <h3><?php echo ($arclst["title"]); ?></h3>
                <span class="date b-group-text5">2016-11-29</span>
                <div class="clearfix u-mg-b-20"></div>
              </div>
              <div class="clearfix"></div>
              <div class="a-images clearfix">
                <div class="jichengtu clearfix">
                  <!-- images -->
                  <link href="//cdn.bootcss.com/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">
                  <style>@media (min-width: 640px) { .image-row { text-align: left; } } .example-image-link { display: block; text-align: center; /* padding: 2px; */ margin: 0 0.5rem 1rem 0.5rem; background-color: #fff; line-height: 0; border-radius: 0px; } .example-image-link:hover { /* background-color: #4ae; */ transition: none; } .example-image { border: 2px solid rgba(0, 0, 0, 0); max-width: 100%; border-radius: 0px; transition: background-color 0.5s ease-out; } .example-image:hover { background-color: #4ae; transition: none; }</style>
                  <div class="image-row">
                    <div class="image-set"></div>
                    <script src="//cdn.bootcss.com/lightbox2/2.8.2/js/lightbox.min.js"></script>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="section_body info_detail">
                  <div id="id_9f3038663d68481faec8c6ce0bc5f858_deltabs">
                    <div id="id_9f3038663d68481faec8c6ce0bc5f858_div_nav_fixed">
                      <div id="id_9f3038663d68481faec8c6ce0bc5f858_div_nav" class="div_nav clearfix">
                        <ul class="box">
                          <li>
                            <div class="b-group-border2">
                              <a href="javascript:;" data-idx="0" class="on">
                                <div class="s-components-text s-text1 " style="text-align:center; ">
                                  <span style="font-size:14px; font-family:microsoft yahei; color:#000; line-height:inherit; font-weight:normal; display:block; " id="id_7fe557fdf6d56cf24acccf53">图文详情</span></div>
                              </a>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="id_9f3038663d68481faec8c6ce0bc5f858_div_sections" class="div_sections neijianju">
                      <section class="section_detail typo" data-role="widget" data-widget="img_prev_view" style="display: block; top: 0px;">
                        <div>
                         
                          <?php echo htmlspecialchars_decode(htmlspecialchars_decode($arclst[body])); ?>
                        </div>
                      </section>




                      <section class="section_specification" style="display: none;">
                        <div class="pinbran">
                          <div class="b-ipin">
                            <div class="bmarpin">
                              <div class="b-group-border10">
                                <a>
                                  <img src="" alt=""></a>
                              </div>
                              <div class="lbit">
                                <a class="title b-group-text10"></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <dl>
                          <div></div>
                        </dl>
                      </section>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="biaoqian clearfix">
                  <div class="r-components-icon s-icon1 " click-icon="slide.components.icon1" style="border-radius:0px; padding-top:5px; padding-right:5px; background-color:transparent; text-align:inherit; ">
                    <a>
                      <i style="color:rgb(182, 182, 182); font-size:20px; " id="id_da304853fe402a541289e710" class=" fa fa-tag "></i>
                    </a>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="fanpian">
                  <div class="a-page">
                    <style>.a-width-limit-120 { text-overflow: ellipsis; overflow: hidden; white-space: nowrap; max-width: 120px; }</style>
                    <nav>
                      <ul class="pager">


<!--                                             <?php if($sortart['prev'] == '没有了' ): ?>上一篇：<?php echo ($sortart['prev']); ?>
        <a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['next']['tid']));?>">下一篇：<?php echo ($sortart['next']['name']); ?></a>
      <?php elseif($sortart['next'] == '没有了' ): ?>
        <a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['prev']['tid']));?>">上一篇：<?php echo ($sortart['prev']['name']); ?></a>
        下一篇：<?php echo ($sortart['next']); ?>
      <?php else: ?>
        <a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['prev']['tid']));?>">上一篇：<?php echo ($sortart['prev']['name']); ?></a>
        <a href="<?php echo U('listarticle/detail',array('tid'=>$sortart['next']['tid']));?>">下一篇：<?php echo ($sortart['next']['name']); ?></a><?php endif; ?> -->

                        <?php if($sortart['prev'] == '没有了' ): ?><li class="previous"><a class="a-width-limit-120" href="">
                            <span aria-hidden="true">←&nbsp;&nbsp;</span><?php echo ($sortart['prev']); ?></a>
                        </li>

                        <li class="next"><a class="a-width-limit-120" href="<?php echo U('article/index',array('id'=>$sortart['next']['tid']));?>"><?php echo ($sortart['next']['name']); ?>
                            <span aria-hidden="true">&nbsp;&nbsp;→</span></a>
                        </li>
                        <?php elseif($sortart['next'] == '没有了' ): ?>

                        <li class="previous"><a class="a-width-limit-120" href="<?php echo U('article/index',array('id'=>$sortart['prev']['tid']));?>">
                            <span aria-hidden="true">←&nbsp;&nbsp;</span><?php echo ($sortart['prev']['name']); ?></a>
                        </li>

                        <li class="next"><a class="a-width-limit-120" href=""><?php echo ($sortart['next']); ?>
                            <span aria-hidden="true">&nbsp;&nbsp;→</span></a>
                        </li>
                        <?php else: ?>

                        <li class="previous"><a class="a-width-limit-120" href="<?php echo U('article/index',array('id'=>$sortart['prev']['tid']));?>">
                            <span aria-hidden="true">←&nbsp;&nbsp;</span><?php echo ($sortart['prev']['name']); ?></a>
                        </li>

                        <li class="next"><a class="a-width-limit-120" href="<?php echo U('article/index',array('id'=>$sortart['next']['tid']));?>"><?php echo ($sortart['next']['name']); ?>
                            <span aria-hidden="true">&nbsp;&nbsp;→</span></a>
                        </li><?php endif; ?>




                        




                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footclear"></div>

<!-- 底部文件 -->
<div id="gFooter">
    <div class="gFooterM" class="margin1487">
        Copyright ©  2012-2017 中国开源云联盟&nbsp;&nbsp;&nbsp;&nbsp; 版权所有  渝ICP备12345678号<br>
    <a href="http://www.xsky.com/" target="_blank">技术支持：星辰天合(北京)数据科技有限公司</a>  &nbsp;&nbsp;
    </div>
</div>

</body>
</html>