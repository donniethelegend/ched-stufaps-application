function login(){

	
	var form = document.getElementById("printpdf");
  	var formData = new FormData(form);
	
	$.ajax({
							url: 'reprint/verify',
							type: 'post',
							data: formData,
							processData: false,
							contentType: false,
							success: function(response) {
								
								var data = JSON.parse(response);
								

								if (data.success==true){
									 $('#sweet_download').click();
									document.getElementById("printpdf").submit();
									
									//window.location.href = "http://www.w3schools.com";
									 /*
									 $('#sweet_html').click();
									//saveapplication
									
									console.log("true");
									$.ajax({
										url: 'stufpdf/index2',
										type: 'post',
										data: formData,
										processData: false,
										contentType: false,
										success: function(response) {
											//console.log(response);
											//document.getElementById("applicationid").value = response;

											 //$('#sweet_close').click();
											// window.setTimeout(function () { $(light).unblock(); }, 2000);
											//$(light).unblock();
										}
									});*/
									
									
								}
								else{
									//notify
									
									console.log("false");
									 $('#sweet_error').click();
									// $(light).unblock();
								}
								
							}
						});
	
}