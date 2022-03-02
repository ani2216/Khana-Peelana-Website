function clicking(){
	document.getElementById("text").readOnly = false;
	// document.getElementById("emailtext").readOnly = false;
	document.getElementById("passtext").readOnly = false;
	document.getElementById("btnchange").style.display = "inline";
	document.getElementById("passtext").type = "text";
	document.getElementById("head2").style.display = "inline";
}

function change(){
	document.getElementById("head2").style.display ="none";
	document.getElementById("text").readOnly = true;
	document.getElementById("emailtext").readOnly = true;
	document.getElementById("passtext").readOnly = true;
	document.getElementById("btnchange").style.display = "none";
	document.getElementById("text").value ="aniket";
}

 