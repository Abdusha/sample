<?php
  //config your database
  $host_1301150053 = "localhost";
  $user_1301150053 = "root";
  $password_1301150053 = "";
  $db_1301150053 = "db_1301150053";
  $conn = mysqli_connect($host_1301150053, $user_1301150053, $password_1301150053, $db_1301150053);

  if (mysqli_connect_errno()){
    die("Disconnect. ".mysqli_connect_error());
  } 
?>