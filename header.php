
<?php 
session_start();
if(isset($_SESSION['email'])) {
    echo "Email is set: " . $_SESSION['email'] . $_SESSION['school_name'] .'<a href="./logout.php">logout</a>';
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Nav with Search Input and Login Button</title>
  <link rel="stylesheet" href="css/style.css">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <div class="container-fluid">

      <a class="navbar-brand fs-4 text-uppercase" href="#"><?php echo $_SESSION['school_name']?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./addstudent.php">Add Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./viewstudent.php">View Student</a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="./login.php">Fees</a>
          </li> -->
        </ul>
        <div id="currentDateTime" class="text-light"></div>
        <form class="d-flex ms-auto">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <button class="btn btn-outline-primary ms-2" type="button">Login</button>
      </div>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="row ">
      <!-- Sidebar -->
      <div class="col-md-2 ">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark Sidebar" style="margin-left: -15px; height: 100vh;">
          <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="./index.php" class="nav-link" aria-current="page">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a href="./view_school.php" class="nav-link">
                School
              </a>
            </li>
            <li class="nav-item">
              <a href="./addstudent.php" class="nav-link">
                Add Student
              </a>
            </li>
            
            <li class="nav-item">
              <a href="./viewstudent.php" class="nav-link">
                View Student
              </a>
            </li>
            <li class="nav-item">
              <a href="./addteacher.php" class="nav-link">
                Add Teacher
              </a>
            </li>
            <li class="nav-item">
              <a href="./viewteacher.php" class="nav-link">
                View Teacher
              </a>
            </li>
            <li class="nav-item">
              <a href="./addstaff.php" class="nav-link">
                Add Staff
              </a>
            </li>
            <li class="nav-item">
              <a href="./viewstaff.php" class="nav-link">
               view Staff
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                Fees
              </a>
            </li> -->
          </ul>

          <hr>
        </div>
      </div>
      <div class="col-md-10 main-content">
<?PHP }else{
  header("Location: login.php");
  exit();
  
}?>
