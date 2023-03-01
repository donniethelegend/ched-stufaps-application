
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
			<?php $this->load->view('heidirectory/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->
             <div class="col-lg-2">
			<select class="form-control" id="yearfilter" placeholder="Scholarship Type">
			
				<?php
					foreach($typecode_list as $typecodelist):
						echo "<option value='".$typecodelist['typecode']."'>".$typecodelist['typecode']." - ".$typecodelist['typedescription']."</option>";
					endforeach;
				?>
			</select>
			
		</div>	
		<div class="col-lg-2">
			<button type="button" class="btn btn-primary" onclick="changeyear();">View</button>   
		</div>
<div class="row"></div>	
	<div class="block full">
        <div class="block-title">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Award Number</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 200px;">Award Number</th>
                        <th>Students Name</th>
						<th>Type</th>
						<th>Description</th>
						<th></th>
						

                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($awardnumber_list as $awardnumber):
			
				
				echo "<tr>";
				echo "<td><strong>".$awardnumber['awardnumber']."</strong></td>";
				echo "<td><a href='".base_url()."scholar/profile/".$awardnumber['scholarid']."'>".$awardnumber['granteename']."</td>";
				echo "<td>".$awardnumber['typecode']."</td>";
				echo "<td>".$awardnumber['typedescription']."</td>";
				
				echo "<td><button onclick='deletegrantee(".$awardnumber['awardid'].");' type='reset' class='btn btn-xs btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				//echo "<td><button type='submit' class='btn btn-effect-ripple btn-primary'  href='#editprogram' data-toggle='modal' onclick='editprogram(".$scholar['scholarid'].");'><i class='fa fa-pencil-square'></i></button></td></tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
			 <!-- Regular Modal -->
                <div id="adddeliverymodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Delete Grantee</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<input type="hidden" id="granteeid">
						<label class="col-md-3 control-label text-right">Password</label>
                        <div class="col-md-7">
                            <input type="password" id="deletepassword" name="state-normal" class="form-control" tabindex="0">
                        </div>	
						
						
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="deletegrantee();">Delete</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
			
			<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Grantee Details</strong></h3>
						</div>
						<div class="modal-body">
							
							
						
						
<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Personal Information</a></li>
                                            <li><a href="#block-tabs-profile">Family Background</a></li>
											<li><a href="#block-tabs-others">Others</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
	<div class="tab-content">
						<div class="tab-pane active" id="block-tabs-home">
										<!-- content here -->
								<div class="row">
									
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Grantee Name *</label>
							<div class="col-md-6">
								<input type="text" id="lastname" class="form-control" placeholder="Lastname" >
								<input type="text" id="firstname" class="form-control" placeholder="Firstname">
								<input type="text" id="middlename" class="form-control" placeholder="Middlename">
								<input type="text" id="extension" class="form-control" placeholder="Extension">
							</div>
							<div class="col-md-1" id="fullnamecheck"></div>
                                        </div>
								<div class="row"></div>		
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Date of Birth</label>
							<div class="col-md-8">
								<input type="text" id="dateofbirth"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Place of Birth</label>
							<div class="col-md-8">
								<input type="text" id="placeofbirth" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Sex</label>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="genderm" name="example-inline-radios" value="Male"> Male
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="genderf" name="example-inline-radios" value="Female"> Female
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Civil Status</label>
							<div class="col-md-8">
								<label class="radio-inline" for="example-inline-radio1">
								<input type="radio" id="civilstatuss" name="example-inline-radios2" value="Single"> Single
							</label>
							<label class="radio-inline" for="example-inline-radio2">
								<input type="radio" id="civilstatusm" name="example-inline-radios2" value="Married"> Married
							</label>
							
								
							</div>
						</div>
						<div class="row"></div>
						 <div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Citizenship</label>
							<div class="col-md-8">
								<input type="text" id="citizenship" class="form-control" placeholder="">
								
							</div>
						</div> 
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Mobile Number</label>
							<div class="col-md-8">
								<input type="text" id="contactno" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Email</label>
							<div class="col-md-8">
								<input type="text" id="email" class="form-control" placeholder="">
								
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Barangay</label>
							<div class="col-md-8">
								<input type="text" id="barangay" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Town/City</label>
							<div class="col-md-8">
								<input type="text" id="towncity" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Province</label>
							<div class="col-md-8">
								<input type="text" id="province" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Congressional District</label>
							<div class="col-md-8">
								
								<select id="congressionaldistrict" class="form-control">
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
								<input type="text" id="zipcode" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">School Name</label>
                                            <div class="col-md-6">
                                                <select id="heicode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
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
										<div class="row"></div>
							<div class="form-group">			
										<label class="col-md-3 control-label" for="state-normal">Course</label>
							<div class="col-md-8">
								<input type="text" id="course" class="form-control" placeholder="">
								
							</div>
							</div>
							<div class="form-group">			
										<label class="col-md-3 control-label" for="state-normal">Year Level</label>
							<div class="col-md-4">
								<select id="year_level" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								
							</div>
							</div>
							<div class="row"></div>
							<div class="form-group">			
										<label class="col-md-3 control-label" for="state-normal">High School Graduated</label>
							<div class="col-md-8">
								<input type="text" id="hsgraduated" class="form-control" placeholder="">
								
							</div>
							</div>
							
						
								</div>
								<!-- end tab content -->
						</div>
			<div class="tab-pane" id="block-tabs-profile">
			<!-- start content -->
			<div class="row">
			<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Father's Name</label>
							<div class="col-md-8">
								<input type="text" id="father" class="form-control" placeholder="">
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="foccupation" class="form-control" placeholder="">
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Mother's Name</label>
							<div class="col-md-8">
								<input type="text" id="mother" class="form-control" placeholder="">
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="moccupation" class="form-control" placeholder="">
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Number of Siblings</label>
							<div class="col-md-3">
								<input type="text" id="siblingno" class="form-control" placeholder="">
								
							</div>
							<div class="row"></div>
							<label class="col-md-3 control-label" for="state-normal">Disability</label>
							<div class="col-md-8">
								<input type="text" id="disability" class="form-control" placeholder="">
								
							</div>
			</div>
						
			</div>
			
			
			
			<!-- end content -->
			</div>
			
			<div class="tab-pane" id="block-tabs-others">
			
			<div class="row">
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Year of Application</label>
							<div class="col-md-4">
								<select id="yearofapplication" class="form-control">
								<option value="2018">2018</option>
								<option value="2017" selected="selected">2017</option>
								<option value="2016">2016</option>
								<option value="2015" >2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								</select>
								
							</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Average Grade</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="average_grade" placeholder="0.000">
								
							</div>
				</div>
				<div class="row"></div>
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Income</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="income" placeholder="0.00">
								
							</div>
				</div>
				<div class="row"></div>
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Type</label>
							
								<div class="col-md-8">
								<select id="type" class="form-control">
								<option value="A">A-INCOMING FIRST YEAR(NOT YET GRADUATED)
</option>
								<option value="B">B-GRADUATED (INCOMING)
</option>
								<option value="C" >C-WITH EARNED UNITS
</option>
								<option value="D">D-ALS/PEPT
</option>
								
								</select>
								
							</div>
								
							
				</div>
			</div>
			
			</div>
			
                                        
	</div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savesinglegrantee();" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->				
			
 
 
 
			
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


