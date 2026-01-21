<?php
session_start();

?>
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
  <title>logout process</title>

</head>
<body>
    <!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';  
    if(isset($_POST['admin_status']))
    {
        $admin_status_login = $_POST['admin_status'];
        if($admin_status_login == "logout")
        {
 
            // Destroy the session
            session_unset();
            session_destroy();

            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Logged Out",
                text: "You have been successfully logged out.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
              }).then((result) => {

                if (result.isConfirmed) {
                  window.location.href = "/FYP/login.signup/login.signup.php";
                }
              }); 
            </script>';
        }
    }
?>

  
</body>
</html>



