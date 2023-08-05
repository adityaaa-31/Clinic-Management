<?php
session_start();

include('include/config.php');
include('include/config1.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Doctor Dashboard</title>
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
<a href="appointment-history.php">
			<i class="bx bxs-grid"></i>
			<span class="nav_name">View Appointment </span>
		</a>
</li>
<li>
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
<div id="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1>DOCTOR | DASHBOARD</h1>
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


							<!-- <div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">My Profile</h2>
											
											<p class="links cl-effect-1">
												<a href="edit-profile.php">
													Update Profile
												</a>
											</p>
										</div>
									</div>
								</div> -->




								<div class="col-sm-12">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">My Appointments</h2>
										
											<p class="btn btn-o btn-primary">
												<a href="appointment-history.php" style="color: black; text-decoration: none;">
													View Appointment History
												</a>
											</p>
										</div>
									</div>
								</div>


								<br>
								<br>

							</div>
						</div>
			
					
					
						
						
					
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

