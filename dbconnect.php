<?php

$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="bus_ticket_booking_system";
$conn=mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);


if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>