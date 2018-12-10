<?php session_start();
$conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
$sql = "select * from Customer where ID='".$_POST["id"]."' and Password_='".$_POST["pwd"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($result->num_rows>=1){
	$_SESSION['user_id'] = $_POST["id"];
	$_SESSION['user_n'] = $row['CustomerNumber'];
	$_SESSION['logged'] = "YES";
	header("Location: /index.php");
	exit();
?>
 <script>
      alert( '로그인 되었습니다.' );
 </script>
<?php
}else{
	$_SESSION['logged'] = 'NO';
	//exit();
?>
 <script>
      alert( '계정이 존재하지 않습니다.' );
	  history.back();
 </script>
<?php
}
?>
<script>
location.href="/"
</script>