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
    <title>Bus Routes Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $bus_route="active"; ?>
<?php $title ="Bus Routes"; ?>
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
    $get_total_route = "SELECT * FROM route";
    $run_total_route = mysqli_query($conn,$get_total_route);
    $num_total_route = mysqli_num_rows($run_total_route);

    $pages = ceil($num_total_route / $output_rows);
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



    $get_route = "SELECT route_id, starting_point, destination FROM route ORDER BY route_id $sortOrder LIMIT $start, $output_rows";
    $run_route = mysqli_query($conn,$get_route);
    $num_row_route = mysqli_num_rows($run_route);

    
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
                
                    $sql_search_data = "SELECT * FROM route WHERE route_id like '%$search_data_item%' or driver_id like '%$search_data_item%' ";
                }
                /*else if(strpos($search_data_item, 'Driver ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 10);
                    $sql_search_data = "SELECT * FROM route WHERE driver_id like '%$search_data_item%'";
                }*/
                else if(strpos($search_data_item, 'ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 3);
                    $sql_search_data = "SELECT * FROM route WHERE route_id = $search_data_item";
                }
                /*else if(strpos($search_data_item, 'Driver name ') === 0)
                {
                    $search_data_item = substr($search_data_item, 12);
                    $get_driver_id_search = "SELECT driver_id FROM driver WHERE driver_fullname = '$search_data_item'";
                    $run_driver_id_search = mysqli_query($conn,$get_driver_id_search);
                    $row_driver_id_search = mysqli_fetch_assoc($run_driver_id_search);
                    $driver_id_database = $row_driver_id_search['driver_id'];
    
                    $sql_search_data = "SELECT * FROM route WHERE driver_id = $driver_id_database";
                }*/
                else
                {
                    $sql_search_data = "SELECT * FROM route WHERE starting_point like 
                    '%$search_data_item%' or destination like '%$search_data_item%'";
                }
                
                $run_route = mysqli_query($conn, $sql_search_data);
                
            }
        }
            
    ?>

    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 5.5rem; grid-template-columns: 90% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            
                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Bus Routes</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_route ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="display_row" value="<?php echo $output_rows; ?>">
                                    <input type="hidden" name="sortOrder" value="<?php echo $sortOrder; ?>">
                                    <button type="submit" id="submitsortButton" name="submitsortButton" value="<?php echo $sortOrder; ?>" onclick="toggleSortOrder()"><?php echo $sortOrder; ?> By ID <span class="<?php echo $icon_ACS_DESC ?>"></span> </button>
                                </form>
                                
                            </div>
                            <div>

                                <!--<form method="post" action="">
                                    <input type="hidden" name="add_p" value="1">
                                    <input type="hidden" name="title" value="route">
                                    <button type="submit" name="add">Add <span class="las la-user-plus"></span></button>
                                </form>-->
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td style="text-align: center;">No</td>
                                            <td>Starting Points</td>
                                            <td>Destinations</td>
                                            <!--<td style="text-align: center;">Driver ID and Name</td>-->
                                            <!--<td style="margin-left: 4.3rem;">Actions</td>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while($row_route = mysqli_fetch_assoc($run_route))
                                        {
                                            $ID = $row_route['route_id'];
                                            $start_point = $row_route['starting_point'];
                                            $des = $row_route['destination'];
                                            //$driver_id = $row_route['driver_id'];
                                            $i++;


                                            /* SQL Database for Bus Driver details based on Driver ID
                                            $get_driver_info = "SELECT * FROM driver WHERE driver_id = $driver_id";
                                            $run_driver_info = mysqli_query($conn,$get_driver_info);
                                            $row_driver_info = mysqli_fetch_assoc($run_driver_info);

                                            $driver_name = $row_driver_info['driver_fullname'];*/

                                    ?>
                                        <tr>
                                            <td style="text-align: center; padding: 1.5rem 1rem;"><?php echo $i ?></td>
                                            <td style="padding: 1.5rem 1rem;"><?php echo $start_point ?></td>
                                            <td style="padding: 1.5rem 1rem;"><?php echo $des ?></td>
                                            <!--<td style="text-align: center; padding: 1.5rem 1rem;"><?php /*echo $driver_id ?> - <?php echo $driver_name */?></td>-->
                                            <!--<td>
                                                <div class="card-header">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_edit_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="route">
                                                        <button type="submit" name="edit" style="margin-right: 1rem;">Edit <span class="las la-edit"></span></button>
                                                    </form>

                                                    <form method="post" action="">
                                                        <input type="hidden" name="delete_ID" value="<?php echo $ID; ?>">
                                                        
                                                        <button type="submit" name="delete" style="margin-right: 1rem;">Delete <span class="las la-user-slash"></span></button>
                                                    </form>
                                                </div>
                                            </td>-->
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
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_route ?> data in Database</span>
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
   /* if(isset($_POST['edit']))
    {
        
        $_SESSION['title']= $_POST['title'];
        $_SESSION['ID_edit']=$_POST['ID_edit_form'];
        header("Location: edit.php");
        exit;
    }

    if(isset($_POST['delete'])) {
        $Id_delete=$_POST['delete_ID'];
        require_once 'route/delete route.php';
    }

    if(isset($_POST['add']))
    {
        $_SESSION['title_add']= $_POST['title'];
        $_SESSION['add'] = $_POST['add_p'] ;
        header("Location: add.php");
        exit;
    }*/


?>
<?php ob_end_flush(); ?>