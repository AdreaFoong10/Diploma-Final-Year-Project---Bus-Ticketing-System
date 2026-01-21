
<?php
        if(isset($_POST['ID']))
        {
            $name = "Adrea";
        } 
        
        
    ?> 
    


    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 5.5rem; grid-template-columns: 90% auto;">
                                <div class="projects">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3><?php echo $title ?></h3>

                                        </div>

                                        <div class="customers"> 

                                                <div class="card-body">
                                                    <div class="customer">
                                                        <div class="info" style="margin-left: 25rem;  flex-direction: column; align-items: normal;">
                                                        <form method="POST">
                                                            <!-- View or Change Admin Picture with inline css -->
                                                            <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <img src="pictures/default picture.png" width="200px" height="200px" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    <label for="change_pic" class="custom-file-upload" style="font-size: 1.2em;">Change Picture</label>
                                                                    <input type="file" id="change_pic" style="flex-direction: row;">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Admin ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_id"><h4 style="font-size: 1.5em">Admin ID : </h4> </label>
                                                                <input type="text" id="admin_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="admin_id" size="5" value="<?php echo $admin_id ?>">
                                                            </div>

                                                            <!-- Admin Access Level with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_level"><h4 style="font-size: 1.5em">Admin Level : </h4> </label>
                                                                <input type="text" id="admin_level" style="flex-direction: row; margin-left: 1.15rem;" placehoder="level" name="admin_level" size="5" value="">
                                                            </div>

                                                            <!-- Admin Username with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_username"><h4 style="font-size: 1.5em">Username : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="admin_username" placeholder="UserName" name="admin_username" size="35" value="">
                                                            </div>

                                                            <!-- Admin Fullname (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_fullname"><h4 style="font-size: 1.5em">FullName : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="admin_fullname" placeholder="FullName" name="admin_fullname" size="35" value="<?php echo $name ?>">
                                                            </div>

                                                            <!-- Admin Password (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_password"><h4 style="font-size: 1.5em">Password : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.05rem;" id="admin_password" placeholder="Password" name="admin_password" size="35" value="">
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

<?php 
    if(isset($_POST['saveprofile']))
    {
        ?>
        <script>
            Swal.fire({
                title: 'Do you want to save your changes?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        <?php 

                        ?>
                        title: 'Data Have been saved !',
                        icon: 'success',
                        showConfirmButton: true,
                        timer: 1500,
                        willClose: () => {
                            window.location.href = 'staff.php';
                        }
                    });
                }
            });
        </script>
        <?php
    }

?>
