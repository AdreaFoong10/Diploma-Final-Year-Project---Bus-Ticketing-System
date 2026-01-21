
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $date_add = $_POST['date'];
    $boarding_add = $_POST['boarding'];
    $alight_add = $_POST['alight'];
    $time_depart_add = $_POST['time_depart'];
    $time_arrival_add = $_POST['time_arrival'];
    $fare_add = $_POST['fare'];
    $route_id_add = $_POST['route_id'];
    $operator_id_add = $_POST['operator_id'];
    $duration_add = $_POST['duration'];
    $admin_id_up = $_POST['admin_id'];
    $bus_status_add = $_POST['bus_status'];
    $bus_gate_add = $_POST['bus_gate'];

    // Prepare the SQL statement
    $sql = "INSERT INTO bus_schedule (bus_schedule_date, boarding, alighting, departure_time, duration, arrival_time, fare,
    bus_schedule_status, bus_operator_id, route_id, admin_id, gate) VALUES ('$date_add', '$boarding_add', '$alight_add', '$time_depart_add', 
    '$duration_add', '$time_arrival_add', '$fare_add', '$bus_status_add', '$operator_id_add', '$route_id_add', '$admin_id_up', '$bus_gate_add')";
   


    // Check for errors
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/bus schedule.php');
    exit;
}
?>
