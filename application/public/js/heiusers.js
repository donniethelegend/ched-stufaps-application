


$('.btn-growl').on('click', function(){
                var growlType = $(this).data('growl');

                $.bootstrapGrowl('<h4><strong>Notification</strong></h4> <p>Content..</p>', {
                    type: growlType,
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });

                $(this).prop('disabled', true);
            });
			

function adduser(){
			
			//$("#username").get(0).setSelectionRange(0,0);
			$('#updateuser').prop("disabled", true);    
			$('#saveuser').prop("disabled", false);    
			//document.getElementById("username").value ="";
			document.getElementById("password").value="";
			document.getElementById("user_name").value="";

			setTimeout(function () { $("#username").focus(); }, 20);
			

}
	
			



//save project

function saveheiuser(){
	

					var search_instcode = document.getElementById("search_instcode").value;
					var username = document.getElementById("username").value;
					var password = document.getElementById("password").value;
					var user_name = document.getElementById("user_name").value;
					var usertype = document.getElementById("usertype").value;
					var hei_email = document.getElementById("hei_email").value;
					var hei_contactno = document.getElementById("hei_contactno").value;
					
					
			if(username!="" && password!="" && user_name!="" && usertype!=""){

					//check duplicate user
					$.ajax({
                    url: 'heiusers/checkusername',
                    type: 'post',
                    data: {username: username},
                    success: function(response) {
						console.log(response);
						duplicateid = JSON.parse(response);
						var numberofduplicate = parseInt(duplicateid.duplicateid);
						//alert(numberofduplicate);
						//console.log(last);
						
						if(numberofduplicate==0){
							$.ajax({
								url: 'heiusers/saveheiuser',
								type: 'post',
								data: {username: username, password: password,user_name:user_name,usertype:usertype,search_instcode:search_instcode,hei_email:hei_email,hei_contactno:hei_contactno},
								success: function(response) {
									//console.log(response);
									//convertresponse = JSON.parse(response);
									//var lastid = parseInt(convertresponse.lastid);
									location.reload();
									//console.log(last);
									//window.location.href = "projects/details/"+lastid;

									
								}
							});
						}else{
							$.bootstrapGrowl('<h4><strong>Cannot save record.</strong></h4> <p>User already exist!</p>', {
								type: 'danger',
								delay: 3000,
								allow_dismiss: true,
								offset: {from: 'top', amount: 20}
							});
						}
						
						
                    }
                });

			}//end if all fields are not blank
			else{
				$.bootstrapGrowl('<h4><strong>Cannot save record.</strong></h4> <p>Please fill up the required fields.</p>', {
								type: 'danger',
								delay: 3000,
								allow_dismiss: true,
								offset: {from: 'top', amount: 20}
							});
				//alert("Please fill up the required fields.");
				setTimeout(function () { $("#password").focus(); }, 20);
			}
}

function deleteuser(id){
	
	var r = confirm("Are your sure you want to delete this User?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
		//if (person =='superadmin') {
		$.ajax({
                    url: 'heiusers/deleteheiuser',
                    type: 'post',
                    data: {heiuid: id},
                    success: function(response) {
						//console.log(response);
						$.bootstrapGrowl('<h4><strong>Delete Successful</strong></h4> <p>User has been deleted!</p>', {
								type: 'success',
								delay: 3000,
								allow_dismiss: true,
								offset: {from: 'top', amount: 20}
							});

						setTimeout(function () { location.reload(); }, 2000);
			
						
                    }
                });
		//}else{
			//alert("Invalid Password");
		//}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function edituser(id){
	
	//$('#update').removeAttr("disabled");
	$('#updateuser').prop("disabled", false);    
	$('#saveuser').prop("disabled", true);  
	$('#password').prop("disabled", true); 	
	$('#username').prop("disabled", true); 	
	

	$.ajax({
		url: 'heiusers/getuser',
		type: 'post',
		data: {heiuid : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			//insert values	
			document.getElementById("heiuid").value = id;
			document.getElementById("username").value = data.username;
			//document.getElementById("password").value = data.password;
			document.getElementById("user_name").value = data.name;
			document.getElementById("hei_email").value = data.hei_email;
			document.getElementById("hei_contactno").value = data.hei_contactno;
			//document.getElementById("usertype").value = data.usertype;
			
			var usertypevalue = data.usertype;
			var proj = document.getElementById("usertype");
			var opt = document.createElement("option");
			opt.value = data.usertype;
			if(data.usertype==""){
				opt.text = "";
			}else{
				opt.text = data.usertype;
			}
			
			opt.selected = "selected";

			proj.add(opt,  proj.options[0]);
			
			$("#usergroup").append("<option value='"+data.usergroup+"' selected='selected'>"+data.usergroup+"</option>");
			
			var search_instcode = document.getElementById("search_instcode");
			var opt = document.createElement("option");
			opt.value = data.instcode;
			opt.text = data.instcode + " - " + data.instname;
			opt.selected = "selected";
			search_instcode.add(opt,  search_instcode.options[0]);
			
			return "valid";
		} 
	});
		
	
}

function updateheiuser(){
	
	$('#updateuser').prop("disabled", true);    
	$('#search_instcode').prop("disabled", true);    
	
	var heiuid = document.getElementById("heiuid").value;
	var search_instcode = document.getElementById("search_instcode").value;
	//var username = document.getElementById("username").value;
	var user_name = document.getElementById("user_name").value;
	var usertype = document.getElementById("usertype").value;
	var hei_email = document.getElementById("hei_email").value;
	var hei_contactno = document.getElementById("hei_contactno").value;
	
	
	$.ajax({
		url: 'heiusers/updateuser',
		type: 'post',
		data: {heiuid : heiuid,user_name:user_name,usertype:usertype,search_instcode:search_instcode,hei_email:hei_email,hei_contactno:hei_contactno},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
	
	
	

}

function changepassword(id){
	document.getElementById("heiuid").value = id;
	setTimeout(function () { $("#newpassword").focus(); }, 20);
}

function updatepassword(){
	var heiuid = document.getElementById("heiuid").value;
	var newpassword = document.getElementById("newpassword").value;
	$.ajax({
		url: 'heiusers/changepassword/',
		type: 'post',
		data: {heiuid:heiuid, newpassword:newpassword},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		

}