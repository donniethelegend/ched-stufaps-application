


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
			
			$("#username").get(0).setSelectionRange(0,0);
			$('#updateuser').prop("disabled", true);    
			$('#saveuser').prop("disabled", false);    
			document.getElementById("username").value ="";
			document.getElementById("password").value="";
			document.getElementById("user_name").value="";

			setTimeout(function () { $("#username").focus(); }, 20);
			

}
	
			



//save project

function saveuser(){
	

					var username = document.getElementById("username").value;
					var password = document.getElementById("password").value;
					var user_name = document.getElementById("user_name").value;
					var usertype = document.getElementById("usertype").value;
					var usergroup = document.getElementById("usergroup").value;
					
			if(username!="" && password!="" && user_name!="" && usertype!=""){

					//check duplicate user
					$.ajax({
                    url: 'users/checkusername',
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
								url: 'users/saveuser',
								type: 'post',
								data: {username: username, password: password,user_name:user_name,usertype:usertype,usergroup:usergroup},
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
							alert("Username already used.")
						}
						
						
                    }
                });

			}//end if all fields are not blank
			else{
				alert("Please fill up the required fields.");
				setTimeout(function () { $("#username").focus(); }, 20);
			}
}

function deleteuser(id){
	
	var r = confirm("Are your sure you want to delete this User?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
		//if (person =='superadmin') {
		$.ajax({
                    url: 'users/deleteuser',
                    type: 'post',
                    data: {userid: id},
                    success: function(response) {
						//console.log(response);
						location.reload();
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
	

	$.ajax({
		url: 'users/getuser/'+id,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			//insert values	
			document.getElementById("uid").value = id;
			document.getElementById("username").value = data.username;
			//document.getElementById("password").value = data.password;
			document.getElementById("user_name").value = data.name;
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
			
			
			return "valid";
		} 
	});
		
	
}

function updateuser(){
	
	$('#updateuser').prop("disabled", true);    
	
	var userid = document.getElementById("uid").value;
	var username = document.getElementById("username").value;
	var user_name = document.getElementById("user_name").value;
	var usertype = document.getElementById("usertype").value;
	var usergroup = document.getElementById("usergroup").value;
	
	$.ajax({
		url: 'users/updateuser/',
		type: 'post',
		data: {userid : userid,username:username,user_name:user_name,usertype:usertype,usergroup:usergroup},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		

}

function changepassword(id){
	document.getElementById("uid").value = id;
	setTimeout(function () { $("#newpassword").focus(); }, 20);
}

function updatepassword(){
	var userid = document.getElementById("uid").value;
	var newpassword = document.getElementById("newpassword").value;
	$.ajax({
		url: 'users/changepassword/',
		type: 'post',
		data: {userid : userid,newpassword:newpassword},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		

}