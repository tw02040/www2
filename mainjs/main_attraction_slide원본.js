// JavaScript Document
 $(document).ready(function() {
   var position=170;  //최초위치(목적지. left)
   //var movesize=150; //이미지 하나의 너비
   var movesize=860;
   var timeonoff;
   
    $('.slide_gallery ul').after($('.slide_gallery ul').clone());
       //슬라이드 갤러리를 한번 복제

   $('.button').click(function(event){
	var $target=$(event.target);	//클릭한 해당 버튼
//	clearInterval(timeonoff);
	
	if($target.is('.m2')){	//왼쪽버튼 클릭?
		
	     if(position==-4470){
	         $('.slide_gallery').css('left',170);
	          position=170;
	      }
	     position-=movesize;  // 150씩 감소
    	     $('.slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==-4470){
			   $('.slide_gallery').css('left',170);
			   position=170;
		    }
	      });
	}else if($target.is('.m1')){	//오른쪽 버튼 클릭?
	      if(position==170){
	           $('.slide_gallery').css('left',-4470);
	                 position=-4470;
                   }

          position+=movesize; // 150씩 증가
    	  $('.slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==170){
			   $('.slide_gallery').css('left',-4470);
			   position=-4470;
		    }
	       });
	  }
   });
	 
//   //최초 자동 슬라이드 기능
//    timeonoff= setInterval(function () {
//        position-=movesize;  // 150씩 감소
//    	$('.slide_gallery').stop().animate({left:position}, 'fast',
//	         function(){							
//		    if(position==-4300){
//			   $('.slide_gallery').css('left',0);
//			   position=0;
//		    }
//	 });
//     }, 2000);
	 
 });

