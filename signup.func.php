<?php
include_once 'includes/dbconnect.php';

$fullname=$_POST['fullname'];
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$username=$_POST['username'];
$userpassword=$_POST['userpassword'];
$confirm_password=$_POST['confirm_password'];
$userdefaultimg="default picture.png";
if(!empty($fullname) && !empty($contactno) && !empty($email) && !empty($username) && !empty($userpassword) && !empty($confirm_password))
{
$insertsql="INSERT INTO user (user_fullname, user_contact_no, user_email_address, username, user_password, user_pic) 
VALUES ('$fullname', '$contactno', '$email', '$username', '$userpassword', '$userdefaultimg');";
mysqli_query($conn, $insertsql);

header("location:login.signup.php");
exit();
}
else{
    header("location:login.signup.php");
    exit();
}

?>