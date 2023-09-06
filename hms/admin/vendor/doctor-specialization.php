<?php
session_start();
//error_reporting(0);
include("include/config.php");
include("include/check_login.php");

check_login();
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"insert into doctorSpecilization(specilization) values('".$_POST['doctorspecilization']."')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from doctorSpecilization where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>


<!DOCTYPE html>
<html>
<head>
<title>Sidebar Demo</title>
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
<div id="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1>ADMIN | DOCTOR SPECIALIZATION</h1>
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
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-6 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Doctor Specialization</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="dcotorspcl" method="post" >
														<div class="form-group">
															<label for="exampleInputEmail1">
																Doctor Specialization
															</label>
							<input type="text" name="doctorspecilization" class="form-control"  placeholder="Enter Doctor Specialization">
														</div>
												
														
														<br>
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
                                                        <br>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
                                    <br>
									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Docter Specialization</span></h5>
									
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Specialization</th>
												<th class="hidden-xs">Creation Date</th>
												<th>Updation Date</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from doctorSpecilization");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											
<tr>
												
<td class="center"><?php echo $cnt;?>.</td>
												
<td class="hidden-xs"><?php echo $row['specilization'];?></td>
												
<td><?php echo $row['creationDate'];?></td>
												
<td><?php echo $row['updationDate'];?>
												
</td>
												
												
<td >
												
<div class="visible-md visible-lg hidden-sm hidden-xs">
							
<a href="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i>Edit</a>
													
<!-- <input type="submit" value="del" name="del"> -->
<a href="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white" name="del"></i>Delete</a>
												
</div>
												<!-- <div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td> -->
											
                    </tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>

<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>

