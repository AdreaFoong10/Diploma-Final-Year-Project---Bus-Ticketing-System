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
    <title>Edit Page</title>
</head>
<body>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 


    
        <?php

            // check if the ID and title values are set
            
            if(isset($_SESSION['ID_edit']) && isset($_SESSION['title'])) {
                // get the ID and title values from the URL
                $ID_edit = $_SESSION['ID_edit'];
                $title_edit = $_SESSION['title'];
                $search_edit = 1;
                

                if($title_edit == "staff")
                {
                    
                    $staff="active";
                    $title ="Edit Staff / Admin";
                    $admin_id = $ID_edit;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once ('./staff/edit staff.php');
                    
                }  
                else if($title_edit == "schedule") {
                    $bus_schedule="active";
                    $title ="Edit Bus Schedules";
                    $bus_schedule_id = $ID_edit;
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php';
                    require_once('./bus schedule/edit bus schedule.php');
                    
                }

            } 

            
       
       ?>
</body>
</html>
<?php session_destroy(); ?>
<script>
  window.addEventListener("DOMContentLoaded", function() {
    var editProcessQuitLinks = document.querySelectorAll(".edit-process-quit");
    editProcessQuitLinks.forEach(function(link) {
      link.addEventListener("click", function(event) {
        var href = href_direct(event);
        event.preventDefault();
        Swal.fire({
          title: "Are you sure you want to quit the Edit Process?",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "Cancel",
          icon: "warning",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = href;
          }
        });
      });
    });
  });

  function href_direct(event) {
    var href = "";
    if (event.target.id === "dash-href") {
      href = "/FYP/admin/dashboard.php";
    } else if (event.target.id === "staff-href") {
      href = "/FYP/admin/staff.php";
    } else if (event.target.id === "bus-href") {
      href = "/FYP/admin/add new bus category.php";
    } else if (event.target.id === "bus-schedule-href") {
      href = "/FYP/admin/bus schedule.php";
    } else if (event.target.id === "bus-operator-href") {
      href = "/FYP/admin/bus operator.php";
    } else if (event.target.id === "bus-route-href") {
      href = "/FYP/admin/bus route.php";
    } else if (event.target.id === "bus-driver-href") {
      href = "/FYP/admin/bus driver.php";
    } else if (event.target.id === "bus-information-href") {
      href = "/FYP/admin/bus information.php";
    } else if (event.target.id === "customer-href") {
      href = "/FYP/admin/customer.php";
    } else if (event.target.id === "booking-detail-href") {
      href = "/FYP/admin/booking detail.php";
    } else if (event.target.id === "setting-href") {
      href = "/FYP/admin/profile setting.php";
    }
    return href;
  }
</script>
