<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Online Examination System in PHP</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style/TimeCircles.css" />
  	<link rel="stylesheet" href="style/style.css" />
    <script src="style/TimeCircles.js"></script>
</head>
<body class="vh-100" style="background-color: #9A616D;">

<?php

//register.php

include('../admin/Examination.php');

$exam = new Examination;

$exam->user_session_public();

//include('header.php');

?>
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
                  <form method="post" id="register_form_user">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0" align="center">User Registration</span>
                  </div>
                  <div class="form-group">
                    <label>Enter Email Address</label>
                    <input type="text" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='Email Address already Exists' />
                  </div>
                  <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Enter Confirm Password</label>
                    <input type="password" name="confirm_user_password" id="confirm_user_password" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Enter Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" /> 
                  </div>
                  <div class="form-group">
                    <label>Select Gender</label>
                    <select name="user_gender" id="user_gender" class="form-control">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select> 
                  </div>
                  <div class="form-group">
                    <label>Enter Address</label>
                    <textarea name="user_address" id="user_address" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enter Mobile Number</label>
                    <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control" /> 
                  </div>
                  <div class="form-group">
                    <label>Select Profile Image</label>
                    <input type="file" name="user_image" id="user_image" />
                  </div>
                  <br />
                  <div class="form-group" align="center">
                    <input type="hidden" name='page' value='register' />
                    <input type="hidden" name="action" value="register" />
                    <input type="submit" name="user_register" id="user_register" class="btn btn-info" value="Register" />
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
    validateString: function(value){
      return $.ajax({
        url:'user_ajax_action.php',
        method:'post',
        data:{page:'register', action:'check_email', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#register_form_user').parsley();

  $('#register_form_user').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    $('#confirm_user_password').attr('required', 'required');

    $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

    $('#user_name').attr('required', 'required');

    $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

    $('#user_address').attr('required', 'required');

    $('#user_mobile_no').attr('required', 'required');

    $('#user_mobile_no').attr('data-parsley-pattern', '^[0-9]+$');

    $('#user_image').attr('required', 'required');

    $('#user_image').attr('accept', 'image/*');

    if($('#register_form_user').parsley().validate())
    {
      $.ajax({
        url:'user_ajax_action.php',
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
          $('#user_register').attr('disabled', 'disabled');
          $('#user_register').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            /* $('#message').html('<div class="alert alert-success">Please check your email</div>');
            $('#user_register_form')[0].reset();
            $('#user_register_form').parsley().reset(); */
            location.href="login.php?verified=success";
          }

          $('#user_register').attr('disabled', false);

          $('#user_register').val('Register');
        }
      })
    }

  });
	
});

</script>