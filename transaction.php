
<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_transaction.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Transaction</title>
    <script>
        window.history.forward();
    </script>
</head>
<body>
    <?php
    // session_start();

    $contact_no = $_SESSION['userphone'];
    $email_address = $_SESSION['useremail'];
    $user_id = $_SESSION['userid'];
    $bus_schedule_id = $_SESSION['departure_bushid'];
    $booking_no = $_SESSION['booking_no'];
    $payment_method = $_SESSION['payment_method'];

    //Variable using in email
    $act_booking_no = $_SESSION['booking_no'];
    $departure_date = $_SESSION['departure_bus_schedule_date'];
    
    $phoneNo = $_SESSION['userphone'];

    $user_name = $_SESSION['userfullname'];

    $board = $_SESSION['board'];
    $alight = $_SESSION['alight'];

    $board_return = $_SESSION['alight'];
    $alight_return = $_SESSION['board'];

    $schedule_date = $_SESSION['departure_bus_schedule_date'];
    $depar_time = $_SESSION['summary_departure_time'];

    $ope_name = $_SESSION['busOpeD'];
    $gateD = $_SESSION['gateD'];
    $ticket = 0;

    if(!isset($_SESSION['return_date']))
    {
        $total_pay = $_SESSION['total_departure_fare'];
    }
    else
    {
        $total_pay = $_SESSION['total_departureReturn_fare'];
    }

    $total_pay = number_format((float)$total_pay, 2, '.', '');

    if(isset($_SESSION['return_date']))
    {
        $schedule_date_return = $_SESSION['return_bus_schedule_date'];
        $depar_time_return = $_SESSION['summary_return_time'];
        $ope_name_return = $_SESSION['busOpeR'] ;
        $gateR = $_SESSION['gateR'];
        $return_date = $_SESSION['return_date'];
    }
    
    $purchase_date = $_SESSION['purchase_date'];

    
?>
<!-- NEW DIV -->
<div style="margin-left:320px;">
    <h1 style='margin-left:330px;'>COMETBus</h1>
    
    <div style='display: grid; grid-template-columns: auto auto;'>
        <div>
            <span><b>Booking No    : </b></span><?php echo $act_booking_no ?>
        </div>
        
        <div>
            <span><b>Purchase Date : </b></span><?php echo $purchase_date ?>
        </div>
        
        
        <div>
            <span><b>Travel Date   : </b></span><br/>
            <span style='color:grey;'>Depart </span>:
<?php
            if (isset($_SESSION['return_date'])) 
            {
                echo $departure_date;
                ?>
                <br/><span style='color:grey;'>Return </span>: <?php echo $return_date ?>
                <?php
            } 
            else 
            {
                echo $departure_date;
            }
?>
        </div>

    </div>


    <h3 style='margin-left:380px;'>Receipt</h3>



    <div style='border: 1px solid black;width: 70%;'>
        <h4 style='background-color:#00FF00;margin:0;text-align: center;padding: 5px;'>Customer Details</h4>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Name:</label><span><?php echo $user_name ?></span></p>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Phone No:</label><span><?php echo $phoneNo ?></span></p>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Email Address:</label><span><?php echo$email_address ?></span></p>
    </div>

    <div style='margin-top:20px; float:left; width: 70%;border:1px solid black;'>
            <div style='float:left; border-bottom:1px solid black; width:100%'>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Depart</b></label><span><b><?php echo $board ?> > <?php echo $alight ?></b></span></p>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Date  </b></label><span><?php echo $schedule_date ?></span></p>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Time  </b></label><span><?php echo $depar_time ?></span></p>
<?php
                if(isset($_SESSION['return_date']))
                {
                    echo "<p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Return</b></label><span><b>$board_return > $alight_return</b></span></p>
                        <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Date  </b></label><span>$schedule_date_return</span></p>
                        <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Time  </b></label><span>$depar_time_return</span></p>";
                }
?>
            </div>

            <div style='float:left; width:99%; border-bottom:1px solid black;'>
                <div style='float:left; width:50%;'>
                    <h4 style='text-align:center; margin:5px 1px 5px 1px;'>Passenger</h4>
                    <div style='display:flex;'>
                        <div style='font-weight: 350; margin-left:10px; width:50%'>Name</div>
                        <div style='font-weight: 350; margin-left:10px; width:50%'>Seat No.</div>
                    </div>
    
                    <?php
                    
                        for($i=0;$i<count($_SESSION['user_fullname']);$i++)
                        {
                            $userName = $_SESSION['user_fullname'][$i];
                            $seatNum = $_SESSION['bus_no'][$i];

                            echo "<div style='display:flex;'>
                                    <div style='margin-left:10px; width:40%; padding: 3px;'>$userName</div>
                                    <div style='margin-left:10px; width:40%; text-align: center;'>$seatNum</div>
                                </div>";

                            if(isset($_SESSION['return_date']))
                            {
                                $seatNumReturn = $_SESSION['return_bus_no'][$i];

                                echo "<div style='display:flex;'>
                                        <div style='margin-left:10px; width:40%; padding: 3px;'>$userName</div>
                                        <div style='margin-left:10px; width:40%; text-align: center;'>$seatNumReturn</div>
                                    </div>";
                            }
                        }
                    ?>
                    
                    
                </div>
    
                <div style='float:left; width:50%;'>
                    <h4 style='text-align:center; margin:5px 1px 5px 1px;'>Fare Details</h4>

                    <div style='display:flex;'>
                                    <div style='width:50%; padding: 3px;'>Ticket Departure</div>
                                    <div>RM <?php echo $_SESSION['total_departure_fare'] ?></div>
                                </div>
                    <?php

                        if(isset($_SESSION['return_date']))
                        {
                            ?>
                                <div style='display:flex;'>
                                    <div style='width:50%; padding: 3px;'>Ticket Return</div>
                                    <div>RM <?php echo $_SESSION['total_return_fare'] ?></div>
                                </div>
                            <?php
                        }

                    ?>

    
                    <div style='display: flex;'>
                        <div style='width:50%; padding: 3px;'><b>Total </b></div>
                        <div>RM <?php echo $total_pay ?></div>
                    </div>
                </div>
            </div>

            <div style='float:left; width: 99%; display: flex;'>
                <div style='padding:10px;font-weight: bold;'>Total Paid : </div>
                <div style='padding:10px;'>RM <?php echo $total_pay ?></div>
            </div>
        </div>

        <div style='margin-top:20px; border:1px solid black; float:left; width:70%'>
            <div style='padding:10px;'>Paid Via :</div>
            <div style='margin-left:60px;display:flex;'>
                <div style='width:30%;font-weight:bold;'><?php echo $payment_method ?></div>
                <div style='font-weight:bold;'>RM <?php echo $total_pay ?></div>
            </div>
        </div>

        <div style='margin-top:5px; float:left; width:70%'>
            <hr style='border-top: 2px dashed black;'/>
        </div>

        <?php
            
            for($i=0;$i<count($_SESSION['bus_no']);$i++)
            {
                $seatNum = $_SESSION['bus_no'][$i];
                $userName = $_SESSION['user_fullname'][$i];
                $ticket++;

                echo
                    " <div style='margin-top:5px; border:1px solid black; float:left; width:70%; margin-bottom:10px;'>
                    <h4 style='background-color:#00FF00;margin:0;text-align: center;padding: 5px;'>Ticket $ticket</h4>
                    
                        <div>
                            <p style='margin-left:15px'><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>FROM:</label><span>$board</span></p>
                            <p style='margin-left:15px'><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>TO:</label><span>$alight</span></p>
                            
                            <hr style='margin:10px;'/>
                
                            <div style='display:flex;'>
                                <div style='width: 110px;'>
                                    <p><div style='margin-left:15px'>$schedule_date</div></p>
                                    <p><div style='margin-left:15px'>$depar_time</div></p>
                                </div>
                
                                <div style='border-left: 2px solid black;
                                height: auto;
                                float: left;
                                margin-left: 10px;
                                margin-right: 10px;
                                margin-bottom:3px;margin-top:3px;'></div>
                
                                <div>
                                    <p><div style='margin-left:15px'>$ope_name</div></p>
                                    <p><div style='margin-left:15px'>Booking Number : <span>$act_booking_no</span></div></p>
                                </div>
                            </div>
                
                            <hr style='margin:10px;'/>
                
                            <div style='display:flex;'>
                            <div style='width: 110px;'>
                                    <p><div style='margin-left:15px'>Gate No. <span>$gateD</span></div></p>
                                </div>
                
                                <div style='border-left: 2px solid black;
                                    height: auto;
                                    float: left;
                                    margin-left: 10px;
                                    margin-right: 10px;
                                    margin-bottom:3px;margin-top:3px;'>
                                </div> 
                
                                <div>
                                    <p><div style='margin-left:15px'>Seat No : <span>$seatNum</span></div></p>
                                    <p><div style='margin-left:15px'>$userName</div></p>
                                </div>
                            </div>
                        </div>       
                </div>
                
                <div style='margin-top:5px; float:left; width:70%'>
                    <hr style='border-top: 2px dashed black;'/>
                </div>";
            }
        
            if(isset($_SESSION['return_date']))
            {
                echo "<div style='margin-top:5px; float:left; width:70%; margin-bottom:10px;'><h3 style='margin:0;text-align: center;padding: 5px;'>Return Ticket</h3></div>";

                for($i=0;$i<count($_SESSION['bus_no']);$i++)
                {
                    $seatNum = $_SESSION['return_bus_no'][$i];
                    $userName = $_SESSION['user_fullname'][$i];
                    $ticket++;

                    echo
                        "<div style='margin-top:5px; border:1px solid black; float:left; width:70%; margin-bottom:10px;'>
                        <h4 style='background-color:#00FF00;margin:0;text-align: center;padding: 5px;'>Ticket $ticket</h4>
                        
                            <div>
                                <p style='margin-left:15px'><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>FROM:</label><span>$alight</span></p>
                                <p style='margin-left:15px'><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>TO:</label><span>$board</span></p>
                                
                                <hr style='margin:10px;'/>
                    
                                <div style='display:flex;'>
                                    <div style='width: 110px;'>
                                        <p><div style='margin-left:15px'>$schedule_date_return</div></p>
                                        <p><div style='margin-left:15px'>$depar_time_return</div></p>
                                    </div>
                    
                                    <div style='border-left: 2px solid black;
                                    height: auto;
                                    float: left;
                                    margin-left: 10px;
                                    margin-right: 10px;
                                    margin-bottom:3px;margin-top:3px;'></div>
                    
                                    <div>
                                        <p><div style='margin-left:15px'>$ope_name_return</div></p>
                                        <p><div style='margin-left:15px'>Booking Number : <span>$act_booking_no</span></div></p>
                                    </div>
                                </div>
                    
                                <hr style='margin:10px;'/>
                    
                                <div style='display:flex;'>
                                <div style='width: 110px;'>
                                        <p><div style='margin-left:15px'>Gate No. <span>$gateR</span></div></p>
                                    </div>
                    
                                    <div style='border-left: 2px solid black;
                                        height: auto;
                                        float: left;
                                        margin-left: 10px;
                                        margin-right: 10px;
                                        margin-bottom:3px;margin-top:3px;'>
                                    </div> 
                    
                                    <div>
                                        <p><div style='margin-left:15px'>Seat No : <span>$seatNum</span></div></p>
                                        <p><div style='margin-left:15px'>$userName</div></p>
                                    </div>
                                </div>
                            </div>
                    </div>
                
                    <div style='margin-top:5px; float:left; width:70%'>
                        <hr style='border-top: 2px dashed black;'/>
                    </div>";
                }
            }
    ?>
    <div style='margin-top:5px; margin-bottom:10px; float:left; width:70%'>
        <a href="home.php"><input type="button" class="button-40" value="BACK TO HOME"></a>
    </div>
</div>
</body>
</html>

<?php
if(isset($_SESSION['email_success']) &&  $_SESSION['email_success'] == 1)
{
  ?>
  <script>
                                        Swal.fire({
                                      icon: 'success',
                                      title: 'Bus Ticket Information',
                                      text: 'Email send successfully!',
                                  })
  </script>
  
  <?php
  unset($_SESSION['email_success']);
}
?>