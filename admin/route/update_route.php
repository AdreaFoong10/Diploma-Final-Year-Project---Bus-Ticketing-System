
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $route_start_up = $_POST['start'];
    $route_des_up = $_POST['des'];
    $route_driverid_up = $_POST['driverid'];
    $route_id_up = $_POST['id'];

    // Prepare the SQL statement
    $sql = "UPDATE route SET starting_point='$route_start_up', destination='$route_des_up', 
    driver_id='$route_driverid_up' WHERE route_id='$route_id_up'";
   


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
    header('Location: /FYP/admin/bus route.php');
    exit;
}
?>
