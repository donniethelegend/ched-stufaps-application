
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                
				
				<!--rightsidebar here-->
				<?php //$this->load->view('rightsidebar_view'); ?>
				
                <!--main sidebar here -->
				<?php $this->load->view('hei_leftsidebar_view'); ?>

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
            
	<div class="block full">
        
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
				
                        
                        <th>Program</th>
						<th>Major</th>
						<th>Supervisor</th>
						<th>Authority</th>
						<th>Discipline</th>
						<th>Program Level</th>
						<th>Remarks</th>
                      
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($allprograms as $prog):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				
				echo "<td><a href='heiprogramlist/details/".$prog['programid']."'>".$prog['mainprogram']."</a></td>";
				echo "<td>".$prog['major']."</td>";
				echo "<td>".$prog['supervisor']."</td>";
				echo "<td>".$prog['authcat']." No.  ".$prog['authserial'].", s. ".$prog['authyear']."</td>";
				echo "<td>".$prog['discipline']."</td>";
				echo "<td>".$prog['programlevel']."</td>";
				echo "<td>".$prog['remarks']."</td>";
				//echo "<td><button  onclick='deleteprogram(".$prog['programid'].");' type='reset' class='btn btn-effect-ripple btn-danger' title='Delete'><i class='fa fa-times'></i></button> ";
				//echo "<button  onclick='deletebuilding(".$prog['programid'].");' type='reset' class='btn btn-effect-ripple btn-info' title='Graduate'><i class='fa fa-graduation-cap'></i></button></td>";
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
			<div id="addprogram" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Program</strong></h3>
						</div>
						<div class="modal-body">
							
								<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
			<div class="form-group">
												<label class="col-md-3 control-label" for="state-normal">HEI</label>
												
												<div class="col-md-9">
                                                <select id="program_instcode" name="program_instcode" class=" select-select2" data-placeholder="Choose categories.." style="width: 100%;">
												
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
											
				<div class="form-group">
					<label class="col-md-3 control-label" for="state-normal">Program Name*</label>
					<div class="col-md-8">
						<input type="text" id="newprogramname" name="state-normal" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="state-normal">Authority</label>
					<div class="col-md-4">
						<input type="text" id="newauthcat" name="state-normal" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="state-normal">Serial</label>
					<div class="col-md-4">
						<input type="text" id="newauthserial" name="state-normal" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="state-normal">Year</label>
					<div class="col-md-4">
						<input type="text" id="newauthyear" name="state-normal" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="state-normal">Major</label>
					<div class="col-md-6">
						<input type="text" id="newmajor" name="state-normal" class="form-control">
					</div>
				</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="state-normal">Supervisor</label>
				<div class="col-md-8">
					<select id="newselectsupervisor" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
					<?php
													
					echo "<option value='".$application_details['name']."'>".$application_details['name']."</option>";
					
					
					foreach ($employee_list as $technical):
					
					
					echo "<option value='".$technical['name']."'>".$technical['name']."</option>";
					
					endforeach;
					?>
					<!--
					<option value="Angelica Dolores">Angelica Dolores</option>
					<option value="Arnold Ancheta">Arnold Ancheta</option>
					<option value="Danilo Bose">Danilo Bose</option>
					<option value="Lynette Cabanban">Lynette Cabanban</option>
					<option value="Mayrose Quezon">Mayrose Quezon</option>
					<option value="Myrelle Mina">Myrelle Mina</option>
					<option value="Reynaldo Agcaoili">Reynaldo Agcaoili</option>
					<option value="Rogelio Galera">Rogelio Galera</option>
					-->
				</select>
				</div>
			</div>
<div class="form-group">
				<label class="col-md-3 control-label" for="state-normal">Discipline</label>
				<div class="col-md-8">
					<select id="newselectdiscipline" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
					<option value="NONE">NONE</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
					<?php
					//echo "<option value='".$details->heitype."' selected>".$details->heitype."</option>";
					?>
					<option value="Agriculture, Forestry and Fisheries">Agriculture, Forestry and Fisheries</option>
					<option value="Architecture and Town Planning">Architecture and Town Planning</option>
					<option value="Business Administration and related">Business Administration and related</option>
					<option value="Education Science and Teacher Training">Education Science and Teacher Training</option>
					<option value="Engineering  and Technology">Engineering  and Technology</option>
					<option value="Fine and Applied Arts">Fine and Applied Arts</option>
					<option value="General">General</option>
					<option value="Home Economics">Home Economics</option>
					<option value="Humanities">Humanities</option>
					<option value="IT and Related">IT and Related</option>
					<option value="Law, Justice and Jurisrprudence">Law, Justice and Jurisrprudence</option>
					<option value="Maritime Education">Maritime Education</option>
					<option value="Mass Communication and Documentation">Mass Communication and Documentation</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Medical and Allied">Medical and Allied</option>
					<option value="Natural Science">Natural Science</option>
					<option value="Other Disciplines">Other Disciplines</option>
					<option value="Religion and Theology">Religion and Theology</option>
					<option value="Service Trades">Service Trades</option>
					<option value="Social and Behavioral Sciences">Social and Behavioral Sciences</option>
					<option value="Trade, Craft and Industrial">Trade, Craft and Industrial</option>
					
				</select>
			</div>	
</div>		

<div class="form-group">
				<label class="col-md-3 control-label" for="state-normal">Discipline 2</label>
				<div class="col-md-8">
					<select id="newselectdiscipline2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
					<option value="NONE">NONE</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
					<?php
					//echo "<option value='".$details->heitype."' selected>".$details->heitype."</option>";
					?>
					<option value="Agriculture, Forestry and Fisheries">Agriculture, Forestry and Fisheries</option>
					<option value="Architecture and Town Planning">Architecture and Town Planning</option>
					<option value="Business Administration and related">Business Administration and related</option>
					<option value="Education Science and Teacher Training">Education Science and Teacher Training</option>
					<option value="Engineering  and Technology">Engineering  and Technology</option>
					<option value="General">General</option>
					<option value="IT and Related">IT and Related</option>
					<option value="Law, Justice and Jurisrprudence">Law, Justice and Jurisrprudence</option>
					<option value="Maritime Education">Maritime Education</option>
					<option value="Mass Communication and Documentation">Mass Communication and Documentation</option>
					<option value="Medical and Allied">Medical and Allied</option>
					<option value="Natural Science">Natural Science</option>
					<option value="Other Disciplines">Other Disciplines</option>
					<option value="Religion and Theology">Religion and Theology</option>
					<option value="Service Trades">Service Trades</option>
					<option value="Social and Behavioral Sciences">Social and Behavioral Sciences</option>

					
				</select>
			</div>	
</div>		
	
			
				
				
			</form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addnewprogram();">Add New</button>
								<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
				</div>
			</div>
			
		</div> <!-- END Regular Modal -->	
		
						
						
						
						
						
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->


