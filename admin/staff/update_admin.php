
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $admin_level_up = $_POST['level'];
    
    $admin_fullname_up = $_POST['fullname'];
    $admin_id_up = $_POST['id'];
    $admin_picture_up = $_POST['pic'];

    // Prepare the SQL statement
    if($admin_picture_up === "")
    {
        $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_level='$admin_level_up' WHERE admin_id='$admin_id_up'";
    }
    else
    {
        $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_level='$admin_level_up', admin_pic ='$admin_picture_up' WHERE admin_id='$admin_id_up'";
    }
   


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
