<?php
error_reporting(0);
include("conn.php");
$query = mysqli_query($db,"select name,gender,ph_no,address,email,resume_file,skills,vid_file,portfolio_link from user_signup");

if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $status = $_POST["status"];
    mysqli_query($db,"update user_signup set status = '$status' where name = '$name'");
    if(isset($_POST["name"]) && isset($_POST["status"]))
    {
        echo "<h2>ajax successfull</h2>";
    }
    header("Location:skillbox.php");
}

$test = mysqli_query($db,"select * from user_signup where name = '$name'");
$fetch = mysqli_fetch_assoc($test);


if(isset($_POST['filter'])){
    if(!empty($_POST['checkbox'])){
      $cc = 0;
      foreach($_POST['checkbox'] as $option){
        if(isset($option)){
          $cc++;
        }
      }
    }
  }
?>