<?php
require_once 'dbconnect.php';
if(isset($_POST['loginbtn']))
    {
        $usn=$_POST['usn'];
        $pw=$_POST['pw'];
        $sql ="SELECT * FROM user WHERE username='$usn' AND user_password='$pw';";
        $result= mysqli_query($conn, $sql);
        $num_row=mysqli_num_rows($result);
        $data=mysqli_fetch_assoc($result);
        if($num_row==1) 
        {
            session_start();
            $_SESSION['userid']=$data['user_id'];
            $_SESSION['usn']=$data['username'];
            header("location:../home.php");
            exit();
        } 
        else 
        {
            header("location:../login.signup.php?error=loginusninco");
            exit();
        }

             
    }



?>