<?php
session_start();
require_once 'dbconnect.php';

$oldpw=$_POST['oldpw'];

$sql="SELECT * FROM user WHERE username='".$_SESSION['usn']."' AND user_password='".$oldpw."';";
$result=mysqli_query($conn, $sql);
$numrow=mysqli_num_rows($result);
$bordercolor=null;

if($numrow==0) 
{
    echo "<script>document.getElementById('oldpw').style.borderBottomColor='red';</script>";
    echo "<script>document.getElementById('checkoldpw').innerHTML='Incorrect password!';</script>";
    echo "<script>document.getElementById('checkoldpw').style.opacity='1';</script>";
    
}
else if($numrow==1)
{  
    echo "<script>document.getElementById('oldpw').style.borderBottomColor='';</script>";
    echo "<script>document.getElementById('checkoldpw').innerHTML='';</script>";
    echo "<script>document.getElementById('checkoldpw').style.opacity='0';</script>";
}











?>