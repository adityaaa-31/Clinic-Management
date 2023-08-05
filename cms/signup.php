<?php

    include("include/config.php");
    include("include/test.php");
    session_start();
    $_SESSION['errmsg'] = "";
    if(isset($_POST['submit'])){

        $uname = $_POST['username'];
        $pwd = md5($_POST['password']);
        $gender = $_POST['gender'];
        $email = $_POST['email'];

        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['gender'])){

            $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; 

            if (preg_match($regex, $email)){
                $query = pg_query($con, "insert into users (fullname,gender,email,password) values ('$uname','$gender','$email','$pwd')");
            
                if($query){
                    echo "<script>alert('Successfully Registered. You can login now');</script>";

                    //sheader("location: login.php");
                }
                else{
                    echo "<script>alert('Not Successfull');</script>";

                }
        }
        else{
            $_SESSION['errmsg'] = "Invalid Email";
        }

        }
        else{
            $_SESSION['errmsg'] = "Please fill all required fields";
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
                    <h2 class="text-center">Patient Sign Up </h2>
                    <p class="text-center">Sign Up with your email
                    <span style="color:red;"><?php echo "<br>".$_SESSION['errmsg']; ?><?php echo $_SESSION['err']="";?></span>

                    </p>
           
                    <div class="form-group">
                        Name <span style="color:red;">*</span>
                        <input class="form-control" type="text" name="username" placeholder="Enter Name" >
                       
                    </div>
                    <div class="form-group">
                        Email <span style="color:red;">*</span>
                        <input class="form-control" type="text" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        Password <span style="color:red;">*</span>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        Select Gender  <span style="color:red;">*</span><br>
                        <input  type="radio" name="gender" value="Male">Male <br>
                        <input  type="radio" name="gender" value="Female">Female
                    </div>
                    <!-- <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div> -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Sign Up">
                    </div>
                    <div class="link login-link text-center">Back to Login. <a href="login.php"> Login now</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>