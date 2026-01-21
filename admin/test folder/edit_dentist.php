<?php include("connddb.php");?>
<!DOCTYPE html>
<html>
<head><title>Edit Dentist Information</title>
<link href="edit_dentist_design.css" type="text/css" rel="stylesheet" />
</head>
<body> 
		<?php
		if(isset($_GET["edit"]))
		{
			$dentistdd = $_GET["dentistdd"]; 
 
			$result = mysqli_query($conn, "SELECT * FROM dentist WHERE Dentist_ID = $dentistdd");
			$row = mysqli_fetch_assoc($result);
		?>
		<div id="title">
		<h2>Edit Dentist Information </h2>
		</div>
		<fieldset>
		<form name="editdentistfrm" method="post" action="" enctype="multipart/form-data">
		<div id="title">
        <img src="/i_smile_dental/admin/<?php echo $row["Dentist_Picture"]; ?>" width="200" height="200">
		</div>

            <div class="name">
			    <p>Name: <input type="text" name="Dentist_Name" size="30" value="<?php echo $row['Dentist_Name']; ?>" required ></p>
            </div>

            <div class="age">
			    <p>Age: <input type="number" name="Dentist_Age" min="22" max="50" value="<?php echo $row['Dentist_Age']; ?>" required></p>
            </div>

            <div class="gender">
                <p>Gender:
                    <select name="Dentist_Gender" required>
                        <option value="<?php echo $row['Dentist_Gender']; ?>"><?php echo $row['Dentist_Gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </p>
            </div>

            <div class="phone">
                <p>Phone: <input id="ph" type="text" name="Dentist_Phone" size="11" value="<?php echo $row['Dentist_Phone']; ?>" required pattern="[0-9]{11}"></p>
                <div class="format">
					<p>Format : 60123456789</p>
				</div>
            </div>
            
            <div class="email">
                <p>Email: <input type="email" name="Dentist_Email" size="30" value="<?php echo $row['Dentist_Email']; ?>" required></p>
            </div>
            
            <div class="special">
                <p>Speciality: <input type="text" name="Dentist_Speciality" value="<?php echo $row['Dentist_Speciality']; ?>" required></p>
            </div>

            <div class="salary">
                <p>Salary: <input type="text" name="Dentist_Salary" size="10" value="<?php echo $row['Dentist_Salary']; ?>" required></p>
            </div>

			<div class="info">
				<p>Info : <input type="text" name="Dentist_info" size="10" value="<?php echo $row['Dentist_info']; ?>" required></p>
			</div>

			<div class="additional lang">
				<p>Additional Language : <input type="text" name="Dentist_addit_language" size="20" value="<?php echo $row['Dentist_addit_language']; ?>" required></p>
			</div>

			<div class="more details">
				<p>More Details : <input type="text" name="Dentist_more_details" size="50" value="<?php echo $row['Dentist_more_details']; ?>" required></p>
			</div>
            
            <div class="pp">
                <p>Profile Picture: <input type="file" name="Dentist_Picture"></p>
            </div>

			<p><input type="submit" name="updatebtn" id="btnn1" value="UPDATE"></p>

		</form>
		<p><a href="view_dentist.php"><input type="button" name="backbtn" id="btnn2" value="BACK"></a></p>
		</fieldset>

        <?php 
		}
		  ?>
</body>
</html>
 
<?php
	if (isset($_POST["updatebtn"])){
		$uploadOk = 1;
		$target_dir = "i_smile_dental/admin/";
		$target_file = $target_dir . basename($_FILES["Dentist_Picture"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
	$dentist_name = $_POST['Dentist_Name'];
	$dentist_age = $_POST['Dentist_Age']; 
	$dentist_gen = $_POST['Dentist_Gender'];
	$dentist_pho = $_POST['Dentist_Phone'];
	$dentist_mail = $_POST['Dentist_Email'];
	$dentist_spec = $_POST['Dentist_Speciality'];
	$dentist_sal = $_POST['Dentist_Salary'];
	$dentist_info = $_POST['Dentist_info'];
	$dentist_al = $_POST['Dentist_addit_language'];
	$dentist_md = $_POST['Dentist_more_details'];
	$dentist_img = $_FILES['Dentist_Picture']['name'];
	$temp_name = $_FILES['Dentist_Picture']['tmp_name'];

		$length_of_number = strlen($dentist_pho);
?>
<?php	

if($_FILES['Dentist_Picture']['size'] ==0)
{
	mysqli_query($conn,"UPDATE dentist SET Dentist_Name='$dentist_name', Dentist_Age=$dentist_age, Dentist_Gender='$dentist_gen', Dentist_Email='$dentist_mail', Dentist_Speciality='$dentist_spec', Dentist_Salary='$dentist_sal', Dentist_info='$dentist_info', Dentist_addit_language='$dentist_al', Dentist_more_details='$dentist_md' where Dentist_ID=$dentistdd");


		if($length_of_number != 11 ) 
		{
			?>
			<script type="text/javascript">
			alert("Invalid Phone Number Length! Make sure the phone number added with '6' at the beginning");
			</script>
			<?php
		}
		else
		{
			if(preg_match('/^601/', $dentist_pho))
			{
				mysqli_query($conn,"UPDATE dentist SET Dentist_Phone=$dentist_pho where Dentist_ID=$dentistdd");
				$uploadOk = 0;
			}
			else
			{
					?>
				<script type="text/javascript">
				alert("Invalid Phone Number! Please double check the phone number starts with '601' ");
				</script>
				
				<?php
			}
		}

}else 
{ 
			if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif")) //check file type
			{
						?>
					<script type="text/javascript">
					alert("Sorry, update failed. Only JPG, JPEG, PNG & JFIF files are allowed.");
					</script>
					
					<?php
			}else
			{	
						mysqli_query($conn,"UPDATE dentist SET Dentist_Name='$dentist_name', Dentist_Age=$Dentist_age, Dentist_Gender='$dentist_gen', Dentist_Email='$dentist_mail', Dentist_Speciality='$dentist_spec', 
						Dentist_Salary=$dentist_sal, Dentist_Picture='$dentist_img' where Dentist_ID=$dentistdd");
						move_uploaded_file($temp_name, "$dentist_img");
						
					
						if($length_of_number != 11 ) 
						{
								?>
								<script type="text/javascript">
								alert("Invalid Phone Number Length! Make sure the phone number added with '6' at the  beginning");
								</script>
								
								<?php
						}
					
					else
					
					{
								if(preg_match('/^6/', $dentist_pho))
							{
								mysqli_query($conn,"UPDATE dentist SET Dentist_Phone=$dentist_pho");
								$uploadOk = 0;
							}else
							{
								?>
							<script type="text/javascript">
							alert("Invalid Phone Number! Make sure the phone number starts with '6' ");
							</script>
							<?php
							}
					}
			}
}

if ($uploadOk == 0)
{
	?>
    <script type="text/javascript">
    alert("<?php echo 'Information for ' .$dentist_name. ' updated' ?>");
    </script>
<?php
}
    mysqli_close($conn);
	header( "refresh:1.0; url=view_dentist.php" );
}
	
?>