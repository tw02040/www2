// JavaScript Document
 $(document).ready(function() {
   var position=0;  //최초위치(목적지. left)
   var movesize=$('.plan_slide_gallery li').width(); //리스트 하나의 너비
   var timeonoff;
   
    $('.plan_slide_gallery ul').after($('.plan_slide_gallery ul').clone());
       //슬라이드 갤러리를 한번 복제

   $('.plan_btn').click(function(event){
	var $target=$(event.target);	//클릭한 해당 버튼
//	clearInterval(timeonoff);
	
	if($target.is('.pb2')){	//오른쪽버튼 클릭?
	     if(position==-3600){
	         $('.plan_slide_gallery').css('left',0);
	          position=0;
	      }
		
	     position-=movesize;  // 감소
    	     $('.plan_slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==-3600){
			   $('.plan_slide_gallery').css('left',0);
			   position=0;
		    }
	      });
	}else if($target.is('.pb1')){	//왼쪽 버튼 클릭?
	      if(position==0){
	           $('.plan_slide_gallery').css('left',-3600);
	                 position=-3600;
                   }

          position+=movesize; // 증가
    	  $('.plan_slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==0){
			   $('.plan_slide_gallery').css('left',-3600);
			   position=-3600;
		    }
	       });
	  }
	   
	   //페이지 번호 바꾸기
	   if(position==0||position==-3600||position==3600){
			   $('#plan_slide_box strong').text('1');
		}else if(position==1200||position==-1200){
			   $('#plan_slide_box strong').text('2');
		}else if(position==2400||position==-2400){
			   $('#plan_slide_box strong').text('3');
		}
	   
   });
   
   
 });

