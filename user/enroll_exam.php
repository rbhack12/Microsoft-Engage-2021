<?php

//enroll_exam.php

include('../admin/Examination.php');

$exam = new Examination;

$exam->user_session_private();

$exam->Change_exam_status($_SESSION['user_id']);

include('header.php');

?>

<br />
<div class="card">
	<span id="message">
          <?php
          if(isset($_GET['gotover']))
          {
			//$exam->Change_exam_status($_SESSION['user_id']);
            echo '
            <div class="alert alert-success">
              Exam time is up. Click to see your result.
            </div>
            ';
			
          }
          ?>
    </span>
	<div class="card-header">Online Exam List</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="exam_data_table">
				<thead>
					<tr>
						<th>Exam Name</th>
						<th>Date-Time</th>
						<th>Duration</th>
						<th>Total Questions</th>
						<th>Marking</th>
						<th>Negative Marking</th>
						<th>Status</th>
						<th>Test/Result</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>
</body>
</html>

<script>

$(document).ready(function(){

	var dataTable = $('#exam_data_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"user_ajax_action.php",
			type:"POST",
			data:{action:'fetch', page:'enroll_exam'}
		},
		"columnDefs":[
			{
				"targets":[7],
				"orderable":false,
			},
		],
	});

});

</script>