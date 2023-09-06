<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/test.php');
// include('include/check_login.php');
// check_login();
$_SESSION['msg']=" ";

if(isset($_GET['del']))
		  {
		          pg_query($con,"delete from doctors where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Doctor deleted";
		  }
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
									<h1 class="mainTitle">Manage Doctors</h1><br><br><br>
								</div>
							</div>
						</section>
				
						

                        <div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctors</span></h5>
									<p style="color:red;"><?php echo $_SESSION['msg'];?>
				
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Specialization</th>
												<th>Doctor Name</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>



                                <?php
                                        $sql=pg_query($con,"select * from doctors");
                                        $cnt=1;
                                        while($row=pg_fetch_array($sql))
                                        {
                                ?>

											
                                    <tr>

                                        <td class="center"><?php echo $cnt;?>.</td>

                                        <td class="hidden-xs"><?php echo $row['specilization'];?></td>

                                        <td><?php echo $row['doctorname'];?></td>



                                        </td>



                                        <td >

                                        <div class="visible-md visible-lg hidden-sm hidden-xs">

										<a href="edit-doctor.php?id=<?php echo $row['id'];?>" class="btn btn-o btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                                         

                                        <a href="manage-doctors.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-o btn-primary"><i class="fa fa-times fa fa-white" ></i>Delete</a>

                                        </div>


									</div>


								</div></td>


							</tr>
                                                                                        

							<?php $cnt=$cnt+1;}?>
											
											
						</tbody>
								
					</table>
					
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