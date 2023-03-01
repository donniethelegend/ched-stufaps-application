function addrecord(){
	
	$('#savebutton').prop("disabled", false);
	$('#updatebutton').prop("disabled", true);
	
	document.getElementById('programname').value = "";
	document.getElementById('contact').value = "";
	document.getElementById('eteeap_status').value = "";
	document.getElementById('remarks').value = "";
	
}

function saveeteeap(){
	//alert(instcode);
	
	var instcode = document.getElementById("instcode").value;
	
	var programname = document.getElementById("programname").value;
	var contact = document.getElementById("contact").value;
	var eteeap_status = document.getElementById("eteeap_status").value;
	var remarks = document.getElementById("remarks").value;
	
	
	//alert(accountid);
	$.ajax({
		url: "eteeap/saveeteeap",
		type: 'post',
		data: { instcode:instcode,programname:programname,contact:contact,eteeap_status:eteeap_status,remarks:remarks},
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

function deleteeteeap(eteeapid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'eteeap/deleteeteeap/'+eteeapid,
                    type: 'post',
                    //data: {eteeapid:eteeapid},
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

function updateeteeap(){
	//alert(instcode);
	
	var eteeapid = document.getElementById("eteeapid").value;
	var instcode = document.getElementById("instcode").value;
	var programname = document.getElementById("programname").value;
	var contact = document.getElementById("contact").value;
	var eteeap_status = document.getElementById("eteeap_status").value;
	var remarks = document.getElementById("remarks").value;
	
	
	//alert(accountid);
	$.ajax({
		url: "eteeap/updateeteeap",
		type: 'post',
		data: { eteeapid:eteeapid,instcode:instcode,programname:programname,contact:contact,eteeap_status:eteeap_status,remarks:remarks},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
}
