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
    <title>See all Page</title>
</head>
<body>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';   ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 


    
        <?php

            // check if the ID and title values are set
            
            if(isset($_SESSION['ID_see_all']) && isset($_SESSION['title_see_all'])) {
                // get the ID and title values from the URL
                $ID_see_all = $_SESSION['ID_see_all'];
                $title_see_all = $_SESSION['title_see_all'];
                $search_see_all = 1;
                $search_edit = 0;
                $edit_process = 0;

                if($title_see_all == "staff")
                {
                  //SQL codes
                  $sql_see = mysqli_query($conn, "SELECT admin_email_address, admin_id, admin_fullname, admin_username, admin_password, admin_pic, admin_level FROM admin WHERE admin_id = $ID_see_all");
                  $row_see = mysqli_fetch_assoc($sql_see);

                  //Check if admin have picture
                  if($row_see['admin_pic'] == NULL)
                  {
                    $picture_admin = "default picture.png";
                  }
                  else
                  {
                    $picture_admin = $row_see['admin_pic'];
                  }
                    
                  //include files
                    $staff="active";
                    $title ="See Staff / Admin details";
                    $admin_id = $ID_see_all;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once ('./staff/see all staff.php');
                    
                }  
                else if($title_see_all == "schedule") {

                  //SQL codes
                  $sql_see = mysqli_query($conn, "SELECT * FROM bus_schedule WHERE bus_schedule_id = $ID_see_all");
                  $row_see = mysqli_fetch_assoc($sql_see);


                  $float_time = $row_see['departure_time']; 
                  $arrival_time_float = $row_see['arrival_time']; 
                  //$hours = floor($float_time); // extract the integer part of the float
                  //$minutes = round(($float_time - $hours) * 60); // calculate the minutes from the decimal part
                  //$dep_time = sprintf("%02d:%02d", $hours, $minutes); // format the time as hh:mm
                  if ($float_time < 10) 
                  {
                    $time_parts = explode('.', $float_time);
                    $hours = intval($time_parts[0]);
                    $minutes = intval($time_parts[1]);
                    $dep_time = sprintf("%02d:%02d", $hours, $minutes);
                  }
                  else
                  {
                    $dep_time = number_format($float_time,2, ':', '');
                  }

                  if ($arrival_time_float < 10) 
                  {
                    $time_parts = explode('.', $arrival_time_float);
                    $hours = intval($time_parts[0]);
                    $minutes = intval($time_parts[1]);
                    $dep_time_arrival = sprintf("%02d:%02d", $hours, $minutes);
                  }
                  else
                  {
                    $dep_time_arrival = number_format($arrival_time_float,2, ':', '');
                  }

                    $bus_schedule="active";
                    $title ="See Bus Schedules details";
                    $bus_schedule_id = $ID_see_all;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once('./bus schedule/see all bus schedule.php');
                    
                }
                else if($title_see_all == "customer")
                {
                  //SQL codes
                  $sql_see = mysqli_query($conn, "SELECT user_id, user_fullname, user_contact_no, user_email_address, username, user_password, user_pic FROM user WHERE user_id = $ID_see_all");
                  $row_see = mysqli_fetch_assoc($sql_see);

                  //Check if admin have picture
                  if($row_see['user_pic'] == NULL)
                  {
                    $picture_cus = "default picture.png";
                  }
                  else
                  {
                    $picture_cus = $row_see['user_pic'];
                  }


                  $customer="active";
                  $title ="See Customer's details";
                  $cus_id = $ID_see_all;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./customer/see all customer.php');
                }
                else if($title_see_all == "driver")
                {
                  //SQL codes
                  $sql_see = mysqli_query($conn, "SELECT driver_id , driver_fullname, driver_contact_no, driver_licence_expiry_date, driver_email_address FROM driver WHERE driver_id = $ID_see_all");
                  $row_see = mysqli_fetch_assoc($sql_see);

                  $bus_driver="active";
                  $title ="See Driver's details";
                  $driver_see_id = $ID_see_all;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./driver/see all driver.php');
                }
                else if($title_see_all == "booking detail")
                {
                  //SQL codes
                  $sql_see = mysqli_query($conn, "SELECT * FROM payment WHERE payment_id = $ID_see_all");
                  $row_see = mysqli_fetch_assoc($sql_see);

                  $booking_details_id_database = $row_see['payment_id'];
                  $booking_details_user_id_database = $row_see['user_id'];
                  $booking_details_bus_schedule_id_database = $row_see['bus_schedule_id'];
                  $booking_details_return_status = $row_see['return_status'];

                  if($booking_details_return_status == 1)
                  {
                    $return_status_get = "Return";
                  }
                  else
                  {
                    $return_status_get = "Depart";
                  }


                  //Get User details
                  $get_user_details_sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $booking_details_user_id_database");
                  $row_user_details_sql = mysqli_fetch_assoc($get_user_details_sql);

                  //Get schedule details
                  $get_bus_schedule_details = mysqli_query($conn, "SELECT * FROM bus_schedule WHERE bus_schedule_id = $booking_details_bus_schedule_id_database");
                  $row_bus_schedule_details = mysqli_fetch_assoc($get_bus_schedule_details);

                  //Get rating details
                  $get_bus_rating_detailss = mysqli_query($conn, "SELECT * FROM rating WHERE user_id = $booking_details_user_id_database");
                  $row_bus_rating_detailss = mysqli_fetch_assoc($get_bus_rating_detailss);
                  
                  if ($row_bus_rating_detailss === null) {
                    // No data found for the user ID
                    $rating_points = ''; // Set default value to an empty string or handle it as needed
                } else {
                    $rating_points = $row_bus_rating_detailss['rating_point'];
                }



                  $float_time = $row_bus_schedule_details['departure_time']; 
                  $arrival_time_float = $row_bus_schedule_details['arrival_time']; 

                  if ($float_time < 10) 
                  {
                    $time_parts = explode('.', $float_time);
                    $hours = intval($time_parts[0]);
                    $minutes = intval($time_parts[1]);
                    $dep_time = sprintf("%02d:%02d", $hours, $minutes);
                  }
                  else
                  {
                    $dep_time = number_format($float_time,2, ':', '');
                  }

                  if ($arrival_time_float < 10) 
                  {
                    $time_parts = explode('.', $arrival_time_float);
                    $hours = intval($time_parts[0]);
                    $minutes = intval($time_parts[1]);
                    $dep_time_arrival = sprintf("%02d:%02d", $hours, $minutes);
                  }
                  else
                  {
                    $dep_time_arrival = number_format($arrival_time_float,2, ':', '');
                  }

                  $booking_detail="active";
                  $title ="Booking Details";
                  $booking_detail_see_id = $ID_see_all;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./booking details/see all booking detail.php');
                }

                
                
            }
            else if(!isset($_SESSION['ID_see_all']) && !isset($_SESSION['title_see_all']))
            {
              ?>
                <script>
                  Swal.fire({
                    title: 'Oops!',
                    html: 'It seems you are directly accessing this page. Please select a specific page and press <b>"See all"</b> button to view full details.',
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
            title: 'Are you sure you want to quit viewing this data?',
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
