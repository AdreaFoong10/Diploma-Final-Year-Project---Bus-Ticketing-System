
<?php 
session_start();
$_SESSION['title']= NULL;
$_SESSION['ID_edit']= NULL;
$_SESSION['ID_see_all'] = NULL;
$_SESSION['title_see_all']= NULL;
$_SESSION['add'] = NULL;
$_SESSION['title_add'] = NULL;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/Default style.css?v=1">
    <link rel="stylesheet" href="css/style 2.css?v=1">
    <link rel="stylesheet" href="css/style 3.css?v=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';   ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $dashboard = "active"; ?>
<?php $title = "Dashboard"; ?>
<?php $search_edit = 0; ?>
<?php $search_see_all = 0; ?>
<?php $add_process = 0; ?>
<?php $search_profile =0; ?>
<?php 
    $cus_num=0;
    $staff_num=0;
    $schedule_num=0;
    $booking_num=0;

?>


<!-- SQL Database -->
<?php

    //Customers Database
    $get_cus = "SELECT user_id, user_fullname, username, user_email_address FROM user";
    $run_cus = mysqli_query($conn,$get_cus);
    $cus_num = mysqli_num_rows($run_cus);
    $get_last_cus = "SELECT user_id, user_fullname, username, user_email_address, user_contact_no, user_pic FROM user ORDER BY user_id DESC LIMIT 5";
    $run_last_cus = mysqli_query($conn,$get_last_cus);

    //Bus Schedule Database
    $get_schedule = "SELECT * FROM bus_schedule";
    $run_schedule = mysqli_query($conn,$get_schedule);
    $schedule_num = mysqli_num_rows($run_schedule);


    //Booking details Database
    $get_booking = "SELECT * FROM payment";
    $run_booking = mysqli_query($conn,$get_booking);
    $booking_num = mysqli_num_rows($run_booking);
    $get_last_booking = "SELECT * FROM payment ORDER BY payment_id DESC LIMIT 5";
    $run_last_booking = mysqli_query($conn,$get_last_booking);


    //Staff Database
    $get_admin = "SELECT admin_id, admin_fullname, admin_username, admin_level FROM admin";
    $run_admin = mysqli_query($conn,$get_admin);
    $staff_num = mysqli_num_rows($run_admin);
    
    //Graph Data 
    $query_graph = "SELECT YEAR(payment_date) AS payment_year, MONTH(payment_date) AS payment_month, SUM(total_pay) AS total_payment
    FROM payment
    GROUP BY payment_year, payment_month
    ORDER BY payment_year, payment_month ASC";
    /*$query_graph = "SELECT
    MONTH(payment_date) AS month,
    CASE
        WHEN COUNT(*) > 1 THEN MAX(total_pay)
        ELSE total_pay
    END AS total_payment
FROM payment
GROUP BY booking_no, month";*/

    $result_graph = $conn->query($query_graph);
    $check_booking_no ="";
    $check_month ="";
    $check_totalPayment = "";

    // Fetching data from the result set
    while ($row_graph = $result_graph->fetch_assoc()) {
        $month = $row_graph['payment_month'];
        $year = $row_graph['payment_year'];
        $totalPayment = $row_graph['total_payment'];

        $monthYear = $month . '-' . $year;

        $month_graph[] = $monthYear;
        $total_graph[] = $totalPayment;
        
        /*if($check_month === "")
        {
            $check_month = $month;
            $check_totalPayment = $totalPayment;
            
        }
        else if($check_month === $month)
        {
            $totalPayment = $totalPayment + $check_totalPayment;
            $check_month = $month;
            $check_totalPayment = $totalPayment;
            
            
        }
        else if($check_month != $month)
        {*/
            
            /*

            $monthName_check = date("F Y", mktime(0, 0, 0, $check_month, 1));
            $month_graph[] = $monthName_check;
            $total_graph[] = $check_totalPayment;
            $check_month = $month;
            $check_totalPayment = $totalPayment;*/

        //}
        
    }
   /* if ($check_month != "") {
        $monthName_check = date("F Y", mktime(0, 0, 0, $check_month, 1));
        $month_graph[] = $monthName_check;
        $total_graph[] = $check_totalPayment;
    }*/
    
?>
<body>
    <?php include('sidebar.php') ?> 


        <main>

            <div class="cards">

                <!-- Customers Box -->
                <div class="card-single">
                    <div>
                        <a href="customer.php">
                            <h1><?php echo $cus_num ?></h1>
                            <span>Customers</span>
                        </a>
                    </div>
                    <div>
                        <a href="customer.php"><span class="las la-users"></span></a>
                    </div>
                </div>

                <!-- Bus Schedule Box -->
                <div class="card-single">
                    <div>
                        <a href="bus schedule.php">
                            <h1><?php echo $schedule_num ?></h1>
                            <span>Bus Schedules</span>
                        </a>
                    </div>
                    <div>
                    <a href="bus schedule.php"><span class="las la-business-time"></span></a>
                    </div>
                </div>

                <!-- Booking Details Box -->
                <div class="card-single">
                    <div>
                        <a href="booking detail.php">
                            <h1><?php echo $booking_num ?></h1>
                            <span>Booking Details</span>
                        </a>
                    </div>
                    <div>
                    <a href="booking detail.php"><span class="las la-shopping-bag"></span></a>
                    </div>
                </div>

                <!-- Staff Box -->
                <div class="card-single">
                    <div>
                        <a href="../admin/staff.php">
                            <h1><?php echo $staff_num ?></h1>
                            <span>Staffs</span>
                        </a>
                    </div>
                    <div>
                        <span class="las la-users-cog"></span>
                    </div>
                </div>

            </div>

            <!-- Graph -->
            
            <div class="card">
                
                <div class="grid-graph">
                    
                    <canvas id="myChart" style="height: 430px;"></canvas>
                    
                </div>
                <div class="card-header">
                    <a href="print montly.php"><button >Download Montly Revenue</button></a>
                </div>
            </div>
            
            <!-- Table for Recent Bookings -->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Booking</h3>

                            <a href="booking detail.php"><button>See all <span class="las la-arrow-right"></span>
                            </button></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Username</td>
                                            <td>Contact Number</td>
                                            <td>Total Payment</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row_last_booking = mysqli_fetch_assoc($run_last_booking))
                                        {
                                            $total = $row_last_booking['total_pay'];
                                            $contact_num = $row_last_booking['contact_no'];
                                            $user_id = $row_last_booking['user_id'];

                                            $get_booking_user = "SELECT * FROM user WHERE user_id= $user_id";
                                            $run_booking_user = mysqli_query($conn,$get_booking_user);
                                            $row_booking_user = mysqli_fetch_assoc($run_booking_user);

                                            $username = $row_booking_user['username'];
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $contact_num ?></td>
                                            <td>RM <?php echo $total ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

               <!-- Table for Customer (Can or need change later on) -->
                <div class="customers"> 
                    <div class="card">
                        <div class="card-header">
                            <h3>New customer</h3>

                            <button onclick="GO_cus()">See all <span class="las la-arrow-right"></span>
                            </button>
                        </div>

                        <div class="card-body">
                            <?php
                            while($row_last_cus = mysqli_fetch_assoc($run_last_cus))
                            {
                                $ID = $row_last_cus['user_id'];
                                $fullname = $row_last_cus['user_fullname'];
                                $usr_username = $row_last_cus['username'];
                                $usr_email = $row_last_cus['user_email_address'];
                                
                                $usr_contact_number = $row_last_cus['user_contact_no'];    
                                if($row_last_cus['user_pic'] == NULL) {
                                    $usr_picture = "default picture.png";
                                } else {
                                    $usr_picture = $row_last_cus['user_pic'];
                                }
                             ?>
                            <div class="customer">
                                <div class="info">
                                    <img src="pictures/<?php echo $usr_picture ?>" width="40px" height="40px" alt="">
                                    <div>
                                        <h4><?php echo $fullname ?></h4>
                                        <small><?php echo $usr_username ?></small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <!--<span class="las la-user-circle" ></span>-->
                                    <span class="las la-at" onclick="displayEmail('<?php echo $usr_email ?>', '<?php echo $fullname ?>')"></span>
                                    <span class="las la-phone" onclick="displayContactNumber('<?php echo $usr_contact_number ?>', '<?php echo $fullname ?>')"></span>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>

                </div>
            </div>


        </main>
    </div>

</body>
</html>
<script>
    // <block:setup:1>
    const labels = <?php echo json_encode($month_graph) ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: 'Monthy Revenue',
        data: <?php echo json_encode($total_graph) ?>,
        fill: true,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    };
    // </block:setup>

    // <block:config:0>
    const config = {
      type: 'line',
      data: data,
      options: {
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Monthly Total Revenue',
                padding: {
                    top: 10,
                    bottom: 30
                },
                font: {
                        size: 15,
                        weight: 'bold',
                        family: 'Poppins'
                    }
            }
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Months',
              color: '#000',
              font: {
                size: 16
              }
            },
            ticks: {
              color: '#000'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Number of Revenue (RM)',
              color: '#000',
              font: {
                size: 16
              }
            },
            ticks: {
              color: '#000'
            }
          }
        }
      }
    };

    // </block:config>


    // <block:config:1>
    const myChart = new Chart(document.getElementById('myChart'), config);
    // </block:config>
  </script>



<script>
function GO_cus()
{
    window.location = "customer.php";
    
}

  function displayContactNumber(contactNumber, fullName) {
    Swal.fire({
        title: 'Contact Number',
        html: 'Full Name: ' + fullName + '<br>Contact Number: ' + contactNumber,
        icon: 'info',
        confirmButtonText: 'OK'
    })
}

function displayEmail(email, fullName) {
    Swal.fire({
        title: 'Email Address',
        html: 'Full Name: ' + fullName + '<br>Email: ' + email,
        icon: 'info',
        confirmButtonText: 'OK'
    })
}
</script>
