<?php
session_start();
error_reporting(0);
//include("include/config.php");
include("include/test.php");

if(isset($_POST['submit']))
{
    $ret=pg_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
    $num=pg_fetch_array($ret);
    $_SESSION['id']=$num['id'];
    $email = $_POST['username'];

    $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; 
    if (preg_match($regex, $email)) {
        if($num>0)
        {
            header("location: dashboard.php");
            exit();
        }
        else
        {
            $_SESSION['err'] = "Invalid username or password";
            $uri  = ($_SERVER['PHP_SELF']);
            header("location: $uri");
            exit();
        }
    } else 
    { 
        $_SESSION['err'] = "Invalid Email Address";

 
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style(1).css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form  method="POST">
                    <h2 class="text-center">Patient Login </h2>
                    <p class="text-center">Login with your email and password.
                    <span style="color:red;"><?php echo "<br>".$_SESSION['err']; ?><?php echo $_SESSION['err']="";?></span>
                    </p>
           
                    <div class="form-group">
                        <input class="form-control" type="email" name="username" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <!-- <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div> -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>