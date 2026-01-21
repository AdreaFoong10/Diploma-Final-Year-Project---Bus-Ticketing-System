
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $bus_info_num_plate_up = $_POST['num_plate'];
    $bus_info_num_route_up = $_POST['route'];
    $bus_info_num_schedule_up = $_POST['schedule'];
    $bus_info_id_up = $_POST['id'];
    $bus_info_driver_id_up = $_POST['driver_id'];

    // Prepare the SQL statement
    $sql = "UPDATE bus SET bus_number_plate='$bus_info_num_plate_up', 
    route_id='$bus_info_num_route_up', bus_schedule_id='$bus_info_num_schedule_up', driver_id='$bus_info_driver_id_up' WHERE bus_id='$bus_info_id_up'";
   
    $sql2 = "UPDATE bus_schedule SET route_id='$bus_info_num_route_up' WHERE bus_schedule_id='$bus_info_num_schedule_up'";

    // Check for errors
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/bus route.php');
    exit;
}
?>
