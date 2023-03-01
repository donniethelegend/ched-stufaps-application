function addrecord(){
	
	$('#savebutton').prop("disabled", false);
	$('#updatebutton').prop("disabled", true);

}

function savedean(instcode){
	
	
	var dean_instcode = document.getElementById("dean_instcode").value;
	var deansname = document.getElementById("deansname").value;
	var designation = document.getElementById("designation").value;
	var assignment = document.getElementById("assignment").value;
	var baccalaureate = document.getElementById("baccalaureate").value;
	var masters = document.getElementById("masters").value;
	var doctoral = document.getElementById("doctoral").value;
	var dean_status = document.getElementById("dean_status").value;
	var dean_remarks = document.getElementById("dean_remarks").value;
	
	
	
	$.ajax({
		url: "deans/savedean",
		type: 'post',
		data: { dean_instcode:dean_instcode,deansname:deansname,designation: designation, assignment: assignment, baccalaureate:baccalaureate,masters:masters,doctoral:doctoral,dean_status:dean_status,dean_remarks:dean_remarks},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
}

function deletedean(deanid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {

			$.ajax({
                    url: 'deans/deletedean',
                    type: 'post',
                    data: {deanid:deanid},
                    success: function(response) {
						window.location.reload();

                    }
                });
		
    } if(r == false) {

		
    }
	
	
}

function editdean(deanid){
	
	$('#savebutton').prop("disabled", true);
	$('#updatebutton').prop("disabled", false);
	$('#dean_status').prop("disabled", false);
	
	
	document.getElementById('edit_deanid').value=deanid;
	//$("#closesupervisor").click();
	$.ajax({
		url: "deans/editdean",
		type: 'post',
		data: {deanid:deanid},
		success: function(response) {
			
			//console.log(response);
			var data = JSON.parse(response);

			var dean_instcode = document.getElementById("dean_instcode");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.instcode;
				opt.text = data.instname;
				opt.selected = "selected";
				dean_instcode.add(opt,  dean_instcode.options[0]);
				
			document.getElementById('deansname').value = data.deansname;
			document.getElementById('designation').value = data.designation;
			document.getElementById('assignment').value = data.assignment;
			document.getElementById('baccalaureate').value = data.baccalaureate;
			document.getElementById('masters').value = data.masters;
			document.getElementById('doctoral').value = data.doctoral;
			

			
			var dean_status = document.getElementById("dean_status");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.dean_status;
				opt.text = data.dean_status;
				opt.selected = "selected";
				dean_status.add(opt,  dean_status.options[0]);
				
			document.getElementById('dean_remarks').value = data.dean_remarks;
				
				
		}
	});
	
}


function updatedean(){
	//alert(instcode);
	
	var edit_deanid = document.getElementById("edit_deanid").value;
	
	var dean_instcode = document.getElementById("dean_instcode").value;
	var deansname = document.getElementById("deansname").value;
	var designation = document.getElementById("designation").value;
	var assignment = document.getElementById("assignment").value;
	var baccalaureate = document.getElementById("baccalaureate").value;
	var masters = document.getElementById("masters").value;
	var doctoral = document.getElementById("doctoral").value;
	var dean_status = document.getElementById("dean_status").value;
	var dean_remarks = document.getElementById("dean_remarks").value;
	
	//alert(accountid);
	$.ajax({
		url: "deans/updatedean",
		type: 'post',
		data: { edit_deanid:edit_deanid,dean_instcode:dean_instcode,deansname:deansname,designation:designation,assignment:assignment,baccalaureate:baccalaureate,masters:masters,doctoral:doctoral,dean_status:dean_status,dean_remarks:dean_remarks},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
}