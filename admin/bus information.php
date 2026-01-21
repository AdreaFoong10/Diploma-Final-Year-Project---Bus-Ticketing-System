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
    <title>Bus informations Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $bus_information="active"; ?>
<?php $title ="Bus Informations"; ?>
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
<!-- SQL Database -->
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
    $get_total_bus = "SELECT * FROM bus";
    $run_total_bus = mysqli_query($conn,$get_total_bus);
    $num_total_bus = mysqli_num_rows($run_total_bus);



    $pages = ceil($num_total_bus / $output_rows);
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

    $get_bus_info = "SELECT bus_id, bus_number_plate, route_id, bus_schedule_id, driver_id FROM bus ORDER BY bus_id $sortOrder LIMIT $start, $output_rows";
    $run_bus_info = mysqli_query($conn,$get_bus_info);
    $num_row_bus_info = mysqli_num_rows($run_bus_info);
    
?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php'; ?>
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
                
                    $sql_search_data = "SELECT * FROM bus WHERE bus_id like '%$search_data_item%' or
                     route_id like '%$search_data_item%' or bus_schedule_id like '%$search_data_item%'";
                }
                else if(strpos($search_data_item, 'Bus number plate ') === 0)
                {
                    $search_data_item = substr($search_data_item, 17);
                    $sql_search_data = "SELECT * FROM bus WHERE bus_number_plate = '$search_data_item'";
                }
                else if(strpos($search_data_item, 'ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 3);
                    $sql_search_data = "SELECT * FROM bus WHERE bus_id = $search_data_item";
                }
                else if(strpos($search_data_item, 'Route ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 9);
                    $sql_search_data = "SELECT * FROM bus WHERE route_id = $search_data_item";
                }
                else if(strpos($search_data_item, 'Schedule ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 12);
                    $sql_search_data = "SELECT * FROM bus WHERE bus_schedule_id = $search_data_item";
                }
                else
                {
                    $sql_search_data = "SELECT * FROM bus WHERE bus_number_plate like 
                    '%$search_data_item%'";
                }
                
                $run_bus_info = mysqli_query($conn, $sql_search_data);
            }
    
        }
    ?>

    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 4rem; grid-template-columns: 95% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">

                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Bus informations</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_bus ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
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
                                    <input type="hidden" name="title" value="bus_info">
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
                                            <td>Bus Number Plate</td>
                                            <td style="text-align: center;">Bus Route ID with Staring Point</td>
                                            <td style="text-align: center;">Bus Schedule ID with Boarding</td>
                                            <td style="margin-left: 1.5rem;">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while($row_bus_info = mysqli_fetch_assoc($run_bus_info))
                                        {
                                            $ID = $row_bus_info['bus_id'];
                                            $num_plate = $row_bus_info['bus_number_plate'];
                                            $bus_route_id = $row_bus_info['route_id'];
                                            $bus_schedule_id = $row_bus_info['bus_schedule_id'];
                                            $driver_id =  $row_bus_info['driver_id'];
                                            
                                            $i++;

                                            $get_start_point_route = "SELECT starting_point FROM route WHERE route_id = $bus_route_id";
                                            $run_start_point_route = mysqli_query($conn,$get_start_point_route);
                                            $row_start_point_route = mysqli_fetch_assoc($run_start_point_route);
                                            $bus_route_starting = $row_start_point_route['starting_point'];
                                            
                                            $get_driver_name = "SELECT driver_fullname FROM driver WHERE driver_id = $driver_id";
                                            $run_driver_name = mysqli_query($conn,$get_driver_name);
                                            $row_driver_name = mysqli_fetch_assoc($run_driver_name);
                                            $driver_name = $row_driver_name['driver_fullname'];


                                            $get_boarding_schedule = "SELECT boarding FROM bus_schedule WHERE bus_schedule_id = $bus_schedule_id";
                                            $run_boarding_schedule = mysqli_query($conn,$get_boarding_schedule);
                                            $row_boarding_schedule = mysqli_fetch_assoc($run_boarding_schedule);
                                            $bus_schedule_boarding = $row_boarding_schedule['boarding'];


                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i ?></td>
                                            <td><?php echo $num_plate ?></td>
                                            <td style="text-align: center;"><?php echo $bus_route_id ?> - <?php echo $bus_route_starting ?> <br> Driver name: <?php echo $driver_name ?></td>
                                            <td style="text-align: center;"><?php echo $bus_schedule_id ?> - <?php echo $bus_schedule_boarding ?></td>
                                            <td>
                                                <div class="card-header">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_edit_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="bus_info">
                                                        <button type="submit" name="edit" style="margin-right: 1rem;">Edit <span class="las la-edit"></span></button>
                                                    </form>

                                                    <!--<form method="post" action="">
                                                        <input type="hidden" name="delete_ID" value="<?php echo $ID; ?>">
                                                        
                                                        <button type="submit" name="delete" style="margin-right: 1rem;">Delete <span class="las la-user-slash"></span></button>
                                                    </form>-->
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
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_bus ?> data in Database</span>
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
        
        require_once 'bus information/delete bus information.php';
    }

    if(isset($_POST['add']))
    {
        $_SESSION['title_add']= $_POST['title'];
        $_SESSION['add'] = $_POST['add_p'] ;
        header("Location: add.php");
        exit;
    }

?>
<?php ob_end_flush(); ?>