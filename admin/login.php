<?php

//login.php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_public();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Examination System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../user/assets/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../user/style/style.css" />
</head>
<body>
          
          <span id="message">
          <?php
          if(isset($_GET['verified']))
          {
            echo '
            <div class="alert alert-success">
              Your email has been registered. Please login to the portal.
            </div>
            ';
          }
          ?>
          </span>
          <section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form method="post" id="login_form_admin">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Admin login</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                <div class="form-group">
                  <label>Enter your Email Address</label>
                  <input type="text" name="mail_address_admin" id="mail_address_admin" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Enter the Password</label>
                  <input type="password" name="password_admin" id="password_admin" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="hidden" name="page" value="login" />
                  <input type="hidden" name="action" value="login" />
                  <input type="submit" name="login_admin" id="login_admin" class="btn btn-info" value="Login" />
                </div>
              </form>
                <div align="center">
                  <a href="register.php">Register</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

<script>

$(document).ready(function(){

  $('#login_form_admin').parsley();

  $('#login_form_admin').on('submit', function(event){
    event.preventDefault();

    $('#mail_address_admin').attr('required', 'required');

    $('#mail_address_admin').attr('data-parsley-type', 'email');

    $('#password_admin').attr('required', 'required');

    if($('#login_form_admin').parsley().validate())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#login_admin').attr('disabled', 'disabled');
          $('#login_admin').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            //echo "success";
            location.href="index.php";
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          $('#login_admin').attr('disabled', false);
          $('#login_admin').val('Login');
        }
      });
    }

  });

});

</script>