
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 


    // Get the data sent via AJAX request
    $driver_email_add = $_POST['email'];
    $driver_contact_add = $_POST['contact'];
    $driver_fullname_add = $_POST['fullname'];
    $driver_license_add = $_POST['license'];

    // Prepare the SQL statement

    $sql = "INSERT INTO driver (driver_fullname, driver_contact_no , driver_licence_expiry_date, driver_email_address) VALUES
     ('$driver_fullname_add', '$driver_contact_add', '$driver_license_add', '$driver_email_add')";
   


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
