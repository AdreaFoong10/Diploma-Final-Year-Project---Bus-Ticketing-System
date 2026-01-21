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
    <title>Edit Page</title>
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
            
            if(isset($_SESSION['ID_edit']) && isset($_SESSION['title'])) {
                // get the ID and title values from the URL
                $ID_edit = $_SESSION['ID_edit'];
                $title_edit = $_SESSION['title'];
                $search_edit = 1;
                $search_see_all = 0;
                $disallowedPattern = '/(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i';

                $edit_process = 0;  //Not sure what is this
                $alert_process = 0; //Don't no if been used
                $add_process = 0;

                if($title_edit == "staff")
                {
                    //SQL codes
                    $sql_edit = mysqli_query($conn, "SELECT admin_email_address, admin_id, admin_fullname, admin_username, admin_password, admin_pic, admin_level FROM admin WHERE admin_id = $ID_edit");
                    $row_edit = mysqli_fetch_assoc($sql_edit);

                    //Check if admin have picture
                    if($row_edit['admin_pic'] == NULL)
                    {
                      $picture_admin = "default picture.png";
                    }
                    else
                    {
                      $picture_admin = $row_edit['admin_pic'];
                    }
                    $display_level = "";
                    if($row_edit['admin_level'] === "1")
                    {
                      $display_level="Admin";
                    }
                    else if($row_edit['admin_level'] === "2")
                    {
                      $display_level="SuperAdmin";
                    }

                    //include pages
                    $staff="active";
                    $title ="Edit Staff / Admin";
                    $admin_id = $ID_edit;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once ('./staff/edit staff.php');
                    
                }  
                else if($title_edit == "schedule") {
                  $sql_edit = mysqli_query($conn, "SELECT bus_schedule_id , bus_schedule_date, boarding, alighting, departure_time, duration, arrival_time, fare 
                  , bus_operator_id, route_id, gate FROM bus_schedule WHERE bus_schedule_id = $ID_edit");
                  $row_edit = mysqli_fetch_assoc($sql_edit);

                  $float_time = $row_edit['departure_time']; 
                  $arrival_time_float = $row_edit['arrival_time']; 
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
                    $title ="Edit Bus Schedules";
                    $bus_schedule_id = $ID_edit;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once('./bus schedule/edit bus schedule.php');
                    
                }
                else if($title_edit == "driver")
                {
                  $sql_edit = mysqli_query($conn, "SELECT driver_id, driver_fullname, driver_contact_no, driver_licence_expiry_date, driver_email_address FROM driver WHERE driver_id = $ID_edit");
                  $row_edit = mysqli_fetch_assoc($sql_edit);

                  $bus_driver="active";
                  $title ="Edit Bus Driver";
                  $bus_driver_id = $ID_edit;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./driver/edit driver.php');
                }
                else if($title_edit == "bus operator")
                {
                  $sql_edit = mysqli_query($conn, "SELECT bus_operator_id, bus_operator_name, bus_operator_pic FROM bus_operators WHERE bus_operator_id = $ID_edit");
                  $row_edit = mysqli_fetch_assoc($sql_edit);

                  if($row_edit['bus_operator_pic'] == NULL)
                  {
                    $picture_operator = "default picture.png";
                  }
                  else
                  {
                     $picture_operator = $row_edit['bus_operator_pic'];
                  }


                  $bus_operator="active";
                  $title ="Edit Bus Operator";
                  $bus_operator_id = $ID_edit;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./bus operator/edit bus operator.php');
                }
                /*else if($title_edit == "route")
                {
                  $sql_edit = mysqli_query($conn, "SELECT route_id, starting_point, destination, driver_id FROM route WHERE route_id = $ID_edit");
                  $row_edit = mysqli_fetch_assoc($sql_edit);
                  $driver_fullname_id = $row_edit['driver_id'];

                  $sql_edit_driver_fullname = mysqli_query($conn, "SELECT driver_fullname FROM driver WHERE driver_id = $driver_fullname_id");
                  $row_edit_driver_fullname = mysqli_fetch_assoc($sql_edit_driver_fullname);


                  $bus_route="active";
                  $title ="Edit Bus Route";
                  $bus_route_id = $ID_edit;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./route/edit route.php');
                }*/
                else if($title_edit == "bus_info")
                {
                  $sql_edit = mysqli_query($conn, "SELECT bus_id, bus_number_plate, route_id , bus_schedule_id, driver_id  FROM bus WHERE bus_id = $ID_edit");
                  $row_edit = mysqli_fetch_assoc($sql_edit);
                  $get_bus_schedule_id_database = $row_edit['bus_schedule_id'];
                  $get_bus_route_id_database = $row_edit['route_id'];
                  $get_driver_id_database = $row_edit['driver_id'];

                  $sql_getfrom_schedule = mysqli_query($conn, "SELECT boarding, alighting FROM bus_schedule WHERE bus_schedule_id = $get_bus_schedule_id_database");
                  $row_sql_getfrom_schedule = mysqli_fetch_assoc($sql_getfrom_schedule);

                  $sql_getfrom_route = mysqli_query($conn, "SELECT starting_point, destination FROM route WHERE route_id = $get_bus_route_id_database");
                  $row_sql_getfrom_route = mysqli_fetch_assoc($sql_getfrom_route);

                  $sql_getfrom_driver = mysqli_query($conn, "SELECT driver_fullname FROM driver WHERE driver_id = $get_driver_id_database");
                  $row_sql_getfrom_driver = mysqli_fetch_assoc($sql_getfrom_driver);

                  $bus_information="active";
                  $title ="Edit Bus Information";
                  $bus_info_id = $ID_edit;
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                  require_once('./bus information/edit bus information.php');
                }

                
                
            }
            else if(!isset($_SESSION['ID_edit']) && !isset($_SESSION['title']))
            {
              ?>
                <script>
                  Swal.fire({
                    title: 'Oops!',
                    html: 'It seems you are directly accessing this page. Please select the specific page and press <b>"Edit"</b> button to edit its details.',
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
            title: 'Are you sure you want to quit the Edit Process?',
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
    href = "not found";
  }
  return href;
}



</script>
