<?php
    error_reporting(0);
    include("conn.php");
    if(!isset($_SESSION["name"]))
    {
        header('Location: hr_login.php');
        exit();
    }
    $username = $_SESSION["name"];
    if(isset($_POST["submit"]))
    {
      $searchArray = array("HTML","CSS","C++","Python","Java","Javascript","Typescript","PHP","C#","NODEjs","Reactjs","React Native","Kotlin","Swift","R","Flutter","XML","Git","Github","MongoDB","Expressjs","Angularjs","MySql","Django","Flask","PowerBI","Perl","Laravel","Ruby","Ruby on rails","GO","Dart","Matlab");
      $confirmarray = array();
      $urlarray = array();

        $file = $_FILES["resume"];
        $filename = $_FILES["resume"]["name"];
        $tmpname = $_FILES["resume"]["tmp_name"];
        $folder = "documents/".$filename;
        move_uploaded_file($tmpname,$folder);
        $file_ext=strtolower(end(explode('.',$_FILES['resume']['name'])));
        if($file_ext === "docx" || $file_ext === "doc")
        {
          include ("docx_convert.php");
          $converter = new DocxToTextConversion("documents/".$filename);
          $filedata = $converter->convertToText();
        }     
        elseif($file_ext === "txt")
        {
          $filedata = file_get_contents("documents/$filename");
        }
        elseif($file_ext === "pdf")
        {
          include ("pdf_convert.php");
          $converter = new PdfToTextConversion("documents/".$filename);
          $filedata = $converter->convertToText();
        }
        else{
          echo "<script>";
          echo "alert('choose a file with valid extension');";
          echo "</script>";
        }

        foreach ($searchArray as $search) {
          if (stripos($filedata, $search) !== false) {
         	$confirmarray[] = $search;
          } 
        }
        $confirmString = implode(",", $confirmarray);
        $insert = "update user_signup set resume_file='$filename' where name = '$username'";
        mysqli_query($db,$insert);
        $con = $confirmString;
        $skills = "update user_signup set skills='$con' where name = '$username'"; 
        mysqli_query($db,$skills);
        header('Location: status.php');
        exit();
    }
    
?>  

          
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_signupname?> - resume upload page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/mammoth@1.4.8/mammoth.browser.min.js"></script>
  <script src="https://kit.fontawesome.com/082d700e84.js" crossorigin="anonymous"></script>
  <script>
		function handleFileInputChange(event) {
    const fileInput = event.target;
    const fileInputLabel = document.getElementById('file-chosen');
  
    if (fileInput.files.length > 0) {
      const fileName = fileInput.files[0].name;
      fileInputLabel.textContent = fileName;
    } else {
      fileInputLabel.textContent = 'Choose a file';
    }
  }
	</script>
</head>

<style>
    <?php if(isset($_POST["submit"])) {?>
        #file{
          display:none
        }
        #submit{
            display:none;
        }
       
    <?php }?>

    body{
      background: linear-gradient(to bottom right, rgb(23,205,205), rgb(23,25,95))center center fixed;
      background-size:cover;
    }

    #navbar{
      opacity:0.7;
    }

    main{
      padding-top:5%;
    }

    #main{
      margin-top:145px;
      display:flex;
      flex-direction:column;
      height:820px;
      align-items:center;
      padding:25px;
      opacity:0.9;
      text-align:center;
      border:2px solid white;
      border-radius:5px;
      background-color:whitesmoke;
    }

    #upper{
      display:flex;
      height:550px;
      text-align:center;
      align-items:center;
      justify-content:center;
    }

    #res-form{
        height:600px;
        justify-content:center;
    }

    #resume{
      display:none;
    }

    #label{
      border:2px dashed black;
      width:400px;
      height:max-height;
      background-color:grey;
      opacity:0.3;
    }

    #icon{
      width:200px;
      display:flex;
      justify-content:center;
      align-items:center;
      margin:auto;
      width:100%;
      height:232px;
    }

    #res-upload{
      color:darkblue;
    }

    #upload{
      margin-top:20px;
    }

    #video_res{
      display:none;
    }
    
    
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="#">Resume Filtering</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
<br><br>
<main class="container " id="upper">
      <div id="main" class="container col-md-8">
  <h1>Welcome <?php echo $username ?></h1>
  <div id="res-form" class="container">
  <p id="checkinput"></p>
  <form action="aspirant.php" method="post" enctype="multipart/form-data">
        <div class="file" id="file">
            <label for="resume" id="label"><h1 id="res-upload">Click to Upload Resume</h1><i id="icon" class="fa-solid fa-file-arrow-up fa-2xl" style="color:black;font-size:80px"></i></label>
            <input type="file" class="form-control" name="resume" id="resume" onchange="handleFileInputChange(event)">
            <h5 id="file-chosen">No file chosen</h5>
        </div>
        <div class="upload" id="upload">
            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" onclick="upload()" value="Submit">
        </div>
    </form>     
  </div>  
  </main>
  </div>
</body>
</html>


<script>
  function upload() {
  var input = document.getElementById("submit");
  if (input.value) {
    alert("submitted successfully");
  } else {
    alert("choose a file to upload");
  }
}
</script>
