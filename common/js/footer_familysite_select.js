
$(document).ready(function() {
	$('.select .arrow').click(function(){
		$('.select .aList').show();
		$('.select i').removeClass('right_chevron_icon').addClass('up_chevron_icon');
	});
	$('.select').mouseleave(function(){
		$('.select .aList').hide();
		$('.select i').removeClass('up_chevron_icon').addClass('right_chevron_icon');
	});
	//tab키 처리
	$('.select .arrow').bind('focus', function () {        
		$('.select .aList').show();
		$('.select i').removeClass('right_chevron_icon').addClass('up_chevron_icon');
	});
	$('.select .aList li:last').find('a').bind('blur', function () {        
		$('.select .aList').hide();
		$('.select i').removeClass('up_chevron_icon').addClass('right_chevron_icon');
	});  
});

//$(document).ready(function() {
//	$('.select .arrow').click(function(){
//		if('.select i'.hasClass('right_chevron_icon')){
//		$('.select .aList').show();
//		$('.select i').removeClass('right_chevron_icon').addClass('down_chevron_icon');
//	 } else { 
//		 $('.select .aList').hide();
//		$('.select i').removeClass('down_chevron_icon').addClass('right_chevron_icon');
//	} 
//	});
//	
//	$('.select').mouseleave(function(){
//		$('.select .aList').hide();
//		$('.select i').removeClass('down_chevron_icon').addClass('right_chevron_icon');
//	});
//	//tab키 처리
//	  $('.select .arrow').bind('focus', function () {        
//              $('.select .aList').show();
//       });
//       $('.select .aList li:last').find('a').bind('blur', function () {        
//              $('.select .aList').hide();
//       });  
//});
//
