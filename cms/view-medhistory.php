<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>Mediacal History</title>
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
    HMS
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
			<i class="bx bx-link-alt"></i>
			<span class="nav_name"> Book Appointment</span>

		</a>
</li>
<li>
<a href="#">
			<i class="bx bxs-grid"></i>
			<span class="nav_name"> Appointment History </span>
		</a>
</li>
<li>
<a href="view-medhistory.php">
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
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Users <span class="text-bold">Medical History</span></h5>
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>Patient Email</th>
    <td><?php  echo $row['PatientEmail'];?></td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td><?php  echo $row['PatientContno'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['PatientAdd'];?></td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>Patient Age</th>
    <td><?php  echo $row['PatientAge'];?></td>
  </tr>
  <tr>
    
    <th>Patient Medical History(if any)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
     <th>Patient Reg Date</th>
    <td><?php  echo $row['CreationDate'];?></td>
  </tr>
 
<?php }?>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >Medical History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Blood Pressure</th>
<th>Weight</th>
<th>Blood Sugar</th>
<th>Body Temprature</th>
<th>Medical Prescription</th>
<th>Visit Date</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['BloodPressure'];?></td>
 <td><?php  echo $row['Weight'];?></td>
 <td><?php  echo $row['BloodSugar'];?></td> 
  <td><?php  echo $row['Temperature'];?></td>
  <td><?php  echo $row['MedicalPres'];?></td>
  <td><?php  echo $row['CreationDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
                          
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<!-- end: BASIC EXAMPLE -->

<!-- end: SELECT BOXES -->



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

