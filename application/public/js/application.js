

function tmp_print(){
	document.getElementById("printpdf").submit();
}

function fillupcong(){
	

		var url_loc = "home/getcong";

	var congid = document.getElementById("towncity_select").value;

	$.ajax({
                    url: url_loc,
                    type: 'post',
                    data: {congid: congid},
                    success: function(response) {
						
						var data = JSON.parse(response);

						document.getElementById("towncityname").value = data.citymunicipality;
						document.getElementById("province").value = data.cong_province;
						document.getElementById("congressionaldistrict").value = data.cong_district;
						document.getElementById("zipcode").value = data.congzip;

                    }
                });
}
function filluptowncity(){
	
	
	var url_loc = "home/gettowncity";

	var zid = document.getElementById("pr_towncity").value;

	$.ajax({
                    url: url_loc,
                    type: 'post',
                    data: {zid: zid},
                    success: function(response) {

						var data = JSON.parse(response);
						
						document.getElementById("pr_towncityname").value = data.ztowncity;
						document.getElementById("pr_province").value = data.zprovince;
						document.getElementById("pr_zip_code").value = data.zzipcode;

                    }
                });
}

function fillupheidetails(){

	var url_loc = "home/getheidetails";

	var heicode = document.getElementById("heicode").value;
	$.ajax({
                    url: url_loc,
                    type: 'post',
                    data: {heicode: heicode},
                    success: function(response) {
						var data = JSON.parse(response);
						document.getElementById("heiname").value = data.heiname;
                    }
                });
}

function applicant_checkduplicate(){
	
	var form = document.getElementById("application_form");
	var formData = new FormData(form);


	$.ajax({
					url: 'home/applicant_checkduplicate',
					type: 'post',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						var data = JSON.parse(response);
						if(data>0){
							$('#sweet_error_duplicate').click();
							return false;
							alert(data);
						}else{
							alert(data);
							alert("no duplicate");
						}

					}
				});
}

$( document ).ready(function() {
    $('#notice_html').click();
});