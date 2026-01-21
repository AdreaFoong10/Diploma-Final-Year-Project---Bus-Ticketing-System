<!-- form -->
<div class="recent-grid" style="margin-top: 7.5rem; margin-left: 5.5rem; grid-template-columns: 90% auto;">
                                <div class="projects">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3><?php echo $title ?></h3>

                                        </div>

                                        <div class="customers"> 

                                                <div class="card-body">
                                                    <div class="customer">
                                                        <div class="info" style="margin-left: 20rem;  flex-direction: column; align-items: normal;">
                                                        <form method="POST">
                                                        
                                                            <!-- Route ID with inline css -->
                                                            <div style="margin-top: 2rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_route_id"><h4 style="font-size: 1.5em">Route ID : </h4> </label>
                                                                <input type="text" id="bus_route_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="bus_route_id" size="5" value="<?php echo $bus_route_id ?>" disabled>
                                                            </div>

                                                            <!-- Route Starting Point with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_route_start"><h4 style="font-size: 1.5em">Route Starting Point : </h4> </label>
                                                                <select style="flex-direction: row; margin-left: 2.55rem;" id="bus_route_start" placeholder="Staring Point" name="bus_route_start" required>
                                                                    <option value="<?php echo $row_edit['starting_point'] ?>" selected><?php echo $row_edit['starting_point'] ?></option>
                                                                    <option value="Johor Bahru">Johor Bahru</option>
                                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                                    <option value="Malacca">Malacca</option>
                                                                    <option value="Penang">Penang</option>
                                                                </select>
                                                            </div>

                                                            <!-- Route Destination with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_route_des"><h4 style="font-size: 1.5em">Route Destination : </h4> </label>
                                                                <select style="flex-direction: row; margin-left: 2.55rem;" id="bus_route_des" placeholder="Destination" name="bus_route_des" required>
                                                                    <option value="<?php echo $row_edit['destination'] ?>" selected><?php echo $row_edit['destination'] ?></option>
                                                                    <option value="Johor Bahru">Johor Bahru</option>
                                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                                    <option value="Malacca">Malacca</option>
                                                                    <option value="Penang">Penang</option>
                                                                </select>
                                                            </div>

                                                            <!-- Route's driver ID date with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_id"><h4 style="font-size: 1.5em">Route Driver : </h4> </label>
                                                                <select style="flex-direction: row; margin-left: 3.2rem; text-align: center;" id="bus_driver_id" placeholder="Driver ID" name="bus_driver_id" required>
                                                                    <option value="<?php echo $row_edit['driver_id'] ?>" selected><?php echo $row_edit['driver_id'] ?> - <?php echo $row_edit_driver_fullname['driver_fullname'] ?></option>
                                                                    <?php
                                                                        $get_dri_id_sql = "SELECT driver_id, driver_fullname FROM driver";
                                                                        $run_dri_id_sql = mysqli_query($conn,$get_dri_id_sql);
                                                                        
                                                                        while($row_dri_id_sql = mysqli_fetch_assoc($run_dri_id_sql))
                                                                        {
                                                                            $driver_compare_id = $row_dri_id_sql['driver_id'];
                                                                            $driver_compare_name = $row_dri_id_sql['driver_fullname'];

                                                                            // Check if the driver ID is already in use by a route
                                                                            $compare_dri_id_sql = "SELECT driver_id FROM route WHERE driver_id = '$driver_compare_id'";
                                                                            $run_compare_dri_id_sql = mysqli_query($conn, $compare_dri_id_sql);
                                                                            if (mysqli_num_rows($run_compare_dri_id_sql) == 0) 
                                                                            {
                                                                    ?>
                                                                            <option value="<?php echo $driver_compare_id ?>"><?php echo $driver_compare_id ?> - <?php echo $driver_compare_name ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <!-- Back and Save Button -->
                                                            <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">                                                           
                                                                <input type="button" onclick="confirmBack()" value="Back to List" name="backbutton" style="margin-right: 5.3rem;">
                                                                
                                                                <input type="submit" value="Save" name="saveprofile">
                                                               
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <br>

                                        </div>

                    
                                    </div>
                                </div>
    </div>

<!-- if admin pressed Back to List button, it will ask if admin wanted to go back -->     
<script>
        function confirmBack() {
            Swal.fire({
                title: "Do you want to go back to List?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    window.location.href = "/FYP/admin/bus route.php";
                    
                }
            });
            
        }
        
</script>

<!-- If save button is pressed -->
<?php 
    if(isset($_POST['saveprofile']))
    {


        
        $bus_route_start = $_POST['bus_route_start'];
        $bus_route_des = $_POST['bus_route_des'];
        $bus_driver_id = $_POST['bus_driver_id'];

        if($bus_route_start === $bus_route_des)
        {
            ?>
            <script>
                Swal.fire({
                title: 'Error!',
                html: 'You have selected the <b>Same</b> Route in <br>Staring Point and Destination.<br> Please Select different route.',
                icon: 'error',
                showConfirmButton: true,
                timer: 8500
            });
            </script>
            <?php
           
            return false;
        }


        $sql_edit_check = mysqli_query($conn, "SELECT route_id, driver_id FROM route");
        while($row_edit_check = mysqli_fetch_assoc($sql_edit_check))
        {
            $check_id = $row_edit_check['route_id'];
            $check_driver_id = $row_edit_check['driver_id'];

            if($check_id != $bus_route_id)
            {
                if($bus_driver_id === $check_driver_id)
                {
                    ?>
                    <script>
                        Swal.fire({
                        title: 'Error!',
                        html: 'The current driver has been assigned to a different route.<br> Please select an available driver.',
                        icon: 'error',
                        showConfirmButton: true,
                        timer: 8500
                    });
                    </script>
                    <?php
                   
                    return false;
                }
            }

        }



        ?>
        <script>
            //Run the sweetalert Asking if wanted to save
            Swal.fire({
                title: 'Do you want to save your changes?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: 'Please wait...',
                    text: 'Saving data...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/route/update_route.php',
                        type: 'POST',
                        data: {
                            start: '<?php echo $bus_route_start ?>',
                            des: '<?php echo $bus_route_des ?>',
                            driverid: '<?php echo $bus_driver_id ?>',
                            id: '<?php echo $bus_route_id ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus route.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while saving data. Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus route.php';
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

?>
