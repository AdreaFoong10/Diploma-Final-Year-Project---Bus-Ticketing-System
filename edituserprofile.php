<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';
    if(isset($_POST['updatebtn']))
    {
        $fullname=$_POST['fullname'];
        $username=$_POST['username'];
        $contactno=$_POST['contactno'];
        $email=$_POST['email'];
        $sql="SELECT * FROM user WHERE user_id='".$_SESSION['userid']."';";
        $res=mysqli_query($conn, $sql);
        $row1=mysqli_fetch_assoc($res);
        
        if($row1['user_fullname']!=$fullname || $row1['username']!=$username || $row1['user_contact_no']!=$contactno || $row1['user_email_address']=$email)
        {
            $sql="UPDATE user SET user_fullname='".$fullname."', username='".$username."', user_contact_no='".$contactno."', user_email_address='".$email."' WHERE user_id='".$_SESSION['userid']."';";
            mysqli_query($conn, $sql);
        }

        if(isset($_POST['oldpw']) && isset($_POST['newpw']) && isset($_POST['newconpw']))
        {
            $oldpw=$_POST['oldpw'];
            $newpw=$_POST['newpw'];
            $newconpw=$_POST['newconpw'];  
            $checksql="SELECT * FROM user WHERE user_id='".$_SESSION['userid']."';";
            $result=mysqli_query($conn, $checksql);
            $row2=mysqli_fetch_assoc($result);
            if($row2['user_password']==$oldpw)
            {
                if($row2['user_password']!=$newpw)
                {
                    if($newpw==$newconpw)
                    {
                        $resetsql="UPDATE user SET user_password='".$newpw."' WHERE user_id='".$_SESSION['userid']."';";
                        mysqli_query($conn, $resetsql);
                    }
                }
            }
        }
          
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        .box{
            border-radius: 5px;
            width:330px;
            height:570px;
            position: absolute;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: white;
            padding: 20px;
            margin-top:120px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .proimage{    
            text-align:center;
            padding:5px;
        }

        #imgsize{
            text-align:center;
            position: relative;
            height:150px;
            width:150px;
            border-radius:50%;
        }

        #imgph{
            height:19px;
            width:20px;
            padding-left:5px;
        }

        #imguser{
            height:20px;
            width:20px;
            padding-left:7px;
        }

        #imgemail{
            height:20px;
            width:20px;
            padding-left:7px;
        }

    </style>

    <script>
        function resetpw()
        {
            document.getElementById("reset").style.display="block";
           
        }
        function cancel()
        {
            document.getElementById("reset").style.display="none";
            
        }
    </script>

</head>
<body>
    <?php
        $sql="SELECT * FROM user WHERE user_id='".$_SESSION["userid"]."';";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
    ?>
        
    <div class="box" >   
        <div class="proimage"><img src="./userimage/<?php echo $row['user_pic']; ?>" id="imgsize"></div>

            <form method="post" action="">
                <P><input type="text" name="fullname" value="<?php echo $row['user_fullname']; ?>"></p>
                <P><input type="text" name="username" value="<?php echo $row['username']; ?>"></p>
                <P><input type="tel" name="contactno" value="<?php echo $row['user_contact_no']; ?>"></p>
                <P><input type="email" name="email" value="<?php echo $row['user_email_address']; ?>"></p>
                <p><input type="button" value="Reset Password" name="resetbtn" onclick="resetpw();" style="border:none; background-color:white; cursor:pointer;"></p>
                <div id="reset" style="display:none;">
                    <p id="oldpw"><input type="password" name="oldpw"></p>
                    <p id="newpw"><input type="password" name="newpw"></p>
                    <p id="newconpw"><input type='password' name="newconpw"></p>
                    <p id="cancel"><input type="button" name="cancelbtn" value="close" onclick="cancel()"></p>
                </div>
                <p><input type="submit" name="updatebtn" value="update"></p>
                
            </form>

            <form action="uploaduserimg.php" method="post" enctype="multipart/form-data">
                <P><input type="file" name="image"><input type="submit" name="uploadbtn" value="upload"></p>
            </form>

    </div>   
</body>
</html>