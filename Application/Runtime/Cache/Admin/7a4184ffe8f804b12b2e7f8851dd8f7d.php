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
        <span>网站名称管理</span>
        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
    </a>
    <ul class="tpl-left-nav-sub-menu">
        <li>
            <a href="<?php echo U('link/basic');?>">
                <i class="am-icon-angle-right"></i>
                <span>网站名称管理</span>
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


        
	<div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                文章管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">文章管理</a></li>
                <li class="am-active">文章列表</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 列表
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                       <!--  <div class="portlet-input input-small input-inline">
                           <div class="input-icon right">
                               <i class="am-icon-search"></i>
                               <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                       </div> -->
                    </div>
                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> <a href="<?php echo U('article/add');?>" style="color:white;">新增</a></button>
<!--                                     <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 装饰</button>
<button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span>装饰</button>
<button type="button" id="delete" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm'}" id="cate_search">
					              <option value="option1">所有类别</option>
					              <?php if(is_array($cate_all)): $i = 0; $__LIST__ = $cate_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hscate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($hscate['id']); ?>"><?php echo ($hscate['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					            </select>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-3">
                            <!-- <div class="am-input-group am-input-group-sm">
                                <input type="text" class="am-form-field">
                                <span class="am-input-group-btn">
                                                                <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>
                                                            </span>
                            </div> -->

                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <!-- <th class="table-check"><input type="checkbox" name="all" class="tpl-table-fz-check"></th> -->
                                            <th class="table-title">标题</th>
                                            <th class="table-title">文章排序</th>
                                            <th class="table-type">缩略图</th>
                                            <th class="table-type">作者</th>
                                            <th class="table-type">所属栏目</th>
                                            <th class="table-type">是否置顶</th>
                                            <th class="table-type">添加时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="messbody">
                                    	<!-- <?php if(is_array($wen)): $key = 0; $__LIST__ = $wen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($key % 2 );++$key;?>-->
                                        <tr>
                                            <!-- <td><input type="checkbox" class="input" name="id[]" value="<?php echo ($art['tid']); ?>" ></td> -->
                                            <td><?php echo ($art['title']); ?></td>
                                            <td><?php echo ($art['sort']); ?></td>
                                            <td>
												<button type="button" class="am-btn am-btn-success" style="background:#5EB95E;" data-am-modal="{target:'#doc-modal-<?php echo ($key); ?>1', closeViaDimmer: 0, width: 400, height: 400}">
												  查看
												</button>
												<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-<?php echo ($key); ?>1">
												  <div class="am-modal-dialog">
												    <div class="am-modal-hd">缩略图
												      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
												    </div>
												    <div class="am-modal-bd">
												      <img src="/Public/<?php echo ($art['litpic']); ?>" style="width:100%;" alt="">
												    </div>
												  </div>
												</div>
                                            </td>
                                            <td><?php echo ($art['autor']); ?></td>
                                            <td class="am-hide-sm-only"><?php echo ($art['catename']); ?></td>
                                            <td class="am-hide-sm-only">
												<?php switch($art['if_top']): case "1": ?>置顶<?php break;?>
													<?php case "2": ?>不置顶<?php break; endswitch;?>
                                            </td>
                                            <td><?php echo (date("Y-m-d H:i:s",$art['pubdate'])); ?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href="<?php echo U('article/edit',array('id'=>$art['tid']));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑</a>
                                                        <a href="<?php echo U('article/delete',array('id'=>$art['tid']));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span>删除</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       <!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
                                    </tbody>
                                </table>
                                <div class="am-cf">
                                    <div class="am-fr" id="page">
                                        <?php echo ($show); ?>
                                    </div>
                                </div>
                                <hr>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
</div>
<script>
$(function(){
    $('input[name=all]').click(function(){
        if($(this).is(':checked')){
            $('input').prop('checked','true');
        }else{
            $('input').removeAttr('checked');
        }
    })
    var ibool,jbool;
    var i = 0;
    $('.input').click(function(){
        if($(this).is(':checked')){
            var s = hascheck();
            if(s == 1){
                $('input[name=all]').prop('checked','true');
            }
        }else{
            if($('input[name=all]').is(':checked')){
                $('input[name=all]').removeAttr('checked');
            }
        }
    })
    function hascheck()
    {
        var ibool,jbool;
        $('.input').each(function(){
            console.log($(this).is(':checked'));
            if($(this).is(':checked')){
                ibool = 1;
            }else{
                jbool = 2;
            }
        })
        if(jbool == 2){
            return jbool;
        }else{
            return ibool;
        }
    }
    $('#delete').click(function(){
        var delid = '';
        $('.input').each(function(){
            if($(this).is(':checked')){
                delid += $(this).val()+',';        
            }
        })
        if(delid.length != 0){
            var shrink = delid.length;
            delid = delid.substr(0,Number(shrink) - 1);
            $.post("<?php echo U('article/delart');?>",{delid:delid},function(msg){
                if(msg == 1){
                    alert('删除成功');
                    window.location.reload();//刷新当前页面.
                }else{
                    alert('删除失败');
                }
            })
        }        
    })
    $('#cate_search').change(function(){
        var cateid = $(this).val();
        $.get("<?php echo U('article/ajax_cate_article');?>",{cateid:cateid},function(msg){
            var str = '';
            if(msg){
                for(var i in msg){
                    str += '<tr><td><input type="checkbox" class="input" name="id[]" value="'+msg[i]['tid']+'" ></td><td>'+msg[i]['title']+'</td><td>'+msg[i]['sort']+'</td><td><button type="button" class="am-btn am-btn-success" style="background:#5EB95E;" data-am-modal="{target:'+get_model(msg[i]['tid'],1)+',closeViaDimmer: 0, width: 400, height: 400}">查看</button><div class="am-modal am-modal-no-btn" tabindex="-1" id="'+get_model(msg[i]['tid'],2)+'"><div class="am-modal-dialog"><div class="am-modal-hd">缩略图<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a></div><div class="am-modal-bd"><img src="/Public/'+msg[i]['litpic']+'" style="width:100%;" alt=""></div></div></div></td><td>'+msg[i]['autor']+'</td><td class="am-hide-sm-only">'+msg[i]['catename']+'</td><td class="am-hide-sm-only">'+get_type(msg[i]['if_top'])+'</td><td>'+get_date(msg[i]['pubdate'])+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="/index.php/Admin/Article/edit/id/'+msg[i]['tid']+'">编辑</a></button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span><a href="/index.php/Admin/Article/delete/id/'+msg[i]['tid']+'" style="color:#dd514c;">删除</a></button></div></div></td></tr>';
                }
                $('#messbody').html(str);
                $('#page').hide();
            }
        })
    })
    function get_model(model,type)
    {
        if(type == 1){
            var doc = '#doc-modal-1'+model;
            return ''+doc+'';
        }else if(type == 2){
            return 'doc-modal-1'+model;
        }
        
    }
    function get_type(sort)
    {
        if(sort == 1){
            return '置顶';
        }else{
            return '不置顶';
        }
    }
    function get_date(nS)
    {
       return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");      
    }
})
</script>




    </div>
<script src="/Public/web/assets/js/jquery.min.js"></script>
<script src="/Public/web/assets/js/amazeui.min.js"></script>
<script src="/Public/web/assets/js/iscroll.js"></script>
<script src="/Public/web/assets/js/app.js"></script>


</body>

</html>