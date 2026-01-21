
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $bus_info_num_plate_add = $_POST['num_plate'];
    $bus_info_num_route_add = $_POST['route'];
    $bus_info_num_schedule_add = $_POST['schedule'];
    $bus_info_num_driver_id_add = $_POST['driver_id'];

    // Prepare the SQL statement

    $sql = "INSERT INTO bus (bus_number_plate, route_id , bus_schedule_id, driver_id) VALUES
     ('$bus_info_num_plate_add', '$bus_info_num_route_add', '$bus_info_num_schedule_add', '$bus_info_num_driver_id_add')";
   
   $sql2 = "UPDATE bus_schedule SET route_id='$bus_info_num_route_add' WHERE bus_schedule_id='$bus_info_num_schedule_add'";

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
    header('Location: /FYP/admin/bus information.php');
    exit;
}
?>
