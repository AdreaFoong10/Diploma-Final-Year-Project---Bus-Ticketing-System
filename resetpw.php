<?php

include_once 'header.php';
include_once 'loginsignup.bg.php';

$invalidreset=null;
$invalidpassword=null;
        if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                $invalidreset="Please fill in all the field!";
            }
            if($_GET["error"]=="pwnotmatch")
            {
                $invalidreset="Password does not match!";
            }
            if($_GET["error"]=="invalidpassword")
            {
                $invalidpassword="at least 6 chars, 1 uppercase, 1 number, 1 symbol.";
            }
        }
        

?>

<!DOCTYPE html>
<html>
    <head>

        <title></title>
        <style>
                 body{
                margin:0;
            }
            
            div.border-cc{
                border:1px solid silver;
                
                width:35%;
                height: 40px;
                padding-top:10px;
                padding-bottom: 0;
                text-align:center;
                border-radius: 5px;
                
            }
            select{
                width: 20%;
                height: 50px;
                border:3px solid silver;
                
                text-align: center;
                
                border: 3px solid silver;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                color: grey;

            }
            select#earthimg{
                background-image: url("img/earth.png");
                background-size: 20px;
                background-repeat: no-repeat;
                
                border-radius: 5px;
               
                background-position-x: 20px;
                background-position-y: 12px;
            }
            select:focus{
                border:3px solid lightskyblue;
               
                box-shadow: 2px 2px 5px blueviolet;
            }
            .phonenum{
                width: 20%;
                height: 50px;
                text-align: center;
                
                border: 3px solid silver;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                
            }
            .phonenum:focus{
                border:3px solid lightskyblue;
                box-shadow: 2px 2px 5px blueviolet;
            }
            #phoneimg{
                background-image: url("img/phone.png");
                background-size: 20px;
                background-repeat: no-repeat;
                
                border-radius: 5px;
               
                background-position-x: 20px;
                background-position-y: 15px;
                
                
            }
           
            div.center2{
                margin-top: 0%;
            }
            div.phonealign{
                margin-left: 0px;
            }
            

            .box{
            border-radius: 5px;
            width:450px;
            height:470px;
            position: absolute;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: white;
            padding: 5px;
            overflow:hidden;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            
            }

            #ins{
                font-size:13px; 
                color:grey;
                text-align:left;
                padding-left:33px;

            }
            #title{
                font-size:24px;
                font-weight:550;
                padding-left:32px;
            }
            .coninput{
                padding-left:29px;
            }

            .btn{

                text-align:center;
                
            }
            .backbtn{
                text-align:center; color:#777; font-size:12px;
            }
            .backbtn:hover{
                color:lightblue;
            }
            .showpw{
                font-size:12px;
            }
            .input-field{
                width: 85%;
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

            .err_msg{
                color:red;
                font-size: 12px;
                transition: 0.5s;       
                opacity:0;
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
                width:90%;
                color:white;
                border:3px solid lightskyblue;
                background: linear-gradient(to right, lightskyblue, skyblue);
            }

            .submit-btn:disabled,
            .submit-btn[disabled]{
                border:3px solid #DC143C;
                background: #DC143C;
            }

            .showpassword{
                background:url(img/eye2.png);
                position:absolute;
                cursor:pointer;
                background-size:cover;
                height:17px;
                width:17px;
                left:350px; 
            }

            .showpassword.hide{
                background:url(img/eye1.png);
                background-size:cover;
            }

        </style>
    </head>
    <body>
        <div class="box">
            <div class="center2">
                <br>
                <p style="color:black;" id="title">Reset password</p>
                <p id="ins">Please enter your new password.</p><br>
                <form name="resetpwfrm" id="resetpw-form" method="POST" action="includes/resetpw.func.php" autocomplete="off" onsubmit="return pwvalidate()">
                <div class="coninput">
                <div class="input-field-container">
                <input placeholder="New password" name="pw" type="password" class="input-field" id="pw" oninput="pwoninput()" maxlength="30">
                <label class="input-field-title" for="pw">New password</label>
                <div class="showpassword" id="showpassword" onclick="showpw()" style="top:14px;"></div>
                <div style="margin-left:6px; margin-top:0px;" id="checkpw" class="err_msg"></div>
                </div>

                <script>
                function showpw(){
                var x = document.getElementById("pw");
                if (x.type === "password") {
                x.type = "text";
                document.getElementById('showpassword').classList.add('hide');
                } else {
                x.type = "password";
                document.getElementById('showpassword').classList.remove('hide');
                }
                }
                </script>
                <br>
                <p>
                <div class="input-field-container">
                <input placeholder="Confirm password" name="cpw" type="password" class="input-field" id="cpw" maxlength="30">
                <label class="input-field-title" for="cpw">Confirm password</label>
                <div class="showpassword" id="showconpassword" onclick="showconpw()" style="top:14px;"></div>
                <div style="margin-left:6px; margin-top:0px;" id="checkconpw" class="err_msg"></div>
                </div>
                </p>

                <script>
                function showconpw() {
                var x = document.getElementById("cpw");
                if (x.type === "password") {
                x.type = "text";
                document.getElementById('showconpassword').classList.add('hide');
                } else {
                x.type = "password";
                document.getElementById('showconpassword').classList.remove('hide');
                }
                }
                </script>

                </div>
                <br><br>
                <div class="btn">
                <input class="submit-btn" type="submit" name="resetbtn" value="RESET PASSWORD" id="resetbtn"><br>
                <br>
                
                </div>
                </form>   
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function pwvalidate()
    {
        var pw=document.getElementById('pw').value;
        var conpw=document.getElementById('cpw').value;

        if(pw=="")
        {
            document.getElementById("checkpw").innerHTML="Password can't be empty";
            document.getElementById("pw").style.borderBottomColor="red";
            document.getElementById("checkpw").style.opacity="1";
            return false;
        }
        else{
            document.getElementById("checkpw").innerHTML="";
            document.getElementById("pw").style.borderBottomColor="";
            document.getElementById("checkpw").style.opacity="0";
        }
        

        if(conpw=="")
        {
            document.getElementById("checkconpw").innerHTML="Confirm password can't be empty";
            document.getElementById("cpw").style.borderBottomColor="red";
            document.getElementById("checkconpw").style.opacity="1";
            return false;
        }
        else{
            document.getElementById("checkconpw").innerHTML="";
            document.getElementById("cpw").style.borderBottomColor="";
            document.getElementById("checkconpw").style.opacity="0";
        }

        if(pw!="" && conpw!="")
        {
            if(conpw!=pw)
            {
                document.getElementById("checkconpw").innerHTML="Confirm password does not match with new password";
                document.getElementById("cpw").style.borderBottomColor="red";
                document.getElementById("checkconpw").style.color="red";
                document.getElementById("checkconpw").style.opacity="1";
                return false;
            }
            else{
                document.getElementById("checkconpw").innerHTML="";
                document.getElementById("cpw").style.borderBottomColor="";
                document.getElementById("checkconpw").style.color="";
                document.getElementById("checkconpw").style.opacity="0";
            }

            if(conpw==pw)
            {
                event.preventDefault();
                Swal.fire({
                icon: "success",
                title: "Reset Password",
                text: "You have successfully reset your password.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
                }).then((result) => {
                if(result.isConfirmed) 
                {
                    const resetpwform=document.getElementById('resetpw-form');
                    resetpwform.submit();
                }
                });    
                
            }
        }  



    }

    function pwoninput()
    {
        var pw=document.getElementById('pw').value;
        
        var disallowedPattern =  /(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i;
        if(pw=="")
        {
            document.getElementById("checkpw").innerHTML="";
            document.getElementById("pw").style.borderBottomColor="";
            document.getElementById("checkpw").style.color="";
            document.getElementById("checkpw").style.opacity="0";
            $('#resetbtn').prop('disabled',false);
        }
        else if(disallowedPattern.test(pw))
        {
            document.getElementById("checkpw").innerHTML="SQL statements are not allowed";
            document.getElementById("pw").style.borderBottomColor="red";
            document.getElementById("checkpw").style.color="red";
            document.getElementById("checkpw").style.opacity="1";
            $('#resetbtn').prop('disabled',true);
        }
        else if(pw.indexOf(' ') !== -1)
        {
            document.getElementById("checkpw").innerHTML="Password can't contain any spaces";
            document.getElementById("pw").style.borderBottomColor="red";
            document.getElementById("checkpw").style.color="red";
            document.getElementById("checkpw").style.opacity="1";
            $('#resetbtn').prop('disabled',true);
        }
        else if(pw.length<=5 && pw.length>0 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pw) || !/[A-Z]/.test(pw) || !/[a-z]/.test(pw) || !/[0-9]/.test(pw))
        {
            document.getElementById("checkpw").innerHTML="Password is weak";
            document.getElementById("pw").style.borderBottomColor="red";
            document.getElementById("checkpw").style.color="red";
            document.getElementById("checkpw").style.opacity="1";
            $('#resetbtn').prop('disabled',true);           
        }   
        else if(pw.length<8 && pw.length>5 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pw) || !/[A-Z]/.test(pw) || !/[a-z]/.test(pw) || !/[0-9]/.test(pw))
        {
            document.getElementById("checkpw").innerHTML="Password is medium";
            document.getElementById("pw").style.borderBottomColor="orange";
            document.getElementById("checkpw").style.color="orange";
            document.getElementById("checkpw").style.opacity="1";
            $('#resetbtn').prop('disabled',true);
        }
        else if(pw.length>=8 && /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pw) && /[A-Z]/.test(pw) && /[a-z]/.test(pw) && /[0-9]/.test(pw))
        {
            document.getElementById("checkpw").innerHTML="Password is strong";
            document.getElementById("pw").style.borderBottomColor="#33cc33";
            document.getElementById("checkpw").style.color="#33cc33";
            document.getElementById("checkpw").style.opacity="1";
            $('#resetbtn').prop('disabled',false);   
        }
        else
        {
            document.getElementById("checkpw").innerHTML="";
            document.getElementById("pw").style.borderBottomColor="";
            document.getElementById("checkpw").style.color="";
            document.getElementById("checkpw").style.opacity="0";
            $('#resetbtn').prop('disabled',false);
        }
    }
</script>

<?php
    include 'footer.php';

?>
