function saveapplicantinfo(id){
	//alert(id);
	var lastname = document.getElementById("lastname").value;
	var firstname = document.getElementById("firstname").value;
	var middlename = document.getElementById("middlename").value;
	var extension = document.getElementById("extension").value;
	var dateofbirth = document.getElementById("dateofbirth").value;
	var placeofbirth = document.getElementById("placeofbirth").value;
	if(document.getElementById("genderm").checked==true){
		var gender = "Male";
	}if(document.getElementById("genderf").checked==true){
		var gender = "Female";
	}
	
	if(document.getElementById("civilstatuss").checked==true){
		var civilstatus = "Single";
	}if(document.getElementById("civilstatusm").checked==true){
		var civilstatus = "Married";
	}
	
	
	var citizenship = document.getElementById("citizenship").value;
	var contactno = document.getElementById("contactno").value;
	var email = document.getElementById("email").value;
	var barangay = document.getElementById("barangay").value;
	var towncity = document.getElementById("towncity").value;
	var province = document.getElementById("province").value;
	var congressionaldistrict = document.getElementById("congressionaldistrict").value;
	var zipcode = document.getElementById("zipcode").value;
	var heicode = document.getElementById("heicode").value;
	var course = document.getElementById("course").value;
	var father = document.getElementById("father").value;
	var foccupation = document.getElementById("foccupation").value;
	var mother = document.getElementById("mother").value;
	var moccupation = document.getElementById("moccupation").value;
	var siblingno = document.getElementById("siblingno").value;
	var disability = document.getElementById("disability").value;
	var yearofapplication = document.getElementById("yearofapplication").value;
	var year_level = document.getElementById("year_level").value;
	var average_grade = document.getElementById("average_grade").value;
	var income = document.getElementById("income").value;
	var type = document.getElementById("type").value;
	var hsgraduated = document.getElementById("hsgraduated").value;
	
	
	
	$('#savebutton').prop("disabled", true);
	
	//alert(accountid);
	$.ajax({
		url: "../updateprofile",
		type: 'post',
		data: {applicantid:id,lastname:lastname,firstname:firstname,middlename:middlename,extension:extension,dateofbirth:dateofbirth,placeofbirth:placeofbirth,gender:gender,civilstatus:civilstatus,citizenship:citizenship,contactno:contactno,email:email,barangay:barangay,towncity:towncity,province:province,congressionaldistrict:congressionaldistrict,zipcode:zipcode,heicode:heicode,course:course,father:father,foccupation:foccupation,mother:mother,moccupation:moccupation,siblingno:siblingno,disability:disability,yearofapplication:yearofapplication,year_level:year_level,average_grade:average_grade,income:income,type:type,hsgraduated:hsgraduated},
		success: function(response) {
			//console.log(response);
			//document.getElementById("userusername").value = "";
			//document.getElementById("userpassword").value = "";
			

			//$('#success-alert').show("slow");
			//$('#success-alert').removeClass("hide");
			//setTimeout(function(){$('#success-alert').hide("slow");},1500);
			window.location.reload();;

			//return "valid";
		}
	});
}

function changeyear(){
	
	var selected_year = document.getElementById("yearfilter").value;
	window.location.href = "../filter/"+selected_year;
}

$("#middlename").focusout(function (e) {
    //check fullname duplicate
	var lastname = document.getElementById("lastname").value;
	var firstname = document.getElementById("firstname").value;
	var middlename = document.getElementById("middlename").value;
	
			$.ajax({
				url: "../checkduplicate",
				type: 'post',
				data: {lastname:lastname,firstname:firstname,middlename:middlename},
				success: function(response) {
					if(response==0){
						document.getElementById("fullnamecheck").innerHTML = "<label class='col-md-3 control-label' for='state-success' style='color:green;'>No Duplicate</label>";
					}else{
						document.getElementById("fullnamecheck").innerHTML = "<label class='col-md-3 control-label' for='state-danger' style='color:red;'>Duplicate Entry</label>";
					}
					
					//alert(response);
					//console.log(data);
					//var data = JSON.parse(response);
					
				
				}
				});
});