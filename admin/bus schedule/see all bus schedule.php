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

                                                            <!-- Bus Schedule Date with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_date"><h4 style="font-size: 1.5em">Bus Schedule Date : </h4> </label>
                                                                <input type="date" id="bus_s_date" style="flex-direction: row; text-align: center;" placehoder="Date" name="bus_s_date" size="10" value="<?php echo $row_see['bus_schedule_date'] ?>" disabled>
                                                            </div>

                                                            <!-- Bus Schedule Boarding with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_boarding"><h4 style="font-size: 1.5em">Bus Schedule Boarding : </h4> </label>
                                                                <select style="flex-direction: row; text-align: center;" id="bus_s_boarding" placeholder="Boarding" name="bus_s_boarding" disabled>
                                                                    <option value="<?php echo $row_see['boarding'] ?>" selected disabled><?php echo $row_see['boarding'] ?></option>
                                                                    
                                                                </select>
                                                            </div>

                                                            <!-- Bus Schedule Alighting with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_aligth"><h4 style="font-size: 1.5em">Bus Schedule Alighting : </h4> </label>
                                                                <select style="flex-direction: row; text-align: center;" id="bus_s_aligth" placeholder="Alighting" name="bus_s_aligth" disabled>
                                                                    <option value="<?php echo $row_see['alighting'] ?>" selected disabled><?php echo $row_see['alighting'] ?></option>
                                                                    
                                                                </select>
                                                            </div>

                                                            <!-- Bus Schedule Departure Time with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_depart"><h4 style="font-size: 1.5em">Departure Time : </h4> </label>
                                                                <input type="time" style="flex-direction: row; text-align: center;" id="bus_s_depart" placeholder="Departure Time" name="bus_s_depart" size="35" value="<?php echo $dep_time ?>" disabled>
                                                            </div>

                                                            <!-- Bus Schedule Arrival Time with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_arrival"><h4 style="font-size: 1.5em">Arrival Time : </h4> </label>
                                                                <input type="time" style="flex-direction: row; text-align: center;" id="bus_s_arrival" placeholder="Arrival Time" name="bus_s_arrival" size="35" value="<?php echo $dep_time_arrival ?>" disabled>
                                                            </div>

                                                            <!-- Bus Schedule Fare with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_fare"><h4 style="font-size: 1.5em">Fare : </h4> </label>
                                                                <input type="text" style="flex-direction: row; text-align: center;" id="bus_s_fare" placeholder="RM " name="bus_s_fare" size="5" value="<?php echo $row_see['fare'] ?>" disabled>
                                                            </div>

                                                            <!-- Bus Schedule Gate with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_gate"><h4 style="font-size: 1.5em">Gate : </h4> </label>
                                                                <input type="text" style="flex-direction: row; text-align: center;" id="bus_s_gate" placeholder="Gate" name="bus_s_gate" size="10" max="1" value="<?php echo $row_see['gate'] ?>" disabled>
                                                            </div>

                                                            <!-- Bus Operator ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_operator"><h4 style="font-size: 1.5em">Bus Operator : </h4> </label>
                                                                <select style="flex-direction: row;" id="bus_s_operator" placeholder="Bus Operator" name="bus_s_operator" disabled>
                                                                <?php
                                                                    $operator_id_original = $row_see['bus_operator_id'];
                                                                    $get_operator_id_original = "SELECT bus_operator_name FROM bus_operators WHERE bus_operator_id = $operator_id_original";
                                                                    $run_operator_id_original = mysqli_query($conn,$get_operator_id_original);
                                                                    $row_operator_id_original = mysqli_fetch_assoc($run_operator_id_original);
                                                                    $operator_name_original = $row_operator_id_original['bus_operator_name'];
                                                                ?>
                                                                    <option value="<?php echo $row_see['bus_operator_id'] ?>" selected disabled><?php echo $operator_id_original ?> - <?php echo $operator_name_original ?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                            
                                                            <!-- Bus route ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_route"><h4 style="font-size: 1.5em">Bus Route : </h4> </label>
                                                                <select style="flex-direction: row; text-align: center;" id="bus_s_route" placeholder="Bus Route" name="bus_s_route" disabled>
                                                                    <?php
                                                                        $route_id_database = $row_see['route_id'];
                                                                        $sql_get_route_original = "SELECT * FROM route WHERE route_id = $route_id_database";
                                                                        $run_sql_get_route_original = mysqli_query($conn,$sql_get_route_original);
                                                                        $row_sql_get_route_original = mysqli_fetch_assoc($run_sql_get_route_original);

                                                                        $route_starting_point = $row_sql_get_route_original['starting_point'];
                                                                        $route_destination = $row_sql_get_route_original['destination'];

                                                                        
                                                                       

                                                                    ?>
                                                                    <option value="<?php echo $row_see['route_id'] ?>" selected disabled><?php echo $route_id_database ?> , <?php echo $route_starting_point ?> to <?php echo $route_destination ?></option>
                                                                    
                                                                </select>
                                                            </div>

                                                            <!-- Back and Save Button -->
                                                            <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <input type="button" onclick="confirmBack()" value="Back to List" name="backbutton" style="margin-right: 5.3rem;">
                                                                
                                                                
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