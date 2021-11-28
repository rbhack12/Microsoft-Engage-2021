<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Exam-asy</title>
        <link rel="icon" type="image/x-icon" href="user/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="user/style/styles.css" rel="stylesheet" />
	</head>
	<body id="page-top">
		<?php

		//index.php

		include('admin/Examination.php');

		$exam = new Examination;

		//include('header_index.php');
				if(isset($_SESSION["user_id"]))
				{
				include('user/header_index.php');
				?>
				<div class="containter">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="container-fluid">
							<img class='img-fluid w-100' src="admin/assests/logo4.png" style="width:50%;" alt="Exam-asy" />
						</div>
						<select name="exam_list" id="exam_list" class="form-control input-lg">
							<option value="">Select Exam</option>
							<?php

							echo $exam->Fill_exam_list();

							?>
						</select>
						<br />
						<span id="exam_details"></span>
					</div>
					<div class="col-md-3"></div>
				</div>
				<script>
				$(document).ready(function(){

					$('#exam_list').parsley();

					var exam_id = '';

					$('#exam_list').change(function(){

						$('#exam_list').attr('required', 'required');

						if($('#exam_list').parsley().validate())
						{
							exam_id = $('#exam_list').val();
							$.ajax({
								url:"user/user_ajax_action.php",
								method:"POST",
								data:{action:'fetch_exam', page:'index', exam_id:exam_id},
								success:function(data)
								{
									$('#exam_details').html(data);
								}
							});
						}
					});

					$(document).on('click', '#enroll_button', function(){
						exam_id = $('#enroll_button').data('exam_id');
						$.ajax({
							url:"user/user_ajax_action.php",
							method:"POST",
							data:{action:'enroll_exam', page:'index', exam_id:exam_id},
							beforeSend:function()
							{
								$('#enroll_button').attr('disabled', 'disabled');
								$('#enroll_button').text('please wait');
							},
							success:function()
							{
								$('#enroll_button').attr('disabled', false);
								$('#enroll_button').removeClass('btn-warning');
								$('#enroll_button').addClass('btn-success');
								$('#enroll_button').text('Enroll success');
							}
						});
					});

				});
				</script>
				<?php
				}
				else
				{
				?>
				<!-- Navigation-->
				<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">Exam-asy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="user/login.php">Student</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Now, Online Exams made easy</h1>
                    <h2 class="masthead-subheading mb-0">With Exam-asy!</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Learn More</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Content section 1-->
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="user/assets/exam_header.jpeg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Manage Registrations</h2>
                            <p>Multiple students and multiple admins can register on this portal. Moreover, admins can see all the students who have registered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="user/assets/timer_image.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Give exams with the timer on.</h2>
                            <p>You don't have to look at clock multiple times. We provide exams with running clock feature.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="user/assets/result_image.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Instant Results</h2>
                            <p>Got tired while waiting for your results? Don't worry, we got your back. On spot results are made available in pdf format as well.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Exam-asy 2021</p></div>
            <div class="container px-5"><p class="m-0 text-center text-white small">With love, made by Riya Bhandari</p></div>
            <div class="container px-5"><p class="m-0 text-center text-white small">For Microsoft Engage Mentorship Program</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="style/scripts.js"></script>
				
		<?php
		}
		?>
	</body>
</html>