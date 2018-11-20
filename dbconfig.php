<?php
$mysql_hostname = '35.236.158.28';
$mysql_username = 'root';
$mysql_password = '12341234';
$mysql_database = 'dbproject';
$mysql_port = '3306';
$mysql_charset = 'utf8';

//1. DB 연결
$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password); 

if(!$connect){
	echo '[연결실패] : '.mysql_error().''; 
	die('MySQL 서버에 연결할 수 없습니다.');
} else {
	echo '[연결성공]';
}
//2. DB 선택
@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');

//3. 문자셋 지정
mysql_query(' SET NAMES '.$mysql_charset);

//4. 쿼리 생성
//$query = ' select \'complete\' as col from dual ';

//5. 쿼리 실행
//$result = mysql_query($query);

//6. 결과 처리
//while($row = mysql_fetch_array($result))
//{
//	echo $row['col'].'';
//}

//6. 연결 종료
//mysql_close($connect);
	date_default_timezone_set('Asia/Seoul');
?>