<?php
session_start();

//include("include/config.php");
include("include/test.php");

if(isset($_POST['submit']))
{
    $usrname = $_POST['username'];
    $pwd = $_POST['password'];

    $ret = pg_query($con, "SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");

    $num=pg_fetch_array($ret);

    if($num>0)

    {

        $extra="dashboard.php";
        header("location: $extra");
        exit();

    }

    else

    {

        $_SESSION['err']="Invalid username or password";

        echo "<script>alert('Invalid credentials')</script>";

        $uri  = $_SERVER['PHP_SELF'];

       // header("location: $uri");

        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style(1).css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form  method="POST" autocomplete="">
                    <h2 class="text-center">Admin Login</h2>
                    <p class="text-center">Login with your email and password.
                    <span style="color:red;"><?php echo "<br>".$_SESSION['err']; ?><?php echo $_SESSION['err']="";?></span>
                    </p>
           
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <!-- <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div> -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Login">
                    </div>
                    <!-- <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div> -->
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>