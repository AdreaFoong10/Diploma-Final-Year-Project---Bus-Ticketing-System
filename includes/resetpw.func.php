<?php
    session_start();
    require_once 'dbconnect.php';

    
        $pw=$_POST['pw'];
        $conpw=$_POST['cpw'];
    if(empty($pw) || empty($conpw))
    {
        header("location: ../resetpw.php?error=emptyinput");
        exit();
    }

    if($conpw!=$pw)
    {
        header("location: ../resetpw.php?error=pwnotmatch");
        exit();
    }

    $sql="SELECT user_email_address FROM user WHERE BINARY user_email_address='".$_SESSION["input_email"]."';";
    $result=mysqli_query($conn, $sql);
    $user_numrow=mysqli_num_rows($result);


    $checkadmin="SELECT admin_email_address FROM admin WHERE BINARY admin_email_address='".$_SESSION["input_email"]."';";
    $resultcheckadmin=mysqli_query($conn, $checkadmin);
    $numrowadmin=mysqli_num_rows($resultcheckadmin);
    
    if($conpw==$pw)
    {
        if($user_numrow==1)
        {
            $sqlupdate="UPDATE user SET user_password='".$pw."' WHERE user_email_address='".$_SESSION["input_email"]."'";
            $conn->query($sqlupdate);
            header("location: ../login.signup.php");
            exit();
            session_unset();
            session_destroy();
        }  
        else if($numrowadmin==1)
        {
            $sqlupdate="UPDATE admin SET admin_password='".$pw."' WHERE admin_email_address='".$_SESSION["input_email"]."'";
            $conn->query($sqlupdate);
            header("location: ../login.signup.php");
            exit();
            session_unset();
            session_destroy();
        }
        else{
            header("location: resetpw.php?error=failtoresetpw");
            exit();
        }
    }
    
?>