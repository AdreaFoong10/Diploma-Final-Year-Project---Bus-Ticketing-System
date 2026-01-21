<?php

if(isset($_POST["loginbtn"]))
{
    session_start();
    $usn=$_POST["username"];
    $password=$_POST["password"];
    require_once 'dbconnect.php';
    require_once 'functions.php';
    
    $checkuser="SELECT username, user_password FROM user WHERE user_password='".$password."' AND username='".$usn."';";
    $resultcheckuser=mysqli_query($conn, $checkuser);
    $rowuser=mysqli_fetch_assoc($resultcheckuser);

    $checkadmin="SELECT admin_username, admin_password FROM admin WHERE admin_password='".$password."' AND admin_username='".$usn."';";
    $resultcheckadmin=mysqli_query($conn, $checkadmin);
    $rowadmin=mysqli_fetch_assoc($resultcheckadmin);
}

    if(emptyinputlogin($usn, $password)!==false)
    {
       
        header("location: ../login.signup.php?error=loginemptyinput");
        exit();
    }
    else if($usn==$rowuser['username'] && $password==$rowuser['user_password']){
        loginuser($conn, $usn, $password);
        header("location: login.signup.php");
        exit();
    }
    else if($usn==$rowadmin['admin_username'] && $password==$rowadmin['admin_password']){
        loginadmin($conn, $usn, $password);
        header("location: admin.php");
        exit(); 
    }


