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
  <!-- header END -->
  <div class="slide slide-2325" id="id_05d8ef6867fa48f5894faca26312c7e4" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; -webkit-animation-iteration-count:1; border-bottom-width:0px; -webkit-animation-duration:1s; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; animation-delay:0; z-index:0; animation-iteration-count:1; animation-duration:1s; border-bottom-style:solid; -webkit-animation-delay:0; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
   
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <div class="mianbiaoxie d-legacy">
            <div class="b-macros-breadcrumb b-breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <a class="u-cursor" href="/">首页</a></li>
                <?php if(is_array($abc)): $i = 0; $__LIST__ = $abc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="u-cursor" href="<?php echo U('micarticle/index',array('id'=>$vo[id]));?>"><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ol>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2326" id="id_9b8881e8819c42e282503b834de489fb" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; border-bottom-width:0px; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; z-index:0; border-bottom-style:solid; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div class="s-container" style="border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px; border-right-color:#DDD; margin-right:auto; border-right-style:solid; border-right-width:1px; border-left-style:solid; margin-left:auto; max-width:1100px; border-top-color:#DDD; border-bottom-color:#DDD; border-left-width:1px; border-left-color:#DDD; ">
        <div no-link="true">
          <div class="b-filter d-legacy">
            <style>/* nofmt */ .zifen {background: #FAFAFA;padding-top: 5px;} .filter-category {margin-bottom:20px; background: #fff; border: 1px solid #ddd;} .filter-category dl{} .filter-category dl + dl{border-top:1px dotted #ddd;} .filter-category dl dt{line-height: 37px; color:#DB5c96; float:left;text-indent: 10px;} .filter-category dl dd{padding:10px 0 0 10px; background:#fff; margin-left:55px;} .filter-category dl dd a{display: inline-block; height:19px; line-height:19px; overflow:hidden; margin: 0 4px 4px; padding:0 5px;} .filter-category dl dd a:hover,.filter-category dl dd a.curr{background-color: #DB5c96; color: #fff; text-decoration:none;border-radius: 1px;} .filter-brand { /* border: 1px solid #ddd; */ } .filter-brand-item { float: left; border: 1px solid #DDD; margin: -1px -1px 0 0; text-align: center; } .filter-brand-item a { display: block; width: 95px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; padding: 2px; font-size: 12px; } .filter-brand-item img { width: 99px; } .filter-brand-name { display: block; margin: 2px auto; } .filter-brand-name:hover { text-decoration: none !important; } .filter-brand-name span { color: #999; } .filter-brand .filter-brand-item { display: none; } .filter-brand .filter-brand-item:first-child { display: block; } .filter-brand.slick-initialized .filter-brand-item { display: block; } .filter-brand-item:focus { outline-style: none; } .filter-brand-item.active { background-color: #eee; font-weight: bold; }</style>
            <div class="filter-category">
              <dl class="b-category-dl">
                <dt>工作方案分类：</dt>
                <dd>
                <?php if(is_array($Crumbs)): $i = 0; $__LIST__ = $Crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="curr" href="<?php echo U('micarticle/index',array('id'=>$vo[pid]));?>">全部</a><?php endforeach; endif; else: echo "" ;endif; ?>  
                  <?php if(is_array($Crumbs)): $i = 0; $__LIST__ = $Crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="curr" href="<?php echo U('micarticle/index',array('id'=>$vo[id]));?>"><?php echo ($vo["catename"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
              </dl>
            </div>
            <script>if (typeof $.fn.slick === 'function') {
                $('.filter-brand-item').css('margin-top', 0);
                $('.filter-brand').slick({
                  slidesToShow: 11,
                  slidesToScroll: 1,
                  autoplay: true,
                  infinite: true,
                  speed: 2000,
                  autoplaySpeed: 0,
                  cssEase: 'linear'
                });
              } else {
                $('.filter-brand-item').show();
              }</script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2315" id="id_eb49ce589265484da137af55121b46cc" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="background-size:cover; border-top-width:0px; border-left-color:#DDD; background-repeat:no-repeat; border-top-style:solid; border-left-width:0px; border-bottom-width:0px; border-right-color:#DDD; border-bottom-color:#DDD; border-right-style:solid; z-index:0; border-left-style:solid; padding-bottom:0px; border-right-width:0px; border-top-color:#DDD; background-position:50% 50%; padding-top:20px; border-bottom-style:solid; ">
      <div class="s-container" style="background-size:cover; background-repeat:no-repeat; margin-right:auto; margin-left:auto; max-width:1100px; background-position:50% 50%; ">
        <div no-link="true">
          <div class="sort d-legacy b-group-border1">
            <dl>
              <dd class="curr up">
                <a href="/index.php/Home/micarticle/index/id/<?php echo ($id); ?>" class="b-group-text1">默认排序</a></dd>
              <dd>
  <a href="/index.php/Home/micarticle/indextop/id/<?php echo ($id); ?>" class="b-group-text1">发布时间
  <?php if($desc == 1): ?><i></i>
  <?php else: ?>
  <i style="background:url(http://s2.d2scdn.com/photos/2015/03/31/rY9kTnKxfbXVmCRiMYFQUR.png) no-repeat -85px -108px;"></i><?php endif; ?>  
  </a>
</dd>
            </dl>
            <div class="right b-group-text1">共
              <span><?php echo ($num); ?></span>个结果</div></div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2388" id="id_0adafdd14afe4a7fab8d58724596c48f" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; -webkit-animation-iteration-count:1; border-bottom-width:0px; -webkit-animation-duration:1s; padding-bottom:0px; padding-top:15px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; animation-delay:0; z-index:0; animation-iteration-count:1; animation-duration:1s; border-bottom-style:solid; -webkit-animation-delay:0; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <ul class="wrap js_plugin_paginate_items clearfix">

            <?php if(is_array($catearc)): $i = 0; $__LIST__ = $catearc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="b-amount-1">
              <a href="<?php echo U('article/index',array('id'=>$vo['tid']));?>" target="_blank" class="tit">
                <div class="list b-group-border1 clearfix">
                  <div class="num"><div class="yue b-group-text4 b-group-border3"><?php echo (date('m',$vo["pubdate"])); ?></div><div class="ri b-group-text5 b-group-border4"><?php echo (date('d',$vo["pubdate"])); ?></div></div>
                  <div class="text-wrap">
                    <h3 class="b-group-text1"><?php echo ($vo["title"]); ?></h3>
                    <div class="descrip b-group-text2"><?php echo ($vo["description"]); ?></div>
                    <div class="hupji clearfix">
                      <div class="price"></div>
                      <div class="dis-wrap">
                        <div class="s-button_form1 s-components-button " click-button-form="slide.components.button_form1" style="padding-top:10px; "></div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
           
          </ul>
          <div class="clearfix"></div>
          <div class="fenye d-legacy">
            <div class="page">
              <?php echo ($page); ?>
            </div>
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
        Copyright ©  2012-2017 中国开源云联盟&nbsp;&nbsp;&nbsp;&nbsp; 版权所有  渝ICP备12345678号<br>
    <a href="http://www.xsky.com/" target="_blank">技术支持：星辰天合(北京)数据科技有限公司</a>  &nbsp;&nbsp;
    </div>
</div>

</body>
</html>