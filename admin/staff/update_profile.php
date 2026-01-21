
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $admin_level_up = $_POST['level'];
    $admin_username_up = $_POST['username'];
    $admin_fullname_up = $_POST['fullname'];
    $admin_id_up = $_POST['id'];
    $admin_picture_up = $_POST['pic'];
    $admin_password_up = $_POST['password'];

    // Prepare the SQL statement
    if($admin_picture_up === "")
    {
        if($admin_password_up === "")
        {
            $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_username='$admin_username_up',
            admin_level='$admin_level_up' WHERE admin_id='$admin_id_up'";
        }
        else
        {
            $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_username='$admin_username_up',
            admin_level='$admin_level_up', admin_password='$admin_password_up' WHERE admin_id='$admin_id_up'";
        }
       
    }
    else
    {
        if($admin_password_up === "")
        {
        $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_username='$admin_username_up',
         admin_level='$admin_level_up', admin_pic ='$admin_picture_up' WHERE admin_id='$admin_id_up'";
        }
        else
        {
            $sql = "UPDATE admin SET admin_fullname='$admin_fullname_up', admin_username='$admin_username_up',
            admin_level='$admin_level_up', admin_pic ='$admin_picture_up', admin_password='$admin_password_up' WHERE admin_id='$admin_id_up'";
        }
    }

    
   


    // Check for errors
    if ($conn->query($sql) === TRUE) {
        $_SESSION["admin_user"] = $admin_username_up;
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => $conn->error));
    }

    // Close statement and connection

    $conn->close();
}
else
{
    header('Location: /FYP/admin/profile setting.php');
    exit;
}
?>
