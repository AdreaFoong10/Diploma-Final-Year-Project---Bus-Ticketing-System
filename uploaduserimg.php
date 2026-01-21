
<?php
    session_start();
    include_once 'includes/dbconnect.php';
    if(isset($_FILES["uploadimg"]["name"])){
        $imageName = $_FILES["uploadimg"]["name"];
        $tmpName = $_FILES["uploadimg"]["tmp_name"];
        $query = "UPDATE user SET user_pic='".$imageName."' WHERE user_id='".$_SESSION["userid"]."';";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'userimage/' . $imageName);
        $_SESSION['glogin']=0;
        header("location: userprofile.php?upload=success");
        exit();
    }
?>



