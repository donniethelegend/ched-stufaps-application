function saveapplication(){


	var instcode = document.getElementById("instcode").value;
	var datereceived = document.getElementById("datereceived").value;
	var programname = document.getElementById("programname").value;
	var yearlevel = document.getElementById("yearlevel").value;
	var schoolyear = document.getElementById("schoolyear").value;
	var assigned_to_uid = document.getElementById("assigned_to_uid").value;
	var application_status = document.getElementById("application_status").value;
	
	$.ajax({
		url: 'programapplication/saveapplication/',
		type: 'post',
		data: {instcode:instcode,datereceived:datereceived,programname:programname,yearlevel:yearlevel,assigned_to_uid:assigned_to_uid,application_status:application_status,schoolyear:schoolyear},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		
		
}

function updateapplication(){


	var progappid = document.getElementById("progappid").value;
	var instcode = document.getElementById("instcode").value;
	var datereceived = document.getElementById("datereceived").value;
	var programname = document.getElementById("programname").value;
	var yearlevel = document.getElementById("yearlevel").value;
	var schoolyear = document.getElementById("schoolyear").value;
	var assigned_to_uid = document.getElementById("assigned_to_uid").value;
	var application_status = document.getElementById("application_status").value;
	
	$.ajax({
		url: '../updateapplication',
		type: 'post',
		data: {instcode:instcode,datereceived:datereceived,programname:programname,yearlevel:yearlevel,assigned_to_uid:assigned_to_uid,application_status:application_status,progappid:progappid,schoolyear:schoolyear},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		
		
}



function saveremarks(progappid){


	var remarks_reply = document.getElementById("remarks_reply").value;
	var application_status = document.getElementById("application_status").value;

	
	$.ajax({
		url: '../saveremarks',
		type: 'post',
		data: {progappid:progappid,remarks_reply:remarks_reply,application_status:application_status},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 //window.location.reload();
			 $('#remarks_list').load(document.URL +  ' #remarks_list');
			
		} 
	});
		
		
}

function deleteapplication(id){
	
	var baseurl = document.getElementById("baseurl").value;
	
	var r = confirm("Are your sure you want to delete this Application?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
		//if (person =='superadmin') {
		$.ajax({
                    url: baseurl+'programapplication/deleteapplication',
                    type: 'post',
                    data: {progappid: id},
                    success: function(response) {
						$.bootstrapGrowl('<h4><strong>Program Deleted!</strong></h4> <p>Program has been deleted!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						setTimeout(function(){location.reload();},1000);
						
                    }
                });
		//}else{
			//alert("Invalid Password");
		//}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function deleteremarks(id){
	
	//var baseurl = document.getElementById("baseurl").value;
	
	var r = confirm("Are your sure you want to delete this Remarks?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteremarks',
                    type: 'post',
                    data: {remarksid: id},
                    success: function(response) {
						//console.log(response);
						 $('#remarks_list').load(document.URL +  ' #remarks_list');
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

$(document).ready(function() {
    $('#program-application-list-table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );