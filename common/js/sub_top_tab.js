//서브 상단의 네모모양 탭

$(document).ready(function(){
  var cnt=$('.contentnav ul li a').length;  //탭메뉴개수  ***
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.contentnav .tab1').addClass('select');
  
  $('.contentnav .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('select');
      }  //모든 탭메뉴를 비활성화 시켜라
      $(this).addClass('select'); 
   });
  });
});
