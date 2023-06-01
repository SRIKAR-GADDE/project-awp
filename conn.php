<?php
    $hname = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";

    $db = mysqli_connect($hname,$uname,$pass,$dbname);
    session_start();
?>