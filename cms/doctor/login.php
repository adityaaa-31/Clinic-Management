<?php
session_start();
//include("include/config.php");
include("include/config1.php");
$_SESSION['errmsg'] = "";

if(isset($_POST['submit']))
{
    $ret=pg_query($con,"SELECT * FROM doctors WHERE docemail='".$_POST['username']."' and password='".md5($_POST['password'])."'");

    $num=pg_fetch_array($ret);
   
    if($num>0){
        $_SESSION['id'] = $num['id'];
        header("location: dashboard.php");
        exit();
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
        $uri  = "login.php";
        header("location: $uri");
        exit();
        
        
        $_SESSION['errmsg']="Invalid username or password";
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
                <form method="POST">
                    <h2 class="text-center">Doctor Login</h2>
                    <p class="text-center">Login with your email and password.</p>
           
                    <div class="form-group">
                        <input class="form-control" type="email" name="username" placeholder="Email Address" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <span><?php echo $_SESSION['errmsg']; ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Login">
                    </div>


                </form>
            </div>
        </div>
    </div>
    
</body>
</html>