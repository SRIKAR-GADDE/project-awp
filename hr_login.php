<?php 
 error_reporting(0);
include("conn.php");

$uname = $_POST["username"];
$passwd = $_POST["password"];

if($_SERVER['REQUEST_METHOD']==='POST')
{

    if(!empty($uname)&&!empty($passwd))
    {
      $check = mysqli_query($db,"select * from user_signup where name='$uname' && password='$passwd'");
      $check1 = mysqli_query($db,"select * from user_signup where name='$uname' && !(resume_file= ' ')");
      // $check11 = mysqli_fetch_assoc($check1);

      if(mysqli_num_rows($check) === 1)
      {
        if(mysqli_num_rows($check1) === 1)
        {
          $_SESSION["name"]=$uname;
          header('Location: status.php');
        }
        else{
          $_SESSION["name"]=$uname;
          header('Location: aspirant.php');
          exit;
        }
      }
      else{
        echo "<script type='text/JavaScript'>";
        echo "alert('enter valid username and password')";
        echo "</script>";
      }
    }
    else{
      echo "<script type='text/JavaScript'>";
      echo"alert('fields are empty fill them and try again')";
      echo "</script>";    
    }
    mysqli_close($db);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

    <style>
        body{
            background: linear-gradient(to bottom right,aqua,rgb(53, 53, 238)) center center fixed;
            background-size: cover;
        }
    </style>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card" >
          <div class="card-header">
            <h4 class="text-center">Login</h4>
          </div>
          <div class="card-body">
            <form action="hr_login.php" method="post">
              <div class="form-group">
			          <label for="username">username:</label>
			          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" name="username" required>
		          </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
              </div>
              <div class="login-container">
                <button type="submit" class="btn btn-primary btn-block" name="login" >Login</button>
              </div>
              <p style="text-align: center;"> Create an account? <a href="Sign-in.php">Sign up</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>
