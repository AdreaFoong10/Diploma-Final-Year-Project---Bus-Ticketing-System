<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/FYP/admin/css/Default style.css?v=1">
    
    <title>Staff Page</title>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php $staff="active"; ?>
<?php $title ="Staffs / Admins"; ?>
<?php $search_edit = 0; ?>
<?php $search_see_all = 0; ?>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <!-- View or Change Admin Picture with inline css -->
                                            

                                                            <div style="font-size: 12px; margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <img src="pictures/<?php echo $picture_admin ?>" width="200px" height="200px" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    <label for="change_pic" class="custom-file-upload" style="font-size: 1.2em;">Change Picture</label>
                                                                    <input type="file" id="change_pic" style="flex-direction: row;" name="change_pic">
                                                                </div>
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
            if (!in_array($file_ext, $valid_extensions)) {
                ?>
                <script>
                    Swal.fire({
                        title: 'Error!',
                        html: 'It seems that you have inserted the wrong file format. Please insert the correct format <b>("jpeg", "jpg", "png")</b>',
                        icon: 'error',
                        showConfirmButton: true,
                        timer: 3000
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
            $picture = "s";
        }

            ?>
            <script>
            Swal.fire({
                title: 'Do you want to save your changes? <?php $picture ?>',
                icon: 'question',
                showConfirmButton: true
                
            })
            </script>
            <?php

            echo $picture ;
}
?>