<?php
//session_start();
// error_reporting(0);
include('include/config.php');
include('include/test.php');
// include('include/check_login.php');
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
<!-- <script>
        $(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
</script> -->

<style>
	h2{
		color: black;
		text-decoration: none;
	}
</style>
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
<!-- <h1>ADMIN | DASHBOARD</h1> -->
<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Dashboard</h1><br><br><br>
								</div>
							</div>
						</section>
				
							
						<div class="container-fluid container-fullw bg-white">
							
						<div class="row">
						

						
						<div class="col-sm-6">
						
						<div class="panel panel-white no-radius text-center">
						
						<div class="panel-body">
						
						<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
						<h2 class="StepTitle" href = "manage-users.php">Manage Users</h2>

						<p  class="btn btn-o btn-primary">
						<a href="manage-users.php"  style = "text-decoration: none; color: black;">Manage Users
						</a>
						</p>

				
			</div>
			
		</div>
		
	</div>


	
	<div class="col-sm-4">
	
	<div class="panel panel-white no-radius text-center">
	
	<div class="panel-body">
	
	<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
	
	<h2 class="StepTitle">Manage Doctors</h2>

	<p class="btn btn-o btn-primary">
		<a href="manage.php"  style = "text-decoration: none; color: black;">	Manage Doctor
		</a>
	</p>
	


										
</p>

</div>

</div>

</div>


<br>
<div class="col-sm-4">
									
<div class="panel panel-white no-radius text-center">

<div class="panel-body">

<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>



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
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>