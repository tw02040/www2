<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/login.css">
</head>

<body>
	<header id="login_headerArea">
		<div class="login_header_inner">
			<h1 class="login_logo">
				<a href="../index.html">홍콩관광청</a>
			</h1>
		</div>
	</header>
	<article id="content">
		<form  name="member_form" method="post" action="login.php"> 
			<h2>로그인</h2>
			<div id="login_form">
			 	<ul>
					<li class="id_box">
						<h3><label for="id">아이디</label></h3>
						<input type="text" name="id" class="login_input">
					</li>
					<li class="pass_box">
						<h3><label for="pass">비밀번호</label></h3>
						<input type="password" name="pass" class="login_input">
					</li>
					<li class="login_button">
						<input type="submit" value="로그인">
					</li>
					<li class="join_button">
						<span>아직 홍콩관광청의 회원이 아니신가요?</span>
						<a href="../member/member_form.php">회원가입</a>
					</li>
				</ul>
			</div> <!-- end of form_login -->
		</form>
	</article>

</body>
</html>