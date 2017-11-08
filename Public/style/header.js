$(function(){
	$('#user').toggle(
		function(){
			$('#one').css('display','block')
		 	},
		 function(){
		 	$('#one').css('display','none')
		 })

	$('#news').toggle(
		function(){
			$('#two').css('display','block')
		 	},
		 function(){
		 	$('#two').css('display','none')
		 })
	})