
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
					
					
					
					<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#pds-related">My PDS Related Files</a></li>
                                            <li><a href="#my201">My 201 Files</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="pds-related">
										<!--start pds tab -->
										
<!-- Block Tabs -->
<div class="block full">
	<!-- Block Tabs Title -->
	<div class="block-title">
		
		<ul class="nav nav-tabs" data-toggle="tabs">
			<li class="active"><a href="#infotab">Info</a></li>
			<li><a href="#educationtab">Education</a></li>
			<li><a href="#trainingtab">Training</a></li>
			
		</ul>
	</div>
	<!-- END Block Tabs Title -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<div class="tab-pane active" id="infotab">
		<!-- start infotab -->
		<div class="row">			
			<div class="col-md-5 col-lg-4">
				<div class="widget">
					<div class="widget-image widget-image-sm">
						<img src="<?=base_url()?>public/img/placeholders/avatars/avatar13@2x.jpg" alt="image">
						<div class="widget-image-content text-center">
							<img src="<?=base_url()?>public/img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
							<h2 class="widget-heading text-light"><strong>Anna Wigren</strong></h2>
							<h4 class="widget-heading text-light-op"><em>Logo Designer</em></h4>
						</div>
					</div>
				</div>
			</div>
			<!-- Block Tabs -->
			<div class="col-md-7 col-lg-8">
			<div class="block full">
				<!-- Block Tabs Title -->
				<div class="block-title">
					
					<ul class="nav nav-tabs" data-toggle="tabs">
						<li class="active"><a href="#personalinfo">Personal Info</a></li>
						<li><a href="#contactinfo">Contact Info</a></li>
						<li><a href="#familyinfo">Family Info</a></li>
						<li><a href="#identification">Identification</a></li>
					</ul>
				</div>
				<!-- END Block Tabs Title -->

				<!-- Tabs Content -->
				<div class="tab-content">
					<div class="tab-pane active" id="personalinfo">
					
					<form action="page_forms_components.html" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">First Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Middle Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Last Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">ID Number:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Division:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Position:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Date Hired (Government):</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Civil Status:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                              
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Citizenship:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Birth Place:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                             
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Birth Date:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                              
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Gender:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                              
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Height (m):</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                             
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Weight (k):</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                             
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Blood Type:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                              
                                            </div>
                                        </div>
										 
										
										
                                        
                                    </form>
					
					<!-- end personal info--></div>
					<div class="tab-pane" id="contactinfo">
					
					<form action="page_forms_components.html" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Cel. No.:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                            
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">E-mail Add.:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                            
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Residential Address:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                             
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Zip Code:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                          
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tel. No.:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                          
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Permanent Address:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                         
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Zip Code:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                            
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tel. No.:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										 
										 
										
										
                                        
                                    </form>
					
					<!-- end contact info tab--></div>
					<div class="tab-pane" id="familyinfo">
					
					<form action="page_forms_components.html" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">	
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Spouse's Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Father's Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Mother's Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="">
                                                
                                            </div>
                                        </div>
										
										
										
										
									</form>
					<!-- end family info tab--></div>
					<div class="tab-pane" id="identification">Settings..</div>
				</div>
				<!-- END Tabs Content -->
			</div>
			<!-- END Block Tabs -->
			</div> <!-- end 2nd column -->


			
		</div><!-- end row -->
		
		
		
		<!-- end infotab -->
		</div>
		<div class="tab-pane" id="educationtab">Profile..</div>
		<div class="tab-pane" id="trainingtab">Settings..</div>
	</div>
	<!-- END Tabs Content -->
</div>
<!-- END Block Tabs -->
										<!-- end pds tab -->
										</div>
                                        <div class="tab-pane" id="my201">Profile..</div>
                                        <div class="tab-pane" id="block-tabs-settings">Settings..</div>
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                        <!-- User Profile Row -->
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="widget">
                                    <div class="widget-image widget-image-sm">
                                        <img src="<?=base_url()?>public/img/placeholders/photos/photo1@2x.jpg" alt="image">
                                        <div class="widget-image-content text-center">
                                            <img src="<?=base_url()?>public/img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                                            <h3 class="widget-heading text-light"><strong><?php echo $scholar_profile->firstname;?> <?php echo $scholar_profile->middlename;?>. <?php echo $scholar_profile->lastname;?></strong></h3>
                                            <h5 class="widget-heading text-light-op"><em><?php echo $scholar_profile->course;?></em></h5>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-full border-bottom">
                                        <div class="row text-center">
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><small>Status:<strong><?php echo $scholar_profile->status2;?></strong></small></h3>
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <h3 class="widget-heading"><small>Year Applied: <strong><?php echo $scholar_profile->yearapplied;?></strong> </small></h3>
                                            </div>
                                        </div>
                                    </div>
									  <div class="widget-content border-bottom">
									  <h4>Scholarship</h4>
										<p>
										Scholar Type: <strong><?php echo $scholar_profile->typedescription;?></strong>
										<br>
										Award Number: <strong><?php echo $scholar_profile->awardnumber;?></strong>
										</p>
									  </div>
									 <div class="widget-content border-bottom">
                                        <h4>School</h4>
                                        <strong><?php echo $scholar_profile->hei;?></strong>
										<br>
										District: <strong><?php echo $scholar_profile->congressionaldistrict;?></strong>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4>About</h4>
										<p>
										Gender: <strong><?php echo $scholar_profile->gender;?></strong>
										<br>
										Address: <strong><?php echo $scholar_profile->barangay;?>
										 <br>
										 <?php echo $scholar_profile->towncity;?>
										 <br>
										 <?php echo $scholar_profile->province;?>
										 <br>
										 <?php echo $scholar_profile->zipcode;?></strong>
										 <br>
										 Date of Birth: <strong><?php echo $scholar_profile->dateofbirth;?></strong>
										 <br>
										 Place of Birth: <strong><?php echo $scholar_profile->placeofbirth;?></strong>
										 <br>
										 Civil Status: <strong><?php echo $scholar_profile->civilstatus;?></strong>
										 <br>
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
											<li class="active"><a href="#voucher">Voucher</a></li>
                                            <li ><a href="#profile-activity">Payments</a></li>
                                            <li><a href="#profile-gallery">Student Info</a></li>
                                           <li><a href="#profile-followers">Family Background</a></li>
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
			<!-- Voucher -->
	<div class="tab-pane active" id="voucher">
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
				
				?>
                                       
                                        
                                    </tbody>
                                </table>
 </div>
</div>


											   
                                            </div>
                                        </div>
                                        <!-- END Activity -->

                                        <!-- Gallery -->
                                        <div class="tab-pane" id="profile-gallery">
                                            <div class="row">
									
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Contact Name *</label>
							<div class="col-md-6">
								<input type="text" id="lastname" class="form-control" placeholder="Lastname" value="<?php echo $scholar_profile->lastname;?>" disabled>
								<input type="text" id="firstname" class="form-control" placeholder="Firstname" value="<?php echo $scholar_profile->firstname;?>" disabled>
								<input type="text" id="middlename" class="form-control" placeholder="Middlename" value="<?php echo $scholar_profile->middlename;?>" disabled>
								<input type="text" id="extension" class="form-control" placeholder="Extension" value="<?php echo $scholar_profile->extension;?>" disabled>
							</div>
                                        </div>
								<div class="row"></div>		
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Date of Birth</label>
							<div class="col-md-8">
								<input type="text" id="dateofbirth"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $scholar_profile->dateofbirth;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Place of Birth</label>
							<div class="col-md-8">
								<input type="text" id="placeofbirth" class="form-control" placeholder="" value="<?php echo $scholar_profile->placeofbirth;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Sex</label>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="gender" name="example-inline-radios" value="Male"> Male
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="gender" name="example-inline-radios" value="Female"> Female
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Civil Status</label>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="civilstatus" name="example-inline-radios2" value="Single"> Single
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="civilstatus" name="example-inline-radios2" value="Married"> Married
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Citizenship</label>
							<div class="col-md-8">
								<input type="text" id="citizenship" class="form-control" placeholder="" value="<?php echo $scholar_profile->citizenship;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Mobile Number</label>
							<div class="col-md-8">
								<input type="text" id="contactno" class="form-control" placeholder="" value="<?php echo $scholar_profile->contactno;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Email</label>
							<div class="col-md-8">
								<input type="text" id="email" class="form-control" placeholder="" value="<?php echo $scholar_profile->email;?>" disabled>
								
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Barangay</label>
							<div class="col-md-8">
								<input type="text" id="barangay" class="form-control" placeholder="" value="<?php echo $scholar_profile->barangay;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Town/City</label>
							<div class="col-md-8">
								<input type="text" id="towncity" class="form-control" placeholder="" value="<?php echo $scholar_profile->towncity;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Province</label>
							<div class="col-md-8">
								<input type="text" id="province" class="form-control" placeholder="" value="<?php echo $scholar_profile->province;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Congressional District</label>
							<div class="col-md-8">
								<input type="text" id="congressionaldistrict" class="form-control" placeholder="" value="<?php echo $scholar_profile->congressionaldistrict;?>" disabled>
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Zip Code</label>
							<div class="col-md-8">
								<input type="text" id="zipcode" class="form-control" placeholder="" value="<?php echo $scholar_profile->zipcode;?>" disabled>
								
							</div>
						</div>
						
						<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">School Name</label>
                                            <div class="col-md-6">
                                                <select id="heicode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
													<?php echo "<option selected='selected'>".$scholar_profile->hei."</option>";?>
						<?php
						//foreach ($hei_list as $heis):
						//$heiname = strtoupper($heis['heiname']);
						
						//echo "<option value='".$heis['heicode']."'>$heiname</option>";
						
						//endforeach;
						?>
													
													
                                                </select>
                                            </div>
                                        </div>
										<div class="row"></div>
							<div class="form-group">			
										<label class="col-md-3 control-label" for="state-normal">Course</label>
							<div class="col-md-8">
								<input type="text" id="course" class="form-control" placeholder="" value="<?php echo $scholar_profile->course;?>" disabled>
								
							</div>
							</div>
						
								</div>
								<!-- end tab content -->
											
                                            
                                        </div>
                                        <!-- END Gallery -->

                                        <!-- Followers -->
                                        <div class="tab-pane" id="profile-followers">
                                            <div class="block-full">
                                                
				<div class="row">
			<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Father's Name</label>
							<div class="col-md-8">
								<input type="text" id="father" class="form-control" placeholder="" value="<?php echo $scholar_profile->father;?>" disabled>
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="foccupation" class="form-control" placeholder="" value="<?php echo $scholar_profile->foccupation;?>" disabled>
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Mother's Name</label>
							<div class="col-md-8">
								<input type="text" id="mother" class="form-control" placeholder="" value="<?php echo $scholar_profile->mother;?>" disabled>
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="moccupation" class="form-control" placeholder="" value="<?php echo $scholar_profile->moccupation;?>" disabled>
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Number of Siblings</label>
							<div class="col-md-3">
								<input type="text" id="siblingno" class="form-control" placeholder="" value="<?php echo $scholar_profile->siblingno;?>" disabled>
								
							</div>
							<div class="row"></div>
							<label class="col-md-3 control-label" for="state-normal">Disability</label>
							<div class="col-md-8">
								<input type="text" id="disability" class="form-control" placeholder="" value="<?php echo $scholar_profile->disability;?>" disabled>
								
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
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savepayment(<?php echo $scholar_profile->scholarid;?>);" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatepayment();" id="updatebutton" disabled>Update</button>
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
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatevoucher();" id="updatevoucherbutton" disabled>Update</button>
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


