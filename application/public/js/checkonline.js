function reloadtable(){
	//alert("test");
	$( "#reloadtable" ).trigger( "click" );	
	$('#resultbody').load(document.URL +  ' #resultbody');
	
	var form = document.getElementById("searchnameform");
  
	var formData = new FormData(form);
			 
			 //console.log(formData);
			$.ajax({
				url: 'home/checkstatus/',
				type: 'post',
				data: formData,
				async: false,
				success: function (response) {
					var data = JSON.parse(response);
					console.log(data);
					
					//multiple rows
					var new_data;
					for(var ctr=0;ctr<data.length; ctr++){
						
						if(data[ctr].checkstatus == "AVAILABLE"){
							var statusstyle = "<span class='badge bg-success-400'>AVAILABLE</span>";
						}
						if(data[ctr].checkstatus == "STALED"){
							var statusstyle = "<span class='badge bg-danger'>STALED</span>";
						}
						if(data[ctr].checkstatus == "DUPLICATE"){
							var statusstyle = "<span class='badge bg-grey-400'>DUPLICATE</span>";
						}
						if(data[ctr].checkstatus == "RELEASED"){
							var statusstyle = "<span class='badge bg-blue'>RELEASED</span>";
						}
						
						
						 new_data += '<tr><td class="hidden-xs text-center " >'+data[ctr].complete_name+'</td><td>'+data[ctr].checkdate+'</td><td><strong>'+statusstyle+'</strong></td><td><strong>'+data[ctr].released+'</strong></td><td>'+data[ctr].hei_name+'</td><td class="center">'+data[ctr].awardnumber+'</td><td class="center">'+data[ctr].semester+'</td><td class="center">'+data[ctr].school_year+'</td></tr>';
					}
				
					
				
				
					
					
					
					
					
					
					
					
					
			
			setTimeout(function(){
								
								$('#resultbody').prepend(new_data);
								
							},1000);
							
							
			//$("#paymentoptiontr"+data.paymentoptionId).css('color','white');
			//console.log(new_data);
					
					
					
					
					
					
					
					//if(data=="No File Uploaded"){
						
						//setTimeout(function(){location.reload();},100);
					//}else{
						/*
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
							*/
					//}
					
				},
				cache: false,
				contentType: false,
				processData: false
			});
	//alert("test");
	
	/*
	var bank = $('#bank').val();
	var accountName = $('#accountName').val();
	var accountNo = $('#accountNo').val();
	
	$.ajax({
		url: 'home/checkstatus',
		type: 'post',
		data: {},
		success: function(response) {
			var data = JSON.parse(response);
			//$('#paymentoptionForm').trigger('reset');
			new Noty({
                text: 'New payment option added!',
                type: 'success'
            }).show();


            var new_data = '<tr id="paymentoptiontr'+data.paymentoptionId+'" class="bg-teal-700"><td class="hidden-xs text-center " style="width: 30px;"><i class="text-white">'+data.paymentoptionId+'</i></td><td><h4><a href="javascript:void(0)" class="text-white">'+bank+'</a></h4></td><td><h4><a href="javascript:void(0)" class="text-white"><strong>'+accountName+'</strong></a></h4></td><td><span class="text-white">'+accountNo+'</span></td><td hidden></td><td class="center" style="width: 15%;"><button class="btn btn-outline bg-pink-400 border-pink-400 text-pink-800 btn-icon rounded-round" title="Edit record" onclick="editpaymentoption('+data.paymentoptionId+')"><i class="icon-pencil5"></i></button> <button class="btn btn-outline bg-pink-400 border-pink-400 text-pink-800 btn-icon rounded-round" title="Delete Record" id="notification" onclick="deletepaymentoption('+data.paymentoptionId+')"><i class="icon-x"></i></button></td><td hidden></td></tr>';
			$('#paymentoptionBody').prepend(new_data);
			$("#paymentoptiontr"+data.paymentoptionId).css('color','white');
			console.log(new_data);
			
		}
	}); */
}
	