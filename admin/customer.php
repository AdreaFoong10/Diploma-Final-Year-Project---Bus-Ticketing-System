<?php ob_start();
session_start();
//Need for error when directing accessing to pages
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
    <title>Customers Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $customer="active"; ?>
<?php $title ="Customers"; ?>
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

    $get_total_user = "SELECT * FROM user";
    $run_total_user = mysqli_query($conn,$get_total_user);
    $num_total_user = mysqli_num_rows($run_total_user);

    $pages = ceil($num_total_user / $output_rows);
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



    $get_cus = "SELECT user_id, user_fullname, username, user_email_address FROM user ORDER BY user_id $sortOrder LIMIT $start, $output_rows";
    $run_cus = mysqli_query($conn,$get_cus);
    $num_row_cus = mysqli_num_rows($run_cus);

    
    
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
                
                    $sql_search_data = "SELECT * FROM user WHERE user_id like '%$search_data_item%'";
                }
                else if(strpos($search_data_item, 'ID ') === 0)
                {
                    $search_data_item = substr($search_data_item, 3);
                    $sql_search_data = "SELECT * FROM user WHERE user_id = $search_data_item";
                }
                else
                {
                    $sql_search_data = "SELECT * FROM user WHERE user_fullname like 
                    '%$search_data_item%' or username like '%$search_data_item%' or user_email_address like '%$search_data_item%'";
                }
                
                $run_cus = mysqli_query($conn, $sql_search_data);
            }
    
        }
    ?>

    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 7.5rem; grid-template-columns: 90% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <div class="add-show-form">
                                <h3 style="margin-right: 2rem;">Customers</h3>
                                <form action="" method="post" style="margin-right: 2rem;">
                                    Show <input style="width: 3rem; text-align: center;" type="number" max="<?php echo $num_total_user ?>" name="display_row" id="display_row" value="<?php echo $output_rows ?>" onchange="this.form.submit();"> rows
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
                                            <td>Full Name</td>
                                            <td>Username</td>
                                            <td>Email Address</td>
                                            <td style="margin-left: 2rem;">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while($row_cus = mysqli_fetch_assoc($run_cus))
                                        {
                                            $ID = $row_cus['user_id'];
                                            $fullname = $row_cus['user_fullname'];
                                            $usr_username = $row_cus['username'];
                                            $usr_email = $row_cus['user_email_address'];
                                            $i++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i ?></td>
                                            <td><?php echo $fullname ?></td>
                                            <td><?php echo $usr_username ?></td>
                                            <td><?php echo $usr_email ?></td>
                                            <td>
                                                <div class="card-header">
                                                    <form method="post" action="">
                                                        <input type="hidden" name="ID_see_form" value="<?php echo $ID; ?>">
                                                        <input type="hidden" name="title" value="customer">
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
                                        <span style="display:inline-block; padding: 10px; text-align: left;">Total of <?php echo $num_total_user ?> data in Database</span>
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
    if(isset($_POST['delete'])) {
        $Id_delete=$_POST['delete_ID'];
        $usr_delete=$_POST['delete_usr'];
        require_once 'customer/delete cus.php';
    }

    if(isset($_POST['see-all'])) {
        $_SESSION['title_see_all']= $_POST['title'];
        $_SESSION['ID_see_all']=$_POST['ID_see_form'];
        header("Location: see all.php");
        exit;
    }

?>
<?php ob_end_flush(); ?>