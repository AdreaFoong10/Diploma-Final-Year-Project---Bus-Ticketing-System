<?php
    session_start();

    
        $input_code=$_POST['vc'];

        if(empty($input_code))
        {
            header('location: ../verifycode.php?error=emptyinput');
            exit();
        }
        if($_SESSION["code"]==$input_code)
        {
            header('location: ../resetpw.php');
            exit();
        }
        else{
            header('location: ../verifycode.php?error=invalidcode');
            exit();

        }             
    

?>