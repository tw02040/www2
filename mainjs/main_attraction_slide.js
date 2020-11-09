// JavaScript Document
$(document).ready(function () {
	var aposition = -2770; //최초위치(목적지. left)
	var amovesize = 520;
	var anumber = 1;
	
	$('.attractions_text ul dl').hide();
	$('.attractions_text ul dl:eq(0)').show();
	
	$('.attractions_img').css('left', aposition);
	
	$('.attractions_img ul').after($('.attractions_img ul').clone());
	
	$('.attractions_img ul li:eq(0)').addClass('center_margin');
	$('.attractions_img ul li:eq(5)').addClass('center_margin');
	
	$('.attractions_btn').click(function (event) {
		var $target = $(event.target); //클릭한 해당 버튼
		
		$('.attractions_img ul li').removeClass('center_margin');
		
		if ($target.is('.ab2')) { //오른쪽버튼 클릭?
			$('.attractions_text ul dl').hide();
			anumber += 1
			
			if (anumber == 1) {
				aposition = -2770;
				$('.attractions_img').css('left', aposition);
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 2) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 3) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 4) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 5) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
				$('.attractions_img').css('left', -1390);
				aposition = -1390;
			}
			else if (anumber >= 6) {
				anumber = 1
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
				aposition = -2770 + amovesize;
			}
			
			$('.attractions .move_box strong').text(anumber);
			
			aposition -= amovesize;
			$('.attractions_img').stop().animate({
				left: aposition
			}, 'slow');
			
		}
		else if ($target.is('.ab1')) { //왼쪽 버튼 클릭?
			$('.attractions_text ul dl').hide();
			anumber -= 1
			
			if (anumber == 1) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
				$('.attractions_img').css('left', -3290);
				aposition = -3290;
			}
			else if (anumber == 2) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 3) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 4) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber == 5) {
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
			}
			else if (anumber <= 0) {
				anumber = 5
				$('.attractions_text ul dl:eq(' + (anumber - 1) + ')').fadeIn('slow');
				$('.attractions_img ul li:eq(' + (anumber - 1) + ')').addClass('center_margin');
				$('.attractions_img ul li:eq(' + (anumber + 4) + ')').addClass('center_margin');
				aposition = -1910 - amovesize;
			}
			
			$('.attractions .move_box strong').text(anumber);
			
			aposition += amovesize;
			$('.attractions_img').stop().animate({
				left: aposition
			}, 'slow');
		}
	});
});