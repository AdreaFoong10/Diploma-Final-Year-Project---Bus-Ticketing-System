<?php
    include_once 'header.php';
    include_once 'loginsignup.bg.php';
    include_once 'includes/dbconnect.php';
    require_once 'vendor/autoload.php';

    $clientid='222114559582-uou8udk3an7milaosbio9i02jsfcvjd9.apps.googleusercontent.com';
    $clientsecret='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';
    $redirecturl='http://localhost/fyp/login.signup.php';
    $client=new Google_Client();
    $client->setClientid($clientid);
    $client->setClientSecret($clientsecret);
    $client->setRedirectUri($redirecturl);
    $client->addScope('profile');
    $client->addScope('email');

    //admin start//
    //if Admin Logout, Will display the message
    if(isset($_SESSION['admin_status']))
    {
        $admin_status_login = $_SESSION['admin_status'];
        if($admin_status_login == "logout")
        {
 
            // Destroy the session
            session_unset();
            session_destroy();

            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Logged Out",
                text: "You have been successfully logged out.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
              })
            </script>';
            
        }
        session_start();
        $_SESSION['ad_login_status']=0;
    }


    //If admin press back button, WILL display message
    if(isset($_SESSION['admin_status']) && $_SESSION['send_no_login'] === 1)
    {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['ad_login_status']=0;
        //Change back to 0
        $_SESSION['send_no_login'] =0;
        ?>
            <script>
                  Swal.fire({
                    title: 'Oops!',
                    html: 'It seems you are directly accessing Admin page. Please Login to access Admin Pages',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/FYP/login.signup/login.signup.php";
                        
                    }
                  });
                </script>
        <?php
        
    }
    //admin end//
    

    if(isset($_GET['code']))
    {
        $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token);
        $gauth=new Google_Service_Oauth2($client);
        $google_info=$gauth->userinfo->get();
        $_SESSION['user_first_name'] = $google_info['given_name'];
        $_SESSION['user_last_name'] = $google_info['family_name'];
        $_SESSION['user_email_address'] = $google_info['email'];
        $_SESSION['user_image'] = $google_info['picture'];
        
        // echo $_SESSION['user_first_name'];
        // echo $_SESSION['user_email_address'];
        // echo '<img src="' . $_SESSION['user_image'] . '" alt="User Image">';
        if(isset($_SESSION['user_first_name']) && isset($_SESSION['user_email_address']))
    {
        if ($_SESSION['user_last_name'] != null) {
            $fullname = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
        } else {
            $fullname = $_SESSION['user_first_name'];
        }
        
        $email=$_SESSION['user_email_address'];
        $username=$_SESSION['user_first_name'];
        $user_pic=$_SESSION['user_image'];

        $checksql="SELECT * FROM user WHERE user_email_address='$email' AND username='$username';";
        $checkresult= mysqli_query($conn, $checksql);
        $num_row=mysqli_num_rows($checkresult);

        if($num_row==1)
        {
            $_SESSION['usn']=$username;
            $_SESSION['userid']=$data['user_id'];
            $_SESSION['glogin']=1;
            header("location:home.php");
            exit();
        }
        else if($num_row==0)//check if the email is in database if not register then login else login because this email address is in database
        {
            //check email if exist in db
            $checkemail="SELECT * FROM user WHERE user_email_address='$email';";
            $emailresult= mysqli_query($conn, $checkemail);
            $num_row_email=mysqli_num_rows($emailresult);
            if($num_row_email==1)
            {
                echo "<script>
                  Swal.fire({
                    title: 'Oops...',
                    html: 'Please enter your username and password!',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.signup.php';
                        
                    }
                  });
                </script>";
            }
            else{
            //register
            $insertsql="INSERT INTO user (user_fullname, user_email_address, username, user_pic) 
            VALUES ('$fullname', '$email', '$username','$user_pic');";
            mysqli_query($conn, $insertsql);
            $sql ="SELECT * FROM user WHERE username='$username';";
            $result= mysqli_query($conn, $sql);
            $data=mysqli_fetch_assoc($result);
            $_SESSION['usn']=$username;
            $_SESSION['userid']=$data['user_id'];
            $_SESSION['glogin']=1;
            header("location:home.php");
            exit();
            }
        }
    }
}
    
?>




<!DOCTYPE html>
<html>
<head>
    <title>Login and Sign Up Page</title>
    <script>
        window.history.forward();
    </script>
    <style>
        
        .empty_msg{
            color:red;
            font-size: 12px;
            
            padding-left:90px;
        }
        .err_msg{
            color:red;
            font-size: 12px;
            transition: 0.5s;       
            opacity:0;
        }

        .box{
            border-radius: 5px;
            width:330px;
            height:450px;
            position: absolute;
            top:60px;
            right:0;
            bottom:0;
            left:750px;
            margin:auto;
            background-color: white;
            padding: 5px;
            overflow:hidden;
            margin-top:120px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        #box 
        {
            transition: height 0.5s ease-in-out;
        }

        .buttonbox{
            width:210px;
            margin: 30px auto;
            position: relative;
            border-radius: 30px;
            border-left:0;
            border-right:0;
            border-top:0;
            border-bottom: 0;
            
        }

        .toggle-btn{
            padding: 10px 15px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            
    
        }

        #btn{
            top:0;
            left:0;
            position: absolute;
            width: 90px;
            height:100%;
            border-left:0;
            border-right:0;
            border-top:0;
            border-bottom: 1px solid lightskyblue;
            border-width: 5px;
            transition: .5s;
            

    
        }

        .icon{
            margin: 350px auto;
            text-align: center; 
        }
        .icon img{
            width:30px;
            margin: 0 12px;
            box-shadow: 0 0 20px 0 #7f7f7f3d;
            cursor: pointer;
            border-radius: 30%;
        }

.input-group{
    padding-top:15px;
    top: 90px;
    position: absolute;
    width:280px;
    transition: .5s;
    margin-left:15px;
    
}
.input-field{
    width: 90%;
    padding:10px;
    margin: 5px;
    border-top:0;
    border-left:0;
    border-right:0;
    border-bottom: 2px solid #999;
    outline: none;
    background: transparent;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    padding-left:3px;
    
}

.input-field-container{
    margin-bottom:8px;
    position:relative;
}

.input-field-title{
    position: absolute;
    top: 15px;
    left: 8px;
    display: block;
    transition: 0.2s;
    font-size:13px;
    color: grey;
    cursor:text;
}


.input-field:focus ~ .input-field-title,
.input-field:not(:placeholder-shown) ~ .input-field-title {
  font-size: 12px;
  cursor: text;
  top: 0;
  transform: translateY(-10%);
  color: rgb(26, 115, 232);
  
}

.input-field:focus{
    border-bottom:2px solid rgb(26,115,232);
}


::placeholder{
    color:transparent;
}

.showpassword{
    background:url(img/eye2.png);
    position:absolute;
    cursor:pointer;
    background-size:cover;
    height:17px;
    width:17px;
    left:247px; 
}

.showpassword.hide{
    background:url(img/eye1.png);
    background-size:cover;
    
}

.submit-btn{
    width: 85%;
    padding: 10px;
    cursor: pointer;
    display: block;
    margin: auto;
    background: linear-gradient(to right, lightskyblue, skyblue);
    border: 3px solid lightskyblue;
    outline: 0;
    border-radius: 30px;
    transition: 0.3s;
    color:black;
    box-shadow: 2px 2px 0 0 grey;
}

.submit-btn:hover{   
    width:95%;
    color:white;
    border:3px solid lightskyblue;
    background: linear-gradient(to right, lightskyblue, skyblue);
}

.submit-btn:disabled,
.submit-btn[disabled]{
    border:3px solid #DC143C;
    background: #DC143C;
    color: black;
}


.check-box{
    margin: 30px 10px 30px 10px; 
}

span.checkb{
    color:#777;
    font-size: 12px;
    bottom: 70px;
}

#login{
    left: 15px;
}
#signup{
    left: 400px;
}
body{
    margin:0px ;
}

span.fgpw{
    color:#777;
    font-size: 12px;
   
}

a:link { 
    text-decoration: none; 
}
a:visited { 
    text-decoration: none; 
}

a:active { 
    text-decoration: none; 
}

span.fgpw {
  position: relative;
}

span.fgpw::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 1.5px;
    
    
    background-color: skyblue;
    bottom: 0;
    left: 0;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .3s ease-in-out;
    
  }

span.fgpw:hover::before {
  transform-origin: left;
  transform: scaleX(1);
  
}

.data{
    display:none;
}

.hoverGoogleloginbtn
{
    background:#4285f4; 
    padding:10px; 
    padding-left:50px; 
    padding-top:15px; 
    padding-bottom:15px;
    border:1px solid #4285f4; 
    border-radius:3px; 
    color:white; 
    font-size:13px;
    transition:0.2s;
}

.hoverGoogleloginbtn:hover
{
    background:#1669F2;
    box-shadow: 0 0 6px #4285f4;
}



    </style>
    
</head>
<body>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
   
    <div style="position:absolute; left:150px; top:350px; color:white;" id="logintext">
        <span style='font-size:50px; font-weight:bold;'>Welcome back!</span><br><br>
        <span style='font-size:20px;'>Ready to book your next bus adventure? </span><br>
        <span style='font-size:20px;'>Log in to your account and start exploring our routes.</span>
    </div>

    <div style="position:absolute; left:700px; top:350px; color:white; opacity:0;" id="signuptext">
        <span style='font-size:50px; font-weight:bold;'>Sign up now!</span><br><br>
        <span style='font-size:20px;'>Join our community and sign up beside to book</span><br>
        <span style='font-size:20px;'>your bus ticket hassle-free.</span>
    </div>
  
    

    <div class="box" id="box">
        <form method="post" action="">
        <div class="buttonbox">
           <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()" name="li" style="font-weight:bold; font-size:20px;" id="lb">Log In</button>
            <button type="button" class="toggle-btn" onclick="signup()" name="su" style="font-weight:bold; font-size:20px;" id="sb">&nbsp;Sign Up</button>
            
        </div>
        </form>
        
        <form id="login" class="input-group" action="login.func.php" method="POST" autocomplete="off" onsubmit="return loginvalidate()">
            <br>
            <div class="input-field-container">
            <input type="text" class="input-field" placeholder="Username" name="usn" id="usn" oninput="checkusnpw()">
            <label class="input-field-title" for="usn">Username</label>
            <div style="margin-left:6px; margin-top:0px;" id="emptyusn" class="err_msg"></div>
            </div>

            <div class="input-field-container">
            <input type="password" class="input-field" placeholder="Password" name="pw" id="pw" oninput="checkusnpw()">
            <label class="input-field-title" for="pw">Password</label>
            <div class="showpassword" id="loginshowpassword" onclick="loginshowpw()" style="top:14px;"></div>
            <div style="margin-left:6px; margin-top:0px;" id="emptypw" class="err_msg"></div>
            <div style="margin-left:6px; margin-top:0px;" id="checkpwusn" class="err_msg"></div>
            </div>

            <script>
                function loginshowpw() 
                {
                var x = document.getElementById("pw");
                if (x.type === "password") {
                x.type = "text";
                document.getElementById('loginshowpassword').classList.add('hide');
                } else {
                x.type = "password";
                document.getElementById('loginshowpassword').classList.remove('hide');
                }
                }
            </script>

            <div style="margin-left:5px;">
                <a href="forgotpw.php"><span class="fgpw">forgot password?</span></a>
            </div>
             

            <div class="btnsubmit" style="padding-top:20px;">
            <input type="submit" class="submit-btn" name="loginbtn" id="login-btn" value="Log In">
            </div>
            
            <p style="color:#777; font-size: 12px; text-align:center;">or</p>
            <div style="margin-top:10%; position:relative; text-align:center;">
            <div style='margin-top:-12.2px; left:34px; position:absolute;'><img src='img/google.icon.png' style='background-color:white; width:20px; height:20px; margin-left:2.5px; padding:11px; border:1px solid white; border-radius:3px;'></div>
            <?php echo "<a href='".$client->createAuthUrl()."' class='hoverGoogleloginbtn'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login with Google&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>"; ?>
            </div>     
        </form>


        
        <form id="signup" class="input-group" method="post" name="signupfrm" onsubmit="return signupvalidate()" action="signup.func.php" autocomplete="off">
            <div class="input-field-container">
            <input type="text" class="input-field" placeholder="Fullname" name="fullname" id="fullname" >
            <label class="input-field-title" for="fullname">Full Name</label>
            <div style="margin-left:6px; margin-top:0px;"><span id="checkfullname" class="err_msg"></span></div>
            </div>

            <div class="input-field-container">
            <input type="tel" class="input-field" placeholder="Phone Number" maxlength="11" name="contactno" id="phonenum">
            <label class="input-field-title" for="phonenum">Phone Number</label>
            <div style="margin-left:6px; margin-top:0px;"><span class="err_msg" id="checkphonenum"></span></div>
            </div>

            <div class="input-field-container">
            <input type="text" class="input-field" placeholder="Email" name="email" id="email">
            <label class="input-field-title" for="email">Email Address</label>
            <div style="margin-left:6px; margin-top:0px;" id="checkemail" class="err_msg"></div>
            </div>

            <div class="input-field-container">
            <input type="text" class="input-field" placeholder="User Name" name="username" id="username">
            <label class="input-field-title" for="username">Username</label>
            <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checkusername"></div>
            </div>

            <div class="input-field-container">
            <input type="password" class="input-field" placeholder="Password" name="userpassword" id="password" oninput="checkpassword()">
            <label class="input-field-title" for="password">Password</label>
            <div class="showpassword" id="showpassword" onclick="signshowpw()" style="top:14px;"></div>
            <div style="margin-left:6px; margin-top:0px;"><span class="err_msg" id="checkpwstrength"></span></div>
            </div>

            <script>
                function signshowpw() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                x.type = "text";
                document.getElementById('showpassword').classList.add('hide');
                } else if(x.type==="text"){
                x.type = "password";
                document.getElementById('showpassword').classList.remove('hide');
                }

                }
            </script>
            

            <div class="input-field-container">
            <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="conpw">
            <label class="input-field-title" for="conpw">Confirm Password</label>
            <div class="showpassword" id="showconpassword" onclick="signshowconpw()" style="top:14px;"></div>
            <div style="margin-left:6px; margin-top:0px;"><span id="checkconpw" class="err_msg"></span></div>
            </div>
            <script>
                function signshowconpw() {
                var x = document.getElementById("conpw");
                if (x.type === "password") {
                x.type = "text";
                document.getElementById('showconpassword').classList.add('hide');
                } else {
                x.type = "password";
                document.getElementById('showconpassword').classList.remove('hide');
                }
                }
            </script>
            
            <div class="btnsubmit" style="padding-top:20px;">
                <input class="submit-btn" type="submit" name="signupbtn" value="Sign Up" id="signupbtn">
            </div>

        </form>
        
        <div>

        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");
        var logintext=document.getElementById("logintext");
        var signuptext=document.getElementById("signuptext");
        function signup(){
            x.style.left="-400px";
            y.style.left="15px";
            z.style.left="110px";
            document.getElementById("box").style.height="570px";
            signuptext.style.left="150px";
            logintext.style.left="700px";
            logintext.style.transition="0.5s";
            signuptext.style.transition="0.5s";
            logintext.style.opacity="0";
            signuptext.style.opacity="1"; 
        }
            
        
        function login(){
            x.style.left="15px";
            y.style.left="400px";
            z.style.left="0";
            document.getElementById("box").style.height="450px";
            logintext.style.left="150px";
            signuptext.style.left="700px";
            logintext.style.transition="0.5s";
            signuptext.style.transition="0.5s";
            logintext.style.opacity="1";
            signuptext.style.opacity="0";     
        }
        
    </script>

    <script>
        function signupalert(event) 
        {
            event.preventDefault();
            Swal.fire({
                icon: "success",
                title: "Signed Up",
                text: "You have successfully signed up.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
                }).then((result) => {
                if(result.isConfirmed) 
                {
                    const signupform=document.getElementById('signup');
                    signupform.submit();
                }
                });    
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var disallowedPattern =  /(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i;
        function signupvalidate()
        {
            var fullname=document.getElementById("fullname").value;
            var phonenum=document.getElementById("phonenum").value;
            var email=document.getElementById("email").value;
            var username=document.getElementById("username").value;
            var password=document.getElementById("password").value;
            var conpassword=document.getElementById("conpw").value;
            var resultfullname=0;
            var resultphonenum=0;
            var resultemail=0;
            var resultusn=0;
            var validusn =false;
            var validemail=false;
            var resultpw=0;
            var resultconpw=0;
            
                if(fullname=="")
                {
                    document.getElementById("checkfullname").innerHTML="Full name can't be empty";
                    document.getElementById("fullname").style.borderBottomColor="red";
                    document.getElementById("checkfullname").style.opacity="1";
                    resultfullname=0;
                    return false;
                }
                else
                {
                    
                    if(/[\&!^£$%*()}{@#~?><>,|=+¬:`;]/.test(fullname) || /[0-9]+/.test(fullname)) 
                    {
                        document.getElementById("checkfullname").innerHTML="Fullname can't contain number or special character";
                        document.getElementById("fullname").style.borderBottomColor="red";
                        document.getElementById("checkfullname").style.opacity="1";
                        resultfullname=0;
                    }
                    else if(fullname.charAt(0) === ' ')
                    {
                        document.getElementById("checkfullname").innerHTML="Fullname can't start with a space";
                        document.getElementById("fullname").style.borderBottomColor="red";
                        document.getElementById("checkfullname").style.opacity="1";
                        resultfullname=0;
                        return false;
                    }
                    else if(disallowedPattern.test(fullname)) 
                    {
                        document.getElementById("checkfullname").innerHTML="SQL statements are not allowed";
                        document.getElementById("fullname").style.borderBottomColor="red";
                        document.getElementById("checkfullname").style.opacity="1";
                        resultfullname=0;
                        return false;    
                    }
                    else{
                        document.getElementById("checkfullname").innerHTML="";
                        document.getElementById("checkfullname").style.opacity="0";
                        document.getElementById("fullname").style.borderBottomColor="";
                        resultfullname=1;
                    }
                }

                if(phonenum=="")
                {
                    document.getElementById("checkphonenum").innerHTML="Phone number can't be empty";
                    document.getElementById("phonenum").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    resultphonenum=0;
                    return false;
                }
                else
                { 
                    if(phonenum.indexOf(' ') !== -1)
                    {
                        document.getElementById("checkphonenum").innerHTML="Phone number can't contain any spaces";
                        document.getElementById("phonenum").style.borderBottomColor="red";
                        document.getElementById("checkphonenum").style.opacity="1";
                        resultphonenum=0;
                        return false;
                    }
                    else if(!phonenum.startsWith("01")) 
                    {
                        document.getElementById("checkphonenum").innerHTML="The first number of phone number must be 01";
                        document.getElementById("phonenum").style.borderBottomColor="red";
                        document.getElementById("checkphonenum").style.opacity="1";
                        resultphonenum=0;
                        return false;
                    }
                    else if(/[\&!^£$%*()}{@#~?><>,|=+_.¬:\`;]/.test(phonenum) || /[a-zA-Z]+/.test(phonenum))
                    {
                        document.getElementById("checkphonenum").innerHTML="Phone number can't contain letter and special character";
                        document.getElementById("phonenum").style.borderBottomColor="red";
                        document.getElementById("checkphonenum").style.opacity="1";
                        resultphonenum=0;
                        return false;
                    }
                    else if(!/^\d{10,11}$/.test(phonenum))
                    {
                        document.getElementById("checkphonenum").innerHTML="The length of phone number should be 10 or 11 numbers";
                        document.getElementById("phonenum").style.borderBottomColor="red";
                        document.getElementById("checkphonenum").style.opacity="1";
                        resultphonenum=0;
                        return false;
                    }
                    else if(disallowedPattern.test(phonenum)) 
                    {
                        document.getElementById("checkphonenum").innerHTML="SQL statements are not allowed";
                        document.getElementById("phonenum").style.borderBottomColor="red";
                        document.getElementById("checkphonenum").style.opacity="1";
                        resultphonenum=0;
                        return false;
                    }
                    else {
                        document.getElementById("checkphonenum").innerHTML="";       
                        document.getElementById("checkphonenum").style.opacity="0";
                        document.getElementById("phonenum").style.borderBottomColor="";
                        resultphonenum=1;
                    }    
                }

                if(email=="")
                {
                    document.getElementById("checkemail").innerHTML="Email Address can't be empty";
                    document.getElementById("email").style.borderBottomColor="red";
                    document.getElementById("checkemail").style.opacity="1";
                    resultemail=0;
                    return false;
                }
                else
                {
                    if(email.indexOf(' ') !== -1)
                    {
                    document.getElementById("checkemail").innerHTML="Email address can't contain any spaces";
                    document.getElementById("email").style.borderBottomColor="red";
                    document.getElementById("checkemail").style.opacity="1";
                    resultemail=0;
                    return false;
                    }
                    else if(disallowedPattern.test(email)) 
                    {
                    document.getElementById("checkemail").innerHTML="SQL statements are not allowed";
                    document.getElementById("email").style.borderBottomColor="red";
                    document.getElementById("checkemail").style.opacity="1";
                    resultemail=0;
                    return false;
                    }
                    else{
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "includes/signup.check_emailexist.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
                    { 
                        var response = xhr.responseText;
                        if (response === "invalid") {
                            document.getElementById('email').style.borderBottomColor='red'
                            document.getElementById("checkemail").textContent = "Invalid email address";
                            document.getElementById("checkemail").style.opacity="1";
                            resultemail=0;
                        }
                        else if(response==="valid")
                        {
                            document.getElementById("checkemail").textContent = "";
                            document.getElementById('email').style.borderBottomColor='';
                            document.getElementById("checkemail").style.opacity="0";
                            resultemail=1;
                        }
                        
                        if (response === "taken") {
                            document.getElementById('email').style.borderBottomColor='red'
                            document.getElementById("checkemail").textContent = "Email address has been taken";
                            document.getElementById("checkemail").style.opacity="1";
                            resultemail=0;
                        }
                        else if(response==="not taken")
                        {
                            document.getElementById("checkemail").textContent = "";
                            document.getElementById('email').style.borderBottomColor='';
                            document.getElementById("checkemail").style.opacity="0";
                            resultemail=1;
                        }
                    }
                    };
                    xhr.send("email=" + encodeURIComponent(email) );
                    }
                }

                if(username=="")
                {
                    document.getElementById("checkusername").innerHTML="Username can't be empty";
                    document.getElementById("username").style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                }
                else{
                    
                    if(disallowedPattern.test(username)) 
                    {
                    document.getElementById("checkusername").innerHTML="SQL statements are not allowed"; 
                    document.getElementById("username").style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }
                    else if(username.indexOf(' ') !== -1)
                    {
                    document.getElementById("checkusername").innerHTML="Username can't contain any spaces";
                    document.getElementById("username").style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }
                    else if(!/[a-zA-Z]/.test(username))
                    {
                    document.getElementById("checkusername").innerHTML="Username must include at least 1 uppercase or lowercase";   
                    document.getElementById('username').style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }
                    else if(!/\d/.test(username))
                    {
                    document.getElementById("checkusername").innerHTML="Username must include at least 1 digit";
                    document.getElementById('username').style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }
                    else if(username.length<5 || username.length>15)
                    {
                    document.getElementById("checkusername").innerHTML="Username must be 5 to 15 characters";                   
                    document.getElementById('username').style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }   
                    else if(!/^[a-zA-Z0-9]+$/.test(username))
                    {
                    document.getElementById("checkusername").innerHTML="Special characters are not allowed";
                    document.getElementById('username').style.borderBottomColor="red";
                    document.getElementById("checkusername").style.opacity="1";
                    resultusn=0;
                    return false;
                    }
                    else{   
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "includes/signup.check_usernameexist.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
                    {
                        var response = xhr.responseText;
                        if (response === "taken") {
                            document.getElementById('username').style.borderBottomColor='red'
                            document.getElementById("checkusername").textContent = "Username has been taken";
                            document.getElementById("checkusername").style.opacity="1";
                            resultusn=0;
                        }
                        else if(response==="not taken")
                        {
                            document.getElementById("checkusername").textContent = "";
                            document.getElementById('username').style.borderBottomColor='';
                            document.getElementById("checkusername").style.opacity="0";
                            resultusn=1;
                        }  
                    }
                    };
                    xhr.send("username=" + encodeURIComponent(username));
                    }  
                }

                if(password=="")
                {
                    document.getElementById("checkpwstrength").innerHTML="Password can't be empty";
                    document.getElementById("password").style.borderBottomColor="red";
                    document.getElementById("checkpwstrength").style.opacity="1";
                    resultpw=0;
                    return false;
                }
                else
                {
                    if(disallowedPattern.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="SQL statements are not allowed";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        resultpw=0;
                        return false;
                    }
                    else if(password.indexOf(' ') !== -1)
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password can't contain any spaces";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        resultpw=0;
                        return false;
                    }
                    else if(password.length<=5 && password.length>0 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is weak";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        resultpw=0;
                        return false;
                    }
                    else if(password.length<8 && password.length>5 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is medium";
                        document.getElementById("password").style.borderBottomColor="orange";
                        document.getElementById("checkpwstrength").style.color="orange";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        resultpw=0;
                        return false;
                    }
                    else if(password.length>=8 && /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is strong";
                        document.getElementById("password").style.borderBottomColor="#33cc33";
                        document.getElementById("checkpwstrength").style.color="#33cc33";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        resultpw=1;  
                    }
                    else
                    {
                        document.getElementById("checkpwstrength").innerHTML="";
                        document.getElementById("password").style.borderBottomColor ="";
                        document.getElementById("checkpwstrength").style.color="";
                        document.getElementById("checkpwstrength").style.opacity="0";
                        resultpw=1;
                    }
                }

                if(conpassword=="")
                {
                    document.getElementById("checkconpw").innerHTML="Confirm password can't be empty";
                    document.getElementById("conpw").style.borderBottomColor="red";
                    document.getElementById("checkconpw").style.opacity="1";
                    resultconpw=0;
                    return false;
                }
                else
                { 
                    if(conpassword.indexOf(' ') !== -1)
                    {
                    document.getElementById("checkconpw").innerHTML="Confirm password can't contain any spaces";
                    document.getElementById("conpw").style.borderBottomColor="red";
                    document.getElementById("checkconpw").style.color="red";
                    document.getElementById("checkconpw").style.opacity="1";
                    resultconpw=0;
                    return false;
                    }
                    else if(conpassword!=password)
                    {
                    document.getElementById("checkconpw").innerHTML="Confirrm password is not match with password";
                    document.getElementById("conpw").style.borderBottomColor ="red";
                    document.getElementById("checkconpw").style.opacity="1";
                    resultconpw=0;
                    return false;
                    }
                    else if(disallowedPattern.test(conpassword))
                    {
                    document.getElementById("checkconpw").innerHTML="SQL statements are not allowed";
                    document.getElementById("conpw").style.borderBottomColor="red";
                    document.getElementById("checkconpw").style.color="red";
                    document.getElementById("checkconpw").style.opacity="1";
                    resultconpw=0;
                    return false;
                    }
                    else{
                    document.getElementById("checkconpw").innerHTML="";
                    document.getElementById("conpw").style.borderBottomColor ="";
                    document.getElementById("checkconpw").style.opacity="0";
                    resultconpw=1;
                    
                    }
                }
                
                checkusername=document.getElementById("checkusername").innerHTML;
                checkemail=document.getElementById("checkemail").innerHTML;
                if(resultfullname!=1 || resultphonenum!=1 || checkusername!="" || checkemail!="" || resultpw!=1 || resultconpw!=1)
                {
                    return false;
                }
                else if (resultfullname==1 && resultphonenum==1 && checkusername=="" && checkemail=="" && resultpw==1 && resultconpw==1)
                {
                event.preventDefault();
                Swal.fire({
                icon: "success",
                title: "Signed Up",
                text: "You have successfully signed up.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
                }).then((result) => {
                if(result.isConfirmed) 
                {
                    const signupform=document.getElementById('signup');
                    signupform.submit();
                }
                });    
                }
            }

            

        function checkpassword()
        {
            var password=document.getElementById("password").value;
            
            if(password=="")
            {
                document.getElementById("checkpwstrength").innerHTML="";
                document.getElementById("password").style.borderBottomColor ="";
                document.getElementById("checkpwstrength").style.color="";
                document.getElementById("checkpwstrength").style.opacity="0";
                     
            }

            if(password!="")
            {       
                document.getElementById("password").style.borderBottomColor="";
                document.getElementById("checkpwstrength").innerHTML="";
                document.getElementById("checkpwstrength").style.opacity="0";
                    if(disallowedPattern.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="SQL statements are not allowed";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        
                    }
                    else if(password.indexOf(' ') !== -1)
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password can't contain any spaces";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        
                    }
                    else if(password.length<=5 && password.length>0 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is weak";
                        document.getElementById("password").style.borderBottomColor="red";
                        document.getElementById("checkpwstrength").style.color="red";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        
                    }
                    
                    else if(password.length<8 && password.length>5 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is medium";
                        document.getElementById("password").style.borderBottomColor="orange";
                        document.getElementById("checkpwstrength").style.color="orange";
                        document.getElementById("checkpwstrength").style.opacity="1";
                        
                    }
                    else if(password.length>=8 && /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password) && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password))
                    {
                        document.getElementById("checkpwstrength").innerHTML="Password is strong";
                        document.getElementById("password").style.borderBottomColor="#33cc33";
                        document.getElementById("checkpwstrength").style.color="#33cc33";
                        document.getElementById("checkpwstrength").style.opacity="1";
                           
                    }
                    else
                    {
                        document.getElementById("checkpwstrength").style.opacity="0";
                        
                    }   
            }
        }
 


        function loginvalidate()
        {
            var check;
            var usn=document.getElementById("usn").value;
            var pw=document.getElementById("pw").value;
            if(usn=="" || pw=="")
            {
                
                if(usn=="")
                {
                    document.getElementById("emptyusn").innerHTML="Username can't be empty";
                    document.getElementById("usn").style.borderBottomColor="red";
                    document.getElementById("emptyusn").style.opacity="1";
                    return false;
                }
                else
                {
                    document.getElementById("emptyusn").innerHTML="";
                    document.getElementById("usn").style.borderBottomColor="";
                    document.getElementById("emptyusn").style.opacity="0";
                }
                
                if(pw=="")
                {
                    document.getElementById("emptypw").innerHTML="Password can't be empty";
                    document.getElementById("pw").style.borderBottomColor="red";
                    document.getElementById("emptypw").style.opacity="1";
                    return false;
                }
                else
                {
                    document.getElementById("emptypw").innerHTML="";
                    document.getElementById("pw").style.borderBottomColor="";
                    document.getElementById("emptypw").style.opacity="0";
                }
                
            }
            else{
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/login.checkexist.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "valid") {
                        document.getElementById("checkpwusn").textContent = "";
                        document.getElementById('pw').style.borderBottomColor='';
                        document.getElementById('usn').style.borderBottomColor='';
                        document.getElementById("checkpwusn").style.opacity="0";
                        Swal.fire({
                            icon: "success",
                            title: "Logged In",
                            text: "You have successfully logged in.",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false
                        }).then((result) => {
                        if(result.isConfirmed) 
                        {
                            const loginform=document.getElementById('login');
                            loginform.submit();
                        }
                        });    
                    }
                    else 
                    {
                        document.getElementById('pw').style.borderBottomColor='red';
                        document.getElementById('usn').style.borderBottomColor='red'
                        document.getElementById("checkpwusn").textContent = "Invalid username or password";
                        document.getElementById("checkpwusn").style.opacity="1";
                    }
                    
                }
            };
                xhr.send("usn=" + encodeURIComponent(usn) + "&pw=" + encodeURIComponent(pw));
                event.preventDefault(); 
            } 
        }
            
        

        function checkusnpw()
        {
            document.getElementById("checkpwusn").innerHTML= "";
            document.getElementById("checkpwusn").style.opacity="0";
            document.getElementById("emptyusn").innerHTML="";
            document.getElementById("usn").style.borderBottomColor="";
            document.getElementById("emptyusn").style.opacity="0";
            document.getElementById("emptypw").innerHTML="";
            document.getElementById("pw").style.borderBottomColor="";
            document.getElementById("emptypw").style.opacity="0";
            var usn=document.getElementById("usn").value;
            var pw=document.getElementById("pw").value;
        }

    </script>
</body>
</html>
<?php
    if(isset($_SESSION['loginb4']))
    {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must login/signup before purchase ticket!',
                })
            </script>
        <?php

        unset($_SESSION['loginb4']);
    }

    include 'footer.php';
?>