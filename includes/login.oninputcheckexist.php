<?php
require_once 'dbconnect.php';

if(!empty($_POST['usn']))
{
    $sql="SELECT user_password, username FROM user WHERE user_password='".$_POST['pw']."' AND username='".$_POST['usn']."';";
    $result=mysqli_query($conn, $sql);
    $num_row=mysqli_num_rows($result);
   
    if($num_row==1) 
    {
        echo "<script>document.getElementById('emptyusn').innerHTML='';</script>";
        echo "<script>document.getElementById('usn').style.borderBottomColor='';</script>";
        echo "<script>document.getElementById('checkpwusn').innerHTML='';</script>";
       
    }
    else
    {  
        echo "<script>document.getElementById('emptyusn').innerHTML='';</script>";
        echo "<script>document.getElementById('checkpwusn').innerHTML='';</script>";
        echo "<script>document.getElementById('usn').style.borderBottomColor='';</script>";
       
        
    }

}

if(!empty($_POST['pw']))
{
    $sql="SELECT user_password, username FROM user WHERE user_password='".$_POST['pw']."' AND username='".$_POST['usn']."';";
    $result=mysqli_query($conn, $sql);
    $num_row=mysqli_num_rows($result);


    if($num_row==1) 
    {
        echo "<script>document.getElementById('emptypw').innerHTML='';</script>";
        echo "<script>document.getElementById('pw').style.borderBottomColor='';</script>";
        echo "<script>document.getElementById('checkpwusn').innerHTML='';</script>";
    }
    else
    {  
       
        echo "<script>document.getElementById('emptypw').innerHTML='';</script>";
        echo "<script>document.getElementById('pw').style.borderBottomColor='';</script>";
        echo "<script>document.getElementById('checkpwusn').innerHTML='';</script>";
       
       
        
    }

}

if(!empty($_POST['pw']) && !empty($_POST['usn']))
{
    $sql="SELECT user_password, username FROM user WHERE user_password='".$_POST['pw']."' AND username='".$_POST['usn']."';";
    $result=mysqli_query($conn, $sql);
    $num_row=mysqli_num_rows($result);
    $check=null;
    if($num_row==1)
    {
        
    }
    else
    {
        echo "<script>document.getElementById('checkpwusn').innerHTML='Invalid password or username';</script>";
        
    }
    echo "<script>console.log('$check');</script>";
}











?>