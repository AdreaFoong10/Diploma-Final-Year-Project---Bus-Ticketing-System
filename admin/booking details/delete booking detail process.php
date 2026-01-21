
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 
    // Get the data sent via AJAX request
    $booking_detail_id_del = $_POST['id_del'];
    $title_del = $_POST['title_del'];

    // Prepare the SQL statement
    $sql_del = "DELETE FROM payment where payment_id = $booking_detail_id_del";
   
    // Check for errors
    if ($conn->query($sql_del) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/booking detail.php');
    exit;
}
?>
