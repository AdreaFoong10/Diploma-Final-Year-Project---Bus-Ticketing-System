<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <title>Document</title>
</head>
<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    include ("dbconnect.php");
    
    // retrieve the data from the Ajax request (payment.php)
    $ccname_card = $_SESSION['NameOnCard'];
    $ccnum = $_SESSION['CreditCardNumber'];
    $payment_method = $_SESSION['payment_method'];
    $expM = $_SESSION['ExpMonth'];
    $expY = $_SESSION['ExpYear'];
    $cccvv = $_SESSION['CVV'];
    // END retrieve the data from the Ajax request (payment.php)
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $purchase_date = date('Y-m-d H:i:s');
    $_SESSION['purchase_date'] = $purchase_date;

    $expiration_date = $expM."/".$expY;
    

    if($_SESSION['return_date'] == null)
    {
        $total_pay = $_SESSION['total_departure_fare'];
        
    }
    else
    {
        $total_pay = $_SESSION['total_departureReturn_fare'];
    }
    

    //GET USER INFO
    $contact_no = $_SESSION['userphone'];
    $email_address = $_SESSION['useremail'];
    $user_id = $_SESSION['userid'];
    $bus_schedule_id = $_SESSION['departure_bushid'];
    $return_bus_schedule_id = $_SESSION['return_bushid'];
    //CREATE BOOKING Num
    $booking_no = substr(uniqid(), 0, 10);
    $_SESSION['booking_no'] = $booking_no;
    

    if($_SESSION['return_date'] == null)
    {           
        //INSERT INTO BUS_SEAT 
        for($i=0;$i<count($_SESSION['bus_no']);$i++)
        {
            $seat = $_SESSION['bus_no'][$i];
            $userfn = $_SESSION['user_fullname'][$i];
            
            $sqlInsertSeat = "INSERT INTO bus_seat (bus_seat_no, bus_seat_status, bus_schedule_id, bus_id)
                            VALUES ('$seat',1,$_SESSION[departure_bushid],$_SESSION[busID])";
            mysqli_query($conn,$sqlInsertSeat);     
            
            // insert the record into PAYMENT
            $sql_insert = "INSERT INTO payment (total_pay, name_on_card, name_on_seat, booking_no, payment_date, return_status, payment_method, card_number, expiration_date, cvv,
                                            contact_no, email_address, bus_seat_no, user_id, bus_schedule_id)
                                            VALUES ($total_pay, '$ccname_card', '$userfn', '$booking_no','$_SESSION[purchase_date]', 0, '$payment_method','$ccnum','$expiration_date','$cccvv','$contact_no','$email_address', '$seat', $user_id, $bus_schedule_id)";
            mysqli_query($conn,$sql_insert);
        }

    }
    else
    {
        //INSERT BUS SEAT DEPARTURE(1)
        for($i=0;$i<count($_SESSION['bus_no']);$i++)
        {
            $seat = $_SESSION['bus_no'][$i];
            $userfn = $_SESSION['user_fullname'][$i];
            $sqlInsertSeat = "INSERT INTO bus_seat (bus_seat_no, bus_seat_status, bus_schedule_id, bus_id)
                            VALUES ('$seat',1,$_SESSION[departure_bushid],$_SESSION[busID])";
            mysqli_query($conn,$sqlInsertSeat);     
            
            // insert the record into PAYMENT
            $sql_insert = "INSERT INTO payment (total_pay, name_on_card, name_on_seat, booking_no, payment_date, return_status, payment_method, card_number, expiration_date, cvv,
                                            contact_no, email_address, bus_seat_no, user_id, bus_schedule_id)
                                            VALUES ($total_pay, '$ccname_card', '$userfn', '$booking_no', '$_SESSION[purchase_date]', 0, '$payment_method','$ccnum','$expiration_date','$cccvv','$contact_no','$email_address', '$seat', $user_id, $bus_schedule_id)";
            mysqli_query($conn,$sql_insert);
        }

        //INSERT BUS SEAT RETURN
        for($i=0;$i<count($_SESSION['return_bus_no']);$i++)
        {
            $seat = $_SESSION['return_bus_no'][$i];
            $userfn = $_SESSION['user_fullname'][$i];
            $sqlInsertSeat_return = "INSERT INTO bus_seat (bus_seat_no, bus_seat_status, bus_schedule_id, bus_id)
                            VALUES ('$seat',0,$_SESSION[return_bushid],$_SESSION[return_busID])";
            mysqli_query($conn,$sqlInsertSeat_return);   

            // insert the record into PAYMENT
            $sql_insert = "INSERT INTO payment (total_pay, name_on_card, name_on_seat, booking_no, payment_date, return_status, payment_method, card_number, expiration_date, cvv,
                                            contact_no, email_address, bus_seat_no, user_id, bus_schedule_id)
                                            VALUES ($total_pay, '$ccname_card', '$userfn', '$booking_no', '$_SESSION[purchase_date]', 1, '$payment_method','$ccnum','$expiration_date','$cccvv','$contact_no','$email_address', '$seat', $user_id, $return_bus_schedule_id)";
            mysqli_query($conn,$sql_insert);
        }

    }

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cometbus0@gmail.com';
    $mail->Password = 'tpguonvllpfddooj';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('cometbus0@gmail.com');

    $mail->addAddress($email_address);

    $mail->isHTML(true);

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
    $total_return = $_SESSION['total_return_fare'];
    $total_departure = $_SESSION['total_departure_fare'];


    $total_pay = number_format((float)$total_pay, 2, '.', '');

    if($_SESSION['return_date'] != null)
    {
        $schedule_date_return = $_SESSION['return_bus_schedule_date'];
        $depar_time_return = $_SESSION['summary_return_time'];
        $ope_name_return = $_SESSION['busOpeR'] ;
        $gateR = $_SESSION['gateR'];
        $return_date = $_SESSION['return_date'];
    }
    


$mail->Subject = "Bus Ticket Information";
$mail->Body = "
    <html>
    <h1 style='text-align: center;'>COMETBus</h1>
    
    <div style='display: grid; grid-template-columns: auto auto;'>
        <div>
            <span><b>Booking No    : </b></span>$act_booking_no
        </div>
        
        <div>
            <span><b>Purchase Date : </b></span>$purchase_date
        </div>
        
        
        <div>
            <span><b>Travel Date   : </b></span><br/>
            <span style='color:grey;'>Depart </span>:";

            if ($return_date == null) {
                $mail->Body .= $departure_date;
            } else {
                $mail->Body .= "$departure_date <br/><span style='color:grey;'>Return </span>: $return_date";
            }

        $mail->Body .= "</div>

    </div>

    <h3 style='text-align: center;'>Receipt</h3>

    
    <div style='border: 1px solid black;width: 99%;'>
        <h4 style='background-color:#00FF00;margin:0;text-align: center;padding: 5px;'>Customer Details</h4>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Name:</label><span>$user_name</span></p>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Phone No:</label><span>$phoneNo</span></p>
        <p><label style='float:left; text-align:left; margin-left:5px; margin-right:10px; width: 120px;'>Email Address:</label><span>$email_address</span></p>
    </div>

    <div style='margin-top:20px; float:left; width: 99%;border:1px solid black;'>
            <div style='float:left; border-bottom:1px solid black; width:99%'>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Depart</b></label><span><b>$board > $alight</b></span></p>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Date  </b></label><span>$schedule_date</span></p>
                <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Time  </b></label><span>$depar_time</span></p>";

                if($_SESSION['return_date'] != null)
                {
                    $mail->Body .= "<p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Return</b></label><span><b>$board_return > $alight_return</b></span></p>
                                    <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Date  </b></label><span>$schedule_date_return</span></p>
                                    <p><label style='float:left; text-align:left; margin-left:15px; width: 120px;'><b>Time  </b></label><span>$depar_time_return</span></p>";
                }
            
    $mail->Body .= "</div>

            <div style='float:left; width:99%; border-bottom:1px solid black;'>
                <div style='float:left; width:50%;'>
                    <h4 style='text-align:center; margin:5px 1px 5px 1px;'>Passenger</h4>
                    <div style='display:flex;'>
                        <div style='font-weight: 350; margin-left:10px; width:50%'>Name</div>
                        <div style='font-weight: 350; margin-left:10px; width:50%'>Seat No.</div>
                    </div>
    
                    ";
                    
                        for($i=0;$i<count($_SESSION['user_fullname']);$i++)
                        {
                            $userName = $_SESSION['user_fullname'][$i];
                            $seatNum = $_SESSION['bus_no'][$i];

                            $mail->Body .= "<div style='display:flex;'>
                                            <div style='margin-left:10px; width:40%; padding: 3px;'>$userName</div>
                                            <div style='margin-left:10px; width:40%; text-align: center;'>$seatNum</div>
                                            </div>";

                            if($_SESSION['return_date'] != null)
                            {
                                $seatNumReturn = $_SESSION['return_bus_no'][$i];

                                $mail->Body .= "<div style='display:flex;'>
                                                <div style='margin-left:10px; width:40%; padding: 3px;'>$userName</div>
                                                <div style='margin-left:10px; width:40%; text-align: center;'>$seatNumReturn</div>
                                                </div>";
                            }
                        }
                        
                    
                    
                $mail->Body .="</div>
    
                <div style='float:left; width:50%;'>
                    <h4 style='text-align:center; margin:5px 1px 5px 1px;'>Fare Details</h4>
                    <div style='display:flex;'>
                        <div style='width:50%; padding: 3px;'>Ticket Departure</div>
                      <div>RM $total_departure</div>
                    </div>";

                    if(isset($_SESSION['return_date']))
                    {
                            
                        $mail->Body .="<div style='display:flex;'>
                                    <div style='width:50%; padding: 3px;'>Ticket Return</div>
                                    <div>RM $total_return</div>
                                </div>";
                            
                    }
    
                    $mail->Body .="<div style='display: flex;'>
                        <div style='width:50%; padding: 3px;'><b>Total </b></div>
                        <div>RM $total_pay</div>
                    </div>
                </div>
            </div>

            <div style='float:left; width: 99%; display: flex;'>
                <div style='padding:10px;font-weight: bold;'>Total Paid : </div>
                <div style='padding:10px;'>RM $total_pay</div>
            </div>
        </div>

        <div style='margin-top:20px; border:1px solid black; float:left; width:99%'>
            <div style='padding:10px;'>Paid Via :</div>
            <div style='margin-left:60px;display:flex;'>
                <div style='width:30%;font-weight:bold;'>$payment_method</div>
                <div style='font-weight:bold;'>RM $total_pay</div>
            </div>
        </div>

        <div style='margin-top:5px; float:left; width:100%'>
            <hr style='border-top: 2px dashed black;'/>
        </div>

       ";
            
            for($i=0;$i<count($_SESSION['bus_no']);$i++)
            {
                $seatNum = $_SESSION['bus_no'][$i];
                $userName = $_SESSION['user_fullname'][$i];
                $ticket++;

                $mail->Body .=
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

            if($_SESSION['return_date'] != null)
            {
                $mail->Body .= "<div style='margin-top:5px; float:left; width:70%; margin-bottom:10px;'><h3 style='margin:0;text-align: center;padding: 5px;'>Return Ticket</h3></div>";

                for($i=0;$i<count($_SESSION['bus_no']);$i++)
                {
                    $seatNum = $_SESSION['return_bus_no'][$i];
                    $userName = $_SESSION['user_fullname'][$i];
                    $ticket++;

                    $mail->Body .=
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

        $mail->Body .="</html>";

$mail->send();


$_SESSION['email_success'] = 1;

?>
