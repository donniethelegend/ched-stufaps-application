
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
			<?php //$this->load->view('heidirectory/subnav_view'); ?>
			
			<!--search filter -->
			
			<!-- Search Results Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="header-section">
                                        <form action="faculty" method="post" onsubmit="return true;">
                                          <!--   <div class="col-md-12">
												<input type="text" name="facultynamesearch" id="facultynamesearch" class="form-control" placeholder="Search Faculty Lastname, Firstname MI..." value="<?php echo $facultysearch;?>">
												
                                               
												</div>
												
                                           
											<div class="text-center">
											<button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Search Faculty</button>
											</div> -->
								<div class="row"></div>
                                            <div class="form-group">
												<label class="col-md-1 control-label" for="state-normal">HEI</label>
												
												<div class="col-md-11">
                                                <select id="search_instcode" name="search_instcode" class=" select-select2" data-placeholder="Choose categories.." style="width: 100%;">
												
												<?php
													foreach ($hei_list as $heis):
													$heiname = strtoupper($heis['instname']);
													if($heis['instcode']==$search_instcode_post){
														$selected_hei = "selected=selected";
													}else{
														$selected_hei = "";
													}
													echo "<option value='".$heis['instcode']."' $selected_hei>".$heis['instcode']." - $heiname</option>";
													
													endforeach;
												?>
                                                </select>
												</div>
												
                                            </div>
												<div class="row"></div>
											
											
											<div class="row" style="height:20px;"></div>
											
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Search Database</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Search Results Header -->
			
			
			
			
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->

	<div class="block full">
        <div class="block-title">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="addrecord();">Add Record</a>
			  <?php
				if($search_instcode_post!=""){
					echo "<a href='".base_url()."faculty/heifaculty/$search_instcode_post' class='btn btn-effect-ripple btn-primary' data-toggle='modal' target='_blank'><i class='hi hi-download-alt'></i> Download HEI Faculty</a>";
				}
			
				?>
			  <!--  <a href="<?=base_url()?>faculty/allfaculty" class="btn btn-effect-ripple btn-success" data-toggle="modal" target="_blank"><i class="hi hi-download-alt"></i> Download All</a> -->
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                       
						<th>HEI</th>
						<th>Status</th>
						<th>Faculty Name</th>
                        <th>Description</th>
						<th>Gender</th>
						<th>Degree</th>
						<th>Program</th>
						<th>Masters</th>
						<th>Doctorate</th>
						<th>License</th>
						<th>Tenure</th>
						<th>Rank</th>
						<th>Teaching</th>
						<th>Subjects</th>
						<th>Salary</th>
						
						
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($faculty_list as $facultylist):
				
				if($facultylist['faculty_status']=="INACTIVE"){
					$btnclass = "btn-danger";
				}else{
					$btnclass = "btn-primary";
				}
				//$instcode = strtoupper($buildings['buildingid']);
				echo "<tr>";
				
				echo "<td><a href='heidirectory/institution/".$facultylist['instcode']."'>".$facultylist['instname']."</a></td>";
				echo "<td>".$facultylist['faculty_status']."</td>";
				echo "<td><a href='#modal-regular' class='btn btn-effect-ripple $btnclass' data-toggle='modal' onclick='editfaculty(".$facultylist['facultyid'].");'>".$facultylist['faculty_name']." <i class='fa fa-pencil'></i></a></td>";
				echo "<td>".$facultylist['fullpart_description']."</td>";
				echo "<td>".$facultylist['faculty_gender']."</td>";
				echo "<td>".$facultylist['highestdegree_description']."</td>";
				echo "<td>".$facultylist['faculty_programname']."</td>";
				echo "<td>".$facultylist['faculty_masters']."</td>";
				echo "<td>".$facultylist['faculty_doctorate']."</td>";
				echo "<td>".$facultylist['license_description']."</td>";
				echo "<td>".$facultylist['tenure']."</td>";
				echo "<td>".$facultylist['rank_description']."</td>";
				echo "<td>".$facultylist['teaching_description']."</td>";
				echo "<td>".$facultylist['subjects']."</td>";
				echo "<td>".$facultylist['salary_description']."</td>";
				
				

				echo "<td><button data-toggle='modal' data-target='#modal-regular' class='btn btn-primary hidden' title='Edit Contact'  onClick='editeteeap(".$facultylist['facultyid'].")'><i class='fa fa-edit'></i></button>";
				if($this->session->userdata('usertype')!="Staff"){
					echo "<button  onclick='deletefaculty(".$facultylist['facultyid'].");' type='reset' class='btn btn-effect-ripple btn-danger' title='Delete Faculty'><i class='fa fa-user-times'></i></button></td>";
				}
				echo "</tr>";
				
				endforeach;
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
	<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    <input type="hidden" id="eteeapid">

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
									<div class="form-group">
									<input type="hidden" id="edit_facultyid">
                                            <label class="col-md-3 control-label" for="example-select2">HEI</label>
                                            <div class="col-md-8">
                                                <select id="instcode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
						<?php
						foreach ($hei_list as $heis):
						$heiname = strtoupper($heis['instname']);
						
						echo "<option value='".$heis['instcode']."'>$heiname</option>";
						
						endforeach;
						?>
													
													
                                                </select>
                                            </div>
                                        </div>
                                        
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Faculty Name *</label>
                                            <div class="col-md-8">
                                                <input type="text" id="faculty_name" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Full-Time/ Part-Time</label>
                                            <div class="col-md-8">
                                                <select id="faculty_full_part_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<?php
						foreach ($fullpart as $fullpart_list):
						
							
						
						echo "<option value='".$fullpart_list['fullpartcode']."'>(".$fullpart_list['fullpartcode']. ") ".$fullpart_list['fullpart_description']."</option>";
						
						endforeach;
						?>
						
												</select>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Gender</label>
                                            <div class="col-md-8">
                                                <select id="faculty_gender" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
													<option value="Male">(1) Male</option>
													<option value="Female">(2) Female</option>
												</select>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Teaching Discipline Code</label>
                                            <div class="col-md-6">
                                                <input type="text" id="teaching_discipline" name="state-normal" class="form-control" value="">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Highest Degree</label>
                                            <div class="col-md-8">
                                                <select id="highest_degree_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<?php
						foreach ($highdegree as $highest_degree):
						
						echo "<option value='".$highest_degree['highestdegreecode']."'>(".$highest_degree['highestdegreecode'].") ".$highest_degree['highestdegree_description']."</option>";
						
						endforeach;
						?>
						
												</select>
												
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Bachelors Degree</label>
											
                                            <div class="col-md-6">
												<input type="text" id="faculty_programname" placeholder="Program" class="form-control">
                                               <!-- <select id="faculty_programcode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						//foreach ($highdegree as $highest_degree):
						
						//echo "<option value='".$highest_degree['highestdegreecode']."'>(".$highest_degree['highestdegreecode'].") ".$highest_degree['highestdegree_description']."</option>";
						
						//endforeach;
						?>
						
												</select>-->
                                            </div>
											<div class="col-md-3">
												<input type="text" id="faculty_programcode" placeholder="Code" class="form-control">
											</div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Masters Degree</label>
											
                                            <div class="col-md-6">
											<input type="text" placeholder="Program" id="faculty_masters" class="form-control">
                                               <!-- <select id="faculty_masterscode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						//foreach ($highdegree as $highest_degree):
						
						//echo "<option value='".$highest_degree['highestdegreecode']."'>(".$highest_degree['highestdegreecode'].") ".$highest_degree['highestdegree_description']."</option>";
						
						//endforeach;
						?>
						
												</select> -->
                                            </div>
											<div class="col-md-3">
												<input type="text" id="faculty_masterscode" placeholder="Code" class="form-control">
											</div>
											
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Doctorate Degree</label>
											
                                            <div class="col-md-6">
											<input type="text" placeholder="Program" id="faculty_doctorate" class="form-control">
                                                <!-- <select id="faculty_doctoratecode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						//foreach ($highdegree as $highest_degree):
						
						//echo "<option value='".$highest_degree['highestdegreecode']."'>(".$highest_degree['highestdegreecode'].") ".$highest_degree['highestdegree_description']."</option>";
						
						//endforeach;
						?>
						
												</select> -->
                                            </div>
											<div class="col-md-3">
												<input type="text" placeholder="Code" id="faculty_doctoratecode" class="form-control">
											</div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Professional License</label>
                                            <div class="col-md-8">
                                                <select id="professional_license_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						foreach ($licensecode as $license_list):
						
						echo "<option value='".$license_list['licensecode']."'>(".$license_list['licensecode'].") ".$license_list['license_description']."</option>";
						
						endforeach;
						?>
						
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Tenure</label>
                                            <div class="col-md-8">
                                                <select id="tenure" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option value="Permanent">(1) Permanent</option>
												<option value="Probationary">(2) Probationary</option>
												<option value="Casual">(3) Casual</option>
												<option value="Contractual">(4) Contractual</option>
													
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Faculty Rank</label>
                                            <div class="col-md-8">
                                                <select id="rank_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						foreach ($ranklist as $rank_list):
						
						echo "<option value='".$rank_list['rankcode']."'>(".$rank_list['rankcode'].") ".$rank_list['rank_description']."</option>";
						
						endforeach;
						?>
						
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Teaching Load</label>
                                            <div class="col-md-8">
                                                <select id="teaching_load_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						foreach ($teachingload as $teachinglist):
						
						echo "<option value='".$teachinglist['teachingloadcode']."'>(".$teachinglist['teachingloadcode'].") ".$teachinglist['teaching_description']."</option>";
						
						endforeach;
						?>
						
												</select>
                                            </div>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Subjects</label>
                                            <div class="col-md-8">
												<textarea id="subjects" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Annual Salary</label>
                                            <div class="col-md-8">
                                                <select id="annual_salary_code" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option></option>
							<?php
						foreach ($annualsalary as $salary_list):
						
						echo "<option value='".$salary_list['salarycode']."'>(".$salary_list['salarycode'].") ".$salary_list['salary_description']."</option>";
						
						endforeach;
						?>
						
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Status</label>
                                            <div class="col-md-8">
                                                <select id="faculty_status" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												<option value="ACTIVE">ACTIVE</option>
												<option value="INACTIVE">INACTIVE</option>
												
												</select>
                                            </div>
                                        </div>
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savefaculty();" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatefaculty();" id="updatebutton">Update</button>
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


