<style>
html {
  scroll-behavior: smooth;
}
</style>
				<!-- Content area -->
				<div class="content">

					
<!-- Form layouts -->



<div class="row">

<!-- Basic card -->
	<div class="col-md-12">
					<div class="card">
					<div class="card-header bg-white header-elements-inline">
						<h1 class="card-title">CHED RO1 SCHOLARSHIP PROGRAM (CSP) ONLINE APPLICATION</h1>
						
					</div>
					
						

						<div class="card-body">
						<h6 class="font-weight-semibold">How to Apply?</h6>
							<p>
							<!-- <b>CHED StuFAPs Application Dates: March 1, 2020 to May 31, 2020</b> -->
								<ol>
									<li>Accomplish the  <a href="#filloutform">CHED RO1 SCHOLARSHIP PROGRAM (CSP) Online Application Form</a> (https://stufaps.chedro1.com/application)</li>
										<ul>
											<li>SMS confirmation will be sent to your mobile number provided on the form.</li>
											
										</ul>
									<li>Print your accomplished application form.</li>
									<li>Email your <a href="https://bit.ly/chedro1CSP">Documentary Requirements</a> (https://bit.ly/chedro1CSP) including your Application Form to chedro1stufaps@ched.gov.ph.</li>
										
									
									<i>Note: The Application process is completed only after the documentary requirements are validated. All applications will be subjected to the ranking process in accordance with CHED Guidelines.</i>
								</ol>
							
							<h3>DOCUMENTARY REQUIREMENTS</h3>
									<ul>
											<!--<li>Personally hand-carried to CHED RO 1 Office</li>-->
											<li>Citizenship: Certified true copy of Birth Certificate</li>
											<li>Academic Requirements:
											    <ul>
											        <li>Grade 12 Report Card (Freshmen)</li>
											        <li>Latest Semester Grades (With earned units)</li>
											    </ul>
											
											</li>
											<li>Income Requirements - whichever is applicable:
											    <ul>
											        <li>Latest Income Tax Return of parent/s or guardian;</li>

<li>Certificate of Tax Exemption from the BIR of parents/guardian, if not employed;</li>

<li>Certificate of Indigence either from the Barangay or DSWD; </li>

<li>Case Study from the Department of Social Welfare and Development; or </li>

<li>Latest copy of contract or proof of income, for the children of Overseas Filipino Workers and seafarers.							
</li>
											        
											    </ul>
											</li>
											
											<li>Identification Card (ID) - SPECIAL GROUP (Unprivileged or Homeless, PWD, Solo Parent, Senior Citizen, Indigenous People)</li>
											
										
										</ul>
										
										
										<i>Note: Note: The Application process is completed only after the documentary requirements are validated. All applications will be subjected to the ranking process in accordance with CHED Guidelines.</i>
							</p>
							<h5 class="font-weight-semibold">CHED RO 1 StuFAPs Unit reserves the right to validate the authenticity of all information provided in the Application Form as well as the completeness of all Documentary Requirements submitted.</h5>
							
							<h6 class="font-weight-semibold">Contact Us:</h6>
							<p class="mb-3">Tel. Nos. (072) 682-9623; (072) 242-0238; (072) 242-2750
							<br>StuFAPs Unit Contact No.
							<br>Smart: 0998-2402525
							<br>Globe: 0977-6961695
							
							<br>
							Email: chedro1stufaps@ched.gov.ph
							</p>

							<button type="button" class="btn btn-light" id="sweet_error_duplicate" style="visibility:hidden;"></button>
							<button type="button" class="btn btn-light" id="sweet_error" style="visibility:hidden;"></button>
							<button type="button" class="btn btn-light" id="sweet_close" style="visibility:hidden;"></button>
							<button type="button" class="btn btn-light" id="sweet_html" style="visibility:hidden;"></button>
							<button type="button" class="btn btn-light" id="notice_html" style="visibility:hidden;"></button>
							
							

							
						</div>
					</div>
					<!-- /basic card -->
		</div>
</div>
		
		
		

					<div class="row" id="filloutform">
						

						<!-- Wizard with validation -->
	            <div class="card">
				<button  type="button" class="btn btn-light" id="spinner-light" style="display:none;"></button>
							
					<div class="card-header bg-white header-elements-inline">
						<h4 class="card-title"><b>CHEd Student Financial Assistance Programs (StuFAPs) Application Form</b></h4>
						<br><h6><i>Please read the General and Documentary Requirements. Fill in all the required information. Do not leave an item blank. If item is not applicable, indicate "NA".</i>
						</h6>
						<br>
					
						<div class="header-elements">
							
	                	</div>
					</div>
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
                               
                	<form class="wizard-form steps-validation" action="#" enctype="multipart/form-data" name="application_form" id="application_form" data-fouc>
			
                            <h6>Documentary Requirements</h6>
						<fieldset>
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
                                                                                <input type="file" accept="image/png,image/jpeg " name="photograph"
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
                                                    	
							
                                                    </div>	
                                             
                                                     
                                                        
                                              
								
								
						</fieldset>			
                            <h6>Personal Information</h6>
						<fieldset>
						<div class="row">
						<div class="col-md-12">
									<label>Name: <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" id="lname" name="lname" class="form-control text-capitalize required" placeholder="Last Name">
											</div>
										</div>
										<div class="col-md-1">
											<div class="form-group">
												<select name="extension" data-placeholder="Extension" class="form-control form-control-select2" data-fouc>
													<option></option>
													<option value="Jr.">Jr.</option>
													<option value="II">II</option>
													<option value="III">III</option>
													<option value="IV">IV</option>
													<option value="V">V</option>

												</select>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<input type="text" name="fname" class="form-control text-capitalize required" placeholder="First Name">
											</div>
										</div>

										<div class="col-md-2">
											<div class="form-group">
												<input type="text" name="mname" class="form-control text-capitalize" placeholder="Middle Name">
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" name="maiden_name" class="form-control text-capitalize" placeholder="Maiden Name (for Married Women): ">
											</div>
										</div>
									</div>
								</div>
						</div> <!-- end row-->
						
						<div class="row">
							<div class="col-md-6">
									<label>Date of birth:</label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-month" data-placeholder="Month" class="form-control form-control-select2 required" data-fouc>
													<option></option>
													<option value="01">January</option>
													<option value="02">February</option>
													<option value="03">March</option>
													<option value="04">April</option>
													<option value="05">May</option>
													<option value="06">June</option>
													<option value="07">July</option>
													<option value="08">August</option>
													<option value="09">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-day" data-placeholder="Day" class="form-control form-control-select2 required" data-fouc>
													<option></option>
													<option value="01">1</option>
													<option value="02">2</option>
													<option value="03">3</option>
													<option value="04">4</option>
													<option value="05">5</option>
													<option value="06">6</option>
													<option value="07">7</option>
													<option value="08">8</option>
													<option value="09">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-year" data-placeholder="Year" class="form-control form-control-select2 required" data-fouc>
													<option></option>
													<option value="2005">2005</option>
													<option value="2004">2004</option>
													<option value="2003">2003</option>
													<option value="2002">2002</option>
													<option value="2001">2001</option>
													<option value="2000">2000</option>
													<option value="1990">1999</option>
													<option value="1998">1998</option>
													<option value="1997">1997</option>
													<option value="1996">1996</option>
													<option value="1995">1995</option>
													<option value="1994">1994</option>
													<option value="1993">1993</option>
													<option value="1992">1992</option>
													<option value="1991">1991</option>
													<option value="1990">1990</option>
													<option value="1989">1989</option>
													
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Place of Birth: <span class="text-danger">*</span></label>
										<input type="text" name="placeofbirth" class="form-control required" placeholder="">
									</div>
								</div>
							
						</div> <!-- end row-->
						<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Sex: <span class="text-danger">*</span></label>
										<select name="gender" data-placeholder="Select Sex" class="form-control form-control-select2 required" data-fouc>
											
												<option></option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Civil Status: <span class="text-danger">*</span></label>
										<select name="civil_status" data-placeholder="Select status" class="form-control form-control-select2 required" data-fouc>
											
												<option></option>
												<option value="Single">Single</option>
												<option value="Married">Married</option>
												<option value="Annulled">Annulled</option>
												<option value="Widowed">Widowed</option>
												<option value="Separated">Separated</option>
												<option value="Others">Others</option>
												
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Citizenship: <span class="text-danger">*</span></label>
										<input type="text" name="citizenship" class="form-control required" placeholder="" value="FILIPINO">
									</div>
								</div>
								

								
							</div> <!-- end row -->
						<div class="row">
						
								<div class="col-md-2">
									<div class="form-group">
										<label>Mobile Number:<span class="text-danger">*</span> </label>
										<select name="mobile_prefix" id="mobile_prefix" class="form-control select-search required" data-fouc data-placeholder="Prefix">
										<option></option>
										
											<option value="63813">0813</option>
	<option value="63817">0817</option>
	<option value="63901">0901</option>
	<option value="63902">0902</option>
	<option value="63903">0903</option>
	<option value="63904">0904</option>
	<option value="63905">0905</option>
	<option value="63906">0906</option>
	<option value="63907">0907</option>
	<option value="63908">0908</option>
	<option value="63909">0909</option>
	<option value="63910">0910</option>
	<option value="63911">0911</option>
	<option value="63912">0912</option>
	<option value="63913">0913</option>
	<option value="63914">0914</option>
	<option value="63915">0915</option>
	<option value="63916">0916</option>
	<option value="63917">0917</option>
	<option value="63918">0918</option>
	<option value="63919">0919</option>
	<option value="63920">0920</option>
	<option value="63921">0921</option>
	<option value="63922">0922</option>
	<option value="63923">0923</option>
	<option value="63924">0924</option>
	<option value="63925">0925</option>
	<option value="63926">0926</option>
	<option value="63927">0927</option>
	<option value="63928">0928</option>
	<option value="63929">0929</option>
	<option value="63930">0930</option>
	<option value="63931">0931</option>
	<option value="63932">0932</option>
	<option value="63933">0933</option>
	<option value="63934">0934</option>
	<option value="63935">0935</option>
	<option value="63936">0936</option>
	<option value="63937">0937</option>
	<option value="63938">0938</option>
	<option value="63939">0939</option>
	<option value="63940">0940</option>
	<option value="63941">0941</option>
	<option value="63942">0942</option>
	<option value="63943">0943</option>
	<option value="63944">0944</option>
	<option value="63945">0945</option>
	<option value="63946">0946</option>
	<option value="63947">0947</option>
	<option value="63948">0948</option>
	<option value="63949">0949</option>
	<option value="63950">0950</option>
	<option value="63951">0951</option>
	<option value="63953">0953</option>
	<option value="63954">0954</option>
	<option value="63955">0955</option>
	<option value="63956">0956</option>
	<option value="63957">0957</option>
	<option value="63958">0958</option>
	<option value="63959">0959</option>
	<option value="63960">0960</option>
	<option value="63961">0961</option>
	<option value="63962">0962</option>
	<option value="63963">0963</option>
	<option value="63964">0964</option>
	<option value="63965">0965</option>
	<option value="63966">0966</option>
	<option value="63967">0967</option>
	<option value="63969">0969</option>
	<option value="63970">0970</option>
	<option value="63971">0971</option>
	<option value="63973">0973</option>
	<option value="63974">0974</option>
	<option value="63975">0975</option>
	<option value="63976">0976</option>
	<option value="63977">0977</option>
	<option value="63978">0978</option>
	<option value="63979">0979</option>
	<option value="63980">0980</option>
	<option value="63981">0981</option>
	<option value="63982">0982</option>
	<option value="63983">0983</option>
	<option value="63987">0987</option>
	<option value="63988">0988</option>
	<option value="63989">0989</option>
	<option value="63990">0990</option>
	<option value="63991">0991</option>
	<option value="63992">0992</option>
	<option value="63993">0993</option>
	<option value="63994">0994</option>
	<option value="63995">0995</option>
	<option value="63996">0996</option>
	<option value="63997">0997</option>
	<option value="63998">0998</option>
	<option value="63999">0999</option>
									
									</select>
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label><span class="text-danger">*</span> </label>
										<input type="text" name="mobile_number" id="mobile_number" class="form-control required" placeholder="*******" data-mask="9999999" maxlength="7"> 
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email: </label>
										<input type="text" name="email" class="form-control" placeholder="">
									</div>
								</div>
								

								
							</div> <!-- end row -->	
							
						<div class="row">
							<div class="col-md-3">
								
								<div class="form-group">
										<label>Permanent Address: <span class="text-danger">*</span></label>
										<input type="text" name="barangay" class="form-control required text-capitalize" placeholder="Barangay">
								</div>
								
							</div>
							<div class="col-md-3">
								
								<div class="form-group">
										<label> <span class="text-danger">*</span></label>
										
										<select  name="towncity"  class="required form-control select-search"  id="towncity_select"  class="form-control required" style="width: 100%;" data-placeholder="City/Municipality" onchange="fillupcong()">
										
									<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<?php
										foreach ($city_municipality as $citymun):
										
										
										echo "<option value='".$citymun['congid']."'>".$citymun['citymunicipality'].", ".$citymun['cong_province']."</option>";
										
										endforeach;
										?>
													
													
                                                </select>
										
										 <input type="text" class="form-control " id="towncityname" name="towncityname"  style="display:none;">
								</div>
								
							</div>
							<div class="col-md-3">
								
								<div class="form-group">
										<label> <span class="text-danger">*</span></label>
										<input type="text" name="province" id="province" class="form-control required" placeholder="Province" readonly>
								</div>
								
							</div>
								
							<div class="col-md-3">
								<div class="form-group">
										<label>Zip Code: <span class="text-danger">*</span></label>
										<input type="text" name="zipcode" id="zipcode" class="form-control required" placeholder="" readonly>
									</div>
							</div>
							
							<input type="text" id="congressionaldistrict" name="congressionaldistrict"  style="display:none;">
															
								
						</div>	
						
						<div class="row">
							<div class="col-md-3">
								
								<div class="form-group">
										<label>Present Address: <span class="text-danger">*</span></label>
										<input type="text" name="pr_barangay" class="form-control required text-capitalize" placeholder="Barangay">
								</div>
								
							</div>
							<div class="col-md-3">
								
								<div class="form-group">
										<label> <span class="text-danger">*</span></label>
										<select  name="pr_towncity"  class="form-control select-search"  id="pr_towncity"  class="form-control required" style="width: 100%;" data-placeholder="City/Municipality" onchange="filluptowncity()">
										
									<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<?php
										foreach ($city_municipality_present as $city_present):
										
										
										echo "<option value='".$city_present['zid']."'>".$city_present['ztowncity'].", ".strtoupper($city_present['zprovince'])."</option>";
										
										endforeach;
										?>
													
													
                                         </select>
										  <input type="text" class="form-control " id="pr_towncityname" name="pr_towncityname"  style="display:none;">
										<!--<input type="text" name="pr_towncity" class="form-control required" placeholder="Town/City"> -->
								</div>
								
							</div>
							<div class="col-md-3">
								
								<div class="form-group">
										<label> <span class="text-danger">*</span></label>
										<input type="text" id="pr_province" name="pr_province" class="form-control text-capitalize required" placeholder="Province" readonly>
								</div>
								
							</div>
								
							<div class="col-md-3">
								<div class="form-group">
										<label>Zip Code:: <span class="text-danger"></span></label>
										<input type="text" id="pr_zip_code" name="pr_zip_code" class="form-control required" placeholder="" readonly>
									</div>
							</div>
						</div><!-- end row-->
						
							
							
						
						
						<div class="row">
						<div class="col-md-2">
									<div class="form-group">
										<label>Preferred Mailing Address: <span class="text-danger">*</span></label>
										<select name="preferred_mailing" data-placeholder="Select" class="form-control form-control-select2 required" data-fouc>
											
												<option></option>
												
												<option value="Present">Present Address</option>
												<option value="Permanent">Permanent Address</option>
												
										</select>
									</div>
								</div>
							<div class="col-md-2">
									<div class="form-group">
										<label>Person with Disability(PWD):<span class="text-danger">*</span></label>
		                                <select name="app_pwd" id="apppwd" data-placeholder="Select" class="form-control form-control-select2 required" data-fouc>
											
												<option></option>
												
												<option value="No">No</option>
												<option value="Yes">Yes</option>
												
												
										</select>
	                                </div>
								</div>	
                                                       
                                                    
							<div class="col-md-2">
									<div class="form-group">
										<label>PWD Card:<span class="text-danger">*</span></label>
                                                                            <input type="file" accept="application/pdf, image/png,image/jpeg " name="PWD_id"  class="form-control " />
                                                                        </div>
								</div>	
                                                 
                                                    
                                                    
							<div class="col-md-2">
									<div class="form-group">
										<label>Type of Disability: <span class="text-danger">*</span></label>
		                                <input type="text" name="disability" placeholder="" class="form-control ">
	                                </div>
								</div>
							<div class="col-md-2">
									<div class="form-group">
										<label>Belong to IP Group:<span class="text-danger">*</span></label>
		                                <select name="app_ipgroup" data-placeholder="Select" class="form-control form-control-select2 required" data-fouc>
											
												<option></option>
												
												<option value="No">No</option>
												<option value="Yes">Yes</option>
												
												
										</select>
	                                </div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label>Indigenous Peoples' Group Affiliation: <span class="text-danger">*</span></label>
		                                <input type="text" name="ip_affiliation" placeholder="" class="form-control required">
	                                </div>
								</div>
						
						</div>
						
						
							
						</fieldset>

						<h6>Your education</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name of School Last Attended: <span class="text-danger">*</span></label>
		                                <input type="text" name="hsgraduated" placeholder="" class="form-control required">
	                                </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>School Address: <span class="text-danger">*</span></label>
		                                <input type="text" name="hsgraduated_address" placeholder="" class="form-control required">
	                                </div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>School Sector:</label>
	                                    <select name="hsgraduated_sector" data-placeholder="Choose one..." class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="Public">Public</option> 
	                                        <option value="Private">Private</option> 

	                                    </select>
                                    </div>
								</div>
								
								
								
								
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Year Level: <span class="text-danger">*</span></label>
		                               
										<select name="year_level" data-placeholder="Choose one..." class="form-control form-control-select2 required" data-fouc>
	                                        <option></option> 
	                                        <option value="Incoming 1st Year">Incoming 1st Year</option> 
	                                       <option value="Incoming 2nd Year">Incoming 2nd Year</option> 
	                                       <option value="Incoming 3rd Year">Incoming 3rd Year</option> 
	                                       <option value="Incoming 4th Year">Incoming 4th Year</option> 
	                                       <option value="Incoming 5th Year">Incoming 5th Year</option> 
	                                        
	                                       

	                                    </select>
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>LRN: </label>
		                                <input type="text" name="lrn_no" placeholder="" class="form-control">
	                                </div>
								</div>
								
							</div>

							
						</fieldset>

						<h6>Family Background</h6>
						<fieldset>
							<div class="row">
							
								<div class="col-md-2">
									<div class="form-group">
										<label>Father's Status:</label>
	                                    <select name="fstatus" data-placeholder="Choose one..." class="form-control form-control-select2 " data-fouc>
	                                        <option></option> 
	                                        <option value="Living">Living</option> 
	                                        <option value="Deceased">Deceased</option> 

	                                    </select>
                                    </div>
								</div>
								
								
								
								<div class="col-md-10">
									<label>Father's Name:</label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
											   <input type="text" name="father" placeholder="First Name" class="form-control ">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="father_m" placeholder="Middle Name" class="form-control ">
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="father_l" placeholder="Last Name" class="form-control ">
											</div>
										</div>
										
									</div>
								</div>

							
							
								<div class="col-md-4">
									<div class="form-group">
										<label>Address:</label>
	                                    <input type="text" name="f_address" placeholder="" class="form-control ">
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Contact Number:</label>
	                                    <input type="text" name="f_contactno" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Occupation:</label>
	                                    <input type="text" name="foccupation" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Name of Employer:</label>
	                                    <input type="text" name="f_employer" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Employer Address:</label>
	                                    <input type="text" name="f_employer_address" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Highest Educational Attainment:</label>
	                                    <input type="text" name="f_highesteduc" placeholder="" class="form-control ">
                                    </div>
								</div>
								

							</div>
							
							<!-- mother's details -->
							
						
							<div class="row">
								<div class="col-md-12">
									<span><p style="border-bottom: 2px solid gray;">&nbsp;</p></span>
								</div>
							</div>
							
							<div class="row">
							
								<div class="col-md-2">
									<div class="form-group">
										<label>Mother's Status:</label>
	                                    <select name="mstatus" data-placeholder="Choose one..." class="form-control form-control-select2 " data-fouc>
	                                        <option></option> 
	                                        <option value="Living">Living</option> 
	                                        <option value="Deceased">Deceased</option> 

	                                    </select>
                                    </div>
								</div>
								
								
								
								<div class="col-md-10">
									<label>Mother's Name:</label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
											   <input type="text" name="mother" placeholder="First Name" class="form-control ">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="mother_m" placeholder="Middle Name" class="form-control ">
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="mother_l" placeholder="Last Name" class="form-control ">
											</div>
										</div>
										
									</div>
								</div>

							
							
								<div class="col-md-4">
									<div class="form-group">
										<label>Address:</label>
	                                    <input type="text" name="m_address" placeholder="" class="form-control ">
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Contact Number:</label>
	                                    <input type="text" name="m_contactno" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Occupation:</label>
	                                    <input type="text" name="moccupation" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Name of Employer:</label>
	                                    <input type="text" name="m_employer" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Employer Address:</label>
	                                    <input type="text" name="m_employer_address" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Highest Educational Attainment:</label>
	                                    <input type="text" name="m_highesteduc" placeholder="" class="form-control ">
                                    </div>
								</div>
								

							</div>
						
						<!-- guardian details -->
						<div class="row">
								<div class="col-md-12">
									<span><p style="border-bottom: 2px solid gray;">&nbsp;</p></span>
								</div>
							</div>
							
							
						<div class="row">
							
								
								
								
								
								<div class="col-md-12">
									<label>Legal Guardian Name:</label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
											   <input type="text" name="guard_fname" placeholder="First Name" class="form-control ">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="guard_mname" placeholder="Middle Name" class="form-control ">
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="guard_lname" placeholder="Last Name" class="form-control ">
											</div>
										</div>
										
									</div>
								</div>

							
							
								<div class="col-md-4">
									<div class="form-group">
										<label>Address:</label>
	                                    <input type="text" name="guard_address" placeholder="" class="form-control ">
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Contact Number:</label>
	                                    <input type="text" name="guard_contact" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Occupation:</label>
	                                    <input type="text" name="guard_occupation" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Name of Employer:</label>
	                                    <input type="text" name="guard_employer" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Employer Address:</label>
	                                    <input type="text" name="guard_empaddress" placeholder="" class="form-control ">
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Highest Educational Attainment:</label>
	                                    <input type="text" name="guard_highesteduc" placeholder="" class="form-control ">
                                    </div>
								</div>
								

							</div>
						<!-- end guardian details -->
						<div class="row">
								<div class="col-md-12">
									<span><p style="border-bottom: 2px solid gray;">&nbsp;</p></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Total Parents Annual(Yearly) Gross Income:</label>
	                                    <input type="number" name="income" placeholder="0.00" class="form-control required">
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>No. of Siblings in the family 18 years old and below:</label>
	                                    <input type="text" name="siblingno" placeholder="" class="form-control ">
                                    </div>
								</div>
								
								
								
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Is your family a beneficiary of the DSWD's pantawid Pamilyang Pilipino Program (4Ps)?:  <span class="text-danger">*</span></label>
	                                   <select name="dswd4p" data-placeholder="Choose one..." class="form-control form-control-select2 required" data-fouc>
	                                        <option></option> 
											<option value="No">No</option> 
	                                        <option value="Yes">Yes</option> 
	                                        
	                                    </select>
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Solo Parent (Parent of Applicant)  <span class="text-danger">*</span></label>
	                                   <select name="solo_parent" data-placeholder="Choose one..." class="form-control form-control-select2 required" data-fouc>
	                                       <option></option> 
	                                       <option value="No">No</option> 
	                                        <option value="Yes">Yes</option> 

	                                    </select>
                                    </div>
								</div>
							</div>
						<div class="row">
						
							
							
							
							
						</div>		
							
							
							
						</fieldset>

						<h6>Additional info</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>School Intended to enroll or enrolled in: <span class="text-danger">*</span></label>
										<select id="heicode" name="hei" class="form-control select-search required" style="width: 100%;" data-placeholder="Choose one.." onchange="fillupheidetails();">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
											<?php
											foreach ($hei_list as $heis):
											$heiname = strtoupper($heis['heiname']);
											
											echo "<option value='".$heis['heicode']."'>$heiname</option>";
											
											endforeach;
											?>
													
													
                                                </select>
												
		                               
	                                </div>
								</div>
								<input type="text" id="heiname" name="heiname"  style="display:none;">
								<div class="col-md-6">
									<div class="form-group">
										<label>Address: <span class="text-danger">*</span></label>
		                                <input type="text" name="hei_address" placeholder="" class="form-control required">
	                                </div>
								</div>
								
								
							
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Type of School:</label>
	                                    <select name="hei_type" data-placeholder="Choose one..." class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="Public">Public</option> 
	                                        <option value="Private">Private</option> 

	                                    </select>
                                    </div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>Degree Program: <span class="text-danger">*</span></label>
		                               <!--  <input type="text" name="course" placeholder="Bachelor of Science in..." class="form-control text-capitalize required"> -->
										
											<select id="course" name="course" class="form-control select-search required" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
											<?php
											foreach ($course_list as $courses):
											$course_name = strtoupper($courses['coursename']);
											
											echo "<option value='".$course_name."'>$course_name</option>";
											
											endforeach;
											?>
													
													
											</select>
	                                </div>
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Are you enjoying other sources of educational/financial assistance?:<span class="text-danger">*</span></label>
	                                    <select name="other_assistance" data-placeholder="Choose one..." class="form-control form-control-select2 required" data-fouc>
	                                        <option></option> 
	                                        <option value="Yes">Yes</option> 
	                                        <option value="No">No</option> 

	                                    </select>
                                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>If Yes, please specify Type: </label>
		                                <input type="text" name="othertype1" placeholder="1." class="form-control text-capitalize">
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Grantee Institution/Agency:</label>
		                                <input type="text" name="othertype1_name" placeholder="" class="form-control text-capitalize">
	                                </div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										
		                                <input type="text" name="othertype2" placeholder="2." class="form-control text-capitalize">
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										
		                                <input type="text" name="othertype2_name" placeholder="" class="form-control text-capitalize">
	                                </div>
								</div>
								
							</div>
							
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>I have read about the Data Privacy Statement as well as the CHED RO 1 Privacy Policy and express my consent thereto. In the same manner, I hereby express my consent for CHED RO 1 to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. I hereby affirm my right to: (a) be informed; (b) object to processing; (c) access; (d) rectify, suspend or withdraw my personal data; (e) damages; and (f) data portability pursuant to the provisions of the Republic Act and its corresponding Implementing Rules and Regulations.</label>
	                                   
                                    </div>
								</div>
							</div>
							
							<div class="row">
							<div class="g-recaptcha" data-sitekey="6LfvgcgUAAAAACjGEjBkzbtuJnPWrZBHdvgD5ccr"></div>
							</div>
							
							<input type="text" id="applicationid" name="applicationid" style="display:none">
						</fieldset>
					</form>
	            </div>
	            <!-- /wizard with validation -->
						
						
						
						
					</div>
					<!-- /row layouts -->
					

			
					
					

				</div>
				<!-- /content area -->
