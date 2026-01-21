<?php
  session_start(); 
  $_SESSION['title']= NULL;
  $_SESSION['ID_edit']= NULL;
  $_SESSION['ID_see_all'] = NULL;
  $_SESSION['title_see_all']= NULL;
  $_SESSION['add'] = NULL;
  $_SESSION['title_add'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/Default style.css?v=1">
    <link rel="stylesheet" href="css/style 2.css?v=1">
    <link rel="stylesheet" href="css/style 3.css?v=1">
    <title>Profile Setting Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $setting="active"; ?>
<?php $title ="Account"; ?>
<?php $search_edit = 0; ?>
<?php $search_see_all = 0; ?>
<?php $add_process = 0; ?>
<?php $search_profile =1; ?>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/sidebar.php'; ?>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/admin/process/login check status.php';   ?>


<!-- SQL Database  / Need to Change $ID when finalized-->
<?php
    $sql_admin = mysqli_query($conn, "SELECT admin_id, admin_fullname, admin_username, admin_password, admin_pic, admin_level FROM admin WHERE admin_id = $admin_profile_id");
    $row_admin = mysqli_fetch_assoc($sql_admin);

    //Check if admin have picture
    if($row_admin['admin_pic'] == NULL)
    {
        $picture_admin = "default picture.png";
    }
    else
    {
        $picture_admin = $row_admin['admin_pic'];
    }
    $display_level = "";
    if($row_admin['admin_level'] === "1")
    {
        $display_level = "Admin";
    }
    else if($row_admin['admin_level'] === "2")
    {
        $display_level = "SuperAdmin";
    }

?>


    <div class="recent-grid" style="margin-top: 7.5rem; margin-left: 4.8rem; grid-template-columns: 95% auto;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 2px solid #f0f0f0;">
                            <h3 style="font-size: 1.5em;">Account Details</h3>

                        </div>

                        <div class="customers"> 

                                <div class="card-body">
                                    <div class="customer">
                                        <div class="info" style="margin-left: 8rem;  flex-direction: column; align-items: normal;">
                                        <form method="POST" enctype="multipart/form-data">
                                                    <!-- View or Change Admin Picture with inline css -->
                                            

                                                    <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <img src="pictures/<?php echo $picture_admin ?>" id="pic_now" width="200px" height="200px" alt="">

                                                        <!-- Change File / Picture Button with inline css -->
                                                        <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                            <label for="change_pic" class="custom-file-upload" style="font-size: 1.2em;">Change Picture</label>
                                                            <input type="file" id="change_pic" style="flex-direction: row;" name="change_pic" onchange="showImage(this)">
                                                        </div>
                                                    </div>
                                                        
                                                    <!-- Admin ID with inline css -->
                                                    <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <label for="admin_id"><h4 style="font-size: 1.5em">Admin ID : </h4> </label>
                                                        <input type="text" id="admin_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="admin_id" size="5" value="<?php echo $row_admin['admin_id'] ?>" disabled>
                                                    </div>

                                                            <!-- Admin Access Level with inline css -->
                                                    <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <label for="admin_levels"><h4 style="font-size: 1.5em">Admin Level : </h4> </label>
                                                        <select id="admin_levels" style="flex-direction: row; margin-left: 1.15rem; width: 7rem;" placehoder="level" name="admin_levels" disabled>
                                                            <option value="<?php echo $row_admin['admin_level'] ?>" selected><?php echo $display_level ?></option>
                                                        </select>
                                                    </div>

                                                    <!-- Admin Username with inline css-->
                                                    <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <label for="admin_username"><h4 style="font-size: 1.5em">Username : </h4> </label>
                                                        <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="admin_username" placeholder="UserName" name="admin_username" size="35" value="<?php echo $row_admin['admin_username'] ?>" readonly>
                                                    </div>

                                                    <!-- Admin Fullname (Real Name) with inline css -->
                                                    <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <label for="admin_fullname"><h4 style="font-size: 1.5em">FullName : </h4> </label>
                                                        <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="admin_fullname" placeholder="FullName" name="admin_fullname" size="35" value="<?php echo $row_admin['admin_fullname'] ?>" required>
                                                    </div>

                                                    <!-- Admin Password with inline css
                                                    <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                        <label for="admin_password"><h4 style="font-size: 1.5em">Password : </h4> </label>
                                                        <input type="text" style="flex-direction: row; margin-left: 3.05rem;" id="admin_password" placeholder="Password" name="admin_password" size="35" value="<?php// echo $row_admin['admin_password'] ?>">
                                                    </div>-->
                                                    <br><br>
                                                    <hr>
                                                    <!-- Admin Current Password with inline css -->
                                                    <br>
                                                    <h2 style="margin-left: 1rem;">Reset Password</h2>
                                                    <table>
                                                        <tr style="margin-top: 5rem;">
                                                            <td ><label for="current_admin_password"><h4 style="font-size: 1.5em">Current Password : </h4> </label></td>
                                                            <td style="padding: 1.5rem;"><input type="text" style="text-align:center; margin-left: 3.05rem; height: 2rem;" autocomplete="off" id="current_admin_password" placeholder="Password" name="current_admin_password" size="35"></td>
                                                        </tr>
                                                        <tr style="margin-top: 5rem;">
                                                            <td><label for="new_admin_password"><h4 style="font-size: 1.5em">New Password : </h4> </label></td>
                                                            <td style="padding: 1.5rem;"><input type="text" style="text-align:center; margin-left: 3.05rem; height: 2rem;" autocomplete="off" id="new_admin_password" placeholder="Password" name="new_admin_password" size="35"></td>
                                                        </tr>
                                                        <tr style="margin-top: 5rem;">
                                                            <td><label for="confirm_admin_password"><h4 style="font-size: 1.5em">Confirm New Password : </h4> </label></td>
                                                            <td style="padding: 1.5rem;"><input type="text" style="text-align:center; margin-left: 3.05rem; height: 2rem;" autocomplete="off" id="confirm_admin_password" placeholder="Password" name="confirm_admin_password" size="35"></td>
                                                        </tr>
                                                    </table>

                                                    <!-- Back and Save Button -->
                                                    <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">                                                           
                                                    
                                                                
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
</div>
</body>
</html>

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

<!-- If save button is pressed -->
<?php 
    if(isset($_POST['saveprofile']))
    {
        
        $disallowedPattern = '/(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i';
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

        $admin_username = $_POST['admin_username'];
        $admin_fullname = $_POST['admin_fullname'];
        $admin_id = $row_admin['admin_id'];
        $check_admin_password = $row_admin['admin_password'];


        $admin_current_password = $_POST['current_admin_password'];
        $admin_new_password = $_POST['new_admin_password'];
        $admin_confirm_new_password = $_POST['confirm_admin_password'];

        

        if (isset($_POST['admin_level'])) {
            $admin_level = $_POST['admin_levels'];
        } else {
            $admin_level = $row_admin['admin_level'];
        }
        //$admin_password = $_POST['admin_password'];

        if(preg_match($disallowedPattern, $admin_new_password) || preg_match($disallowedPattern, $admin_username) || preg_match($disallowedPattern, $admin_fullname))
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

        if($admin_current_password !== "" || $admin_confirm_new_password !== "" || $admin_new_password !== "")
        {
            $hasUppercase = preg_match('/[A-Z]/', $admin_new_password);
            $hasLowercase = preg_match('/[a-z]/', $admin_new_password);
            $hasNumber = preg_match('/[0-9]/', $admin_new_password);
            $hasSpecialChar = preg_match('/[^A-Za-z0-9]/', $admin_new_password);
            $isValidLength = strlen($admin_new_password) >= 8;

            if($admin_current_password !== $check_admin_password)
                {
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Password',
                            html: 'You have entered the wrong current password. <br> Please enter the correct password.',
                            showConfirmButton: true,
                            timer: 8500
                        });
                    </script>
                    <?php
                    return false;
                }

            if($admin_current_password === $admin_new_password && $admin_current_password === $check_admin_password)
            {
                ?>
                <script>
                    Swal.fire({
                    title: 'Error!',
                    html: 'You have entered the same old and new password. <br> Please enter a fresh new password.',
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 8500
                });
                </script>
            <?php
                
            return false;
            }


            if($admin_current_password === "" || $admin_confirm_new_password ==="" || $admin_new_password === "")
            {
                ?>
                        <script>
                            Swal.fire({
                            title: 'Error!',
                            html: 'You did not enter your password fully to reset it. <br>Please fully enter the input to reset it',
                            icon: 'error',
                            showConfirmButton: true,
                            timer: 8500
                        });
                        </script>
                <?php
                    
                return false;
            }




                if(!$hasUppercase || !$hasLowercase || !$hasNumber || !$hasSpecialChar || !$isValidLength)
                {
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Password',
                            html: 'The new password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and have a minimum length of 8 characters.',
                            showConfirmButton: true,
                            timer: 8500
                        });
                    </script>
                    <?php
                    return false;
                }
                
                    if($admin_new_password !== $admin_confirm_new_password)
                    {
                        ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Password',
                                html: 'You have entered different password. <br> Please enter your password correctly.',
                                showConfirmButton: true,
                                timer: 8500
                            });
                        </script>
                    <?php
                    return false;
                    }

                    
                
            

        }

        $sql_check = mysqli_query($conn, "SELECT admin_fullname, admin_username, admin_id, admin_password FROM admin");
        while($row_check = mysqli_fetch_assoc($sql_check))
        {
            $check_fullname = $row_check['admin_fullname'];
            $check_username = $row_check['admin_username'];
            $check_id = $row_check['admin_id'];
            $check_password = $row_check['admin_password'];

            if($check_id != $admin_id)
            {
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
                else if($admin_new_password === $check_password)
                {
                    ?>
                    <script>
                        Swal.fire({
                        title: 'Error!',
                        html: 'The Password have existed. <br>Please enter a different Password.',
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
                        url: '/FYP/admin/staff/update_profile.php',
                        type: 'POST',
                        data: {
                            level: '<?php echo $admin_level ?>',
                            username: '<?php echo $admin_username ?>',
                            fullname: '<?php echo $admin_fullname ?>',
                            id: '<?php echo $admin_id ?>',
                            pic: '<?php echo $picture ?>',
                            password: '<?php echo $admin_new_password ?>'
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been saved !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'profile setting.php';
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
                                    window.location.href = 'profile setting.php';
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
