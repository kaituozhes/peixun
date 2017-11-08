//menu

$(document).ready(function(){
	$('.pro_lanfra span').mouseover(function(){
	
	$(this).find('dl').stop(true,true).slideDown();
	$(this).children("a").addClass("cur");
	});
$('.pro_lanfra span').mouseleave(function(){
	
	$(this).find('dl').stop(true,true).slideUp('fast');
	$(this).children("a").removeClass("cur");
	});
	
//menu
$('#menu li:last a').css('background','none');
$('#menu1,#menu2,#menu3').mouseover(function(){
		$('#nav').slideDown();		
});
$('#nav').mouseleave(function(){
		$('#nav').slideUp();		
});
//index-news
$('#news li').hover(function(){
		$(this).addClass('cur').children('p').slideDown();
		$(this).siblings().removeClass('cur').children('p').slideUp();
})
//menu
	$(".viewcon").find("img").each(function(index, element) {
        if($(this).width() > 950) {
			$(this).css({"height":"auto","width":"100%"});
		}
    });

	 $('.codepic').hover(function(){$('.code').fadeIn()},function(){$('.code').fadeOut()});
    $('.backup,.topbut').click(function(){
        $('body,html').animate({scrollTop:0},500)
    });
    $(".backup").hide();
    $(function () {
        $(window).scroll(function(){
            if ($(window).scrollTop()>500){
                $(".backup").fadeIn(1000);
            }else{
                $(".backup").fadeOut(1000);
            }
        })
   })
/*var time = window.setInterval(function(){
		$('#right').click();	
	},5000);
var timea = window.setInterval(function(){
		$('#righta').click();	
	},5000);
$('#ipro2').hover(function() {
			clearInterval(time);
		},function(){
		  time = window.setInterval(function(){
			$('#right').click();	
		 },10000);
	});
$('#ipro1').hover(function() {
			clearInterval(timea);
		},function(){
		  time = window.setInterval(function(){
			$('#righta').click();	
		 },10000);
	});
*/$('#left').bind('click',leftbut);
$('#right').bind('click',rightbut);
$('#lefta').bind('click',leftbuta);
$('#righta').bind('click',rightbuta);

//banner
var p=1;
var banner=$('#ipro2');
var w=100;
var bannernum=$('#ipro2 li').length;
$('#ipro2').css('width',bannernum*100+'%');
$('#ipro2 li').css('width',(100/bannernum)+'%');
var pro=1;
var probanner=$('#ipro1');
var probannernum=$('#ipro1 li').length;
$('#ipro1').css('width',probannernum*100+'%');
$('#ipro1 li').css('width',(100/probannernum)+'%');

//index;
function leftbut(){
	if( !banner.is(":animated") ){
		if(p==1){
			$('.slider span:first').addClass('end');
		}else{
			$('.slider span:last').removeClass('end');
			banner.animate({ 'margin-left' : '+='+w+'%' }, "slow");
			p--;
		}
	}
}
function rightbut(){
	if( !banner.is(":animated") ){
		if(p == bannernum){
			$('.slider span:last').addClass('end');
		}else{
			$('.slider span:first').removeClass('end');
			banner.animate({ 'margin-left' : '-='+w+'%' }, "slow");
			p++;
		}
	}
}

function leftbuta(){
	if( !probanner.is(":animated") ){
		if(pro==1){
			$('.slidera span:first').addClass('end');
		}else{
			$('.slidera span:last').removeClass('end');
			probanner.animate({ 'margin-left' : '+='+w+'%' }, "slow");
			pro--;
		}
	}
}
function rightbuta(){
	if( !probanner.is(":animated") ){
		if(pro == probannernum){
			$('.slidera span:last').addClass('end');
		}else{
			$('.slidera span:first').removeClass('end');
			probanner.animate({ 'margin-left' : '-='+w+'%' }, "slow");
			pro++;
		}
	}
}

});
//menu

$(document).ready(function(){
	$('.bottomnav a:last').css('border',0);
	$('.news_list li:odd').addClass('newseven');
	//index-product
	$('.productli li a').hover(function(){
		$(this).children('p').stop(true,true).slideDown()
		},function(){
		$(this).children('p').stop(true,true).slideUp()
	})
//menu
	$('.teacher li').eq(1).addClass('mtwo');
	$(".viewcon").find("img").each(function(index, element) {
        if($(this).width() > 950) {
			$(this).css({"height":"auto","width":"100%"});
		}
    });

	 $('.codepic').hover(function(){$('.code').fadeIn()},function(){$('.code').fadeOut()});
    $('.backup,.topbut').click(function(){
        $('body,html').animate({scrollTop:0},500)
    });
    $(".backup").hide();
    $(function () {
        $(window).scroll(function(){
            if ($(window).scrollTop()>500){
                $(".backup").fadeIn(1000);
            }else{
                $(".backup").fadeOut(1000);
            }
        })
   })
       var page = 1;
    var i = 3; 
	
    $(".next").click(function(){ 
	     var $parent = $(this).parents("div.v_show");
		 var $v_show = $parent.find("div.v_content_list"); 
		 var $v_content = $parent.find("div.v_content"); 
		 var len = $v_show.find("li").length;
		 var page_count = Math.ceil(len / i) ; 
		 var v_width = $v_content.width()+40 ;
		  $('.v_content_list').width(len*340);
		 if( !$v_show.is(":animated") ){  
			  if( page == page_count ){ 
				$v_show.animate({ left : '0px'}, "slow"); 
				page = 1;
				}else{
				$v_show.animate({ left : '-='+v_width }, "slow"); 
				page++;
			 }
		 }
   });
    $(".prev").click(function(){
	     var $parent = $(this).parents("div.v_show");
		 var $v_show = $parent.find("div.v_content_list"); 
		 var $v_content = $parent.find("div.v_content"); 
		 var v_width = $v_content.width();
		 var len = $v_show.find("li").length;
		 var page_count = Math.ceil(len / i) ;  
		 if( !$v_show.is(":animated") ){  
		 	 if( page == 1 ){  
				$v_show.animate({ left : '-='+v_width*(page_count-1) }, "slow");
				page = page_count;
			}else{
				$v_show.animate({ left : '+='+v_width }, "slow");
				page--;
			}
		}
    });

   
/*	$('.nav').each(function(index, element) {
		$(this).children('a').last().css('border',0)
    });
	$('.proTwo li').last().each(function(index, element) {
		$(this).children('a').css('border',0)
    });
*/	
	  });

