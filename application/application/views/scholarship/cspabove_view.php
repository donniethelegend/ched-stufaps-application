<script src="<?=base_url()?>public/global_assets/js/demo_pages/datatables_data_sources.js"></script>
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
		
		<!-- Simple Stats Widgets -->
                            <div class="col-sm-6 col-lg-6">
                                <a href="#" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-group text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong><span data-toggle="counter" data-to="<?php 
										//echo $totalinstitution->totalinst;
										?>"></span><span data-toggle="counter" data-to=""></span>
										2019, Type A & B, Year Level 1, Grade Equivalent Above 90.
										</strong>
                                        </h2>
                                        
                                    </div>
                                </a>
								
								
                            </div>
							
							
			<?php //$this->load->view('heidirectory/subnav_view'); ?>
<!-- Tables Row -->
<input type="hidden" id="pagelocation" value="<?php //echo $pagelocation;?>">
<div class="row">
   <div class="col-lg-12">
   <input type="hidden" id="baseurl" value="<?php echo base_url();?>">
            <!-- Partial Responsive Block -->
		<!--	<form method="post" action="<?php echo base_url();?>scholarshipapplicants/search">
			<div class="col-md-1">Search: </div>
             <div class="col-lg-2">
		
				<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Firstname" value="<?php //echo $keyword;?>">
			
			
			</div>
			
			
		<div class="col-lg-1">
			<button type="submit" class="btn btn-primary">Search</button>   
		</div>
	</form> -->
	
		 
<div class="row"></div>	

<div class="row"></div>	
<div class="block full">
        <div class="block-title">
           
			
			<a href="<?=base_url()?>functions/downloadapplicantallcsp/<?php echo $current_year_filter;?>" class="btn btn-effect-ripple btn-success" data-toggle="modal" target="_blank"><i class="hi hi-download-alt"></i> Download ALL by Year</a>
			<?php //print_r($heidirectory);?>
			
			
        </div>
         <div class="table-responsive">
            <table  class="table table-striped hover datatable-ajax"  id="DataTables_Table_1">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Students Name</th>
						<th>Gender</th>
                        <th>Contact No.</th>
						<th>Province</th>
						<th>Average Grade</th>
						<th>Equivalent Grade 70%</th>
						<th>Income</th>
						<th>Equivalent Income 30%</th>
						<th>Total Points</th>
						<th>Plus Point</th>
						<th>Grand Total</th>
						<th>Year Applied</th>
						<!--<th>Equivalent Grade 70%</th>
						<th>Income</th>
						<th>Equivalent Income 30%</th>
						<th>Total Points</th>
						<th>Plus Point</th>
						<th>Grand Total</th>
						<th>Year Applied</th>
                        <th class="text-center"></th> -->
                    </tr>
                </thead>
                <tbody>
         
                </tbody>
            </table>
        </div>
    </div>
	
                        
                        <!-- END First Row -->		

<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Contact Details</strong></h3>
						</div>
						<div class="modal-body">
							
							
						<input type="hidden" id="duplicateapplicant">
						
<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home" id="altp"><u>P</u>ersonal Information</a></li>
                                            <li><a href="#block-tabs-profile" id="altb">Family <u>B</u>ackground</a></li>
											<li><a href="#block-tabs-others" id="altt">O<u>t</u>hers</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
	<div class="tab-content">
						<div class="tab-pane active" id="block-tabs-home">
										<!-- content here -->
								<div class="row">
									
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Contact Name * <BR><BR> <I style="font-size:18px;">Ñ</I></label>
							<div class="col-md-6">
								<input type="text" id="lastname" class="form-control" placeholder="Lastname" autocomplete="off">
								<input type="text" id="firstname" class="form-control" placeholder="Firstname" autocomplete="off">
								<input type="text" id="middlename" class="form-control" placeholder="Middlename" autocomplete="off">
								<input type="text" id="extension" class="form-control" placeholder="Extension" autocomplete="off">
							</div>
							<div class="col-md-1" id="fullnamecheck"></div>
							<br><br>
							<div class="col-md-1" id="listapplied"></div>
                                        </div>
								<div class="row"></div>		
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Date of Birth</label>
							<div class="col-md-8">
								<input type="text" id="dateofbirth"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" autocomplete="off">
								
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
						 <div class="form-group hidden">
							<label class="col-md-3 control-label" for="state-normal">Citizenship</label>
							<div class="col-md-8">
								<input type="text" id="citizenship" class="form-control" value="FILIPINO">
								
							</div>
						</div> 
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Mobile Number</label>
							<div class="col-md-8">
								<input type="text" id="contactno" class="form-control" placeholder="" autocomplete="off">
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Email</label>
							<div class="col-md-8">
								<input type="text" id="email" class="form-control" placeholder="" autocomplete="off">
								
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Barangay</label>
							<div class="col-md-8">
								<input type="text" id="barangay" class="form-control" placeholder="" autocomplete="off">
								
							</div>
						</div>
						<div class="form-group">
                           <label class="col-md-3 control-label" for="state-normal">Town/City</label>
							<div class="col-md-6">
								<select id="towncity_select" name="example-select2" class="form-control" style="width: 100%;" data-placeholder="Choose one.." onclick="fillupcong()">
									<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
						<?php
						foreach ($city_municipality as $citymun):
						
						
						echo "<option value='".$citymun['congid']."'>".$citymun['citymunicipality'].", ".$citymun['cong_province']."</option>";
						
						endforeach;
						?>
													
													
                                                </select>
                                            </div>
                                        </div>
						<input type="hidden" id="towncity">
						<div class="row"></div>
						<!--<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Town/City</label>
							<div class="col-md-8">
								<input type="text" id="towncity" class="form-control" placeholder="">
								
							</div>
						</div>
						-->
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
									<option value="ILOCOS NORTE D1">ILOCOS NORTE D1</option>
									<option value="ILOCOS NORTE D2">ILOCOS NORTE D2</option>
									<option value="ILOCOS SUR D1">ILOCOS SUR D1</option>
									<option value="ILOCOS SUR D2">ILOCOS SUR D2</option>
									<option value="LA UNION D1">LA UNION D1</option>
									<option value="LA UNION D2">LA UNION D2</option>
									<option value="PANGASINAN D1">PANGASINAN D1</option>
									<option value="PANGASINAN D2">PANGASINAN D2</option>
									<option value="PANGASINAN D3">PANGASINAN D3</option>
									<option value="PANGASINAN D4">PANGASINAN D4</option>
									<option value="PANGASINAN D5">PANGASINAN D5</option>
									<option value="PANGASINAN D6">PANGASINAN D6</option>
									
								</select>
								
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group hidden">
							<label class="col-md-3 control-label" for="state-normal">Zip Code</label>
							<div class="col-md-8">
								<input type="text" id="zipcode" class="form-control" placeholder="">
								
							</div>
						</div>
						
						<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">School Name</label>
                                            <div class="col-md-8">
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
								<select id="course" name="course" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
									<?php
									foreach ($courses_list as $courses):
									
									
									echo "<option value='".$courses['coursename']."'>".$courses['coursename']."</option>";
									
									endforeach;
									?>
								<!-- <input type="text" id="course" class="form-control" placeholder=""> -->
							</select>
						</div>	
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
										<label class="col-md-3 control-label" for="state-normal">Last School Attended</label>
							<div class="col-md-8">
								<input type="text" id="hsgraduated" class="form-control" placeholder="">
								
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
								<!-- end tab content -->
						
			<div class="tab-pane" id="block-tabs-profile">
			<!-- start content -->
			<div class="row">
			<div class="form-group">
			
							<label class="col-md-3 control-label" for="state-normal">Father's Status</label>
							<div class="col-md-8">
								<select id="fstatus" class="form-control">
											<option value="Living">Living</option>
											<option value="Deceased">Deceased</option>
								</select>
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Father's Name</label>
							<div class="col-md-8">
								<input type="text" id="father" class="form-control" placeholder="First Name" autocomplete="off">
								<input type="text" id="father_m" class="form-control" placeholder="Middle Name" autocomplete="off">
								<input type="text" id="father_l" class="form-control" placeholder="Last Name" autocomplete="off">
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Occupation</label>
							<div class="col-md-8">
								<input type="text" id="foccupation" class="form-control" placeholder="">
								
							</div>
							
							<label class="col-md-3 control-label" for="state-normal">Mother's Status</label>
							<div class="col-md-8">
								<select id="mstatus" class="form-control">
											<option value="Living">Living</option>
											<option value="Deceased">Deceased</option>
								</select>
								
							</div>
							<label class="col-md-3 control-label" for="state-normal">Mother's Name</label>
							<div class="col-md-8">
								<input type="text" id="mother" class="form-control" placeholder="First Name" autocomplete="off">
								<input type="text" id="mother_m" class="form-control" placeholder="Middle Name" autocomplete="off">
								<input type="text" id="mother_l" class="form-control" placeholder="Last Name" autocomplete="off">
								
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
								<option value="2023">2023</option>
								<option value="2022">2022</option>
								<option value="2021">2021</option>
								<option value="2020">2020</option>
								<option value="2019" selected="selected">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
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
				
			</div>
			<div class="row">
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">DSWD 4Ps</label>
							<div class="col-md-4">
								<select id="dswd4p" class="form-control">
								<option value="NO">NO</option>
								<option value="YES">YES</option>
								
								</select>
								
							</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">Date Received</label>
							<div class="col-md-4">
								
								<input type="text" id="datereceived"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" autocomplete="off">
							</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
							<label class="col-md-3 control-label" for="state-normal">LRN No.</label>
							<div class="col-md-6">
								
								<input type="text" class="form-control" id="lrn_no" placeholder="">
							</div>
				</div>
			</div>
			
			
				
			
			</div>
			
			
			
                                        
	</div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savesingleapplicant();" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->				
			

			
			
			
			
			
			
			
			
			
			
			
		</div>
		<!-- END Page Content -->

			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


