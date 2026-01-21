<?php 
    include("dbconnect.php");
    include("header.php");
    // session_start();
    $_SESSION['user_fullname'] = array();
    $_SESSION['age'] = array();
    // temp
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Passenger Info</title>
    <style>
        .border_box{
            border:1px solid lightgrey;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 5px;
            padding:15px;
            background-color:white;
        }

        .input-field{
            padding:10px;
            margin:5px;
            width:50%;
            border-radius:5px;
        }
        .grey_text{
            color:grey;
            font-size:13px;
            margin-left:5px;
        }
        .set_form_position{
            margin: auto;
            margin-top:20px;
            margin-bottom:20px;
            width:40%;
            border:1px solid lightgrey;
            padding:25px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 5px;
            background-color:white;
        }
        
        body{
            font-family:sans-serif;
        }

        .proceed_btn{
            background-color:#4285f4;
            transition:0.3s;
        }

        .proceed_btn:hover{
            background-color:#1669F2;
            box-shadow: 0 0 6px #4285f4;
        }
        
        .fare{
            font-weight: bold;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div class="set_form_position">
    <form method="post" action="payment.php">
        <h2 style="text-align:center; ">Passenger Details</h2>
        <div><p><img src="img/user.png" style="width:17px; height:17px;">&nbsp;Passenger Information</p></div>

        <?php
            if(isset($_SESSION['userid']))
            {
                $sql_user = "SELECT * FROM user WHERE user_id = $_SESSION[userid]";
                $get_user = mysqli_query($conn,$sql_user);
                $row_user = mysqli_fetch_assoc($get_user);

                $userfullname = $row_user['user_fullname'];
                $usercontact = $row_user['user_contact_no'];
                $useremail = $row_user['user_email_address'];

                $_SESSION['userfullname'] = $userfullname;
                $_SESSION['usercontact'] = $usercontact;
                $_SESSION['useremail'] = $useremail;
                $a=0;
            }

            //COUNTING FARE RETURN
            $fareReturn = 0;
            $totalReturn = 0;
            if(isset($_SESSION['return_date']))
            {
                for($i=0;$i<count($_SESSION['return_bus_no']);$i++)
                {
                    $fareReturn = $_SESSION['return_fare'];
                    $totalReturn += $fareReturn;
                }

                $fare = 0;
                $total = 0;
                for($i=0;$i<count($_SESSION['bus_no']);$i++)
                {
                    $fare = $_SESSION['departure_fare'];
                    $total += $fare;
                }

                $_SESSION['total_return_fare'] = number_format($totalReturn, 2, '.', '');
                $_SESSION['total_departure_fare'] = number_format($total, 2, '.', '');
                $_SESSION['total_departureReturn_fare'] = $_SESSION['total_return_fare'] + $_SESSION['total_departure_fare'];
                $total += $totalReturn;
                $total = number_format($total, 2, '.', '');
                
                for($i=0;$i<count($_SESSION['return_bus_no']);$i++)
                {
                    if(isset($_SESSION['userid']) && $a==0)
                    {
                        ?>
                            <div class="border_box">
                                <div>Passenger <?php echo ($i+1) ?></div>
                                <span class="grey_text">Name</span><br>
                                <input class="input-field" type="text" placeholder="Name" autocomplete="off" value="<?php echo $userfullname ?>" name="FullName[]"><br><br>
                                <span class="grey_text">Age</span><br>
                                <input class="input-field" style="width:15%;" type="text" autocomplete="off" placeholder="Age" name="age[]"><br>
                            </div> 
                            <br>
                        <?php
    
                        $a = 1;
                    }
                    else
                    {
                        ?>
                            <div class="border_box">
                                <div>Passenger <?php echo ($i+1) ?></div>
                                <span class="grey_text">Name</span><br>
                                <input class="input-field" type="text" placeholder="Name" autocomplete="off" name="FullName[]"><br><br>
                                <span class="grey_text">Age</span><br>
                                <input class="input-field" style="width:15%;" type="text" autocomplete="off" placeholder="Age" name="age[]"><br>
                            </div> 
                            <br>
                        <?php
                    }
                    
                }

            }
            else
            {
                //COUNTING FARE DEPARTURE
                $fare = 0;
                $total = 0;
                for($i=0;$i<count($_SESSION['bus_no']);$i++)
                {
                    $fare = $_SESSION['departure_fare'];
                    $total += $fare;
                }
    
                $total = number_format($total, 2, '.', '');
                $_SESSION['total_departure_fare'] = number_format($total, 2, '.', '');
    
                for($i=0;$i<count($_SESSION['bus_no']);$i++)
                {
                    if(isset($_SESSION['userid']) && $a==0)
                    {
                        ?>
                            <div class="border_box">
                                <div>Passenger <?php echo ($i+1) ?> | <?php echo $_SESSION['bus_no'][$i]?></div>
                                <span class="grey_text">Name</span><br>
                                <input class="input-field" type="text" placeholder="Name" autocomplete="off" value="<?php echo $userfullname ?>" name="FullName[]"><br><br>
                                <span class="grey_text">Age</span><br>
                                <input class="input-field" style="width:15%;" type="text" autocomplete="off" placeholder="Age" name="age[]"><br>
                            </div> 
                            <br>
                        <?php
    
                        $a = 1;
                    }
                    else
                    {
                        ?>
                            <div class="border_box">
                                <div>Passenger <?php echo ($i+1) ?> | <?php echo $_SESSION['bus_no'][$i]?></div>
                                <span class="grey_text">Name</span><br>
                                <input class="input-field" type="text" placeholder="Name" autocomplete="off" name="FullName[]"><br><br>
                                <span class="grey_text">Age</span><br>
                                <input class="input-field" style="width:15%;" type="text" autocomplete="off" placeholder="Age" name="age[]"><br>
                            </div> 
                            <br>
                        <?php
                    }
                    
                }
            }

        ?>

        <hr/>

        <div><p><img src="img/email.png" style="width:20px; height:15px;">&nbsp;Contact Details</p></div>
        <div class="border_box">
            <span class="grey_text">Email Address</span><br>
            <input class="input-field" type="text" placeholder="Email Address" value="<?php echo $useremail ?>" name="email_address" autocomplete="off"><br><br>
            <span class="grey_text">Phone Number</span><br>
            <input class="input-field" type="text" placeholder="Phone Number" value="<?php echo $usercontact ?>" name="phone" maxlength="11" autocomplete="off"><br>
        </div> 
        <div class="fare">Total Fare : RM<?php echo $total ?></div>
        <div style="margin-top:15px; margin-left:450px;">
            <input type="submit" value="PROCEED TO PAY" name="btnpay" class="proceed_btn" style="color:white; padding-top:8px; padding-bottom:8px; padding-left:12px; padding-right:12px; border:1px; solid #3085d6; cursor:pointer; font-size:16px;">
        </div>
</form>
    </div>
</body>
</html>

<?php
if(isset($_SESSION['error_psgInfo'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo $_SESSION['error_psgInfo']; ?>',
            });
        </script>
    <?php
        // Unset the session variable to prevent the message from being displayed again
        unset($_SESSION['error_psgInfo']);
}
?>