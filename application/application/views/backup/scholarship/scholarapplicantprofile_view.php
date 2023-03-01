
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php $this->load->view('leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
                    <div id="page-content">
					
                        <!-- User Profile Row -->
		<div class="row">
			<div class="col-md-5 col-lg-4">
				<div class="widget">
					<div class="widget-image widget-image-md">
						<img src="<?=base_url()?>public/img/placeholders/photos/photo1@2x.jpg" alt="image">
						<div class="widget-image-content text-center">
						<?php
		 
			if($status=="yes"){
				echo "<img style='width:100%;' src='$fileurl' alt='avatar' class='img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-3x push'>";
			}else{
				echo "<img style='width:100%;' src='".base_url()."public/img/placeholders/avatars/avatar13@2x.jpg' alt='avatar' class='img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-3x push'>";
			}
		 ?>
							
							<h3 class="widget-heading text-light"><strong><?php echo $scholarapplicant_profile['firstname']." ".$scholarapplicant_profile['middlename']." ".$scholarapplicant_profile['lastname']." ".$scholarapplicant_profile['extension'];?> </strong></h3>
							<h5 class="widget-heading text-light-op"><em><?php //echo $scholarapplicant_profile['course'];?></em></h5>
						</div>
					</div>
                                    <div class="widget-content widget-content-full border-bottom">
                                        <div class="row text-center">
										
			<?php echo form_open_multipart('scholarshipapplicants/image_upload');?> 
	   <form action = "" method = "">
		 <input type="hidden" id="fileid" name="fileid" value="<?php echo $applicantid;?>">
		 
		 
		 
         <input type = "file" name = "assetimage" id = "assetimage" size = "10" class="col-md-8" /> 
        
         <input type = "submit" value = "upload"  class="btn btn-effect-ripple btn-primary"/> 
      </form> 
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><small>Status:<strong>Applicant</strong></small></h3>
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <h3 class="widget-heading"><small>Year Applied: <strong><?php echo $scholarapplicant_profile['yearapplied'];?></strong> </small></h3>
                                            </div>
                                        </div>
                                    </div>
									 
									 <div class="widget-content border-bottom">
                                        <h4>School</h4>
                                        <strong><?php echo $scholarapplicant_profile['heiname'];?></strong>
										<br>
										 <strong><?php echo $scholarapplicant_profile['hei'];?></strong>
										 <br>
										Course: <strong><?php echo $scholarapplicant_profile['course'];?></strong>
										
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4>About</h4>
										<p>
										Gender: <strong><?php echo $scholarapplicant_profile['gender']?></strong>
										<br>
										Address: <strong><?php echo $scholarapplicant_profile['barangay'];?>
										 <br>
										 <?php echo $scholarapplicant_profile['towncity'];?>
										 <br>
										 <?php echo $scholarapplicant_profile['province'];?>
										 <br>
										 <?php echo $scholarapplicant_profile['zipcode'];?></strong>
										 <br>
										 Date of Birth: <strong><?php echo $scholarapplicant_profile['dateofbirth'];?></strong>
										 <br>
										 Place of Birth: <strong><?php $scholarapplicant_profile['placeofbirth'];?></strong>
										 <br>
										 Civil Status: <strong><?php $scholarapplicant_profile['civilstatus'];?></strong>
										 <br>
										
										District: <strong><?php echo $scholarapplicant_profile['congressionaldistrict'];?></strong>
										 <?php //echo $scholar_profile->barangay;?>
                                    </p>   
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8">
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
											<li class="hidden"><a href="#voucher">Voucher</a></li>
                                            <li class="hidden"><a href="#profile-activity">Payments</a></li>
                                            <li class="active"><a href="#profile-gallery">Student Info</a></li>
                                           <li><a href="#familybackground">Family Background</a></li>
										   <li><a href="#gradeincome">Average Grade/Income</a></li>
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
			<!-- Voucher -->
	<div class="tab-pane" id="voucher">
		<div class="timeline block-content-full">
         <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
                                
                                
                                <h2><span class="hidden-xs">Voucher List</span></h2>
								<a href="#modal-voucher" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="">Add Voucher</a>
                            </div>                                      
 <div class="table-responsive">
 <table id="voucherlist-table" class="table table-striped table-bordered table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Cluster</th>
                                            <th>Date</th>
                                            <th>DV No</th>
											<th>ORS No</th>
											<th>Amount</th>
											<th>Semester</th>
											<th>SY</th>
											
                                            <th class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
				/*
				foreach ($scholar_voucher as $voucher):
					echo "<tr>";
                                            
						echo "<td>".$voucher['fundcluster']."</td>";
						echo "<td>".$voucher['voucherdate']."</td>";
						echo "<td>".$voucher['dvno']."</td>";
						echo "<td>".$voucher['orsno']."</td>";
						echo "<td>".$voucher['amount']."</td>";
						echo "<td>".$voucher['vouchersemester']."</td>";
						echo "<td>".$voucher['vouchersy']."</td>";
						
					
						
						echo "<td class='text-center'>
							<a onclick='editpayment(".$voucher['voucherid'].");' href='#modal-voucher' data-toggle='modal' title='Edit Payment' class='btn btn-effect-ripple btn-sm btn-success'><i class='fa fa-pencil' ></i></a>
							<!--<a href='javascript:void(0)' data-toggle='tooltip' title='Cancel Payment' class='btn btn-effect-ripple btn-sm btn-danger' ><i class='fa fa-times'></i></a> -->
						</td>";
					echo "</tr>";
				
				
				endforeach;
				*/
				?>
                                       
                                        
                                    </tbody>
                                </table>
 </div>
</div>


											   
                                            </div>
                                        </div>
                                        <!-- END Voucher -->
									
									
									
									
                                        <!-- Payments -->
                                        <div class="tab-pane" id="profile-activity">
                                            <div class="timeline block-content-full">
         <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
                                
                                
                                <h2><span class="hidden-xs">Payment List</span></h2>
								<a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="addpayment();">Add Payment</a>
                            </div>                                      
 <div class="table-responsive">
 <table id="general-table" class="table table-striped table-bordered table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Semester</th>
                                            <th>SY</th>
                                            <th>Check #</th>
											<th>Amount</th>
											<th>Remarks</th>
											<th>CY</th>
											<th>Status</th>
                                            <th class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
				/*
				foreach ($scholar_payment as $payment):
					echo "<tr>";
                                            
						echo "<td>".$payment['semester']."</td>";
						echo "<td>".$payment['schoolyear']."</td>";
						echo "<td>".$payment['checkno']."</td>";
						echo "<td>".$payment['amount']."</td>";
						echo "<td>".$payment['remarks']."</td>";
						echo "<td>".$payment['cy']."</td>";
						if($payment['status']=="Available"){
							echo "<td><a href='#' class='label label-success'>".$payment['status']."</a>";
								
						}
						if($payment['status']=="Cancelled"){
							echo "<td><a href='#' class='label label-danger'>".$payment['status']."</a>";
								
						}
						if($payment['status']=="Received"){
							echo "<td><a href='#' class='label label-info'>".$payment['status']."</a>";
								
						}
						if($payment['status']=="Stale"){
							echo "<td><a href='#' class='label label-warning'>".$payment['status']."</a>";
								
						}
					
						
						echo "<td class='text-center'>
							<a onclick='editpayment(".$payment['spaymentid'].");' href='#modal-regular' data-toggle='modal' title='Edit Payment' class='btn btn-effect-ripple btn-sm btn-success'><i class='fa fa-pencil' ></i></a>
							<!--<a href='javascript:void(0)' data-toggle='tooltip' title='Cancel Payment' class='btn btn-effect-ripple btn-sm btn-danger' ><i class='fa fa-times'></i></a> -->
						</td>";
					echo "</tr>";
				
				
				endforeach;
				*/
				?>
                                       
                                        
                                    </tbody>
                                </table>
 </div>
</div>


											   
                                            </div>
                                        </div>
                                        <!-- END Activity -->

                                        <!-- Gallery -->
                                        <div class="tab-pane  active" id="profile-gallery">
                                            <div class="row">
									
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Contact Name *</label>
							<div class="col-md-6">
								<input type="text" id="lastname" class="form-control" placeholder="Lastname" value="<?php echo $scholarapplicant_profile['lastname'];?>" >
								<input type="text" id="firstname" class="form-control" placeholder="Firstname" value="<?php echo$scholarapplicant_profile['firstname'];?>" >
								<input type="text" id="middlename" class="form-control" placeholder="Middlename" value="<?php echo$scholarapplicant_profile['middlename'];?>" >
								<input type="text" id="extension" class="form-control" placeholder="Extension" value="<?php echo $scholarapplicant_profile['extension'];?>" >
							</div>
                                        </div>
								<div class="row"></div>		
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Date of Birth</label>
							<div class="col-md-8">
								<input type="text" id="dateofbirth"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $scholarapplicant_profile['dateofbirth'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Place of Birth</label>
							<div class="col-md-8">
								<input type="text" id="placeofbirth" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['placeofbirth'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Sex</label>
							
							<?php
								if($scholarapplicant_profile['gender']=="Female"){
									$selectedf = "checked='checked'";
									$selectedm = "";
								}else{
									$selectedm = "checked='checked'";
									$selectedf = "";
								}
							
							?>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="genderm" name="example-inline-radios" value="Male" <?php echo $selectedm;?>> Male
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="genderf" name="example-inline-radios" value="Female" <?php echo $selectedf;?>> Female
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
						
						
							<?php
								if($scholarapplicant_profile['civilstatus']=="Single"){
									$civils = "checked='checked'";
									$civilm = "";
								}else{
									$civilm = "checked='checked'";
									$civils = "";
								}
							
							?>
							<label class="col-md-3 control-label" for="state-normal">Civil Status</label>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="civilstatuss" name="example-inline-radios2" value="Single" <?php echo $civils;?>> Single
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="civilstatusm" name="example-inline-radios2" value="Married" <?php echo $civilm;?>> Married
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Citizenship</label>
							<div class="col-md-8">
								<input type="text" id="citizenship" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['citizenship'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Mobile Number</label>
							<div class="col-md-8">
								<input type="text" id="contactno" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['contactno'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Email</label>
							<div class="col-md-8">
								<input type="text" id="email" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['email'];?>" >
								
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Barangay</label>
							<div class="col-md-8">
								<input type="text" id="barangay" class="form-control" placeholder="" value="<?php echo$scholarapplicant_profile['barangay'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Town/City</label>
							<div class="col-md-8">
								<input type="text" id="towncity" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['towncity'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Province</label>
							<div class="col-md-8">
								<input type="text" id="province" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['province'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Congressional District</label>
							<div class="col-md-8">
								
								<select id="congressionaldistrict" class="form-control">
									<option value="<?php echo $scholarapplicant_profile['congressionaldistrict'];?>"><?php echo $scholarapplicant_profile['congressionaldistrict'];?></option>
									<option value="ILOCOS NORTE 1">ILOCOS NORTE 1</option>
									<option value="ILOCOS NORTE 2">ILOCOS NORTE 2</option>
									<option value="ILOCOS SUR 1">ILOCOS SUR 1</option>
									<option value="ILOCOS SUR 2">ILOCOS SUR 2</option>
									<option value="LA UNION 1">LA UNION 1</option>
									<option value="LA UNION 2">LA UNION 2</option>
									<option value="PANGASINAN 1">PANGASINAN 1</option>
									<option value="PANGASINAN 2">PANGASINAN 2</option>
									<option value="PANGASINAN 3">PANGASINAN 3</option>
									<option value="PANGASINAN 4">PANGASINAN 4</option>
									<option value="PANGASINAN 5">PANGASINAN 5</option>
									<option value="PANGASINAN 6">PANGASINAN 6</option>
									
								</select>
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Zip Code</label>
							<div class="col-md-8">
								<input type="text" id="zipcode" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['zipcode'];?>" >
								
							</div>
						</div>
						
						<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">School Name</label>
                                            <div class="col-md-6">
                                                <select id="heicode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
                                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->

						<?php
						foreach ($hei_list as $heis):
						$heiname = strtoupper($heis['heiname']);
							if($scholarapplicant_profile['hei']==$heis['heicode']){
								$selectedhei = "selected='selected'";
							}else{
								$selectedhei = "";
							}
						echo "<option value='".$heis['heicode']."' $selectedhei>$heiname</option>";
						
						endforeach;
						?>
													
													
                                                </select>
                                            </div>
                                        </div>
										<div class="row"></div>
							<div class="form-group">			
							<label class="col-md-3 control-label" for="state-normal">Course</label>
							<div class="col-md-8">
								<input type="text" id="course" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['course'];?>" >
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Year Level</label>
							<div class="col-md-4">
								
								<select id="year_level" class="form-control">
								
									<option value="<?php echo $scholarapplicant_profile['year_level'];?>"><?php echo $scholarapplicant_profile['year_level'];?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								
							</div>
							<div class="row"></div>
							<label class="col-md-3 control-label" for="state-normal">Year of Application</label>
							<div class="col-md-4">
								<input type="text" id="yearofapplication" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['yearapplied'];?>" >
								
							</div>
							<div class="row"></div>
							<label class="col-md-3 control-label" for="state-normal">High School Graduated</label>
							<div class="col-md-4">
								<input type="text" id="hsgraduated" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['hsgraduated'];?>" >
								
							</div>
							<div class="row"></div>
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Type</label>
							
								<div class="col-md-8">
								<select id="type" class="form-control">
								<option value="<?php echo $scholarapplicant_profile['type'];?>"><?php echo $scholarapplicant_profile['type'];?></option>
								<option value="A">A-INCOMING FIRST YEAR(NOT YET GRADUATED)
</option>
								<option value="B">B-GRADUATED (INCOMING)
</option>
								<option value="C">C-WITH EARNED UNITS
</option>
								<option value="D">D-ALS/PEPT
</option>
								
								</select>
								
							</div>
								
							
				</div>
							<div class="col-md-8">
								<button type="button" class="btn btn-primary" onclick="saveapplicantinfo(<?php echo $scholarapplicant_profile['applicantid'];?>)">Save</button>
								
							</div>
							</div>
						
								</div>
								<!-- end tab content -->
											
                                            
                                        </div>
                                        <!-- END Gallery -->

                                        <!-- Followers -->
                                        <div class="tab-pane" id="familybackground">
                                            <div class="block-full">
                                                
				<div class="row">
			<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Father's Name</label>
							<div class="col-md-8">
								<input type="text" id="father" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['father'];?>" >
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="foccupation" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['foccupation'];?>" >
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Mother's Name</label>
							<div class="col-md-8">
								<input type="text" id="mother" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['mother'];?>" >
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="moccupation" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['moccupation'];?>" >
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Number of Siblings</label>
							<div class="col-md-3">
								<input type="text" id="siblingno" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['siblingno'];?>" >
								
							</div>
							<div class="row"></div>
							<label class="col-md-3 control-label" for="state-normal">Disability</label>
							<div class="col-md-8">
								<input type="text" id="disability" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['disability'];?>" >
								
							</div>
							<div class="row"></div>
							<div class="col-md-8">
								<button type="button" class="btn btn-primary" onclick="saveapplicantinfo(<?php echo $scholarapplicant_profile['applicantid'];?>)">Save</button>
								
							</div>
			</div>
						
			</div><!-- end row -->
                                            </div>
                                        </div>
                                        <!-- END Followers -->
										
										
	 <!-- Followers -->
	<div class="tab-pane" id="gradeincome">
		<div class="block-full">
                                                
				<div class="row">
			<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Average Grade</label>
							<div class="col-md-8">
								<input type="text" id="average_grade" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['average_grade'];?>" >
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Income</label>
							<div class="col-md-8">
								<input type="text" id="income" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['income'];?>" >
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Equivalent Grade</label>
							<div class="col-md-8">
								<input type="text" id="equivgrade" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['equivgrade'];?>" disabled>
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Equivalent Income</label>
							<div class="col-md-8">
								<input type="text" id="equivincome" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['equivincome'];?>" disabled>
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Total Grade</label>
							<div class="col-md-8">
								<input type="text" id="totalgrade" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['totalgrade'];?>" disabled>
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Total Income</label>
							<div class="col-md-8">
								<input type="text" id="totalincome" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['totalincome'];?>" disabled>
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Grand Total</label>
							<div class="col-md-8">
								<input type="text" id="grandtotal" class="form-control" placeholder="" value="<?php echo $scholarapplicant_profile['grandtotal'];?>" disabled>
								
							</div>
							
							
							<div class="row"></div>
							<div class="col-md-8">
								<button type="button" class="btn btn-primary" onclick="saveapplicantinfo(<?php echo $scholarapplicant_profile['applicantid'];?>)">Save</button>
								
							</div>
			</div>
						
			</div><!-- end row -->
                                            </div>
                                        </div>
                                        <!-- END Followers -->
										
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                            </div>
                        </div>
                        <!-- END User Profile Row -->
                    </div>
                    <!-- END Page Content -->
					
					
					
<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Payment Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
									<input type="hidden" id="spaymentid">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Semester</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="semester">
												<option value="1st">1st</option>
												<option value="2nd">2nd</option>
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">School Year</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="schoolyear">
												<option value="2012-2013">2012-2013</option>
												<option value="2013-2014">2013-2014</option>
												<option value="2014-2015">2014-2015</option>
												<option value="2015-2016">2015-2016</option>
												<option selected="selected" value="2016-2017">2016-2017</option>
												<option value="2017-2018">2017-2018</option>
												<option value="2018-2019">2018-2019</option>
												<option value="2019-2020">2019-2020</option>
												<option value="2020-2021">2020-2021</option>
												
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Fund Cluster</label>
                                            <div class="col-md-6">
                                               <input type="text" name="state-normal" class="form-control" id="fundclusterpayment">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Date</label>
                                            <div class="col-md-6">
                                              <input type="text" id="paymentdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Check #</label>
                                            <div class="col-md-6">
                                               <input type="text" name="state-normal" class="form-control" id="checkno">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Amount</label>
                                            <div class="col-md-6">
                                                <input type="text" name="state-normal" class="form-control" id="amount">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Particulars</label>
                                            <div class="col-md-6">
                                                
												<textarea class="form-control" id="remarks"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">CY</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="cy">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												
												
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Status</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="status">
												<option value="Available">Available</option>
												<option value="Received">Received</option>
												<option value="Stale">Stale</option>
												<option value="Cancelled">Cancelled</option>
												
												
												</select>
                                            </div>
                                        </div>
										
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savepayment(<?php echo $scholarapplicant_profile['scholarid'];?>);" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatepayment();" id="updatebutton" >Update</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->				

		</div>
			<!-- END Modal -->				
					
					
		
									
					
	<!-- Regular Modal -->
	<div id="modaldiv">
			<div id="modal-voucher" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Voucher Details</strong></h3>
						</div>
						<div class="modal-body">
							
							
                                <!-- Input States Block -->
                                <div class="block full">
                            
<!-- Block Tabs -->
                              
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Details</a></li>
                                            <li><a href="#block-tabs-profile" onclick="populateentry(<?php echo $scholar_profile->scholarid;?>);">Accounting Entry</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
<div class="tab-content">
	<div class="tab-pane active" id="block-tabs-home">
	<input type="hidden" id="voucherid">
	<div class="row">
	<div class="form-group">
		<label class="col-md-3 control-label" for="state-normal">Fund Cluster</label>
		<div class="col-md-6">
			<select class="form-control" id="fundcluster">
			<option value="101">101</option>
			<option value="151">151</option>
			</select>
		</div>
	</div>	
	<div class="row"></div>	
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Date</label>
	<div class="col-md-6">
	  <input type="text" id="voucherdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
	</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">DV No.</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="dvno">
	</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="state-normal">Mode of Payment</label>
		<div class="col-md-6">
			<select class="form-control" id="modeofpayment">
			<option value="MDS Check">MDS Check</option>
			<option value="Commercial Check">Commercial Check</option>
			<option value="ADA">ADA</option>
			<option value="Others">Others</option>
			</select>
		</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">ORs/BURS No.</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="orsno">
	</div>
	</div>
	
	<div class="row"></div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="state-normal">Semester</label>
		<div class="col-md-6">
			<select class="form-control" id="vouchersemester">
			<option value="1st">1st</option>
			<option value="2nd">2nd</option>
			</select>
		</div>
	</div>
	
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">School Year</label>
	<div class="col-md-6">
		<select class="form-control" id="voucherschoolyear">
		<option value="2012-2013">2012-2013</option>
		<option value="2013-2014">2013-2014</option>
		<option value="2014-2015">2014-2015</option>
		<option value="2015-2016">2015-2016</option>
		<option selected="selected" value="2016-2017">2016-2017</option>
		<option value="2017-2018">2017-2018</option>
		<option value="2018-2019">2018-2019</option>
		<option value="2019-2020">2019-2020</option>
		<option value="2020-2021">2020-2021</option>
		
		</select>
	</div>
</div>
	
	<!-- <div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Particulars</label>
	<div class="col-md-6">
		<textarea class="form-control" id="particulars"></textarea>
	</div>
	</div>
	-->
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Responsibility Center</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="responsibility" value="StuFAP Unit">
	</div>
	</div>
	
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">MFO/PAP</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="mfopap" value="3 02 020000">
	</div>
	</div>
	
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Amount</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="voucheramount">
	</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label">Certified</label>
	<div class="col-md-9">
		<div class="checkbox">
			<label for="example-checkbox1">
				<input type="checkbox" id="certifiedcash" name="example-checkbox1" checked="checked"> Cash Available
			</label>
		</div>
		<div class="checkbox">
			<label for="example-checkbox2">
				<input type="checkbox" id="certifiedsubject" name="example-checkbox2"> Subject to Authority to Debit Account (when applicable)
			</label>
		</div>
		<div class="checkbox">
			<label for="example-checkbox3">
				<input type="checkbox" id="certifiedsupporting" name="example-checkbox3" checked="checked"> Supporting documents complete and amount claimed proper
			</label>
		</div>
	</div>
</div>

</div> <!-- end row -->	
										
										
										
										</div><!-- end details -->
<div class="tab-pane" id="block-tabs-profile">
<div class="row">
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Account Title</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="accounttitle">
	</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">UACS Code</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="uacscode">
	</div>
	</div>
	
	<div class="row"></div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="state-normal">Column Entry</label>
		<div class="col-md-6">
			<select class="form-control" id="columnentry">
			<option value="Debit">Debit</option>
			<option value="Credit">Credit</option>
			</select>
		</div>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<label class="col-md-3 control-label" for="state-normal">Amount</label>
	<div class="col-md-6">
		<input type="text" name="state-normal" class="form-control" id="accountentryamount">
	</div>
	</div>
	<div class="row"></div>
	<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addentry();" id="savebutton">Add Entry</button>
	
	
</div>

<table id="entryitems" class="table table-striped table-borderless table-vcenter">
<thead>
	<tr>
		<th>Account Title</th>
		<th class="hidden-xs">UACS Code</th>
		<th class="hidden-xs">Amount</th>
		<th class="hidden-sm hidden-xs">Entry</th>
		<th class="text-center"><i class="fa fa-flash"></i></th>
	</tr>
</thead>
<tbody>
	

</tbody>
</table>


</div>
                                        <div class="tab-pane" id="block-tabs-settings">Settings..</div>
                                    </div>
                                    <!-- END Tabs Content -->
                               









							
							
							
							
						</div> <!-- end modal body-->
						<div class="modal-footer">
							<button id="savevoucherbutton" type="button" class="btn btn-effect-ripple btn-primary" onclick="savevoucher(<?php echo $scholar_profile->scholarid;?>);" >Save</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatevoucher();" id="updatevoucherbutton" >Update</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->				

		</div>
			<!-- END Modal -->						
</div><!--modaldiv -->					
					
					
					
					
					
					
					
					
					
					
					
					
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


