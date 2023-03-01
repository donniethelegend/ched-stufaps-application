function printapplication(){

	var applicationid = document.getElementById("applicationid").value;
	var mobile_number = document.getElementById("mobile_number").value;

	var print_url = "https://stufaps.chedro1.com/application/index.php/stufpdf/index/"+applicationid+"/"+mobile_number;
	var newWindow = window.open(print_url, "new window", "width=1024, height=768");
	
}