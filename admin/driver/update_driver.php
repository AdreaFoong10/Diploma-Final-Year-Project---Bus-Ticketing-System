
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $driver_email_up = $_POST['email'];
    $driver_contact_up = $_POST['contact'];
    $driver_fullname_up = $_POST['fullname'];
    $driver_id_up = $_POST['id'];
    $driver_license_up = $_POST['license'];

    // Prepare the SQL statement
    $sql = "UPDATE driver SET driver_fullname='$driver_fullname_up', driver_contact_no='$driver_contact_up', driver_licence_expiry_date='$driver_license_up',
     driver_email_address ='$driver_email_up' WHERE driver_id='$driver_id_up'";
   


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
    header('Location: /FYP/admin/bus driver.php');
    exit;
}
?>
