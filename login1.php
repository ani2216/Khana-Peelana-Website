<?php
session_start();
require "register.php";

$yes =false;
	$no = false;
	$imageyes = false;
	$imageno = false;
	$emailing = $_SESSION['email_user'];
	if($emailing == true){

	} else{
		header('location:frontPage.php');
	}
	if(isset($_POST['submit'])){
		$naam = $_POST['names'];
		$paas = $_POST['passwords'];
		$em = $_POST['emails'];
		$querysql = "UPDATE logintb SET name='$naam' ,password='$paas' ,date=current_timestamp() WHERE email='$em'";
		if($resu = mysqli_query($con,$querysql)){
			$yes = true; 
		}
		else{
			$no = true;
		}
	}

	error_reporting(0);
	$targer_file = $_FILES['imagefile']['name'];
	$targer_file2 = $_FILES['imagefile']['tmp_name'];
	$file = "loginpic/".$targer_file;
	$folder = "loginpic/";
	$filing= $folder.base64_encode($targer_file);

	if(isset($_POST['filesubmit'])){
		if (file_exists($filing)) {
			echo "<script>alert('No Photo is Selected.')</script>";
		} else{
			move_uploaded_file($targer_file2,$file);
			$filesql = "UPDATE logintb SET image='$file' , date=current_timestamp() WHERE email='$emailing'";
			if($resume = mysqli_query($con,$filesql)){
			$imageyes=true;
			} else{
				$imageno = false;
			}
		}
		
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
	<script src="login.js?v=<?php echo time(); ?>"></script>
	<title>Login-Page</title>
</head>
<body>
	<div class="container">
		<a href="logout.php"><input type="button" id ="btninput" value="Log-Out"></a>
		<input type="button" id="btninput" value="Change-Profile" onclick="clicking()">
		<a href="frontPage.php" style="background-color:black;color:#f1f1f1;padding-right:10px;padding-left:10px;padding-bottom:5px">Home-Page</a>
		<form action="" method="POST" enctype="multipart/form-data" required>
		<input type="file" name="imagefile" value="" id="filing">
		<input type="submit" name="filesubmit" value="Upload-File" id="filesubmit">
		</form>
		
		<div class="imagecircle">
			<?php 
			$i = mysqli_query($con,"SELECT image FROM logintb WHERE email='$emailing'");
			while($dat=mysqli_fetch_assoc($i)){
				echo "<img src='".$dat['image']."'>";
			}
			?>
		</div>

		<p>(UNIQUE ID:)<?php 
		$emailuser = $_SESSION['email_user'];
		$mysql = mysqli_query($con,"SELECT id_user FROM logintb WHERE email='$emailuser'");
		while($data=mysqli_fetch_assoc($mysql))
		{
			echo $data['id_user'];
		}
		?></p>
		<h1><?php 
		$naming = strtoupper($_SESSION['name_user']);
		echo "Welcome to Khaana-Peelana Corner ".$naming;
		?></h1>
	</div>

	<div class="info">
		<h2 id="head2">Profile-Change</h2>
		<form action="" method="POST">
		<label>Name:</label><input type="text" name="names" id="text" required value="<?php echo $_SESSION['name_user'] ?>" readonly><br>
		<label>Email:</label><input type="email" name="emails" id="emailtext" required value="<?php echo $_SESSION['email_user'] ?>" readonly><br>
		<label id="pass">Password:</label><input  name="passwords" required type="password" id="passtext" value="<?php echo $_SESSION['pass_user'] ?>" readonly><br>
		<button id="btnchange" onclick="change()" name="submit">Submit</button>
		</form>
	</div>

<?php

if($yes){
	echo "<script>var r = confirm('Updated! Please Login Again.(Security Reasons)')
		if(r == true){
		window.location.assign('logout.php');
		} else{
		window.location.assign('logout.php');
		}
	</script>";
	}

if($no){
	echo"<script>alert('Inavlid Credentials.')</script>";
}

if($imageno){
	echo"<script>alert('ERROR:Try Again Later.')
	</script>";
}

if($imageyes){
		echo"<script>var r = confirm('Successfully uploaded.Relogin Please.');
		if(r == true){
		window.location.assign('logout.php');
		} else{
		window.location.assign('logout.php');
		}
		
		</script>";
} ?>
</body>
</html>