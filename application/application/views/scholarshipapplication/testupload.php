<div class="content">
   
    <script type="text/javascript">
                                   
                                        
                                
                                    
                                    
                                $(document).ready(()=>{
                                      
                                    $('#apppwd').change(function(){
                                        if($(this).val()=="Yes"){
                                            $('[name="PWD_id"]').addClass('required')
                                            $('[name="PWD_id"]').attr('required',true)
                                            $('[name="disability"]').addClass('required')
                                            $('[name="disability"]').attr('required',true)
                                        }
                                        else{
                                            $('[name="PWD_id"]').removeClass('required')
                                            $('[name="PWD_id"]').removeAttr('required')
                                            $('[name="disability"]').removeClass('required')
                                            $('[name="disability"]').removeAttr('required')
                                            
                                        }
                                    })
                                    
                                });
                                
                                    
                                    
                                $(document).ready(()=>{
      $('#photo').change(function(){
        const file = this.files[0];

   
        
        
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
            $("div.holder").removeClass("d-none")
          }
          
          reader.readAsDataURL(file);
        }
      });

      
      
    });
                                </script>
                                  <style>
                                    
                                       
            .holder {
                height: 150px;
                width: 150px;
                border: 1px solid black;
            }
            img#imgPreview {
                max-width: 150px;
                max-height: 150px;
                min-width: 150px;
                min-height: 150px;
            }
         
            .heading {
                font-family: Montserrat;
                font-size: 45px;
                color: green;
            }
        </style>
        

<?php echo form_open_multipart('home/testmakedir');?>
        <form class="form-control"  method="post" enctype="multipart/form-data" >
			
                                                    <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <h4>Citizenship Requirement:</h4>
                                                        </div>
							<div class="row">
							
									<div class="form-group">
                                                                             <div class="holder d-none">
                                                                                    <img id="imgPreview" src="#" alt="pic" />
                                                                                </div>
										<label>Upload 2x2 Picture: <span class="text-danger">*</span></label>
                                                                                <input type="file" accept="application/pdf, image/png,image/jpeg " name="photograph"
                                                                                id="photo" required="true" class="form-control"/>
												
		                               
                                                                        </div>
								
								</div>
							<div class="row">
								
									<div class="form-group">
										<label>Birth Certificate: <span class="text-danger">*</span></label>
                                                                                <input type="file" name="birthcertificate" accept="application/pdf, image/png,image/jpeg " required="true" class="form-control required"/>
												
		                               
                                                                        </div>
								
								</div>
                                                        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <h4>Academic Requirement:</h4>
                                                        </div>
							<div class="row">
								
									<div class="form-group">
                                                                            <label>For Incoming First Year Students </small>: <span class="text-danger">*</span>
                                                                            <br/><small><i>Grade 11 grades and first three grading periods of Grade 12 grades duly certified by the school’s registrar; <br/> Grade 12, Form 138 duly certified by the school’s registrar</i></small>
                                                                            </label>
                                                                               
									
							<br/>
                                                                            <label>For Applicants with Earned Units in College </small>: <span class="text-danger">*</span>
                                                                            <br/><small><i>Certificate of grades in all subjects in completed semester (at least two latest semester)</i></small>
                                                                            </label>
                                                                                <br/>
												
		                               
							
                                                                            <label>For other Applicants </small>: <span class="text-danger">*</span>
                                                                            <br/><small><i>ALS – Accreditation and Equivalency Test Passer Certificate<br/>PEPT – Certificate of Advancing to the Next Level</i>
                                                                            </small>
                                                                            </label>
                                                                                <input type="file" name="acad_requirement" accept="application/pdf, image/png,image/jpeg " required="true" class="form-control required"/>
												
		                               
                                                                        </div>
							
								</div>
                                                        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        
                                                           <div class="row">
								
									<div class="form-group">
                                                                            <label><h4>Income Requirement<small>(any of the following) </small>:<span class="text-danger">*</span></h4>  
                                                                            <small>
                                                                                <i>
                                                                                    Latest Income Tax Return (ITR) of Parents or Guardian (Photocopy Only)<br/>
                                                                                 Certificate of Tax Exemption from the BIR<br/>
                                                                                Certificate of Indigency from their barangay (Parents)<br/>
                                                                                Case Study Report from DSWD<br/>
                                                                                Latest copy of contract of income may be considered for children of Overseas Filipino Workers (OFW) and seafarers.</i>
                                                                            </small>
                                                                            </label>
                                                                                <input type="file" name="income_req" accept="application/pdf, image/png,image/jpeg " required="true" class="form-control required"/>
												
		                               
                                                                        </div>
								
								</div>
                                                    </div>
                                                    	 <div class="col-md-2">
									<div class="form-group">
										<label>PWD Card:<span class="text-danger">*</span></label>
                                                                            <input type="file" accept="application/pdf, image/png,image/jpeg " name="PWD_id"  class="form-control " />
                                                                        </div>
								</div>
							
                                                    </div>	
                                            	
    <button class="btn btn-success"><!-- comment -->                                 Submit </button>
</form>      
</div>