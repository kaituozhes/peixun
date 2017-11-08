function demo(){
	var tbool = false;
	var pbool = false;
	var ybool = false;
		var phone = null;
		$('input:eq(0)').blur(function(){
			tbool = false;
			$('#shou').removeClass();
			$('#one').remove();
			 phone = this.value.trim();
			var len = phone.length;
			$.get(path+'/Index/checkTel','tel='+phone,function(msg){
				if(len == 0){
					$('#shou').addClass('msg_err');
					$('#msgmobile').append('<span id="one" class="msg_error">宝贝，你还没有填写手机号码哦！</span>');
				}else if(msg !== 'no'){
					$('#shou').addClass('msg_err');
					$('#msgmobile').append('<span id="one" class="msg_error">宝贝，该手机号码未注册哦！</span>');
				}else{
					return tbool = true;
				}
			})		
		})
		$('input:eq(1)').blur(function(){
			pbool = false;
			$('#mi').removeClass();
			$('#two').remove();
			var value = this.value.trim();
			var len = value.length;
			$.get(path+'/Index/mi',{'tel':phone,'password':value},function(msg){
				if(len == 0){
				$('#mi').addClass('msg_err');
				$('#msgpass').append('<span id="two" class="msg_error">宝贝，你还没有填写密码哦！</span>');
				}else if(msg == 'no'){
				$('#mi').addClass('msg_err');
				$('#msgpass').append('<span id="two" class="msg_error">宝贝，密码输入错误哦！</span>');
				}else{
					return pbool = true;
				}
			})
		})
		$('input:eq(2)').blur(function(){
			ybool = false;
			$('#yan').removeClass();
			$('#three').remove();
			var value = this.value.trim();
			var len = value.length;
			if(len == 0){
				$('#yan').addClass('msg_err');
				$('#msgyan').append('<span id="three" class="msg_error">宝贝，你还没有填写验证码哦！</span>');
			}else{
				return ybool = true;
			}
		})
		$('form').submit(function(){
			if(tbool && pbool && ybool){
				return true;
			}else{
				$('input:eq(0)').blur();
				$('input:eq(1)').blur();
				$('input:eq(2)').blur();
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

}