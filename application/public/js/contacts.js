function editcontact(contactid){
	$('#savebutton').prop("disabled", true); 
	$('#updatebutton').prop("disabled", false); 
	$.ajax({
		url: 'contacts/editcontact',
		type: 'post',
		data: {contactid: contactid},
		success: function(response) {
			
			var data = JSON.parse(response);
			document.getElementById("contactname").value = data.contactname;
			document.getElementById("position").value = data.position;
			document.getElementById("address").value = data.address;
			document.getElementById("telno").value = data.telno;
			document.getElementById("fax").value = data.fax;
			document.getElementById("email").value = data.email;
			document.getElementById("website").value = data.website;
			document.getElementById("contactid").value = data.contactid;
			
			var instcode = document.getElementById("instcode");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				if(data.instcode==null){
					opt.value = "";
					opt.text = "";
					
				}else{
					opt.value = data.instcode;
					opt.text = data.instname;
				}
				
				opt.selected = "selected";
				instcode.add(opt,  instcode.options[0]);
			
			var accountid = document.getElementById("accountid");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				if(data.accountid==null){
					opt.value = "";
					opt.text = "";
					
				}else{
					opt.value = data.accountid;
				opt.text = data.accountname;
				}
				
				
				opt.selected = "selected";
				accountid.add(opt,  accountid.options[0]);
			
			
			
		}
	});
	
	
}

function addcontactbutton(){
			$('#savebutton').prop("disabled", false); 
			$('#updatebutton').prop("disabled", true); 
			
			document.getElementById("contactname").value = "";
			document.getElementById("position").value = "";
			document.getElementById("address").value = "";
			document.getElementById("telno").value = "";
			document.getElementById("fax").value = "";
			document.getElementById("email").value = "";
			document.getElementById("website").value = "";
			var instcode = document.getElementById("instcode");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value ="";
				opt.text = "";
				opt.selected = "selected";
				instcode.add(opt,  instcode.options[0]);
			
			var accountid = document.getElementById("accountid");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = "";
				opt.text = "";
				opt.selected = "selected";
				accountid.add(opt,  accountid.options[0]);
				
}

function updatecontact(){
	
	var contactid = document.getElementById("contactid").value;
	var contactname = document.getElementById("contactname").value;
	var email = document.getElementById("email").value;
	var telno = document.getElementById("telno").value;
	var address = document.getElementById("address").value;
	var instcode = document.getElementById("instcode").value;
	var accountid = document.getElementById("accountid").value;
	var position = document.getElementById("position").value;
	var fax = document.getElementById("fax").value;
	var website = document.getElementById("website").value;
	
	$.ajax({
		url: "contacts/updatesinglecontact",
		type: 'post',
		data: {contactid:contactid, instcode:instcode,contactname: contactname, email: email, telno:telno,address:address,accountid:accountid,position:position,fax:fax,website:website},
		success: function(response) {
			console.log(response);

			window.location.reload();;
		}
	});
	
	
}

function savesinglecontact(){
	//alert(instcode);
	
	var contactname = document.getElementById("contactname").value;
	var email = document.getElementById("email").value;
	var telno = document.getElementById("telno").value;
	var address = document.getElementById("address").value;
	var instcode = document.getElementById("instcode").value;
	var accountid = document.getElementById("accountid").value;
	var position = document.getElementById("position").value;
	var fax = document.getElementById("fax").value;
	var website = document.getElementById("website").value;
	
	//alert(accountid);
	$.ajax({
		url: "contacts/savesinglecontact",
		type: 'post',
		data: { instcode:instcode,contactname: contactname, email: email, telno:telno,address:address,accountid:accountid,position:position,fax:fax,website:website},
		success: function(response) {
			console.log(response);
			
			window.location.reload();;

		}
	});
}
function deletecontact(contactid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this contact?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'contacts/deletecontact/'+contactid,
                    type: 'post',
                    //data: {accountid: accountid},
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


