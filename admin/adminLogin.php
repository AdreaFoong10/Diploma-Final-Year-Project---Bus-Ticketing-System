<!DOCTYPE html>
<html>
<head>
 <?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
    exit;
}
 
// Include config file
include 'dbconnect.php';
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $db_usn = test_input($_POST["admin_username"]);
    $password = test_input($_POST["admin_password"]);
    $sql="SELECT admin_username, admin_password FROM admin";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['admin_username']==$db_usn)
            {
                $sql2="SELECT admin_password FROM admin WHERE admin_username='".$row["admin_username"]."'";
                $resultpw=mysqli_query($conn,$sql2);
                while($row2=mysqli_fetch_assoc($resultpw))
                {
                    
                    if($row2["admin_password"]==$password)
                    {
                       
                        header("location: Admin_Dashboard.php");
                        exit();
                    }
                    else{
                        header("location: adminLogin.php");
                        exit();
                    }
                }

            }
        }
        
    }

?>





 
<title>Comet Bus</title>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	
		<style>
			body{
				margin:0;
			}

			h1{
				margin-top:0;
			}
			</style>
</head>
<body>

<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1>Admin Login</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
				<form action="#" method="POST">
            
					<div class="icon1">
						<span class="fa fa-user" aria-hidden="true"></span>
						<input type="text" name="admin_username" placeholder="Username" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"aria-hidden="true"></span>
						<input type="password" name="admin_password" placeholder="Password" required=""/>
					</div>
					<div class="bottom">
						<button class="btn">Log In</a></button>
					</div>
					<div class="links">
						<div class="clear"></div>
					</div>
				</form>	
			</div>
		</div>
		

		<div class="copyright">
			<p><center>Copyright &copy; Comet Bus 2022</a></center></p>
		</div>
	</div>
</div>	


</body>
</html>