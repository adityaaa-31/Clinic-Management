<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/test.php');


if(isset($_GET['cancel']))
		  {
		          pg_query($con,"update appointment set userstatus='0' where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Your appointment canceled !!";
		  }
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>Appointment History</title>
<link rel="stylesheet"  href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="styleheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet"  href="sidebar1.js">
<link rel="stylesheet"  href="sidebar1.css">
</head>
<body>
	

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
<h1>USER | APPOINTMENT HISTORY</h1>
<br> <br>
<div class="container-fluid container-fullw bg-white">
						

									
	<div class="row">

	<div class="col-md-12">


		<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>

		<?php echo htmlentities($_SESSION['msg']="");?></p>	
										
		<table class="table table-hover" id="sample-table-1">

	<thead>

		<tr>

			<th class="center">#</th>
				<th class="hidden-xs">Doctor Name</th>
				
				<th>Specialization</th>
				
				<th>Consultancy Fee</th>
				
				<th> Date / Time </th>
				
				<!-- <th> Creation Date  </th> -->
				
				<th>Current Status</th>
				
				<th>Action</th>
														
				
			</tr>
		
	</thead>


	<tbody>
	<?php
		$sql=pg_query($con,"select doctors.doctorname as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorid where appointment.userid='".$_SESSION['id']."'");
		$cnt=1;
		  
		while($row=pg_fetch_array($sql))
		{
			//echo var_dump($row);
			$id = $row['specilizationid']; 
			//echo $id;
			$sql1 = pg_query($con,"select * from specilization where id='$id'");
		
			$r = pg_fetch_array($sql1);
		
		

	?>
	<tr>
		<td class="center"><?php echo $cnt;?>.</td>
														
		<td class="hidden-xs"><?php echo $row['docname'];?></td>
														
		<td><?php

			echo $r['specilization'];
		
		?></td>
														
		<td><?php echo $row['consultancyfees'];?></td>
																											
		<td><?php echo $row['appointmentdate'];?> / <?php echo  $row['appointmenttime'];?></td>
														
		<td>
			<?php if(($row['userstatus']==1) && ($row['doctorstatus']==1))  
			{
				echo "Active";
			}
			if(($row['userstatus']==0) && ($row['doctorstatus']==1))  
			{
				echo "Cancelled by You";
			}

			if(($row['userstatus']==1) && ($row['doctorstatus']==0))  
			{
				echo "Cancelled by Doctor";
			}

			?></td>

		<td >
														
			<div class="visible-md visible-lg hidden-sm hidden-xs">

			<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-o btn-primary" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
				
			</div>
				
		</td>

	</tr>
		<?php 

			$cnt=$cnt+1;
			
			}
		?>
	
</tbody>

</table>

</div>

</div>

</div>



<!-- end: BASIC EXAMPLE -->

<!-- end: SELECT BOXES -->



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

</body>
</html>

