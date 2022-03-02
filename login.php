<?php	
	session_start();
	include "register.php";
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
		$naam = $_POST['name'];
		$paas = $_POST['password'];
		$querysql = "UPDATE logintb SET name='$naam' ,password='$paas' ,date=current_timestamp() WHERE email='$emailing";
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
		echo "Sorry, file already exists.";
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="login.js?v=<?php echo time(); ?>"></script>
	<title>Login-Page</title>
</head>
<body>
	<div class="container">
		<a href="logout.php"><input type="button" id ="btninput" value="Log-Out"></a>
		<input type="button" id="btninput" value="Change-Profile" onclick="clicking()">
		<form action="" method="POST" enctype="multipart/form-data" required>
		<input type="file" name="imagefile" value="" id="filing">
		<input type="submit" name="filesubmit" value="Upload-File" id="filesubmit">
		</form>
		
		<div class="imagecircle">
		<?php 
		$emailuser = $_SESSION['email_user'];
		$imgsql = mysqli_query($con,"SELECT image FROM logintb WHERE email='$emailuser'");
		$dataimage = mysqli_fetch_array($imgsql);
		$dataimg="";
		while($dataimage){
			$dataimg=$dataimage['image'];
		}
		echo "<style>background-image:url('$dataimg')</style>";
		?>
		</div>

		<p>(UNIQUE ID:)<?php 
		$emailuser = $_SESSION['email_user'];
		$mysql = mysqli_query($con,"SELECT id_user FROM logintb WHERE email='$emailuser'");
		$data1=0;
		$data=mysqli_fetch_array($mysql);
		while($data)
		{
			$data1= $data['id_user'];
		}
		echo $data1;
		?></p>
		<h1><?php 
		$naming = strtoupper($_SESSION['name_user']);
		echo "Welcome to Khaana-Peelana Corner ".$naming;
		?></h1>
	</div>

	<div class="info">
		<h2 id="head2">Profile-Change</h2>
		<form action="" method="POST">
		<label>Name:</label><input type="text" name="name" id="text" required value="<?php echo $_SESSION['name_user'] ?>" readonly><br>
		<label>Email:</label><input type="email" name="email" id="emailtext" required value="<?php echo $_SESSION['email_user'] ?>" readonly><br>
		<label id="pass">Password:</label><input  name="password" required type="password" id="passtext" value="<?php echo $_SESSION['pass_user'] ?>" readonly><br>
		<button id="btnchange" onclick="change()" name="submit">Submit</button>
		</form>
	</div>
</body>
<?php 
if($yes){
	echo"<script>alert('Successfully Updated Your Profile.')
	document.getElementById('passtext').value = $paas;
	document.getElementById('text').value = $naam;
	</script>";
}

if($no){
	echo"<script>alert('Inavlid Credentials.')</script>";
}

if($imageno){
	echo"<script>alert('ERROR:Try Again Later.')</script>";
}

if($imageyes){
		echo"<script>alert('Successfully uploaded')</script>";
}
?>
</html>