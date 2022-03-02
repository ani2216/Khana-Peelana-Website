<?php 
     $server = "localhost";
	$username = "root";
	$password = "";
	$database = "login";

	// $con = new mysqli($server , $username , $password,$database);
     $con = mysqli_connect($server , $username , $password,$database);

	// if($con->connect_error){
	// 	die("connecion to this db failed due to".$con->connect_error);
	// }

     if(!$con){
		die("connecion to this db failed due to".mysqli_connect_error());
	}
?>


