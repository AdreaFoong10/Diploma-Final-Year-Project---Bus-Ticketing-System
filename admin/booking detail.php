<?php ob_start();
session_start();
//Needed for displaying error when directing accessing to pages
$_SESSION['title']= NULL;
$_SESSION['ID_edit']= NULL;
$_SESSION['ID_see_all'] = NULL;
$_SESSION['title_see_all']= NULL;
$_SESSION['add'] = NULL;
$_SESSION['title_add'] = NULL;
$_SESSION['ID_print'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/Default style.css?v=1">
    <link rel="stylesheet" href="css/style 2.css?v=1">
    <link rel="stylesheet" href="css/style 3.css?v=1">
    <title>Booking details Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $booking_detail="active"; ?>
<?php $title ="Booking Details"; ?>
<?php $search_edit = 0; ?>
<?php $search_see_all = 0; ?>
<?php $add_process = 0; ?>
<?php $search_profile =0; ?>
<?php $i=0; ?>

<?php 
    $sortOrder = "DESC"; 
    $icon_ACS_DESC = "las la-sort-up";

?>
<?php 
    $start = 0;
    $output_rows = 4; 
?>


<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';   ?>
<!-- SQL Database for Payment -->
<?php

    if (isset($_SESSION['rows']) && isset($_GET['page-nr'])) {
        $output_rows = $_SESSION['rows'];
    } else {
        $output_rows = 4;
    }

    if($_SESSION['sortOrder_global']=== "ASC" && isset($_GET['page-nr']))
    {
        $sortOrder = $_SESSION['sortOrder_global'];
        $icon_ACS_DESC = $_SESSION['icon_ACS_DESC_global'];
    }
    else
    {
        $sortOrder = "DESC"; 
        $icon_ACS_DESC = "las la-sort-up";
        $_SESSION['sortOrder_global']=NULL;
        $_SESSION['icon_ACS_DESC_global']=NULL;
    }

    if(isset($_POST['submitsortButton']))
    {
        if ($_POST["sortOrder"] == "ASC") {
            $sortOrder = "DESC";
            $icon_ACS_DESC = "las la-sort-up";
            $_SESSION['sortOrder_global'] = $sortOrder;
            $_SESSION['icon_ACS_DESC_global'] = $icon_ACS_DESC;
        } else {
            $sortOrder = "ASC";
            $icon_ACS_DESC = "las la-sort-down";
            $_SESSION['sortOrder_global'] = $sortOrder;
            $_SESSION['icon_ACS_DESC_global'] = $icon_ACS_DESC;
        }
        $output_rows = isset($_POST['display_row']) ? $_POST['display_row'] : $output_rows;
    }

    if(isset($_POST['display_row']))
    {
        $get_current_row = $_POST['display_row'];
        $output_rows = $get_current_row;
    }
    $get_total_payment = "SELECT * FROM payment";
    $run_total_payment = mysqli_query($conn,$get_total_payment);
    $num_total_payment = mysqli_num_rows($run_total_payment);

    $pages = ceil($num_total_payment / $output_rows);
    if(isset($_GET['page-nr']))
    {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $output_rows;

    }

    if(isset($_GET['page-nr']))
    {
        $current_page = $_GET['page-nr'];
    }
    else
    {
        $current_page = 1;
    }


    $get_booking = "SELECT * FROM payment ORDER BY payment_id $sortOrder LIMIT $start, $output_rows";
    $run_booking = mysqli_query($conn,$get_booking);
    $num_row_booking = mysqli_num_rows($run_booking);


    
    
?>



<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php'; 
    if(isset($_POST['search_data']))
    {
        $search_data_item = $_POST['search_data'];
        if(preg_match($disallowedPattern, $search_data_item))
        {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'You have entered a disallowed input pattern. <br>Disallowed input including : <br>[DELETE | UPDATE | DROP]<br>[TRUNCATE | ALTER | INSERT | SELECT]<br> Please enter a different input',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
            <?php
            
        }
        else
        {
            if(is_numeric($search_data_item)) {
            
                $sql_search_data = "SELECT * FROM payment WHERE payment_id like '%$search_data_item%' or user_id like '%$search_data_item%' 
                or bus_schedule_id like '%$search_data_item%' or contact_no like '%$search_data_item%'";
            }
            else if (strpos(strtoupper($search_data_item), 'RM ') === 0) {
                $search_data_item = substr($search_data_item, 3);
                $sql_search_data = "SELECT * FROM payment WHERE total_pay like '%$search_data_item%'";
            }
            else if(strpos($search_data_item, 'ID ') === 0)
            {
                $search_data_item = substr($search_data_item, 3);
                $sql_search_data = "SELECT * FROM payment WHERE payment_id = $search_data_item";
            }
            else if(preg_match('/^\d{1,2}:\d{2}$/', $search_data_item))
            {
                $time_parts = explode(':', $search_data_item); // split the time string into hour and minute components
                $hour = (int) $time_parts[0]; // extract the hour as an integer
                $minute = (int) $time_parts[1]; // extract the minute as an integer
    
    
                if($minute !== 0)
                {
                    $search_data_item = sprintf("%02d.%02d", $hour, $minute); // format the time as hh:mm
                }
                else
                {
                    $search_data_item = $hour;
                }
    
                $sql_search_data_schedule = "SELECT bus_schedule_id FROM bus_schedule WHERE departure_time like '%$search_data_item%'";
                $run_search_bus_schedule = mysqli_query($conn, $sql_search_data_schedule);
                $row_search_bus_schedule = mysqli_fetch_assoc($run_search_bus_schedule);
                $bus_schedule_id_search = $row_search_bus_schedule['bus_schedule_id'];
    
                $sql_search_data = "SELECT * FROM payment WHERE bus_schedule_id = '$bus_schedule_id_search'";
    
            }
            else if(strpos($search_data_item, 'Username ') === 0)
            {
                $search_data_item = substr($search_data_item, 9);
                $sql_search_data_name_id = "SELECT user_id, username FROM user WHERE username like '%$search_data_item%'";
                $run_sql_search_data_name_id = mysqli_query($conn, $sql_search_data_name_id);
                $row_sql_search_data_name_id = mysqli_fetch_assoc($run_sql_search_data_name_id);
                $search_data_item = $row_sql_search_data_name_id['user_id'];
                
                
                $sql_search_data = "SELECT * FROM payment WHERE user_id = $search_data_item";

            }
            else
            {
                
                $sql_search_data = "SELECT * FROM payment WHERE payment_method like '%$search_data_item%' or email_address like '%$search_data_item%'";
            }
            
            $run_booking = mysqli_query($conn, $sql_search_data);
        }

    }
    ?>

    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 1.8rem; grid-template-columns: 100% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">

                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Booking Details</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_payment ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="display_row" value="<?php echo $output_rows; ?>">
                                    <input type="hidden" name="sortOrder" value="<?php echo $sortOrder; ?>">
                                    <button type="submit" id="submitsortButton" name="submitsortButton" value="<?php echo $sortOrder; ?>" onclick="toggleSortOrder()"><?php echo $sortOrder; ?> By ID <span class="<?php echo $icon_ACS_DESC ?>"></span> </button>
                                </form>
                                
                            </div>
                            

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td style="text-align: center;">No</td>
                                            <td style="text-align: center;">Fullname</td>
                                            <td style="text-align: center;">User Contact Number</td>
                                            
                                            <td style="text-align: center;">Total Payment</td>
                                            <td style="text-align: center;">Payment Method</td>
                                            <td style="text-align: center;">Departure Time <br>(24-hour time notation)</td>
                                            <td style="text-align: center;">Boarding</td>
                                            <td style="text-align: center;">Alighting</td>
                                            <td style="display: table-cell; padding: 8px 95px;">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         while($row_booking = mysqli_fetch_assoc($run_booking))
                                         {
                                             $ID = $row_booking['payment_id'];
                                             $total_pay = $row_booking['total_pay'];
                                             $payment_method = $row_booking['payment_method'];
                                             $contact_no = $row_booking['contact_no'];
                                             $email_address = $row_booking['email_address'];
                                             $user_id = $row_booking['user_id'];
                                             $bus_schedule_id = $row_booking['bus_schedule_id'];
                                             $i++;

                                            // SQL Database for User details based on Payment
                                             $get_booking_user = "SELECT * FROM user WHERE user_id= $user_id";
                                             $run_booking_user = mysqli_query($conn,$get_booking_user);
                                             $row_booking_user = mysqli_fetch_assoc($run_booking_user);

                                             $username = $row_booking_user['username'];
                                             $fullname_of_username = $row_booking_user['user_fullname'];

                                             // SQL Database for Bus Schedule details based on Payment
                                             $get_booking_schedule = "SELECT * FROM bus_schedule WHERE bus_schedule_id = $bus_schedule_id";
                                             $run_booking_schedule = mysqli_query($conn,$get_booking_schedule);
                                             $row_booking_schedule = mysqli_fetch_assoc($run_booking_schedule);

                                             $boarding = $row_booking_schedule['boarding'];
                                             $alighting = $row_booking_schedule['alighting'];
                                             $dep_time = $row_booking_schedule['departure_time'];

                                             $dep_time_24 = number_format($dep_time,2, ':', '');

                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i ?></td>
                                            <td style="text-align: center;"><?php echo $fullname_of_username ?></td>
                                            <td style="text-align: center;"><?php echo $contact_no ?></td>
                                            
                                            <td style="text-align: center;">RM <?php echo $total_pay ?></td>
                                            <td style="text-align: center;"><?php echo $payment_method ?></td>
                                            <td style="text-align: center;"><?php echo $dep_time_24 ?></td>
                                            <td style="text-align: center;"><?php echo $boarding ?></td>
                                            <td style="text-align: center;"><?php echo $alighting ?></td>
                                            <td>
                                                <div class="card-header">

                                                    <form method="post" action="">
                                                        <input type="hidden" name="ID_see_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="booking detail">
                                                        <button type="submit" name="see-all" style="margin-right: 1rem;">See all <span class="las la-arrow-right"></span></button>
                                                    </form>

                                                    <button onclick="window.open('print booking detail.php?print_id=<?php echo $ID; ?>', '_blank')">Print<span class="las la-print"></span></button>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                         }
                                         ?>
                                    </tbody>
                                </table>
                                <div style="margin-top: 2rem;">
                                    <?php                                          
                                    if($i <1)
                                    {
                                        ?>
                                        <div style="text-align:center; margin-top: 2rem;">
                                            <span style="display:inline-block; padding: 10px; text-align: center; vertical-align: middle;">
                                                No Data Have been found!
                                            </span>
                                            
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                    <div class="pagination-container">
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_payment ?> data in Database</span>
                                        <div class="pagination-class">
                                            <?php
                                                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1)
                                                {
                                                    $_SESSION['rows'] = $output_rows;
                                                    ?>
                                                        <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                                                    <?php
                                                }
                                                else
                                                {

                                                }

                                            ?>
                                            

                                            
                                            
                                                <a style="background:var(--hover-card); border:var(--hover-card); "><?php echo $current_page ?></a>
                                           
                                            
                                            

                                            <?php
                                                if(!isset($_GET['page-nr']))
                                                {
                                                    $_SESSION['rows'] = $output_rows;
                                                    ?>
                                                        <a href="?page-nr=2">Next</a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    if($_GET['page-nr'] >= $pages)
                                                    {

                                                    }
                                                    else
                                                    {
                                                        $_SESSION['rows'] = $output_rows;
                                                        ?>
                                                            <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</body>
</html>
<?php

    if(isset($_POST['see-all'])) {
        $_SESSION['title_see_all']= $_POST['title'];
        $_SESSION['ID_see_all']=$_POST['ID_see_form'];
        header("Location: see all.php");
        exit;
    }


?>

<?php ob_end_flush(); ?>