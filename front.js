	function Togglepopup(){
		document.getElementById("popup-1").classList.toggle("active");
	}

	function Already(){
		document.getElementById("popup-2").classList.toggle("active1");
	}


	function selectorss(){
		var i = document.getElementById("costing");

		if(document.getElementById("selectors").value == "Electronics"){
			i.value = "Rs120";
		}
		else if(document.getElementById("selectors").value == "Clothes"){
			i.value = "Rs80";
		}
		else if(document.getElementById("selectors").value == "Home-Food"){
			i.value = "Rs50";
		}
		else if(document.getElementById("selectors").value == "Others"){
			i.value = "Rs70";
		}
	}


	function confirmclick(){
		var r = confirm("Your Details are saved.")
		if(r == true){

		}
		else if(r == false){
			alert("You have cancelled the order.Please Refill it.");
		}
	}

	function showless(){
		var gettext = document.getElementById("a1");
		var settext = document.getElementById("a2");
		var text = document.getElementById("more");

		if(gettext.style.display == "none"){
			gettext.style.display = "inline";
			text.style.display = "none";
			settext.style.display = "none";
		}
		else{
			gettext.style.display = "none";
			text.style.display = "inline";
			settext.style.display = "inline";
		}
	}



	function showless1(){
		var gettext = document.getElementById("a3");
		var settext = document.getElementById("a4");
		var text = document.getElementById("more1");

		if(gettext.style.display == "none"){
			gettext.style.display = "inline";
			text.style.display = "none";
			settext.style.display = "none";

		}
		else{
			gettext.style.display = "none";
			text.style.display = "inline";
			settext.style.display = "inline";
		}
	}

	function highlight(id){
	var element = document.getElementById(id)
	var origcolor = element.style.backgroundColor
	element.style.backgroundColor = "#f1f1f1";
	var t = setTimeout(function(){
	element.style.backgroundColor = origcolor;
	},(2000));
	}

	var i = 0;
	var txt = "Welcome! To Website for providing Quality of Food.";
	var speed = 100; 
	function typeWriter(){
	if (i < txt.length) {
	document.getElementById("parapara").innerHTML += txt.charAt(i);
	i++;
	setTimeout(typeWriter, speed);
	}
	}

	$(function() {
	var $clientslider = $("#clientlogo");
	var clients = $clientslider.children().length;
	var clientwidth = (clients * 220); 
	$clientslider.css("width", clientwidth);
	var rotating = true;
	var clientspeed = 1800;
	var seeclients = setInterval(rotateClients, clientspeed);
	$(document).on({
	mouseenter: function() {
	rotating = false;
	},
	mouseleave: function() {
	rotating = true;
	}
	}, "#ourclients");
	function rotateClients() {
	if (rotating != false) {
	var $first = $("#clientlogo li:first");
	$first.animate({
		"margin-left": "-220px"
	}, 2000, function() {
		$first.remove().css({
		"margin-left": "0px"
		});
		$("#clientlogo li:last").after($first);
	});
	}
	}
	});

	$(document).ready(function(){ 
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 100) { 
		$('#return-to-top').fadeIn(); 
		} else { 
		$('#return-to-top').fadeOut(); 
		} 
	}); 
	$('#return-to-top').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 600); 
		return false; 
	}); 
	});

	function chatmini(){
		document.getElementById("chatarea").style.height = "30px";
	}

	function chatmini1(){
		document.getElementById("chatarea").style.height = "400px";
	}

	function cancel(){
		document.getElementById("chatarea").style.display = "none";
		document.getElementById("chat").style.display = "block";
		document.getElementById("textinput").value = "";
	}

	let assistant = ["JOHN CON","MARY LENY","ABAY LEON","SHEFER SIANA","AARON","ANTONIO","BRAYDEN","DEV"]
	let random = Math.floor(Math.random() * assistant.length);

	function chatclick(){
		document.getElementById("chatarea").style.display = "block";
		document.getElementById("chat").style.display = "none";
		document.getElementById("chatarea").style.height = "400px";
		document.getElementById("connection").style.display = "block";
		document.getElementById("userchats").style.display = "none";
		document.getElementById("userhead").innerHTML = assistant[random];
		setTimeout(cleanuser,4000);
	}

	function adclose(){
		document.getElementById("closead").style.display ="none";
		document.getElementById("afscontainer1").style.display="none";
		document.getElementById("oval1").style.marginTop = "80px";
	}

	function cleanuser(){
		document.getElementById("connection").style.display = "none";
		document.getElementById("userchats").style.display = "block";
		document.getElementById("textinput").style.marginTop = "195.3px";
	}

	