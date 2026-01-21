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
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <!-- View or Change Admin Picture with inline css -->
                                            

                                                            <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <img src="pictures/<?php echo $picture_operator ?>" id="pic_now" style="max-width: 300px; max-height: 200px;" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    <label for="change_pic" class="custom-file-upload" style="font-size: 1.2em;">Change Picture</label>
                                                                    <input type="file" id="change_pic" style="flex-direction: row;" name="change_pic" onchange="showImage(this)">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Bus Operator ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="operator_id"><h4 style="font-size: 1.5em">Operator ID : </h4> </label>
                                                                <input type="text" id="operator_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="operator_id" size="5" value="<?php echo $bus_operator_id ?>" disabled>
                                                            </div>


                                                            <!-- Bus Operator Name with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="operator_name"><h4 style="font-size: 1.5em">Operator Name : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="operator_name" placeholder="Name" name="operator_name" size="35" value="<?php echo $row_edit['bus_operator_name'] ?>" required>
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
<!-- if admin inserted a pciture, it will display the image to the img src attribute -->        
<script>
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('pic_now').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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
                    
                    window.location.href = "/FYP/admin/bus operator.php";
                    
                }
            });
            
        }
        
</script>

<!-- Check user level and data level -->



<!-- If save button is pressed -->
<?php 
    if(isset($_POST['saveprofile']))
    {
        
        
        if(isset($_FILES['change_pic']) && $_FILES['change_pic']['error'] == UPLOAD_ERR_OK)
        {
          // Get the uploaded file details
          $file_name = $_FILES['change_pic']['name'];
          $file_tmp = $_FILES['change_pic']['tmp_name'];
          
           // Move the uploaded file to the server
          $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/pictures/';
          $upload_file = $upload_dir . basename($file_name);
          $valid_extensions = array('jpeg', 'jpg', 'png');
          $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
          //Check if the file format is correct
          if (!in_array($file_ext, $valid_extensions)) {
              ?>
              <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'It seems that you have inserted the wrong file format. Please insert the correct format <b>("jpeg", "jpg", "png")</b>',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
          <?php
           return false;
          }
          else
          {
            $picture = basename($file_name);
            move_uploaded_file($file_tmp, $upload_file);
          }
        }
        else
        {
            $picture = "";
        }

        $operator_name = $_POST['operator_name'];

        if(preg_match($disallowedPattern, $operator_name))
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

        $sql_edit_check = mysqli_query($conn, "SELECT bus_operator_id, bus_operator_name, bus_operator_pic FROM bus_operators");
        while($row_edit_check = mysqli_fetch_assoc($sql_edit_check))
        {
            $check_name = $row_edit_check['bus_operator_name'];
            $check_id = $row_edit_check['bus_operator_id'];

            if($check_id != $bus_operator_id)
            {
                if($operator_name === $check_name)
                {
                    ?>
                    <script>
                        Swal.fire({
                        title: 'Error!',
                        html: 'Your Operator Name have existed. <br>Please enter a different Bus operator name.',
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
                        url: '/FYP/admin/bus operator/update_operator.php',
                        type: 'POST',
                        data: {
                            name: '<?php echo $operator_name ?>',
                            id: '<?php echo $bus_operator_id ?>',
                            pic: '<?php echo $picture ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus operator.php';
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
                                    window.location.href = 'bus operator.php';
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
