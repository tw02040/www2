<?
   function latest_article($table, $loop, $char_limit, $con_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}
			
			$len_content = mb_strlen($row[content], 'utf-8');
			$content = $row[content];

			if ($len_content > $con_limit)
			{
				$content = str_replace( "&#039;", "'", $content);               
                $content = mb_substr($content, 0, $con_limit, 'utf-8');
				$content = $content."...";
			}

			$regist_day_year = substr($row[regist_day], 0, 4);
			$regist_day_month = substr($row[regist_day], 5, 2);
			$regist_day_day = substr($row[regist_day], 8, 2);

			echo "      
				<li>
					<dl>
						<dt>$regist_day_year<br>$regist_day_month.$regist_day_day</dt>
						<dt>$subject</dt>
						<dd>$content</dd>
					</dl>
					<a href='./$table/view.php?table=$table&num=$num'>
						<span class='hidden'>해당 공지 페이지 바로가기</span>
						<i class='arrow_icon right_arrow_icon'></i>
					</a>
				</li>
			";
		}
		mysql_close();
   }

//	<li>
//		<dl>
//			<dt>2020<br>05.25</dt>
//			<dt>우한 폐렴에 대한 공지 사항</dt>
//			<dd>우한 폐렴과 관련한 홍콩 최신 정보는 홍콩 질병관리본부 웹사이트에서 찾아볼 수 있습니다.</dd>
//		</dl>
//		<a href="#">
//			<span class="hidden">해당 공지 페이지 바로가기</span>
//			<i class="arrow_icon right_arrow_icon"></i>
//		</a>
//	</li>

//echo "
//<li>
//		<dl>
//			<dt>$regist_day</dt>
//			<dt>$subject</dt>
//			<dd>$content</dd>
//		</dl>
//		<a href="./$table/view.php?table=$table&num=$num">
//			<span class="hidden">해당 공지 페이지 바로가기</span>
//			<i class="arrow_icon right_arrow_icon"></i>
//		</a>
//	</li>
//";

?>