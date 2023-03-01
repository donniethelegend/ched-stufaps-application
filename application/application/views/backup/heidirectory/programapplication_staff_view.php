
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

			
			 <!-- Tickets Content -->
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
							<input type="hidden" id="baseurl" value="<?=base_url()?>">
                                <!-- Menu Block -->
                                <div class="block full">
                                    <!-- Menu Title -->
                                    <div class="block-title clearfix">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <h2>Filters</h2>
                                    </div>
                                    <!-- END Menu Title -->

                                    <!-- Menu Content -->
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="#modal-regular" class="btn btn-effect-ripple btn-regular" data-toggle="modal">Add Application</a>
                                        </li>
										<li class="<?php echo $clean_status;?>">
                                            <a href="<?=base_url()?>programapplication">
                                                <span class="badge pull-right"><?php echo $totalrecords;?></span>
                                                <i class="fa fa-fw fa-ticket icon-push"></i> <strong>All</strong>
                                            </a>
                                        </li>
										<?php
										
										foreach($filter_list as $filters):
											if($filters['status']==$clean_status){
												$selected_class = "active";
											}else{
												$selected_class = "";
											}
											echo "<li class=".$selected_class.">";
                                            echo "<a href='".base_url()."programapplication/filter/".$filters['status']."'>";
                                            echo "   <span class='badge pull-right'>".$filters['noapp']."</span>";
                                            echo "   <i class='fa fa fa-file-text-o icon-push'></i> <strong>".$filters['status']."</strong>";
                                            echo "</a>";
											echo "</li>";
										
										endforeach;
										
										?>
                                        
										
                                        
                                    </ul>
                                    <!-- END Menu Content -->
                                </div>
                                <!-- END Menu Block -->

                                
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <!-- Tickets Block -->
                                <div class="block">
                                    <!-- Tickets Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#tickets-list">Program Application List</a></li>
                                           
                                        </ul>
                                    </div>
                                    <!-- END Tickets Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <!-- Tickets List -->
                                        <div class="tab-pane active" id="tickets-list">
                                            <div class="block-content-full">
                                                <div class="table-responsive remove-margin-bottom">
                                                     <table id="program-application-list-table" class="table table-striped table-bordered table-vcenter table-hover">
                                                        <thead>
                    <tr>
                        
						<th>ID</th>
						<th>Program Name/Application</th>
						<th>HEI</th>
                       
						<th>Year Level</th>
						<th >Date Received</th>
						<th>School Year</th>
						<th>Assigned To</th>
						<th>Status</th>
						
                    </tr>
                </thead>
                                                      <tbody>
				
				<?php
				
				foreach ($program_application_list as $application_list):
				$instcode = strtoupper($application_list['instcode']);
				echo "<tr>";
				echo "<td><strong><a href='".base_url()."programapplication/details/".$application_list['progappid']."'>".$application_list['progappid']."</a></strong></td>";
				echo "<td><strong><a href='".base_url()."programapplication/details/".$application_list['progappid']."'>".$application_list['programname']."</a></strong></td>";
				echo "<td><a href='".base_url()."heidirectory/institution/$instcode'>".$application_list['instname']."</a></td>";
				
				echo "<td>".$application_list['yearlevel']."</td>";
				echo "<td>".$application_list['schoolyear']."</td>";
				echo "<td>".$application_list['datereceived']."</td>";
				echo "<td>".$application_list['name']."</td>";
				echo "<td>".$application_list['status']."</td>";
				
				echo "</tr>";
				
				endforeach;
				?>
				
				
				
				
                    
                </tbody>
		</table>
                                                </div>
                                                <div class="text-center">
                                                   <div class="row">&nbsp;</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Tickets List -->

                                       
                            </div>
                        </div>
                        <!-- END Tickets Content -->
						
	<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Add Application Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">HEI</label>
                                            <div class="col-md-6">
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
                                            <label class="col-md-3 control-label" for="state-normal">Date Received</label>
                                            <div class="col-md-6">
                                                <input type="text" id="datereceived" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Program Name / Application *</label>
                                            <div class="col-md-6">
												<textarea class="form-control" id="programname" style="height:120px;" ></textarea>
                                                
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Year Level</label>
                                            <div class="col-md-6">
                                                <select id="yearlevel" class="form-control">
												<option value=""></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												</select>
                                            </div>
                                        </div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="state-normal">School Year</label>
									<div class="col-md-6">
										<select id="schoolyear" class="form-control">
										<?php
										echo "<option value='".$application_details['schoolyear']."'>".$application_details['schoolyear']."</option>";
										?>
												
												<option value="2016-2017">2016-2017</option>
												<option value="2017-2018">2017-2018</option>
												<option value="2018-2019">2018-2019</option>
												<option value="2019-2020">2019-2020</option>
												
												</select>
									</div>
									 </div>
									<div class="row"></div>
									
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">Assigned To</label>
                                            <div class="col-md-6">
                                                <select id="assigned_to_uid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
													<?php
													foreach ($employee_list as $technical):
													
													
													echo "<option value='".$technical['uid']."'>".$technical['name']."</option>";
													
													endforeach;
													?>
													
													
                                                </select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Status</label>
                                            <div class="col-md-6">
                                                <select id="application_status" class="form-control">
												
												<option value="Acknowledge">Acknowledge</option>
												<option value="GPR Application Checklist Prepared">GPR Application Checklist Prepared</option>
												<option value="Letter of Deficiency">Letter of Deficiency</option>
												<option value="For RQAT Visit">For RQAT Visit</option>
												<option value="Visited by RQAT">Visited by RQAT</option>
												<option value="Awaiting Compliance">Awaiting Compliance</option>
												<option value="Issued Permit or Recognition">Issued Permit or Recognition</option>
												<option value="Defered or Withdrawn">Defered or Withdrawn</option>
												<option value="Forwarded to Central Office">Forwarded to Central Office</option>
												<option value="Denied">Denied</option>
												</select>
                                            </div>
                                        </div>
                                        
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="saveapplication();">Save</button>
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



