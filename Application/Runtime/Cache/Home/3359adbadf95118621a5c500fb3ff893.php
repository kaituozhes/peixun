<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>注册界面</title>
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
    #codes{display: none;}
    #numbers{display: none;}
    #code{display: none;}
    #number{display: none;}
</style>
</head>

<body>
<!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>注册</strong> Register </h1>
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
                        				注册
                        			</h3>
                            		<p>已有账号,请<a href="<?php echo U('user/login');?>">登录</a></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                            	<!--学员注册-->
			                    <form role="form" action="<?php echo U('user/register');?>" method="post" class="login-form" id="student"  onsubmit="return check();">
			                    	<input type="hidden" name="table" value="student">
			                    	<input type="hidden" name="jump" value="index">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">账号</label>
			                        	<input type="text"  name="member_name" placeholder="账号" class="form-username form-control Validform_error"  id="form-username">
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
			                        			<option value="0">请选择...</option>
												<option value="2">学员</option>
												<option value="5">讲师</option>

			                        	</select>
			                        	<p></p>
			                        </div>

			                        <div class="form-group" id="code">
			                        	<label class="sr-only" for="form-password">认证码</label>
			                        	<input type="" name="code" placeholder="身份证" class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>
			                        <div class="form-group"id="number">
			                        	<label class="sr-only" for="form-password">学号</label>
			                        	<input type="" name="number" placeholder="学员学号" class="form-password form-control" id="form-password">
			                        	<p></p>
			                        </div>

			                        <div class="form-group" id="codes">
			                        	<label class="sr-only" for="form-password">认证码</label>
			                        	<input type="" name="email" placeholder="邮箱" class="form-password form-control" >
			                        	<p></p>
			                        </div>
			                        <div class="form-group"id="numbers">
			                        	<label class="sr-only" for="form-password">编号</label>
			                        	<input type="" name="numbering" placeholder="讲师编号" class="form-password form-control" >
			                        	<p></p>
			                        </div>



			                        <button type="submit" class="btn" id="nihao">注册</button>
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

<!--[if lt IE 10]>
    <script src="/Public/web/assets1/js/placeholder.js"></script>
<![endif]-->
<script>
	$(function(){
		var ubool = false;
		var pbool = false;
		var sbool = false;
		var abool = false;
		var anumber = false;
		var aname = false;
		var acode = false;
		var anumber = false;
		var bcode = false;
		var bnumber = false;
		var bemail = false;
		var username,pswd,sure,agencynumber,agencyrealname,t;
		$('input[name=member_name]').blur(function(){
			var that = $(this);
			var dd;
			ubool = false;
			username = $(this).val();
			if(username.length == 0){
				$(this).next('p').html('账号必须填写');
				return ubool = false;
			}else{
				$.ajax({
			        type : 'get',
			        url : "<?php echo U('user/ajax_username');?>",
			        data : {"username":username},
			        dataType : 'text',
			        async: false,
			        success : function(msg) {
			            if(msg == 1){
							that.next('p').html(' ');
							ubool = true;
						}else{
							that.next('p').html('该用户名已被注册');
							ubool = false;
						}
			        },
			        error : function() {
			        }
			    });
			}
		})

		$('select[name=member_auth]').change(function(){
            var t = $(this).val();
            if(t == 5){
                $('#codes').show();
                $('#numbers').show();
            }else{
                $('#codes').hide();
                $('#numbers').hide();
            }
        })

        $('select[name=member_auth]').change(function(){
            t = $(this).val();
            if(t == 2){
                $('#code').show();
                $('#number').show();
            }else{
                $('#code').hide();
                $('#number').hide();
            }
        })
        $('input[name=code]').blur(function(){
        	var s = $(this).val();
        	if(s.length < 18){
        		$(this).next('p').html('请输入正规的身份证');
        		return acode = false;
        	}else{
        		$(this).next('p').html('');
        		return acode = true;
        	}
        })

        $('input[name=number]').blur(function(){
        	var s = $(this).val();
        	if(s.length < 10){
        		$(this).next('p').html('学生学号格式不对');
        		return anumber = false;
        	}else{
        		$(this).next('p').html('');
        		return anumber = true;
        	}
        })


/*                $('input[name=email]').blur(function(){
        	var s = $(this).val();
        	if(s.length == 0){
        		$(this).next('p').html('请输入邮箱');
        		return bcode = false;
        	}else{
        		$(this).next('p').html('');
        		return bcode = true;
        	}
        })*/

                $('input[name=email]').blur(function(){
            var na = $(this).val();
            var ret = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
            if(na.length == 0){
                $(this).next().html('*邮箱不能为空！');
                return bemail = false;
            }else if(!ret.test(na)){
               $(this).next().html('*邮箱格式不正确！');
                return bemail = false;
            }else{
            	$(this).next().html('');
                return bemail = true;
            }
        })

        $('input[name=numbering]').blur(function(){
        	var s = $(this).val();
        	if(s.length < 10){
        		$(this).next('p').html('讲师编号格式不对');
        		return bnumber = false;
        	}else{
        		$(this).next('p').html('');
        		return bnumber = true;
        	}
        })




		// $('input[name=member_password]').blur(function(){
		// 	pbool = false;
		// 	pswd = $(this).val();
		// 	if(pswd.length == 0){
		// 		$(this).next('p').html('密码不得为空');
		// 		return pbool = false;
		// 	}else if(pswd.length < 8){
		// 		$(this).next('p').html('密码位数必须在8到18位之间');
		// 		return pbool = false;
		// 	}else if(pswd.length > 18){
		// 		$(this).next('p').html('密码位数必须在8到18位之间');
		// 		return pbool = false;
		// 	}else{
		// 		$(this).next('p').html(' ');
		// 		return pbool = true;
		// 	}
		// })

		$('input[name=member_password]').blur(function(){

			pbool = false;
			pswd = $(this).val();
			var reg = /(?=.*[a-z])(?=.*\d)(?=.*[#@!~%^&*])[a-z\d#@!~%^&*]{8,16}/i;
			var flag = reg.test(pswd);
			if(flag == false){

				$(this).next('p').html('新密码必须由 8-16位字母、数字、特殊符号线组成.');
				return pbool = false;
			}else{

				$(this).next('p').html('');
				return pbool = true;
			}

			// if(pswd.length == 0){
			// 	$(this).next('p').html('密码不得为空');
			// 	return pbool = false;
			// }else if(pswd.length < 8){
			// 	$(this).next('p').html('密码位数必须在8到18位之间');
			// 	return pbool = false;
			// }else if(pswd.length > 18){
			// 	$(this).next('p').html('密码位数必须在8到18位之间');
			// 	return pbool = false;
			// }else{
			// 	$(this).next('p').html(' ');
			// 	return pbool = true;
			// }
		})


// 		var newpwd = $("#newpassword").val();
//
// //var pattern = "([A-Za-z]|[0-9]|-|_){4,16}";
// //var reg = new RegExp(pattern,"g");
// var reg = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[~!@#$%^&*()_+`\-={}:";'<>?,.\/]).{4,16}$/;
// var flag = reg.test(newpwd);
// if(flag == false){
// alert("新密码必须由 4-16位字母、数字、特殊符号线组成.");
// return false;
// }





		$('input[name=surepswd]').blur(function(){
			sbool = false;
			sure = $(this).val();
			if(sure != pswd){
				$(this).next('p').html('两次密码不同');
				return sbool = false;
			}else{
				$(this).next('p').html(' ');
				return sbool = true;
			}
		})
		$('input[name=surepswd]').blur(function(){
			var a = $(this).val();
			if(a.length == 0){
				$(this).next('p').html('密码不能为空');
			}else{
				$(this).next('p').html(' ');
			}
		})





		$('.btn').click(function(){

			if(t == 2){
				$('input[name=surepswd]').blur();
				$('input[name=member_password]').blur();
				$('input[name=code]').blur();
				$('input[name=number]').blur();
				if(acode && anumber && sbool && pbool){
					return true;
				}else{
					return false;
				}
			}else{
				$('input[name=surepswd]').blur();
				$('input[name=member_password]').blur();
				$('input[name=email]').blur();
				$('input[name=numbering]').blur();
				if(bnumber && bemail && sbool && pbool){
					return true;
				}else{
					return false;
				}
			}


		})




	})
</script>
</body>
</html>