function showprograms(instcode){
	
	
	$.ajax({
		url: 'enrollmentlist/showprograms',
		type: 'post',
		data: {instcode: instcode},
		success: function(response) {
			
			
			$("#course").empty();
			var filteredcourse=document.getElementById("course");
			
			var data = JSON.parse(response);
			//console.log(data);
			$(filteredcourse).append( "<option></option>");
			for(var ctr=0;ctr<data.length; ctr++){
				if(data[ctr].major==""){
					$(filteredcourse).append( "<option value='"+data[ctr].mainprogram+"'>"+data[ctr].mainprogram+"</option>");
				}else{
					$(filteredcourse).append( "<option value='"+data[ctr].mainprogram+" ("+data[ctr].major+")'>"+data[ctr].mainprogram+" ("+data[ctr].major+")</option>");
				}
				
				
				
			}	
			
		}
	});
	
	
	
	
	
}


function uploadel(){
	
	var form = document.getElementById("eluploadform");
  //form.submit();
	//document.getElementById('form_uploadprofile').submit(function(){
			 var formData = new FormData(form);
			 //alert(formData);
			$.ajax({
				url: 'enrollmentlist/elupload',
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					//console.log(data);
					if(data=="No File Uploaded"){
						$.bootstrapGrowl('<h4><strong>Error!</strong></h4> <p>No file uploaded!</p>', {
						type: 'warning',
						delay: 3000,
						allow_dismiss: true,
						offset: {from: 'top', amount: 20}
						});
					}else{
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>File uploaded!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
							//document.getElementById("fileuploadclosebutton_appleave").click();
							//$('#list-details').load(document.URL +  ' #list-details');
							setTimeout(function(){
								location.reload();
							},100);
					}
					
				},
				cache: false,
				contentType: false,
				processData: false
			});
	
	
}


function importelfile(elid){
	
	
	$.ajax({
		url: '../importelfile',
		type: 'post',
		data: {elid: elid},
		success: function(response) {

			console.log();
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>File uploaded!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
			});
			document.getElementById("closemodal").click();
			$('#importbutton').prop("disabled", true);
			setTimeout(function(){
								location.reload();
			},50);
		}
	});
	
	
	
	
	
}





















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

function deletefile(elid){
	//alert(elid);
	
	var r = confirm("Are your sure you want to delete this Account?");
    if (r == true) {
        //alert ("You pressed OK!");
		 //var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'enrollmentlist/deletefile',
                    type: 'post',
                    data: {elid: elid},
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