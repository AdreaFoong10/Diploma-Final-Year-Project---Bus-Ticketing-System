<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require '../PHPMailer/PHPMailer-master/src/Exception.php';
require '../PHPMailer/PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer/PHPMailer-master/src/SMTP.php';

require_once 'dbconnect.php';
           
                    $_SESSION["input_email"]=$_POST["inputemail"];
                    
                    $sql="SELECT user_email_address FROM user WHERE BINARY user_email_address='".$_SESSION["input_email"]."';";
                    $result=mysqli_query($conn, $sql);
                    $user_numrow=mysqli_num_rows($result);


                    $checkadmin="SELECT admin_email_address FROM admin WHERE BINARY admin_email_address='".$_SESSION["input_email"]."';";
                    $resultcheckadmin=mysqli_query($conn, $checkadmin);
                    $numrowadmin=mysqli_num_rows($resultcheckadmin);
                    

                    if(empty($_SESSION["input_email"]))
                    {
                        header("location: forgotpw.php?error=emptyinput");
                        exit();
                    }
                    if($user_numrow>0)
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($row['user_email_address']==$_SESSION["input_email"])
                        {
                            

                            $_SESSION["code"]=mt_rand(100000,999999);
                            //send email//
                            $mail=new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->Host='smtp.gmail.com';
                            $mail->SMTPAuth=true;
                            $mail->Username='cometbus0@gmail.com';
                            $mail->Password='tpguonvllpfddooj';
                            $mail->SMTPSecure='ssl';
                            $mail->Port=465;
                            $mail->setFrom('cometbus0@gmail.com');
                            $mail->addAddress($_SESSION["input_email"]);
                            
                            $mail->AddEmbeddedImage('../img/twitter - Copy.png', 'tt');
                            $mail->AddEmbeddedImage('../img/instagram - Copy.png', 'ig');
                            $mail->AddEmbeddedImage('../img/logo_dark.png', 'logo');
                            
                            $mail->AddEmbeddedImage('../img/facebook.png', 'fb');

                            $mail->isHTML(true);
                            $mail->Subject="Email Verification Code";
                            $mail->Body=
                            '
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <meta charset="UTF-8">
                                <title>Email Verification</title>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
                                <style>
                                    body{
                                        font-family: sans-serif;
                                    }
                        
                                    .content{
                                        
                                        width:400px;
                                        background-color: white;
                                        margin:0 auto;
                                        text-align:center;
                                        position:absolute;
                                        top:50%;
                                        left:50%;
                                        transform: translate(-50%, -50%); 
                                        
                                    }
                                    
                                    
                                </style>
                            </head>
                            <body>
                        
                                
                                <div class="content">
                                    
                                    <p><img src="cid:logo" style="filter: brightness(0%);"></p>
                                    <p style="padding-top:20px;">Your verification code is:</p>
                                    <h1 style="letter-spacing: 8px; padding-top:20px; padding-bottom:20px;">'.$_SESSION["code"].
                                    '</h1>
                                    <div style="font-size:14px;">NEVER share this code with others, including CometBus staff.</div>
                                <hr>
                                
                                <a href="https://twitter.com/bus_comet09237"><img src="cid:tt" style="width:30px; margin:5px;"></a>
                                <a href="https://www.instagram.com/cometbus0"><img src="cid:ig" style="width:30px;  margin:5px;"></a>
                                <a href="https://www.facebook.com/profile.php?id=100093159280113"><img src="cid:fb" style="width:30px; margin:5px;"></a>
                                    <hr>
                                    <p style="font-size:12px; color:#777">This is a post-only mailing. Please do not reply to this email.</p>
                                </div>
                                
                        
                            </body>
                            </html>
';
                            $mail->send();
                            header("location: ../verifycode.php?code=send");
                            exit();
                        } 
                    }
                    }
                    else if($numrowadmin==1)
                    {
                        
                    
                            
                            $_SESSION["code"]=mt_rand(100000,999999);
                            //send email//
                            $mail=new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->Host='smtp.gmail.com';
                            $mail->SMTPAuth=true;
                            $mail->Username='cometbus0@gmail.com';
                            $mail->Password='tpguonvllpfddooj';
                            $mail->SMTPSecure='ssl';
                            $mail->Port=465;
                            $mail->setFrom('cometbus0@gmail.com');
                            $mail->addAddress($_SESSION["input_email"]);
                            $mail->AddEmbeddedImage('../img/logo_dark.png', 'logo');
                            $mail->AddEmbeddedImage('../img/facebook.png', 'fb');
                            $mail->AddEmbeddedImage('../img/twitter - Copy.png', 'tt');
                            $mail->AddEmbeddedImage('../img/instagram - Copy.png', 'ig');
                            $mail->isHTML(true);
                            $mail->Subject="Email Verification Code";
                            $mail->Body=
                            '
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <meta charset="UTF-8">
                                <title>Email Verification</title>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
                                <style>
                                    body{
                                        font-family: sans-serif;
                                    }
                        
                                    .content{
                                        
                                        width:400px;
                                        background-color: white;
                                        margin:0 auto;
                                        text-align:center;
                                        position:absolute;
                                        top:50%;
                                        left:50%;
                                        transform: translate(-50%, -50%); 
                                        
                                    }
                                    
                                    
                                </style>
                            </head>
                            <body>
                        
                                
                                <div class="content">
                                    
                                    <p><img src="cid:logo" style="filter: brightness(0%);"></p>
                                    <p style="padding-top:20px;">Your verification code is:</p>
                                    <h1 style="letter-spacing: 8px; padding-top:20px; padding-bottom:20px;">'.$_SESSION["code"].
                                    '</h1>
                                    <div style="font-size:14px;">NEVER share this code with others, including CometBus staff.</div>
                                <hr>
                                
                                <a href="https://twitter.com/bus_comet09237"><img src="cid:tt" style="width:30px; margin:5px;"></a>
                                <a href="https://www.instagram.com/cometbus0"><img src="cid:ig" style="width:30px;  margin:5px;"></a>
                                <a href="https://www.facebook.com/profile.php?id=100093159280113"><img src="cid:fb" style="width:30px; margin:5px;"></a>
                                    <hr>
                                    <p style="font-size:12px; color:#777">This is a post-only mailing. Please do not reply to this email.</p>
                                </div>
                                
                        
                            </body>
                            </html>
';
                            $mail->send();
                            header("location: ../verifycode.php?code=send");
                            exit();
                         
                    
                    }
                    else
                    {
                        header("location: ../forgotpw.php?error=emaildoesnotexist");
                        exit(); 
                    } 
                
?>