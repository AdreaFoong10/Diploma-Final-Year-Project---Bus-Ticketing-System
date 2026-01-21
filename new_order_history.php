<?php

    $previous_booking_no="";
    $a = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Order History</title>
    <style>
        ul{
            margin-top:15px;
        }
        .nav_bar{
            height:99px !important;
        }
        .adjust_position{
            margin-top:-3.5px;
        }

        .table_container{
            border: radius:1px solid #EDE8E1;
            background-color: #EDE8E1;
            border-radius:20px;
            padding-top:20px;
            padding-bottom:20px;
            padding-left:8px;
            padding-right:8px;
            width:75%;
            margin:auto;
            margin-bottom:20px;
        }

        td, th{
            border:2px solid #EDE8E1;
            padding:10px;
        }

        table{
            width:100%;
            
            margin:auto;
            background-color:white;
            border-collapse:collapse;
            border-radius:20px;
        }

        .content_padding_right{
            padding-right:10px;
            display:inline-block;
            padding-left:10px;
            font-size:15px;
        }

        .content_padding_right2{
            padding-right:60px;
            display:inline-block;
            padding-left:40px;
            font-size:15px;
        }

        .progress-label-left
        {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right
        {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .star-light
        {
	        color:#e9ecef;
        }

        .square_button{      
            width: 44px !important;
            height: 44px !important;
        }

        .link:hover{
            text-decoration:underline;
            color:rgba(255, 255, 255, 0.5);
        }

    </style>
</head>
<body>
<?php
include("header.php");
?>  

<h1 style="padding:20px; margin-left:165px;">My Trip</h1>

<?php
include("includes/dbconnect.php");
    
    $get_his = "SELECT * FROM payment 
    INNER JOIN bus_schedule ON payment.bus_schedule_id = bus_schedule.bus_schedule_id
    INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
    INNER JOIN user ON user.user_id ='".$_SESSION['userid']."' WHERE payment.user_id = '".$_SESSION['userid']."'
    ORDER BY payment_date DESC, payment.booking_no, bus_schedule.bus_schedule_date DESC;";


$run_his = mysqli_query($conn, $get_his);

$previous_booking_no = "";
$hasHistory = false;
$rateID=0;
echo "<script>var rateID=0</script>";
$a = 0;
$currentDateTime = date('Y-m-d H:i:s');

while($row_his = mysqli_fetch_assoc($run_his)){
    
    $booking_no = $row_his['booking_no'];
    $bs_dtime = $row_his['departure_time'];
    $returnStatus = $row_his['return_status'];

    $payment_datetime=$row_his['payment_date'];
    $formattedPaymentDateTime=date('y/m/d H:i:s', strtotime($payment_datetime));
    
    
    $bs_dtime_format = $bs_dtime;
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            
                                        $bs_dtime_format2 = number_format($bs_dtime_format,2, ':', '')."PM";
                            
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;

                                        $bs_dtime_format2 = number_format($bs_dtime_format,2, ':', '')."PM";
                            
                                    }
                                    
                                }
                                else 
                                {
                                    $bs_dtime_format2 = number_format($bs_dtime_format,2, ':', '')."AM";

                                }

    // if($booking_no != $previous_booking_no && $a>0) 
    // {
    //     echo "</div>";
    //     echo "<br><br>";
    // }

    if($booking_no != $previous_booking_no) 
    {
        if(($booking_no != $previous_booking_no) && $a>0)
        {
            $a = 0;
            echo "</div>";
        }
        
        $bus_schedule_id=$row_his['bus_schedule_id'];
        $a++;
        echo "<div id='upc' class='table_container'>";
        echo "<div style='width:935px; float:left;'>";
        echo "<span style='color:#777777; font-size:15px; padding-left:6px; display:inline;'>Booking No: $booking_no</span><br>";
        echo "<span style='color:#777777; font-size:15px; padding-left:6px; display:inline;'>Purchase Date: $formattedPaymentDateTime</span>";
        echo "</div>";
        echo "<form action='view_ticket.order_history.php' method='post'>";
        echo "<input type='hidden' value='$booking_no' name='booking_no'>";
        echo "<input type='hidden' value='$bus_schedule_id' name='bus_scheduleID'>";
        echo "<div style='display:inline;' >";
        echo "<img src='img/ticket-icon.png' style='width:35px; height:35px;'>";
        echo "<input name='viewticket' type='submit' style='font-size:14px; color:#777777; border:0px; background:transparent; cursor:pointer; ' value='View/Download Ticket'>";
        echo "</div>";
        echo "</form>";
        
        if($returnStatus == 0)
        {
            $user_id=$row_his['user_id'];
            $bus_schedule_id=$row_his['bus_schedule_id'];
            $fare=$row_his['fare'];
            $bookingNo=$row_his['booking_no'];
            $sqlrate="SELECT * FROM rating WHERE user_id='$user_id' AND bus_schedule_id='$bus_schedule_id' AND booking_no='$bookingNo';";
            $resultrate=mysqli_query($conn, $sqlrate);
            $num_row=mysqli_num_rows($resultrate);
            $givenTime=$row_his['departure_time'];
            $givenDate=$row_his['bus_schedule_date'];
            $givenTimeStr = sprintf("%02d:%02d:00", floor($givenTime), ($givenTime * 60) % 60);
            $givenDateTime = $givenDate . ' ' . $givenTimeStr;
            

            echo "<table>";
            echo "<tr>";
            echo "<td style='font-size:15px;'>";
            echo "<div style='display:inline-block; border:1px solid rgb(26,115,232); width:60px; font-size:13px; background:rgb(26,115,232); padding:-top:4px; padding:-bottom:4px; padding-left:4px; padding-right:4px; color:white;'>
            DEPART</div> ".$row_his['boarding']." > ".$row_his['alighting'];
            echo "</td>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Seat Number</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Fullname</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Payment Method</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Total</span></th>";
            
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:25%; font-size:15px;'>".$row_his['bus_schedule_date']."/".$bs_dtime_format2."<br>".$row_his['bus_operator_name']."</td>";
           
            echo "<td><div class='content_padding_right'>SEAT ".$row_his['bus_seat_no']."</div></td>";
            echo "<td><div class='content_padding_right'>".$row_his['user_fullname']."</div></td>";
            echo "<td><div class='content_padding_right'>".$row_his['payment_method']."</div></td>";
            echo "<td><div class='content_padding_right'>RM ".number_format((float)$fare, 2, '.', '')."</div></td>";
            echo "<form method='POST' action='comment.rate.php'>";
            if (strtotime($currentDateTime) > strtotime($givenDateTime))
            {
                if($num_row==0){
                    echo "<td><div class='content_padding_right'><button type='submit' name='add_review' id='$rateID' class='btn btn-primary add_review'>Rate</button></div></td>";
                    echo "<input type='hidden' name='bus_sche_id' value='$bus_schedule_id'>";
                    echo "<input type='hidden' name='booking_no' value='$bookingNo'>";
                }
            }
            echo "</form>";
            echo "</tr>";
            echo "</table>";
            
            
        }
        else if($returnStatus == 1)
        {
            $fare=$row_his['fare'];
            $user_id=$row_his['user_id'];
            $bus_schedule_id=$row_his['bus_schedule_id'];
            $bookingNo=$row_his['booking_no'];
            $sqlrate="SELECT * FROM rating WHERE user_id='$user_id' AND bus_schedule_id='$bus_schedule_id' AND booking_no='$bookingNo';";
            $resultrate=mysqli_query($conn, $sqlrate);
            $num_row=mysqli_num_rows($resultrate);

            $givenTime=$row_his['departure_time'];
            $givenDate=$row_his['bus_schedule_date'];
            $givenTimeStr = sprintf("%02d:%02d:00", floor($givenTime), ($givenTime * 60) % 60);
            $givenDateTime = $givenDate . ' ' . $givenTimeStr;
            
            echo "<table>";
            echo "<tr>";
            echo "<td style='font-size:15px;'>";
            echo "<div style='display:inline-block; border:1px solid rgb(26,115,232); width:60px; font-size:13px; background:rgb(26,115,232); padding:-top:4px; padding:-bottom:4px; padding-left:4px; padding-right:4px; color:white;'>
            RETURN</div> ".$row_his['boarding']." > ".$row_his['alighting'];
            echo "</td>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Seat Number</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Fullname</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Payment Method</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Total</span></th>";
            
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:25%; font-size:15px;'>".$row_his['bus_schedule_date']."/".$bs_dtime_format2."<br>".$row_his['bus_operator_name']."</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>SEAT ".$row_his['bus_seat_no']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>".$row_his['user_fullname']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>".$row_his['payment_method']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>RM ".number_format((float)$fare, 2, '.', '')."</div>";
            echo "</td>";
            echo "<form method='POST' action='comment.rate.php'>";
            if (strtotime($currentDateTime) > strtotime($givenDateTime)){
                if($num_row==0){
                    echo "<td><div class='content_padding_right'><button type='submit' name='add_review' id='$rateID' class='btn btn-primary add_review'>Rate</button></div></td>";
                    echo "<input type='hidden' name='bus_sche_id' value='$bus_schedule_id'>";
                    echo "<input type='hidden' name='booking_no' value='$bookingNo'>";
                }
            }
            echo "</form>";
           
            echo "</tr>";
            echo "</table>";
            
        }


        // $hasHistory = true;
        $previous_booking_no = $booking_no;
    }
    else
    {
        if($returnStatus == 0)
        {
            $fare=$row_his['fare'];
            $user_id=$row_his['user_id'];
            $bus_schedule_id=$row_his['bus_schedule_id'];
            $bookingNo=$row_his['booking_no'];
            $sqlrate="SELECT * FROM rating WHERE user_id='$user_id' AND bus_schedule_id='$bus_schedule_id' AND booking_no='$bookingNo';";
            $resultrate=mysqli_query($conn, $sqlrate);
            $num_row=mysqli_num_rows($resultrate);

            $givenTime=$row_his['departure_time'];
            $givenDate=$row_his['bus_schedule_date'];
            $givenTimeStr = sprintf("%02d:%02d:00", floor($givenTime), ($givenTime * 60) % 60);
            $givenDateTime = $givenDate . ' ' . $givenTimeStr;
            

            
            echo "<table>";
            echo "<tr>";
            echo "<td style='font-size:15px;'>";
            echo "<div style='display:inline-block; border:1px solid rgb(26,115,232); width:60px; font-size:13px; background:rgb(26,115,232); padding:-top:4px; padding:-bottom:4px; padding-left:4px; padding-rightL4px; color:white;'>
            DEPART</div> ".$row_his['boarding']." > ".$row_his['alighting'];
            echo "</td>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Seat Number</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Fullname</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Payment Method</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Total</span></th>";
            
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:25%; font-size:15px;'>".$row_his['bus_schedule_date']."/".$bs_dtime_format2."<br>".$row_his['bus_operator_name']."</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>SEAT ".$row_his['bus_seat_no']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>".$row_his['user_fullname']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>".$row_his['payment_method']."</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='content_padding_right'>RM ".number_format((float)$fare, 2, '.', '')."</div>";
            echo "</td>";
            echo "<form method='POST' action='comment.rate.php'>";
            if (strtotime($currentDateTime) > strtotime($givenDateTime)){
                if($num_row==0){
                    echo "<td><div class='content_padding_right'><button type='submit' name='add_review' id='$rateID' class='btn btn-primary add_review'>Rate</button></div></td>";
                    echo "<input type='hidden' name='bus_sche_id' value='$bus_schedule_id'>";
                    echo "<input type='hidden' name='booking_no' value='$bookingNo'>";
                }
            }
            echo "</form>";
            
            echo "</tr>";
            echo "</table>";
            
        }
        else if($returnStatus == 1)
        {
            $fare=$row_his['fare'];
            $user_id=$row_his['user_id'];
            $bus_schedule_id=$row_his['bus_schedule_id'];
            $bookingNo=$row_his['booking_no'];
            $sqlrate="SELECT * FROM rating WHERE user_id='$user_id' AND bus_schedule_id='$bus_schedule_id' AND booking_no='$bookingNo';";
            $resultrate=mysqli_query($conn, $sqlrate);
            $num_row=mysqli_num_rows($resultrate);

            $givenTime=$row_his['departure_time'];
            $givenDate=$row_his['bus_schedule_date'];
            $givenTimeStr = sprintf("%02d:%02d:00", floor($givenTime), ($givenTime * 60) % 60);
            $givenDateTime = $givenDate . ' ' . $givenTimeStr;
            


            echo "<table>";
            echo "<tr>";
            echo "<td style='font-size:15px;'>";
            echo "<div style='display:inline-block; border:1px solid rgb(26,115,232); width:60px; font-size:13px; background:rgb(26,115,232); padding:-top:4px; padding:-bottom:4px; padding-left:4px; padding-rightL4px; color:white;'>
            RETURN</div> ".$row_his['boarding']." > ".$row_his['alighting'];
            echo "</td>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Seat Number</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; color:#777777;'>Fullname</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Payment Method</span></th>";
            echo "<th><span class='content_padding_right2' style='font-size:13px; padding-left:30px; color:#777777;'>Total</span></th>";
            
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:25%; font-size:15px;'>".$row_his['bus_schedule_date']."/".$bs_dtime_format2."<br>".$row_his['bus_operator_name']."</td>";
            
            echo "<td><div class='content_padding_right'>SEAT ".$row_his['bus_seat_no']."</div></td>";
            echo "<td><div class='content_padding_right'>".$row_his['user_fullname']."</div></td>";
            echo "<td><div class='content_padding_right'>".$row_his['payment_method']."</div></td>";
            echo "<td><div class='content_padding_right'>RM ".number_format((float)$fare, 2, '.', '')."</div></td>";
            echo "<form method='POST' action='comment.rate.php'>";
            if (strtotime($currentDateTime) > strtotime($givenDateTime)){
                if($num_row==0){
                    echo "<td><div class='content_padding_right'><button type='submit' name='add_review' id='$rateID' class='btn btn-primary add_review'>Rate</button></div></td>";
                    echo "<input type='hidden' name='bus_sche_id' value='$bus_schedule_id'>";
                    echo "<input type='hidden' name='booking_no' value='$bookingNo'>";
                }
            }
            echo "</form>";
            echo "</tr>";
            echo "</table>";
            
        }

        $previous_booking_no = $booking_no;
    }

    echo "<br>";

}

?>

</div>

<?php echo "<br><br><br><br>"; ?>

</body>
</html>

<?php
    include ("footer.php");
?>