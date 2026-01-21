<?php
 // Include the PHPMailer library
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/SMTP.php';
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $email_sent = 0;
            require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 
            // Get the user's email address and admin ID from the AJAX request
            $user_email = $_POST['email_sent'];
            $admin_id = $_POST['id_sent'];

        
            //Get data in SQL statement
            $sql = "SELECT admin_username, admin_password from admin where admin_id = '$admin_id'";
            $sql_result = mysqli_query($conn, $sql);
            $sql_select = mysqli_fetch_assoc($sql_result);


            // Retrieve the admin username and password from the database using the admin ID
            $admin_username = $sql_select['admin_username']; 
            $admin_password = $sql_select['admin_password'];  
            
            
           // Create a new PHPMailer instance
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
                $mail->addAddress($user_email);
            
                // Set the email content
                $mail->isHTML(true);
                $mail->Subject = 'Admin Login Information for CometBus';
                $mail->Body    = '<h4>Important: Your Super Admin has sent you the login information for your admin account.</h4>
                                  <h4>Below are the <b><i>Account</i></b> to Log into the admin page</h4>
                                <b style="color: red;"><i>DO NOT SHARE THIS INFORMATION WITH ANYONE OR MAKE IT PUBLIC.</i></b>
                                <br>
                                Unauthorized sharing of your admin login information can lead to security breaches and may result in disciplinary actions.
                                <br><b>(Even you are not in this company anymore)</b>
                                <h4>For security reasons, we recommend that you take the following steps:</h4>
                                <ul>
                                    <li>Change your password immediately after logging in for the first time.</li>
                                    <li>Use a strong, unique password that you have not used before and will not use for any other accounts.</li>
                                    <li>Do not write down or store your password in an insecure location.</li>
                                    <li>Regularly update your password to keep your account secure.</li>
                                </ul>
                                <br>
                                  Your admin login information:<br>Username: <b style="color: orange"><i>'.$admin_username.'</i></b> <br>Password: <b style="color: orange"><i>'.$admin_password.'</i></b>';
            
                // Send the email
                if($mail->send() === true)
                {
                  $email_sent =1;
                }




            // Check for errors
            if ($email_sent === 1 ) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false, 'message' => $conn->error));
            }
        
            // Close statement and connection        
            $conn->close();
        }
        else
        {
            header('Location: /FYP/admin/staff.php');
            exit;
        }
?>
