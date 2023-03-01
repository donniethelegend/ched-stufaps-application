
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
						<?php //$this->load->view('programlist/subnav_view'); ?>
						
						<!--search filter -->
			
			<!-- Search Results Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="header-section">
                                        <form action="programlist" method="post" onsubmit="return true;">
                                             <div class="form-group">
												
							<div class="col-md-12">
												<input type="text" name="programnamesearch" id="programnamesearch" class="form-control" placeholder="Search Program Name..." value="<?php echo $search_program;?>">
												
                                               
												</div>
												
                                            </div>
											<div class="text-center">
											
											<button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Search Program</button>
											</div> 
								<div class="row"></div>
                                            <div class="form-group">
												<label class="col-md-1 control-label" for="state-normal">HEI</label>
												
												<div class="col-md-11">
                                                <select id="search_instcode" name="search_instcode" class=" select-select2" data-placeholder="Choose HEI.." style="width: 100%;">
												<option></option>
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
											
											
											<div class="row" ></div>
											
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Show Programs</button>
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
            <button type="submit" class="btn btn-effect-ripple btn-primary"  href="#addprogram" data-toggle="modal"><i class="fa fa-plus"></i> Add Program</button> 
			<?php
				if($search_instcode_post!=""){
					echo "<a href='".base_url()."programlist/heiprogram/$search_instcode_post' class='btn btn-effect-ripple btn-primary' data-toggle='modal' target='_blank'><i class='hi hi-download-alt'></i> Download HEI Program</a>";
				}
			
			?>
			
			
			<a href="<?=base_url()?>programlist/allprograms" class="btn btn-effect-ripple btn-success" data-toggle="modal" target="_blank"><i class="hi hi-download-alt"></i> Download All Programs</a>
			
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th style="width:200px;">HEI</th>
                        
                        <th>Program</th>
						<th>Major</th>
						<th>Supervisor</th>
						<th>Authority</th>
						<th>Discipline</th>
						<th>Program Level</th>
						<th>Status</th>
						<th>Remarks</th>
						
                       <th class="text-center" style="width: 75px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($allprograms as $prog):
				
				if($prog['pstatuscode']=="DO" || $prog['pstatuscode']=="3"){
					$class_highlight = "class='danger'";
					$status_button = "btn-danger";
					$status_title = "DO - Program has been discontinued and has no students.";
				}
				if($prog['pstatuscode']=="NO" || $prog['pstatuscode']=="4"){
					$class_highlight = "class='danger'";
					$status_button = "btn-danger";
					$status_title = "NO - Program has not been officially discontinued but has no students.";
				}
				if($prog['pstatuscode']=="PO" || $prog['pstatuscode']=="2"){
					$class_highlight = "class='danger'";
					$status_button = "btn-danger";
					$status_title = "PO - Program is being phased out but still has students.";
				}
				if($prog['pstatuscode']=="CO" || $prog['pstatuscode']=="1"){
					$class_highlight = "";
					$status_button = "btn-primary";
					$status_title = "CO - Program currently offered and accepting students.";
				}
				if($prog['pstatuscode']=="NA" || $prog['pstatuscode']=="5"){
					$class_highlight = "";
					$status_button = "btn-primary";
					$status_title = "NA - Not applicable, program is not operated";
				}
				
				if($prog['pstatuscode']==""){
					$class_highlight = "";
					$status_button = "btn-primary";
					$status_title = "";
				}
				
				
				//".$prog['pstatuscode']."
				
				
				
				
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr $class_highlight>";
				echo "<td><a href='heidirectory/institution/".$prog['instcode']."'>".$prog['instname']."</a></td>";
				
				echo "<td><strong><a href='programlist/details/".$prog['programid']."'>".$prog['mainprogram']."</a></strong></td>";
				echo "<td>".$prog['major']."</td>";
				echo "<td>".$prog['supervisor']."</td>";
				echo "<td>".$prog['authcat']." No.  ".$prog['authserial'].", s. ".$prog['authyear']."</td>";
				echo "<td>".$prog['discipline_description']."</td>";
				echo "<td>".$prog['programlevel']."</td>";
				echo "<td> <a href='javascript:void(0)' class='btn btn-effect-ripple $status_button' data-toggle='tooltip' title='$status_title' data-theme-navbar='navbar-inverse' data-theme-sidebar=''>".$prog['pstatuscode']."</a></td>";
				echo "<td>".$prog['remarks']."</td>";
				
				echo "<td><a  href='programlist/details/".$prog['programid']."' class='btn btn-effect-ripple btn-primary' title='Delete'><i class='fa fa-eye'></i></a> <button  onclick='deleteprogram(".$prog['programid'].");' type='reset' class='btn btn-effect-ripple btn-danger' title='Delete'><i class='fa fa-times'></i></button> ";
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
				<div class="form-group hidden">
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
<div class="form-group hidden">
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

<div class="form-group hidden">
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


