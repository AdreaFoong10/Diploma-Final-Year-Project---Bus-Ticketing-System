
<?php
        
        
        
    ?> 
    


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
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <!-- View or Change Admin Picture with inline css -->
                                                            <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <img src="pictures/default picture.png" id="pic_now" width="200px" height="200px" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    <label for="change_pic_add" class="custom-file-upload" style="font-size: 1.2em;">Change Picture</label>
                                                                    <input type="file" id="change_pic_add" style="flex-direction: row;" name="change_pic_add" onchange="showImage(this)">
                                                                </div>
                                                            </div>
                                                            

                                                            <!-- Admin Access Level with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_level"><h4 style="font-size: 1.5em">Admin Level : </h4> </label>
                                                                <select id="admin_level" style="flex-direction: row; margin-left: 1.15rem; width: 7rem;" placehoder="level" name="admin_level" required>
                                                                    <option value="" selected>Level</option>
                                                                    <option value="1">Admin</option>
                                                                </select>
                                                            </div>

                                                            <!-- Admin Username with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_username_add"><h4 style="font-size: 1.5em">Username : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="admin_username_add" autocomplete="off" placeholder="UserName" name="admin_username_add" size="35" required>
                                                            </div>

                                                            <!-- Admin Fullname (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_fullname_add"><h4 style="font-size: 1.5em">FullName : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="admin_fullname_add" autocomplete="off" placeholder="FullName" name="admin_fullname_add" size="35" required>
                                                            </div>

                                                            <!-- Admin Email with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_email"><h4 style="font-size: 1.5em">Emaill Address : </h4> </label>
                                                                <input type="email" style="flex-direction: row; margin-left: 3.2rem;" id="admin_email" autocomplete="off" placeholder="Email Address" name="admin_email" size="35" required>
                                                            </div>

                                                            <!-- Admin Password (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_password"><h4 style="font-size: 1.5em">Password : </h4> </label>
                                                                <input type="password" style="flex-direction: row; margin-left: 3.05rem;" id="admin_password" placeholder="Password" autocomplete="off" name="admin_password" size="25" required oninput="checkPasswordStrength(this.value)">
                                                                
                                                                <input type="checkbox" style="flex-direction: row; margin-left: 2rem; justify-content: center; align-items: center;" id="admin_pass" onclick="togglePassword()">  
                                                                <label for="admin_pass" style="display: flex; justify-content: center; align-items: center;">Show password</label>
                                                                
                                                            </div>
                                                            <div style="margin-left:11.5rem;"><span class="err_msg" id="checkpwstrength"></span></div>
                                                            <div style="margin-left:11.5rem;"><span class="err_msg" id="checkpwstrength_requirment"></span></div>

                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="admin_password_confirm"><h4 style="font-size: 1.5em">Confirm Password : </h4> </label>
                                                                <input type="password" style="flex-direction: row; margin-left: 1rem;" id="admin_password_confirm" placeholder="Password" autocomplete="off" name="admin_password_confirm" size="25" required>

                                                                <input type="checkbox" style="flex-direction: row; margin-left: 2rem; justify-content: center; align-items: center;" id="admin_pass_check" onclick="togglePasswordcheck()">  
                                                                <label for="admin_pass_check" style="display: flex; justify-content: center; align-items: center;">Show password</label>
                                                            </div>

                                                            <!-- Back and Save Button -->
                                                            <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">                                                           
                                                                <input type="button" onclick="confirmBack()" value="Back to List" name="backbutton" style="margin-right: 5.3rem;">
                                                                
                                                                <input type="submit" value="Save" name="saveprofile" id="saveprofile">
                                                               
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
function togglePassword() {
  var passwordField = document.getElementById("admin_password");
  var showPasswordCheckbox = document.getElementById("admin_pass");

  if (showPasswordCheckbox.checked) {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>


<script>
function togglePasswordcheck() {
  var passwordField = document.getElementById("admin_password_confirm");
  var showPasswordCheckbox = document.getElementById("admin_pass_check");

  if (showPasswordCheckbox.checked) {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>

<script>
    var disallowedPattern =  /(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i;
    function checkPasswordStrength(password) {
        if (password.length <= 5 || !/[ `!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
            document.getElementById("checkpwstrength").innerHTML = "Password is weak";
            document.getElementById("checkpwstrength_requirment").innerHTML = "Need to have including a special character, Lower case, Upper case, 3 numbers and minimum 8 chararcters";
            document.getElementById("checkpwstrength").style.color = "red";
            document.getElementById("checkpwstrength").style.opacity = "1";
            document.getElementById("saveprofile").style.backgroundColor = "gray";
            document.getElementById("saveprofile").style.borderColor = "gray";
            $('#saveprofile').prop('disabled', true);
        } else if (password.length < 8 && password.length > 5 || !/[ `!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
            document.getElementById("checkpwstrength").innerHTML = "Password is medium";
            document.getElementById("checkpwstrength_requirment").innerHTML = "Need to have including a special character, Lower case, Upper case, 3 numbers and minimum 8 chararcters";
            document.getElementById("checkpwstrength").style.color = "orange";
            document.getElementById("checkpwstrength").style.opacity = "1";
            document.getElementById("saveprofile").style.backgroundColor = "gray";
            document.getElementById("saveprofile").style.borderColor = "gray";
            $('#saveprofile').prop('disabled', true);
        }
        else if(password.indexOf(' ') !== -1)
        {
            document.getElementById("checkpwstrength").innerHTML="Password can't contain any spaces";
            
            document.getElementById("checkpwstrength").style.color="red";
            document.getElementById("checkpwstrength").style.opacity="1";
            document.getElementById("saveprofile").style.backgroundColor = "gray";
            document.getElementById("saveprofile").style.borderColor = "gray";
            $('#saveprofile').prop('disabled',true);
        } 
        else if (password.length >= 8 && /[ `!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?~]/.test(password) && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
            document.getElementById("checkpwstrength").innerHTML = "Password is strong";
            document.getElementById("checkpwstrength_requirment").innerHTML = "";
            document.getElementById("checkpwstrength").style.color = "#33cc33";
            document.getElementById("checkpwstrength").style.opacity = "1";
            document.getElementById("saveprofile").style.backgroundColor = "var(--main-color)";
            document.getElementById("saveprofile").style.borderColor = "var(--main-color)";
            $('#saveprofile').prop('disabled', false);
        }
        else if(disallowedPattern.test(password))
        {
            document.getElementById("checkpwstrength").innerHTML = "This Password Pattern is disallow";
            
            document.getElementById("checkpwstrength").style.color = "#33cc33";
            document.getElementById("checkpwstrength").style.opacity = "1";
            document.getElementById("saveprofile").style.backgroundColor = "var(--main-color)";
            document.getElementById("saveprofile").style.borderColor = "var(--main-color)";
            $('#saveprofile').prop('disabled', false);
        }
         else {
            document.getElementById("checkpwstrength").style.opacity = "0";
            document.getElementById("saveprofile").style.backgroundColor = "var(--main-color)";
            document.getElementById("saveprofile").style.borderColor = "var(--main-color)";
            $('#saveprofile').prop('disabled', false);
        }
    }

</script>





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


<?php 



    if(isset($_POST['saveprofile']))
    {
          

        
        if(isset($_FILES['change_pic_add']) && $_FILES['change_pic_add']['error'] == UPLOAD_ERR_OK)
        {
          // Get the uploaded file details
          $file_name = $_FILES['change_pic_add']['name'];
          $file_tmp = $_FILES['change_pic_add']['tmp_name'];
          
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
                      html: 'It seems that you have inserted the wrong file format. Please insert the correct format <br><b>("jpeg", "jpg", "png")</b>',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
          <?php
           exit;
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

        $admin_pass_check = $_POST['admin_password'];
        $admin_pass = $_POST['admin_password_confirm'];
        $admin_username = $_POST['admin_username_add'];
        $admin_fullname = $_POST['admin_fullname_add'];
        $admin_level = $_POST['admin_level'];
        $admin_email = $_POST['admin_email'];

        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'You have entered an invalid Emaill Address. <br>Please enter a correct Email Address.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 5000
                  });
              </script>
            <?php
            return false;
        }

        if(preg_match($disallowedPattern, $admin_pass) || preg_match($disallowedPattern, $admin_username) || preg_match($disallowedPattern, $admin_pass_check) || preg_match($disallowedPattern, $admin_fullname) || preg_match($disallowedPattern, $admin_email))
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

        if($admin_pass_check != $admin_pass)
        {
            ?>
            <script>
                   Swal.fire({
                      title: 'Error!',
                      html: 'You have entered different passwords. <br>Please check your password before proceeding',
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
            $check_fullname = $row_add_check['admin_fullname'];
            $check_username = $row_add_check['admin_username'];
            $check_email = $row_add_check['admin_email_address'];

            if($admin_email === $check_email)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'The Emaill Address have existed. <br>Please enter a different Email Address.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }

            if($admin_username === $check_username)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'The Username have existed. <br>Please enter a different Username.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }
            else if($admin_fullname === $check_fullname)
            {
                ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'Your fullname have existed. <br>Please enter a different Fullname. <br><i><b>Can be your First or Last name</b></i>',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
            }

        }

        if($admin_pass ==="")
        {
            ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'You did not enter your password. <br>Please enter your password.',
                      icon: 'error',
                      showConfirmButton: true,
                      timer: 8500
                  });
                </script>
                <?php
                
                return false;
        }
    



        if($admin_pass_check ==="")
        {
            ?>
                <script>
                     Swal.fire({
                      title: 'Error!',
                      html: 'You did not enter your password. <br>Please enter your password.',
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
                        url: '/FYP/admin/staff/add staff process.php',
                        type: 'POST',
                        data: {
                            level: '<?php echo $admin_level ?>',
                            username: '<?php echo $admin_username ?>',
                            fullname: '<?php echo $admin_fullname ?>',
                            pass: '<?php echo $admin_pass ?>',
                            pic: '<?php echo $picture ?>',
                            email: '<?php echo $admin_email ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'staff.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                html: 'There was an error while saving data. <br>Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
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

?>

