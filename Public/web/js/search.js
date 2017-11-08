/* 搜索提示 */
function checksearch(the)
 {
	if ($.trim(the.key.value) == '')
	 {
		alert('请输入关键字');
		the.key.focus();
		the.key.value = '';
		return false
	}
	if ($.trim(the.key.value) == '请输入关键字')
	 {
		alert('请输入关键字');
		the.key.focus();
		the.key.value = '';
		return false
	}
}
/* 浮动工具栏 */
$(document).ready(function() {
	$(window).scroll(function() {
		var offsetTop = $(window).scrollTop() + 78 + "px";
		$("#common-tool").animate({
			top: offsetTop
		},
		{
			duration: 500,
			queue: false
		});
	});
	/* 滚动监听 */
	$(window).scroll(function() {
		if ($(window).scrollTop() > 50) {
			$("#common-top-ico").fadeIn(500);
		}
		 else {
			$("#common-top-ico").stop(true,true).fadeOut(500);
		}
	});
	/* 返回顶部 */
	$('.common-top').click(function() {
		$("html,body").animate({
			scrollTop: 0
		},
		200);
	});
	/* 二维码隐藏 */
	$("#common-sweep-ico").hover(function() {
		$(".common-sweep-box").stop(true, true).fadeToggle(500);
	});
});
/* 通用下拉 */
$(function() {
	$(".menu li").hover(function() {
		$(this).find(".common-nav2").stop(true,true).slideDown("fast");
	}),
	$(".menu li").mouseleave(function() {
		$(this).find(".common-nav2").stop(true,true).slideUp("fast");
	});
});