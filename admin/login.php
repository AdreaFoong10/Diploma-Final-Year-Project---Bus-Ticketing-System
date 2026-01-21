<?php session_start(); ?>
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
    <title>Admin login page</title>
</head>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 

    Name : <input type="text" name="admin_username" id="admin_username">
    password : <input type="text" name="admin_pass" id="admin_pass">
    <button class="log_in">Login</button>
</body>
</html>

