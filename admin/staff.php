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
    <title>Staff Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $staff="active"; ?>
<?php $title ="Staffs / Admins"; ?>
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
<!-- SQL Database and Pagination -->
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


    $get_total_admin = "SELECT * FROM admin";
    $run_total_admin = mysqli_query($conn,$get_total_admin);
    $num_total_admin = mysqli_num_rows($run_total_admin);


    $pages = ceil($num_total_admin / $output_rows);
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
    



    $get_admin = "SELECT admin_id, admin_fullname, admin_username, admin_level, admin_status FROM admin ORDER BY admin_id $sortOrder LIMIT $start, $output_rows";
    $run_admin = mysqli_query($conn,$get_admin);
    $num_row_admin = mysqli_num_rows($run_admin);

    
    
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
                
                    $sql_search_data = "SELECT * FROM admin WHERE admin_id like '%$search_data_item%' or admin_level like '%$search_data_item%'";
                }
                else if(strpos($search_data_item, 'ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 3);
                    $sql_search_data = "SELECT * FROM admin WHERE admin_id = $search_data_item";
                }
                else if(strpos($search_data_item, 'Admin level ') === 0)
                {
                    $search_data_item = substr($search_data_item, 12);
                    $sql_search_data = "SELECT * FROM admin WHERE admin_level = $search_data_item";
                }
                else if(strpos($search_data_item, 'Admin status ') === 0)
                {
                    $search_data_item = substr($search_data_item, 13);
                    if($search_data_item === "active")
                    {
                        $search_data_item = 0;
                        $sql_search_data = "SELECT * FROM admin WHERE admin_status = $search_data_item";
                    }
                    else if($search_data_item === "inactive")
                    {
                        $search_data_item = 1;
                        $sql_search_data = "SELECT * FROM admin WHERE admin_status = $search_data_item";
                    }
                }
                else
                {
                    $sql_search_data = "SELECT * FROM admin WHERE admin_fullname like 
                    '%$search_data_item%' or admin_username like '%$search_data_item%' or admin_level like '%$search_data_item%'";
                }
                
                $run_admin = mysqli_query($conn, $sql_search_data);
            }
        }
    
    ?>
    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 2rem; grid-template-columns: 96% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Staffs / Admins</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_admin ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="display_row" value="<?php echo $output_rows; ?>">
                                    <input type="hidden" name="sortOrder" value="<?php echo $sortOrder; ?>">
                                    <button type="submit" id="submitsortButton" name="submitsortButton" value="<?php echo $sortOrder; ?>" onclick="toggleSortOrder()"><?php echo $sortOrder; ?> By ID <span class="<?php echo $icon_ACS_DESC ?>"></span> </button>
                                </form>
                                
                            </div>
                            <div>
                                <?php
                                if ($admin_profile_level === "2") {
                                ?>
                                    <form method="post" action="">
                                        <input type="hidden" name="add_p" value="1">
                                        <input type="hidden" name="title" value="staff">
                                        <button type="submit" name="add">Add <span class="las la-user-plus"></span></button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td style="text-align: center;">No</td>
                                            <td>Full Name</td>
                                            <td>User Name</td>
                                            <td style="text-align: center;">Admin Level</td>
                                            <td style="text-align: center;">Admin Status</td>
                                            <?php
                                            if($admin_profile_level === "2")
                                            {
                                            ?>
                                            <!-- change from style="margin-left: 4.3rem;" to style="display: table-cell; padding: 8px 135px;" -->
                                            <td style="display: table-cell; padding: 8px 150px;">Actions</td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while($row_admin = mysqli_fetch_assoc($run_admin))
                                        {
                                            $ID = $row_admin['admin_id'];
                                            $fullname = $row_admin['admin_fullname'];
                                            $ad_username = $row_admin['admin_username'];
                                            $level = $row_admin['admin_level'];
                                            $admin_status = $row_admin['admin_status'];
                                            $i++;

                                            if($level === "1")
                                            {
                                                $admin_level_table = "Admin";
                                            }
                                            else if($level === "2")
                                            {
                                                $admin_level_table = "SuperAdmin";
                                            }

                                            if($admin_status === "1")
                                            {
                                                $active_status ="Inactive";
                                                $active_class = "card-red";
                                                $active_icon = "las la-lock";
                                            }
                                            else if($admin_status === "0" && $_SESSION['admin_user'] === $ad_username && $level === "2")
                                            {
                                                $active_status ="Active";
                                                $active_class = "card-gray";
                                                $active_icon = "las la-lock";
                                                
                                            }
                                            else
                                            {
                                                $active_status ="Active";
                                                $active_class = "card-green";
                                                $active_icon = "las la-unlock";
                                            }

                                            if($level === "2" && $admin_profile_level === "2" && $_SESSION['admin_user'] !== $ad_username)
                                            {
                                                $disable_delete = "disabled";
                                                $disable_class = "card-gray";
                                                $disable_send_info = "disabled";
                                            }
                                            else
                                            {
                                                $disable_delete = "";
                                                $disable_class = "";
                                                $disable_send_info = "";
                                            }

                                            if($admin_status === "0" && $_SESSION['admin_user'] === $ad_username && $level === $admin_profile_level)
                                            {
                                                $disable_delete_self = "disabled";
                                                $disable_class_self = "card-gray";
                                            }
                                            else
                                            {
                                                $disable_delete_self = "";
                                                $disable_class_self = "";
                                            }

                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i ?></td>
                                            <td><?php echo $fullname ?></td>
                                            <td><?php echo $ad_username ?></td>
                                            <td style="text-align: center;"><?php echo $admin_level_table ?></td>
                                            <td style="text-align: center;">
                                                <!-- Need to change the Active ,the icon and the color to php -->
                                                <div class="<?php echo $active_class ?>">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_status" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="Status_Ac_De" value="<?php echo $active_status; ?>">
                                                        <button type="submit" id="activeButton" name="admin_status_check" <?php if($admin_profile_level === "1" || $_SESSION['admin_user'] === $ad_username) echo "disabled"; ?>><?php echo $active_status ?> <span class="<?php echo $active_icon ?>"></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <?php
                                            if($admin_profile_level === "2")
                                            {
                                            ?>
                                            <td>
                                                <div class="card-header">
                                                    <form method="post">
                                                        <input type="hidden" name="ID_edit_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="staff">
                                                        <button type="submit" name="edit" style="margin-right: 1rem;">Edit <span class="las la-edit"></span></button>
                                                    </form>
                        

                                                    <form method="post" action="">
                                                        <input type="hidden" name="ID_see_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="staff">
                                                        <button type="submit" name="see-all" style="margin-right: 1rem;">See all <span class="las la-arrow-right"></span></button>
                                                    </form>
                                                    
                                                    <form method="post" action="" class="<?php echo $disable_class; ?>">
                                                        <input type="hidden" name="ID_sent_form" value="<?php echo $ID; ?>">
                                                        <button type="submit" name="send_to" <?php echo $disable_send_info; ?>>Send Info <span class="las la-envelope-open-text"></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <?php
                                            }
                                            ?>
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
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_admin ?> data in Database</span>
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

    if(isset($_POST['send_to']))
    {
        $Id_sent=$_POST['ID_sent_form'];
        require_once 'email sent.php';
    }


    if(isset($_POST['admin_status_check']))
    {
        $Id_status = $_POST['ID_status'];
        $status_checing = $_POST['Status_Ac_De'];
        $status_check_title = "staff";
        require_once 'status.php';
    }
?>

<?php ob_end_flush(); ?>