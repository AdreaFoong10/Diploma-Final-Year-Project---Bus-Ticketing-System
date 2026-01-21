<?php
    require 'dbconnect.php';
    $sql="SELECT * FROM user WHERE BINARY user_email_address='".$_POST['email']."';";
    $result=mysqli_query($conn,$sql);
    $num_row=mysqli_num_rows($result);


    $checkadmin="SELECT * FROM admin WHERE BINARY admin_email_address='".$_POST['email']."';";
    $resultcheckadmin=mysqli_query($conn, $checkadmin);
    $rowadmin=mysqli_num_rows($resultcheckadmin);
    $check=null;
    
        if($num_row==1)
        {
            $check="valid";
        }
        else if($num_row==0)
        {
            $check="invalid";
            if($rowadmin==1)
            {
                $check="valid";
            }
            else if($rowadmin==0)
            {
                $check="invalid";
            }
        }

        echo $check;
    
?>