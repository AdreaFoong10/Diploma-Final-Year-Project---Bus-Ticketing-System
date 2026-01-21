
<?php
include 'header.php';
include 'includes/dbconnect.php';

if(isset($_POST['viewticket']))
{
    $booking_no = $_POST['booking_no'];
    $bus_scheduleID=$_POST['bus_scheduleID'];
    $returnDate = 0;
}


    $get_data= "SELECT DISTINCT * FROM payment 
    INNER JOIN bus_schedule ON payment.bus_schedule_id = bus_schedule.bus_schedule_id 
    INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id 
    INNER JOIN user ON user.user_id ='".$_SESSION['userid']."' WHERE payment.user_id = '".$_SESSION['userid']."' AND payment.booking_no = '$booking_no';";

    $get_his = "SELECT * FROM payment 
    INNER JOIN bus_schedule ON payment.bus_schedule_id = bus_schedule.bus_schedule_id
    INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
    INNER JOIN user ON user.user_id ='".$_SESSION['userid']."' WHERE payment.user_id = '".$_SESSION['userid']."' AND payment.booking_no = '$booking_no';";
    $result = mysqli_query($conn, $get_his);

    while($row = mysqli_fetch_assoc($result))
    {
        $name_on_seat[]=$row['name_on_seat'];
        $bus_seat_no[]=$row['bus_seat_no'];
        $gate[]=$row['gate'];
        $total_pay[]=$row['total_pay'];
        $return_status[]=$row['return_status'];
        $fare[]=$row['fare'];
        for($i=0;$i<count($return_status);$i++)
        {
            if($return_status[$i]==1)
            {
                $returnDate=1;
                break;
            }
        }
        $bus_schedule_date[]=$row['bus_schedule_date'];
        $departure_time[]=$row['departure_time'];
        $boarding[]=$row['boarding'];
        $alighting[]=$row['alighting'];
        $operator_name[]=$row['bus_operator_name'];
        
    }


$result = mysqli_query($conn, $get_data);

while($row_his=mysqli_fetch_assoc($result)){
    $dates = $row_his['bus_schedule_date'];
    
    $datess = "SELECT DAY('$dates') AS DATE";
    $get_date = mysqli_query($conn, $datess);
    $run_date = mysqli_fetch_assoc($get_date);
    $date = $run_date['DATE'];

    $days = "SELECT DAYNAME('$dates') AS DAY";
    $get_day = mysqli_query($conn, $days);
    $run_day = mysqli_fetch_assoc($get_day);
    $day = $run_day['DAY'];

    $months = "SELECT MONTHNAME('$dates') AS MONTH";
    $get_month = mysqli_query($conn, $months);
    $run_month = mysqli_fetch_assoc($get_month);
    $month = $run_month['MONTH'];

    $years = "SELECT YEAR('$dates') AS YEAR";
    $get_year = mysqli_query($conn, $years);
    $run_year = mysqli_fetch_assoc($get_year);
    $year = $run_year['YEAR'];

    $bus_schedule_id = $row_his['bus_schedule_id'];
    $dep_time = $row_his['departure_time'];
    //$boarding = $row_his['boarding'];
    $payment_method = $row_his['payment_method'];
    $seat = $row_his['bus_seat_no'];
    $total = $row_his['total_pay'];
    $name = $row_his['user_fullname'];
    $contact_no=$row_his['user_contact_no'];
    $email_address=$row_his['user_email_address'];
    $bus_operators = $row_his['bus_operator_name'];
    //$alighting = $row_his['alighting'];
    $booking_no=$row_his['booking_no'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
    function downloadticket()
    {
        const element=document.getElementById("ticket");
        const opt = {
            margin: [20, 10, 20, 10], 
        };
        html2pdf().set(opt).from(element).save();
        
    }
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <style>
        table{
            border:1px solid black;
            border-collapse:collapse;
            margin:auto;
            width:95%;
        }
        th{
            border:1px solid black;
        }

        th,td{
            padding:20px;
        }
        
        .margin_left{
            margin-left:200px;
        }

        .downloadbtn{
            width: 35%;
            padding: 10px;
            cursor: pointer;
            display: block;
            margin: auto;
            outline: 0;
            transition: 0.3s;
            color:white;
            box-shadow: 2px 2px 0 0 grey;
            margin-left:375px;
            background:#4285f4;
            border:1px solid #4285f4;
            color:white;
        }

        .downloadbtn:hover{
            background:#1669F2;
            border:1px solid #1669F2;
            box-shadow: 0 0 6px #4285f4;
        }
        
    </style>
</head>
<body>
    <br>
<div id="ticket">
<table>
    <tr><th>Customer Details</th></tr>
    <tr><td>Name: <span class="margin_left"><?php echo $name; ?></span></td></tr>
    <tr><td>Phone No: <span style="margin-left:170px;"><?php echo $contact_no; ?></span></td></tr>
    <tr><td>Email Address: <span style="margin-left:140px;"><?php echo $email_address; ?></span></td></tr>
</table>
<br>
<table style='page-break-after: always;'>
            <tr><td>Depart <span style="margin-left:5px;"><?php echo $boarding[0]; ?> > <?php echo $alighting[0] ?></span></td></tr>
            <tr><td>Date <span style="margin-left:215px;"><?php echo $bus_schedule_date[0] ?></span></td></tr>
            <tr><td>Time <span style="margin-left:210px;"><?php echo  $departure_time[0] ?></span></td></tr>
            <?php
            if($returnDate == 1)  
            {
                echo "<tr><td>Return <span style='margin-left:5px;'>$boarding[1] > $alighting[1] </span><td></tr>";
                echo "<tr><td>Date <span style='margin-left:215px;'>$bus_schedule_date[1] </span><td></tr>";
                echo "<tr><td>Time <span style='margin-left:215px;'> $departure_time[1] </span><td></tr>";
            }
            ?>

            <tr>
                <th>Passenger</th>
                <th colspan="2">Fare Details</th>            
            </tr>
            
            <tr>
                <th>Name</th>
                <th>Seat No.</th>
                <th>Total Price</th>
            </tr>
            <?php
            $total_paid=0;
            for($i=0;$i<count($name_on_seat);$i++)
            {
                $userName = $name_on_seat[$i];
                $seatNum =  $bus_seat_no[$i];
                echo "<tr>";
                echo "<td>$userName</td>";
                echo "<td>$seatNum</td>";
                echo "<td>RM $fare[$i]</td>";
                echo "</tr>";
                $total_paid+=$fare[$i];
            }
            ?>
            <tr><th colspan="3" style="text-align:left;">Total Paid :   RM <?php echo $total_paid; ?></th></tr>      
</table>


<?php
    $count=0;
for ($i = 0; $i < count($name_on_seat); $i++) 
{
    $count = $count + 1;
    $userName = $name_on_seat[$i];
    $seatNum =  $bus_seat_no[$i];
    echo "<br>";
    echo "<table style='page-break-after: always;'>";
    echo "<tr><th colspan='3'>Ticket $count</th></tr>";
    echo "<tr><td colspan='3'>FROM: $boarding[$i]</td></tr>";
    echo "<tr><td colspan='3'>TO: $alighting[$i]</td></tr>";
    echo "<tr><td colspan='3'><hr style='margin:5px;'></td></tr>";
    echo "<tr><td width='150px'>$bus_schedule_date[$i]</td><td style='width:0px;' rowspan='2'><div style='border: 2px solid black;
    height: 100px; width:0px; padding:0px; margin:0px;'></div></td>
    <td>$operator_name[$i]</td></tr>";
    echo "<tr><td width='150px'> $departure_time[$i]</td><td>Booking Number: $booking_no</td></tr>";
    echo "<tr><td colspan='3'><hr style='margin:5px;'></td></tr>";
    echo "<tr><td width='150px'>Gate No.$gate[$i]</td><td style='width:0px;' rowspan='2'><div style='border: 2px solid black;
    height: 100px; width:0px; padding:0px; margin:0px;'></div><td>Seat No. $seatNum</td></tr>";
    echo "<tr><td width='150px'></td><td>$userName</td></tr>";
   
    echo "</table>";
}


?>
</div>
<br><br>
<div style="margin-left:9.5%;">
<button onclick="downloadticket()" class="downloadbtn" style="font-size:15px; padding-left:15px; padding-right:15px; padding-top:6px; padding-bottom:6px;">Download</button>
</div>
<br><br>
</body>

</html>
<?php
include 'footer.php';
?>



