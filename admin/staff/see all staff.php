



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
                                                        
                                                            <!-- View or Change Admin Picture with inline css -->
                                                            <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <img src="pictures/<?php echo $picture_admin; ?>" width="200px" height="200px" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Admin ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_id"><h4 style="font-size: 1.5em">Admin ID : </h4> </label>
                                                                <input type="text" id="admin_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="admin_id" size="5" value="<?php echo $admin_id ?>" disabled>
                                                            </div>

                                                            <!-- Admin Access Level with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_level"><h4 style="font-size: 1.5em">Admin Level : </h4> </label>
                                                                <select id="admin_level" style="flex-direction: row; margin-left: 1.15rem; width: 3.7rem;" placehoder="level" name="admin_level" disabled>
                                                                    <option value="<?php echo $row_see['admin_level'] ?>" disabled selected ><?php echo $row_see['admin_level'] ?></option>
                                                                </select>
                                                            </div>

                                                            <!-- Admin Username with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_username"><h4 style="font-size: 1.5em">Username : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="admin_username" placeholder="UserName" name="admin_username" size="35" value="<?php echo $row_see['admin_username'] ?>" disabled>
                                                            </div>

                                                            <!-- Admin Fullname (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_fullname"><h4 style="font-size: 1.5em">FullName : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="admin_fullname" placeholder="FullName" name="admin_fullname" size="35" value="<?php echo $row_see['admin_fullname'] ?>" disabled>
                                                            </div>

                                                            <!-- Admin Email with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_email"><h4 style="font-size: 1.5em">Emaill Address : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="admin_email" placeholder="Email Address" name="admin_email" size="35" value="<?php echo $row_see['admin_email_address'] ?>" disabled>
                                                            </div>


                                                            <?php
                                                                if($admin_profile_level === "2" && $row_see['admin_level'] === "1")
                                                                {
                                                                ?>
                                                            <!-- Admin Password (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_password"><h4 style="font-size: 1.5em">Password : </h4> </label>
                                                                <input type="password" style="flex-direction: row; margin-left: 3.05rem;" id="admin_password" name="admin_password" value="<?php echo $row_see['admin_password'] ?>" disabled>
                                                                
                                                            </div>
                                                            <?php
                                                                }
                                                                ?>

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
                    
                    window.location.href = "/FYP/admin/staff.php";
                    
                }
            });
            
        }

</script>
