
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $date_up = $_POST['date'];
    $boarding_up = $_POST['boarding'];
    $alight_up = $_POST['alight'];
    $time_depart_up = $_POST['time_depart'];
    $time_arrival_up = $_POST['time_arrival'];
    $fare_up = $_POST['fare'];
    $bus_gate_up = $_POST['bus_gate'];
    $route_id_up = $_POST['route_id'];
    $operator_id_up = $_POST['operator_id'];
    $id_up = $_POST['id'];
    $duration_up = $_POST['duration'];

    // Prepare the SQL statement
    $sql = "UPDATE bus_schedule SET bus_schedule_date='$date_up', boarding='$boarding_up', 
    alighting='$alight_up', departure_time='$time_depart_up', arrival_time='$time_arrival_up', duration='$duration_up',
    fare='$fare_up', bus_operator_id='$operator_id_up', route_id='$route_id_up', gate='$bus_gate_up' WHERE bus_schedule_id='$id_up'";

   


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
