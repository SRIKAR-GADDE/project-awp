<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume Filtering Website</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-63m4u4Cm4n9y2AbwbKjvMVaRRndSf8L3jZ5xt5ueNLoIl2iu7DmpXjzwoR7+jM5Fuf/Thlvx8ZfyftAsR1fRjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
    body {
      background-color: #f8f9fa;
    }

    .jumbotron {
      background-color: red;
      color: #fff;
      padding: 3rem;
      border-radius: 0;
    }

    .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
      color:black;
    }

    .btn-primary:hover {
      background-color: black;
      border-color: #ffa200;
      border:3px solid black;
    }

    .feature {
      background-color: #fff;
      padding: 3rem;
      border-radius: 0.5rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .feature i {
      font-size: 4rem;
      color: #007bff;
    }

    .feature h3 {
      margin-top: 1.5rem;
      margin-bottom: 1rem;
      font-size: 2rem;
      color: #333;
    }

    .feature p {
      font-size: 1.25rem;
      color: #666;
    }
    
    #heading{
        color:blue;
    }

    #logout{
      border:2px solid black;
      border-radius:5px;
      color:white;
      background-color: black;
    }
    #logout:hover{
      border:4px solid #ffa200;
      border-radius:5px;
      color:black;
      background-color: #ffa200;
    }
    a:hover{
      cursor:default;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-primary bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"><b>Resume Filtering</b></a>
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
            <a class="nav-link" href="logout.php" id="logout">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  <div class="jumbotron">
  <div class="container mt-5">
  <div class="card" id="heading">
    <div class="card-body">
      <h2 class="card-title">Welcome to Resume Filter Website</h2>
      <p class="card-text">Our website is designed to help job seekers and recruiters find their perfect match. We use advanced filtering algorithms to match job candidates with open positions that are the best fit for their skills and experience.</p>
      <p class="card-text">Job seekers can create a profile and upload their resume to our platform, where our algorithms will analyze their skills, experience, and education to find the best matches for them. Recruiters can also create profiles and post open positions, and our platform will match their positions with qualified candidates.</p>
      <p class="card-text">Whether you're looking for your dream job or searching for the perfect candidate, Resume Filter Website can help you reach your goals. Sign up today and get started!</p>
      <a href="sign-in.php" class="btn btn-primary">SignUp</a>
      <a href="hr_login.php" class="btn btn-primary">login</a>
    </div>
  </div>
</div>
  </div>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-4">
        <div class="feature text-center">
          <i class="bi bi-person-check-fill"></i>
          <h3>For Job Aspirants</h3>
          <p>Find job openings that match your skills and experience, and submit your resume to top employers with just a few clicks.</p>
          <a href="hr_login.php" class="btn btn-primary">Applicants - Learn More</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature text-center">
          <i class="bi bi-building"></i>
          <h3>For Recruiters</h3>
          <p>Effortlessly filter through resumes to find the most qualified candidates for your job openings and streamline your hiring process.</p>
          <a href="login.php" class="btn btn-primary">HR - click here</a>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-mW3V48QaKLrGsd+lQtM47HjJGFePjKqzgC/1lQxJjKZnNS9DdcdAKRbFIFwU6cy0U6y/sT0j57DD6E02GihDvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <footer class="bg-light text-center text-lg-start">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase" id="about">About Us</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed risus euismod, lobortis elit eu, venenatis sapien. Nulla facilisi. Nulla facilisi. Nullam at nibh nibh.</p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="home.php" class="text-dark">Home</a></li>
          <li><a href="#about" class="text-dark">About</a></li>
          <li><a href="#contact" class="text-dark">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase" id="contact">Contact Us</h5>
        <ul class="list-unstyled mb-0">
          <li><i class="bi bi-geo-alt-fill"></i> 1234 Street Name, City Name, Country</li>
          <li><i class="bi bi-telephone-fill"></i> +1 1234567890</li>
          <li><i class="bi bi-envelope-fill"></i> info@example.com</li>
        </ul>
      </div>
    </div>
</footer>


</body>
</html>
