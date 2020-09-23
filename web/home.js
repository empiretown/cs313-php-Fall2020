function myFunction() {

	document.getElementById("demo").innerHTML = "Thanks for creating a shop with us. Let's serve and help you create revenue.";

}

function colorChange() {
	// body...
	var textbox_id = "colorText";
	var textbox = document.getElementById(textbox_id);

	var div_id = "intialdiv";
	var div = document.getElementById(div_id);

	var color = textbox.value;
	div.style.backgoundColor = color;
}