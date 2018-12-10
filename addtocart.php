<?php
	session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
    
   	$ISBN = $_GET['ISBN'];

    $cartSQL = "INSERT INTO Order_(ISBN,CustomerNumber,Amount,State,Date_) VALUES(\"".$ISBN."\",".$_SESSION['user_n'].",1,0,now())";
    $cartresult = mysqli_query($conn, $cartSQL);
                
  ?>
  <script>
  	history.back();
  </script>