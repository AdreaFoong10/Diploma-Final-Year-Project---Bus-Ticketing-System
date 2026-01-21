<?php
require 'includes/dbconnect.php';
session_start();
$user_id=$_SESSION['userid'];
$user_rating=$_POST['star'];
$bus_schedule_id=$_POST['bus_sche_id'];
$date=date("Y/m/d");
$booking_no=$_POST['booking_no'];

$query="INSERT INTO rating (rating_point, rate_datetime, bus_schedule_id, user_id, booking_no)
VALUES ($user_rating, '$date', $bus_schedule_id, $user_id,'$booking_no')";
 
mysqli_query($conn, $query);
header("location:new_order_history.php");
exit();

?>