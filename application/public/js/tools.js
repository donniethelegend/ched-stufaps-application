function uploadprofile(){
	
	var form = document.getElementById("form_uploadhei");


  //form.submit();

	
	//document.getElementById('form_uploadprofile').submit(function(){
	
			 var formData = new FormData(form);
			 //alert(formData);
			$.ajax({
				url: 'tools/uploadhei',
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					//alert(data)
					//location.reload();
					console.log(data);
				},
				cache: false,
				contentType: false,
				processData: false
			});
	
	
}

function changpass(){
	
	var form = document.getElementById("changepass_form");


  //form.submit();

	
	//document.getElementById('form_uploadprofile').submit(function(){
	
			 var formData = new FormData(form);
			 //alert(formData);
			$.ajax({
				url: 'change_pass',
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					//alert(data)
					//location.reload();
					console.log(data);
					if(data=="yes"){
						document.getElementById("changepassclose").click();
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Password Updated!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						document.getElementById("changepass_form").reset();
					}else{
						
						$.bootstrapGrowl('<h4><strong>Error!</strong></h4> <p>Incorrect Password!</p>', {
							type: 'danger',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
					}
					
				},
				cache: false,
				contentType: false,
				processData: false
			});
	
	
}