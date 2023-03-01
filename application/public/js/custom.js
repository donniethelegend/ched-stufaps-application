








function assignsupervisor(programid){
	
	
	document.getElementById('programid').value=programid;
	//$("#closesupervisor").click();
}






function savesingleapplicant(){
	//alert(instcode);
	
	var lastname = document.getElementById("lastname").value;
	var firstname = document.getElementById("firstname").value;
	var middlename = document.getElementById("middlename").value;
	var extension = document.getElementById("extension").value;
	var dateofbirth = document.getElementById("dateofbirth").value;
	var placeofbirth = document.getElementById("placeofbirth").value;
	if(document.getElementById("genderm").checked==true){
		var gender = "Male";
	}if(document.getElementById("genderf").checked==true){
		var gender = "Female";
	}
	
	if(document.getElementById("civilstatuss").checked==true){
		var civilstatus = "Single";
	}if(document.getElementById("civilstatusm").checked==true){
		var civilstatus = "Married";
	}
	
	
	var citizenship = document.getElementById("citizenship").value;
	var contactno = document.getElementById("contactno").value;
	var email = document.getElementById("email").value;
	var barangay = document.getElementById("barangay").value;
	var towncity = document.getElementById("towncity").value;
	var province = document.getElementById("province").value;
	var congressionaldistrict = document.getElementById("congressionaldistrict").value;
	var zipcode = document.getElementById("zipcode").value;
	var heicode = document.getElementById("heicode").value;
	var course = document.getElementById("course").value;
	var father = document.getElementById("father").value;
	var foccupation = document.getElementById("foccupation").value;
	var mother = document.getElementById("mother").value;
	var moccupation = document.getElementById("moccupation").value;
	var siblingno = document.getElementById("siblingno").value;
	var disability = document.getElementById("disability").value;
	var yearofapplication = document.getElementById("yearofapplication").value;
	var year_level = document.getElementById("year_level").value;
	var average_grade = document.getElementById("average_grade").value;
	var income = document.getElementById("income").value;
	var type = document.getElementById("type").value;
	var hsgraduated = document.getElementById("hsgraduated").value;
	
	
	
	$('#savebutton').prop("disabled", true);
	
	//alert(accountid);
	$.ajax({
		url: "../../functions/savesingleapplicant",
		type: 'post',
		data: {lastname:lastname,firstname:firstname,middlename:middlename,extension:extension,dateofbirth:dateofbirth,placeofbirth:placeofbirth,gender:gender,civilstatus:civilstatus,citizenship:citizenship,contactno:contactno,email:email,barangay:barangay,towncity:towncity,province:province,congressionaldistrict:congressionaldistrict,zipcode:zipcode,heicode:heicode,course:course,father:father,foccupation:foccupation,mother:mother,moccupation:moccupation,siblingno:siblingno,disability:disability,yearofapplication:yearofapplication,year_level:year_level,average_grade:average_grade,income:income,type:type,hsgraduated:hsgraduated},
		success: function(response) {
			//console.log(response);
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
function deleteapplicant(applicantid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this applicant?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
    
		if (person =='superadmin') {
			$.ajax({
                    url: '../../functions/deleteapplicant/'+applicantid,
                    type: 'post',
                    //data: {accountid: accountid},
                    success: function(response) {
						window.location.reload();
						//console.log(response);
						
						//console.log(response);
                    }
                });
			
		}else{
			alert("Invalid Password");
		}
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
	
}

function savepayment(scholarid){
	
	var semester = document.getElementById("semester").value;
	var schoolyear = document.getElementById("schoolyear").value;
	var fundcluster;// = document.getElementById("fundcluster").value;
	var paymentdate = document.getElementById("paymentdate").value;
	var checkno = document.getElementById("checkno").value;
	var amount = document.getElementById("amount").value;
	var remarks = document.getElementById("remarks").value;
	var cy = document.getElementById("cy").value;
	var status = document.getElementById("status").value;
	
	$.ajax({
		url: "../../functions/savepayment/"+scholarid,
		type: 'post',
		data: {semester:semester, schoolyear:schoolyear,checkno:checkno,amount:amount,remarks:remarks,cy:cy,status:status,fundcluster:fundcluster,paymentdate:paymentdate},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
	
	
}
function addpayment(){
	$('#savebutton').prop("disabled", false);    
	$('#updatebutton').prop("disabled", true); 
	document.getElementById('spaymentid').value="";
	document.getElementById('checkno').value = "";
	document.getElementById('amount').value = "";
	document.getElementById('remarks').value = "";
	var status = document.getElementById("status");
				//discipline2.remove(0);
		var opt = document.createElement("option");
		opt.value = "Available";
		opt.text ="Available";
		opt.selected = "selected";
		status.add(opt,  status.options[0]);
}
function editpayment(spaymentid){
	
	//clear fields
	document.getElementById('spaymentid').value="";
	document.getElementById('checkno').value = "";
	document.getElementById('amount').value = "";
	document.getElementById('remarks').value = "";
	//document.getElementById('semester').value = data.checkno;
	//document.getElementById('schoolyear').value = data.amount;
	//document.getElementById('cy').value = data.remarks;
	$('#savebutton').prop("disabled", true);    
	$('#updatebutton').prop("disabled", false);    
	//alert("test");
	
	document.getElementById('spaymentid').value=spaymentid;
	$.ajax({
		url: "../../functions/getpaymentinfo/"+spaymentid,
		type: 'post',
		//data: {instcode:instcode, latitude:latitude,longtitude:longtitude},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			console.log(data);
			var semester = document.getElementById("semester");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.semester;
				opt.text = data.semester;
				opt.selected = "selected";
				semester.add(opt,  semester.options[0]);
			var schoolyear = document.getElementById("schoolyear");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.schoolyear;
				opt.text = data.schoolyear;
				opt.selected = "selected";
				schoolyear.add(opt,  schoolyear.options[0]);
			document.getElementById('checkno').value = data.checkno;
			document.getElementById('amount').value = data.amount;
			document.getElementById('remarks').value = data.remarks;
			var cy = document.getElementById("cy");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.cy;
				opt.text = data.cy;
				opt.selected = "selected";
				cy.add(opt,  cy.options[0]);
			var status = document.getElementById("status");
				//discipline2.remove(0);
				var opt = document.createElement("option");
				opt.value = data.status;
				opt.text = data.status;
				opt.selected = "selected";
				status.add(opt,  status.options[0]);
			/*
			
			document.getElementById('editprogramname').value = data.mainprogram;
			document.getElementById('editmajor').value = data.major;
			
			var supervisor = document.getElementById("editselectsupervisor");
				//supervisor.remove(0);
				var opt = document.createElement("option");
				opt.value = data.supervisor;
				opt.text = data.supervisor;
				opt.selected = "selected";
				supervisor.add(opt,  supervisor.options[0]);
				
			var discipline = document.getElementById("editselectdiscipline");
				//discipline.remove(0);
				var opt = document.createElement("option");
				opt.value = data.discipline;
				opt.text = data.discipline;
				opt.selected = "selected";
				discipline.add(opt,  discipline.options[0]);
				
			*/
			
		}
	});
}
function updatepayment(){
	
	//$("#tabinformation").load(location.href + " #tabinformation");
	var spaymentid = document.getElementById('spaymentid').value;
	var semester = document.getElementById("semester").value;
	var schoolyear = document.getElementById("schoolyear").value;
	var checkno = document.getElementById("checkno").value;
	var amount = document.getElementById("amount").value;
	var remarks = document.getElementById("remarks").value;
	var cy = document.getElementById("cy").value;
	var status = document.getElementById("status").value;
	
	$.ajax({
		url: "../../functions/updatepayment/"+spaymentid,
		type: 'post',
		data: {semester:semester, schoolyear:schoolyear,checkno:checkno,amount:amount,remarks:remarks,cy:cy,status:status},
		success: function(response) {
			console.log(response);
			window.location.reload();;
		}
	});
	
	
	//document.getElementById('supervisorcolumn'+programid).innerHTML=supervisor;
	//$("#closesupervisor").click();
	
	
}

function startwidget(){
	var widgetChartPie      = $('#widget-chart-pie');
	var stronglyagree = document.getElementById("stronglyagree").value;
	var agree = document.getElementById("agree").value;
	// Pie Chart
            $.plot(widgetChartPie,
                [
                    {label: 'Strongly Agree', data: stronglyagree},
                    {label: 'Agree', data: agree}
                ],
                {
                    colors: ['#5cafde', '#5ccdde'],
                    legend: {show: false},
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 2/3,
                                formatter: function(label, pieSeries) {
                                    return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                },
                                background: {opacity: .75, color: '#000000'}
                            }
                        }
                    }
                }
            );
			
		
		var widgetChartPie2      = $('#widget-chart-pie2');
	var stronglyagree2 = document.getElementById("cstronglyagree").value;
	var agree2 = document.getElementById("cagree").value;
	// Pie Chart
            $.plot(widgetChartPie2,
                [
                    {label: 'Strongly Agree', data: stronglyagree2},
                    {label: 'Agree', data: agree2}
                ],
                {
                    colors: ['#afde5c','#454e59'],
                    legend: {show: false},
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 2/3,
                                formatter: function(label, pieSeries) {
                                    return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                },
                                background: {opacity: .75, color: '#000000'}
                            }
                        }
                    }
                }
            );
			
	
}

function savevoucher(scholarid){
	//alert($('#savevoucherbutton').prop("disabled"));
	$('#savevoucherbutton').prop("disabled", true);
	$('#updatevoucherbutton').prop("disabled", false);
	
	//alert($('#savevoucherbutton').prop("disabled"));
	//console.log($('#savevoucherbutton').prop("disabled"));
	var fundcluster = document.getElementById("fundcluster").value;
	var voucherdate = document.getElementById("voucherdate").value;
	var dvno = document.getElementById("dvno").value;
	var modeofpayment = document.getElementById("modeofpayment").value;
	var orsno = document.getElementById("orsno").value;
	var vouchersemester = document.getElementById("vouchersemester").value;
	var voucherschoolyear = document.getElementById("voucherschoolyear").value;
	//var particulars = document.getElementById("particulars").value;
	var responsibility = document.getElementById("responsibility").value;
	var mfopap = document.getElementById("mfopap").value;
	var voucheramount = document.getElementById("voucheramount").value;
	
	if(document.getElementById("certifiedcash").checked ==true){
		var certifiedcash = 1;
	}else{
		var certifiedcash = 0;
	}
	
	if(document.getElementById("certifiedsubject").checked ==true){
		var certifiedsubject = 1;
	}else{
		var certifiedsubject = 0;
	}
	
	if(document.getElementById("certifiedsupporting").checked ==true){
		var certifiedsupporting = 1;
	}else{
		var certifiedsupporting = 0;
	}
	//var certifiedcash = document.getElementById("certifiedcash").value;
	//var certifiedsubject = document.getElementById("certifiedsubject").value;
	//var certifiedsupporting = document.getElementById("certifiedsupporting").value;
	
	//alert(certifiedcash);
	
	$.ajax({
		url: "../../functions/savevoucher/"+scholarid,
		type: 'post',
		data: {fundcluster:fundcluster,voucherdate:voucherdate,dvno:dvno,modeofpayment:modeofpayment,orsno:orsno,responsibility:responsibility,mfopap:mfopap,voucheramount:voucheramount,certifiedcash:certifiedcash,certifiedsubject:certifiedsubject,certifiedsupporting:certifiedsupporting,vouchersemester:vouchersemester,voucherschoolyear:voucherschoolyear},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			//setTimeout(function(){document.getElementById("voucherid").value = data.lastid;},1500);
			document.getElementById("voucherid").value = data.lastid;
			console.log(data.lastid);
			//alert(data.lastid);
			document.getElementById("voucherid").value = data.lastid;
			//window.location.reload();;
			
			//$('#general-table').load(document.URL +  '#general-table');
			$('#voucherlist-table').load(document.URL +  ' #voucherlist-table');
			//$( ".close" ).trigger( "click" );
			//$('#modaldiv').load(document.URL +  ' #modaldiv');
		}
	});
	
	
}


function addentry(){
	
	var dvno = document.getElementById("dvno").value;
	var accounttitle = document.getElementById("accounttitle").value;
	var uacscode = document.getElementById("uacscode").value;
	var columnentry = document.getElementById("columnentry").value;
	var accountentryamount = document.getElementById("accountentryamount").value;
	
	
	$.ajax({
		url: "../../functions/saveentry/"+dvno,
		type: 'post',
		data: {accounttitle:accounttitle,uacscode:uacscode,columnentry:columnentry,accountentryamount:accountentryamount},
		success: function(response) {
			console.log(response);
			//window.location.reload();;
		}
	});
	
	
}

function populateentry(scholarid){
	var dvno = document.getElementById("dvno").value;
	
	if(dvno!=''){
		//save voucher if update is enabled
		if($('#savevoucherbutton').prop("disabled")==false){
			alert("not yet saved");
			savevoucher(scholarid);
			
		}
		
			$.ajax({
			url: "../../functions/getentrydetails/"+dvno,
			type: 'post',
			
			success: function(response) {
				console.log(response);
				var data = JSON.parse(response);
				console.log(data);
				//alert(data.numberofentry);
				if(data.numberofentry==0){
					
					//start without data
					var voucherid = document.getElementById("voucherid").value;
					var fundcluster = document.getElementById("fundcluster").value;
					
						var dvno = document.getElementById("dvno").value;
						var accounttitle1 = "Donations";
						var uacscode1 = "5029908000";
						var columnentry1 = "Debit";
						var accountentryamount1 = document.getElementById("voucheramount").value;
						
						$.ajax({
							url: "../../functions/saveentry/"+dvno,
							type: 'post',
							data: {accounttitle:accounttitle1,uacscode:uacscode1,columnentry:columnentry1,accountentryamount:accountentryamount1,voucherid:voucherid},
							success: function(response) {
								console.log(response);
								//window.location.reload();;
								
				var table=document.getElementById("entryitems");
				$(table).append( "<tr><td><strong>"+accounttitle1+"</strong></td>"+
	"<td class='hidden-xs'>"+uacscode1+"</td>"+
	"<td class='hidden-xs'>"+accountentryamount1+"</td>"+
	"<td class='hidden-xs'>"+columnentry1+"</td>"+
	"<td class='text-center'>"+
	"<a href='javascript:void(0)' data-toggle='tooltip' title='Delete User' class='btn btn-effect-ripple btn-xs btn-danger'><i class='fa fa-times'></i></a></td></tr>");
				
				
				
							}
						});
						

		var voucherid = document.getElementById("voucherid").value;
		alert(voucherid);
		if(fundcluster =='101'){
			var accounttitle ="Cash - MDS, REGULAR ACCOUNT";
			var uacscode = "1010404000";
		}if(fundcluster =='151'){
			var accounttitle ="Cash - MDS, SPECIAL ACCOUNT";
			var uacscode = "1010405000";
		}
		
		var columnentry = "Credit";
		var accountentryamount = document.getElementById("voucheramount").value;		
	$.ajax({
		url: "../../functions/saveentry/"+dvno,
		type: 'post',
		data: {accounttitle:accounttitle,uacscode:uacscode,columnentry:columnentry,accountentryamount:accountentryamount,voucherid:voucherid},
		success: function(response) {
			console.log(response);
								//window.location.reload();;
								
				var table=document.getElementById("entryitems");
				$(table).append( "<tr><td><strong>"+accounttitle+"</strong></td>"+
	"<td class='hidden-xs'>"+uacscode+"</td>"+
	"<td class='hidden-xs'>"+accountentryamount+"</td>"+
	"<td class='hidden-xs'>"+columnentry+"</td>"+
	"<td class='text-center'>"+
	"<a href='javascript:void(0)' data-toggle='tooltip' title='Delete User' class='btn btn-effect-ripple btn-xs btn-danger'><i class='fa fa-times'></i></a></td></tr>");
	
							}
						});


					
					//end without data

					
				}else{
					//alert("with data");	
				}
				
				//window.location.reload();;
			}
		});
		
	}else{
		alert("Empty DV No.");
	}
	
	
	
	
	
	
	
	
	
}

function updatestudentlist(typecode){
	//var filteredstud=document.getElementById("filteredstudent");
	$('#filteredstudent').empty().append('');
	var baseurl = document.getElementById("baseurl").value;
	//alert(baseurl);
	$.ajax({
		url: baseurl+"functions/getscholarfiltered/"+typecode,
		type: 'post',
		data: {typecode:typecode},
		success: function(response) {
			//console.log(response);
			var data = JSON.parse(response);
			var filteredstud=document.getElementById("filteredstudent");
								//window.location.reload();;
			for(var ctr=0;ctr<data.length; ctr++){
				
				
		$(filteredstud).append( "<option value='"+data[ctr].scholarid+"'>"+data[ctr].fullname+"</option>");
			}					
	
				
				
				
		}
		});
	
}

function updatedvno(){
	//alert('test');
	var dvyear = document.getElementById("dvyear").value;
	var dvmonth = document.getElementById("dvmonth").value;
	var fundcluster = document.getElementById("fundcluster").value;
	var dvnostart = document.getElementById("dvnostart").value;
	
	var fulldvno = dvyear+"-"+fundcluster+"-"+dvmonth+"-"+dvnostart;
	
	document.getElementById("dvno").value = fulldvno;
	
}

function addbatchvoucher(){
	//alert('test');
	
	var dvnostart = document.getElementById("dvnostart").value;
	
	var finaldvno = document.getElementById("dvno").value;
	var semester = document.getElementById("semester").value;
	var schoolyear = document.getElementById("schoolyear").value;
	var amount = document.getElementById("amount").value;
	var scholarid = document.getElementById("filteredstudent").value;

	var fundcluster = document.getElementById("fundcluster").value;
	var voucherdate = document.getElementById("voucherdate").value;
	var modeofpayment = "MDS Check";
	var orsno = document.getElementById("orsno").value;
	var responsibility = "StuFAP Unit";
	var mfopap = "3 02 020000";
	var certifiedcash = 1;
	var certifiedsubject = 0;
	var certifiedsupporting = 1;
	var currentbatch = document.getElementById("currentbatch").value;

	
//save voucher
	var baseurl = document.getElementById("baseurl").value;
	alert(baseurl+"functions/savevoucher/"+scholarid);
	$.ajax({
		url: baseurl+"functions/savevoucher/"+scholarid,
		type: 'post',
		data: {fundcluster:fundcluster,voucherdate:voucherdate,dvno:finaldvno,modeofpayment:modeofpayment,orsno:orsno,responsibility:responsibility,mfopap:mfopap,voucheramount:amount,certifiedcash:certifiedcash,certifiedsubject:certifiedsubject,certifiedsupporting:certifiedsupporting,vouchersemester:semester,voucherschoolyear:schoolyear,currentbatch:currentbatch},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			//save entry
			var voucherid = data['lastid'];
			document.getElementById("lastvoucherid").value = voucherid;
			var accounttitle = document.getElementById("accounttitle").value;
			var amount = document.getElementById("amount").value;
			var columnentry = "Credit";
			var finaldvno = document.getElementById("dvno").value;
			$.ajax({
				url: baseurl+"functions/saveentry/"+finaldvno,
				type: 'post',
				data: {accounttitle:accounttitle,amount:amount,columnentry:columnentry,accountentryamount:amount,voucherid,voucherid,finaldvno:finaldvno},
				success: function(response) {
					//console.log(response);
					var data = JSON.parse(response);
					console.log(data);
					
				
				}
				});
		
		}
		});
	
	
	
	
	//show in table
	$.ajax({
		url: "functions/getscholarfullname/"+scholarid,
		type: 'post',
		
		success: function(response) {
			
			var data = JSON.parse(response);
			var lastvoucher = document.getElementById("lastvoucherid").value;
			//console.log();
		var batchtable=document.getElementById("batchvouchertable");
			$(batchtable).append("<tr>"+
			"<td class='text-center'>"+finaldvno+"</td>"+
			"<td>"+data[0]['fullname']+"</td>"+
			"<td>"+semester+"</td>"+
			"<td>"+schoolyear+"</td>"+
			"<td class='text-center'>"+amount+"</td>"+
			"<td class='text-center'><a class='btn btn-effect-ripple btn-sm btn-primary' href='batchvoucher/printvoucher/"+lastvoucher+"' target='_blank'><i class='fa fa-print'></i></a><a href='#' data-toggle='tooltip' title='Cancel Voucher' class='btn btn-effect-ripple btn-sm btn-danger' ><i class='fa fa-times'></i></a> </td></tr>");
		}
		});
	
	
	//var fulldvno = dvyear+"-"+fundcluster+"-"+dvmonth+"-"+dvnostart;
	dvnostart++;
	document.getElementById("dvnostart").value = dvnostart;
	
	setTimeout(function(){updatedvno();},1500);
}

function addfaculty(){
	
	//refresh
	//$('#example-datatable9').destroy();
	//document.getElementById("example-datatable9").destroy();
	//datatable9.destroy();
	//$('#facultyprofile').load(document.URL +  ' #facultyprofile');
	//reinitiate
	
	
	
}

function savehei(){
	//alert(instcode);
	
	var instcode = document.getElementById("instcode").value;
	var instname = document.getElementById("instname").value;
	
	
	if(instname!="" && instcode!==""){
		
		//check duplicate
		
		$.ajax({
		url: "heidirectory/checkduplicatehei",
		type: 'post',
		data: { instcode:instcode},
		success: function(response) {
			//var duplicate = parseInt(response);
			//alert(response);
			
			if(response==0){
				$.ajax({
				url: "heidirectory/savehei",
				type: 'post',
				data: { instcode:instcode,instname:instname},
				success: function(response) {
					
					window.location.href = "heidirectory/institution/"+instcode;
				}
				});
			}else{
				
				alert("Duplicate Institution Code");
			} 
		}
		});
		
		
		
	}else{
		
		alert("Code or Name must not be empty.");
	}
	
}

function deletehei(id){
	
	var r = confirm("Are your sure you want to delete this Record?");
    if (r == true) {
        //alert ("You pressed OK!");
		
		$.ajax({
                    url: 'heidirectory/deletehei',
                    type: 'post',
                    data: {heid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}



function saveformername(instcode){

	var former_name = document.getElementById("former_name").value;
	var former_year = document.getElementById("former_year").value;

	$.ajax({
		url: "../saveformername",
		type: 'post',
		data: {former_name: former_name, former_year: former_year, instcode:instcode},
		success: function(response) {
			console.log(response);
			
			window.location.reload();;

		}
	});
}


//startwidget();