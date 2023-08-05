<?php
// session_start();
// error_reporting(0);
include('include/config.php');
// include('include/checklogin.php');
// check_login();

?>


<html>
<head>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <link rel = "stylesheet" href = "css/profile.css"> -->
<link rel="stylesheet"  href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="styleheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet"  href="sidebar1.js">
<link rel="stylesheet"  href="sidebar1.css">
<script>
        $(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
</script>
</head>
<body>
	

<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
<ul class="sidebar-nav">
<li class="sidebar-brand">
<a href="#">
    My App
</a>
</li>
<li>
<a href="dashboard.php">
			<i class="bx bx-grid-alt nav_icon"></i>
			<span class="nav_name"> Dashboard</span>
		</a>
</li>
<li>
<a href="manage.php">
			<i class="bx bx-link-alt"></i>
			<span class="nav_name"> Doctors</span>

		</a>
</li>
<li>
<a href="manage-patients.php">
			<i class="bx bxs-grid"></i>
			<span class="nav_name"> Patients </span>
		</a>
</li>
<li>
<a href="manage-medhistory.php">
			<i class="bx bxs-calendar-alt"></i>
			<span class="nav_name"> Medical History</span>
		</a>
</li>

<li>
<a href="logout.php">
			<i class="bx bx-message-square-dots"></i>
			<span class="nav_name">Logout</span>
	</a>
</li>
</ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | View Patients</h1>
<!-- </div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>View Patients</span>
</li>
</ol>
</div> -->
</section>

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12"><br><br>
<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Patient Name</th>
<th>Patient Contact Number</th>
<th>Patient Gender </th>
<th>Creation Date </th>
<th>Updation Date </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"select * from tblpatient");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td><?php echo $row['PatientContno'];?></td>
<td><?php echo $row['PatientGender'];?></td>
<td><?php echo $row['CreationDate'];?></td>
<td><?php echo $row['UpdationDate'];?>
</td>
<td>

<a href="view-patient.php?viewid=<?php echo $row['ID'];?>">View<i class="fa fa-eye"></i></a>

</td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
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

</body>
</html>