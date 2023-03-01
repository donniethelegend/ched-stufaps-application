
$("#addpermitbutton").click(function (e) {
    $('#updatebutton').prop("disabled", true);
    $('#savebutton').prop("disabled", false);
	
});


function closebutton(){
	
	window.location.reload();;
	
}

function generatespno(){
	//alert(instcode);
	
	var specialpermit = document.getElementById("specialpermit").value;
	var seriesyear = document.getElementById("seriesyear").value;
	
	
	
	$.ajax({
		url: "permitsrecognition/generatepermitno",
		type: 'post',
		data: {specialpermit: specialpermit,seriesyear:seriesyear},
		success: function(response) {
			console.log(response);
			
			var lastnumber = parseInt(response);
			//console.log(lastnumber);
			var invalidresponse = response.length;
			if(invalidresponse >4){
				lastnumber=0;
			}
			
			var incrementlastnumber = lastnumber+1;
			var strinc = incrementlastnumber.toString();
		
			if(strinc.length==1){
				var zero ="00";
			}
			if(strinc.length==2){
				var zero ="0";
			}
			if(strinc.length==3){
				var zero ="";
			}
			var displayno = zero+incrementlastnumber;
			document.getElementById("permitno").value = displayno;


		}
	});
}

function savepermits(){
	//alert(instcode);
	
	var instcode = document.getElementById("instcode").value;
	var permitdate = document.getElementById("permitdate").value;
	var programname = document.getElementById("programname").value;
	var specialpermit = document.getElementById("specialpermit").value;
	
	var permitno = document.getElementById("permitno").value;
	var seriesyear = document.getElementById("seriesyear").value;
	var effectivitydate = document.getElementById("effectivitydate").value;
	var programlevel = document.getElementById("programlevel").value;
	//var major = document.getElementById("major").value
	var major = seeprogram();
	if(major==null){
		var fmajor = "None";
	}else{
		var fmajor = major.toString();
	}
	//var major_string = 
	
	
	//var str = "1,2,3,4,5,6";
	//var temp = new Array();
	// this will return an array with strings "1", "2", etc.
	//temp = major.split(",");
	//console.log(fmajor);
	$.ajax({
		url: "permitsrecognition/savepermits",
		type: 'post',
		data: { instcode:instcode,permitdate:permitdate,programname:programname,specialpermit:specialpermit,permitno:permitno,seriesyear:seriesyear,effectivitydate:effectivitydate,programlevel:programlevel,major:fmajor},
		success: function(response) {
			console.log(response);
			//document.getElementById("userusername").value = "";
			//document.getElementById("userpassword").value = "";
			

			//$('#success-alert').show("slow");
			//$('#success-alert').removeClass("hide");
			//setTimeout(function(){$('#success-alert').hide("slow");},1500);
			window.location.reload();

			//return "valid";
		}
	});
}

function deletepermit(permitid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this permit?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'permitsrecognition/deletepermit/'+permitid,
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


function editpermit(permitid){
	//alert(instcode);
	
	$('#savebutton').prop("disabled", true);
	$('#updatebutton').prop("disabled", false);
	$('#permitno').prop("disabled", true);
	$('#seriesyear').prop("disabled", true);
	
	
	$.ajax({
		url: "permitsrecognition/editpermit",
		type: 'post',
		data: {permitid: permitid},
		success: function(response) {
			//console.log(response);
			var data = JSON.parse(response);
			
			var instcode = document.getElementById("instcode");
			var opt = document.createElement("option");
			opt.value = data.instcode;
			opt.text = data.instname;
			opt.selected = "selected";
			instcode.add(opt,  instcode.options[0]);
			
			var specialpermit = document.getElementById("specialpermit");
			var opt = document.createElement("option");
			opt.value = data.specialpermit;
			opt.text = data.specialpermit;
			opt.selected = "selected";
			specialpermit.add(opt,  specialpermit.options[0]);
			
			document.getElementById("permitdate").value = data.permitdate;
			document.getElementById("programname").value = data.programname;
			document.getElementById("permitno").value = data.permitno;
			document.getElementById("seriesyear").value = data.seriesyear;
			document.getElementById("effectivitydate").value = data.effectivitydate;
			document.getElementById("programlevel").value = data.programlevel;
			document.getElementById("permitid").value = permitid;


		}
	});
}


function updatepermit(){
	
	var permitid = document.getElementById("permitid").value;
	var instcode = document.getElementById("instcode").value;
	var permitdate = document.getElementById("permitdate").value;
	var programname = document.getElementById("programname").value;
	var specialpermit = document.getElementById("specialpermit").value;
	var permitno = document.getElementById("permitno").value;
	var seriesyear = document.getElementById("seriesyear").value;
	var effectivitydate = document.getElementById("effectivitydate").value;
	var programlevel = document.getElementById("programlevel").value;
	
	//alert(accountid);
	$.ajax({
		url: "permitsrecognition/updatepermit",
		type: 'post',
		data: { permitid:permitid, instcode:instcode,permitdate:permitdate,programname:programname,specialpermit:specialpermit,permitno:permitno,seriesyear:seriesyear,effectivitydate:effectivitydate,programlevel:programlevel},
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

function showprograms(selected){
	
	$.ajax({
		url: "permitsrecognition/showprograms",
		type: 'post',
		data: { instcode:selected},
		success: function(response) {
			$("#programname").empty();
			$("#major").empty();
			document.getElementById("authority").value = "";
			//console.log(response);
			var data = JSON.parse(response);
			//console.log(data);
			var filteredstud=document.getElementById("programname");
			var pmajor=document.getElementById("major");
			
			$(filteredstud).append( "<option></option>");				
			
			for(var ctr=0;ctr<data.length; ctr++){
				if(data[ctr].major==""){
					$(filteredstud).append( "<option value='"+data[ctr].programid+"'>"+data[ctr].mainprogram+"</option>");
				}else{
					$(filteredstud).append( "<option value='"+data[ctr].programid+"'>"+data[ctr].mainprogram+"</option>");
					$(pmajor).append( "<option value='"+data[ctr].programid+"'>"+data[ctr].mainprogram+" ("+data[ctr].major+")</option>");
				}
				
			}	
			
			
		}
	});
	
}

function showauthority(programid){
	$.ajax({
		url: "permitsrecognition/showauthority",
		type: 'post',
		data: { programid:programid},
		success: function(response) {
		var data = JSON.parse(response);	
			document.getElementById("authority").value = data.authcat+" No. "+data.authserial+", s. "+data.authyear;
			
		}
	});
	
}

function seeprogram(){
	
	var values = $('#major').val();
	
	return values;
}

/*
function seeprogram(){
$("#sendtomany option:selected").each(function () {
   var $this = $(this);
   if ($this.length) {
    var blastcontacts = $this.val();
    console.log(blastcontacts);
    console.log(blastmessage);
    //alert(blastcontacts);
    //alert(blastmessage);
    
    $.ajax({
		url: "inbox/saveblastmessage",
		type: 'post',
		data: {blastcontacts:blastcontacts, blastmessage:blastmessage},
		success: function(response) {
			console.log(response);
			location.reload();
		}
	});
    
   }
}
	
}

*/

$(document).ready(function() {
    $('#permits-datatable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );

function openfile_permit(permitid){
	document.getElementById("fileattachmentid_permit").value = permitid;
}

function upload_attachment_permits(){
	
	var form = document.getElementById("uploadpermitform");
  
			 var formData = new FormData(form);
			 //alert(formData);
			$.ajax({
				url: 'permitsrecognition/permitupload',
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
						//console.log(data);
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


function deletefile(permitid,filename){
	//alert(elid);
	
	var r = confirm("Are your sure you want to delete this file?");
    if (r == true) {
        //alert ("You pressed OK!");
		 //var person = prompt("Please enter Administrator Password");
    
		//if (person =='superadmin') {
			$.ajax({
                    url: 'permitsrecognition/deletefile',
                    type: 'post',
                    data: {permitid: permitid,filename:filename},
                    success: function(response) {
						console.log(response);
						//location.reload();
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

