$(document).ready(function() {
   

    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
			//모든 서브를 열어라
	       $('.bottom_menu').animate({height:320},'fast').clearQueue();
			//서브메뉴가 열렸을때의 헤더 높이
                 },
        function() {
	    
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
			//모든 서브를 닫아라
          $('.bottom_menu').animate({height:85},'fast').clearQueue();
			//서브메뉴가 닫혔을때의 헤더 높이
    });
               
       	//tab키처리
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                $('ul.dropdownmenu li.menu ul').slideDown('fast');
                $('.bottom_menu').animate({height:320},'fast').clearQueue();  
          });

         $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                 $('.bottom_menu').animate({height:85},'fast').clearQueue();
         });
       
});