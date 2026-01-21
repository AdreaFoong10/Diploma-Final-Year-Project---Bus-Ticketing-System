



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
                                                                <img src="pictures/<?php echo $picture_cus ?>" width="200px" height="200px" alt="">

                                                                <!-- Change File / Picture Button with inline css -->
                                                                <div style="margin-left: 3rem; margin-top: 5.5rem;">
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Customer ID with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_id"><h4 style="font-size: 1.5em">Customer ID : </h4> </label>
                                                                <input type="text" id="cus_id" style="flex-direction: row; margin-left: 3.5rem;" placehoder="ID" name="cus_id" size="5" value="<?php echo $cus_id ?>" disabled>
                                                            </div>

                                                            <!-- Customer Fullname with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_fullname"><h4 style="font-size: 1.5em">Customer Fullname : </h4> </label>
                                                                <input type="text" id="cus_fullname" style="flex-direction: row; margin-left: 1.15rem;" placehoder="Fullname" name="cus_fullname" size="25" value="<?php echo $row_see['user_fullname'] ?>" disabled>
                                                            </div>

                                                            <!-- Customer Username with inline css-->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_username"><h4 style="font-size: 1.5em">Customer Username : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 2.55rem;" id="cus_username" placeholder="UserName" name="cus_username" size="35" value="<?php echo $row_see['username'] ?>" disabled>
                                                            </div>

                                                            <!-- Customer Contact Number with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_contact"><h4 style="font-size: 1.5em">Customer Contact Number : </h4> </label>
                                                                <input type="text" style="flex-direction: row; margin-left: 3.2rem;" id="cus_contact" placeholder="Contact Number" name="cus_contact" size="25" value="<?php echo $row_see['user_contact_no'] ?>" disabled>
                                                            </div>

                                                            <!-- Customer Email with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_email"><h4 style="font-size: 1.5em">Customer Email : </h4> </label>
                                                                <input type="email" style="flex-direction: row; margin-left: 3.2rem;" id="cus_email" placeholder="Email" name="cus_email" size="25" value="<?php echo $row_see['user_email_address'] ?>" disabled>
                                                            </div>

                                                            <!-- Admin Password (Real Name) with inline css -->
                                                            <div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="cus_password"><h4 style="font-size: 1.5em">Password : </h4> </label>
                                                                <input type="password" style="flex-direction: row; margin-left: 3.05rem;" id="cus_password" name="cus_password" value="<?php echo $row_see['user_password'] ?>" disabled>
                                                                <input type="checkbox" style="flex-direction: row; margin-left: 2rem; justify-content: center; align-items: center;" id="cus_pass_check" onclick="togglePassword()">  
                                                                <label for="cus_pass_check" style="display: flex; justify-content: center; align-items: center;">Show password</label>
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
                    
                    window.location.href = "/FYP/admin/customer.php";
                    
                }
            });
            
        }

</script>
<script>
function togglePassword() {
  var passwordField = document.getElementById("cus_password");
  var showPasswordCheckbox = document.getElementById("cus_pass_check");

  if (showPasswordCheckbox.checked) {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>