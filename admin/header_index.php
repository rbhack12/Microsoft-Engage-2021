<?php

//header.php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_private();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Online Examination System</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="icon" type="image/x-icon" href="../user/assets/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../user/style/style.css" />
    <link rel="stylesheet" href="../user/style/bootstrap-datetimepicker.css" />
    <script src="../user/style/bootstrap-datetimepicker.js"></script>
    <style>  
        body {
        font-family: 'Times New Roman', serif;
        }
    </style>
</head>
<body style="background-color:white;">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Admin page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="exam.php">Exams List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">Users List</a>
                </li> 
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color:orange; border:2px solid; border-color:white">Logout</a>
                </li>   
            </ul>
        </div>  
    </nav>
    <!-- Page Content -->
<div class="container">

<hr class="mt-2 mb-5">

<div class="row text-center text-lg-start">

  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img1.png" alt="">
    </a>
  </div>
  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img2.png" alt="">
    </a>
  </div>
  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img4.png" alt="">
    </a>
  </div>
  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img5.png" alt="">
    </a>
  </div>
  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img8.png" alt="">
    </a>
  </div>
  <div class="col-lg-4 col-lg-4 col-6">
    <a href="#" class="d-block mb-4 h-200">
      <img class="img-fluid img-thumbnail" src="assests/img9.png" alt="">
    </a>
  </div>

</div>

</div>