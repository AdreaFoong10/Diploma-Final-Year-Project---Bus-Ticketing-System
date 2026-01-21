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
                                                        <div class="info" style="margin-left: 8rem;  flex-direction: column; align-items: normal;">
                                                        <form method="POST">
                                            
                                                        
                                                            <!-- Bus information ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_info_id"><h4 style="font-size: 1.5em">Bus ID : </h4> </label>
                                                                <input type="text" id="bus_info_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="bus_info_id" size="5" value="<?php echo $bus_info_id ?>" disabled>
                                                            </div>

                                                            <!-- Bus Information license plate with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_info_license"><h4 style="font-size: 1.5em">License Plate : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="bus_info_license" placeholder="License Plate" name="bus_info_license" size="35" value="<?php echo $row_edit['bus_number_plate'] ?>" required>
                                                            </div>

                                                            <!-- Bus information route Level with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_info_route"><h4 style="font-size: 1.5em">Route ID : </h4> </label>
                                                                <select id="bus_info_route" style="flex-direction: row; margin-left: 1.15rem;" placehoder="Route" name="bus_info_route" required>
                                                                    <option value="<?php echo $row_edit['route_id'] ?>" selected><?php echo $row_edit['route_id'] ?> - From <?php echo $row_sql_getfrom_route['starting_point'] ?> to <?php echo $row_sql_getfrom_route['destination'] ?></option>
                                                                    <?php
                                                                        $get_route_id_sql = "SELECT * FROM route";
                                                                        $run_route_id_sql = mysqli_query($conn,$get_route_id_sql);
                                                                    while($row_route_id_sql = mysqli_fetch_assoc($run_route_id_sql))
                                                                    {
                                                                    ?>
                                                                    <option value="<?php echo $row_route_id_sql['route_id'] ?>"><?php echo $row_route_id_sql['route_id'] ?> - From <?php echo $row_route_id_sql['starting_point'] ?> to <?php echo $row_route_id_sql['destination'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                           <!-- Bus information schedule id route Level with inline css -->
                                                           <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_info_schedule"><h4 style="font-size: 1.5em">Bus Schedule ID : </h4> </label>
                                                                <select id="bus_info_schedule" style="flex-direction: row; margin-left: 1.15rem;" placehoder="Bus Schedule" name="bus_info_schedule" required>
                                                                    <option value="<?php echo $row_edit['bus_schedule_id'] ?>" selected><?php echo $row_edit['bus_schedule_id'] ?> - From <?php echo $row_sql_getfrom_schedule['boarding'] ?> to <?php echo $row_sql_getfrom_schedule['alighting'] ?></option>
                                                                    
                                                                </select>
                                                            </div>

                                                            <!-- Bus information driver id route Level with inline css -->
                                                           <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_info_driver"><h4 style="font-size: 1.5em">Bus Driver : </h4> </label>
                                                                <select id="bus_info_driver" style="flex-direction: row; margin-left: 1.15rem;" placehoder="Bus driver" name="bus_info_driver" required>
                                                                    <option value="<?php echo $get_driver_id_database ?>" selected><?php echo $get_driver_id_database ?> - Driver Name : <?php echo $row_sql_getfrom_driver['driver_fullname'] ?></option>
                                                                    <?php
                                                                        $get_driver_id_sql = "SELECT driver_id, driver_fullname FROM driver";
                                                                        $run_driver_id_sql = mysqli_query($conn,$get_driver_id_sql);
                                                                    while($row_driver_id_sql = mysqli_fetch_assoc($run_driver_id_sql))
                                                                    {
                                                                        $driver_compare_id = $row_driver_id_sql['driver_id'];
                                                                        $driver_compare_name = $row_driver_id_sql['driver_fullname'];
                                                                        // Check if the driver ID is already in use by a bus
                                                                        $compare_dri_id_sql = "SELECT driver_id FROM bus WHERE driver_id = '$driver_compare_id'";
                                                                        $run_compare_dri_id_sql = mysqli_query($conn, $compare_dri_id_sql);
                                                                        if (mysqli_num_rows($run_compare_dri_id_sql) == 0) 
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $driver_compare_id ?>"><?php echo $driver_compare_id  ?> - Driver Name : <?php echo $driver_compare_name ?></option>
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
                    
                    window.location.href = "/FYP/admin/bus information.php";
                    
                }
            });
            
        }
        
</script>
<script>
        document.getElementById('bus_info_route').addEventListener('change', function() {
            var routeId = this.value;
            var scheduleSelect = document.getElementById('bus_info_schedule');
            if (routeId) {
                // Make an asynchronous request to fetch the bus schedules for the selected route
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'bus information/fetch_schedules.php?route_id=' + routeId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Parse the JSON response and populate the schedule select element
                        var schedules = JSON.parse(xhr.responseText);
                        var options = '';
                        if (schedules.length > 0) {
                        schedules.forEach(function(schedule) {
                            options += '<option value="' + schedule.bus_schedule_id + '">' + schedule.bus_schedule_id + ' - From ' + schedule.boarding + ' to ' + schedule.alighting + '</option>';
                        });
                    } else {
                        options += '<option value="None">None</option>';
                    }
                        
                        scheduleSelect.innerHTML = options;
                    } else {
                        options += '<option value="None">Error</option>';
                        console.error('Request failed. Status: ' + xhr.status);
                        
                    }
                };
                xhr.send();
                // Show the schedule select element
                document.getElementById('bus_schedule_div').style.display = 'flex';
            } else {
                // Clear and hide the schedule select element
                scheduleSelect.innerHTML = '';
                document.getElementById('bus_schedule_div').style.display = 'none';
            }
        });
    </script>



<!-- If save button is pressed -->
<?php 
    if(isset($_POST['saveprofile']))
    {
        

        $bus_info_license = $_POST['bus_info_license'];
        $bus_info_route = $_POST['bus_info_route'];
        $bus_info_schedule = $_POST['bus_info_schedule'];
        $bus_info_driver = $_POST['bus_info_driver'];
        if($bus_info_schedule === "None")
        {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'You did not select a Bus route or there is no bus schedule.<br>Please select a bus route or different bus route.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
            <?php
            return false;
        }

        if(preg_match($disallowedPattern, $bus_info_license))
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
            return false;
        }

        $sql_edit_check = mysqli_query($conn, "SELECT bus_number_plate, bus_id FROM bus");
        while($row_edit_check = mysqli_fetch_assoc($sql_edit_check))
        {
            
            $check_number_plate = $row_edit_check['bus_number_plate'];
            $check_id = $row_edit_check['bus_id'];

            if($check_id != $bus_info_id)
            {
                if($bus_info_license === $check_number_plate)
                {
                    ?>
                    <script>
                        Swal.fire({
                        title: 'Error!',
                        html: 'The License Plate have existed. <br>Please enter a different License Plate.',
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

        $pattern = '/^[A-Z]{3}[0-9]{4}$/';

        // Use preg_match to match the license plate against the pattern
        if (!preg_match($pattern, $bus_info_license)) {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'You have entered an invalid License Plate.<br>Please Enter a different License Plate.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
            <?php
            return false;
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
                        url: '/FYP/admin/bus information/update_bus_info.php',
                        type: 'POST',
                        data: {
                            num_plate: '<?php echo $bus_info_license ?>',
                            route: '<?php echo $bus_info_route ?>',
                            schedule: '<?php echo $bus_info_schedule ?>',
                            id: '<?php echo $bus_info_id ?>',
                            driver_id: '<?php echo $bus_info_driver ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus information.php';
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
                                    window.location.href = 'bus information.php';
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
