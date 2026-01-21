<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Email <input type="email" name="email" > <br>
        <button type="submit" name="submit" value="submit"></button>
    </form>


</body>
</html>
<?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';
    if(isset($_POST['submit']))
    {
        

        $mail = new PHPMailer(true);
                
                
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'cometbus0@gmail.com'; 
        $mail->Password = 'tpguonvllpfddooj'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Set the email addresses
        $mail->setFrom('cometbus0@gmail.com');
        $mail->addAddress($_POST['email']); // changed this

        // Set the email content
        $mail->isHTML(true);
        $mail->Subject = 'Admin Login Information for CometBus';
        $mail->Body    = '<h4>Important: Your Super Admin has sent you the login information for your admin account.</h4>
                        <br>
                        <b><i>DO NOT SHARE THIS INFORMATION WITH ANYONE OR MAKE IT PUBLIC.</i></b>
                        <br>
                        <h4>Unauthorized sharing of your admin login information can lead to security breaches and may result in disciplinary actions.</h4>
                        <h4>For security reasons, we recommend that you take the following steps:</h4>
                        <ul>
                            <li>Change your password immediately after logging in for the first time.</li>
                            <li>Use a strong, unique password that you have not used before and will not use for any other accounts.</li>
                            <li>Do not write down or store your password in an insecure location.</li>
                            <li>Regularly update your password to keep your account secure.</li>
                        </ul>
                        Your admin login information:<br>Username: ';

        // Send the email
        if($mail->send() === true)
        {
        $email_sent =1;
        }
    }

?>