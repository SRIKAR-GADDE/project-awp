<?php
require_once("conn.php");
error_reporting(0);

if(isset($_POST["submit"]))
{
	if(!empty($_POST)&&!empty($_POST['name'])&&!empty($_POST["gender"])&&!empty($_POST["phone"])&&!empty($_POST["address"])&&!empty($_POST["email"])&&!empty($_POST["password"]))
	{
		$name = $_POST["name"];
		$gender = $_POST["gender"];
		$ph_no = $_POST["phone"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$con_password = $_POST["confirm_password"];

		$check = mysqli_query($db,"select * from user_signup where name = '$name'");
		if($password === $con_password)
		{
			if(mysqli_num_rows($check)>0)
			{
				echo "<script>";
				echo "alert('username already exists');";
				echo "</script>";
			}
			else
			{
				mysqli_query($db,"insert into user_signup(name,gender,ph_no,address,email,password) values('$name','$gender','$ph_no','$address','$email','$password')");
				header('Location: hr_login.php');
				exit;
			}
		}
		else
		{
			echo "<script>";
			echo "alert('passwords do not match! please enter the corresponding fields correctly');";
            echo "</script>";
		}
	}
	else
	{
        echo "<script>";
		echo "alert('some fields are empty fill the fields and try again');";
        echo "</script>";
	}

	mysqli_close($db);

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h4>Sign Up</h4>
				</div>
				<div class="card-body">
					<form method="post">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control name" id="name" name="name" placeholder="Enter name">
						</div>
						<div class="form-group ">
							<label for="gender">Gender:</label>
							<select class="form-control" id="gender" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control email" id="email" name="email" placeholder="Enter email">
						</div>
						<div class="form-group ">
							<label for="phone">Phone Number:</label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
						</div>
						<div class="form-group ">
							<label for="address">Address:</label>
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control password" id="password" name="password" placeholder="Enter password">
						</div>
						<div class="form-group ">
							<label for="confirm_password">Confirm Password:</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="re-enter password">
						</div>
						<div class="submit">
							<input type="submit" class="form-control btn btn-primary" name="submit">
						</div>
						<div class="container">
							<p>Already having an account? - <a href="hr_login.php" id="ln">login</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
			
