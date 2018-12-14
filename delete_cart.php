<?php
	session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
  $ISBN=$_GET['ISBN'];
  $deleteSQL = "DELETE FROM Order_ WHERE CustomerNumber=\"".$_SESSION['user_n']."\" AND ISBN = \"".$ISBN."\"";
  $deleteresult = mysqli_query($conn, $deleteSQL); 
  ?>

  <script>
    history.back();
  </script>