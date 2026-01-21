<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';
require('fpdf185/fpdf.php');
$payment_get_id = $_GET['print_id'];

//SQL codes
$sql_print = mysqli_query($conn, "SELECT * FROM payment WHERE payment_id = $payment_get_id");
$row_print = mysqli_fetch_assoc($sql_print);


 $payment_id = $row_print['payment_id'];
 $total_pay = $row_print['total_pay'];
 $name_on_card = $row_print['name_on_card'];
 $name_on_seat = $row_print['name_on_seat'];
 $booking_no = $row_print['booking_no'];
 $return_status = $row_print['return_status'];
 $payment_method = $row_print['payment_method'];
 $contact_number = $row_print['contact_no'];
 $bus_seat_no = $row_print['bus_seat_no'];
 
 $payment_date =$row_print['payment_date'];
 $user_id = $row_print['user_id'];
 $bus_schedule_id = $row_print['bus_schedule_id'];
 $email_address = $row_print['email_address'];



if($return_status == 1)
{
  $return_status_get = "Return";
}
else
{
  $return_status_get = "Departure";
}




//Get User details
$get_user_details_sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id");
$row_user_details_sql = mysqli_fetch_assoc($get_user_details_sql);

$username = $row_user_details_sql['username'];
$fullname = $row_user_details_sql['user_fullname'];

//Get schedule details
$get_bus_schedule_details = mysqli_query($conn, "SELECT * FROM bus_schedule WHERE bus_schedule_id = $bus_schedule_id");
$row_bus_schedule_details = mysqli_fetch_assoc($get_bus_schedule_details);

$route = $row_bus_schedule_details['route_id'];

$float_time = $row_bus_schedule_details['departure_time']; 
$arrival_time_float = $row_bus_schedule_details['arrival_time']; 
$bus_schedule_date = $row_bus_schedule_details['bus_schedule_date']; 
$boarding = $row_bus_schedule_details['boarding']; 
$alighting = $row_bus_schedule_details['alighting']; 

if ($float_time < 10) 
{
  $time_parts = explode('.', $float_time);
  $hours = intval($time_parts[0]);
  $minutes = intval($time_parts[1]);
  $dep_time = sprintf("%02d:%02d", $hours, $minutes);
}
else
{
  $dep_time = number_format($float_time,2, ':', '');
}

if ($arrival_time_float < 10) 
{
  $time_parts = explode('.', $arrival_time_float);
  $hours = intval($time_parts[0]);
  $minutes = intval($time_parts[1]);
  $dep_time_arrival = sprintf("%02d:%02d", $hours, $minutes);
}
else
{
  $dep_time_arrival = number_format($arrival_time_float,2, ':', '');
}


//Get Route details
$get_route_details = mysqli_query($conn, "SELECT * FROM route WHERE route_id = $route");
$row_route_details = mysqli_fetch_assoc($get_route_details);

$starting_point = $row_route_details['starting_point'];
$destination = $row_route_details['destination'];




class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'COMETBus', 0, 1, 'C');
    }

    function CustomerDetails($booking_no, $payment_date,  $username, $contact_number, $email_address, $fullname)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Booking No: ' . $booking_no, 0, 1);
        $this->Cell(0, 10, 'Purchase Date: ' . $payment_date, 0, 1);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Receipt', 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Customer Details', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->Cell(40, 10, 'Username:', 0);
        $this->Cell(0, 10, $username, 0, 1);

        $this->Cell(40, 10, 'Fullname :', 0);
        $this->Cell(0, 10, $fullname, 0, 1);

        $this->Cell(40, 10, 'Phone No:', 0);
        $this->Cell(0, 10, $contact_number, 0, 1);

        $this->Cell(40, 10, 'Email Address:', 0);
        $this->Cell(0, 10, $email_address, 0, 1);
        
    }

    function FareDetails($total_pay, $return_status_get , $bus_schedule_date, $name_on_seat, $bus_seat_no, $payment_method, $boarding, $alighting, $dep_time_arrival, $dep_time, $starting_point, $destination)
    {
        $this->Cell(40, 10, 'Payment Method :', 0);
        $this->Cell(0, 10, $payment_method, 0, 1);

        $this->Cell(40, 10, 'Travel Type : ', 0);
        $this->Cell(0, 10, $return_status_get, 0, 1);

        $this->Cell(40, 10, 'Bus Schedule Date : ', 0);
        $this->Cell(0, 10, $bus_schedule_date, 0, 1);

        $this->Cell(40, 10, 'From : ', 0);
        $this->Cell(0, 10, $starting_point, 0, 1);

        $this->Cell(40, 10, 'To : ', 0);
        $this->Cell(0, 10, $destination, 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(40, 10, 'Sentral Location :', 0);
        $this->Cell(0, 10, $boarding . ' > ' . $alighting, 0, 1);

        $this->Cell(40, 10, 'Departure Time : ', 0);
        $this->Cell(0, 10, $dep_time, 0, 1);

        $this->Cell(40, 10, 'Arrival Time : ', 0);
        $this->Cell(0, 10, $dep_time_arrival, 0, 1);
        
    
        
    }

    function TotalPayment($total_pay)
        {
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(0, 10, 'Total Payment: RM ' . $total_pay . '(Including Departure and Return Fee if Applicable)', 0, 1);
        }
}
    // Create a new PDF instance
    $pdf = new PDF();
    
    // Set the document properties
    $pdf->SetTitle('CometBus Booking ID '. $booking_no);
    $pdf->SetAuthor('CometBus');
    
    // Add a new page
    $pdf->AddPage();
    
    // Set the font and size
    $pdf->SetFont('Arial', '', 10);
    
    // Set the customer details
    $pdf->CustomerDetails($booking_no, $payment_date,  $username, $contact_number, $email_address, $fullname);
    
    // Set the fare details
    $pdf->FareDetails($total_pay, $return_status_get, $bus_schedule_date, $name_on_seat, $bus_seat_no, $payment_method, $boarding, $alighting, $dep_time_arrival, $dep_time, $starting_point, $destination);
    
    // Set the total payment
    $pdf->TotalPayment($total_pay);
    
    // Output the PDF
    $pdf->Output('I', 'Booking_Details.pdf', 'A4');
?>