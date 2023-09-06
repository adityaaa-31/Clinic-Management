<?php

session_start();

include('include/config.php');
include('include/test.php');

	$msg= "";
	$did=intval($_GET['id']);// get doctor id

	if(isset($_POST['submit']))
	{
		$docspecialization=$_POST['Doctorspecialization'];
		$docname=$_POST['docname'];
		$docaddress=$_POST['clinicaddress'];
		$docfees=$_POST['docfees'];
		$doccontactno=$_POST['doccontact'];
		$docemail=$_POST['docemail'];

		$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
		if($sql)
		{
			$msg="Doctor Details updated Successfully";
		}
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
			<i class='bx bx-plus-medical' ></i>
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
<h1>Edit Doctor </h1>
<br>


<div class="main-content" >

						
					
<div class="container-fluid container-fullw bg-white">
						
						
<div class="row">

<div class="col-md-12">

	<h5 style="color: green; font-size:18px; ">
	
		<?php if($msg) { echo htmlentities($msg);}?> </h5>
		
			<div class="row margin-top-30">
			
			<div class="col-lg-8 col-md-12">
			
			<div class="panel panel-white">
			
			<div class="panel-heading">
			
				<h5 class="panel-title">Edit Doctor info</h5>
				
			</div>
											
											
												
			
			<div class="panel-body">
									
			
				<?php $sql=pg_query($con,"select * from doctors where id='$did'");

										
				
				while($data=pg_fetch_array($sql))
				
					{
					
				?>
				
				<h4><?php echo htmlentities($data['doctorname']);?>'s Profile</h4>
										
			
				<hr />
			
				<form role="form" name="adddoc" method="post" onSubmit="return valid();">
			
					<div class="form-group">
				
						<label for="DoctorSpecialization">
					
						Doctor Specialization
					
						</label>
					
						<select name="Doctorspecialization" class="form-control" required="required">
						
						<option value="<?php echo htmlentities($data['specilization']);?>">
						
						<?php echo htmlentities($data['specilization']);?></option>
						
						<?php $ret=pg_query($con,"select * from specilization");
						
						while($row=pg_fetch_array($ret))
						
							{
							
						?>
						
							<option value="<?php echo htmlentities($row['specilization']);?>">
							
							<?php echo htmlentities($row['specilization']);?>
							
						</option>
						
						<?php } ?>
																
						
					</select>
														
					
				</div>



				<div class="form-group">														
										
					<label for="doctorname">
						Doctor Name
					
					</label>
	
					<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorname']);?>" >
														
					<label for="fess">
	
					Doctor Consultancy Fees
								
					</label>
			
					<input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['docfees']);?>" >
			
				</div>
	

				<div class="form-group">

					<label for="fess">
	
						Doctor Contact no
		
					</label>
		
					<input type="text" name="doccontact" class="form-control" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
		
				</div>


				<div class="form-group">

					<label for="fess">
	
						Doctor Email
		
					</label>
		
					<input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['docemail']);?>">
		
				</div>

					
				<div class="form-group">

					<label for="fess">
	
						Doctor Start Time
		
					</label>
		
					<input type="text" name="stime" class="form-control"    placeholder="<?php echo htmlentities($data['start_time']);?>">
		
				</div>

				<div class="form-group">

					<label for="fess">
	
						Doctor End Time
		
					</label>
		
					<input type="text" name="stime" class="form-control"    placeholder="<?php echo htmlentities($data['end_time']);?>">
		
				</div>
								
				<?php } ?>
														
				<br>							
								
				
				<button type="submit" name="submit" class="btn btn-o btn-primary">
					Update
				</button>
				
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

