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
    
<div id="gHeadM4">
		<div class="gHeadM4Banner">
			<div class="banner">
				<ul class="slides">
					<?php if(is_array($hs_mess)): foreach($hs_mess as $key=>$gear): ?><li><a href="<?php echo ($gear['jump_link']); ?>"><img src="/Public/<?php echo ($gear['image']); ?>" /></a></li><?php endforeach; endif; ?>
				</ul>
	   		</div>
			<script type="text/javascript">
				$(function() {
				    $(".banner").flexslider({
						slideshowSpeed: 4000, //展示时间间隔ms
						animationSpeed: 400, //滚动时间ms
						touch: true //是否支持触屏滑动
					});
				});	
			</script>

		</div>
	</div>
<script src="../../skin/js/jquery.superslide.2.1.1.js"></script>
<div id="gBodyM1" class="margin1200">
	<div class="gBodyM1L">
			<dl>
				<dt>
					<p class="xlcx"><a href="/index.php/Home/prove/index.html">证书查询</a></p>
					<p>可查询国家承认的技能能力认证证书信息</p>
				</dt>
			</dl>
			<dl>
				<dt>
					<p class="zxyz"><a href="/index.php/Home/prove/xuesheng.html">学生成绩查询</a></p>
					<p>在线查询成绩信息</p>
				</dt>
			</dl>
			<dl>
				<dt>
					<p class="xlrz"><a href="/index.php/Home/prove/jiangshi.html">培训师信息查询</a></p>
					<p>在线查询培训讲师信息</p>
				</dt>
			</dl>
	</div>
	<div class="gBodyM1R">
		<div class="gBodyM1RM">
			<h3>登录培训管理页面</h3>
			<form action="<?php echo U('user/login');?>"method="post" class="login-form">
			<p><span>用户名</span><input type="text" name="username" required/></p>
			<p class="marginTopT"><span>密码</span><input type="password" name="password" required/></p>
			<p class="marginTopB">
				<input type="submit" value="登录" class="submit"/>
				<a href="/index.php/Home/user/register.html" class="submit"/>注册</a>
			</p>

		</div>
	</div>
</div>
<div id="gBodyM2" class="margin1200">
	<div class="gBodyM2L">
		<h3 class="news">新闻动态<span>Conference content</span></h3>
		<hr/>
		<br/>
		<div class="newsBo">
			<ul>
			<!--news lst-->
			<?php if(is_array($weninfo)): $i = 0; $__LIST__ = $weninfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article/index',array('id'=>$vo[tid]));?>"><?php echo (mb_substr($vo["title"],0,30,'utf-8')); ?></a><span><?php echo (date('Y-m-d',$vo["pubdate"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>	

			</ul>
		</div>
	</div>
	<div class="index_news_fr">
		<h3 class="news">会议通知<span>Meeting notice</span></h3>
		<hr/>
		<br/>
		<ul>
		<?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article/index',array('id'=>$vo[tid]));?>"><img src="/Public/<?php echo ($vo['litpic']); ?>" width="146" height="105"/><p><?php echo (mb_substr($vo["title"],0,12,'utf-8')); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<div class="index_about">
	<div class="margin1200">
		<div class="fl">
		<?php if(is_array($about)): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h3><?php echo ($vo["title"]); ?>-<?php echo ($vo["shorttitle"]); ?></h3>
			<p>

			<?php echo ($vo["description"]); ?>
			
			</p>
			<a href="<?php echo U('listarticle/indexabout',array('id'=>95));?>">查看更多</a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="fr">
			<ul class="about clearfix">


			  <li class="b-amount-2 ">
				<div class="img">
				  <a href="<?php echo U('news/zucheng',array('id'=>'97'));?>" target="_blank">
					<img src="/Public/<?php echo ($catea["cateimg"]); ?>" alt="组成单位"></a>
				</div>
				<div class="text-wrap b-group-border2">
				  <a class="" href="<?php echo U('news/zucheng',array('id'=>'97'));?>" target="_blank">
					<h3 class="b-group-text2"><?php echo ($catea["catename"]); ?></h3></a>
				  <p class="b-group-text3">
				  <?php echo htmlspecialchars_decode(htmlspecialchars_decode($catea[content])); ?>

				  </p></div>
			  </li>



			  <li class="b-amount-2 ">
				<div class="img">
				  <a href="<?php echo U('news/lingdao',array('id'=>'98'));?>" target="_blank">
					<img src="/Public/<?php echo ($cateb["cateimg"]); ?>" alt="联盟领导"></a>
				</div>
				<div class="text-wrap b-group-border2">
				  <a class="" href="<?php echo U('news/lingdao',array('id'=>'98'));?>" target="_blank">
					<h3 class="b-group-text2"><?php echo ($cateb["catename"]); ?></h3></a>
				  <p class="b-group-text3">
				<?php echo htmlspecialchars_decode(htmlspecialchars_decode($cateb[content])); ?>
				   </p></div>
			  </li>
			  <li class="b-amount-2 ">
				<div class="img">
				  <a href="<?php echo U('news/zuzhi',array('id'=>'99'));?>" target="_blank">
					<img src="/Public/<?php echo ($catec["cateimg"]); ?>" alt="组织机构"></a>
				</div>
				<div class="text-wrap b-group-border2">
				  <a class="" href="<?php echo U('news/zuzhi',array('id'=>'99'));?>" target="_blank">
					<h3 class="b-group-text2"><?php echo ($catec["catename"]); ?></h3></a>
				  <p class="b-group-text3">
				<?php echo htmlspecialchars_decode(htmlspecialchars_decode($catec[content])); ?>
				  </p></div>
			  </li>
			  <li class="b-amount-2 ">
				<div class="img">
				  <a href="<?php echo U('news/jiaru',array('id'=>'100'));?>" target="_blank">
					<img src="/Public/<?php echo ($cated["cateimg"]); ?>" alt="加入联盟"></a>
				</div>
				<div class="text-wrap b-group-border2">
				  <a class="" href="<?php echo U('news/jiaru',array('id'=>'100'));?>" target="_blank">
					<h3 class="b-group-text2"><?php echo ($cated["catename"]); ?></h3></a>
				  <p class="b-group-text3">
<?php echo htmlspecialchars_decode(htmlspecialchars_decode($cated[content])); ?>
				  </p></div>
			  </li>
			</ul>			
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- <div id="gBodyM3" class="margin1487">
	<div class="gBodyM3L">
		<h3><span>其他信息服务</span></h3>
		<dl>
			<dt>
				<p>全国征兵网</p>
				<p>全国征兵报名唯一官方网站</p>
			</dt>
			<dd>
				<ul>
					<li class="gBodyTitle">兵役登记</li>
					<li><a href="#">男兵</a></li>
					<li class="gBodyTitle">应征报名</li>
					<li><a href="#">男兵</a></li>
					<li><a href="#">女兵</a></li>
					<li><a href="#">直招士官</a></li>
				</ul>
				<ul>
					<li><a href="#">政策法规</a></li>
					<li><a href="#">工作动态</a></li>
					<li><a href="#">国防知识</a></li>
					<li><a href="#">在线咨询</a></li>
					<li><a href="#">廉洁举报</a></li>
				</ul>
			</dd>
		</dl>
		<dl>
			<dt>
				<p>全国征兵网</p>
				<p>全国征兵报名唯一官方网站</p>
			</dt>
			<dd>
				<ul>
					<li class="gBodyTitle">兵役登记</li>
					<li><a href="#">男兵</a></li>
					<li class="gBodyTitle">应征报名</li>
					<li><a href="#">男兵</a></li>
					<li><a href="#">女兵</a></li>
					<li><a href="#">直招士官</a></li>
				</ul>
				<ul>
					<li><a href="#">政策法规</a></li>
					<li><a href="#">工作动态</a></li>
					<li><a href="#">国防知识</a></li>
					<li><a href="#">在线咨询</a></li>
					<li><a href="#">廉洁举报</a></li>
				</ul>
			</dd>
		</dl>
		<dl>
			<dt>
				<p>全国征兵网</p>
				<p>全国征兵报名唯一官方网站</p>
			</dt>
			<dd>
				<ul>
					<li class="gBodyTitle">兵役登记</li>
					<li><a href="#">男兵</a></li>
					<li class="gBodyTitle">应征报名</li>
					<li><a href="#">男兵</a></li>
					<li><a href="#">女兵</a></li>
					<li><a href="#">直招士官</a></li>
				</ul>
				<ul>
					<li><a href="#">政策法规</a></li>
					<li><a href="#">工作动态</a></li>
					<li><a href="#">国防知识</a></li>
					<li><a href="#">在线咨询</a></li>
					<li><a href="#">廉洁举报</a></li>
				</ul>
			</dd>
		</dl>
	</div>
	<div class="gBodyM3R">
		<h3><span>学校官方微信</span></h3>
		<div><img src="/Public/web/images/little_logo.jpg" alt="" /></div>
		<div><img src="/Public/web/images/little_logo.jpg" alt="" /></div>
	</div>
</div> -->
<!-- <div id="gBodyM4" class="margin1200"> -->
	<!-- <div class="gBodyM4L"> -->
		<!-- <h3><span>关于我们 <i>about us</i></span></h3> -->
		<!-- <div class="gBodyM4Bot"> -->
			<!-- <div class="picScroll-left picScroll-leftM"> -->
			<!-- <div class="bd"> -->
			<!-- <a class="next"></a> -->
				<!-- <ul class="picList"> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <img src="/Public/web/images/aboutus.jpg" alt="关于我们" /> -->
					<!-- </li> -->
				<!-- </ul> -->
				<!-- <a class="prev"></a> -->
			<!-- </div> -->
		<!-- </div> -->

		<!-- <script type="text/javascript"> -->
			<!-- jQuery(".picScroll-leftM").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,scroll:1,vis:2}); -->
		<!-- </script> -->
		<!-- </div> -->
	<!-- </div> -->
	<!-- <div class="gBodyM4R"> -->
		<!-- <p>中国开源云联盟（简称“COSCL”）由Intel、新浪网、中标软件和上海交大于2012年8月共同发起创立，是中国最早专注于OpenStack的专业联盟，一直致力于在中国推动OpenStack技术开发、操作系统支持、性能优化、规模部署等工作。2016年，在工业和信息化部信息化和软件服务业司的指导下，中国开源云联盟正式挂靠中国电子技术标准化研究院，推进联盟后续工作。中国电子技术标准化研究院作为工信部直属的电子信息领域标准化研究机构，一直致力于联合产业界推动开源软件技术和开源标准化工作的发展，探索开源标准与国家标准、国际标准</p> -->
		<!-- <a href="#">查看更多+</a> -->
	<!-- </div> -->
<!-- </div> -->

<!-- 底部文件 -->
<div id="gFooter">
    <div class="gFooterM" class="margin1487">
        Copyright ©  2012-2017 中国开源云联盟&nbsp;&nbsp;&nbsp;&nbsp; 版权所有  渝ICP备12345678号<br>
    <a href="http://www.xsky.com/" target="_blank">技术支持：星辰天合(北京)数据科技有限公司</a>  &nbsp;&nbsp;
    </div>
</div>

</body>
</html>