<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';
            $search_data_item = $_POST['search_data'];
    
            $sql_search_data = "SELECT * FROM admin WHERE admin_id like '%$search_data_item%' or admin_fullname like '%$search_data_item%' or
            admin_username like '%$search_data_item%'";
            $run_admin = mysqli_query($conn, $sql_search_data);
}
?>