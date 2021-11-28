<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Exam-asy</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style/TimeCircles.css" />
  	<link rel="stylesheet" href="style/style.css" />
    <script src="style/TimeCircles.js"></script>
    <style>
    body {
        font-family: 'Gill Sans', sans-serif;
        }
    </style>
</head>
<body style="background-color:#383838;">


  <?php
  if(isset($_SESSION['user_id']))
  {
  ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="../index.php">Student Side</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="enroll_exam.php">Exams list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Check your Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change_password.php">Change Password</a>
        </li> 
      </ul>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="logout.php" style="color:orange; border:2px solid; border-color:white">Logout</a>
          </li>   
      </ul>
    </div>  
  </nav>

  <?php
  }
  ?>