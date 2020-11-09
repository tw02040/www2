<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	//html글쓰기 시에 코드가 노출되지 않게 다시 바꿔주는 코드
	if ($is_html=="y")
	{
		$item_content = str_replace("&lt;", "<", $item_content);
		$item_content = str_replace("&gt;", ">", $item_content);
	}


	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head> 
	<meta charset="UTF-8">
	<title>홍콩관광청-공지사항-글보기</title>	
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../common/css/icon_sns.css">
	<link rel="stylesheet" href="../common/css/icon_arrow.css">
	<link rel="stylesheet" href="./css/greet.css">
	<script src="../common/js/prefixfree.min.js"></script>
	<!--[if IE9]>  
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function del(href) 
		{
			if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
					document.location.href = href;
			}
		}
	</script>
</head>

<body>
	<div id="skipNav">
		<a href="#content">본문 바로가기</a>
		<a href="#gnb">글로벌 네비게이션 바로가기</a>
	</div>
	<div id="wrap">
  		<header id="headerArea">
			<div class="header_inner">
				<div class="top_menu">
					<div class="top_menu_login">
						<ul>
							<?
								if(!$userid)
								{
							?>
							<li>
								<a href="../login/login_form.php">로그인</a>
							</li>
							<li>
								<a href="../member/join.html">회원가입</a>
							</li>
							<?
								}
								else
								{
							?>
							<li><?=$usernick?></li>
							<li>
								<a href="../login/logout.php">로그아웃</a>
							</li>
							<li>
								<a href="../login/member_form_modify.php">정보수정</a>
							</li>
							<?
								}
							?>
						</ul>
					</div>
					<div class="top_menu_sns">
						<ul>
							<li>
								<a href="https://www.youtube.com/user/hongkong" target="_blank" title="홍콩관광청 유튜브 페이지가 새창에서 열림">
									<span class="hidden">유튜브</span>
									<i class="sns_icon youtube_circle_icon"></i>
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com/discoverhongkong.kr" target="_blank" title="홍콩관광청 페이스북 페이지가 새창에서 열림">
									<span class="hidden">페이스북</span>
									<i class="sns_icon facebook_circle_icon"></i>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/discoverhongkong" target="_blank" title="홍콩관광청 인스타그램 페이지가 새창에서 열림">
									<span class="hidden">인스타그램</span>
									<i class="sns_icon instagram_circle_icon"></i>
								</a>
							</li>			
						</ul>
					</div>
				</div>
				<div class="bottom_menu">
					<h1 class="logo">
						<a href="../index.html">홍콩관광청</a>
					</h1>
					<nav id="gnb">
						<h2 class="hidden">글로벌네비게이션영역</h2>

						<ul class="dropdownmenu">
							<li class="m1 menu">
								<h3><a class="depth1" href="../sub1/sub1_1.html">관광청소개</a></h3>
								<ul>
									<li><a href="../sub1/sub1_1.html">인사말</a></li>
									<li><a href="../sub1/sub1_2.html">목표</a></li>
									<li><a href="../sub1/sub1_3.html">세계지사</a></li>
									<li><a href="../sub1/sub1_4.html">오시는길</a></li>
								</ul>
							</li>
							<li class="m2 menu">
								<h3><a class="depth1" href="../sub2/sub2_1.html">홍콩정보</a></h3>
								<ul>
									<li><a href="../sub2/sub2_1.html">역사</a></li>
									<li><a href="../sub2/sub2_2.html">위치</a></li>
									<li><a href="../sub2/sub2_3.html">언어 및 문화</a></li>
									<li><a href="../sub2/sub2_4.html">기후</a></li>
								</ul>
							</li>
							<li class="m3 menu">
								<h3><a class="depth1" href="../sub3/sub3_1.html">테마여행</a></h3>
								<ul>
									<li><a href="../sub3/sub3_1.html">음식</a></li>
									<li><a href="../sub3/sub3_2.html">쇼핑</a></li>
									<li><a href="../sub3/sub3_3.html">축제</a></li>
								</ul>
							</li>
							<li class="m4 menu">
								<h3><a class="depth1" href="../sub4/sub4_1.html">대표관광지</a></h3>
								<ul>
									<li><a href="../sub4/sub4_1.html">템플스트리트 야시장</a></li>
									<li><a href="../sub4/sub4_2.html">홍콩 디즈니랜드</a></li>
									<li><a href="../sub4/sub4_3.html">빅토리아 피크</a></li>
									<li><a href="../sub4/sub4_4.html">란콰이퐁</a></li>
									<li><a href="../sub4/sub4_5.html">포린사원</a></li>
								</ul>
							</li>
							<li class="m5 menu">
								<h3><a class="depth1" href="../sub5/sub5_1.html">여행코스</a></h3>
								<ul>
									<li><a href="../sub5/sub5_1.html">가족 코스</a></li>
									<li><a href="../sub5/sub5_2.html">연인 코스</a></li>
									<li><a href="../sub5/sub5_3.html">싱글 코스</a></li>
								</ul>
							</li>
							<li class="m6 menu">
								<h3><a class="depth1" href="../greet/list.php">커뮤니티</a></h3>
								<ul>
									<li><a href="../greet/list.php">공지사항</a></li>
									<li><a href="../news/list.php">새소식</a></li>
									<li><a href="../sub6/sub6_3.html">FAQ</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div class="visual">
			<img src="../sub6/common/images/introduce_visual.jpg" alt="">
		</div>
		<div class="subnav_box">
			<div class="subnav_text">
				<h3>커뮤니티</h3>
				<p>홍콩에 대해 더 궁금한게 있으신가요?
					<br>궁금하신 모든 것을 알려드립니다.
				</p>
			</div>
			<div class="subnav">
				<ul>
					<li><a id="nav1" href="./list.php" class="current">공지사항</a></li>
					<li><a id="nav2" href="../news/list.php">새소식</a></li>
					<li><a id="nav3" href="../sub6/sub6_3.html">FAQ</a></li>
				</ul>
			</div>
		</div>
		<article id="content">
			<div class="title_area">
		        <div class="line_map">
		            <span>home</span>&gt;<span>커뮤니티</span>&gt;<strong>공지사항</strong>
		        </div>
		        <h2 class="s_title"><?= $item_subject ?></h2>
		    </div>
			<div class="content_area">
				<div class="view_title_sub1"><?= $item_nick ?></div>
				<div class="view_title_sub2">조회 : <?= $item_hit ?>  | <?= $item_date ?></div>
				<div class="view_content">
					<?= $item_content ?>
				</div>
				<div class="view_button">
						<a href="list.php?page=<?=$page?>">목록</a>
			<? 
			if($userid )  //로그인이 되면 글쓰기
			{
			?>
						<a href="write_form.php">글쓰기</a>
			<?
			}
			?>
			<? 
			if($userid==$item_id || $userlevel==1 || $userid=="admin")
			{
			?>
						<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>
						<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>
			<?
			}
			?>
			
				</div>
			</div>
		</article> <!-- end of content -->
		<a class="topMove" href="javascript:void(0);"><span><i class="arrow_icon up_arrow_icon"></i></span></a>
		<footer id="footerArea">
			<div class="footer_inner">
				<div class="footer_top">
					<div class="footer_top_left">
						<ul>
							<li>
								<a href="javascript:void(0);">이용약관</a>
							</li>
							<li>
								<a href="javascript:void(0);">개인정보처리방침</a>
							</li>
							<li>
								<a href="javascript:void(0);">사이트맵</a>
							</li>
						</ul>
					</div>
					<div class="select footer_top_family">
						<a class="arrow" href="javascript:void(0);">
							<p>family site</p>
							<span class="hidden">패밀리 사이트 바로가기</span>
							<i class="arrow_icon right_chevron_icon"></i>
						</a>
						<ul class="aList">
							<li><a href="https://www.discoverhongkong.com/eng/index.html" target="_blank" title="홍콩 관광청 영문 사이트가 새창에서 열림">홍콩 관광청 영문</a></li>
							<li><a href="https://www.brandhk.gov.hk/html/en/index.html" target="_blank" title="홍콩 브랜드 사이트가 새창에서 열림">홍콩 브랜드</a></li>
							<li><a href="https://www.mehongkong.com/kr/index.html" target="_blank" title="홍콩 비지니스 사이트가 새창에서 열림">홍콩 비지니스</a></li>
							<li><a href="https://partnernet.hktb.com/korea/kr/home/index.html" target="_blank" title="홍콩 파트너넷 사이트가 새창에서 열림">홍콩 파트너넷</a></li>
							<li><a href="http://overseas.mofa.go.kr/hk-ko/index.do" target="_blank" title="홍콩 대한민국 총영사관 사이트가 새창에서 열림">홍콩 대한민국 총영사관</a></li>
						</ul>
					</div>
				</div>
				<div class="footer_bottom">
					<div class="footer_bottom_left">
						<img src="../common/images/footer_logo.png" alt="홍콩 관광청">
						<address>서울 중구 을지로 16, 프레지던트호텔 1105호
							<br>TEL. 02-778-4403
						</address>
						<p>Copyright © 2020 Hong Kong Tourism Board. All rights reserved.</p>
					</div>
					<div class="footer_bottom_sns">
						<ul>
							<li>
								<a href="https://www.youtube.com/user/hongkong" target="_blank" title="홍콩관광청 유튜브 페이지가 새창에서 열림">
									<span class="hidden">유튜브</span>
									<i class="sns_icon youtube_circle_icon"></i>
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com/discoverhongkong.kr" target="_blank" title="홍콩관광청 페이스북 페이지가 새창에서 열림">
									<span class="hidden">페이스북</span>
									<i class="sns_icon facebook_circle_icon"></i>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/discoverhongkong" target="_blank" title="홍콩관광청 인스타그램 페이지가 새창에서 열림">
									<span class="hidden">인스타그램</span>
									<i class="sns_icon instagram_circle_icon"></i>
								</a>
							</li>			
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div> <!-- end of wrap -->
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="../common/js/gnb.js"></script>
	<script src="../common/js/slide_move.js"></script>
	<script src="../common/js/footer_familysite_select.js"></script>
</body>
</html>