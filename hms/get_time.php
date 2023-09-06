<?php
session_start();

include('include/config.php');
include('include/test.php');
if(!empty($_POST["doctor"])) 
{

 $sql=pg_query($con,"select * from doctors where id ='".$_POST['doctor']."'");?>

 <?php
 while($row=pg_fetch_array($sql))
 	{
    $st = $row['start_time'];
    $et = $row['end_time'];
    ?>
 	<input type = "text" name="apptime" class="form-control" id="apptime"  placeholder = "<?php echo $st." AM to ".$et." PM" ;?>"> <br>

  <?php
}
}

?>
