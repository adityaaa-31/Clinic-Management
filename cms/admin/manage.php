<?php
session_start();
//error_reporting(0);
include('<include/config.php');
// include('checklogin.php');

// check_login();

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
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
<a href="manage.php">
			<i class="bx bx-plus-medical"></i>
			<span class="nav_name"> Doctors</span>

		</a>
</li>
<li>
<a href="manage-users.php">
			<i class='bx bxs-user' ></i>
			<span class="nav_name"> Users </span>
		</a>
</li>
<li>
<a href="logout.php">
			<i class='bx bx-power-off'></i>
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
<h1>USER | DASHBOARD</h1>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<!-- <div class="col-sm-8">
									<h1 class="mainTitle">User | Dashboard</h1>
																	</div> -->
								<!-- <ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol> -->
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->


							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Add Specialization</h2>
											<p class="btn btn-o btn-primary">

											<a href="doctor-specialization.php"  style = "color: black; text-decoration: none;">
												Add Specialization
											</a>
											</p>
										
											
											</p>
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
	
												<h2 class="StepTitle">Edit/Delete Doctors</h2>
													<p class="btn btn-o btn-primary">
														<a href="manage-doctors.php" style = "color: black; text-decoration: none;">
														Edit/Delete
														</a>
													</p>												
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>													
											<h2 class="StepTitle"> Add Doctors</h2>
											<p class="btn btn-o btn-primary">
											<a href="add-doctor.php" style = "color: black; text-decoration: none;">
												Add	Doctor 
											</a>
											</p>
												
											
										</div>
									</div>
								</div>



								
							</div>
						</div>
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>

<!-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> -->
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>

