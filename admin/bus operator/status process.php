
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 
    // Get the data sent via AJAX request
    $status_process = $_POST['status_p'];
    $status_id = $_POST['status_id'];

    // Prepare the SQL statement
    if($status_process === "active")
    {
        $status_insert = "1";
        $sql_status = "UPDATE bus_operators SET bus_operator_status='$status_insert' WHERE bus_operator_id='$status_id'";
        $sql_status_schedule = "UPDATE bus_schedule SET bus_schedule_status='$status_insert' WHERE bus_operator_id='$status_id'";
    }
    else if($status_process === "deactive")
    {
        $status_insert_schedule = "3";
        $status_insert = "0";
        $sql_status = "UPDATE bus_operators SET bus_operator_status='$status_insert' WHERE bus_operator_id='$status_id'";
        $sql_status_schedule = "UPDATE bus_schedule SET bus_schedule_status='$status_insert_schedule' WHERE bus_operator_id='$status_id'";
    }
    
   
    // Check for errors
    if ($conn->query($sql_status) === TRUE && $conn->query($sql_status_schedule) === TRUE) {
        
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/bus operator.php');
    exit;
}
?>
