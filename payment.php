
<?php
 include("header.php");
 $currentMonth = date("m");
 $currentYear = date("y");
 ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script>
        window.history.forward();
    </script>
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style_payment.css">
    <script>
        function onward_return()
        {
            document.getElementById("onward").style.borderBottom = "1px solid red";
            document.getElementById('return').style.borderBottom = '1px solid #B6B6B6';
            document.getElementById("onward-tab").style.display = "block";
            document.getElementById("return-tab").style.display = "none";
            
        }

        function return_onward()
        {
            document.getElementById("onward-tab").style.display = "none";
            document.getElementById("return-tab").style.display = "block";
            document.getElementById('onward').style.borderBottom = '1px solid #B6B6B6';
            document.getElementById('return').style.borderBottom = '1px solid red';
        }
    </script>
</head>
<body>

<?php
    // session_start();
    include ("dbconnect.php");

    if(isset($_POST['btnpay']))
    {
        $i = 0;
        $error = 0;
        $error_psgInfo = 0;
        $error_psgInfo2 = 0;
        $error_psgInfo3 = 0;
        $error_psgInfo4 = 0;
        $error_psgName = 0;

        $userFullName = $_POST['FullName'];
        $userAge = $_POST['age'];
        $useremail = $_POST['email_address'];
        $userphone = $_POST['phone'];

        //CREATE SESSION FOR PASSING TO payment_func.php
        $_SESSION['userphone'] = $userphone;
        $_SESSION['useremail'] = $useremail;

        // CREATE SESSION FOR USER FULLNAME AND AGE
        foreach ($userFullName as $userfullname) {
            $_SESSION['user_fullname'][$i] = $userfullname;
            $i++;
        }

        $i = 0;

        foreach ($userAge as $age) {
            $_SESSION['age'][$i] = $age;
            $i++;
        }

        // VALIDATION FOR PSG INFO 
        for($i=0;$i<count($_SESSION['user_fullname']);$i++)
        {
            if($_SESSION['user_fullname'][$i] == null)
            {
                $error_psgInfo = 1;
            }

            if($_SESSION['user_fullname'][$i] != null)
            {
                if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['user_fullname'][$i])) {  
                    $error_psgName = 1;
                    $_SESSION['error_psgName'] = "Name only acept letters and spaces!"; 
                }  
            }
            

        }
        
        for ($i = 0; $i < count($_SESSION['user_fullname']); $i++) 
        {
            if (empty($_SESSION['age'][$i])) {
                $error_psgInfo = 1;
            } else if ($_SESSION['age'][$i] < 12) {
                $error_psgInfo2 = 2;
            }
        
            if ($i == 0) {
                if ($_SESSION['age'][0] < 12 || !is_numeric($_SESSION['age'][0])) {
                    $error_psgInfo2 = 2;
                    $error = 1;
                }
            }
        
            if ($i > 0) {
                if (empty($_SESSION['age'][$i]) || !is_numeric($_SESSION['age'][$i]) || $_SESSION['age'][$i] <= 0) {
                    $error_psgInfo = 1;
                    $error = 1;
                }
            }
        
            if (empty($useremail)) {
                $error_psgInfo = 1;
            } else if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
                $error_psgInfo3 = 3;
            }
        }
        

        // Remove any non-digit characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $userphone);

        // Validate the phone number format
        if (empty($userphone)) {
            $error_psgInfo1 = 1;
        }
        else if(!preg_match('/^01\d{8,9}$/', $phoneNumber))
        {
            $error_psgInfo4 = 4; 
        }

        //Error name
        if($error_psgInfo == 1)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'];
            $error = 1;
        }

        //Error primary age
        if($error_psgInfo2 == 2)
        {
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot Less Than 12 !";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo2'];
            $error = 1;   
        }

        //Error email address
        if($error_psgInfo3 == 3)
        {
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo3'];
            $error = 1;   
        }

        //error phone number
        if($error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid, please make sure the phone number length is between 10 - 11!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo4'];
            $error = 1;   
        }

        //error name format
        if($error_psgName == 1)
        {
            $error = 1;
        }
    

        if($error_psgInfo == 1 && $error_psgInfo2 == 2)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field and the ";
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo2'];
            $error = 1; 
        }

        if($error_psgInfo == 1 && $error_psgInfo3 == 3)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field and the";
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo3'];
            $error = 1; 
        }

        if($error_psgInfo == 1 && $error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo4'];
            $error = 1; 
        }

        if($error_psgInfo == 1 && $error_psgInfo2 == 2 && $error_psgInfo3 == 3)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field, ";
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12 and the";
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo2'].$_SESSION['error_psgInfo3'];
            $error = 1; 
        }

        if($error_psgInfo == 1 && $error_psgInfo2 == 2 && $error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field, ";
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12 and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo2'].$_SESSION['error_psgInfo4'];
            $error = 1; 
        }

        if($error_psgInfo == 1 && $error_psgInfo3 == 3 && $error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo1'] = "Enter all the input field, ";
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo1'].$_SESSION['error_psgInfo3'].$_SESSION['error_psgInfo4'];
            $error = 1;
        }
        
        if($error_psgInfo2 == 2 && $error_psgInfo3 == 3)
        {
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12 and the";
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo2'].$_SESSION['error_psgInfo3'];
            $error = 1;
        }

        if($error_psgInfo2 == 2 && $error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12 and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo2'].$_SESSION['error_psgInfo4'];
            $error = 1;
        }

        if($error_psgInfo2 == 2 && $error_psgInfo3 == 3 && $error_psgInfo4 == 4)  
        {
            $_SESSION['error_psgInfo2'] = "Primary Passenger Age cannot be less than 12, ";
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo2'].$_SESSION['error_psgInfo3'].$_SESSION['error_psgInfo4'];
            $error = 1;
        }      

        if($error_psgInfo3 == 3 && $error_psgInfo4 == 4)
        {
            $_SESSION['error_psgInfo3'] = "Email Address is Invalid and the";
            $_SESSION['error_psgInfo4'] = "Phone Number is Invalid!";
            $_SESSION['error_psgInfo'] = $_SESSION['error_psgInfo3'].$_SESSION['error_psgInfo4'];
            $error = 1;
        }

        if($error_psgName == 1)
        {
            $_SESSION['error_psgInfo'] .= $_SESSION['error_psgName'];
        }

        if($error == 1)
        {
            header("Location:passenger_info.php");
        }

    } 

    $sql_summary = "SELECT DISTINCT * FROM bus_schedule 
        INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
        WHERE bus_schedule.bus_schedule_id = $_SESSION[departure_bushid]";
    $get_summary = mysqli_query($conn,$sql_summary);
    $row_summary = mysqli_fetch_assoc($get_summary);

    $bo_pic = $row_summary['bus_operator_pic'];
    $bo_name = $row_summary['bus_operator_name'];
    $_SESSION['busOpeD'] = $bo_name;

    if(isset($_SESSION['return_date']))
    {
        $sql_summary = "SELECT DISTINCT * FROM bus_schedule 
            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            WHERE bus_schedule.bus_schedule_id = $_SESSION[return_bushid]";
        $get_summary = mysqli_query($conn,$sql_summary);
        $row_summary = mysqli_fetch_assoc($get_summary);
    
        $return_bo_pic = $row_summary['bus_operator_pic'];
        $return_bo_name = $row_summary['bus_operator_name'];
        $_SESSION['busOpeR'] = $return_bo_name;
    }
?>

<div class="paymentBox">
    <div class="summary">
        <div class="title_summary">SUMMARY</div>

        <div class="onward-return-panel" >
            <div class="onward" id="onward" onclick="onward_return()">ONWARD TRIP</div>
            <?php
                if(isset($_SESSION['return_date']))
                {
                    ?>
                        <div class="return" id="return" onclick="return_onward()">RETURN TRIP</div>
                    <?php
                }
            ?>   
        </div>
                
        <div id="onward-tab">
            <div class="summary-row1">
                <div><img style="height:100px;" src="admin/pictures/<?php echo $bo_pic?>"></div>
                <div class="bus-ope-name"><?php echo $bo_name ?></div>
            </div>
    
            <div class="boarding-alighting">
                <div><b>Departure Date</b></div>
                <div><b>Departure Time</b></div>
                <div><?php echo $_SESSION['departure_bus_schedule_date'] ?></div>
                <div><?php echo $_SESSION['summary_departure_time'] ?></div>
            </div>
    
            <div class="boarding-alighting">
                <div><b>Origin</b></div>
                <div><b>Destination</b></div>
                <div><?php echo $_SESSION['origin'] ?></div>
                <div><?php echo $_SESSION['destination'] ?></div>
                <div><b>Boarding</b></div>
                <div><b>Alighting</b></div>
                <div><?php echo $_SESSION['board'] ?></div>
                <div><?php echo $_SESSION['alight'] ?></div>
            </div>

            <!-- PSG DETAILS -->
            <div class="seat-info">
                <div><b>Seat Info :</b></div>
            <?php
                for($i=0;$i<count($_SESSION['user_fullname']);$i++)
                {
                    ?>
                        <div class="ins-seat-info"><img src="img/user.png" style="width:17px; height:17px;margin-right:10px;"><?php echo $_SESSION['user_fullname'][$i]; ?>(<?php echo $_SESSION['age'][$i]; ?>)</div>
                        <div class="ins-seat-info2">Seats: <?php echo $_SESSION['bus_no'][$i] ?></div>
                    <?php
                }
            ?>      
            </div>
        </div>

        <?php
            if(isset($_SESSION['return_date']))
            {
                ?>
                    <div id="return-tab" style="display:none">
                        <div class="summary-row1">
                            <div><img style="height:100px;" src="admin/pictures/<?php echo $return_bo_pic?>"></div>
                            <div class="bus-ope-name"><?php echo $return_bo_name ?></div>
                        </div>
                
                        <div class="boarding-alighting">
                            <div><b>Departure Date</b></div>
                            <div><b>Departure Time</b></div>
                            <div><?php echo $_SESSION['return_bus_schedule_date'] ?></div>
                            <div><?php echo $_SESSION['summary_return_time'] ?></div>
                        </div>
                
                        <div class="boarding-alighting">
                            <div><b>Origin</b></div>
                            <div><b>Destination</b></div>
                            <div><?php echo $_SESSION['destination'] ?></div>
                            <div><?php echo $_SESSION['origin'] ?></div>
                            <div><b>Boarding</b></div>
                            <div><b>Alighting</b></div>
                            <div><?php echo $_SESSION['alight'] ?></div>
                            <div><?php echo $_SESSION['board'] ?></div>
                        </div>

                        <!-- PSG DETAILS -->
                        <div class="seat-info">
                            <div><b>Seat Info :</b></div>
                        <?php
                            for($i=0;$i<count($_SESSION['user_fullname']);$i++)
                            {
                                ?>
                                    <div class="ins-seat-info"><img src="img/user.png" style="width:17px; height:17px;margin-right:10px;"><?php echo $_SESSION['user_fullname'][$i]; ?>(<?php echo $_SESSION['age'][$i]; ?>)</div>
                                    <div class="ins-seat-info2">Seats: <?php echo $_SESSION['return_bus_no'][$i] ?></div>
                                <?php
                            }
                        ?>      
                        </div>
                    </div>
                <?php
            }
        ?>

    </div>

    <div class="container">

        <form method="POST" action="payment.php">

            <div class="row">
                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" placeholder="NAME ON CARD" name="NameOnCard" autocomplete="off">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="text" placeholder="XXXXXXXXXXXXXXXX" maxlength="16" name="CreditCardNumber" autocomplete="off">
                    </div>
                    

                    <div class="flex">
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="MM" maxlength="2" name="ExpM" autocomplete="off">
                    </div>
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="text" placeholder="YY" maxlength="2" name="ExpY" autocomplete="off">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="XXX" maxlength="3" name="CVV" autocomplete="off">
                        </div>
                    </div>

                </div>
        
            </div>

            <input type="submit" value="make payment" class="submit-btn" name="checkoutbtn">

        </form>

    </div>   
</div>
    
</body>
</html>

<?php
if(isset($_POST['checkoutbtn']))
{
    $NameOnCard = $_POST['NameOnCard'];
    $CreditCardNumber = $_POST['CreditCardNumber'];
    $ExpMonth = $_POST['ExpM'];
    $ExpYear = $_POST['ExpY'];
    $CVV = $_POST['CVV'];

    // STORE TO SESSION
    $_SESSION['NameOnCard'] = $NameOnCard;
    $_SESSION['CreditCardNumber'] = $CreditCardNumber;
    $_SESSION['ExpMonth'] = $ExpMonth;
    $_SESSION['ExpYear'] = $ExpYear;
    $_SESSION['CVV'] = $CVV;

    //CHECKING VALIDATION FOR PAYMENT
    $correct = 0; 
    //  if correct = 1, means something error

    // Variable checking for empty input
    $empty_name = 0;
    $empty_number = 0;
    $empty_EM = 0;
    $empty_EY = 0;
    $empty_CVV = 0;

    $correct_name = 0;
    $correct_number = 0;
    $correct_EM = 0;
    $correct_EY = 0;
    $correct_CVV = 0;
    //  if correct_XX = 1, means something error



    //CHECKING COMBINATION EXPM AND EXPY
    if($ExpYear == $currentYear)
    {
        if($ExpMonth < $currentMonth)
        {
            $correct = 1;
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Expiration Month and Year is Invalid!',
                    });
                </script>
            <?php
            
        }
    }
    //END CHECKING COMBINATION EXPM AND EXPY


    //CHECKING CVV
    if(empty($CVV))
    {
        $empty_CVV = 1;
        $correct = 1;
        $_SESSION['error_msg5'] = "CVV is required!";
    }
    else
    {
        $CVV = preg_replace('/\D/', '', $CVV);

        if(!preg_match('/^\d{3}$/', $CVV))
        {
            $_SESSION['error_msg55'] = "CVV only accept numbers!";
            $correct_CVV = 1;
            $correct = 1;
        }
    }

    if($empty_CVV == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg5']; ?>',
                });
            </script>
        <?php
        
        unset($_SESSION['error_msg5']);
    }
    else if($correct_CVV == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg55']; ?>',
                });
            </script>
        <?php
    
        unset($_SESSION['error_msg55']);
    }
    //END CHECKING CVV

    

    //CHECKING Exp Year
    if(empty($ExpYear))
    {
        $empty_EY = 1;
        $correct = 1;
        $_SESSION['error_msg4'] = "Exp Year is required!";
    }
    else
    {
        if(!preg_match('/^\d{2}$/', $ExpYear))
        {
            $_SESSION['error_msg44'] = "Exp Year only accept numbers and length must be 2 digits!";
            $correct_EY = 1;
            $correct = 1;
        }
        else if($ExpYear < $currentYear)
        {
            $_SESSION['error_msg44'] = "Exp Year cannot less than current year!";
            $correct_EY = 1;
            $correct = 1;
        }
        else if($ExpYear > 28)
        {
            $_SESSION['error_msg44'] = "Exp Year cannot more than current year!";
            $correct_EY = 1;
            $correct = 1;
        }
    }

    if($empty_EY == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg4']; ?>',
                });
            </script>
        <?php
        
        unset($_SESSION['error_msg4']);
    }
    else if($correct_EY == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg44']; ?>',
                });
            </script>
        <?php
    
        unset($_SESSION['error_msg44']);
    }
    //END CHECKING Exp Year


    //CHECKING Exp Month
    if(empty($ExpMonth))
    {
        $empty_EM = 1;
        $correct = 1;
        $_SESSION['error_msg3'] = "Exp Month is required!";
    }
    else
    {
        if(!preg_match('/^\d{2}$/', $ExpMonth))
        { 
            $_SESSION['error_msg33'] = "Exp Month only accepts numbers and length must be 2 digits!";
            $correct_EM = 1; 
            $correct = 1;
        } 
        else
        { 
            $ExpMonth = (int) $ExpMonth; 
            if($ExpMonth < 1 || $ExpMonth > 12)
            {
                $_SESSION['error_msg33'] = "Exp Month should be between 1 and 12!";
                $correct_EM = 1; 
                $correct = 1;
            }    
        }

    }

    if($empty_EM == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg3']; ?>',
                });
            </script>
        <?php
        
        unset($_SESSION['error_msg3']);
    }
    else if($correct_EM == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg33']; ?>',
                });
            </script>
        <?php
    
        unset($_SESSION['error_msg33']);
    }
    //END CHECKING Exp Month

    //CHECKING credit card number
    if(empty($CreditCardNumber))
    {
        $empty_number = 1;
        $correct = 1;
        $_SESSION['error_msg2'] = "CREDIT CARD NUMBER is required!";
    }
    else
    {
        function validateCreditCard($CreditCardNumber) {
            // Remove any non-digit characters (e.g., spaces, dashes)
            $CreditCardNumber = preg_replace('/\D/', '', $CreditCardNumber);
            
            // Check if the card number matches a known pattern
            if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $CreditCardNumber)) {
                // Visa card
                $_SESSION['payment_method'] = "VisaCard";
                return true;
            } elseif (preg_match('/^5[1-5][0-9]{14}$/', $CreditCardNumber)) {
                // Mastercard
                $_SESSION['payment_method'] = "MasterCard";
                return true;
            }
            // Card number doesn't match any known pattern
            return false;
        }

        if (validateCreditCard($CreditCardNumber))
        {
            $_SESSION['CreditCardNumber'] = $CreditCardNumber;
        }
        else
        {
            $_SESSION['error_msg22'] = "Credit Card Number is wrong!";
            $correct_number = 1;
            $correct = 1;
        }
    }

    if($empty_number == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg2']; ?>',
                });
            </script>
        <?php
        
        unset($_SESSION['error_msg2']);
    }
    else if($correct_number == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg22']; ?>',
                });
            </script>
        <?php
    
        unset($_SESSION['error_msg22']);
    }
    // END CHECKING Credit Card Number

    //CHEKING Name on card
    if(empty($NameOnCard))
    {
        $empty_name = 1;
        $correct = 1;
        $_SESSION['error_msg1'] = "NAME ON CARD is required!";
    }
    else
    {
        if (!preg_match("/^[a-zA-Z ]*$/",$NameOnCard))
        {
            $correct_name = 1;
            $_SESSION['error_msg11'] = "Name only acept letters and spaces!";
            $correct = 1;
        }
        else
        {
            $_SESSION['NameOnCard'] = $NameOnCard;
        }
    }
    
    if($empty_name == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg1']; ?>',
                });
            </script>
        <?php
        
        unset($_SESSION['error_msg1']);
    }
    else if($correct_name == 1)
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $_SESSION['error_msg11']; ?>',
                });
            </script>
        <?php
    
        unset($_SESSION['error_msg11']);
    }
    //END CHEKING Name on card

    if($correct == 0)
    {
        $_SESSION['ExpMonth'] = $ExpMonth;
        $_SESSION['ExpYear'] = $ExpYear;
        $_SESSION['CVV'] = $CVV;
        $_SESSION['email_success'] = 1;
        ?>
            <script>
                var y = <?php echo $correct ?>;
                console.log(y);
                if(y == 0)
                {
                    $.ajax({
                            url: 'payment_func.php',
                            type: 'POST',
                            data: {
                            },
                            success: function(response) {
                                    
                            },
                            error: function(xhr, status, error) {
    
                            }
                    });

                            let timerInterval
                                    Swal.fire({
                                        title: 'Auto close alert!',
                                        html: 'Transaction Details will be send through your Email!',
                                        timer: 5000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            const b = Swal.getHtmlContainer().querySelector('b')
                                            timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                        }).then((result) => {
                                        /* Read more about handling dismissals below */
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            window.location.href = "transaction.php";
                                            console.log('I was closed by the timer')
                                    }
                                    })
                }
            </script>
        <?php
    }
}

ob_end_flush();
?>