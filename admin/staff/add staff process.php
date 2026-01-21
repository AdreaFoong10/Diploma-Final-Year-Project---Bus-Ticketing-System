
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $admin_level_add = $_POST['level'];
    $admin_username_add = $_POST['username'];
    $admin_fullname_add = $_POST['fullname'];
    $admin_picture_add = $_POST['pic'];
    $admin_password_add = $_POST['pass'];
    $admin_email_address = $_POST['email'];

    // Prepare the SQL statement

    $sql = "INSERT INTO admin (admin_fullname, admin_username, admin_email_address, admin_level, admin_pic, admin_password) VALUES ('$admin_fullname_add', '$admin_username_add', '$admin_email_address', '$admin_level_add', '$admin_picture_add', '$admin_password_add')";
   


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
    header('Location: /FYP/admin/staff.php');
    exit;
}
?>
