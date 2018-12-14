<?php
	session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
    
  $buySQL = "UPDATE Order_ SET State = 1 WHERE State=0 AND CustomerNumber =\"".$_SESSION['user_n']."\"";
  $buyresult = mysqli_query($conn, $buySQL); 
                
  ?>

  <script>
  	alert(' 구매 완료 ');
    history.back();
  </script>