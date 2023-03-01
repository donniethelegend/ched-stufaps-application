function editcheck(checkidnum){
	
			
			$.ajax({
				url: 'editcheck',
				type: 'post',
				data: {checkidnum: checkidnum},
				success: function (response) {
					var data = JSON.parse(response);
					//console.log(data);
					document.getElementById("awardno").value = data.awardnumber;
				}
			});
	
}
















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
	var father_m = document.getElementById("father_m").value;
	var father_l = document.getElementById("father_l").value;
	var foccupation = document.getElementById("foccupation").value;
	var mother = document.getElementById("mother").value;
	var mother_m = document.getElementById("mother_m").value;
	var mother_l = document.getElementById("mother_l").value;
	var moccupation = document.getElementById("moccupation").value;
	var siblingno = document.getElementById("siblingno").value;
	var disability = document.getElementById("disability").value;
	var yearofapplication = document.getElementById("yearofapplication").value;
	var year_level = document.getElementById("year_level").value;
	var average_grade = document.getElementById("average_grade").value;
	var income = document.getElementById("income").value;
	var type = document.getElementById("type").value;
	var hsgraduated = document.getElementById("hsgraduated").value;
	var fstatus = document.getElementById("fstatus").value;
	var mstatus = document.getElementById("mstatus").value;
	var dswd4p = document.getElementById("dswd4p").value;
	var datereceived = document.getElementById("datereceived").value;
	var lrn_no = document.getElementById("lrn_no").value;
	
	
	
	$('#savebutton').prop("disabled", true);
	
	//alert(accountid);
	$.ajax({
		url: "../updateprofile",
		type: 'post',
		data: {applicantid:id,lastname:lastname,firstname:firstname,middlename:middlename,extension:extension,dateofbirth:dateofbirth,placeofbirth:placeofbirth,gender:gender,civilstatus:civilstatus,citizenship:citizenship,contactno:contactno,email:email,barangay:barangay,towncity:towncity,province:province,congressionaldistrict:congressionaldistrict,zipcode:zipcode,heicode:heicode,course:course,father:father,foccupation:foccupation,mother:mother,moccupation:moccupation,siblingno:siblingno,disability:disability,yearofapplication:yearofapplication,year_level:year_level,average_grade:average_grade,income:income,type:type,hsgraduated:hsgraduated,fstatus:fstatus,mstatus:mstatus,dswd4p:dswd4p,datereceived:datereceived,father_m:father_m,father_l:father_l,mother_m:mother_m,mother_l:mother_l,lrn_no:lrn_no},
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
	var monthfilter = document.getElementById("monthfilter").value;
	var district = document.getElementById("district").value;
	var baseurl = document.getElementById("baseurl").value;
	//alert (district);
	window.location.href = baseurl+"scholarshipapplicants/filter/"+selected_year+"/"+monthfilter+"/"+district;
}



$("#middlename").focusout(function (e) {
    //check fullname duplicate
	var lastname = document.getElementById("lastname").value;
	var firstname = document.getElementById("firstname").value;
	var middlename = document.getElementById("middlename").value;
	var yearofapplication = document.getElementById("yearofapplication").value;
	var pagelocation = document.getElementById("pagelocation").value;
	
	if(pagelocation=="search"){
		var url_loc = "checkduplicate";
	}else{
		var url_loc = "../../../checkduplicate";
	}
	
			$.ajax({
				url: url_loc,
				type: 'post',
				data: {lastname:lastname,firstname:firstname,middlename:middlename,yearofapplication:yearofapplication},
				success: function(response) {
					if(response==0){
						document.getElementById("fullnamecheck").innerHTML = "<label class='col-md-3 control-label' for='state-success' style='color:green;'>No Duplicate "+yearofapplication+"</label>";
						document.getElementById("duplicateapplicant").value=0;
					}else{
						document.getElementById("fullnamecheck").innerHTML = "<label class='col-md-2 control-label' for='state-danger' style='color:red;'>("+yearofapplication+") Duplicate Entry</label>";
						document.getElementById("duplicateapplicant").value=1;
					}
					
					//alert(response);
					//console.log(response);
					//var data = JSON.parse(response);
					
				
				}
				});
				
	//check previous application
	listyearapplied();
});



function listyearapplied(){
	var lastname = document.getElementById("lastname").value;
	var firstname = document.getElementById("firstname").value;
	var middlename = document.getElementById("middlename").value;
	var yearofapplication = document.getElementById("yearofapplication").value;
	var pagelocation = document.getElementById("pagelocation").value;
	var labelresult ="";
	if(pagelocation=="search"){
		var url_loc = "listyearapplied";
	}else{
		var url_loc = "../../../listyearapplied";
	}
	
	$.ajax({
				url: url_loc,
				type: 'post',
				data: {lastname:lastname,firstname:firstname,middlename:middlename},
				success: function(response) {
					
						
					var yearapplied = JSON.parse(response);
					
					//console.log(yearapplied.length);
					//$("#fullnamecheck").append("<br>Year Applied:");
					document.getElementById("listapplied").innerHTML = "";
					for (var ctr = 0; ctr <= yearapplied.length; ctr++) { 
					try{
						
						$("#listapplied").append("<br>"+yearapplied[ctr].yearapplied+" ");
						labelresult = yearapplied[ctr].yearapplied+"<br>";
						console.log(labelresult);
					}catch(e){
						max = 21;
						return 0;	
					}
				}
				
				
						//document.getElementById("listapplied").innerHTML = "<label class='col-md-3 control-label' for='state-success' style='color:green;'>"+labelresult+"</label>";
						//document.getElementById("duplicateapplicant").value=0;
					
											
					
					//alert(response);
					//console.log(response);
					//var data = JSON.parse(response);
					
				
				}
				});
	
}

function grantapplicant(applicantid){
	
	var pagelocation = document.getElementById("pagelocation").value;
	
	if(pagelocation=="filter"){
		pageurl = "../../../grantapplicant";
	}else{
		pageurl = "grantapplicant";
	}
	var r = confirm("Applicant -> Grantee, do you want to continue?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
		//if (person =='superadmin') {
		$.ajax({
                    url: pageurl,
                    type: 'post',
                    data: {applicantid: applicantid},
                    success: function(response) {
						console.log(response);
						//window.location.href = "../scholar/profile/"+response;
						//location.reload();
						//$('#general-table').load(document.URL +  ' #general-table');
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Applicant copied to grantee list with unawarded status!</p>', {
						type: 'success',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
						
						});
                    }
                });
		//}else{
			//alert("Invalid Password");
		//}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}
function savesingleapplicant(){
	//alert(instcode);
	
	var duplicate_applicant = document.getElementById("duplicateapplicant").value;
	
	if(duplicate_applicant==0){
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
			var father_m = document.getElementById("father_m").value;
			var father_l = document.getElementById("father_l").value;
			var foccupation = document.getElementById("foccupation").value;
			var mother = document.getElementById("mother").value;
			var mother_m = document.getElementById("mother_m").value;
			var mother_l = document.getElementById("mother_l").value;
			var moccupation = document.getElementById("moccupation").value;
			var siblingno = document.getElementById("siblingno").value;
			var disability = document.getElementById("disability").value;
			var yearofapplication = document.getElementById("yearofapplication").value;
			var year_level = document.getElementById("year_level").value;
			var average_grade = document.getElementById("average_grade").value;
			var income = document.getElementById("income").value;
			var type = document.getElementById("type").value;
			var hsgraduated = document.getElementById("hsgraduated").value;
			var fstatus = document.getElementById("fstatus").value;
			var mstatus = document.getElementById("mstatus").value;
			var dswd4p = document.getElementById("dswd4p").value;
			var datereceived = document.getElementById("datereceived").value;
			var lrn_no = document.getElementById("lrn_no").value;
			
			var pagelocation = document.getElementById("pagelocation").value;
	
			if(pagelocation=="search"){
				var url_loc = "../functions/savesingleapplicant";
			}else{
				var url_loc = "../../../../functions/savesingleapplicant";
			}
			
			//$('#savebutton').prop("disabled", true);
			
			//alert(accountid);
			$.ajax({
				url: url_loc,
				type: 'post',
				data: {lastname:lastname,firstname:firstname,middlename:middlename,extension:extension,dateofbirth:dateofbirth,placeofbirth:placeofbirth,gender:gender,civilstatus:civilstatus,citizenship:citizenship,contactno:contactno,email:email,barangay:barangay,towncity:towncity,province:province,congressionaldistrict:congressionaldistrict,zipcode:zipcode,heicode:heicode,course:course,father:father,foccupation:foccupation,mother:mother,moccupation:moccupation,siblingno:siblingno,disability:disability,yearofapplication:yearofapplication,year_level:year_level,average_grade:average_grade,income:income,type:type,hsgraduated:hsgraduated,fstatus:fstatus,mstatus:mstatus,dswd4p:dswd4p,datereceived:datereceived,father_m:father_m,father_l:father_l,mother_m:mother_m,mother_l:mother_l,lrn_no:lrn_no},
				success: function(response) {
					console.log(response);
					if(response=="1"){
						$.bootstrapGrowl('<h4><strong>Error!</strong></h4> <p>Duplicate Entry!</p>', {
							type: 'danger',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
					}else{
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Property Updated!</p>', {
						type: 'success',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
					});
						setTimeout(function(){window.location.reload();},1000);
					}
					//document.getElementById("userusername").value = "";
					//document.getElementById("userpassword").value = "";
					

					//$('#success-alert').show("slow");
					//$('#success-alert').removeClass("hide");
					//setTimeout(function(){$('#success-alert').hide("slow");},1500);
					//window.location.reload();;

					//return "valid";
				}
			});
	}else{
		alert("Cannot Save Applicant. (Duplicate Applicant)");
	}//condition duplicate
	
}
function deleteapplicant(applicantid){
	//alert(accountid);
	var baseurl = document.getElementById("baseurl").value;
	var r = confirm("Are your sure you want to delete this applicant?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
    
		if (person =='superadmin') {
			$.ajax({
                    url: baseurl+'functions/deleteapplicant/'+applicantid,
                    type: 'post',
                    //data: {accountid: accountid},
                    success: function(response) {
						window.location.reload();
						//console.log(response);
						
						//console.log(response);
                    }
                });
			
		}else{
			alert("Invalid Password");
		}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function fillupcong(){
	
	var pagelocation = document.getElementById("pagelocation").value;
	
	if(pagelocation=="search"){
		var url_loc = "getcong";
	}else{
		var url_loc = "../../../getcong";
	}
	
	var congid = document.getElementById("towncity_select").value;
	$.ajax({
                    url: url_loc,
                    type: 'post',
                    data: {congid: congid},
                    success: function(response) {
						
						//console.log(response);
						var data = JSON.parse(response);
						console.log(data);
						
						document.getElementById("towncity").value = data.citymunicipality;
						document.getElementById("province").value = data.cong_province;
						//document.getElementById("congressionaldistrict").value = data.province;
						$("#congressionaldistrict").append("<option value='"+data.cong_district+"' selected='selected'>"+data.cong_district+"</option>");
						
                    }
                });
}

$("#towncity_select").focusout(function (e) {
	
	fillupcong();
});

/*
document.onkeyup=function(e){
		var e = e || window.event; // for IE to cover IEs window object
		//https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
    if(e.altKey && e.which == 65) {
         alert('Keyboard shortcut working!');
         return false;
		 
    }
}*/

shortcut.add("Alt+A",
function() {
//alert("The bookmarks of your browser will show up after this alert");
document.getElementById("addapplicantbutton").click();
$("#lastname").focus();
},
{ 'type':'keydown', 'propagate':true, 'target':document}
); 

shortcut.add("Alt+B",
function() {
//alert("The bookmarks of your browser will show up after this alert");
document.getElementById("altb").click();
},
{ 'type':'keydown', 'propagate':true, 'target':document}
); 

shortcut.add("Alt+P",
function() {
//alert("The bookmarks of your browser will show up after this alert");
document.getElementById("altp").click();
},
{ 'type':'keydown', 'propagate':true, 'target':document}
); 

shortcut.add("Alt+T",
function() {
//alert("The bookmarks of your browser will show up after this alert");
document.getElementById("altt").click();
},
{ 'type':'keydown', 'propagate':true, 'target':document}
); 

