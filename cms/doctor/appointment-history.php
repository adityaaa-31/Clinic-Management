<?php
session_start();


include('include/config1.php');
$_SESSION['msg'] = "";
if(isset($_GET['cancel']))
		  {
			pg_query($con,"update appointment set doctorstatus='0' where id ='".$_GET['id']."'");
							
			$_SESSION['msg']="Appointment is canceled";
		  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
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
<a href="#">
			<i class='bx bxs-calendar' ></i>
			<span class="nav_name">View Appointment </span>
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
<div class="container-fluid container-fullw bg-white">
						


<div class="row">

<div class="col-md-12">
									

<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>

	<?php echo htmlentities($_SESSION['msg']="");?></p>	
	
		<table class="table table-hover" id="sample-table-1">
		
		<thead>
			<tr>
			
				<th class="center">#</th>
				
					
				<th class="hidden-xs">Patient  Name</th>
				
				<th>Specialization</th>
				
				<th>Consultancy Fee</th>
				
				<th>Appointment Date / Time </th>
				
				<!-- <th>Appointment Creation Date  </th> -->
				
				<th>Current Status</th>
				
				<th>Action</th>
												
				
			</tr>
			
		</thead>
		
		<tbody>

		
		<?php
		
			$sql=pg_query($con,"select users.fullname,appointment.*  from appointment join users on users.id=appointment.userid where appointment.doctorid='".$_SESSION['id']."'");
		
			$cnt=1;
		
			while($row=pg_fetch_array($sql))
		
			{
		
		?>

			
		<tr>
		
			<td class="center"><?php echo $cnt;?>.</td>
		
			<td class="hidden-xs"><?php echo $row['fullname'];?></td>
			
			<td><?php echo $row['doctorspecialization'];?></td>
			
			<td><?php echo $row['consultancyfees'];?></td>
			
			<td><?php echo $row['appointmentdate'];?> / <?php echo
			
			$row['appointmenttime'];?>
			
			</td>
			
			
			
			<td>
            
			<?php if(($row['userstatus']==1) && ($row['doctorstatus']==1))  
            
				{
				
					echo "Active";
				
				}
				
				if(($row['userstatus']==0) && ($row['doctorstatus']==1))  
				
				{
				
					echo "Cancelled by Patient";
				
				}

				
				if(($row['userstatus']==1) && ($row['doctorstatus']==0))  
				
				{
				
					echo "Cancelled by you";
				
				}

			?>
                                                
                                            
                                            
											
			</td>
											
            
			<td >
											
            
			<div class="visible-md visible-lg hidden-sm hidden-xs">
							
            
			<?php if(($row['userstatus']==1) && ($row['doctorstatus']==1))  

            
			{ 
            
			?>

			

			<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-o btn-primary" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
	
			<?php } else {

				//echo "Canceled";
			} ?>
			
		</div>
		
	</td>
	
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
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>

