<?php
require 'dbconnect.php';

$email = $_POST['email'];
$checkemail = "";

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
   $checkemail = "invalid";
}
else
{
   $sql = "SELECT * FROM user WHERE BINARY user_email_address = '$email';";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
       $checkemail = "taken";
   } else {
       $checkemail = "not taken";
   }
}

echo $checkemail;


?>
