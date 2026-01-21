<?php ob_start();
session_start();
//Needed for displaying error when directing accessing to pages
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/Default style.css?v=1">
    <link rel="stylesheet" href="css/style 2.css?v=1">
    <link rel="stylesheet" href="css/style 3.css?v=1">
    <title>Bus drivers Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $bus_schedule="active"; ?>
<?php $title ="Bus Schedules"; ?>
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

<!-- SQL Database -->
<?php
    $disable_bus_schedule_delete = "";
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

    $get_total_bus_schedule = "SELECT * FROM bus_schedule";
    $run_total_bus_schedule = mysqli_query($conn,$get_total_bus_schedule);
    $num_total_bus_schedule = mysqli_num_rows($run_total_bus_schedule);


    $pages = ceil($num_total_bus_schedule / $output_rows);
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

    $get_bus_schedule = "SELECT bus_schedule_id , bus_schedule_date, boarding, alighting, departure_time, fare, bus_schedule_status FROM bus_schedule ORDER BY bus_schedule_id $sortOrder LIMIT $start, $output_rows";
    $run_bus_schedule = mysqli_query($conn,$get_bus_schedule);
    $num_row_bus_schedule = mysqli_num_rows($run_bus_schedule);


    
    

    
    ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php'; ?>


    <!-- Sweet alert 2 code -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Jquery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';   ?>

    <?php
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
            
                    $sql_search_data = "SELECT * FROM bus_schedule WHERE bus_schedule_id like '%$search_data_item%' or fare like '%$search_data_item%'";
                }
                else if(strpos($search_data_item, 'Schedule status ') === 0)
                {
                        $search_data_item = substr($search_data_item, 16);
                        if($search_data_item === "active")
                        {
                            $search_data_item = "1";
                            $sql_search_data = "SELECT * FROM bus_schedule WHERE bus_schedule_status = $search_data_item";
                        }
                        else if($search_data_item === "inactive")
                        {
                            $search_data_item = "0";
                            $sql_search_data = "SELECT * FROM bus_schedule WHERE bus_schedule_status = $search_data_item";
                        }
                }
                else if(strpos($search_data_item, 'ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 3);
                    $sql_search_data = "SELECT * FROM bus_schedule WHERE bus_schedule_id = $search_data_item";
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
        
                    $sql_search_data = "SELECT * FROM bus_schedule WHERE departure_time = $search_data_item";
        
        
                }
                else
                {
                    $sql_search_data = "SELECT * FROM bus_schedule WHERE boarding like 
                    '%$search_data_item%' or alighting like '%$search_data_item%' or bus_schedule_date like '%$search_data_item%'";
                }

                $run_bus_schedule = mysqli_query($conn, $sql_search_data);
            }
        
    }
    ?>


    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 2.5rem; grid-template-columns: 97% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            
                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Bus Schedules</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_bus_schedule ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="display_row" value="<?php echo $output_rows; ?>">
                                    <input type="hidden" name="sortOrder" value="<?php echo $sortOrder; ?>">
                                    <button type="submit" id="submitsortButton" name="submitsortButton" value="<?php echo $sortOrder; ?>" onclick="toggleSortOrder()"><?php echo $sortOrder; ?> By ID <span class="<?php echo $icon_ACS_DESC ?>"></span> </button>
                                </form>
                                
                            </div>
                            <div>
                                <form method="post" action="">
                                    <input type="hidden" name="add_p" value="1">
                                    <input type="hidden" name="title" value="schedule">
                                    <button type="submit" name="add">Add <span class="las la-user-plus"></span></button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td style="text-align: center;">No</td>
                                            <td  style="text-align: center;">Schedule Date</td>
                                            <td>Boarding</td>
                                            <td>Alignment</td>
                                            <td style="text-align: center;">Departure Time <br>(24-hour time notation)</td>
                                            
                                            <td style="text-align: center;">Status</td>
                                            <td style="display: table-cell; padding: 8px 135px;">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row_bus_schedule = mysqli_fetch_assoc($run_bus_schedule))
                                        {
                                            $ID = $row_bus_schedule['bus_schedule_id'];
                                            $bus_schedule_date = $row_bus_schedule['bus_schedule_date'];
                                            $boarding = $row_bus_schedule['boarding'];
                                            $alighting = $row_bus_schedule['alighting'];
                                            $departure_time = $row_bus_schedule['departure_time'];
                                            $bus_schedule_status = $row_bus_schedule['bus_schedule_status'];
                                            $i++;

                                            $dep_time_24 = number_format($departure_time,2, ':', '');
                                            $disable_bus_schedule_delete = "";

                                            $get_bus_schedule_payment = "SELECT bus_schedule_id FROM payment";
                                            $run_bus_schedule_payment = mysqli_query($conn,$get_bus_schedule_payment);
                                            while($row_bus_schedule_payment = mysqli_fetch_assoc($run_bus_schedule_payment))
                                            {
                                                
                                                $payment_bus_schedule_id = $row_bus_schedule_payment["bus_schedule_id"];

                                                if($ID === $payment_bus_schedule_id)
                                                {
                                                    $disable_bus_schedule_delete = "disabled";
                                                    $active_class_delete = "card-gray";
                                                }
                                               
                                            }
                                            if($disable_bus_schedule_delete !== "disabled")
                                            {
                                                $active_class_delete = "";
                                            }


                                            $get_bus_schedule_bus = "SELECT bus_schedule_id FROM bus";
                                            $run_bus_schedule_bus = mysqli_query($conn,$get_bus_schedule_bus);
                                            while($row_bus_schedule_bus = mysqli_fetch_assoc($run_bus_schedule_bus))
                                            {
                                                
                                                $bus_table_bus_schedule_id = $row_bus_schedule_bus["bus_schedule_id"];

                                                if($ID === $bus_table_bus_schedule_id)
                                                {
                                                    $disable_bus_schedule_delete = "disabled";
                                                    $active_class_delete = "card-gray";
                                                }
                                               
                                            }
                                            if($disable_bus_schedule_delete !== "disabled")
                                            {
                                                $active_class_delete = "";
                                            }




                                            if($bus_schedule_status === "0")
                                            {
                                                $active_status ="Inactive";
                                                $active_class = "card-red";
                                                $active_icon = "las la-lock";
                                            }
                                            else if($bus_schedule_status === "3")
                                            {
                                                $active_status ="Inactive";
                                                $active_class = "card-gray";
                                                $active_icon = "las la-lock";
                                            }
                                            else
                                            {
                                                $active_status ="Active";
                                                $active_class = "card-green";
                                                $active_icon = "las la-unlock";
                                            }
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i ?></td>
                                            <td style="text-align: center;"><?php echo $bus_schedule_date ?></td>
                                            <td><?php echo $boarding ?></td>
                                            <td><?php echo $alighting ?></td>
                                            <td style="text-align: center;"><?php echo $dep_time_24 ?></td>
                                            <td style="text-align: center;">
                                                <div class="<?php echo $active_class ?>">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_status" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="Status_Ac_De" value="<?php echo $active_status; ?>">
                                                        <button type="submit" id="activeButton" name="bus_schedule_status_check" <?php if($bus_schedule_status == "3") echo "disabled"; ?>><?php echo $active_status ?> <span class="<?php echo $active_icon ?>"></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card-header">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_edit_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="schedule">
                                                        <button type="submit" name="edit" style="margin-right: 1rem;">Edit <span class="las la-edit"></span></button>
                                                    </form>

                                                    <form method="post" action="" class="<?php echo $active_class_delete; ?>">
                                                        <input type="hidden" name="delete_ID" value="<?php echo $ID; ?>">
                                                        <button type="submit" name="delete" style="margin-right: 1rem;" <?php echo $disable_bus_schedule_delete; ?>>Delete <span class="las la-user-slash"></span></button>
                                                    </form>

                                                    <form method="post" action="">
                                                        <input type="hidden" name="ID_see_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="schedule">
                                                        <button type="submit" name="see-all" style="margin-right: 1rem;">See all <span class="las la-arrow-right"></span></button>
                                                    </form>
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
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_bus_schedule ?> data in Database</span>
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
                                    <br><br>
                                    
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</body>
</html>
<?php
         if(isset($_POST['edit']))
         {
             
             $_SESSION['title']= $_POST['title'];
             $_SESSION['ID_edit']=$_POST['ID_edit_form'];
             header("Location: edit.php");
             exit;
         }
     
         if(isset($_POST['delete'])) {
             $Id_delete=$_POST['delete_ID'];
             
             require_once 'bus schedule/delete bus schedule.php';
         }
     
         if(isset($_POST['see-all'])) {
             $_SESSION['title_see_all']= $_POST['title'];
             $_SESSION['ID_see_all']=$_POST['ID_see_form'];
             header("Location: see all.php");
             exit;
         }

         if(isset($_POST['add']))
        {
            $_SESSION['title_add']= $_POST['title'];
            $_SESSION['add'] = $_POST['add_p'] ;
            header("Location: add.php");
            exit;
        }

        if(isset($_POST['bus_schedule_status_check']))
        {
            $Id_status = $_POST['ID_status'];
            $status_checing = $_POST['Status_Ac_De'];
            $status_check_title = "schedule";
            require_once 'status.php';
        }
?>
<?php ob_end_flush(); ?>