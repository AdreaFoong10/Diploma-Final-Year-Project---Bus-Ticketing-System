<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';

        $usn=$_POST['usn'];
        $pw=$_POST['pw'];
        $sql1="SELECT * FROM user WHERE BINARY username='$usn' AND user_password='$pw';";
        $result=mysqli_query($conn, $sql1);
        $numrow=mysqli_num_rows($result);


        $checkadmin="SELECT admin_username, admin_password, admin_status FROM admin WHERE BINARY admin_password='".$pw."' AND admin_username='".$usn."';";
        $resultcheckadmin=mysqli_query($conn, $checkadmin);
        $rowadmin=mysqli_fetch_assoc($resultcheckadmin);
        $num_row_admin=mysqli_num_rows($resultcheckadmin);
        $check=null;

        if($numrow==1) 
        {
            $check="valid";
        }
        else if($numrow==0)
        {  
            if($num_row_admin==1)
            {
                if($rowadmin['admin_status'] == 1)
                {
                    $check="invalid status";
                }
                else if($rowadmin['admin_status'] == 0)
                {
                    $check="valid";
                }
            }
            else if($num_row_admin==0)
            {
                $check="invalid";
            }
        }

        echo $check;
?>