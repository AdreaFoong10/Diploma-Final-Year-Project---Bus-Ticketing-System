
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $operator_name_add = $_POST['name'];
    $operator_picture_add = $_POST['pic'];

    // Prepare the SQL statement
    
    if($operator_picture_add === "")
    {
        $sql = "INSERT INTO bus_operators (bus_operator_name) VALUES ('$operator_name_add')";
    }
    else
    {
        $sql = "INSERT INTO bus_operators (bus_operator_name, bus_operator_pic) VALUES ('$operator_name_add', '$operator_picture_add')";
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
    header('Location: /FYP/admin/bus operator.php');
    exit;
}
?>
