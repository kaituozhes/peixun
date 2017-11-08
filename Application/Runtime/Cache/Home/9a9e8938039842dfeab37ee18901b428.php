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
                  <a class="u-cursor" href="/index.php/Home/prove/xuesheng.html">学生成绩查询</a></li>

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
                    <span style="font-size:18px; font-family:microsoft yahei; color:rgb(16, 70, 128); line-height:2.0; padding-top:0px; font-weight:bold; display:block; padding-left:0px; " id="id_fa7f9c0b7db4df6659428728">查询</span></div>
                </h4>
                <div class="">
                  <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="u-cursor active b-group-border1">
                      <a href="<?php echo U('prove/index');?>" class="b-group-text1">证书查询</a></li>
                      <li role="presentation" class="u-cursor active b-group-border1">
                      <a href="<?php echo U('prove/xuesheng');?>" class="b-group-text1">学生成绩查询</a></li>
                      <li role="presentation" class="u-cursor active b-group-border1">
                      <a href="<?php echo U('prove/jiangshi');?>" class="b-group-text1">讲师信息查询</a></li>
                      <!-- <li>
                      <a href="/index.php/Home/member/index" class="b-group-text1">个人中心</a></li> -->

                  </ul>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="a-right">
              <div class="b-group-border2">
                <h4 class="a-head b-group-text2 b-group-border3">学生成绩查询</h4>
                <ul class="person">
               <form class="" method="post" action="<?php echo U('prove/xuesheng');?>" enctype="multipart/form-data" onsubmit="return check();">
                学生学号: <br/><input style="width:650px;height:30px;" type="text" id="tel" name="code" /><br/>
                <input type="submit" value="查询" class="submit"/>
              </form>

                </ul>



            

            <div class="cjcx_td">
              
          <div class="td">
            <br>
            <?php if($student[realname] == ''): else: ?>
            <p class="sec"><span class="blue">姓名</span><span><?php echo ($student["realname"]); ?></span></p><?php endif; ?>
            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="sec"><span class="blue"><?php echo ($v["agencyname"]); ?> : <?php echo ($v["subject_name"]); ?></span><span>
            <?php if($v[stage] == 0): ?>暂无进度<?php endif; ?>
            <?php if($v[stage] == 1): ?>课程学习<?php endif; ?>
            <?php if($v[stage] == 2): ?>考试准备<?php endif; ?>
            <?php if($v[stage] == 3): ?>考试完成 | <?php echo ($v[fen]); ?> 分<?php endif; ?>
            </span></p><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?> 
          </div>
        </div>

                              

                                    
  
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
 function check(){  

      var name = document.getElementById("tel");
            if (name.value == "") {
                alert("请填写学生学号！");
                name.focus();
                return false;
            }
            if (name.value.length <= 9) {
                alert("学生学号格式不正确！");
                name.focus();
                return false;
            }
            if (name.value.length >= 15) {
                alert("学生学号格式不正确！");
                name.focus();
                return false;
            }
}


</script>
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