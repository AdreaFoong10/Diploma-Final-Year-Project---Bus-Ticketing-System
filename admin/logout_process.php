
<?php

// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 
    // Get the data sent via AJAX request
    $admin_status_send = $_POST['admin_status'];

    if ($admin_status_send === "logout") {
        $_SESSION['admin_status'] = $_POST['admin_status'];
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
