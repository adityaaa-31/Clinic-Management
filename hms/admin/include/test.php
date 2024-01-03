<?php 
    $dbname = 'dbname = postgres password = 1234 user = postgres';
    // $dbhost = 'localhost';
    // $dbpass = 'password = 1234';
    // $dbuser = 'postgres';

    $con = pg_connect($dbname);
    // $res = pg_query($con, "select * from admin");


    if($con){
        echo "";
    }
    else{
        die("Cant connect");
    }


?>