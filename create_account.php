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

  $sql = "insert into Customer VALUES('".$ID."','".$PW."','".$NAME."',".$AGE.",'".$SEX."','".$ADDRESS."')";
?>

<!DOCTYPE html>
<html>
<body>
  <p><?php echo $sql;?></p>
  </body>
</html>