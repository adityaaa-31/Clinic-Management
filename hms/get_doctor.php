<?php
session_start();

include('include/config.php');
include('include/test.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=pg_query($con,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=pg_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorname']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{
  // $id = $_POST['doctor'];
  // $_SESSION['id'] = $id;

  $sql1=pg_query($con,"select docfees from doctors where id='".$_POST['doctor']."'");
 
 while($row=pg_fetch_array($sql1))
 	{ 
     
    ?>
 <option value="<?php echo htmlentities($row['docfees']); ?>"> <?php echo htmlentities($row['docfees']); ?></option>
 
  <?php
}

$sql2=pg_query($con,"select * from doctors where id='".$_POST['doctor']."'");
 
  $r = pg_fetch_array($sql2);

  $_SESSION['st'] = $r['start_time'];

}

?>
