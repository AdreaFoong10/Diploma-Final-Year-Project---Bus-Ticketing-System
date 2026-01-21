

    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 4.5rem; grid-template-columns: 90% auto;">
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

                                                             <!-- Driver Fullname with inline css -->
                                                             <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_fullname"><h4 style="font-size: 1.5em">Driver Fullname : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="bus_driver_fullname" autocomplete="off" placeholder="Fullname" name="bus_driver_fullname" size="25" required>
                                                            </div>

                                                            <!-- Driver Contact Number with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_Co"><h4 style="font-size: 1.5em">Driver Contact Number : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="bus_driver_Co" autocomplete="off" placeholder="Contact Number" maxlength="11" name="bus_driver_Co" size="25" required>
                                                            </div>

                                                            <!-- Driver License expiry date with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_License"><h4 style="font-size: 1.5em">Driver License expiry date : </h4> </label>
                                                                <input type="date" style="flex-direction: row; margin-left: 3.2rem; text-align: center;" autocomplete="off" id="bus_driver_License" placeholder="License" name="bus_driver_License" size="20" required>
                                                            </div>

                                                            <!-- Driver Email with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_driver_email"><h4 style="font-size: 1.5em">Driver Email : </h4> </label>
                                                                <input type="email" style="flex-direction: row; margin-left: 3.05rem;" id="bus_driver_email" autocomplete="off" placeholder="Email" name="bus_driver_email" size="35" required>
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
                    
                    window.location.href = "/FYP/admin/bus driver.php";
                    
                }
            });
            
        }
        
</script>



<?php 
    if(isset($_POST['saveprofile']))
    {
        

        $bus_driver_fullname = $_POST['bus_driver_fullname'];
        $bus_driver_Co = $_POST['bus_driver_Co'];
        $bus_driver_License = $_POST['bus_driver_License'];
        $bus_driver_email = $_POST['bus_driver_email'];


        if (strpos($bus_driver_Co, ' ') !== false) {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'Phone number can\'t contain any spaces.<br>Please enter your information again.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        } elseif ($bus_driver_Co[0] !== '0') {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'The first number of phone number must be 0.<br>Please enter your information again.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        } elseif (preg_match('/[\&!^£$%*()}{@#~?><>,|=+_.¬:\`;]/', $bus_driver_Co) || preg_match('/[a-zA-Z]+/', $bus_driver_Co)) {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'Phone number can\'t contain letter and special character.<br>Please enter your information again.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        } elseif (!preg_match('/^\d{10,11}$/', $bus_driver_Co)) {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'The length of phone number should be 10 or 11 numbers.<br>Please enter your information again.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        }

        // Convert the input date to a DateTime object
        $expiryDateTime = DateTime::createFromFormat('Y-m-d', $bus_driver_License);
        $currentDate = new DateTime();

        // Compare the input date with the current date
        if ($expiryDateTime < $currentDate) {
            ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    html: 'Your driver License have expired.<br>Please enter a different License date or Renew your driver license.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 5000
                });
            </script>
            <?php
            return false;
        }
    

        if(preg_match($disallowedPattern, $bus_driver_fullname) || preg_match($disallowedPattern, $bus_driver_Co) || preg_match($disallowedPattern, $bus_driver_email))
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

        while($row_add_check = mysqli_fetch_assoc($sql_add_check))
        {
            $check_fullname = $row_add_check['driver_fullname'];
            $check_contact = $row_add_check['driver_contact_no'];
            $check_email = $row_add_check['driver_email_address'];

            if($bus_driver_fullname === $check_fullname)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'Your Name have existed. <br>Please enter a different Name.<br><b>Can be your First or Last Name</b>',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }
            else if($bus_driver_Co === $check_contact)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'Your Contact Number have existed. <br>Please enter a different Contact Number.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }
            else if($bus_driver_email === $check_email)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'Your Email have existed. <br>Please enter a different Email.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }
            

        }


        ?>
        <script>
            //Run the sweetalert Asking if wanted to save
            Swal.fire({
                title: 'Do you want to save your data?',
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
                        url: '/FYP/admin/driver/add driver process.php',
                        type: 'POST',
                        data: {
                            email: '<?php echo $bus_driver_email ?>',
                            contact: '<?php echo $bus_driver_Co ?>',
                            fullname: '<?php echo $bus_driver_fullname ?>',
                            license: '<?php echo $bus_driver_License ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus driver.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while saving data. <br>Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus driver.php';
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

