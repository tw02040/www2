<? 
	session_start(); 

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원정보 수정</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/member_form_modify.css">
	
	<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
	

	<script>
   
		 function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

  
   function check_input()
   {

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

	   if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.pass.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
	<header id="join_headerArea">
		<div class="join_header_inner">
			<h1 class="join_logo">
				<a href="../index.html">홍콩관광청</a>
			</h1>
		</div>
	</header>
	 
	<article id="content">  
	  
		<h2>회원정보 수정</h2>
		<form name="member_form" method="post" action="modify.php"> 
		
			<ul>
				<li class="id_box">
					<h3><label for="id">아이디</label></h3>
					<span><?= $row[id] ?></span>
				</li>
				<li class="pass_box">
					<h3><label for="pass">비밀번호</label></h3>
					<input type="password" name="pass" value="">
					<h3><label for="pass_confirm">비밀번호 재확인</label></h3>
					<input type="password" name="pass_confirm" value="">
				</li>
				<li class="name_box">
					<h3><label for="name">이름</label></h3>
					<span><?= $row[name] ?></span>
				</li>
				<li class="nick_box">
					<h3><label for="nick">닉네임</label></h3>
					<input type="text" name="nick" value="<?= $row[nick] ?>">
					<span id="nick2"><a href="#" onclick="check_nick()">중복확인</a></span>
				</li>
				<li class="phone_box">	
					<h3>전화번호</h3>
					<label class="hidden" for="hp1">전화번호앞3자리</label>
					<input type="text" class="hp" name="hp1" value="<?= $hp1 ?>">
					<label class="hidden" for="hp2">전화번호중간4자리</label> - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">
				</li>
				<li class="mail_box">
					<h3>이메일</h3>
					<label class="hidden" for="email1">이메일아이디</label>
					<input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @
					<label class="hidden" for="email2">이메일주소</label>
					<input type="text" name="email2" value="<?= $email2 ?>">
				</li>
				<li class="button_box">
					<a href="#" class="reset_bt" onclick="reset_form()">reset</a>
					<a href="#" class="join_bt" onclick="check_input()">수정완료</a>
				</li>
			</ul>
		</form>
	  
	</article>
</body>
</html>


