<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';




/*if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password";
    }
}*/




    $_SESSION['username'] = 'test';
    $password = "test_pass";
    $admin_status = "login";

    if($_SESSION['username'] == 'test')
    {
        header("Location: /FYP/admin/dashboard.php");
    }
?>

