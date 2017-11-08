<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>找回密码</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="/Public/web/assets1/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/web/assets1/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/Public/web/assets1/css/form-elements.css">
<link rel="stylesheet" href="/Public/web/assets1/css/style.css">
<script src="/Public/web/assets1/js/jquery-1.11.1.min.js"></script>
<script src="/Public/web/laydate/laydate.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicon and touch icons -->
<style>
	#studio span{cursor:pointer;}
	.laydate_box, .laydate_box * {
        box-sizing:content-box;
    }
    #agency{display:none;}
    #code{display: none;}
    #number{display: none;}
    #codes{display: none;}
    #numbers{display: none;}
</style>
</head>

<body>
<?php if($arr["member_id"] == ''): ?><!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>找回密码</strong> Password retrieval </h1>
                            <div class="description">
                            	<p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3 id="studio">
                        				找回密码
                        			</h3>
                            		<p>根据身份证以及注册编号找回密码<a href="<?php echo U('user/login');?>">登录</a></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                            	<!--找回密码-->
			                    <form role="form" action="<?php echo U('user/useredit');?>" method="post" class="login-form" id="student">
			                    	<input type="hidden" name="table" value="student">
			                    	<input type="hidden" name="jump" value="index">
			                    	<div class="form-group">
			                        	<label class="sr-only" for="form-password">用户组</label>
			                        	<select name="member_auth" id="" class="form-password form-control" style="height:50px;">
			                        			<option value="0">请选择</option>
												<option value="2">学员</option>
												<option value="5">讲师</option>

			                        	</select>
			                        	<p></p>
			                        </div>
									<!-- 学员 -->
			                        <div class="form-group" id="code">
			                        	<label class="sr-only" for="form-password">认证码</label>
			                        	<input type="" name="code" placeholder="身份证" class="form-password form-control" >
			                        	<p></p>
			                        </div>
			                        <div class="form-group" id="number">
			                        	<label class="sr-only" for="form-password">学号</label>
			                        	<input type="" name="number" placeholder="学员学号" class="form-password form-control" >
			                        	<p></p>
			                        </div>
									<!-- 讲师 -->
			                        <div class="form-group" id="codes">
			                        	<label class="sr-only" for="form-password">认证码</label>
			                        	<input type="" name="codes" placeholder="邮箱" class="form-password form-control" >
			                        	<p></p>
			                        </div>
			                        <div class="form-group" id="numbers">
			                        	<label class="sr-only" for="form-password">编号</label>
			                        	<input type="" name="numbers" placeholder="讲师编号" class="form-password form-control" >
			                        	<p></p>
			                        </div>


			                        <button type="submit" class="btn">找回密码</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Javascript -->
<script src="/Public/web/assets1/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/web/assets1/js/jquery.backstretch.min.js"></script>
<script src="/Public/web/assets1/js/scripts.js"></script>
<?php else: ?>

<!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>修改</strong> edit</h1>
                            <div class="description">
                            	<p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3 id="studio">
                        				修改
                        			</h3>
                            		<p>请正确修改信息,请勿透露他人</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                            	<!--修改-->
			                    <form role="form" action="<?php echo U('user/common_update');?>" method="post" class="login-form" id="student">
			                    	<input type="hidden" name="table" value="member">
			                    	<input type="hidden" name="jump" value="member">
			                    	<input type="hidden" name="member_id" value="<?php echo ($arr["member_id"]); ?>">

			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">账号</label>
			                        	<input type="text"  name="member_name" placeholder="<?php echo ($arr["member_name"]); ?>" value="<?php echo ($arr["member_name"]); ?>" onfocus=this.blur() class="form-username form-control Validform_error"  id="form-username">
			                        	<p></p>

			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">密码</label>
			                        	<input type="password" name="member_password" placeholder="密码" class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>
			                       <div class="form-group">
			                        	<label class="sr-only" for="form-password">确认密码</label>
			                        	<input type="password" name="surepswd" placeholder="确认密码" class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>

			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">用户组</label>
			                        	<select name="member_auth" id="" class="form-password form-control" style="height:50px;">
			                        			<?php if($arr[member_auth] == 2 ): ?><option value="2">学员</option>
												<?php else: ?>
												<option value="5">讲师</option><?php endif; ?>
			                        	</select>
			                        	<p></p>
			                        </div>

			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">认证码</label>
			                        	<input type="password" name="code"  value="<?php echo ($arr["code"]); ?>" onfocus=this.blur() class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">编号</label>
			                        	<input type="password" name="number"  value="<?php echo ($arr["bianhao"]); ?>" onfocus=this.blur() class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>


			                        <button type="submit" class="btn btns">修改</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Javascript -->
<script src="/Public/web/assets1/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/web/assets1/js/jquery.backstretch.min.js"></script>
<script src="/Public/web/assets1/js/scripts.js"></script><?php endif; ?>

<script type="text/javascript">
    $(function(){
    	var obj = false;
			var edit = false;
			var sbool = false;
        $('select[name=member_auth]').change(function(){

        	obj = false;
            var t = $(this).val();
            if(t == 2){
                $('#code').show();
                $('#number').show();
								$('#codes').hide();
								$('#numbers').hide();
                return obj = true;
            }else if(t == 5){
							$('#codes').show();
							$('#numbers').show();
							$('#code').hide();
							$('#number').hide();
							return obj = true;
						}else{
							alert("请选择分类");
						}
        })

        $('.btn').click(function(){
        	$('select[name=member_auth]').change();
        	if(!obj){
        		return false;
        	}
        })




				// //验证修改
				// $('input[name=member_password]').blur(function(){
        //     var na = $(this).val();
				// 		pswd = $(this).val();
        //     if(na.length <= 7){
        //         $(this).next().html('*密码不得少于8位！');
        //         return edit = false;
        //     }else{
				//
        //         $(this).next().html('');
        //         return edit = true;
        //     }
        // })
				//验证数字 字符串 特殊符号
				$('input[name=member_password]').blur(function(){

					pbool = false;
					pswd = $(this).val();
					var reg = /(?=.*[a-z])(?=.*\d)(?=.*[#@!~%^&*])[a-z\d#@!~%^&*]{8,16}/i;
					var flag = reg.test(pswd);
					if(flag == false){
						 $(this).next().html('*新密码必须由8-16位字母、数字、特殊符号线组成.');
						return edit = false;
					}else{
						$(this).next().html('');
						return edit = true;
					}
				})



				$('input[name=surepswd]').blur(function(){
					sbool = false;
					sure = $(this).val();
					if(sure != pswd){
						$(this).next().html('两次密码不同');
						return sbool = false;
					}else{
						$(this).next().html(' ');
						return sbool = true;
					}
				})

				$('.btns').click(function(){
					 $('input[name=member_password]').blur();
					 if(edit && sbool){
							 return true;
					 }else{
							 return false;
					 }
			 })

        /*验证密码*/

    })
</script>
</body>
</html>