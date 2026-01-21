<?php
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>

    
    <link rel="stylesheet" href="header.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <style>
        *{
            font-family:sans-serif;
        }

        .logo:hover
        {
            transition: ease 0.3s;
            box-shadow:0px 0px 20px 5px white;
        }
        ::-webkit-scrollbar 
        {
            width: 5px;
        }

        .font{
            font-size:16px !important;
            cursor:pointer;
        }

       
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
    </style>
<title></title>
</head>
<body>
        <div class="nav_bar">
        <div style="margin-left:140px;" class="adjust_position"><a href="home.php"><img src="img/logo1.png" class="logo" style="width:90px !important; height:55px !important;"></a></div>

            <ul>
                <li><a href="home.php">Home</a></li>
                <?php

                
                    if(isset($_SESSION["usn"]))
                    {
                        echo "<li><a href='userprofile.php'>My Profile</a></li>";
                        echo "<li><a href='new_order_history.php'>Order History</a></li>";
                        echo "<li><form action='logout.php' method='post' id='logout-form'><input class='font' type='submit' name='logout' onclick='logoutalert(event)' value='Log out' style='background:transparent; border:none; color:white;'></form></li>"; 
                    }
                    else{
                        echo "<li><a href='login.signup.php'>Sign up/Log in</a></li>";
                        
                    }
                ?>
                
            </ul>
        </div>
 
        <script>
        function logoutalert(event) {
        event.preventDefault();
        Swal.fire({
            icon: "success",
            title: "Logged Out",
            text: "You have successfully logged out.",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        }).then((result) => {
                if (result.isConfirmed) {
                    const logoutform=document.getElementById('logout-form');
                    logoutform.submit();
                }
                
              });    
            
        }
        </script>
</body>
</html>