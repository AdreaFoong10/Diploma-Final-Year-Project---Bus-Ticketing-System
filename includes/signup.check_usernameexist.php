<?php
require 'dbconnect.php';
$username=$_POST['username'];
$sqlcheckusn="SELECT * FROM user WHERE BINARY username='$username';";
$resultusn=mysqli_query($conn,$sqlcheckusn);
$usn_num_row=mysqli_num_rows($resultusn);

    if($usn_num_row>0) 
    {
        echo "taken";
    }
    else
    {
        echo "not taken";
    }

?>