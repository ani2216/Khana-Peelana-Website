<?php	
	session_start();
	$showError = false;
	$showAlert = false;
	$error = false;
	include 'register.php';
	if(isset($_POST['submit']))
	{
	//Registering
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['pass'];
	$id = uniqid();
	$exists = false;
	$sql1 = "SELECT * FROM logintb WHERE email='$email'";
	$result1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($result1)>0){
		$error = true;
	} else if(($password == $cpassword) and ($exists == false)){
		$sql = "INSERT INTO logintb (name, email, password,date,id_user) VALUES ('$name', '$email', '$password', current_timestamp(),'$id')";
		$result = mysqli_query($con,$sql);
		if(($result == true)){
			$showAlert = true;
		} 
 	}
	else {
		$showError = true;
	}
}     
	
	//logining
	$login = false;
	$loginyes = false;
	if(isset($_POST['submit1'])){
	$email1 = $_POST['email1'];
	$pass = $_POST['passes'];
	$sql2 = "SELECT * FROM logintb WHERE email='$email1' AND password='$pass'";
	$result2 = mysqli_query($con,$sql2);

	if(mysqli_num_rows($result2)==1){
		while($recor = mysqli_fetch_array($result2)){
		$_SESSION['name_user'] = $recor['name'];
		$_SESSION['email_user'] = $recor['email'];
		$_SESSION['pass_user'] = $recor['password'];
		}
		setcookie("email1",$email1,time()+60);
		setcookie("passes",$pass,time()+60);
		$loginyes = true;
		
	} else
	{
		$login = true;
	}
	}


	//for franchise
	$fran = false;
	if(isset($_POST['submit2'])){
		$fname = $_POST['text'];
		$lname = $_POST['text1'];
		$email2 = $_POST['emailfran'];
		$number = $_POST['number'];
		$state = $_POST['state'];
		$income = $_POST['income'];
		$date = $_POST['date'];
		$time = $_POST['time'];

		$sql3 = "INSERT INTO franchise (firstname, lastname, email, number, state, income, date, time, dt) VALUES ('$fname', '$lname', '$email2', '$number','$state','$income','$date','$time',current_timestamp())";

		$res = mysqli_query($con,$sql3);
		if($res == true){
			$fran = true;
		}
	}

	//for feedback
	$feedback = false;
	if(isset($_POST['feedbtn'])){
		$feedselect = $_POST['feeds'];

		$sq = "INSERT INTO feedback (feedback,date) VALUES ('$feedselect',current_timestamp())";
		$r = mysqli_query($con,$sq);
		if($r == true){
			$feedback = true;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Khana-Peelana Corner</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="front.js?v=<?php echo time(); ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
	<script type="text/javascript" charset="utf-8">
	(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
	arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
</script>
	
</head>
<body>
	<div id="bodytake">
	<div class="menubar">
		<ul id="menu">
			<li><a style="cursor: pointer; color:#f1f1f1;" onclick="Togglepopup1()"><i class="fa fa-home"></i>Login</a>
		
			<div class="submenucontact">
				<ul>	
					<li id="loggedin"><a onclick="Togglepopup()">Login-In</a></li>
					<li><a onclick="Already()">Register</a></li>
				</ul>
			</div>	
			</li>
			<li><a href="#"><i class="fa fa-bell"></i>Services</a>
			<div class="submenucontact">
				<ul>
					<li><a href="index.html"><i class="fab fa-product-hunt" style="margin-right: 2px
					;"></i>Our Products</a></li>
					<li><a href="#delivery"><i class="fa fa-motorcycle" style="margin-right: 2px;"></i>Genie</a></li>
					<li><a href="#greviews"><i class="fas fa-blog" style="margin-right: 2px
					;"></i>Reviews</a></li>
				</ul>
			</div>
			</li>
			<li><a href="#ourclients"><i class="fa fa-handshake-o" aria-hidden="true"></i>Partners</a></li>
			<li><a href="#outlet1" onclick="highlight('outlet1')"><i class="fa fa-podcast" aria-hidden="true"></i>Outlets</a></li>
			<li><a href="#"><i class="fa fa-phone"></i>Contact-us</a>
			<div class="submenucontact">
				<ul>
					<li><a href="#faction"><i class="fab fa-black-tie" style="margin-right: 2px;"></i>For Franchise</a></li>
					<li><a href="#contact" onclick="highlight('contact')"><i class="fa fa-user" style="margin-right: 2px;"></i>Customer Care</a></li>
					<li><a href="#feed"><i class="fas fa-bookmark" style="margin-right: 2px;"></i>FeedBack</a></li>
				</ul>
			</div>
			</li>
		</ul>

		<div class="popup" id="popup-1">
			<div class="overlay"></div>
			<form class="continue" method="POST" action="">
				<div class="closebtn" id="closebtnn" onclick="Togglepopup()">&times;</div>
				<h1>Login</h1>
				<i class="fa fa-envelope"><input type="email" name="email1" id="maile" placeholder="Enter your email"></i>
				<br>
				<i class="fa fa-key"><input type="password" name="passes" id="ssap" placeholder="Enter password"></i>
				<br>
				<a onclick="Already()">Sign-Up</a>
				<br>
				<button id="loginbtn" name="submit1">Sing-In</button>
			</form>
		</div>

		<div class="popup1" id="popup-2">
			<div class="overlay1"></div>
			<form class="continue1" method="POST" action="">
				<div class="closebtn1" onclick="Already()">&times;</div>
				<h1>Registeration</h1>
				<i class="fa fa-user"><input type="text" name="name" id="naam" placeholder="Enter your name"></i>
				<br>
				<i class="fa fa-envelope"><input type="email" name="email" id="maile" placeholder="Enter your email"></i>
				<br>
				<i class="fa fa-key"><input type="password" name="password" id="ssap" placeholder="Enter password"></i>
				<br>
				<i class="fa fa-key"><input type="password" name="pass" id="ssap1" placeholder="Re-Enter password"></i>
				<br>
				<br>
				<button id="Submitbtn" name="submit">Sign Up</button>
			</form>
		</div>	
		<button  id="clickme" onclick="typeWriter()">Click Me</button>
		<div class="typing">
		<h1 id="parapara"></h1>
		</div>
		 <form name="myform"  class="search-wrapper cf" method="POST">
		<input type="email" name="emailsuccess" placeholder="Enter your email..." id="email" required>
		<button type="submit" id="submit">Subscribe Now</button>
		</form>
	</div>
	<div id="ads">
	<i class="fa fa-close" id="closead" onclick="adclose()"></i>
	<div id='afscontainer1'></div>
	<div class="oval" id="oval1">
		<img src="pics/label.jpg" width="100px" height="100px" id="imgoval">
		<p>Khana-Peelana <br>Corner</p></div></div>
<script type="text/javascript" charset="utf-8">

	var pageOptions = {
	"pubId": "pub-9616389000213823", 
	"query": "hotels",
	"adPage": 1
	};

	var adblock1 = {
	"container": "afscontainer1",
	"width": "700",
	"number": 2
	};

	_googCsa('ads', pageOptions, adblock1);

</script>
        <hr style="border-top: 2px solid lightgrey; margin-top: 70px; margin-bottom: 0px;">
	<div id="ourclients">
		<h2 class="h2partners">Our Partners</h2>
                <div class="clients-wrap">
			<ul id="clientlogo" class="clearfix">
			        <li>
				<img src="pics/logo1.png"  alt="logo">
				</li>
				<li>
				<img src="pics/logo2.jpg"  alt="logo">
				</li>
				<li>
				<img src="pics/logo3.png" alt="logo">
				</li>
				<li>
				<img src="pics/logo4.png" alt="logo">
				</li>
				<li>
				<img src="pics/logo5.png"  alt="logo">
				</li>
				<li>
				<img src="pics/logo6.jpg"  alt="logo">
				</li>
				<li>
				<img src="pics/logo7.jpg"  alt="logo">
				</li>
				<li>
				<img src="pics/logo8.png"  alt="logo">
				</li>
				<li>
				<img src="pics/logo9.png"  alt="logo">
				</li>
				<li>
				<img src="pics/logo10.png"  alt="logo">
				</li>
			</ul>
		</div>
	</div>

	<a href="#" id="return-to-top" style="display:none;"><i class="icon-chevron-up"></i></a>
	<a id="chat" onclick="chatclick()"><i class="far fa-comment-alt"></i></a>
	<div id="chatarea">
	<div id="topbg">
	<i class="fa fa-minus" id="minus" onclick="chatmini()" ondblclick="chatmini1()"></i>
	<i class="fa fa-close" id="cross" onclick="cancel()"></i>
	</div>
	<div id="connection">
		<p>Please wait,We are connecting with one of our assistant.</p>
	</div>
	<div id="userchats" style="display:none;">
	<i class="fa fa-user" id="userchat"></i>
	<h4 id="userhead"></h4>
	<p>Virtual Assistant Here To Resolve Issue</p>
	<hr>
	<div id="chattalk">
		Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque voluptas quibusdam, consequatur expedita natus magnam nostrum exercitationem laudantium dolorum totam delectus tempora nobis voluptatem fuga modi vero deserunt. Quis, eaque, id debitis quasi hic repellat dolores aliquam minus accusamus repellendus molestias doloribus eum rem illum similique unde. Minima dolor vitae cupiditate exercitationem sit fuga! Quam saepe excepturi ipsam natus, doloremque, atque aliquid hic libero exercitationem officiis aut. Vero, in cupiditate. Atque, quaerat cumque, magnam quibusdam neque doloribus, incidunt sequi velit doloremque rerum qui culpa omnis! Dolores, quis? Voluptate, asperiores consequuntur, officiis nisi animi voluptatibus culpa, quaerat ad exercitationem repudiandae commodi?
	</div>
	<div id="message"><input type="text" name="text" placeholder="Enter the message..." id="textinput" onkeydown="if(event.keyCode == 13) {talk()}">
	</div>
	</div>
	</div>
	<hr style="border-top: 2px solid lightgrey; margin-top: 150px; margin-bottom: 0px;">

	<div class="readMore">
	<h2>Our Company</h2>
		<p>Khaana-Peelana Corner is an Indian multinational restaurant aggregator and food delivery company founded by Aniket Dwivedi in 2019.Khaana-Peelana Corner provides information, menus and user-reviews of restaurants as well as food delivery options from partner restaurants in select cities......</p>
		<button id="btnmore"><a href="aboutus.html">Read-More</a></button>
	</div>


	<hr style="border-top: 2px solid lightgrey; margin-top: 150px; margin-bottom: 0px;">

	<div class="franchise" id="faction">
		<h2 class="fheading">Franchise Inquiry Form</h2>
		<form id="formfranchise" action="" method="POST">
			<div class="names">
			<label>First Name:</label>
			<input type="text" name="text" id="text" placeholder="Enter your First name" required>
			<label>Last Name:</label>
			<input type="text" name="text1" id="text" placeholder="Enter your last name" required>
			</div>
			<div class="emails">
			<label>Email:</label>
			<input type="email" name="emailfran" id="email1" placeholder="Enter your email" required>
			</div>
			<div class="numbers">
			<label>Phone-Number:</label>
			<input type="tel" name="number" id="number" placeholder="Enter your number" required>
			</div>
			<div class="select" style="border:none;">
			<label>State:</label>
			<select name="state" id="state" class="form-control" required style="border:none; border-bottom: 1px solid black;">
			<option value="select" selected disabled>Select</option>
			<option value="Andhra Pradesh">Andhra Pradesh</option>
			<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
			<option value="Assam">Assam</option>
			<option value="Bihar">Bihar</option>
			<option value="Chandigarh">Chandigarh</option>
			<option value="Chhattisgarh">Chhattisgarh</option>
			<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
			<option value="Daman and Diu">Daman and Diu</option>
			<option value="Delhi">Delhi</option>
			<option value="Lakshadweep">Lakshadweep</option>
			<option value="Puducherry">Puducherry</option>
			<option value="Goa">Goa</option>
			<option value="Gujarat">Gujarat</option>
			<option value="Haryana">Haryana</option>
			<option value="Himachal Pradesh">Himachal Pradesh</option>
			<option value="Jammu and Kashmir">Jammu and Kashmir</option>
			<option value="Jharkhand">Jharkhand</option>
			<option value="Karnataka">Karnataka</option>
			<option value="Kerala">Kerala</option>
			<option value="Madhya Pradesh">Madhya Pradesh</option>
			<option value="Maharashtra">Maharashtra</option>
			<option value="Manipur">Manipur</option>
			<option value="Meghalaya">Meghalaya</option>
			<option value="Mizoram">Mizoram</option>
			<option value="Nagaland">Nagaland</option>
			<option value="Odisha">Odisha</option>
			<option value="Punjab">Punjab</option>
			<option value="Rajasthan">Rajasthan</option>
			<option value="Sikkim">Sikkim</option>
			<option value="Tamil Nadu">Tamil Nadu</option>
			<option value="Telangana">Telangana</option>
			<option value="Tripura">Tripura</option>
			<option value="Uttar Pradesh">Uttar Pradesh</option>
			<option value="Uttarakhand">Uttarakhand</option>
			<option value="West Bengal">West Bengal</option>
			</select>
			<label>Annual-Income:</label>
			<select id="income" name="income" required style="border:none; border-bottom: 1px solid black;">
				<option selected disabled>Select</option>
				<option>less-than 2,00,000</option>
				<option>more-than 2,00,000 & less-than 5,00,000 </option>
				<option>more-than 5,00,000 & less-than 10,00,000</option>
				<option>more-than 10,00,000</option>
			</select>
			</div>
			<div class="selecttime">
				<h4 id="h4heading">(To Arrange Call / Meeting)</h4>
				<label>Day:</label>
					<input type="date" name="date" id="date">
				<label id="times">Time:</label>
				<select name="time" id="time" required style="border:none; border-bottom: 1px solid black;">
					<option selected disabled>Select</option>
					<option>12pm-3pm</option>
					<option>4pm-6pm</option>
					<option>6pm-9pm</option>
				</select>
			</div>
			<button type="submit" id="submitf" name="submit2">Submit</button>

		</form>
	</div>
	
	<hr style="border-top: 2px solid lightgrey; margin-top: 150px; margin-bottom: 50px;">
	
	<div class="delivery" id="delivery">
		<i class="fas fa-motorcycle classname" id="icontruck"></i>
		<h2>Online-Delivery-Form<p id="iconi"><a href="#paratc" onclick="highlight('paratc')">i</a></p></h2>
		<p>(Always give your things to right hands)</p>
		<div id="forms">
			<form id="formsdiv" method="POST" action="confirmation2.php">
				<div class="fullname">
				<label>Full Name:</label>
				<i class="fa fa-user icon"></i>
				<input type="text" name="namedel" id="name" placeholder="Enter your name" required>
				</div>
				<div class="fullemail">
				<label>Email:</label>
				<i class="fa fa-envelope icon"></i>
				<input type="email" name="emaildel" id="email" placeholder="Enter your email" required>
				</div>
				<div class="fullno">
				<label>Phone-Number:</label>
				<i class="fa fa-mobile icon"></i>
				<input type="tel" name="numberdel" id="number" placeholder="Enter your number" required>
				</div>
				<div class="add">
				<p>(Pick-up-Address)</p>
				<label>Address-From:</label>
				<input type="text" name="address" id="address" placeholder="Enter address" required>
				<label>Landmark:</label>
				<input type="text" name="landmark" id="landmark" placeholder="Nearest landmark">
				</div>
				<div class="addto">
				<p>(Drop-to-Address)</p>
				<label>Address-To:</label>
				<input type="text" name="address1" id="address" placeholder="Enter address" required>
				<label>Landmark:</label>
				<input type="text" name="landmark1" id="landmark" placeholder="Nearest landmark">
				</div>
				<div class="things">
				<label>Select-Items:</label>
				<select id="selectors" onchange="selectorss()">
					<option value="Select" id="select" selected disabled>Select</option>
					<option value="Electronics" id="electronics">Electronics</option>
					<option value="Clothes" id="clothes">Clothes</option>
					<option value="Home-Food" id="homefood">Home-Food</option>
					<option value="Others" id="others">Others</option>
				</select>
				<label>Total-Cost:</label>
				<input type="text" name="cost" id="costing" readonly>
				</div>
				<h4 id="textareah" style="color:black; font-weight: lighter;">Describe-it:</h4>
				<textarea name="describe" id="describe" cols="120" rows="10" placeholder="Describe your thing briefly...." required></textarea>
				<br>
				<input type="button" value="submit" id="btnform" name="submitdel">
			</form>
		</div>
		<p id="paratc" style="text-decoration:none; float: left; color: black; font-size: 10px; margin-top: 80px;">
		<b style="text-decoration: underline;">Terms & Condition:</b> Delivery of goods and payment of the price are concurrent conditions as per the law on sales unless the parties agree otherwise. So, the seller has to be willing to give possession of the goods to the buyer in exchange for the price.
		<br><input type="checkbox" required>&#160;I Accept All T&C</p>
	</div>

	<hr style="border-top: 2px solid lightgrey; margin-top: 70px; margin-bottom: 0px;">

	<div class="greviews" id="greviews">
		<h1>Reviews:All Over World</h1>
		<script defer async src='https://cdn.trustindex.io/loader.js?401b2fe38ce81087cf557d5843'></script>
	</div>

	<div class="feedback" id="feed">
		<form method="POST">
		<div class="feedcontain" id="feedcon">
			<h4>Feed-Back</h4>
			<p>Would You Like Our Website?</p>
			<select name="feeds">
				<option value="select" selected disabled>SELECT</option>
				<option value="yes">YES</option>
				<option value="no">NO</option>
			</select>
			<button name="feedbtn">Submit</button>
		</div>
		</form>
		<div id="feedSurvey">
			<h1>Thank You For FeedBack.</h1>
		</div>
	</div>


	<footer class="foot">
		<div class="about">
			<h4 style="text-decoration: underline; margin-top: 30px; color: gray;">About-Us</h4>
			<p style="font-size: 15px;">Khana-Peelana Corner is all about delivery Good and Healthy food<br>to all people around any state of country.Khana-Peelana is an<br>Indian multinational restaurant aggregator and food delivery company<br>founded by <b style="text-decoration: underline;">Aniket Dwivedi</b> 2019.Khana-Peelana provides information<br>menus and user-reviews of restaurants as well as food delivery options<br>from partner restaurants in select cities.As of 2020, the service is available<br>in 24 countries and in more than 10,000 cities.It is fastest growing online company.<a href="aboutus.html" style="font-size:13px; color:red">(Read-More)</a></p>
		</div>
		<div class="contactus">
			<h4 style="text-decoration: underline; color: gray;" id="contact">Contact-Us</h4>
			<p><b style="text-decoration: underline; margin-bottom:0px;">Address-></b>563,21 RajaRam Park,<br>Koramangala, Bangalore-213021.</p>
			<p id="or" style="text-align: center; color: gray; margin-top:-20px;">OR</p>
			<p style="margin-top:-20px;"><b style="text-decoration: underline;">Mobile-no.-></b><a style="cursor:pointer"> 9876221230 , 7867112321</a></p>
			<p><b style="text-decoration: underline; margin-top: 0px;">Toll Free-No-></b><a style="cursor:pointer"> 1800-3400-11 / 12</a></p>
			
		</div>
		<div class="outlet">
			<h4 style="text-decoration: underline; color:gray;" id="outlet1" >Outlets</h4>
			<p style="color:#f1f1f1;font-size:13px; font-family:'Georgia' , serif;"><b style="text-decoration: underline;">States</b>-> Mumbai,Delhi,Noida,Hydrabad,Bangalore,Chennai,Kerala,Odisha,<a id="a1" onclick="showless()" style= "   text-decoration: underline; cursor: pointer; color: gray;">+10 More States</a><span id="more" style="display: none; color: #f1f1f1;">Himachal Pradesh,Madhya Pradesh,Rajasthan,Gujarat,Harayana,punjab,Andhra Pradesh,Mizoram,Assam,Arunachal Pradesh.&#160;</span><a id="a2" onclick="showless()" style="display: none; color: gray; text-decoration: underline;cursor: pointer;">Show-less</a></p>
			<p style="color: #f1f1f1; margin-top: 10px; font-size:13px;font-family:'Georgia' , serif;"><b style="text-decoration: underline;">Countries</b>-> London,
			Australia,Dubai,Amsterdam,USA,Japan,Russia,<a id="a3" onclick="showless1()" style="color: gray; text-decoration: underline;cursor: pointer;">+12 More Countries</a><span id="more1" style="display:none; color:#f1f1f1">Canada,Bangkok,Malesia,Maldives,Sri-Lanka,Indonesia,South-Africa,Turkey,Brazil,Uruguay,Paraguay,Switerland.&#160;</span><a id="a4" onclick="showless1()" style="display: none; color: gray; text-decoration: underline; cursor: pointer;">Show-less</a></p>
		</div>
		<div class="contain" id="contains">
			<h4 style="color: gray; text-decoration: underline;">Follow-Us</h4>
			<a href="#" class="fab fa-facebook-f" style="color: white;"></a>&#160;&#160;
			<a href="#" class="fab fa-twitter" style="color: #55ACEE"></a>&#160;&#160;
			<a href="#" class="fab fa-google" style="color: #dd4b39;"></a>&#160;&#160;
			<a href="#" class="fab fa-instagram" style="color: white;"></a>
			
		</div>
		<p id="copy">Privacy Policy | Terms of Service Copyright &#169; Khana-Peelana Corner. All Rights Reserved</p>
	</footer>
	</div>
<?php

if(isset($_COOKIE['email1']))
{ 
echo"<script>
	function Togglepopup1(){
		window.location.assign('login1.php');
	}</script>";
} 

if($showAlert){
echo"<script>alert('Successfully registered.Now you can login.')</script>";
}
if($showError){
	echo"<script>alert('Error:PassWords not match.')</script>";
}

if($error){
	echo"<script>alert('Email Already Exist.')</script>";
}

if($login){
		echo"<script>alert('Invalid credentials!Please Check.')</script>";
	}
if($loginyes){
	echo"<script>
	alert('Successfuly Login.');
	window.location.assign('login1.php');
	</script>";
} 

if($fran){
	echo"<script>window.location.assign('confirmation.html')</script>";
}

if($feedback){
	echo "<script>
	document.getElementById('feedcon').style.display = 'none';
	document.getElementById('feedSurvey').style.display = 'block';
	</script>";
}
?>
</body>
</html>