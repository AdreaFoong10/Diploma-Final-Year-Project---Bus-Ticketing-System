
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/FYP/admin/css/Default style.css?v=1">
    <link rel="stylesheet" href="/FYP/admin/css/style 2.css?v=1">
    <link rel="stylesheet" href="/FYP/admin/css/style 3.css?v=1">
    <title>Edit Page</title>
</head>
<body>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 


    
        <?php


    $ID_edit = $_POST['ID'];
    $title_edit = "staff";
    $search_edit = 1;
    
                

                if($title_edit == "staff")
                {
                    
                    $staff="active";
                    $title ="Edit Staff / Admin";
                    $admin_id = $ID_edit;
                    include $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    include ('./staff/edit staff.php');
                    
                }
            