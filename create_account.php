<?php
$conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');

  $ID=$_POST['id'];
  $PW=$_POST['pw'];
  $NAME=$_POST['name'];
  $AGE=$_POST['age'];
  $SEX=$_POST['sex'];
  $ADDRESS=$_POST['address'];

  $sql = "select * from Customer where ID = '".$ID."'";
  $result = mysqli_query($conn, $sql);
  if($result->num_rows>=1){
	  ?>
	  <script>
	  alert("동일한 아이디가 존재합니다.");
	  history.back();
	  </script>
	  <?php
  
  }
  else{
	$sql = "insert into Customer VALUES(0,'".$ID."','".$PW."','".$NAME."',".$AGE.",'".$SEX."','".$ADDRESS."')";
	$result = mysqli_query($conn, $sql);
	if($result){
		?>
		<script>
		alert("정상적으로 회원가입 되었습니다.");
		history.back();
		</script>
		<?php
	}
	else{
		?>
		<script>
		alert("회원가입에 에러가 발생했습니다.");
		history.back();
		</script>
		<?php
	
	}
  }
?>

<!DOCTYPE html>
<html>
<body>
</body>
</html>