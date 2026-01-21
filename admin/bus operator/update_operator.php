
<?php
// check if the request is coming from AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

    // Get the data sent via AJAX request
    $operator_name_up = $_POST['name'];
    $operator_id_up = $_POST['id'];
    $operator_picture_up = $_POST['pic'];

    // Prepare the SQL statement
    if($operator_picture_up === "")
    {
        $sql = "UPDATE bus_operators SET bus_operator_name='$operator_name_up' WHERE bus_operator_id='$operator_id_up'";
    }
    else
    {
        $sql = "UPDATE bus_operators SET bus_operator_name='$operator_name_up', bus_operator_pic='$operator_picture_up' WHERE bus_operator_id='$operator_id_up'";
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
