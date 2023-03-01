function editaccount(accountid){
	$('#savebutton').prop("disabled", true); 
	$('#updatebutton').prop("disabled", false); 
	$.ajax({
		url: 'accounts/editaccount',
		type: 'post',
		data: {accountid: accountid},
		success: function(response) {
			
			var data = JSON.parse(response);
			document.getElementById("accountid").value = data.accountid;
			document.getElementById("accountname").value = data.accountname;
			document.getElementById("address").value = data.address;
			document.getElementById("telno").value = data.telno;
			document.getElementById("email").value = data.email;
			
			
			
		}
	});
	
	
}

function addaccountbutton(){
			$('#savebutton').prop("disabled", false); 
			$('#updatebutton').prop("disabled", true); 
			
			document.getElementById("accountid").value = "";
			document.getElementById("accountname").value = "";
			document.getElementById("address").value = "";
			document.getElementById("telno").value = "";
			document.getElementById("email").value = "";
				
}

function updateaccount(){
	
	var accountid = document.getElementById("accountid").value;
	var accountname = document.getElementById("accountname").value;
	var address = document.getElementById("address").value;
	var telno = document.getElementById("telno").value;
	var email = document.getElementById("email").value;
	
	
	$.ajax({
		url: "accounts/updateaccount",
		type: 'post',
		data: {accountid:accountid, accountname:accountname,address: address, telno: telno, email:email},
		success: function(response) {
			console.log(response);

			window.location.reload();;
		}
	});
	
	
}


function saveaccount(){
	//alert(instcode);
	
	var accountname = document.getElementById("accountname").value;
	var email = document.getElementById("email").value;
	var telno = document.getElementById("telno").value;
	var address = document.getElementById("address").value;
	
	
	$.ajax({
		url: "accounts/saveaccount",
		type: 'post',
		data: {accountname: accountname, email: email, telno:telno,address:address},
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

function deleteaccount(accountid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this Account?");
    if (r == true) {
        //alert ("You pressed OK!");
		 //var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'accounts/deleteaccount/'+accountid,
                    type: 'post',
                    //data: {accountid: accountid},
                    success: function(response) {
						console.log(response);
						location.reload();
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