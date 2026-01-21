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
    <title>Add Page</title>
</head>
<body>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 


    
        <?php

            // check if the ID and title values are set
            
            if(isset($_SESSION['add']) && isset($_SESSION['title_add'])) {
                // get the ID and title values from the URL
                $title_add = $_SESSION['title_add'];
                $search_edit = 0;
                $search_see_all = 0;
                $edit_process = 0;
                $add_process = 1;
                $disallowedPattern = '/(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i';

                if($title_add == "staff")
                {
                    $sql_add_check = mysqli_query($conn, "SELECT admin_email_address, admin_fullname, admin_username FROM admin");

                    $staff="active";
                    $title ="Add Staff / Admin";
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once ('./staff/add staff.php');
                    
                }  
                else if($title_add == "schedule") {
                    

                    $bus_schedule="active";
                    $title ="Add Bus Schedules";
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once('./bus schedule/add bus schedule.php');
                    
                }
                else if($title_add == "bus_info")
                {
                  $sql_add_check = mysqli_query($conn, "SELECT bus_number_plate FROM bus");

                  $bus_information="active";
                  $title ="Add Bus Informations";
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./bus information/add bus information.php');
                }
                else if($title_add == "driver")
                {
                  $sql_add_check = mysqli_query($conn, "SELECT driver_fullname, driver_contact_no, driver_email_address FROM driver");

                  $bus_driver="active";
                  $title ="Add Bus Driver";
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./driver/add driver.php');
                }
                else if($title_add == "route")
                {
                  $sql_add_check = mysqli_query($conn, "SELECT starting_point, destination, driver_id  FROM route");

                  $bus_route="active";
                  $title ="Add Route";
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./route/add route.php');
                }
                else if($title_add == "bus operator")
                {
                  $sql_add_check = mysqli_query($conn, "SELECT bus_operator_name FROM bus_operators");

                  $bus_operator="active";
                  $title ="Add Bus Operators";
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./bus operator/add bus operator.php');
                }

                
                
            }
            else if(!isset($_SESSION['add']) && !isset($_SESSION['title_add']))
            {
              ?>
                <script>
                  Swal.fire({
                    title: 'Oops!',
                    html: 'It seems you are directly accessing this page. Please select the specific page and press <br><b>"Add"</b><br> button to Add your data.',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.history.back();
                    }
                  });
                </script>
              <?php
            }

            
       
       ?>
</body>
</html>

<script>
     $(document).ready(function(event) {
        
        $('#process-quit').on('click', function(event) {
            event.preventDefault();
            var href="";
            href = href_direct(event);
            
            Swal.fire({
            title: 'Are you sure you want to quit the Add Process?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
            icon: 'warning'
            }).then((result) => {
            if (result.isConfirmed) {
                
                window.location.href = href;
              
            }
            });
        });
    });

    function href_direct(event) {
  var href = '';
  if ($(".dash-href").is(event.target)) {
    href = '/FYP/admin/dashboard.php';
  } else if ($('.staff-href').is(event.target)) {
    href = '/FYP/admin/staff.php';
  } else if ($('.bus-href').is(event.target)) {
    href = '/FYP/admin/add new bus category.php';
  } else if ($('.bus-schedule-href').is(event.target)) {
    href = '/FYP/admin/bus schedule.php';
  } else if ($('.bus-operator-href').is(event.target)) {
    href = '/FYP/admin/bus operator.php';
  } else if ($('.bus-route-href').is(event.target)) {
    href = '/FYP/admin/bus route.php';
  } else if ($('.bus-driver-href').is(event.target)) {
    href = '/FYP/admin/bus driver.php';
  } else if ($('.bus-information-href').is(event.target)) {
    href = '/FYP/admin/bus information.php';
  } else if ($('.customer-href').is(event.target)) {
    href = '/FYP/admin/customer.php';
  } else if ($('.booking-detail-href').is(event.target)) {
    href = '/FYP/admin/booking detail.php';
  } else if ($('.setting-href').is(event.target)) {
    href = '/FYP/admin/profile setting.php';
  } else {
    href = "no found";
  }
  return href;
}



</script>
