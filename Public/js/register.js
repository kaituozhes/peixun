function demo(){
		var tbool = false;
		var ubool = false;
		var pbool = false;
		var ybool = false;
		var mbool = false;
		$('input:eq(0)').blur(function(){
			tbool = false;
			$('#one').removeClass();
			$('#three').remove();
			 phone = this.value.trim();
			var peg = /^[0-9]{11}$/;
			var len = phone.length;
		$.get(path+'/Index/checkTel','tel='+phone,function(msg){
			if(msg == 'no'){
				$('#one').addClass('msg_err');
     			$('#msgmobile').append('<span id="three" class="msg_error">该手机号码已注册，请更换手机号码</span>');
			}else if(len == 0){
				$('#one').addClass('msg_err');
				$('#msgmobile').append('<span id="three" class="msg_error">宝贝，你还没有填写手机号码哦！</span>');
			}else if(peg.test(phone)){
				$('#one').addClass('msg_ok');
				return tbool = true;
			}else{
				$('#one').addClass('msg_err');
				$('#msgmobile').append('<span id="three" class="msg_error">宝贝,请填写正确的手机号码格式哦！</span>');			
			}
			})
 		})
 		$('input:eq(1)').blur(function(){
 			ubool = false;
			$('#two').removeClass();
			$('#four').remove();
			var value = this.value.trim();
			var len = value.length;
		$.get(path+'/Index/checkTel','username='+value,function(msg){
			if(msg == 'no'){
				$('#two').addClass('msg_err');
     			$('#msguser').append('<span id="four" class="msg_error">宝贝，该昵称已被注册哦！</span>');
			}else if(len == 0){
				$('#two').addClass('msg_err');
				$('#msguser').append('<span id="four" class="msg_error">宝贝，你还没有填写昵称哦！</span>');
			}else{
				$('#two').addClass('msg_ok');
				return ubool = true;
			}
			})
 		})
 		var pass = null;
 		$('input:eq(2)').blur(function(){
 			pbool = false;
			$('#list').removeClass();
			$('#six').remove();
			$('#ruo').removeClass("se");
			$('#zhong').removeClass('se');
			$('#qiang').removeClass('se');
			$('#an').css('display','none');
			 pass = this.value.trim();
			var one = /^[0-9]{6,32}$/;
			var two = /^[0-9a-zA-Z]{6,32}$/;
			var list = /^[0-9a-zA-Z_@#$%^&*]{6,32}$/;
			var len = pass.length;
			if(len == 0){
				$('#list').addClass('msg_err');
				$('#msgpass').append('<span id="six" class="msg_error">宝贝,你还没有填写密码哦！</span>');
			}else if(len>=6 && len<=32){
				$('#list').addClass('msg_ok');
				$('#an').css('display','block');
				if(one.test(pass)){
					$('#ruo').addClass('se');
				}else if(two.test(pass)){
					$('#zhong').addClass('se');
				 }else if(list.test(pass)){
				 	$('#qiang').addClass('se');
				 }
				 return pbool = true;
				// $('#msgpass').append('<span id="six" class="msg_error">宝贝，你还没有填写密码哦！</span>');
			}else{
				$('#list').addClass('msg_err');
				$('#msgpass').append('<span id="six" class="msg_error">宝贝，密码必须在6位到32位之间哦！</span>');
			}
 		})
		$('input:eq(3)').blur(function(){
			ybool = false;
			$('#lest').removeClass();
			$('#chong').remove();
			var value = this.value.trim();
			var len = value.length;
			 if(len == 0){
				$('#lest').addClass('msg_err');
				$('#msgpress').append('<span id="chong" class="msg_error">宝贝，你还没有填写密码！</span>');
			}else if(value == pass){
				$('#lest').addClass('msg_ok');
				return ybool = true;
			}else{
				$('#lest').addClass('msg_err');
				$('#msgpress').append('<span id="chong" class="msg_error">宝贝，要填写一样的密码哦！</span>');
			}
			})
		$('input:eq(4)').blur(function(){
			mbool = false;
			$('#zheng').removeClass();
			$('#yan').remove();
			var value = this.value.trim();
			$.get(path+'/Index/verify','yan='+value,function(msg){
				if(msg == 'guo'){
					$('#zheng').addClass('msg_err');
					$('#msgyan').append('<span id="yan" class="msg_error">宝贝，验证码过期了哦！</span>');
				}else if(msg == 'yes'){
					$('#zheng').addClass('msg_ok');
					return mbool = true;
				}else{
					$('#zheng').addClass('msg_err');
					$('#msgyan').append('<span id="yan" class="msg_error">宝贝，要写一样的验证码哦！</span>');
				}
			})
		})
		$('form').submit(function(){
			// $('input:eq(0)').blur();
			if(tbool && ubool && pbool && ybool){
				console.log('111');
				// return true;
			}else{
				return false;	
			}
			
		})
}
function fun(){
	$('.duo').click(
		function(){
		if($(this).next().css('display') == 'block'){
			$(this).next().css('display','none');
		}else{
			$(this).next().css('display','block');
		}
		console.log($(this).next().css('display'));
	});
	
}
function user(){
	$('#pass').focus(function() {
		$('.press').css('display','block');
	});
	$('#press').focus(function() {
		$('.xinxi').css('display','block');
	});
}
function sms(){
	$('#sendMsg').click(function(){
				// 点击按钮发送ajax请求
				$.get(path+'/Index/Sms','tel='+phone,function(msg){
					if (msg.status == 0) {
						alert('发送成功');
					}
				})
			})
}