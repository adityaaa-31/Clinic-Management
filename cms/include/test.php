<?php 
    $dbname = 'dbname = postgres password = 1234 user = postgres';
 
    $con = pg_connect($dbname);


    if($con){
        echo "";
    }
    else{
        die("Cant connect");
    }


?>