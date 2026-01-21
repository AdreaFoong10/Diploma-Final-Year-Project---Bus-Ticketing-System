<?php
if(isset($_POST["signupbtn"]))
{
    $fullname=$_POST['fullname'];
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $userpassword=$_POST['userpassword'];
    $confirmpassword=$_POST['confirm_password'];
    
    require_once 'dbconnect.php';
    require_once 'functions.php';
	
    if(emptyinputsignup($fullname,$contactno, $email, $username, $userpassword, $confirmpassword)!==false)
    {
       
        header("location: ../login.signup.php?error=emptyinput");
        exit();
    }
    

    if(invalidusn($username)!==false)
    {
        header("location: ../login.signup.php?error=invalidusername");
        exit();
    }

    if(invalidemail($email)!==false)
    {
        header("location: ../login.signup.php?error=invalidemail");
        exit();
    }

    if(pw($userpassword)!==false)
    {
        header("location: ../login.signup.php?error=invalidpassword");
        exit();
    }


    if(pwcheck($userpassword, $confirmpassword)!==false)
    {
        header("location: ../login.signup.php?error=passwordnotmatch");
        exit();
    }

    if(usnexist($conn, $username, $email)!==false)
    {
        $sqlcheck="SELECT user_email_address FROM user WHERE user_email_address='".$email."';";
        $resultcheck=mysqli_query($conn,$sqlcheck);
        while($row=mysqli_fetch_assoc($resultcheck))
        {
            if($row['email_address']==$email)
            {
                header("location: ../login.signup.php?error=emailtaken");
                exit();
            }
        }
        header("location: ../login.signup.php?error=usernametaken");
        exit();
    }
    
    createuser($conn, $fullname,$contactno, $email, $username, $userpassword);
}
else{
    header("location: ../login.signup.php");
}







