<?php
    include 'includes/dbconnect.php';
    session_start();
    $fullname=$_POST['fullname'];
    
    $contactno=$_POST['contactno'];
    
    $sql="SELECT * FROM user WHERE user_id='".$_SESSION['userid']."';";
    $res=mysqli_query($conn, $sql);
    $row1=mysqli_fetch_assoc($res);
    
    if($row1['user_fullname']!=$fullname || $row1['user_contact_no']!=$contactno)
    {
        $sql="UPDATE user SET user_fullname='".$fullname."', user_contact_no='".$contactno."' WHERE user_id='".$_SESSION['userid']."';";
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
      
header("location: userprofile.php");
exit();

?>