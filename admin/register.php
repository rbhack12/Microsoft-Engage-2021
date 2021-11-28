<?php

//register.php

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

<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-80">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card" style="border-radius: 1rem;">
            <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div> -->
            <div class="d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                  <form method="post" id="register_form_admin">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0" align="center">Admin Registration</span>
                  </div>
                    <div class="form-group">
                        <label>Enter your Email Address</label>
                        <input type="text" name="mail_address_admin" id="mail_address_admin" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='This Email Address is already registered. Please go to Login Page.' />
                    </div>
                    <div class="form-group">
                      <label>Enter the Password</label>
                      <input type="password" name="password_admin" id="password_admin" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="confirm_password_admin" id="confirm_password_admin" class="form-control" />
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="page" value="register" />
                      <input type="hidden" name="action" value="register" />
                      <input type="submit" name="register_admin" id="register_admin" class="btn btn-info" value="Register" />
                    </div>
                  </form>
                <div align="center">
          				<a href="login.php">Login</a>
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

	window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value)
    {
      return $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:{page:'register', action:'email_check', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#register_form_admin').parsley();

  $('#register_form_admin').on('submit', function(event){

    event.preventDefault();

    $('#mail_address_admin').attr('required', 'required');

    $('#mail_address_admin').attr('data-parsley-type', 'email');

    $('#password_admin').attr('required', 'required');

    $('#confirm_password_admin').attr('required', 'required');

    $('#confirm_password_admin').attr('data-parsley-equalto', '#password_admin');

    if($('#register_form_admin').parsley().isValid())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#register_admin').attr('disabled', 'disabled');
          $('#register_admin').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            //$('#message').html('<div class="alert alert-success">Please check your email</div>');
            //$('#admin_register_form')[0].reset();
            //$('#admin_register_form').parsley().reset();
            location.href="login.php?verified=success";
          }

          $('#register_admin').attr('disabled', false);
          $('#register_admin').val('Register');
        }
      });
    }

  });

});

</script>