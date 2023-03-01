function editprofile(){
	

	$('#astreet').prop("disabled", false);
	$('#amunicipality').prop("disabled", false);
	$('#aprovince').prop("disabled", false);
	
	$('#azip').prop("disabled", false);
	$('#aprovince2').prop("disabled", false);
	$('#insthead').prop("disabled", false);
	$('#titlehead').prop("disabled", false);
	$('#atel').prop("disabled", false);
	$('#afax').prop("disabled", false);
	$('#ainsttelhead').prop("disabled", false);
	$('#aemail').prop("disabled", false);
	$('#awebsite').prop("disabled", false);
	$('#aestablished').prop("disabled", false);
	$('#asec').prop("disabled", false);
	$('#ayearapproved').prop("disabled", false);
	$('#acollege').prop("disabled", false);
	$('#auniversity').prop("disabled", false);

	$('#latitude').prop("disabled", false);
	$('#longtitude').prop("disabled", false);
	$('#highesteduchead').prop("disabled", false);
}

function editprogram(programid){
	
	
	document.getElementById('editprogramid').value=programid;
	//$("#closesupervisor").click();
	$.ajax({
		url: "../getprograminfo/"+programid,
		type: 'post',
		//data: {instcode:instcode, latitude:latitude,longtitude:longtitude},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			console.log(data);
			document.getElementById('editprogramid').value = data.programid;
			document.getElementById('editprogramname').value = data.mainprogram;
			document.getElementById('editmajor').value = data.major;
			document.getElementById('authcat').value = data.authcat;
			document.getElementById('authserial').value = data.authserial;
			document.getElementById('authyear').value = data.authyear;
			
			var supervisor = document.getElementById("editselectsupervisor");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.supervisor;
				opt.text = data.supervisor;
				opt.selected = "selected";
				supervisor.add(opt,  supervisor.options[0]);
				
			var discipline = document.getElementById("editselectdiscipline");
				//discipline.remove(0);
				var opt = document.createElement("option");
				opt.value = data.discipline;
				opt.text = data.discipline;
				opt.selected = "selected";
				discipline.add(opt,  discipline.options[0]);
				
			var discipline2 = document.getElementById("editselectdiscipline2");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.discipline2;
				opt.text = data.discipline2;
				opt.selected = "selected";
				discipline2.add(opt,  discipline2.options[0]);
			
		}
	});
}


function updateprogram(){
	
	//$("#tabinformation").load(location.href + " #tabinformation");
	var editprogramname = document.getElementById('editprogramname').value;
	var programid = document.getElementById('editprogramid').value;
	var supervisor = document.getElementById('editselectsupervisor').value;
	var discipline = document.getElementById('editselectdiscipline').value;
	var discipline2 = document.getElementById('editselectdiscipline2').value;
	var authcat = document.getElementById('authcat').value;
	var authserial = document.getElementById('authserial').value;
	var authyear = document.getElementById('authyear').value;
	var editmajor = document.getElementById('editmajor').value;
	
	$.ajax({
		url: "../updateprogram/"+programid,
		type: 'post',
		data: {editprogramname:editprogramname,supervisor:supervisor,discipline:discipline,discipline2:discipline2,authcat:authcat,authserial:authserial,authyear:authyear,editmajor:editmajor},
		success: function(response) {
			//console.log(response);
			window.location.reload();;
		}
	});
	
	
	document.getElementById('supervisorcolumn'+programid).innerHTML=supervisor;
	$("#closesupervisor").click();
	
	
}

function saveheiinformation(instcode){
	//var latitude = document.getElementById("latitude").value;
	//var heitype = document.getElementById("heitype").value;
	var province2 = document.getElementById("aprovince2").value;
	var insthead = document.getElementById("insthead").value;
	var titlehead = document.getElementById("titlehead").value;
	var atel = document.getElementById("atel").value;
	var afax = document.getElementById("afax").value;
	var ainsttelhead = document.getElementById("ainsttelhead").value;
	var aemail = document.getElementById("aemail").value;
	var awebsite = document.getElementById("awebsite").value;
	
	//var instname = document.getElementById("instname").value;
	//var form_ownership = document.getElementById("form_ownership").value;
	var astreet = document.getElementById("astreet").value;
	var amunicipality = document.getElementById("amunicipality").value;
	var aprovince = document.getElementById("aprovince").value;
	var aregion = document.getElementById("aregion").value;
	var azip = document.getElementById("azip").value;
	var aestablished = document.getElementById("aestablished").value;
	var asec = document.getElementById("asec").value;
	var ayearapproved = document.getElementById("ayearapproved").value;
	var acollege = document.getElementById("acollege").value;
	var auniversity = document.getElementById("auniversity").value;
	//var insttype = document.getElementById("insttype").value;
	//var insttype2 = document.getElementById("insttype2").value;
	//var hei_remarks = document.getElementById("hei_remarks").value;
	//var hei_status = document.getElementById("hei_status").value;
	var latitude = document.getElementById("latitude").value;
	var longitude = document.getElementById("longtitude").value;
	var institutionalcode = instcode;
	var heid =  document.getElementById("heid").value;;

	$.ajax({
		url: "heiprofile/saveheiinfo",
		type: 'post',
		data: {instcode:instcode,province2:province2,insthead:insthead,titlehead:titlehead,atel:atel,afax:afax,ainsttelhead:ainsttelhead,aemail:aemail,awebsite:awebsite,astreet:astreet,amunicipality:amunicipality,aprovince:aprovince,aregion:aregion,azip:azip,aestablished:aestablished,asec:asec,ayearapproved:ayearapproved,acollege:acollege,auniversity:auniversity,heid:heid,latitude:latitude,longitude:longitude},
		success: function(response) {
			console.log(response);
			window.location.reload();
		}
	});
	
	
}

function savecontact(instcode){
	//alert(instcode);
	
	var contactname = document.getElementById("contactname").value;
	var position = document.getElementById("position").value;
	var email = document.getElementById("email").value;
	var telno = document.getElementById("telno").value;
	var address = document.getElementById("address").value;
	
	
	$.ajax({
		url: "../savecontact",
		type: 'post',
		data: { instcode:instcode,position:position,contactname: contactname, email: email, telno:telno,address:address},
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

function deleteheicontact(id){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this contact?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: '../deleteheicontact',
                    type: 'post',
                    data: {contactid: id},
                    success: function(response) {
						window.location.reload();
						//console.log(response);
						
						//console.log(response);
                    }
                });
			
		//}else{
			//alert("Invalid Password");
		//}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function savedean(instcode){
	
	
	var deansname = document.getElementById("deansname").value;
	var designation = document.getElementById("designation").value;
	var assignment = document.getElementById("assignment").value;
	var baccalaureate = document.getElementById("baccalaureate").value;
	var masters = document.getElementById("masters").value;
	var doctoral = document.getElementById("doctoral").value;
	
	
	$.ajax({
		url: "../savedean",
		type: 'post',
		data: { instcode:instcode,deansname:deansname,designation: designation, assignment: assignment, baccalaureate:baccalaureate,masters:masters,doctoral:doctoral},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
}

function deletedean(id){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this dean?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: '../deletedean',
                    type: 'post',
                    data: {deanid: id},
                    success: function(response) {
						window.location.reload();
						//console.log(response);
						
						//console.log(response);
                    }
                });
			
		//}else{
			//alert("Invalid Password");
		//}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function editfaculty(facultyid){
	
	
	document.getElementById('editfacultyid').value=facultyid;
	//$("#closesupervisor").click();
	$.ajax({
		url: "../getfacultyprofile",
		type: 'post',
		data: {facultyid:facultyid},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			console.log(data);
			document.getElementById('editprogramid').value = data.programid;
			document.getElementById('editprogramname').value = data.mainprogram;
			document.getElementById('editmajor').value = data.major;
			document.getElementById('authcat').value = data.authcat;
			document.getElementById('authserial').value = data.authserial;
			document.getElementById('authyear').value = data.authyear;
			
			var supervisor = document.getElementById("editselectsupervisor");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.supervisor;
				opt.text = data.supervisor;
				opt.selected = "selected";
				supervisor.add(opt,  supervisor.options[0]);
				
			var discipline = document.getElementById("editselectdiscipline");
				//discipline.remove(0);
				var opt = document.createElement("option");
				opt.value = data.discipline;
				opt.text = data.discipline;
				opt.selected = "selected";
				discipline.add(opt,  discipline.options[0]);
				
			var discipline2 = document.getElementById("editselectdiscipline2");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.discipline2;
				opt.text = data.discipline2;
				opt.selected = "selected";
				discipline2.add(opt,  discipline2.options[0]);
			
		}
	});
}

function addnewprogram(instcode){
	//alert(instcode);
	
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
		url: "../checkduplicateprogram",
		type: 'post',
		data: { instcode:instcode,newprogramname:newprogramname},
		success: function(response) {
			console.log(response);
			//var duplicate = parseInt(response);
			//alert(response);
			
			if(response==0){
				$.ajax({
				url: "../addnewprogram",
				type: 'post',
				data: { instcode:instcode,newprogramname:newprogramname,newauthcat:newauthcat,newauthserial:newauthserial,newauthyear:newauthyear,newmajor:newmajor,newselectsupervisor:newselectsupervisor,newselectdiscipline:newselectdiscipline,newselectdiscipline2:newselectdiscipline2},
				success: function(response) {
					
					window.location.href = "../../programlist/details/"+response;
				}
				});
			}else{
				
				$.bootstrapGrowl('<h4><strong>Failed!</strong></h4> <p>Duplicate Program Name</p>', {
				type: 'danger',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			} 
		}
		});
		
		
		
	}else{
		
		alert("Code or Name must not be empty.");
	}
	
}

function deleteprogram(programid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this program?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: '../deleteprogram/',
                    type: 'post',
                    data: {programid: programid},
                    success: function(response) {
						window.location.reload();
						//console.log(response);
						
						//console.log(response);
                    }
                });
			
		//}else{
			//alert("Invalid Password");
		//}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}


function editcoordinates(){
	$('#latitude').prop("disabled", false);
	$('#longtitude').prop("disabled", false);
	
}
function savecoordinates(instcode){
	var latitude = document.getElementById("latitude").value;
	var longtitude = document.getElementById("longtitude").value;
	var institutionalcode = instcode;
	//alert(institutionalcode);
	//alert(longtitude);
	$.ajax({
		url: "../savecoordinates/",
		type: 'post',
		data: {instcode:instcode, latitude:latitude,longtitude:longtitude},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
	
	
}


function savesupervisorprogram(){
	
	//$("#tabinformation").load(location.href + " #tabinformation");
	var programid = document.getElementById('programid').value;
	var supervisor = document.getElementById('selectsupervisor').value;
	
	$.ajax({
		url: "../savesupervisorprogram/",
		type: 'post',
		data: {programid:programid,supervisor:supervisor},
		success: function(response) {
			console.log(response);
			//window.location.reload();;
		}
	});
	
	
	document.getElementById('supervisorcolumn'+programid).innerHTML=supervisor+"<br><button type='submit' class='btn btn-effect-ripple btn-primary'  href='#addsupervisor' data-toggle='modal' onclick='assignsupervisor("+programid+");'><i class='fa fa-user-plus'></i></button>";
	$("#closesupervisor").click();
	
	
}
