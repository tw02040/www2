// JavaScript Document

 $(document).ready(function () {
	var article = $('.faq .article');  //모든 리스트들
	
	 article.find('.a').slideUp(100);
	 
	$('.faq .article .trigger').click(function(){  
		//각각의 질문을 클릭하면
	var myArticle = $(this).parents('.article'); 
		//클릭한 질문의 리스트
	if(myArticle.hasClass('hide')){  
		//클릭한 리스트의 답변이 닫여있는가?
	    article.find('.a').slideUp(100);	//모든 답변을 닫아라.(지우면 중복으로 열리는 코드)
		article.removeClass('show').addClass('hide');	//(지우면 중복으로 열리는 코드)
//		article.find('span').text('+');
		article.find('i').removeClass('down_chevron_icon').addClass('up_chevron_icon');
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.a').slideDown(100);  
//	    myArticle.find('span').text('-');
		myArticle.find('i').removeClass('up_chevron_icon').addClass('down_chevron_icon');
	 } else {  //클릭한 리스트의 답변이 열려있는가?
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp(100);  
//		myArticle.find('span').text('+');
	 	myArticle.find('i').removeClass('down_chevron_icon').addClass('up_chevron_icon');
	}  
  });    
	
	$('.all').toggle(function(){ 
	    article.find('.a').slideDown(100);
	    article.removeClass('hide').addClass('show');
//		article.find('span').text('-');
		article.find('i').removeClass('up_chevron_icon').addClass('down_chevron_icon');
		$(this).text('전체 답변 닫기');		
	},function(){ 
	    article.find('.a').slideUp(100);
	    article.removeClass('show').addClass('hide');
//		article.find('span').text('+');
		article.find('i').removeClass('down_chevron_icon').addClass('up_chevron_icon');
		$(this).text('전체 답변 보기');
	});
	
});  