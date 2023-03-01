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

function editaward(awardid){
	
	$.ajax({
                    url: 'awardnumber/getdetails',
                    type: 'post',
                    data: {awardid: awardid},
                    success: function(response) {
						console.log(response);
						
						var data = JSON.parse(response);
						
						document.getElementById("awardid").value=data.awardid;
						document.getElementById("awardnumber").value=data.awardnumber;
						//document.getElementById("award_status").value=data.award_status;
						var award_status = document.getElementById("award_status");
						
						var opt = document.createElement("option");
						opt.value =data.award_status;
						opt.text = data.award_status;
						opt.selected = "selected";
						award_status.add(opt,  award_status.options[0]);
						
						
						document.getElementById("scholarid").value=data.scholarid;
						document.getElementById("granteename").value=data.firstname+" "+data.lastname;
						//document.getElementById("grantee_status").value=data.grantee_status;
						var award_status = document.getElementById("grantee_status");
						
						var opt = document.createElement("option");
						opt.value =data.grantee_status;
						opt.text = data.grantee_status;
						opt.selected = "selected";
						grantee_status.add(opt,  grantee_status.options[0]);
						
						
						
						//location.reload();
						//console.log(response);
                    }
                });
	
}

function updateawardnumber(){
	
	
	var awardid = document.getElementById("awardid").value;
	var awardnumber = document.getElementById("awardnumber").value;
	var award_status = document.getElementById("award_status").value;
	var scholarid = document.getElementById("scholarid").value;
	var grantee_status = document.getElementById("grantee_status").value;
	var award_remarks = document.getElementById("award_remarks").value;
	$.ajax({
                    url: 'awardnumber/updateawardnumber',
                    type: 'post',
                    data: {awardid: awardid,awardnumber:awardnumber,award_status:award_status,scholarid:scholarid,grantee_status:grantee_status,award_remarks:award_remarks},
                    success: function(response) {
						console.log(response);
						
						
						
						location.reload();
						
                    }
                });
	
}

function addaward(){
	
	
	var particular = document.getElementById("particular").value;
	var stypecode = document.getElementById("stypecode").value;
	var prefix = document.getElementById("prefix").value;
	var middle = document.getElementById("middle").value;
	var suffix = document.getElementById("suffix").value;
	var award_count = document.getElementById("award_count").value;
	var awardslot_year = document.getElementById("awardslot_year").value;
	
	console.log(award_count);
	
	$.ajax({
                    url: 'awardnumber/saveawardnumber',
                    type: 'post',
                    data: {award_count:award_count,particular:particular,stypecode:stypecode,prefix:prefix,middle:middle,suffix:suffix,awardslot_year:awardslot_year},
                    success: function(response) {
						console.log(response);
						location.reload();
						
                    }
                });
	
}



function updatepreview(){
	var prefix = document.getElementById("prefix").value;
	var middle = document.getElementById("middle").value;
	var suffix = document.getElementById("suffix").value;
	var apreview = prefix+middle+suffix;
	document.getElementById("award_preview").value =apreview;
	
}

function assignaward(awardid,awardnumber){
	
	document.getElementById("assign_awardid").value =awardid;
	document.getElementById("assign_awardnumber").value =awardnumber;
	
}

function assignaward_scholar(){
	var assign_awardid = document.getElementById("assign_awardid").value;
	var assign_scholarid = document.getElementById("assign_scholarid").value;
	var assign_remarks = document.getElementById("assign_remarks").value;
	
	$.ajax({
		url: 'awardnumber/assignawardnumber',
		type: 'post',
		data: {assign_awardid:assign_awardid,assign_scholarid:assign_scholarid,assign_remarks:assign_remarks},
		success: function(response) {
			//console.log(response);
			
			
			//$('#example-datatable').load(document.URL +  ' #example-datatable');
			//$('#customer-table').load(document.URL +  ' #customer-table');
			location.reload();
			
		}
	});
	
	
	
}