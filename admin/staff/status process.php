
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
        $status_insert = "0";
        $sql_status = "UPDATE admin SET admin_status='$status_insert' WHERE admin_id='$status_id'";
    }
    else if($status_process === "deactive")
    {
        $status_insert = "1";
        $sql_status = "UPDATE admin SET admin_status='$status_insert' WHERE admin_id='$status_id'";
    }
    
   
    // Check for errors
    if ($conn->query($sql_status) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/staff.php');
    exit;
}
?>
