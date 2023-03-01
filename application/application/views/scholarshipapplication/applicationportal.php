<div class="content">
    <h3>
<?= "Welcome ".$_SESSION['name']?> 
        <br/>
   <?= "Application No. ".$_SESSION['applicantid']?>    
        
        
        
        
        
      </h3>   
    
 <?php echo form_open_multipart('myportal/uploadfiles');?>
    <form class="form-horizontal form-control"  method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="col">
                <input type="file" required name="upload[]" multiple="true" class="form-control" placeholder="Upload Other Documents Here"/>
        </div>
        <div class="col">
     
        <button type="submit" class="btn btn-success">Upload</button> 
        <button type="button" data-toggle="modal" data-target="#modal_signature" class="btn btn-primary">Add/Update Signature</button> 
        </div>
        </div>
    </form>
    <link href="public/css/jquery.signature.css" rel="stylesheet">
<style>

    .kbw-signature { width: 1200%; height: 500px; ;
}
    .kbw-signature>canvas {  border-style:solid;
}

</style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?= base_url()?>public/js/forsignature/jquery.signature.js"></script>
<script src="<?= base_url()?>public/js/forsignature/jquery.ui.touch-punch.min.js"></script>


   
    <script>
$(function() {
	var sig = $('#sig').signature({background:"#00000000", thickness: 6,
            guideline: false, // Add a guide line or not? 
    guidelineColor: '#ud93nn', // Guide line colour 
    guidelineOffset: 150, // Guide line offset from the bottom 
    guidelineIndent: 10 // Guide line indent from the edges
     });
        
	$('#disable').click(function() {
		var disable = $(this).text() === 'Disable';
		$(this).text(disable ? 'Enable' : 'Disable');
		sig.signature(disable ? 'disable' : 'enable');
	});

	$('#png').click(function() {
		
             $('#signaturecode').text(sig.signature('toDataURL'));
             
             $(this).parents('form').submit();
                
                
	});
	$('#clear').click(function() {
		
             $('#signaturecode').text(sig.signature('clear'));
             
       
                
                
	});
});
</script>
    <div id="modal_signature" class="modal  " tabindex="-1" >
					<div class="modal-dialog modal-full">
                                            <form action="./myportal/addsignature" method="post" >
						<div class="modal-content">
							<div class="modal-header">
								
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>

							<div class="modal-body">
							
                                                            <div class="row">
                                                                <div style="position:absolute;width: 65%;border: solid 2px;top:60%; left: 2%"></div>
                                                                <div id="sig" class="col-sm-9" >
                                                                    
                                                                </div>
                                                                <div class="col-sm-3" >
                                                                  <h5 class="modal-title">Draw your signature inside the box above the line.</h5>
                                                                </div>
                                                                </div>
                                                            
                                                            <textarea  id="signaturecode" name="signaturecode" class="d-none"></textarea>
                                                        </div>

							<div class="modal-footer">
								<button type="button" id="clear" class="btn btn-link" >Clear</button>
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="button" id="png" class="btn bg-primary">Save changes</button>
							</div>
						</div>
						</form>
					</div>
				</div>
    
    
    

 <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
									
										<th>Filename</th>
										<th>Action</th>
									
									</tr>
								</thead>
								<tbody>
                                                                    
                                                                  	<tr>
									
										<td>2 x 2 Picture</td>
                                                                                <td><div class="btn-group">
                                                                                        <a target="_blank" download href="<?= $application_details['picture22'] ?>" class="btn btn-xs">Download</a>
                                                                                        
                                                                                    </div><td>
									
									</tr>
                                                                  	<tr>
										
										<td>Birth Certificate</td>
                                                                                <td><div class="btn-group">
                                                                                         <a target="_blank" download href="<?= $application_details['birth_certificate'] ?>" class="btn btn-xs">Download</a>
                                                                                       
                                                                                    </div><td>
									
									</tr>
                                                                  	<tr>
										
										<td>Academic Requirement</td>
                                                                                <td><div class="btn-group">
                                                                                          <a target="_blank" download href="<?= $application_details['academic_requirement'] ?>"  class="btn btn-xs">Download</a>
                                                                                    
                                                                                    </div><td>
									
									</tr>
                                                                  	<tr>
										
										<td>Income Requirement</td>
                                                                                <td><div class="btn-group">
                                                                                        <a target="_blank" download href="<?= $application_details['income_requirement'] ?>"  class="btn btn-xs">Download</a>
                                                                                    
                                                                                    </div><td>
									
									</tr>
                                                                  	<tr>
										
										<td>PWD ID</td>
                                                                                <td><div class="btn-group">
                                                                                        <a target="_blank" download href="<?= $application_details['pwd_id'] ?>"  class="btn btn-xs">Download</a>
                                                                                       
                                                                                    </div><td>
									
                                                                        </tr>
                                                                        <?php if($application_details['signature']){ ?>
                                                                  	<tr>
										
										<td>Signature</td>
                                                                                <td><div class="btn-group">
                                                                                          <a target="_blank" download href="<?= $application_details['signature'] ?>" class="btn btn-xs">Download</a>
                                                                                    
                                                                                    </div><td>
									
									</tr>
                                                                        <?php }
                                                                        
                                                                        
                                                                        foreach($otherfiles as $file){
                                                                            echo '
                                                                                	<tr>
										
										<td>'.$file['filename'].'</td>
                                                                                <td><div class="btn-group">
                                                                                          <a target="_blank" download href="'.$file['filepath'].'" class="btn btn-xs">Download</a>
                                                                                    
                                                                                    </div><td>
									
									</tr>
                                                                            ';
                                                                            
                                                                        }
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        ?>
								
								</tbody>
							</table>
						</div>				
    
    
    
</div>