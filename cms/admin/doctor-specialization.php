<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/test.php');
// include('include/check_login.php');
// check_login();
if(isset($_POST['submit']))
{
$sql=pg_query($con,"insert into specilization(specilization) values('".$_POST['doctorspecilization']."')");
$_SESSION['msg']="Doctor Specialization added successfully !";
}

if(isset($_GET['del']))
		  {
		          pg_query($con,"delete from specilization where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Data Deleted";
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
<div class="container-fluid container-fullw bg-white">
							
<div class="row">

<div class="col-md-12">
								
<div class="row margin-top-30">
								
<div class="col-lg-6 col-md-12">

<div class="panel panel-white">

<div class="panel-heading">

<h5 class="panel-title" style = "font-size: 40px";>Doctor Specialization</h5>

</div>
												
                                                
                        <div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													
                                
                            <form role="form" name="dcotorspcl" method="post" >
								
                                <div class="form-group">
								
                                <!-- <label for="exampleInputEmail1">Doctor Specialization</label> -->
                                <br>
							
                                <input type="text" name="doctorspecilization" class="form-control"  placeholder="Enter Doctor Specialization">
                                <br>    
                                </div>
												
						        <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
													
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

                                    

<div class="row">

<div class="col-md-12">
									
    <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctor Specialization</span></h5>

	
    <table class="table table-hover" id="sample-table-1">
	
    <thead>
	
        <tr>
		
            <th class="center">#</th>
			
            <th>Specialization</th>
			
            <!-- <th class="hidden-xs">Creation Date</th>
			
            <th>Updation Date</th> -->
                                                
			
            <th>Action</th>
												
			
        </tr>
		
    </thead>
	
    <tbody>

<?php
    $sql = pg_query($con,"select * from specilization");
    $cnt = 1;
    while($row = pg_fetch_array($sql))
    {
?>

											
<tr>

    <td class="center"><?php echo $cnt;?>.</td>

    <td class="hidden-xs"><?php echo $row['specilization'];?></td>

    </td>



<td >

    <div class="visible-md visible-lg hidden-sm hidden-xs">

    <!-- <a href="edit-doctor-specialization.php?id=" class="btn btn-transparent btn-xs"><i class="fa fa-pencil"></i> Edit</a> -->
                                                        

    <a href="<?php echo     $_SERVER['PHP_SELF']; ?>?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" ><i class="fa fa-times fa fa-white"></i> Delete</a>

    </div>
</div>

</div></td>

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
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>