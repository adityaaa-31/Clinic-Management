<?php
session_start();

include('include/config.php');
include('include/test.php');

$st = 0;
$et = 0;

if(isset($_POST['sch'])){
	$doctorid=$_POST['doctor'];

	$t = pg_query("select * from doctors where id='$doctorid'");
	
	$time = pg_fetch_array($t);

	$st=$time['start_time'];
	$et=$time['end_time'];
	
}


if(isset($_POST['submit']))
	{
		$specilization=$_POST['Doctorspecialization'];
		$doctorid=$_POST['doctor'];
		$_SESSION['did'] = $_POST['doctor'];
		$userid=$_SESSION['id'];
		$fees=$_POST['fees'];
		$appdate=$_POST['appdate'];
		$time=$_POST['apptime'];
		$userstatus=1;
		$docstatus=1;


		$spid = 0;
		$q = pg_query("select * from specilization where specilization='$specilization'");
		$r = pg_fetch_array($q);

		$spid = $r['id'];

		$query=pg_query($con,"insert into appointment (doctorspecialization, doctorid, userid, consultancyfees, appointmentdate, appointmenttime, userstatus, doctorstatus, specilizationid) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus','$spid')");
		

		// $a = pg_fetch_array($apt);

		// $s = $a['start_time'];
		// $e = $a['end_time'];

			if($query)
			{
				echo "<script>alert('Your appointment successfully booked');</script>";
			}
			else{
				echo "<script>alert('Something went wrong.Please try again');</script>";
			}

	}



	// $q = pg_query($con, "select start_time, end_time from docavailability where id = '".$_SESSION['id']."'");

	// $row1 = pg_fetch_array($q);
	// echo htmlentities($row1['start_time']);
	// // $etime = $row1['end_time'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>
<link rel="stylesheet"  href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="styleheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet"  href="sidebar1.js">
<link rel="stylesheet"  href="sidebar1.css">



</head>


<body>
<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>

<script>
function gettime(val) {
	$.ajax({
	type: "POST",
	url: "get_time.php",
	data:'doctor='+val,
	success: function(data){
		$("#apptime").html(data);
	}
	});
}
</script>

<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
<ul class="sidebar-nav">
<li class="sidebar-brand">
<a href="dashboard.php">
    Clinic Management System
</a>
</li>
<li>
<a href="dashboard.php">
			<i class="bx bx-grid-alt nav_icon"></i>
			<span class="nav_name"> Dashboard</span>
		</a>
</li>
<li>
<a href="book-appointment.php">
			<i class='bx bx-calendar' ></i>
			<span class="nav_name"> Book Appointment</span>

		</a>
</li>
<li>
<a href="appointment-history.php">
			<i class='bx bx-history' ></i>
			<span class="nav_name"> Appointment History </span>
		</a>
</li>
<li>
<li>
<a href="logout.php">
			<i class='bx bx-power-off' ></i>
			<span class="nav_name">Logout</span>
	</a>
</li>
</ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12">
	<h1>USER | BOOK APPOINTMENT</h1>
	<br> <br>
		<div class="container-fluid container-fullw bg-white">
			<div class="row">

				<div class="col-md-12">
													
				<div class="row margin-top-30">

				<div class="col-lg-8 col-md-12">

						<div class="panel panel-white">

						<div class="panel-heading">

							<h5 class="panel-title">Book Appointment</h5>

													
							</div>

													
							<div class="panel-body">

					
							<!-- <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?> -->

					
							<?php echo htmlentities($_SESSION['msg1']="");?></p>	

					
							<form role="form" name="book" method="post" >

							<div class="form-group">
						
							<label for="DoctorSpecialization">Doctor Specialization</label>

							<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">

							<option value="">Select Specialization</option>

							<?php $ret=pg_query($con,"select * from specilization");

								while($row=pg_fetch_array($ret))

								{

								?>

								<option value="<?php echo htmlentities($row['specilization']);?>">

								<?php echo htmlentities($row['specilization']);?>

								</option>

								<?php 

								} 
								?>


								</select>

							</div>

						<div class="form-group">

							<label for="doctor">Doctors</label>

							<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value); gettime(this.value);" required="required">
									
							<option value="">Select Doctor</option>

							</select>

						</div>
		
						<div class="form-group">

							<label for="consultancyfees">Consultancy Fees</label>

							<select name="fees" class="form-control" id="fees"  readonly>

							</select>

						</div>
															
						<div class="form-group">

							<label for="AppointmentDate">Date</label>
							<input class="form-control datepicker" name="appdate"  required="required" data-date-format="dd-mm-yyyy">
								
							
						</div>
															
							<div class="form-group">

							<label for="consultancyfees">Time</label>
								<span id = "apptime"></span><br>
							<!-- <button type="submit" name="sch" class="btn btn-o btn-primary">Check Schedule</button> -->

						</div>	
						<br>
						<button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>

				</form>
		</div>

	</div>

</div>
											

</div>

</div>
									
</div>

</div>
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});

			$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    startDate: '-3d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>
</html>

