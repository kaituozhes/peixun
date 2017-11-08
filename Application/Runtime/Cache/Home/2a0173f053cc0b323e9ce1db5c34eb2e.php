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
  <div class="slide slide-2325" id="id_c1dd9fb0c3694f20b467c2e628e875a3" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; -webkit-animation-iteration-count:1; border-bottom-width:0px; -webkit-animation-duration:1s; padding-bottom:0px; padding-top:20px; border-top-width:0px; border-left-color:#DDD; background-size:cover; background-repeat:no-repeat; border-right-style:solid; padding-right:0px; border-left-style:solid; border-top-color:#DDD; background-position:50% 50%; border-bottom-color:#DDD; border-right-color:#DDD; animation-delay:0; z-index:0; animation-iteration-count:1; animation-duration:1s; border-bottom-style:solid; -webkit-animation-delay:0; border-right-width:0px; border-left-width:0px; padding-left:0px; ">
      <div>
        <style>#id_c1dd9fb0c3694f20b467c2e628e875a3 img { max-width: 100%; } #id_c1dd9fb0c3694f20b467c2e628e875a3 .mianbiaoxie .breadcrumb { background-color: rgb(255, 255, 255); border: 1px solid rgb(217, 217, 217); border-radius: 0px; padding: 0; padding-left: 14px; } #id_c1dd9fb0c3694f20b467c2e628e875a3 .mianbiaoxie .breadcrumb:hover { border-color: rgb(217, 217, 217); background-color: rgb(255, 255, 255); } #id_c1dd9fb0c3694f20b467c2e628e875a3 .mianbiaoxie .breadcrumb li a { color: rgb(102, 102, 102); font-size: 12px; font-weight: normal; font-family: microsoft yahei; line-height: 37px; text-decoration: none; } #id_c1dd9fb0c3694f20b467c2e628e875a3 .mianbiaoxie .breadcrumb li a:hover { color: rgb(255, 105, 0); text-decoration: none; cursor: auto; } #id_c1dd9fb0c3694f20b467c2e628e875a3 .mianbiaoxie .breadcrumb li:last-child a { color: rgb(255, 105, 0); } .platform-standand { }</style></div>
      <div class="s-container" style="max-width:1100px; margin-right:auto; margin-left:auto; ">
        <div no-link="true">
          <div class="mianbiaoxie d-legacy">
            <div class="b-macros-breadcrumb b-breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <a class="u-cursor" href="/">首页</a></li>
                <li>
                  <a class="u-cursor" href="/contact.html">联系我们</a></li>
              </ol>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="slide slide-2398" id="id_9dbf89d89e8a40728f32a884b0d6cbb5" data-slide_settings="{&quot;auto_center_width&quot;:&quot;1100px&quot;,&quot;auto_center_type&quot;:&quot;none&quot;}">
    <div class="s-root s-layout-a " style="border-top-style:solid; background-position:50% 50%; border-left-color:#DDD; border-bottom-style:solid; background-size:cover; background-repeat:no-repeat; border-bottom-width:0px; border-right-color:#DDD; border-right-width:0px; border-right-style:solid; z-index:0; border-left-style:solid; padding-bottom:15px; border-top-color:#DDD; border-top-width:0px; padding-top:15px; border-left-width:0px; border-bottom-color:#DDD; ">
      <div>
        <style>#id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact .glo_contact_list { float: left; width: 49%; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact .glo_contact_list:nth-child(2n+1) { margin-right: 2%; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact .glo_contact_list.odd { clear: both; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .map_content > div { width: 100% !important; border: 1px solid #ddd !important; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .b-group-border1 { background-color: rgb(255, 255, 255); border: 1px solid rgb(217, 217, 217); border-radius: 0px; padding: 15px; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .b-group-border1:hover { border-color: rgb(217, 217, 217); background-color: rgb(255, 255, 255); } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .b-group-border2 { background-color: rgb(255, 255, 255); border-bottom: 1px solid rgb(217, 217, 217); border-radius: 0px; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .b-group-border2:hover { border-color: rgb(217, 217, 217); background-color: #FFF; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list h4 { color: rgb(102, 102, 102); font-size: 18px; font-weight: bold; text-align: left; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list h4:hover { color: None; text-decoration: none; cursor: auto; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list b { color: rgb(51, 51, 51); font-size: 12px; font-weight: bold; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list b:hover { color: None; text-decoration: none; cursor: auto; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list p { color: rgb(51, 51, 51); font-size: 13px; font-weight: normal; font-family: microsoft yahei; line-height: 2.0; text-decoration: none; } #id_9dbf89d89e8a40728f32a884b0d6cbb5 .glo_contact_list p:hover { color: None; text-decoration: none; cursor: auto; } .platform-standand { }</style></div>
      <div class="s-container" style="background-size:cover; background-repeat:no-repeat; margin-right:auto; margin-left:auto; max-width:1100px; background-position:50% 50%; ">
        <div no-link="true">
          <div class="a-container d-legacy">
            <div class="a-right b-group-border1">
              <h4 class="a-head b-group-border2">
                <div class="s-components-text s-text1 " style="text-align:inherit; ">
                  <span style="font-size:16px; font-family:microsoft yahei; color:rgb(16, 70, 128); line-height:1.8; padding-bottom:5px; font-weight:bold; display:block; " id="id_1f4f390c5fb1c1ff6be8600b">联系我们</span></div>
              </h4>
              <div class="">
                <div class="glo_contact">
                  <div class="glo_contact_list odd">
                  <?php echo htmlspecialchars_decode(htmlspecialchars_decode($catedata[content])); ?>
                    <br>
                    </div>
                </div>
                <div class="clearfix"></div>
                <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&amp;ak=z6ByGv9ZLALtjHOGVoGXGGx5"></script>
                <script type="text/javascript" src="http://api.map.baidu.com/getscript?v=2.0&amp;ak=z6ByGv9ZLALtjHOGVoGXGGx5&amp;services=&amp;t=20170707103901"></script>
                <div class="map_title" style="display:none;">
                  <h3>地图</h3>
                  </div>
					<div class="mapp">
						<div class="contact_map" id="allmap">
						</div>
					</div>
				    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&amp;ak=czl3CohuKbkxWSPHvSQyoIor"></script>
					<script type="text/javascript">
						// 百度地图API功能
						var map = new BMap.Map("allmap");    // 创建Map实例
						map.centerAndZoom(new BMap.Point(116.428789,39.955137), 16);  // 初始化地图,设置中心点坐标和地图级别
						map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
						map.setCurrentCity("深圳");          // 设置地图显示的城市 此项是必须设置的

						map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
						map.enableKeyboard(); //启用键盘上下左右键移动地图

						var marker1 = new BMap.Marker(new BMap.Point(116.428789,39.955137));  // 创建标注
						map.addOverlay(marker1);              // 将标注添加到地图中
						var label = new BMap.Label("北京市东城区安定门东大街1号", { offset: new BMap.Size(20, -10) });
						marker1.setLabel(label);


						//向地图中添加缩放控件
						var ctrl_nav = new BMap.NavigationControl({ anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE });
						map.addControl(ctrl_nav);
						//向地图中添加缩略图控件
						var ctrl_ove = new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 });
						map.addControl(ctrl_ove);
						//向地图中添加比例尺控件
						var ctrl_sca = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_BOTTOM_LEFT });
						map.addControl(ctrl_sca);
				</script>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
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