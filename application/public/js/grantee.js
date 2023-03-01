function savesinglegrantee(){
	//alert(instcode);
	
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
		url: "scholarslist/savesinglegrantee",
		type: 'post',
		data: {lastname:lastname,firstname:firstname,middlename:middlename,extension:extension,dateofbirth:dateofbirth,placeofbirth:placeofbirth,gender:gender,civilstatus:civilstatus,citizenship:citizenship,contactno:contactno,email:email,barangay:barangay,towncity:towncity,province:province,congressionaldistrict:congressionaldistrict,zipcode:zipcode,heicode:heicode,course:course,father:father,foccupation:foccupation,mother:mother,moccupation:moccupation,siblingno:siblingno,disability:disability,yearofapplication:yearofapplication,year_level:year_level,average_grade:average_grade,income:income,type:type,hsgraduated:hsgraduated},
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

function deletegrantee(id){
	
	var r = confirm("Are your sure you want to delete Grantee?");
    if (r == true) {
		document.getElementById("granteeid").value = id;
        //alert ("You pressed OK!");
		// $($("#deleteverify").attr("data-target")).modal("show");
		$("#adddeliverymodal").modal();
		//document.getElementById("deleteverify").showModal();
		 //href='#deleteverify' data-toggle='modal' 
		
		/*
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'purchaserequest/deletepr',
                    type: 'post',
                    data: {prid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		}else{
			alert("Invalid Password");
		}*/
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}