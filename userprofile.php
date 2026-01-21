<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';


    if(isset($_FILES['uploadimg']['name']))
    {
        $filename = $_FILES['uploadimg']['name'];
        $tempname = $_FILES['uploadimg']['tmp_name'];
        $folder = "./userimage/" . $filename;
        
        $sql = "UPDATE user SET user_pic='".$filename."' WHERE user_id='".$_SESSION["userid"]."';";
        $result = mysqli_query($conn, $sql);

        if ($result){
            move_uploaded_file($tempname, $folder);
            header("location: userprofile.php?upload=success");
            exit();
        } else {
            header("location: userprofile.php?error=uploadfailed");
            exit();
        }
    }

?>

<!DOCTYPE html>

<html>
<head>
    <title></title>
    <script>
        window.history.forward();
    </script>
    <style>
        body{
            background-color:rgb(234, 232, 232);  
        }

        

        .box{
            border-radius:20px;
            width:1220px;
            height:100px;
            position: relative;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: white;
            padding: 5px;
            margin-top:0px;
            background-color:white;
            margin-left:0;

        }

        .box2{
            border-radius:20px;
            width:200px;
            height:120px;
            position: relative;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: white;
            padding: 20px;
            margin-top:0px;
            background-color:white;
            margin-left:0;

        }


        .proimage{    
            text-align:center;
            padding:5px;
        }

        #imgsize{
            text-align:center;
            position: relative;
            height:50px;
            width:50px;
            border-radius:50%;
            float:left;
            border:2px solid black;
            
        }

        #imgph{
            height:18px;
            width:20px;
            padding-left:5px;
        }

        #imguser{
            height:18px;
            width:20px;
            padding-left:7px;
        }

        #imgemail{
            height:15px;
            width:20px;
            padding-left:7px;
        }

        td,th{
            border:2px solid rgb(234, 232, 232);
            background-color:white;
        }

        table{
            border-collapse:collapse;
            border-radius:20px;
            overflow:hidden;
            width:90%;
            height:277px;
        }

        .userprofile:hover
        {
            cursor:not-allowed;
        }

        #table2
        {
            border-collapse:collapse;
            border-radius:20px;
            overflow:hidden;
            width:90%;
            height:110px;
        }

        .input-field{
    width: 50%;
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

        .updatebutton{
            width:160px;
            height:50px;
            position: relative;
            overflow: hidden;
            border: 1px solid #18181a;
            border-radius:10px;
            color: #18181a;
            display: inline-block;
            font-size: 15px;
            line-height: 15px;
            padding: 18px 18px 17px;
            text-decoration: none;
            cursor: pointer;
            background: #fff;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .updatebutton span:first-child {
            position: relative;
            transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
            z-index: 10;
        }

        .updatebutton span:last-child {
            color: white;
            display: block;
            position: absolute;
            bottom: 0;
            transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
            z-index: 100;
            opacity: 0;
            top: 50%;
            left: 50%;
            transform: translateY(225%) translateX(-50%);
            height: 14px;
            line-height: 13px;
        }

        .updatebutton:after {
            content: "";
            position: absolute;
            bottom: -50%;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            transform-origin: bottom center;
            transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
            transform: skewY(9.3deg) scaleY(0);
            z-index: 50;
        }

        .updatebutton:hover:after {
            transform-origin: bottom center;
            transform: skewY(9.3deg) scaleY(2);
        }

        .updatebutton:hover span:last-child {
            transform: translateX(-50%) translateY(-100%);
            opacity: 1;
            transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
        }

        .image {
  position: relative;
  width: 12%;
}


.file-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
  border-radius:10px;
}


.image:hover::before {
    border-radius:50%;
  opacity:0.6;
  width:64%;
  height:97%;
  
}


.upload-text { 
    width:60px;     
  display: none;
  position: absolute;
  top: 50%;
  left: 38%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 13px;
  font-weight: bold;
  z-index: 99;
  font-family: Helvetica;
}


.image:hover .upload-text {
  font-size:10px;
  color: white;
  display: block;
}


.image img {
  height: 100px;
  width: 100px;
  border-radius: 50%;
  border: 4px solid black;
}


.image::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: black;
  opacity: 0;
  
  
}
.err_msg{
    color:red;
    font-size: 12px;
    transition: 0.5s;       
    opacity:0;
}


            .submit-btn{
                width: 35%;
                padding: 10px;
                cursor: pointer;
                display: block;
                margin: auto;
                outline: 0;
                
                transition: 0.3s;
                color:white;
                box-shadow: 2px 2px 0 0 grey;
                margin-left:375px;
                background:#4285f4;
                border:1px solid #4285f4;
            
                color:white;
            
            }

            .submit-btn:hover{   
                background:#1669F2;
                border:1px solid #1669F2;
                box-shadow: 0 0 6px #4285f4;
            }
            .showpassword{
                background:url(img/eye2.png);
                position:absolute;
                cursor:pointer;
                background-size:cover;
                height:17px;
                width:17px;
                left:290px; 
            }

            .showpassword.hide{
                background:url(img/eye1.png);
                background-size:cover;
            }


            


    </style>

    <script>
        
    
        function edit()
        {
            document.getElementById("userpro").style.display="none";
            document.getElementById("editbtn").style.display="none";
            document.getElementById("cancelbtn").style.display="block";
            document.getElementById("userproedit").style.display="block";  
        }

        function cancel()
        {
            document.getElementById("userpro").style.display="block";
            document.getElementById("editbtn").style.display="block";
            document.getElementById("cancelbtn").style.display="none";
            document.getElementById("userproedit").style.display="none";
        }

        function resetpw()
        {
            document.getElementById("reset").style.display="block";
            document.getElementById("BOX").style.height="310px";
            document.getElementById("cancel").style.display="inline-block";
        }
        function cancelpw()
        {
            document.getElementById("reset").style.display="none";
            document.getElementById("BOX").style.height="100px";
            document.getElementById("cancel").style.display="none";    
        }

    </script>

</head>
<body>
        <?php
            $sql="SELECT * FROM user WHERE user_id='".$_SESSION["userid"]."';";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
        ?>
        
        
            <div style="background-color:white; padding-top:1px; box-shadow: 1px 1px 1px lightgrey">
                <div style="margin-left:150px;">
                <h3>My Profile</h3>
                
                
                <?php
                if($_SESSION['glogin']==1){
                    echo '<img src="' . $row['user_pic'] . '" id="imgsize">';
                    echo '<div style="padding-top:8px; padding-left:70px;">';
                    echo '<span style="font-size:13px; ">Hello!<br>';
                    echo '<div style="font-size:15px; font-weight:bold; padding-top:5px;">';
                    echo $row['user_fullname'];
                    echo '</div></span></div>';
                } 
                else 
                {
                    echo '<img src="./userimage/' . $row['user_pic'] . '" id="imgsize">';
                    echo '<div style="padding-top:8px; padding-left:70px;">';
                    echo '<span style="font-size:13px; ">Hello!<br>';
                    echo '<div style="font-size:15px; font-weight:bold; padding-top:5px;">';
                    echo $row['user_fullname'];
                    echo '</div></span></div>';
                }
                ?>
                <br>
                </div>    
            </div>
            

            
        <div style="margin-left:150px;">
        
        <br><br>
        
            <div id="userpro" style="display:block; font-size:15px;">
            <div style="font-weight:bold;"><img src="img/user.png" id="imguser">&nbsp;ACCOUNT INFORMATION <div style="padding-left:1160px;" id="editbtn"><img src="img/edit.png" style="width:15px; height:15px; float:left;"><input type="button" name="editbtn" value="EDIT" onclick="edit();" style="font-size:15px; display:block; padding-left:8px; border:0px; cursor:pointer; padding-right:8px; padding-top:0px; padding-bottom:1px; background-color:transparent;"></div> </div>
               <table class="userprofile">

                <tr>
                    <td><p style="padding-left:5px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Full Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;<?php echo $row['user_fullname']; ?></P><br></td>

                    <td><p style="padding-left:5px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Username</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;<?php echo $row['username']; ?></P><br></td>
                </tr>
                
                <tr>
                    <td><p style="padding-left:5px;"><img src="img/phone.png" id="imgph">&nbsp;<span style="font-weight:bold;">Phone Number</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;<?php echo $row['user_contact_no']; ?></p><br></td>
            
                    <td><p style="padding-left:5px;"><img src="img/email.png" id="imgemail">&nbsp;<span style="font-weight:bold;">Email Address</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;<?php echo $row['user_email_address']; ?></p><br></td>
                </tr>
                </table>
                <br>
            <h4><img src="img/user.png" id="imguser">&nbsp;SETTING</h4>
                <table class="userprofile" id="table2">
                <tr>
                <td><p style="padding-left:5px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Password</span><br><br>&nbsp;&nbsp;&nbsp;Change Password</p></td>  
                </tr>
                </table>
                <br>
            </div>


            <div id="userproedit" style="display:none;">
            <div><img src="img/image.icon.png" id="imguser" style="width:18px; height:18px;">&nbsp;User Image <div style="padding-left:1141px;"><img src="img/close.png" style="margin-top:2px; margin-right:0px; width:11px; height:11px; float:left;"><input type="button" name="cancelbtn" value="CANCEL" onclick="cancel();" id="cancelbtn" style="display:none; background-color:transparent; padding-left:8px; border:0px; cursor:pointer; font-size:14px; padding-right:8px; padding-top:0px; padding-bottom:0px; margin-right:20px;"></div></div>
            
            <form id="form" method="POST" enctype="multipart/form-data" action="uploaduserimg.php" style="width:100%;">

                        <div class="image" style="margin-left:10px;">
                                
                                <?php
                                    if($_SESSION['glogin']==1)
                                    {
                                        echo '<img src="' . $row['user_pic'] . '">';
                                    } 
                                    else 
                                    {
                                        echo '<img src="./userimage/' . $row['user_pic'] . '">';
                                    }
                                ?>
                                <input type="file" class="file-input" id="image" name="uploadimg">
                                <div class="upload-text">CHANGE &nbsp;AVATAR</div>
                        </div>
               
            </form>
            </td><tr>
            <br><br>
            
            <form method="post" action="update_profile.php" id="edit_pro" onsubmit="return resetformvalidate()" autocomplete="off">
            <div style="font-size:15px;">
            
               <table id="editfrm">
               
                
                <div style="font-weight:bold;"><img src="img/user.png" id="imguser">&nbsp;ACCOUNT INFORMATION</div><br>
                    
                    
                    <tr>
                        
                        <td style="width:50%; padding-left:15px; padding-top:10px;"><p style="padding-left:5px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Full Name</span><br><br>
                        <div class="input-field-container">
                        <input type="text" name="fullname" id="fullname" oninput="checkfullname()" placeholder="fullname" value="<?php echo $row['user_fullname']; ?>" class="input-field"></div><br>
                        <label class="input-field-title" for="fullname">Fullname</label>
                        <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checkfullname"></div>
                        </div></td>
                        
                        <td><div style="padding-left:15px; padding-top:10px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Username</span><br><br><span style="padding-left:8px;"><?php echo $row['username']; ?></span></p><br></td>
                    </tr>

                    <tr>
                        <td style="padding-left:15px;"><p style="padding-left:5px; padding-top:10px;"><img src="img/phone.png" id="imgph">&nbsp;<span style="font-weight:bold;">Phone Number</span><br><br>
                        <div class="input-field-container">
                        <input type="tel" name="contactno" oninput="checkphonenum()" placeholder="Phone number" id="contactno" value="<?php echo $row['user_contact_no']; ?>" maxlength="11" class="input-field"></div><br>
                        <label class="input-field-title" for="contactno">Phone number</label>
                        <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checkphonenum"></div>
                        </div></td>

                        <td><div style="padding-left:15px; padding-top:10px;"><img src="img/email.png" id="imgemail">&nbsp;<span style="font-weight:bold;">Email Address</span><br><br><span style="padding-left:7px;"><?php echo $row['user_email_address']; ?></span></p><br></td>
                    </tr>
               

                </table>
                <br>
            <h4><img src="img/user.png" id="imguser">&nbsp;SETTING</h4>

                <div class="box" id="BOX">
                    <br>
                <div style="padding-left:5px;"><img src="img/user.png" id="imguser">&nbsp;<span style="font-weight:bold;">Password</span><br><br> <div style="margin-left:5px;"><input type="button" value="Change Password" name="resetbtn" onclick="resetpw();" style="color:darkblue; border:none; background-color:transparent; cursor:pointer; font-size:15px; padding-left:0px; width:122px; float:left; ">  <div id="cancel" style="display:none; position:relative; margin-left:85px;"><img src="img/close.png" style="width:8px; height:10px; margin-top:8px;"><input type="button" name="cancelbtn" value="CANCEL" onclick="cancelpw();" style="border:0px; background-color:transparent; font-size:13px; cursor:pointer;"></div></div></div> 
                
                
                <div id="cancel" style="display:none"><input type="button" name="cancelbtn" value="close" onclick="cancelpw();"></div>
                
                <div id="reset" style="display:none; padding-left:10px;">
                    <br>
                    <div class="input-field-container">
                    <input type="password" id="oldpw" name="oldpw" class="input-field" placeholder="Old Password" style="width: 25%;" oninput="checkoldpw()">
                    <label class="input-field-title" for="oldpw">Old password</label>
                    <div class="showpassword" id="showoldpassword" onclick="showoldpw()" style="top:14px;"></div>
                    <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checkoldpw"></div>
                    </div>

                    <script>
                        function showoldpw(){
                        var x = document.getElementById("oldpw");
                        if (x.type === "password") {
                            x.type = "text";
                            document.getElementById('showoldpassword').classList.add('hide');
                        } else {
                            x.type = "password";
                            document.getElementById('showoldpassword').classList.remove('hide');
                        }
                        }
                    </script>
                    
                    <div class="input-field-container">
                    <input type="password" id="newpw" name="newpw" class="input-field" placeholder="New Password" style="width: 25%;" oninput="checknewpw()">
                    <label class="input-field-title" for="newpw">New password</label>
                    <div class="showpassword" id="shownewpassword" onclick="shownewpw()" style="top:14px;"></div>
                    <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checknewpw"></div>
                    </div>

                    <script>
                        function shownewpw(){
                        var x = document.getElementById("newpw");
                        if (x.type === "password") {
                            x.type = "text";
                            document.getElementById('shownewpassword').classList.add('hide');
                        } else {
                            x.type = "password";
                            document.getElementById('shownewpassword').classList.remove('hide');
                        }
                        }
                    </script>
                    
                    <div class="input-field-container">
                    <input type='password' id="newconpw" name="newconpw" class="input-field" placeholder="Confirm Password" style="width: 25%;" oninput="checkconpw()">
                    <label class="input-field-title" for="newconpw">Confirm password</label>
                    <div class="showpassword" id="showconpassword" onclick="showconpw()" style="top:14px;"></div>
                    <div style="margin-left:6px; margin-top:0px;" class="err_msg" id="checknewconpw"></div>
                    </div>

                    <script>
                        function showconpw(){
                        var x = document.getElementById("newconpw");
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
                </div>

            
            </div> 
                <br><br><br><br>       
                <input id="updateprobtn" name="updatebtn" class="submit-btn" type="submit" value="Update">
            </form>

            <script>
            function updatealert(event) {
            event.preventDefault();
            Swal.fire({
                icon: "success",
                title: "Updated",
                text: "You have successfully updated your profile.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    const edit_pro=document.getElementById('edit_pro');
                    edit_pro.submit();
                }
                
              });    
            
        }
        </script>
            
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            var disallowedPattern =  /(DELETE|UPDATE|DROP|TRUNCATE|ALTER|INSERT|SELECT)/i;
            document.getElementById("image").onchange = function(){
                document.getElementById("form").submit();
            };

            function resetformvalidate()
            {
                var newconpw=document.getElementById("newconpw").value;
                var oldpw=document.getElementById("oldpw").value;
                var newpw=document.getElementById("newpw").value;
                var fullname=document.getElementById("fullname").value;
                var phonenum=document.getElementById("contactno").value;
                

                if(fullname=="")
                {
                    document.getElementById("checkfullname").style.opacity="1";
                    document.getElementById("checkfullname").innerHTML="Fullname can't be empty";
                    document.getElementById("fullname").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checkfullname").style.opacity="0";
                    document.getElementById("checkfullname").innerHTML="";
                    document.getElementById("fullname").style.borderBottomColor="";
                }

                if(phonenum=="")
                {
                    document.getElementById("checkphonenum").style.opacity="1";
                    document.getElementById("checkoldpw").innerHTML="Phone number can't be empty";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checkphonenum").style.opacity="0";
                    document.getElementById("checkphonenum").innerHTML="";
                    document.getElementById("contactno").style.borderBottomColor="";
                }

                
                if(oldpw!="" || newpw!="" || newconpw!="")
                {
                if(oldpw =="")
                {
                    document.getElementById("checkoldpw").style.opacity="1";
                    document.getElementById("checkoldpw").innerHTML="Password can't be empty";
                    document.getElementById("oldpw").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checkoldpw").style.opacity="0";
                    document.getElementById("checkoldpw").innerHTML="";
                    document.getElementById("oldpw").style.borderBottomColor="";
                }

                if(newpw=="")
                {
                    document.getElementById("checknewpw").style.opacity="1";
                    document.getElementById("checknewpw").innerHTML="New password can't be empty";
                    document.getElementById("newpw").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checknewpw").style.opacity="0";
                    document.getElementById("checknewpw").innerHTML="";
                    document.getElementById("newpw").style.borderBottomColor="";
                }

                if(conpw=="")
                {
                    document.getElementById("checknewconpw").style.opacity="1";
                    document.getElementById("checknewconpw").innerHTML="Confirm password can't be empty";
                    document.getElementById("newconpw").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checknewconpw").style.opacity="0";
                    document.getElementById("checknewconpw").innerHTML="";
                    document.getElementById("newconpw").style.borderBottomColor="";
                }
                }
                var conpw = document.getElementById("newconpw").value;
                var newpw=document.getElementById("newpw").value;
                if(newpw!=conpw)
                {
                    document.getElementById("checknewconpw").style.opacity="1";
                    document.getElementById("checknewconpw").innerHTML="Confirm password does not match with new password";
                    document.getElementById("newconpw").style.borderBottomColor="red";
                    return false;
                }
                else{
                    document.getElementById("checknewconpw").style.opacity="0";
                    document.getElementById("checknewconpw").innerHTML="";
                    document.getElementById("newconpw").style.borderBottomColor=""; 
                }
                
                if(document.getElementById("checkfullname").innerHTML=="" && document.getElementById("checkphonenum").innerHTML=="" &&
                document.getElementById("checkoldpw").innerHTML=="" && document.getElementById("checknewconpw").innerHTML=="" &&
                document.getElementById("checknewpw").innerHTML=="")
                {
                    event.preventDefault();
                    Swal.fire({
                    icon: "success",
                    title: "Updated",
                    text: "You have successfully updated your profile.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                    }).then((result) => {
                    if(result.isConfirmed) 
                    {
                        const edit_pro=document.getElementById('edit_pro');
                        edit_pro.submit();
                    }
                
                    });  
                }
                
            }

        function checkfullname()
        {
            var fullname=document.getElementById("fullname").value;

            if(fullname=="")
            {
                document.getElementById("checkfullname").innerHTML="";
                document.getElementById("fullname").style.borderBottomColor="";
                document.getElementById("checkfullname").style.opacity="0";
                
            }
            
                
            if(fullname!="")
            {
                
                document.getElementById("fullname").style.borderBottomColor="";
                document.getElementById("checkfullname").innerHTML="";
                
                if(/[\&!^£$%*()}{@#~?><>,|=+¬:`;]/.test(fullname) || /[0-9]+/.test(fullname)) 
                {
                    document.getElementById("checkfullname").innerHTML="Fullname can't contain number or special character";
                    document.getElementById("fullname").style.borderBottomColor="red";
                    document.getElementById("checkfullname").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(fullname.charAt(0) === ' ')
                {
                    document.getElementById("checkfullname").innerHTML="Fullname can't start with a space";
                    document.getElementById("fullname").style.borderBottomColor="red";
                    document.getElementById("checkfullname").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(disallowedPattern.test(fullname)) 
                {
                    document.getElementById("checkfullname").innerHTML="SQL statements are not allowed";
                    document.getElementById("fullname").style.borderBottomColor="red";
                    document.getElementById("checkfullname").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else{
                    document.getElementById("checkfullname").innerHTML="";
                    document.getElementById("checkfullname").style.opacity="0";
                    $('#updateprobtn').prop('disabled',false);
                }
            }
        }
        

        function checkphonenum()
        {
            var phonenum=document.getElementById("contactno").value;
            if(phonenum=="")
            {
                document.getElementById("checkphonenum").innerHTML="";
                document.getElementById("contactno").style.borderBottomColor="";
                document.getElementById("checkphonenum").style.opacity="0";  
            }
            else
            {

                if(phonenum.indexOf(' ') !== -1)
                {
                    document.getElementById("checkphonenum").innerHTML="Phone number can't contain any spaces";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(phonenum.charAt(0)!=='0') 
                {
                    document.getElementById("checkphonenum").innerHTML="The first number of phone number must be 0";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(/[\&!^£$%*()}{@#~?><>,|=+_.¬:\`;]/.test(phonenum) || /[a-zA-Z]+/.test(phonenum))
                {
                    document.getElementById("checkphonenum").innerHTML="Phone number can't contain letter and special character";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(!/^\d{10,11}$/.test(phonenum))
                {
                    document.getElementById("checkphonenum").innerHTML="The length of phone number should be 10 or 11 numbers";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else if(disallowedPattern.test(phonenum)) 
                {
                    document.getElementById("checkphonenum").innerHTML="SQL statements are not allowed";
                    document.getElementById("contactno").style.borderBottomColor="red";
                    document.getElementById("checkphonenum").style.opacity="1";
                    $('#updateprobtn').prop('disabled',true);
                }
                else {
                    document.getElementById("checkphonenum").innerHTML="";       
                    document.getElementById("checkphonenum").style.opacity="0";
                    document.getElementById("contactno").style.borderBottomColor=""; 
                    $('#updateprobtn').prop('disabled',false);
                }    
            }
        }



            function checkoldpw()
            {
                var oldpw=document.getElementById("oldpw").value;
               
                if(oldpw=="")
                {
                    document.getElementById("checkoldpw").style.opacity="0";
                    document.getElementById("checkoldpw").innerHTML="";
                    document.getElementById("oldpw").style.borderBottomColor ="";
                    
                }
                else if(oldpw!="")
                {
                    

                    
                    document.getElementById("oldpw").style.borderBottomColor="";
                        jQuery.ajax({
                            url: "includes/userprocheckpw.php",
                            data:'oldpw='+$("#oldpw").val(),
                            type: "POST",
                            success:function(data){
                            $("#checkoldpw").html(data);
                            if (document.getElementById("checkoldpw").innerHTML!="") {
                                document.getElementById("oldpw").style.borderBottomColor = "red";
                                document.getElementById("checkoldpw").style.opacity="1";
                                $('#updateprobtn').prop('disabled',true);
                            } 
                            if(document.getElementById("checkoldpw").innerHTML=="")
                            {
                                document.getElementById("oldpw").style.borderBottomColor = "";
                                document.getElementById("checkoldpw").style.opacity="0";
                                $('#updateprobtn').prop('disabled',false);
                            }
                        },
                            error:function (){}
                        });
                    
                }
                
            }

            function checknewpw()
            {
                var oldpw=document.getElementById("oldpw").value;
                var newpw=document.getElementById("newpw").value;
                var checkconpw=document.getElementById("newconpw").value;
                if(newpw=="")
                {
                    document.getElementById("checknewpw").innerHTML="";
                    document.getElementById("checknewpw").style.color=""; 
                    document.getElementById("newpw").style.borderBottomColor="";
                    document.getElementById("checknewpw").style.opacity="0"; 
                     
                }

                if(newpw!="")
                {       
                    document.getElementById("newpw").style.borderBottomColor="";
                    if(document.getElementById("checkoldpw").innerHTML!="" || document.getElementById("checknewconpw").innerHTML=="Password is not match!")
                    {
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else{
                    if(newpw.indexOf(' ') !== -1)
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="Password can't contain any spaces";
                        document.getElementById("newpw").style.borderBottomColor="red";
                        document.getElementById("checknewpw").style.color="red";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else if(newpw==oldpw)
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="New password cannot same with old password";
                        document.getElementById("newpw").style.borderBottomColor="red";
                        document.getElementById("checknewpw").style.color="red";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else if(disallowedPattern.test(newpw)) 
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="SQL statement are not allowed";
                        document.getElementById("newpw").style.borderBottomColor="red";
                        document.getElementById("checknewpw").style.color="red";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else if(newpw.length<=5 && newpw.length>0 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(newpw) || !/[A-Z]/.test(newpw) || !/[a-z]/.test(newpw) || !/[0-9]/.test(newpw))
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="Password is weak";
                        document.getElementById("newpw").style.borderBottomColor="red";
                        document.getElementById("checknewpw").style.color="red";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else if(newpw.length<8 && newpw.length>5 || !/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(newpw) || !/[A-Z]/.test(newpw) || !/[a-z]/.test(newpw) || !/[0-9]/.test(newpw))
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="Password is medium";
                        document.getElementById("newpw").style.borderBottomColor="orange";
                        document.getElementById("checknewpw").style.color="orange";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else if(newpw.length>=8 && /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(newpw) && /[A-Z]/.test(newpw) && /[a-z]/.test(newpw) && /[0-9]/.test(newpw))
                    {
                        document.getElementById("checknewpw").style.opacity="1";
                        document.getElementById("checknewpw").innerHTML="Password is strong";
                        document.getElementById("newpw").style.borderBottomColor="#33cc33";
                        document.getElementById("checknewpw").style.color="#33cc33";
                        $('#updateprobtn').prop('disabled',false);
                    }
                    else
                    {
                        document.getElementById("checknewpw").style.opacity="0";
                        document.getElementById("checknewpw").innerHTML="";
                        document.getElementById("newpw").style.borderBottomColor="";
                        $('#updateprobtn').prop('disabled',false);
                    }  
                    } 
                }
            }

            function checkconpw()
            {
                var newpw=document.getElementById("newpw").value;
                var newconpw=document.getElementById("newconpw").value;

                if(newconpw=="")
                {
                    document.getElementById("checknewconpw").style.opacity="0";
                    document.getElementById("checknewconpw").innerHTML="";
                    document.getElementById("newconpw").style.borderBottomColor="";
                    
                }
                else if(newconpw!="")
                {
                    if(document.getElementById("checkoldpw").innerHTML!="" || document.getElementById("checknewpw").innerHTML!="Password is strong")
                    {
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else{

                    if(newconpw!=newpw)
                    {
                        document.getElementById("checknewconpw").style.opacity="1";
                        document.getElementById("checknewconpw").innerHTML="Password is not match!";
                        document.getElementById("newconpw").style.borderBottomColor="red";
                        $('#updateprobtn').prop('disabled',true);
                    }
                    else{
                        document.getElementById("checknewconpw").style.opacity="0";
                        document.getElementById("checknewconpw").innerHTML="";
                        document.getElementById("newconpw").style.borderBottomColor="";
                        $('#updateprobtn').prop('disabled',false);
                       
                    }
                    }
                }

            }
        </script>  
        <br><br><br><br><br>
</body>
</html>
<?php
    include 'footer.php';
?>