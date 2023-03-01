function deletevoucher(voucherid,scholarid){
	//alert(accountid);
	
	var r = confirm("Are your sure you want to delete this voucher?");
    if (r == true) {
        //alert ("You pressed OK!");
		 var person = prompt("Please enter Administrator Password");
    
		if (person =='superadmin') {
			$.ajax({
                    url: 'voucherlist/deletevoucher/'+voucherid+'/'+scholarid,
                    type: 'post',
                    //data: {accountid: accountid},
                    success: function(response) {
						console.log(response);
						location.reload();
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