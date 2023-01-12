<?php

  //connection
    //$con = mysqli_connect("dbserver", "dbuser","dbpassword","dbname" );
    $con = mysqli_connect("localhost:3306", "dse","12345","fuelup" );

 //checking the connection
    if(mysqli_connect_errno())
    {
    	die('Database Connection Failed');
    }
  
//alternative
//if (!$con) 
//{
 //  die(mysqli_error($con));
//}


?>