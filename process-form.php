<?php
    error_reporting(0);
    include("conn.php");

  $name = $_POST["name"];
  $status = $_POST["status"];
  mysqli_query($db,"update user_signup set status = '$status' where name = '$name'");

  echo 'Response saved for name ' . $name . ': ' . $status;
?>
