<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';
    session_start();
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/FYP/admin/css/sweetalert.css?v=1">
<?php
    
    $usn = $_POST['usn'];
    $pw = $_POST['pw'];
    $sql ="SELECT * FROM user WHERE username='$usn' AND user_password='$pw';";
    $result= mysqli_query($conn, $sql);
    $num_row=mysqli_num_rows($result);
    $data=mysqli_fetch_assoc($result);


    $checkadmin="SELECT admin_username, admin_password, admin_status FROM admin WHERE admin_password='".$pw."' AND admin_username='".$usn."';";
    $resultcheckadmin=mysqli_query($conn, $checkadmin);
    $rowadmin=mysqli_fetch_assoc($resultcheckadmin);
    $num_row_admin=mysqli_num_rows($resultcheckadmin);
    
    if($num_row==1) 
    {
        $_SESSION['userid']=$data['user_id'];
        $_SESSION['usn']=$data['username'];
        $_SESSION['glogin']=0;
        header("location:home.php");
        exit();
    }
    else if($num_row_admin==1)
    {
        
        // if(isset($_POST['loginbtn']))
        // {
    
            // $usn = $_POST['usn'];
            // $pw = $_POST['pw'];
            // $sql ="SELECT * FROM user WHERE username='$usn' AND user_password='$pw';";
            // $result= mysqli_query($conn, $sql);
            // $num_row=mysqli_num_rows($result);
            // $data=mysqli_fetch_assoc($result);
    
    
            // $checkadmin="SELECT admin_username, admin_password, admin_status FROM admin WHERE admin_password='".$pw."' AND admin_username='".$usn."';";
            // $resultcheckadmin=mysqli_query($conn, $checkadmin);
            // $rowadmin=mysqli_fetch_assoc($resultcheckadmin);
            
            if($usn == $rowadmin['admin_username'] && $pw == $rowadmin['admin_password'])
            {
                if($rowadmin['admin_status'] === "1")
                {
                    
                }
                else if($rowadmin['admin_status'] === "0")
                {
                    $_SESSION["admin_user"]=$rowadmin['admin_username'];
                    $_SESSION["adminpw"]=$rowadmin['admin_password'];
                    $_SESSION['ad_login_status']=1;
    
                    header("location:/FYP/admin/dashboard.php");
                    exit();
                }
            }
            else
            {
                header("location:login.signup.php?error=usnpw");
                exit();
            } 
               
        // }
        
        
        
        
        
        
        
        
        
        
        
        
        
        // if($usn==$rowadmin['admin_username'] && $pw==$rowadmin['admin_password'])
        //     {
        //         if($rowadmin['admin_status'] === "1")
        //         {
        //             ?>
        //                 <script>
        //                     Swal.fire({
        //                         title: 'Oops!',
        //                         html: 'It seems your Account have been Deactivated.<br>Please contact SuperAdmin to reactivate your Account.',
        //                         icon: 'warning',
        //                         confirmButtonColor: '#3085d6',
        //                         confirmButtonText: 'OK'
        //                     })
        //                 </script>
        //             <?php
        //         }
        //         else if($rowadmin['admin_status'] === "0")
        //         {
        //             $_SESSION["admin_user"] = $rowadmin['admin_username'];
        //             $_SESSION["adminpw"] = $rowadmin['admin_password'];
        //             $_SESSION['ad_login_status'] = 1;

        //             ?>
        //             <script>
        //                 Swal.fire({
        //                     icon: "success",
        //                     title: "Logged In",
        //                     text: "You have been successfully logged In.",
        //                     confirmButtonColor: "#3085d6",
        //                     confirmButtonText: "OK",
        //                     allowOutsideClick: false,
        //                     allowEscapeKey: false,
        //                     allowEnterKey: false
        //                 }).then((result) => {
        //                     if (result.isConfirmed) {
        //                         Swal.close();
        //                         window.location.href = "/FYP/admin/dashboard.php";
        //                     }
        //                 }); 

        //                 document.getElementById('myForm').addEventListener('submit', function(event) {
        //                 event.preventDefault();
        //                 Swal.close();
        //                 this.submit();
        //                 });
        //             </script>

        //             <?php
                    
        //             exit();
        //         }
        //     }
        //     else
        //     {
        //         header("location:login.signup.php?error=usnpw");
        //         exit();
        //     }  
    }
    else
    {
        header("location:login.signup.php?error=usnpw");
        exit();
    } 

   

    
    

    
    

?>