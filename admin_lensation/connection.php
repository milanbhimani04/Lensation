<?php
  session_start();
  ob_start();

  //connection code
  $con=new mysqli("localhost","root","","lensation");
  if (mysqli_connect_error())
  {
      die("Not connect" . mysqli_connect_errno());
  }

  error_reporting(0);
?>