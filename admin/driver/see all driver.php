



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
                                                        
                                                           <!-- Driver ID with inline css -->
                                                           <div style="margin-top: 2rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_id"><h4 style="font-size: 1.5em">Driver ID : </h4> </label>
                                                                <input type="text" id="bus_driver_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="bus_driver_id" size="5" value="<?php echo $driver_see_id ?>" disabled>
                                                            </div>

                                                            <!-- Driver Fullname with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_fullname"><h4 style="font-size: 1.5em">Driver Fullname : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="bus_driver_fullname" placeholder="Fullname" name="bus_driver_fullname" size="25" value="<?php echo $row_see['driver_fullname'] ?>" disabled>
                                                            </div>

                                                            <!-- Driver Contact Number with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_Co"><h4 style="font-size: 1.5em">Driver Contact Number : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="bus_driver_Co" placeholder="Contact Number" name="bus_driver_Co" size="25" value="<?php echo $row_see['driver_contact_no'] ?>" disabled>
                                                            </div>

                                                            <!-- Driver License expiry date with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_License"><h4 style="font-size: 1.5em">Driver License expiry date : </h4> </label>
                                                                <input type="date" style="flex-direction: row; margin-left: 3.2rem; text-align: center;" id="bus_driver_License" placeholder="License" name="bus_driver_License" size="20" value="<?php echo $row_see['driver_licence_expiry_date'] ?>" disabled>
                                                            </div>

                                                            <!-- Driver Email with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_email"><h4 style="font-size: 1.5em">Driver Email : </h4> </label>
                                                                <input type="email" style="flex-direction: row; margin-left: 3.05rem;" id="bus_driver_email" placeholder="Email" name="bus_driver_email" size="35" value="<?php echo $row_see['driver_email_address'] ?>" disabled>
                                                            </div>

                                                            <!-- Back Button -->
                                                            <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">                                                           
                                                                <input type="button" onclick="confirmBack()" value="Back to List" name="backbutton" style="margin-right: 5.3rem;">
                                                                
                                                                
                                                               
                                                            </div>
                                                        
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
                    
                    window.location.href = "/FYP/admin/bus driver.php";
                    
                }
            });
            
        }

</script>
