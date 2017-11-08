<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>网站后台操作系统</title>
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
    <script src="/Public/web/assets/js/echarts.min.js"></script>
    <script src="/Public/web/home/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/web/laydate/laydate.js"></script>
    <link rel="stylesheet" href="/Public/web/webuploader/webuploader.css">
    <!-- <script src="https://use.fontawesome.com/32151b905e.js"></script> -->
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="/Public/web/webuploader/webuploader.js"></script>
    <style type="text/css">

#page div{position: relative;padding-left: 0;margin: 1.5rem 0;list-style: none;color: #999;text-align: left;}
#page div a{color: #23abf0;border-radius: 3px;padding: 6px 12px;    position: relative;display:inline-block;text-decoration: none;line-height: 1.2;background-color: #fff;border: 1px solid #ddd;margin-bottom: 5px;margin-right: 5px;}
#page div span{background: #23abf0;color: #fff;border: 1px solid #23abf0;padding: 2px 12px;border-radius: 3px;display:inline-block;margin-right:5px;}
</style>
</head>

<body>
       <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="javascript:;" class="tpl-logo">
                <img src="/Public/web/assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
              
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="tpl-header-list-user-nick"><h3><?php echo ($session); ?></h3></span><span class="tpl-header-list-user-ico"> <img src=""></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="<?php echo U('login/out');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo U('login/out');?>" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
            </ul>
        </div>
    </header>
    <div class="tpl-page-container tpl-page-header-fixed">
        <?php if($_SESSION['Administrator'][agency_id] == 0 ): ?><div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
                欢迎你：admin
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="<?php echo U('index/index');?>" class="nav-link">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>信息录入管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>

                                <a href="<?php echo U('member/agency');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>机构信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="<?php echo U('subject/lst');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>科目管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="<?php echo U('member/student');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
<!--                                 <a href="<?php echo U('member/achievement');?>">
    <i class="am-icon-angle-right"></i>
    <span>学生成绩录入</span>
    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
</a>  -->
                                <a href="<?php echo U('member/lecturer');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>讲师信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="<?php echo U('member/certifi');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生证书管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

<!--
                                <a href="<?php echo U('group/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>权限管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a> -->


                            </li>
                        </ul>
                    </li>



                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>用户管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('user/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>管理员</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <!-- <a href="<?php echo U('member/lecturer');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>讲师管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>  -->
                                <a href="<?php echo U('agencym/lst');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>培训机构管理员</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <a href="<?php echo U('member/us');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生讲师账号管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <!-- <a href="<?php echo U('member/useredit');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>会员资料状态</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>  -->
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>资料状态</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>

                                <a href="<?php echo U('member/useredit');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>讲师状态</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <a href="<?php echo U('member/medit');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生状态</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->


                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>网站信息管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>

                                <a href="<?php echo U('gear/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>Banner管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <a href="<?php echo U('article/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>文章管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                                                <a href="<?php echo U('link/fujia');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>网站附加信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <!-- <a href="<?php echo U('article/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>友情链接管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>  -->
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>栏目管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('category/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>基础栏目</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <!-- <a href="<?php echo U('category/authcate');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>权限栏目</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a> -->


                            </li>
                        </ul>
                    </li>
                   <!--  <li class="tpl-left-nav-item">
                       <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                           <i class="am-icon-table"></i>
                           <span>扩展功能</span>
                           <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                       </a>
                       <ul class="tpl-left-nav-sub-menu">
                           <li>
                               <a href="<?php echo U('plment/index');?>">
                                   <i class="am-icon-angle-right"></i>
                                   <span>支付方式管理</span>
                                   <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                               </a>
                           </li>
                       </ul>
                   </li> -->

                     <li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
        <i class="am-icon-table"></i>
        <span>网站信息管理</span>
        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
    </a>
    <ul class="tpl-left-nav-sub-menu">
        <li>
            <a href="<?php echo U('link/basic');?>">
                <i class="am-icon-angle-right"></i>
                <span>网站基本信息管理</span>
                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
            </a>

        </li>
        <!--
    </ul>
</li> -->
                </ul>
            </div>
        </div>

    <?php else: ?>


<div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
                欢迎你：<?php echo ($session); ?>
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="<?php echo U('index/index');?>" class="nav-link">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>信息录入管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>



                                <a href="<?php echo U('subject/lst');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>科目管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="<?php echo U('member/student');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
<!--                                 <a href="<?php echo U('member/achievement');?>">
    <i class="am-icon-angle-right"></i>
    <span>学生成绩录入</span>
    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
</a>  -->
                                <a href="<?php echo U('member/lecturer');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>讲师信息管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="<?php echo U('member/certifi');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>学生证书管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

<!--
                                <a href="<?php echo U('group/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>权限管理</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a> -->


                            </li>
                        </ul>
                    </li>









                </ul>
            </div>
        </div><?php endif; ?>


        
<script src="/Public/web/laydate/laydate.js"></script>
<style>
#studio span{cursor:pointer;}
.laydate_box, .laydate_box * {
    box-sizing:content-box;
}
</style>
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        学员修改
    </div>
    <ol class="am-breadcrumb">
        <li><a href="<?php echo U('index/index');?>" class="am-icon-home">首页</a></li>
        <li><a href="<?php echo U('member/student');?>">学员管理</a></li>
        <li class="am-active">学员修改</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-code"></span> 修改
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                <!-- <div class="portlet-input input-small input-inline">
                    <div class="input-icon right">
                        <i class="am-icon-search"></i>
                        <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                </div> -->
            </div>
        </div>

        <div class="tpl-block">

            <div class="am-g">
                <div class="tpl-form-body tpl-form-line">
                    <form class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post" action="">
                        <input type="hidden" name='student_id' value="<?php echo ($studentres["student_id"]); ?>">
                        <input type="hidden" name='table' value="student">
                        <input type="hidden" name='jump' value="student">

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">身份证 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="ids" class="tpl-form-input" id="" placeholder="身份证" onfocus="this.blur()" value="<?php echo ($studentres["ids"]); ?>"><p></p>
                            </div>
                        </div>



                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="realname" class="tpl-form-input" id="realname" placeholder="姓名" value="<?php echo ($studentres["realname"]); ?>"><p></p>
                            </div>
                        </div>

                       <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">性别 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <select name="sex" id="" class="tpl-form-input">
                                    <?php if($studentres["sex"] == 1): ?><option value="1">男</option>
                                    <?php else: ?>
                                    <option value="2">女</option><?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">手机号 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="tel" class="tpl-form-input" id="" placeholder="电话" value="<?php echo ($studentres["tel"]); ?>"><p></p>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">邮箱 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="email" class="tpl-form-input" id="" placeholder="XXXX@163.com" value="<?php echo ($studentres["email"]); ?>"><p></p>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">学号 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="numeric" class="tpl-form-input" id="numeric" placeholder="学号" onfocus="this.blur()" value="<?php echo ($studentres["numeric"]); ?>"><p></p>
                            </div>
                        </div>




                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">出生日期 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" onclick="laydate()" name="birth" class="tpl-form-input" id="user-name" placeholder="出生年月" value="<?php echo ($studentres["birth"]); ?>">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">学历信息 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="education" class="tpl-form-input" id="user-name" placeholder="学历信息" value="<?php echo ($studentres["education"]); ?>">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">联系地址<span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" name="region" class="tpl-form-input" id="user-name" placeholder="联系地址" value="<?php echo ($studentres["region"]); ?>">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">注册时间 <span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" onclick="laydate()" name="zidingtime" class="tpl-form-input" id="birth" placeholder="" value="<?php echo ($studentres["zidingtime"]); ?>">
                            </div>
                        </div>


                       <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">科目选择</label>
                        <div class="am-u-sm-9">
                            <!-- 当前机构 -->
                            <?php if(is_array($ass)): $i = 0; $__LIST__ = $ass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?><label class="am-checkbox-inline">
                                <input type="checkbox" name="subject_id[]" value="<?php echo ($auth['subject_id']); ?>"
                                    <?php if($group_data['is_array'] == 1): if(is_array($group_data['subject_id'])): $i = 0; $__LIST__ = $group_data['subject_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i; if($auth['subject_id'] == $th): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    <?php else: ?>
                                        <?php if($auth['subject_id'] == $group_data['subject_id']): ?>checked<?php endif; endif; ?>> <?php echo ($auth['agencyrealname']); ?>--<?php echo ($auth['subject_name']); ?>
                            </label><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!-- 其他机构 -->
                            <?php if(is_array($abb)): $i = 0; $__LIST__ = $abb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?><label class="am-checkbox-inline">
                                <input type="checkbox" onclick="return false;" name="subject_id[]" value="<?php echo ($auth['subject_id']); ?>"
                                    <?php if($group_data['is_array'] == 1): if(is_array($group_data['subject_id'])): $i = 0; $__LIST__ = $group_data['subject_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i; if($auth['subject_id'] == $th): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    <?php else: ?>
                                        <?php if($auth['subject_id'] == $group_data['subject_id']): ?>checked<?php endif; endif; ?>> <span style="color:#CCCCCC;"><?php echo ($auth['agencyrealname']); ?>--<?php echo ($auth['subject_name']); ?></span>
                            </label><?php endforeach; endif; else: echo "" ;endif; ?>


                        </div>
                    </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript">
    $(function(){
        var realname = false;
        var tel = false;
        var email = false;
        var numeric = false;
        var ids = false;
        //验证姓名
        $('input[name=realname]').blur(function(){

            var na = $(this).val();
            if(na.length == 0){
                $(this).next().html('*姓名不能为空！');
                return realname = false;
            }else{

                $(this).next().html('');
                return realname = true;
            }
        })
        //验证电话
        $('input[name=tel]').blur(function(){
            var n = $(this).val();
            if(n.length != 11){

                $(this).next().html('*手机号格式不正确！');
                return tel = false;
            }else{

                $(this).next().html('');
                return tel = true;
            }
        })
        //验证学号
        $('input[name=numeric]').blur(function(){
            var nu = $(this).val();
            if(nu.length <= 9){

                $(this).next().html('*学号格式不正确！');
                return numeric = false;
            }else{

                $(this).next().html('');
                return numeric = true;
            }
        })
        //验证身份证
        $('input[name=ids]').blur(function(){
            var id = $(this).val();
            if(id.length != 18){

                $(this).next().html('*身份证格式不正确！');
                return ids = false;
            }else{

                $(this).next().html('');
                return ids = true;
            }
        })
        //验证邮箱
        $('input[name=email]').blur(function(){
            var na = $(this).val();
            var ret = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
            if(na.length == 0){
                $(this).next().html('*邮箱不能为空！');
                return email = false;
            }else if(!ret.test(na)){
               $(this).next().html('*邮箱格式不正确！');
                return email = false;
            }else{
                $(this).next().html('');
                return email = true;
            }
        })
        //限制 SUBMIT
        $('.am-btn').click(function(){
            $('input[name=realname]').blur();
            $('input[name=tel]').blur();
            $('input[name=email]').blur();
            $('input[name=numeric]').blur();
            $('input[name=ids]').blur();
            if(realname && tel && email && numeric && ids){

                return true;
            }else{
                return false;
            }
        })



    })
</script>


    </div>
<script src="/Public/web/assets/js/jquery.min.js"></script>
<script src="/Public/web/assets/js/amazeui.min.js"></script>
<script src="/Public/web/assets/js/iscroll.js"></script>
<script src="/Public/web/assets/js/app.js"></script>


</body>

</html>