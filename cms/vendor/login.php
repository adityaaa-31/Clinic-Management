<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$usrname = $_POST['username'];
	$pwd = md5($_POST['password']);

	$ret = mysqli_query($con, "SELECT * FROM users WHERE email='".$usrname."' and password='".$pwd."'");

	$num = mysqli_fetch_array($ret);

	if($num > 0)
	{
		$extra="dashboard.php";

		$_SESSION['login']=$_POST['username'];
		$_SESSION['id']=$num['id'];

		$host=$_SERVER['HTTP_HOST'];
		$uip=$_SERVER['REMOTE_ADDR'];

		$status=1;
		// For stroing log if user login successfull
		$log = mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

		echo $uri;
		header("location:$extra");

	exit();
}
else
{
	// For stroing log if user login unsuccessfull
	$_SESSION['login']=$_POST['username'];	
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=0;
	
	mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
	
	$_SESSION['errmsg']="Invalid username or password";
	$extra="login.php";

	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

	header("location:http://$host$uri/$extra");
	exit();
}
}
?>

<<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel = "stylesheet" href = "css/admin.css">

	</head>
	<body>
    <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Patient Sign in</h3>
        <form action="login.php" method="post">
            <div class="inputBox"> 
                <input id="uname" type="text" name="username" placeholder="Username"> 
                <input id="pass" type="password" name="password" placeholder="Password"> 

            
                <input type="submit" name="submit">
</div>
        </form> 
        <a href="#">Forget Password<br> </a>
        
        <div class="text-center">
            <a href = "signup.php">Sign-Up</p>
        </div>
    </div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>
