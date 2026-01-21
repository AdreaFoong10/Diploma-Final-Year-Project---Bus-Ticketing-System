<?php

    function emptyinputsignup($fullname,$contactno, $email, $username, $userpassword, $confirmpassword)
    {
        $result;

        if(empty($fullname) || empty($contactno) || empty($email) || empty($username) || empty($userpassword) || empty($confirmpassword))
        {
            $result=true; //false
            
        }
        else{
            $result=false; //true
        }
        return $result;
    }


    function invalidusn($username)
    {
        $result;

        if(preg_match("/^[a-zA-Z0-9]*$/", $username) && strlen($username)>=6)
        {
            $result=false; //true
        }
        else{
            
            $result=true; //false
        }
        return $result;
    }

    function invalidemail($email)
    {
        $result;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result=true; //false
        }
        else{
            $result=false; //true
        }
        return $result;
    }
    function pw($userpassword)
    {
        $result;

        if(preg_match("#[A-Z]+#", $userpassword) && preg_match("#[a-z]+#", $userpassword) && preg_match("#[0-9]+#", $userpassword) && preg_match("#[^\w]+#", $userpassword) && strlen($userpassword)>=6)
        {
            $result=false; //true
            
        }
        else{
            $result=true; //false
        }
        return $result;
    }


    function pwcheck($userpassword, $confirmpassword)
    {
        $result;

        if($userpassword!==$confirmpassword)
        {
            $result=true; //false
        }
        else{
            $result=false; //true
        }
        return $result;
    }

    function usnexist($conn, $username, $email)
    {
        $sql="SELECT * FROM user WHERE username=? OR user_email_address=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../login.signup.php?error=error");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $resultdata=mysqli_stmt_get_result($stmt);

        if($row=mysqli_fetch_assoc($resultdata))
        {
            return $row;
        }
        else{
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);

    }


    function createuser($conn, $fullname,$contactno, $email, $username, $userpassword)
    {
        $sql="INSERT INTO user (user_fullname, user_contact_no, user_email_address, username, user_password) VALUES (?,?,?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../login.signup.php?error=error");
            exit();
        }

        //$hashedpw=password_hash($userpassword, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $fullname,$contactno, $email, $username, $userpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.signup.php?signup=success");
        exit();

    }



    function emptyinputlogin($usn, $password)
    {
        $result;

        if(empty($usn) || empty($password))
        {
            $result=true; //false
            
        }
        else{
            $result=false; //true
        }
        return $result;
    }

    function loginuser($conn, $usn, $password)
    {
        $usnexist=usnexist($conn, $usn, $usn);
        if($usnexist===false)
        {
            header("location: ../login.signup.php?error=usernamedoesnotexist");
            exit();
        }
        
        //$pwhashed=$usnexist["userpassword"];
        $sql1="SELECT username FROM user;";
        $resultusn=mysqli_query($conn,$sql1);
        while($row=mysqli_fetch_assoc($resultusn))
        {
            if($row['username']==$usn)
            {
                $sql2="SELECT user_password FROM user WHERE username='".$row["username"]."'";
                $resultpw=mysqli_query($conn,$sql2);
                while($row2=mysqli_fetch_assoc($resultpw))
                {
                    
                    if($row2["user_password"]==$password)
                    {
                        session_start();
                        $_SESSION["userid"]=$usnexist["user_id"];
                        $_SESSION["usn"]=$usnexist["username"];
                        header("location: ../login.signup.php?login=success");
                        exit();
                    }
                    else{
                        header("location: ../login.signup.php?error=passwordincorrect");
                        exit();
                    }
                }

            }
        }
    }


   function loginadmin($conn, $usn, $password)
   {
        $sqlcheckexist="SELECT admin_username, admin_password FROM admin;";
        $resultcheckexist=mysqli_query($conn, $sqlcheckexist);
        while($rowcheckexist=mysqli_fetch_assoc($resultcheckexist))
        {
            if($usn!=$rowcheckexist['admin_username'])
            {
                header("loaction: ../login.signup.php?error==adminusernamenotexist"); ////
                exit();
            }
            else if($password!=$rowcheckexist['admin_password'])
            {
                header("location: ../login.signup.php?error==adminpasswordinvalid"); ////
                exit();
            }
            else if($usn==$rowcheckexist['admin_username'] && $password==$rowcheckexist['admin_password'])
            {
                session_start();
                $_SESSION["adminid"]=$rowcheckexist['admin_username'];
                $_SESSION["adminpw"]=$rowcheckexist['admin_password'];
                header("location: ../login.signup.php?adminlogin=success"); ////
                exit();
            }
        }

   }

?>




