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
                                                        
                                                        <!-- Form for Submit -->
                                                        <form method="POST">
                                                            <!-- Bus Schedule ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_id"><h4 style="font-size: 1.5em">Bus Schedule ID : </h4> </label>
                                                                <input type="text" id="bus_s_id" style="flex-direction: row; text-align: center;" placehoder="ID" name="bus_s_id" size="5" value="<?php echo $bus_schedule_id ?>" disabled>
                                                            </div>

                                                             <!-- Bus route ID with inline css -->
                                                             <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_route"><h4 style="font-size: 1.5em">Bus Route : </h4> </label>
                                                                <select style="flex-direction: row;" id="bus_s_route" placeholder="Bus Route" name="bus_s_route" required>
                                                                    <?php
                                                                        $route_id_database = $row_edit['route_id'];
                                                                        $sql_get_route_original = "SELECT * FROM route WHERE route_id = $route_id_database";
                                                                        $run_sql_get_route_original = mysqli_query($conn,$sql_get_route_original);
                                                                        $row_sql_get_route_original = mysqli_fetch_assoc($run_sql_get_route_original);

                                                                        $route_starting_point = $row_sql_get_route_original['starting_point'];
                                                                        $route_destination = $row_sql_get_route_original['destination'];

                                                                        

                                                                    ?>
                                                                    <option value="<?php echo $row_edit['route_id'] ?>" selected><?php echo $route_id_database ?> - <?php echo $route_starting_point ?> to <?php echo $route_destination ?></option>
                                                                    <?php
                                                                            $get_route_sql = "SELECT route_id, starting_point, destination FROM route";
                                                                            $run_route_sql = mysqli_query($conn,$get_route_sql);

                                                                            

                                                                        while($row_route_sql = mysqli_fetch_assoc($run_route_sql))
                                                                        {
                                                                            
                                                                            

                                                                        ?>
                                                                        <option value="<?php echo $row_route_sql['route_id'] ?>"><?php echo $row_route_sql['route_id'] ?> - <?php echo $row_route_sql['starting_point'] ?> to <?php echo $row_route_sql['destination'] ?></option>
                                                                        <?php
                                                                            
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <!-- Bus Schedule Date with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_date"><h4 style="font-size: 1.5em">Bus Schedule Date : </h4> </label>
                                                                <input type="date" id="bus_s_date" style="flex-direction: row;" placehoder="Date" name="bus_s_date" size="10" value="<?php echo $row_edit['bus_schedule_date'] ?>" required>
                                                            </div>


                                                            <!-- Bus Schedule Departure Time with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_depart"><h4 style="font-size: 1.5em">Departure Time : </h4> </label>
                                                                <input type="time" style="flex-direction: row;" id="bus_s_depart" placeholder="Departure Time" name="bus_s_depart" size="35" value="<?php echo $dep_time ?>" required>
                                                            </div>

                                                            <!-- Bus Schedule Arrival Time with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_arrival"><h4 style="font-size: 1.5em">Arrival Time : </h4> </label>
                                                                <input type="time" style="flex-direction: row;" id="bus_s_arrival" placeholder="Arrival Time" name="bus_s_arrival" size="35" value="<?php echo $dep_time_arrival ?>" required>
                                                            </div>

                                                            <!-- Bus Schedule Fare with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_fare"><h4 style="font-size: 1.5em">Fare : </h4> </label>
                                                                <input type="number" style="flex-direction: row; text-align: center;" id="bus_s_fare" placeholder="RM " min="1" name="bus_s_fare" size="5" value="<?php echo $row_edit['fare'] ?>" required>
                                                            </div>

                                                            <!-- Bus Schedule Gate with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_gate"><h4 style="font-size: 1.5em">Gate : </h4> </label>
                                                                <input type="text" style="flex-direction: row; text-align: center;" id="bus_s_gate" placeholder="Gate" name="bus_s_gate" size="10" maxlength="1" value="<?php echo $row_edit['gate'] ?>" required>
                                                            </div>

                                                            <!-- Bus Operator ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_operator"><h4 style="font-size: 1.5em">Bus Operator : </h4> </label>
                                                                <select style="flex-direction: row; text-align: center;" id="bus_s_operator" placeholder="Bus Operator" name="bus_s_operator" required>
                                                                <?php
                                                                    $operator_id_original = $row_edit['bus_operator_id'];
                                                                    $get_operator_id_original = "SELECT bus_operator_name FROM bus_operators WHERE bus_operator_id = $operator_id_original";
                                                                    $run_operator_id_original = mysqli_query($conn,$get_operator_id_original);
                                                                    $row_operator_id_original = mysqli_fetch_assoc($run_operator_id_original);
                                                                    $operator_name_original = $row_operator_id_original['bus_operator_name'];
                                                                ?>
                                                                    <option value="<?php echo $row_edit['bus_operator_id'] ?>" selected><?php echo $operator_id_original ?> - <?php echo $operator_name_original ?></option>
                                                                    <?php
                                                                            $get_operator_id = "SELECT bus_operator_id, bus_operator_name FROM bus_operators";
                                                                            $run_operator_id = mysqli_query($conn,$get_operator_id);
                                                                        while($row_operator_id = mysqli_fetch_assoc($run_operator_id))
                                                                        {
                                                                        ?>
                                                                        <option value="<?php echo $row_operator_id['bus_operator_id'] ?>"><?php echo $row_operator_id['bus_operator_id'] ?> - <?php echo $row_operator_id['bus_operator_name'] ?></option>
                                                                        <?php
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
                    
                    window.location.href = "/FYP/admin/bus schedule.php";
                    
                }
            });
            
        }
        
</script>

<!-- If save button is pressed -->
<?php 
    if(isset($_POST['saveprofile']))
    {
        $bus_s_date = $_POST['bus_s_date'];
        
        
        $bus_s_gate = $_POST['bus_s_gate'];
        $bus_s_depart_time = $_POST['bus_s_depart'];
        $bus_s_arrival_time = $_POST['bus_s_arrival'];

        $bus_s_fare = $_POST['bus_s_fare'];

        $bus_route_id = $_POST['bus_s_route'];
        $bus_operator_id = $_POST['bus_s_operator'];


        $get_sql_bus_schedule_ST_Dp = mysqli_query($conn, "SELECT starting_point, destination FROM route WHERE route_id = $bus_route_id");
        $run_sql_bus_schedule_ST_Dp = mysqli_fetch_assoc($get_sql_bus_schedule_ST_Dp);
        $start_name = $run_sql_bus_schedule_ST_Dp['starting_point'];
        $des_name = $run_sql_bus_schedule_ST_Dp['destination'];

        $bus_s_boarding = $start_name." Sentral";
        $bus_s_aligth = $des_name." Sentral";
        
        
        $time_parts = explode(':', $bus_s_depart_time); // split the time string into hour and minute components
        $hour_depart = (int) $time_parts[0]; // extract the hour as an integer
        $minute_depart = (int) $time_parts[1]; // extract the minute as an integer

        $departure_time_changed = sprintf("%02d.%02d", $hour_depart, $minute_depart); // format the time as hh:mm

        $time_parts_arrival = explode(':', $bus_s_arrival_time); // split the time string into hour and minute components
        $hour_arrival = (int) $time_parts_arrival[0]; // extract the hour as an integer
        $minute_arrival = (int) $time_parts_arrival[1]; // extract the minute as an integer

        
        $arrival_time_changed = sprintf("%02d.%02d", $hour_arrival, $minute_arrival); // format the time as hh:mm
        
         // Create DateTime objects for the two time values
         $datetime1 = DateTime::createFromFormat('H:i', $bus_s_depart_time);
         $datetime2 = DateTime::createFromFormat('H:i', $bus_s_arrival_time);
 
         // Calculate the time difference
         $time_diff = $datetime1->diff($datetime2);
 
         // Retrieve the hours and minutes from the time difference
         $hours = $time_diff->h;
         $minutes = $time_diff->i;
 
         $duration = sprintf("%02d.%02d", $hours, $minutes);

         $expiryDateTime = DateTime::createFromFormat('Y-m-d', $bus_s_date);
        $currentDate = new DateTime();

        // Compare the input date with the current date
        if ($expiryDateTime < $currentDate) {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'The Date you chosen have passed.<br>Please enter a new Date.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        }


        if($bus_s_gate !== "A" && $bus_s_gate !== "B" && $bus_s_gate !== "C" && $bus_s_gate !== "D" && $bus_s_gate !== "E")
        {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'The Gate is incorrect. Please enter from A to E',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
            <?php
            return false;
            
        }


        $check_bus_schedule_date = mysqli_query($conn, "SELECT * FROM bus_schedule WHERE bus_schedule_date = '$bus_s_date'");
        while($run_check_bus_schedule_date = mysqli_fetch_assoc($check_bus_schedule_date))
        {
            $check_bus_schedule_id = $run_check_bus_schedule_date['bus_schedule_id'];
            $check_route_id = $run_check_bus_schedule_date['route_id'];
            $check_operator_id = $run_check_bus_schedule_date['bus_operator_id'];
            $check_depart_time = $run_check_bus_schedule_date['departure_time'];
            $check_arrivale_time = $run_check_bus_schedule_date['arrival_time'];

            $get_float_time = explode('.', $check_depart_time); // split the time string into hour and minute components
            $hour_check_depart = (int) $get_float_time[0]; // extract the hour as an integer
            $minute_check_depart = (int) $get_float_time[1]; // extract the minute as an integer
    
            
            $get_check_depart = sprintf("%02d.%02d", $hour_check_depart, $minute_check_depart); // format the time as hh:mm

            $get_float_time_arr = explode('.', $check_arrivale_time); // split the time string into hour and minute components
            $hour_check_arr = (int) $get_float_time_arr[0]; // extract the hour as an integer
            $minute_check_arr = (int) $get_float_time_arr[1]; // extract the minute as an integer
    
            
            $get_check_arr = sprintf("%02d.%02d", $hour_check_arr, $minute_check_arr); // format the time as hh:mm

            if($bus_schedule_id !== $check_bus_schedule_id)
            {
                if($bus_route_id === $check_route_id)
                {
                    ?>
                    <script>
                           Swal.fire({
                              title: 'Error!',
                              html: 'The Route based on Bus Schedule Date that you selected is existed.<br>Please enter a Different Route or Different Time.',
                              icon: 'error',
                              showConfirmButton: true,
                              timer: 5000
                          });
                      </script>
                    <?php
                    return false;
                }
                if($bus_operator_id === $check_operator_id)
                {
                    ?>
                    <script>
                           Swal.fire({
                              title: 'Error!',
                              html: 'The Bus Operator based on Bus Schedule Date that you selected is existed.<br>Please enter a Different Bus Operator.',
                              icon: 'error',
                              showConfirmButton: true,
                              timer: 5000
                          });
                      </script>
                    <?php
                    return false;
                }
                if($departure_time_changed === $get_check_depart)
                {
                    ?>
                    <script>
                           Swal.fire({
                              title: 'Error!',
                              html: 'The Departure time based on Bus Schedule Date that you selected is existed.<br>Please enter a Different Departure Time.',
                              icon: 'error',
                              showConfirmButton: true,
                              timer: 5000
                          });
                      </script>
                    <?php
                    return false;
                }
                if($arrival_time_changed === $get_check_arr)
                {
                    ?>
                    <script>
                           Swal.fire({
                              title: 'Error!',
                              html: 'The Arrival Time based on Bus Schedule Date that you selected is existed.<br>Please enter a Different Arrival Time.',
                              icon: 'error',
                              showConfirmButton: true,
                              timer: 5000
                          });
                      </script>
                    <?php
                    return false;
                }
            }
        }


         


         $get_sql_bus_schedule_time = mysqli_query($conn, "SELECT bus_schedule_id, departure_time, arrival_time FROM bus_schedule WhERE route_id = $bus_route_id");
        while($row_sql_bus_schedule_time = mysqli_fetch_assoc($get_sql_bus_schedule_time))
        {
            $bus_schedule_id_nd = $row_sql_bus_schedule_time['bus_schedule_id'];
            $depart_check = $row_sql_bus_schedule_time['departure_time'];
            $arrival_check = $row_sql_bus_schedule_time['arrival_time'];


            $get_float_time = explode('.', $depart_check); // split the time string into hour and minute components
            $hour_check_depart = (int) $get_float_time[0]; // extract the hour as an integer
            $minute_check_depart = (int) $get_float_time[1]; // extract the minute as an integer
    
            
            $get_check_depart = sprintf("%02d.%02d", $hour_check_depart, $minute_check_depart); // format the time as hh:mm

            $get_float_time_arr = explode('.', $arrival_check); // split the time string into hour and minute components
            $hour_check_arr = (int) $get_float_time_arr[0]; // extract the hour as an integer
            $minute_check_arr = (int) $get_float_time_arr[1]; // extract the minute as an integer
    
            
            $get_check_arr = sprintf("%02d.%02d", $hour_check_arr, $minute_check_arr); // format the time as hh:mm
            
            if($bus_schedule_id !== $bus_schedule_id_nd)
            {
                if($get_check_depart === $departure_time_changed && $get_check_arr === $arrival_time_changed)
                {
                    ?>
                <script>
                       Swal.fire({
                          title: 'Error!',
                          html: 'The Departure time and Arrival Time based on the Route is existed.<br>Please enter a Different time or Route.',
                          icon: 'error',
                          showConfirmButton: true,
                          timer: 5000
                      });
                  </script>
                <?php
                return false;
                }
            }
            
        }

        if($bus_s_fare <= 0)
        {
            ?>
             <script>
                    Swal.fire({
                       title: 'Error!',
                       html: 'You have entered an invalid Fare.<br> Please enter a minimum of RM1 or above Fare.',
                       icon: 'error',
                       showConfirmButton: true,
                       timer: 5000
                   });
               </script>
             <?php
             return false;
        }

         if(preg_match($disallowedPattern, $bus_s_gate))
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


        if($bus_s_boarding === $bus_s_aligth)
        {
            ?>
            <script>
                Swal.fire({
                title: 'Error!',
                html: 'You have selected the <b>Same</b> Sentral.<br> Please Select different route.',
                icon: 'error',
                showConfirmButton: true,
                timer: 8500
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
                        url: '/FYP/admin/bus schedule/update_bus_schedule.php',
                        type: 'POST',
                        data: {
                            date: '<?php echo $bus_s_date ?>',
                            boarding: '<?php echo $bus_s_boarding ?>',
                            alight: '<?php echo $bus_s_aligth ?>',
                            time_depart: '<?php echo $departure_time_changed ?>',
                            time_arrival: '<?php echo $arrival_time_changed ?>',
                            fare: '<?php echo $bus_s_fare ?>',
                            route_id: '<?php echo $bus_route_id ?>',
                            operator_id: '<?php echo $bus_operator_id ?>',
                            id: '<?php echo $bus_schedule_id ?>',
                            duration: '<?php echo $duration ?>',
                            bus_gate :  '<?php echo $bus_s_gate ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus schedule.php';
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
                                    window.location.href = 'bus schedule.php';
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
