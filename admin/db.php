<?php
error_reporting('all');
$con = mysqli_connect("localhost","root","","veda2018");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>