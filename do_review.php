<?php session_start();
$conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
$date = date('Y-m-d H:i:s');
$sql = "insert  into ReviewBoard values(0,'".$_SESSION['user_id']."','".$_GET['ISBN']."','".$_POST['title']."','".$_POST['body']."','".$date."',0)";
//echo $sql;
$result = mysqli_query($conn, $sql);

if($result){
?>
 <script>
      alert( '리뷰가 작성되었습니다.' );
	  history.back();
 </script>
<?php
}else{
	//$_SESSION['logged'] = 'NO';
	//exit();
?>
 <script>
      alert( '리뷰가 작성되지 못했습니다.' );
	  history.back();
 </script>
<?php
}
?>
<script>
//location.href="/"
</script>