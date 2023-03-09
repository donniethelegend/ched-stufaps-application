<div class="content">
    <h3>
<?= "Welcome ".$_SESSION['name']?> 
        <br/>
   <?= "Application No. ".$_SESSION['applicantid']?>    
        
        
        
        
        
      </h3>   
 <script src="<?= base_url() ?>public/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    
 
 <?php echo form_open_multipart('myportal/uploadfiles');?>
    <form class="form-horizontal form-control"  method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="col">
                <input type="file" required name="upload[]" multiple="true" class="form-control" placeholder="Upload Other Documents Here"/>
        </div>
            <div class="col">
              
                                                                                    <div class="form-group">
												<select required="required" name="doctype" data-placeholder="Document Type" class="form-control required  " >
                                                                                                    <option disabled selected value=""> -----DOCUMENT TYPE------</option>
													<option value="Birth Certificate">Birth Certificate</option>
													<option value="Income Documents">Income Documents</option>
													<option value="Identification Card(ID)">Identification Card(ID)</option>
													<option value="Academic Requirements">Academic Requirements</option>
													<option value="Others">Others</option>
													

												</select>
											</div>
        </div>
        <div class="col">
     
        <button type="submit" class="btn btn-success">Upload</button> 
        
        </div>
        </div>
    </form>
    <link href="public/css/jquery.signature.css" rel="stylesheet">
<style>

    .kbw-signature { width: 430%; height: 300px; ;
}
    .kbw-signature>canvas {  border-style:solid;
}

</style>

   
    <script>
$(document).ready(function(){

    
   
    
    
    
    $('.js-signature').jqSignature({
        background: '#00000000',
        lineColor: '#0a0a08',
        width: 400,
        height: 200
    });
    
    
    
    
    

	$('#png').click(function() {
		console.log('dsdsd');
             $('#signaturecode').text($('.js-signature').jqSignature('getDataURL'));
        
           
                $('#submitmesig').submit()
                
	});
	$('#clear').click(function() {
		$('.js-signature').jqSignature('clearCanvas');
       
             $('#signaturecode').text("");
              
                
                
	});
});
</script>
    <div id="modal_signature" class="modal  " tabindex="-1" >
					<div class="modal-dialog modal-md">
                                            <form id="submitmesig" action="./myportal/addsignature" method="post" >
						<div class="modal-content">
							<div class="modal-header">
                                                            <h2>Draw your signature inside the box above the line.</h2>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>

							<div class="modal-body">
							
                                                            <div class="row">
                                                             <div class="col-sm-12">
                                                                <div style="position:absolute;width: 70%;border: solid 2px;top:60%; left: 6%"></div>
                                                               
                                                                    <div class='js-signature' class="col-sm-12"></div>
                                                                
                                                               
                                                                </div>
                                                                </div>
                                                            
                                                            <textarea  id="signaturecode" name="signaturecode" class="d-none"></textarea>
                                                        </div>

							<div class="modal-footer">
								<button type="button" id="clear" class="btn btn-link" >Clear</button>
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="button" id="png"  class="btn bg-primary">Save changes</button>
							</div>
						</div>
						</form>
					</div>
				</div>
    
    
    
 <div class="table-responsive">
     
							<table class="table table-hover">
								
								<tbody>
                                                                    
                                                                  	<tr>
									
										<td align="left">
                                                                                 
                                                                                    <?php if($application_details['picture22']){ ?>
                                                                                        <img  src="<?= $application_details['picture22'] ?>" width="100px"/>
                                                                                        <?php } else{ ?>
                                                                                        
                                                                                        
                                                                                        <span width="100px" height="100px" style="font-size:100pt; border: solid 1px; padding: 5px" class="icon-user"></span>
                                                                                        <?php }  ?>
                                                                                        <form class="form-horizontal form-group"
                                                                                            id="submitpic" action="./myportal/updateprofilepic" method="post" enctype="multipart/form-data">
                                                                                            <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                            <input type="file" accept="image/*" required name="profilepic" class="form-control"/>    
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                            <button class="btn btn-primary" type="submit">Upload</button>
                                                                                            </div>
                                                                                            </div>
                                                                                            
                                                                                            
                                                                                            
                                                                                        </form>
                                                                               
                                                                                    <br/>
                                                                                 
                                                                                 
                                                                                        <?php if($application_details['signature']){ ?>
                                                                                    <a target="_blank" download href="<?= $application_details['signature'] ?>" class="btn btn-link btn-md " style="background-color: whitesmoke"><img  src="<?= $application_details['signature'] ?>" width="100px"/> </a>
                                                                                        <?php }
                                                                                        else{
                                                                                            echo "<label>No Signature Attached</label>";
                                                                                            
                                                                                        }?>
                                                                                          <br/>
                                                                                        
                                                                                          <button type="button" data-toggle="modal" data-target="#modal_signature" class="btn btn-link"> <span class="icon-quill4" ></span> Update Signature </button> 
                                                                                  
                                                                                </td>
										<td>
                                                                                    
                                                                                    
                                                                                    <table class="table requirements">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th> Primary Requirement</th>
                                                                                            <th> Action</th>
                                                                                            
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>Application Form</td>
                                                                                                <td>
                                                                                                    <a target="_blank"  href="./stufpdf/reprint/<?= $application_details['applicantid']?>/<?=$application_details['contactno']?>" class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Birth Certificate</td>
                                                                                                <td>
                                                                                                   
                                                                                                      <?php if($application_details['birth_certificate']){ ?>
                                                                                                        <a target="_blank" download href="<?= $application_details['birth_certificate'] ?>" class="btn btn-xs"><span class="icon-file-download2"></span> </a>

                                                                                                         <?php }
                                                                                                         else{
                                                                                                             ?>
                                                                                                        
                                                                                                        <form class="form-horizontal form-group submitupdate"
                                                                                                        action="./myportal/uploadupdate?field=birth_certificate" 
                                                                                                        method="post" enctype="multipart/form-data">
                                                                                                            <div class="row">
                                                                                                            
                                                                                                              
                                                                                                        <input required type="file"  name="filetoupdate" id="filetoup1"/>
                                                                                                        
                                                                                                     
                                                                                                             
                                                                                                        </div>
                                                                                                        </form>
                                                                                                        
                                                                                                        <?php 

                                                                                                         }
                                                                                                            ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                             <?php if($application_details['app_pwd']=="Yes"){ ?>
                                                                                            <tr>
                                                                                                <td>PWD ID/Document</td>
                                                                                                <td>
                                                                                                   
                                                                                                    <?php if($application_details['pwd_id']){ ?>
                                                                                                    <a target="_blank" download href="<?= $application_details['pwd_id'] ?>"  class="btn btn-xs"> <span class="icon-file-download2"></span></a>
                                                                                                        <br/>
                                                                                                    <?php }
                                                                                                    else{
                                                                                                        echo     ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                             <?php }?>
                                                                                        
                                                                                            <tr>
                                                                                                <td>Income Requirement</td>
                                                                                                <td>
                                                                                                   
                                                                                                     <?php if($application_details['income_requirement']){ ?>
                                                                                    <a target="_blank" download href="<?= $application_details['income_requirement'] ?>"  class="btn btn-xs"> <span class="icon-file-download2"></span> </a>
                                                                                   
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        
                                                                                            
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                    
                                                                                    
                                                                                    
                                                                                
                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                     <table class="table requirements">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th> Academic Requirement</th>
                                                                                            <th> Front Copy</th>
                                                                                            <th> Rear Copy</th>
                                                                                            
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            
                                                                                            <tr>
                                                                                                <td>
                                                                                                    Grade 11 Record/s 
                                                                                                </td>
                                                                                                <td>
                                                                                                  
                                                                                                     <?php if($application_details['academic_requirement_g11_front']){ ?>
                                                                                    <a target="_blank" download href="<?= $application_details['academic_requirement_g11_front'] ?>"  class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                    
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                     ?>
                                                                                     </td>
                                                                                     <td>
                                                                                     <?php
                                                                                       if($application_details['academic_requirement_g11_back']){ ?>
                                                                                    <a target="_blank" download href="<?= $application_details['academic_requirement_g11_back'] ?>"  class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                    
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                                  ?>  
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                </td>
                                                                                            </tr>
                                                                                         
                                                                                            <tr>
                                                                                                <td>
                                                                                                    Grade 12 Record 
                                                                                                </td>
                                                                                                <td>
                                                                                                    <?php 
                                                                                                if($application_details['academic_requirement_g12_front']){ ?>
                                                                                    <a target="_blank" download href="<?= $application_details['academic_requirement_g12_front'] ?>"  class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                    
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                     ?>
                                                                                    
                                                                                                </td>
                                                                                                <td>
                                                                                     <?php
                                                                                      if($application_details['academic_requirement_g12_back']){ ?>
                                                                                   <a target="_blank" download href="<?= $application_details['academic_requirement_g12_back'] ?>"  class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                    
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                     ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    Other (ALS/PEPT)
                                                                                                </td>
                                                                                                <td colspan="2">
                                                                                                     <?php
                                                                                     
                                                                                       if($application_details['academic_requirement_others']){ ?>
                                                                                   <a target="_blank" download href="<?= $application_details['academic_requirement_others'] ?>"  class="btn btn-xs"><span class="icon-file-download2"></span> </a>
                                                                                    
                                                                                     <?php }
                                                                                     else{
                                                                                         echo ' <a  class="btn btn-xs"><span class="icon-file-upload2"></span> </a>';
                                                                                         
                                                                                     }
                                                                                     ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                     </table>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                   
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                </td>
									
									</tr>
                                                                  	
                                                                  	
                                                                        
                                                                  
                                                                      
                                                                  	
                                                                        <?php 
                                                                        
                                                                       
                                                                        if($otherfiles){
                                                                            echo '<tr>
										
										<td><b><h3>Other Files Uploaded</h3></b></td>
                                                                                <td><td>
									
									</tr>';
                                                                        foreach($otherfiles as $file){
                                                                            echo '
                                                                                	<tr>
										
										<td>'.$file['filename'].'</td>
                                                                                <td><div class="btn-group">
                                                                                          <a target="_blank" download href="'. $file['filepath'].'" class="btn btn-xs">Download</a>
                                                                                    
                                                                                    </div><td>
									
									</tr>
                                                                            ';
                                                                            
                                                                        }
                                                                        }
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        ?>
								
								</tbody>
							</table>
						</div>				
    
    
    
</div>