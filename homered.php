<?php
session_start();
if(isset($_SESSION["name"]))
{
    header('Location: aspirant.php');
}
else
{
    header('Location: hr_login.php');
}

?>

