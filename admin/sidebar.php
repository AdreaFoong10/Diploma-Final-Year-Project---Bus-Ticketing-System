<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
 $admin_profile_usrname = $_SESSION["admin_user"];
 // Get admin info 
 $sql_getprofile_admin = mysqli_query($conn, "SELECT admin_id, admin_pic, admin_level, admin_status FROM admin WHERE admin_username = '$admin_profile_usrname'");
 $sql_run_getprofile_admin = mysqli_fetch_assoc($sql_getprofile_admin);

 $admin_profile_id = $sql_run_getprofile_admin['admin_id'];
 $admin_status_checking = $sql_run_getprofile_admin['admin_status'];
 $admin_profile_level = $sql_run_getprofile_admin['admin_level'];

 if($admin_status_checking == "1" )
 {
    $_SESSION["login_status_checking"] = 1;
    header("Location: /FYP/login.signup.php");
 }


 if($sql_run_getprofile_admin['admin_pic'] == NULL)
 {
    $admin_profile_picture = "default picture.png";
 }
 else
 {
    $admin_profile_picture = $sql_run_getprofile_admin['admin_pic'];
 }

 if($admin_profile_level === "1")
 {
    $admin_level_name = "Admin";
 }
 else if($admin_profile_level === "2")
 {
    $admin_level_name = "SuperAdmin";
 }
 

    if(isset($_POST['log_out']))
    {
        /*$_SESSION['admin_status'] = $_POST['admin_status'];
        header("Location: /FYP/login.signup/login.signup.php");
        exit;*/
        ?>
            <script>
                Swal.fire({
                    title: 'Are you sure you want to logout?',
                    html: 'All unsave changes will de discard!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                                title: 'Please wait...',
                                text: 'Logging out...',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                                didOpen: () => {
                                Swal.showLoading();
                                // Send AJAX request to update_admin.php to update the data
                                $.ajax({
                                    url: '/FYP/admin/logout_process.php',
                                    type: 'POST',
                                    data: {
                                        admin_status: '<?php echo $_POST['admin_status']?>'
                                    },
                                    success: function(response) {
                                        
                                        window.location.href = '/FYP/login.signup.php';
                                        
                                    },
                                    error: function(xhr, status, error) {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'There was an error while Logging Out. Please try again later.',
                                            icon: 'error',
                                            showConfirmButton: true,
                                            timer: 5000,
                                            willClose: () => {
                                                Swal.close();
                                                window.location.href = 'staff.php';
                                            }
                                        });
                                    }
                                });
                                }
                            });
                    }
                });
            </script>
        <?php
    }


    

    $disallowedPattern = '/(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i';
?>

    <!-- SideBar -->
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-meteor"></span> <span>CometBus</span></h2>
        </div>
        
        <div class="sidebar-menu" id="process-quit">
            <ul>
                <li>
                    <a href="/FYP/admin/dashboard.php" class="<?php echo ($dashboard == 'active') ? 'active' : ''; ?> dash-href"><span class="las la-igloo dash-href"></span><span class="dash-href"> Dashboard</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/staff.php" class="<?php echo ($staff == 'active') ? 'active' : ''; ?> staff-href"><span class="las la-users-cog staff-href"></span><span class="staff-href"> Staffs / Admins</span></a>
                </li>
                <!--<li>
                    <a href=""><span class="las la-bus"></span><span> Add New Bus Category</span></a>
                </li>-->
                <li>
                    <a href="/FYP/admin/bus schedule.php" class="<?php echo ($bus_schedule == 'active') ? 'active' : ''; ?> bus-schedule-href"><span class="las la-business-time bus-schedule-href"></span><span class="bus-schedule-href"> Bus Schedules</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/bus operator.php" class="<?php echo ($bus_operator == 'active') ? 'active' : ''; ?> bus-operator-href"><span class="las la-building bus-operator-href"></span><span class="bus-operator-href"> Bus Operators</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/bus route.php" class="<?php echo ($bus_route == 'active') ? 'active' : ''; ?> bus-route-href"><span class="las la-route bus-route-href"></span><span class="bus-route-href"> Bus Routes</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/bus driver.php" class="<?php echo ($bus_driver == 'active') ? 'active' : ''; ?> bus-driver-href"><span class="las la-user-astronaut bus-driver-href"></span><span class="bus-driver-href"> Bus Drivers</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/bus information.php" class="<?php echo ($bus_information == 'active') ? 'active' : ''; ?> bus-information-href"><span class="las la-info bus-information-href"></span><span class="bus-information-href"> Bus informations</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/customer.php" class="<?php echo ($customer == 'active') ? 'active' : ''; ?> customer-href"><span class="las la-users customer-href"></span><span class="customer-href"> Customers</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/booking detail.php" class="<?php echo ($booking_detail == 'active') ? 'active' : ''; ?> booking-detail-href"><span class="las la-shopping-bag booking-detail-href"></span><span class="booking-detail-href"> Booking Details</span></a>
                </li>
                <li>
                    <a href="/FYP/admin/profile setting.php" class="<?php echo ($setting == 'active') ? 'active' : ''; ?> setting-href"><span class="las la-id-card setting-href"></span><span class="setting-href"> Account</span></a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Main Dashboard -->
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                <?php echo $title ?>
            </h2>
            <?php 
            if($title != "Dashboard" && $search_edit != 1 && $search_see_all != 1 && $add_process != 1 && $search_profile != 1)
            {
            ?>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <form method="post">
                <input type="search" name="search_data" placeholder="Search here" autocomplete="off">
                </form>
            </div>
            <?php
            }
            ?>

            
            <div class="user-wrapper">
                <div class="card-header" style="border-bottom: none;">
                    <form method="post" >
                        <input type="hidden" name="admin_status" value="logout">
                        <button type="submit" name="log_out">Log Out <span class="las la-sign-out-alt"></span>
                    </form>
                </div>
                <img src="pictures/<?php echo $admin_profile_picture ?>" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $admin_profile_usrname ?></h4>
                    <small><?php echo $admin_level_name ?></small>
                </div>
            </div>
        </header>

        <!-- Need to ADD </div> At the end of the code -->
