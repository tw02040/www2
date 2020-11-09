$(document).ready(function () {
        
        $('.plan_nav li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
        
        $('.course_day1').addClass('boxMove');
        //첫번째 내용글 애니메이션 처리
		
		var smh = $('.visual').height();

		

         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
			
			var h1 = $('.course_day2').offset().top - 346;
			var h2 = $('.course_day3').offset().top - 346;
			var h3 = $('#footerArea').offset().top;
			
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
			
			
//            $('.text').text(scroll);
//            //스크롤 좌표의 값을 찍는다.
            
			//sticky 메뉴 처리
            if(scroll>560){ 
                $('.plan_nav_box').addClass('navOn');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
				$('header').hide();
            }else{
                $('.plan_nav_box').removeClass('navOn');
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
				$('header').show();
            }
            
            
            
            $('.plan_nav li').find('a').removeClass('spy');
            //모든 서브메뉴 비활성화~ 불꺼!!!
			
             if(scroll>=0 && scroll<h1){
                $('.plan_nav li:eq(0)').find('a').addClass('spy');
                //첫번째 서브메뉴 활성화
                
                $('.course_day1').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이션
            }else if(scroll>=h1 && scroll<h2){
                $('.plan_nav li:eq(1)').find('a').addClass('spy');
                //두번째 서브메뉴 활성화
                
                 $('.course_day2').addClass('boxMove');
            }else if(scroll>=h2 && scroll<h3){
                $('.plan_nav li:eq(2)').find('a').addClass('spy');
                //세번째 서브메뉴 활성화
                
                 $('.course_day3').addClass('boxMove');
            }
			
			$('.plan_nav li:eq(0)').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":570},1000); 
        });
		$('.tab1').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":580},1000); 
        });
	
	
		$('.plan_nav li:eq(1)').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":h1 + 10},1000); 
        });
		$('.tab2').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":h1 + 10},1000); 
        });
	
		$('.plan_nav li:eq(2)').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":h2 + 10},1000); 
        });
		$('.tab3').find('a').click(function(){
        	$("html,body").stop().animate({"scrollTop":h2 + 10},1000); 
        });
			
        });
		
		

    });