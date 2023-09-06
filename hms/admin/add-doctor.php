<?php
session_start();

include('include/test.php');



if(isset($_POST['submit']))
{	

    $docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
   
    $docfees=$_POST['docfees'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $password=md5($_POST['npass']);

	$stime = $_POST['stime'];
	$etime = $_POST['etime'];



	$email = $docemail; 
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	
	if (preg_match($regex, $email)) {
		$sql=pg_query($con,"insert into doctors(specilization, doctorname, docfees, contactno, docemail, password, start_time, end_time ) values('$docspecialization','$docname','$docfees','$doccontactno','$docemail','$password','$stime','$etime')");

	} else { 
		echo "<script>alert('Invalid Email')</script>";
	}           

    //$sql=pg_query($con,"insert into doctors(specilization, doctorname, docfees, contactno, docemail, password, start_time, end_time ) values('$docspecialization','$docname','$docfees','$doccontactno','$docemail','$password','$stime','$etime')");

    if($sql)
    {
        echo "<script>alert('Doctor info added Successfully');</script>";
        echo "<script>window.location.href ='manage-doctors.php'</script>";

    }
	else{
		echo "<script>popup('Please try again');</script>";
        echo "<script>window.location.href ='add-doctors.php'</script>";
	}

	$ncount = $count;
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
<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading"><br>
													<h3 class="panel-title">Add Doctor</h3><br>
												</div>
												
												<div class="panel-body">
																						
												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														
													<div class="form-group">
													
														<label for="DoctorSpecialization">
														
															Doctor Specialization
															
														</label>
															<select name="Doctorspecialization" class="form-control" required="true">
														
															<option value="">Select Specialization</option>
                                              
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
					                                
														<input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
														
													</div>

													     
													<div class="form-group">
													
														<label for="fess">
														
															Doctor Consultancy Fees
															
														</label>

                                                        
														<input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														
													</div>
	

                                                    
													<div class="form-group">

                                                        <label for="fess">
														
															Doctor Contact no
                                                                
														</label>
                                                                
														<input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														
													</div>


                                                    
													<div class="form-group">

                                                        <label for="fess">																									
															Doctor Email															
														</label>
                                                            
														<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true">                                                        
														
														<span id="email-availability-status"></span>


													</div>


													<div class="form-group">

														<label for="schedule">

														Doctor Start Time
															
														</label>

														<input type="text" id="stime" name="stime" class="form-control"  placeholder="Enter Start Time Eg: 9:00 AM" required="true" >

														<span id="email-availability-status"></span>
														
													</div>

														

													<div class="form-group">


														<label for="schedule">																
															Doctor End Time																
														</label>

															
														<input type="text" id="etime" name="etime" class="form-control"  placeholder="Enter Start Time Eg: 9:00 PM" required="true" >

														
														<span id="email-availability-status"></span>

														
													</div>




														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					
                                                            <input type="password" name="npass" class="form-control"  placeholder="New Password" required="true">
														</div>
														

                                                        <div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									
                                                            <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="true">
														</div>
														
														<br>
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
											<!-- <div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div> -->
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