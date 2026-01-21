<?php
    include_once 'header.php';
    include_once 'loginsignup.bg.php';
    require_once 'includes/dbconnect.php';
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
                color: black;
            }

            .box{
            border-radius: 5px;
            width:420px;
            height:420px;
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

            .err_msg{
                color:red;
                font-size: 12px;
                transition: 0.5s;       
                opacity:0;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="center2">
            
            
                <br>
                <form action="includes/forgot.func.php" name="forgotpwfrm" method="POST" autocomplete="off" onsubmit="return checkemailexist()" id="email-form">
                <p id="title">Forgot your password?</p><br>
                <p id="ins">Please enter your email address to get verification code.</p><br><br>
                <div class="coninput">
                <div class="input-field-container">
                <input type="text" class="input-field" placeholder="Email address" name="inputemail" id="email" oninput="resetmsg()">
                <label class="input-field-title" for="email">Email address</label>
                <div style="margin-left:6px; margin-top:0px;" id="checkemail" class="err_msg"></div>
                </div>     
                </div>
             
                <br><br>
                <div class="btn">
                    <input class="submit-btn" type="submit" name="sendbtn" value="SEND"><br><br>
                    
                    <a href="login.signup.php" class="backbtn">back to login</a>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    function checkemailexist()
    { 
        var disallowedPattern =  /(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i;
        var email=document.getElementById("email").value;
        if(email=="")
        {
            document.getElementById('email').style.borderBottomColor='red';
            document.getElementById("checkemail").textContent="This field is required";
            document.getElementById("checkemail").style.opacity="1";
            return false;
        }
        else if(email.indexOf(' ') !== -1)
        {
            document.getElementById('email').style.borderBottomColor='red';
            document.getElementById("checkemail").textContent="Email address can't contain any spaces";
            document.getElementById("checkemail").style.opacity="1";
            return false;
        }
        else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
        {
            document.getElementById('email').style.borderBottomColor='red';
            document.getElementById("checkemail").textContent="Invalid email address";
            document.getElementById("checkemail").style.opacity="1";
            return false;
        }
        else if(disallowedPattern.test(email)) 
        {
            document.getElementById('email').style.borderBottomColor='red';
            document.getElementById("checkemail").textContent="SQL statements are not allowed";
            document.getElementById("checkemail").style.opacity="1";
            return false;
        }
        else{
            var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/forgotpw.checkemail.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                if(xhr.readyState===XMLHttpRequest.DONE && xhr.status === 200){
                    var response=xhr.responseText;
                    if(response==="valid"){
                        document.getElementById("checkemail").textContent="";
                        document.getElementById('email').style.borderBottomColor='';
                        document.getElementById("checkemail").style.opacity="0";
                        Swal.fire({
                            icon: "success",
                            title: "Verification code sent",
                            text: "Verification code has been sent, please check your email.",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false
                        }).then((result) => {
                        if(result.isConfirmed) 
                        {
                            const emailform=document.getElementById('email-form');
                            emailform.submit();
                        }
                        });    
                    }
                    else 
                    {
                        document.getElementById('email').style.borderBottomColor='red';
                        document.getElementById("checkemail").textContent="Email address does not exist";
                        document.getElementById("checkemail").style.opacity="1";
                    }
                }
            };
                xhr.send("email=" + encodeURIComponent(email));
                event.preventDefault();
            }
    }

    function resetmsg()
    {
        document.getElementById('email').style.borderBottomColor='';
        document.getElementById("checkemail").textContent="";
        document.getElementById("checkemail").style.opacity="0";
    }
    
</script>

<?php
    include 'footer.php';

?>


