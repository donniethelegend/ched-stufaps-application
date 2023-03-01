function addrecord(){
	
	$('#savebutton').prop("disabled", false);
	$('#updatebutton').prop("disabled", true);
	
	//document.getElementById('building_name').value = "";
	//document.getElementById('floor_count').value = "";
	//document.getElementById('classroom_count').value = "";

}

function savefaculty(){
	//alert(instcode);
	
	var instcode = document.getElementById("instcode").value;
	
	var faculty_name = document.getElementById("faculty_name").value;
	var faculty_full_part_code = document.getElementById("faculty_full_part_code").value;
	var faculty_gender = document.getElementById("faculty_gender").value;
	var teaching_discipline = document.getElementById("teaching_discipline").value;
	var highest_degree_code = document.getElementById("highest_degree_code").value;
	var faculty_programcode = document.getElementById("faculty_programcode").value;
	var faculty_programname = document.getElementById("faculty_programname").value;
	var faculty_masterscode = document.getElementById("faculty_masterscode").value;
	var faculty_masters = document.getElementById("faculty_masters").value;
	var faculty_doctoratecode = document.getElementById("faculty_doctoratecode").value;
	var faculty_doctorate = document.getElementById("faculty_doctorate").value;
	var professional_license_code = document.getElementById("professional_license_code").value;
	var tenure = document.getElementById("tenure").value;
	var rank_code = document.getElementById("rank_code").value;
	var teaching_load_code = document.getElementById("teaching_load_code").value;
	var subjects = document.getElementById("subjects").value;
	var annual_salary_code = document.getElementById("annual_salary_code").value;
	
	
	
	//alert(accountid);
	$.ajax({
		url: "heifaculty/savefaculty",
		type: 'post',
		data: { instcode:instcode,faculty_name:faculty_name,faculty_full_part_code:faculty_full_part_code,faculty_gender:faculty_gender,teaching_discipline:teaching_discipline,highest_degree_code:highest_degree_code,faculty_programcode:faculty_programcode,faculty_programname:faculty_programname,faculty_masterscode:faculty_masterscode,faculty_masters:faculty_masters,faculty_doctoratecode:faculty_doctoratecode,faculty_doctorate:faculty_doctorate,professional_license_code:professional_license_code,tenure:tenure,rank_code:rank_code,teaching_load_code:teaching_load_code,subjects:subjects,annual_salary_code:annual_salary_code},
		success: function(response) {
			console.log(response);

			window.location.reload();;

		}
	});
}

function deletefaculty(facultyid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'heifaculty/deletefaculty',
                    type: 'post',
                    data: {facultyid:facultyid},
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
	
	$('#savebutton').prop("disabled", true);
	$('#updatebutton').prop("disabled", false);
	
	
	document.getElementById('edit_facultyid').value=facultyid;
	//$("#closesupervisor").click();
	$.ajax({
		url: "heifaculty/editfaculty",
		type: 'post',
		data: {facultyid:facultyid},
		success: function(response) {
			
			//console.log(response);
			var data = JSON.parse(response);

			/*var instcode = document.getElementById("instcode");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.instcode;
				opt.text = data.instname;
				opt.selected = "selected";
				instcode.add(opt,  instcode.options[0]);
				*/
			document.getElementById('faculty_name').value = data.faculty_name;
			var faculty_full_part_code = document.getElementById("faculty_full_part_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.faculty_full_part_code;
				if(data.fullpart_description==null){
					opt.text = data.faculty_full_part_code;
				}else{
					opt.text = data.fullpart_description;
				}
				
				opt.selected = "selected";
				faculty_full_part_code.add(opt,  faculty_full_part_code.options[0]);
			var faculty_gender = document.getElementById("faculty_gender");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.faculty_gender;
				opt.text = data.faculty_gender;
				opt.selected = "selected";
				faculty_gender.add(opt,  faculty_gender.options[0]);
			document.getElementById('teaching_discipline').value = data.teaching_discipline;	
			var highest_degree_code = document.getElementById("highest_degree_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.highest_degree_code;
				opt.text = data.highestdegree_description;
				opt.selected = "selected";
				highest_degree_code.add(opt,  highest_degree_code.options[0]);
			document.getElementById('faculty_programcode').value = data.faculty_programcode;	
			document.getElementById('faculty_programname').value = data.faculty_programname;	
			document.getElementById('faculty_masterscode').value = data.faculty_masterscode;	
			document.getElementById('faculty_masters').value = data.faculty_masters;	
			document.getElementById('faculty_doctoratecode').value = data.faculty_doctoratecode;	
			document.getElementById('faculty_doctorate').value = data.faculty_doctorate;	
			var professional_license_code = document.getElementById("professional_license_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.professional_license_code;
				opt.text = data.license_description;
				opt.selected = "selected";
				professional_license_code.add(opt,  professional_license_code.options[0]);
			var tenure = document.getElementById("tenure");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.tenure;
				opt.text = data.tenure;
				opt.selected = "selected";
				tenure.add(opt,  tenure.options[0]);
			var rank_code = document.getElementById("rank_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.rank_code;
				opt.text = data.rank_description;
				opt.selected = "selected";
				rank_code.add(opt,  rank_code.options[0]);
			var teaching_load_code = document.getElementById("teaching_load_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.teaching_load_code;
				opt.text = data.teaching_description;
				opt.selected = "selected";
				teaching_load_code.add(opt,  teaching_load_code.options[0]);
			document.getElementById('subjects').value = data.subjects;	
			var annual_salary_code = document.getElementById("annual_salary_code");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.annual_salary_code;
				opt.text = data.salary_description;
				opt.selected = "selected";
				annual_salary_code.add(opt,  annual_salary_code.options[0]);
			var faculty_status = document.getElementById("faculty_status");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.faculty_status;
				opt.text = data.faculty_status;
				opt.selected = "selected";
				faculty_status.add(opt,  faculty_status.options[0]);
				
		}
	});
	
}

function updatefaculty(){
	//alert(instcode);
	
	var edit_facultyid = document.getElementById("edit_facultyid").value;
	
	var instcode = document.getElementById("instcode").value;
	
	var faculty_name = document.getElementById("faculty_name").value;
	var faculty_full_part_code = document.getElementById("faculty_full_part_code").value;
	var faculty_gender = document.getElementById("faculty_gender").value;
	var teaching_discipline = document.getElementById("teaching_discipline").value;
	var highest_degree_code = document.getElementById("highest_degree_code").value;
	var faculty_programcode = document.getElementById("faculty_programcode").value;
	var faculty_programname = document.getElementById("faculty_programname").value;
	var faculty_masterscode = document.getElementById("faculty_masterscode").value;
	var faculty_masters = document.getElementById("faculty_masters").value;
	var faculty_doctoratecode = document.getElementById("faculty_doctoratecode").value;
	var faculty_doctorate = document.getElementById("faculty_doctorate").value;
	var professional_license_code = document.getElementById("professional_license_code").value;
	var tenure = document.getElementById("tenure").value;
	var rank_code = document.getElementById("rank_code").value;
	var teaching_load_code = document.getElementById("teaching_load_code").value;
	var subjects = document.getElementById("subjects").value;
	var annual_salary_code = document.getElementById("annual_salary_code").value;
	var faculty_status = document.getElementById("faculty_status").value;
	
	//alert(accountid);
	$.ajax({
		url: "heifaculty/updatefaculty",
		type: 'post',
		data: { edit_facultyid:edit_facultyid,instcode:instcode,faculty_name:faculty_name,faculty_full_part_code:faculty_full_part_code,faculty_gender:faculty_gender,teaching_discipline:teaching_discipline,highest_degree_code:highest_degree_code,faculty_programcode:faculty_programcode,faculty_programname:faculty_programname,faculty_masterscode:faculty_masterscode,faculty_masters:faculty_masters,faculty_doctoratecode:faculty_doctoratecode,faculty_doctorate:faculty_doctorate,professional_license_code:professional_license_code,tenure:tenure,rank_code:rank_code,teaching_load_code:teaching_load_code,subjects:subjects,annual_salary_code:annual_salary_code,faculty_status:faculty_status},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
}
