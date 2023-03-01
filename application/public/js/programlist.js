function addrecord(){
	
	$('#savebutton').prop("disabled", false);
	$('#updatebutton').prop("disabled", true);
	
	document.getElementById('building_name').value = "";
	document.getElementById('floor_count').value = "";
	document.getElementById('classroom_count').value = "";

}

function savebuilding(){
	//alert(instcode);
	
	var instcode = document.getElementById("instcode").value;
	
	var building_name = document.getElementById("building_name").value;
	var floor_count = document.getElementById("floor_count").value;
	var classroom_count = document.getElementById("classroom_count").value;
	
	
	
	//alert(accountid);
	$.ajax({
		url: "buildings/savebuildings",
		type: 'post',
		data: { instcode:instcode,building_name:building_name,floor_count:floor_count,classroom_count:classroom_count},
		success: function(response) {
			console.log(response);
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

function deleteprogram(programid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'programlist/deleteprogram',
                    type: 'post',
                    data: {programid:programid},
                    success: function(response) {
						window.location.reload();

                    }
                });
			
		//}else{
			//alert("Invalid Password");
		//}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function editeteeap(eteeapid){
	
	$('#savebutton').prop("disabled", true);
	$('#updatebutton').prop("disabled", false);
	
	
	document.getElementById('eteeapid').value=eteeapid;
	//$("#closesupervisor").click();
	$.ajax({
		url: "eteeap/geteteeapdetails/"+eteeapid,
		type: 'post',
		//data: {instcode:instcode, latitude:latitude,longtitude:longtitude},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			document.getElementById('eteeapid').value = data.eteeapid;
			
			var instcode = document.getElementById("instcode");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.instcode;
				opt.text = data.instname;
				opt.selected = "selected";
				instcode.add(opt,  instcode.options[0]);
				
			document.getElementById('programname').value = data.programname;
			document.getElementById('contact').value = data.contact;
			document.getElementById('eteeap_status').value = data.eteeap_status;
			document.getElementById('remarks').value = data.remarks;
				
			
			
			
		}
	});
	
}

function updateprogram(programid){
	//alert(instcode);
	
	
	var mainprogram = document.getElementById("mainprogram").value;
	var mpcode = document.getElementById("mpcode").value;
	var major = document.getElementById("major").value;
	var mjcode = document.getElementById("mjcode").value;
	var discipline = document.getElementById("discipline").value;
	var discipline2 = document.getElementById("discipline2").value;
	var pstatuscode = document.getElementById("pstatuscode").value;
	var thesisdisert = document.getElementById("thesisdisert").value;
	var pstatyear = document.getElementById("pstatyear").value;
	
	var authcat = document.getElementById("authcat").value;
	var authserial = document.getElementById("authserial").value;
	var authyear = document.getElementById("authyear").value;
	var pmcode = document.getElementById("pmcode").value;
	var pmif = document.getElementById("pmif").value;
	var remarks = document.getElementById("remarks").value;
	var nlyears = document.getElementById("nlyears").value;
	var pcredit = document.getElementById("pcredit").value;
	var tuitionperunit = document.getElementById("tuitionperunit").value;
	var programfee = document.getElementById("programfee").value;
	var supervisor = document.getElementById("supervisor").value;
	var programlevel = document.getElementById("programlevel").value;
	
	$.ajax({
		url: "../updateprogram",
		type: 'post',
		data: { programid:programid,mainprogram:mainprogram,mpcode:mpcode,major:major,mjcode:mjcode,discipline:discipline,discipline2:discipline2,pstatuscode:pstatuscode,thesisdisert:thesisdisert,pstatyear:pstatyear,authserial:authserial,authyear:authyear,pmcode:pmcode,remarks:remarks,nlyears:nlyears,pcredit:pcredit,tuitionperunit:tuitionperunit,programfee:programfee,supervisor:supervisor,programlevel:programlevel,authcat:authcat,pmif:pmif},
		success: function(response) {
			console.log(response);
			//window.location.reload();
			
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Program Updated!</p>', {
						type: 'success',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
			});
		}
	}); 
}


function addnewprogram(){
	//alert(instcode);
	
	var program_instcode = document.getElementById("program_instcode").value;
	var newprogramname = document.getElementById("newprogramname").value;
	var newauthcat = document.getElementById("newauthcat").value;
	var newauthserial = document.getElementById("newauthserial").value;
	var newauthyear = document.getElementById("newauthyear").value;
	var newmajor = document.getElementById("newmajor").value;
	var newselectsupervisor = document.getElementById("newselectsupervisor").value;
	var newselectdiscipline = document.getElementById("newselectdiscipline").value;
	var newselectdiscipline2 = document.getElementById("newselectdiscipline2").value;
	
	
	if(newprogramname !=""){
		
		//check duplicate
		
		$.ajax({
		url: "programlist/checkduplicateprogram",
		type: 'post',
		data: { instcode:program_instcode,newprogramname:newprogramname},
		success: function(response) {
			console.log(response);
			//var duplicate = parseInt(response);
			//alert(response);
			
			//if(response==0){
				$.ajax({
				url: "programlist/addnewprogram",
				type: 'post',
				data: { instcode:program_instcode,newprogramname:newprogramname,newauthcat:newauthcat,newauthserial:newauthserial,newauthyear:newauthyear,newmajor:newmajor,newselectsupervisor:newselectsupervisor,newselectdiscipline:newselectdiscipline,newselectdiscipline2:newselectdiscipline2},
				success: function(response) {
					
					window.location.href = "programlist/details/"+response;
				}
				});
			//}else{
				/*
				$.bootstrapGrowl('<h4><strong>Failed!</strong></h4> <p>Duplicate Program Name</p>', {
				type: 'danger',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}*/
			//});
			//} 
		}
		});
		
		
		
	}else{
		
		alert("Code or Name must not be empty.");
	}
	
}

function saveprogramsy(){
	
	var programsy = document.getElementById("programsy").value;
	var programtable = document.getElementById("programtable").value;
	var pid = document.getElementById("pid").value;
	var instcode = document.getElementById("instcode").value;
	var pcredit = document.getElementById("pcredit").value;
	var tuitionperunit = document.getElementById("tuitionperunit").value;
	var programfee = document.getElementById("programfee").value;
	
		$.ajax({
			url: "../saveprogramsy",
			type: 'post',
			data: { programsy:programsy,programtable:programtable,pid:pid,instcode:instcode,pcredit:pcredit,tuitionperunit:tuitionperunit,programfee:programfee},
			success: function(response) {
				window.location.reload();
				//window.location.href = "programlist/details/"+response;
			}
		});
			
				
}

function deleteenrolment(programenrolmentid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: '../deleteenrolment',
                    type: 'post',
                    data: {programenrolmentid:programenrolmentid},
                    success: function(response) {
						window.location.reload();

                    }
                });
			
		//}else{
			//alert("Invalid Password");
		//}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function deletegraduate(programgraduateid){
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        
			$.ajax({
                    url: '../deletegraduate',
                    type: 'post',
                    data: {programgraduateid:programgraduateid},
                    success: function(response) {
						window.location.reload();

                    }
                });
			

		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function updateenr(programenrolmentid){
	//alert(instcode);
	
	
	var pcredit = document.getElementById("pcredit-"+programenrolmentid).value;
	var tuitionperunit = document.getElementById("tuitionperunit-"+programenrolmentid).value;
	var programfee = document.getElementById("programfee-"+programenrolmentid).value;
	var newstudm = document.getElementById("newstudm-"+programenrolmentid).value;
	var newstudf = document.getElementById("newstudf-"+programenrolmentid).value;
	var oldstudm = document.getElementById("oldstudm-"+programenrolmentid).value;
	var oldstudf = document.getElementById("oldstudf-"+programenrolmentid).value;
	var secondm = document.getElementById("secondm-"+programenrolmentid).value;
	var secondf = document.getElementById("secondf-"+programenrolmentid).value;
	var thirdm = document.getElementById("thirdm-"+programenrolmentid).value;
	var thirdf = document.getElementById("thirdf-"+programenrolmentid).value;
	var fourthm = document.getElementById("fourthm-"+programenrolmentid).value;
	var fourthf = document.getElementById("fourthf-"+programenrolmentid).value;
	var fifthm = document.getElementById("fifthm-"+programenrolmentid).value;
	var fifthf = document.getElementById("fifthf-"+programenrolmentid).value;
	var sixthm = document.getElementById("sixthm-"+programenrolmentid).value;
	var sixthf = document.getElementById("sixthf-"+programenrolmentid).value;
	var seventhm = document.getElementById("seventhm-"+programenrolmentid).value;
	var seventhf = document.getElementById("seventhf-"+programenrolmentid).value;
	
	
	
	$.ajax({
		url: "../updateenr",
		type: 'post',
		data: { programenrolmentid:programenrolmentid,pcredit:pcredit,tuitionperunit:tuitionperunit,programfee:programfee,newstudm:newstudm,newstudf:newstudf,oldstudm:oldstudm,oldstudf:oldstudf,secondm:secondm,secondf:secondf,thirdm:thirdm,thirdf:thirdf,fourthm:fourthm,fourthf:fourthf,fifthm:fifthm,fifthf:fifthf,sixthm:sixthm,sixthf:sixthf,seventhm:seventhm,seventhf:seventhf},
		success: function(response) {
			console.log(response);
			//window.location.reload();
			
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Collection Updated!</p>', {
						type: 'success',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
			});
			setTimeout(function(){window.location.reload();},1000);
		}
	}); 
}


function updategnr(programgraduateid){
	//alert(instcode);
	
	
	var gradm = document.getElementById("gmale-"+programgraduateid).value;
	var gradf = document.getElementById("gfemale-"+programgraduateid).value;
	
	
	
	$.ajax({
		url: "../updategnr",
		type: 'post',
		data: { programgraduateid:programgraduateid,gradm:gradm,gradf:gradf},
		success: function(response) {
			console.log(response);
			
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Collection Updated!</p>', {
						type: 'success',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
			});
			setTimeout(function(){window.location.reload();},1000);
		}
	}); 
}