<?php 

    $dbname = 'hms';
    $dbhost = 'localhost';
    $dbpass = '';
    $dbuser = 'root';

    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if($con){
        //echo "Connection Successful";

    }else die("Unable to connect");

?>
