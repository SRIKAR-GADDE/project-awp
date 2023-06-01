<?php

error_reporting(0);
include("conn.php");
$query = mysqli_query($db,"select name,gender,ph_no,address,email,resume_file,skills from user_signup");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="script.js"></script>

    <title>hr - Resume screening website</title>
</head>

<style>
  table {
    width:fit-content;
    border-collapse: collapse;
  }

  #openbox{
    display:flex;
    justify-content:flex-start;
  }

  table,tr,th, td {
    padding: 8px;
    text-align: left;
    border: 2px solid black;
    border-radius: 5px;
    font-size: 20pt;
  }

  @media only screen and (max-width: 600px) {
    table {
      border: none;
    }
    th {
      display: none;
    }
    td {
      display: block;
      border: none;
      position: relative;
    }
    td:before {
      position: absolute;
      left: 6px;
      content: attr(data-label);
      font-weight: bold;
    }
    #rightdiv,#leftdiv{
        margin-left:-875px;
    }
  }

    table,th,td{
        border-collapse:collapse;
    }

    tr{
        border :2px solid black;
    }

    .checkbox-container {
        position: relative;
        height: 347px; 
        width:100%;
        overflow-y: scroll;
    }

    #search{
        position: absolute;
    }

    #grid-container{
        display:flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        flex-direction: column;
    }
    
    input[type="checkbox"] {
  display: none; 
}

label {
  display: inline-block;
  position: relative;
  padding-left: 35px; 
  margin-right: 15px;
  cursor: pointer;
}

label:before {
  content: "";
  display: inline-block;
  width: 27px;
  height: 27px;
  margin-right: 10px;
  position: absolute;
  left: 0;
  bottom: 1px;
  background-color: #fff;
  border: 1px solid #aaa;
}

input[type="checkbox"]:checked + label:before {
  background-color: red; 
  color: #fff; 
  border-color: #007bff; 
}

    #rightdiv,#leftdiv{
        margin-right:10px;
        height:100%;
    }

    #sea{
        display:flex;
        justify-content:center;
    }

    #leftdiv{
        border:2px solid white;
    }

    label{
        text-decoration: none;
        font-size: 18pt;
    }

    th{
        text-align: center;
    }

    #welcome{
        text-align: center;
        background-color: white;
        border-radius: 10px;

    }

    body{
        background:linear-gradient(to bottom,aqua,blue)center center fixed;
        background-size: cover;
    }

    #leftdiv{
        background-color: blue;
        width:1693px;
        margin-left:-26%;
        border-radius: 26px;
        margin-top:20px;
        padding-top:16px;
        padding-bottom:26px;
        color:white;
    }

    table{
        background-color: azure;
        border-radius: 10px;
    }

    #submit{
        display:inline-block;
        margin:auto;
        margin-top:30px;
    }
    #name{
        text-transform: capitalize;
    }

    #righth3{
        margin-top: 30px;
        display: flex;
        justify-content: center;
        color:black;
    }
    
    <?php if(!isset($_POST["filter"])){?>

    #rightdiv{
        display:none;
    }
    #righth3{
        display:none;
    }

    <?php }?>
    
    <?php if(isset($_POST["filter"])){?>

    #leftdiv{
        display:none;
    }
    #leftdiv{
        background-color: blue;
        width:1693px;
        margin-left:-28%;
        border-radius: 26px;
        margin-top:20px;
        margin-right:-26%;
        padding-top:16px;
        padding-bottom:26px;
        color:white;
    }

    #rightdiv{
        display:initial;
    }

    .checkbox-container {
        position: relative;
        height: 347px; 
        width:100%;
        overflow-y: scroll; 
    }

    #rightdiv{
        margin-top:0px;
        margin-left:-59%;
        margin-right:10px;
    }

    #grid-container{
        display:flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content:left;
        width:2357px;
    }
    #ld{
        display:flex;
        justify-content: center;
    }

    table{
        width:200px;
        border-radius: 4px;
    }

    #righth3{
        margin-top: 30px;
        text-align: center;
    }
    <?php }?>

    #button-1{
        display:inline-block;
        margin-top:10px;
        margin:auto;
        text-align:center;
    }
    
    @media screen and (max-width: 768px) {
            #rightdiv {
                margin-left:-875px;
                margin-right: 0;
                margin-bottom: 20px;
            }
            table {
                margin-left: 0;
            }
            tr{
                text-align:center;
            }
        }
</style>

<body>
    <div class="submit">

    </div>
<h1 class="container col-md-9 " id="welcome" >Welcome Recruiters</h1>
    <script>
    function open_box()
    {
        document.getElementById("leftdiv").style.display = "unset";
    }
    </script>
<div class="container-fluid" id="grid-container">
    <div class="container" id="ld">
<div class="container-fluid" id="leftdiv">
<form action="hr.php" method="post">
    
<article class="container">
    <h2 class="text-center">Select the Skills: </h2>
</article>

<div class="checkbox-container" id="grid">
<div id="sea">
</div>
<div class="search">
  <input type="checkbox" name="checkbox[]" value="HTML" id="HTML"> <label for="HTML">HTML</label><br>
  <input type="checkbox" name="checkbox[]" value="CSS" id="CSS"> <label for="CSS">CSS</label><br>
  <input type="checkbox" name="checkbox[]" value="C++" id="C++"> <label for="C++">C++</label><br>
  <input type="checkbox" name="checkbox[]" value="Python" id="Python"> <label for="Python">Python</label><br>
  <input type="checkbox" name="checkbox[]" value="Java" id="Java"> <label for="Java">Java</label><br>
  <input type="checkbox" name="checkbox[]" value="Javascript" id="Javascript"> <label for="Javascript">Javascript</label><br>
  <input type="checkbox" name="checkbox[]" value="Typescript" id="Typescript"> <label for="Typescript">Typescript</label><br>
  <input type="checkbox" name="checkbox[]" value="PHP" id="PHP"> <label for="PHP">PHP</label><br>
  <input type="checkbox" name="checkbox[]" value="C#" id="C#"> <label for="C#">C#</label><br>
  <input type="checkbox" name="checkbox[]" value="NODEjs" id="NODEjs"> <label for="NODEjs">NODEjs</label><br>
  <input type="checkbox" name="checkbox[]" value="Reactjs" id="Reactjs"> <label for="Reactjs">Reactjs</label><br>
  <input type="checkbox" name="checkbox[]" value="React Native" id="React Native"> <label for="React Native">React Native</label><br>
  <input type="checkbox" name="checkbox[]" value="Kotlin" id="Kotlin"> <label for="Kotlin">Kotlin</label><br>
  <input type="checkbox" name="checkbox[]" value="Swift" id="Swift"> <label for="Swift">Swift</label><br>
  <input type="checkbox" name="checkbox[]" value="R" id="R"> <label for="R">R</label><br>
  <input type="checkbox" name="checkbox[]" value="Flutter" id="Flutter"> <label for="Flutter">Flutter</label><br>
  <input type="checkbox" name="checkbox[]" value="XML" id="XML"> <label for="XML">XML</label><br>
  <input type="checkbox" name="checkbox[]" value="Git" id="Git"> <label for="Git">Git</label><br>
  <input type="checkbox" name="checkbox[]" value="Git hub" id="Git hub"> <label for="Git hub">Git hub</label><br>
  <input type="checkbox" name="checkbox[]" value="MongoDB" id="MongoDB"> <label for="MongoDB">MongoDB</label><br>
  <input type="checkbox" name="checkbox[]" value="Expressjs" id="Expressjs"> <label for="Expressjs">Expressjs</label><br>
  <input type="checkbox" name="checkbox[]" value="Angularjs" id="Angularjs"> <label for="Angularjs">Angularjs</label><br>
  <input type="checkbox" name="checkbox[]" value="MySql" id="MySql"> <label for="MySql">MySql</label><br>
  <input type="checkbox" name="checkbox[]" value="Django" id="Django"> <label for="Django">Django</label><br>
  <input type="checkbox" name="checkbox[]" value="Flask" id="Flask"> <label for="Flask">Flask</label><br>
  <input type="checkbox" name="checkbox[]" value="PowerBI" id="PowerBI"> <label for="PowerBI">PowerBI</label><br>
  <input type="checkbox" name="checkbox[]" value="Perl" id="Perl"> <label for="Perl">Perl</label><br>
  <input type="checkbox" name="checkbox[]" value="Laravel" id="Laravel"> <label for="Laravel">Laravel</label><br>
  <input type="checkbox" name="checkbox[]" value="Ruby" id="Ruby"> <label for="Ruby">Ruby</label><br>
  <input type="checkbox" name="checkbox[]" value="Ruby on rails" id="Ruby on rails"><label for="Ruby on rails">Ruby on rails</label><br>
  <input type="checkbox" name="checkbox[]" value="GO" id="GO"> <label for="GO">GO</label><br>
  <input type="checkbox" name="checkbox[]" value="Dart" id="Dart"> <label for="Dart">Dart</label><br>
  <input type="checkbox" name="checkbox[]" value="Matlab" id="Matlab"> <label for="Matlab">Matlab</label><br>
</div>

</div>

<div class="container" id="submit">
    <input type="submit" name="filter" id="button-1" class="btn btn-success text-center" value="FILTER">
</div>
</form>
</div>
</div>
<div class="container">
    <h1 class="text-center" id="righth3">FILTERED APPLICANTS</h1>
</div>

<div class="container" id="rightdiv">
<?php if(isset($_POST["filter"])){?>

<div id="openbox">
    <button name="open" id="open" class="btn-success btn-lg" onclick="open_box()">open skill box</button>
</div>

<?php }?>
<div id="table">
<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Contact number</th>
                <th>Email</th>
                <th>Resume File</th>
                <th>Skills</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($query))
        {
            $db_skills = $row["skills"];
            $name = $row["name"];
            $gender = $row["gender"];
            $ph_no = $row["ph_no"];
            $email = $row["email"];
            $resume_file = $row["resume_file"];
            if(isset($_POST["filter"]))
            {
                $skills = $_POST["checkbox"];
                foreach ($skills as $value ) {
                    if (stripos($db_skills, $value) === false) {
                      break;
                    } ?>
                    <tr id="row">
                        <td id="name"><?php echo $name?></td>
                        <td><?php echo $gender?></td>
                        <td><?php echo $ph_no?></td>
                        <td><?php echo $email?></td>
                        <td><a href="documents/<?php echo $resume_file ?>" download><?php echo $resume_file?></a></td>
                        <td><?php echo $row["skills"] ?></td>
                            <td>
                                <form class="my-form" method="post">
                                <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
                                    <select name="status" id="status">
                                        <option value="accept">accept</option>
                                        <option value="reject">reject</option>
                                        <option value="" selected hidden>select</option>
                                    </select>
                                </form>  
                            </td>
                    </tr>
                    <br>
                    <?php 

                break;
                }
            }?>
       <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <td>  <button type="submit" name="submit" id="submitall" class="btn btn-primary" onclick="checkInput()" value="Submit">Submit</button>  </td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>

</div>
</body>
</html>

<script>
    function checkInput() {
  var input = document.getElementById("submitall");
  if (input.value) {
    alert("submitted successfully");
  } else {
    alert("Input is empty");
  }
}
</script>