<?php
  include("conn.php");
  $username = $_SESSION["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status page - <?php echo $username ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<style>
 h2{
    text-align:center;
  }

 body{
        background: linear-gradient(to bottom right,#43cea2,#185a9d) center center fixed;
        /*background-size: cover;*/
  }

#status,#out{
    background-color:azure;
   margin-top:10px ;
   border-radius: 10px;
   text-align: center;
   padding: 24px;
  }

 
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Resume Filtering</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    
<div class="container container-dark" id="status">

<?php
        error_reporting(0);
        $username = $_SESSION["name"];
        $status = mysqli_query($db,"select resume_file from user_signup where name='$username'");
        if(mysqli_num_rows($status) === 1)
        {
            echo "<p>you have submitted the resume successfully</p>";
            echo "<p>scroll down to view the status ⬇⬇⬇</p>";
        }
        else
        {
            echo "submit the resume and come back to view the status";
        }
        
?>
    
</div>
<h2 style="color:floralwhite;">STATUS</h2>

<div class="container" id="out">
  <!-- <h3>request accepted</h3> -->
        <?php
        // require_once("conn.php");
        $username = $_SESSION["name"];
        // echo $user_signupname;
        $set = mysqli_query($db,"select * from user_signup where name = '$username'");
        // echo $set;
        while($row = mysqli_fetch_array($set))
        {
          // var_dump($object);
            if($row["status"] == "accept")
            {
              echo "<h3>request accepted</h3>";
            }
            if($row["status"] == "reject")
            {
              echo "<h3>request rejected</h3>";
            }
            if($row["status"] == "waitlist")
            {
              echo "<h3>request waitlisted</h3>";
            }          
            if($row["status"] == "")
            {
              echo "<h3>recruiter not yet visited your resume </h3>";
            }          
        }
        ?>
</div>


</body>
</html>