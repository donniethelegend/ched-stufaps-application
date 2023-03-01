
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
        <div class="block-title">
            <a href="#dean-modal" onclick="addrecord()" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Dean</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Deans Name</th>
						<th>Designation</th>
                        <th>Assignment</th>
						<th>Institution</th>
						<th>Baccalaureate</th>
						<th>Masters</th>
						<th>Doctoral</th>
						<th>Status</th>
						<th>Remarks</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($deans_list as $dean):
				echo "<tr>";
				echo "<td><a href='#dean-modal' class='btn btn-effect-ripple btn-primary' data-toggle='modal' onclick='editdean(".$dean['deanid'].");'>".$dean['deansname']." <i class='fa fa-pencil'></i></a></td>";
				//echo "<td class='text-center'>".$dean['deansname']."</td>";
				echo "<td>".$dean['designation']."</td>";
				echo "<td>".$dean['assignment']."</td>";
				echo "<td>".$dean['instname']."</td>";
				echo "<td>".$dean['baccalaureate']."</td>";
				echo "<td>".$dean['masters']."</td>";
				echo "<td>".$dean['doctoral']."</td>";
				echo "<td>".$dean['dean_status']."</td>";
				echo "<td>".$dean['dean_remarks']."</td>";
				
				
				echo "<td><button  onclick='deletedean(".$dean['deanid'].");' type='reset' class='btn btn-effect-ripple btn-danger' title='Delete Dean'><i class='fa fa-user-times'></i></button></td>";
				echo "</td>";
				
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
							<h3 class="modal-title"><strong>Add Contact Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
									
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Contact Name *</label>
                                            <div class="col-md-6">
                                                <input type="text" id="contactname" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Position</label>
                                            <div class="col-md-6">
                                                <input type="text" id="position" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Address</label>
                                            <div class="col-md-6">
                                               <textarea class="form-control" id="address"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Tel No.</label>
                                            <div class="col-md-6">
                                                <input type="text" id="telno" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Fax</label>
                                            <div class="col-md-6">
                                                <input type="text" id="fax" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Email</label>
                                            <div class="col-md-6">
                                                <input type="text" id="email" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Website</label>
                                            <div class="col-md-6">
                                                <input type="text" id="website" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
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
                                            <label class="col-md-3 control-label" for="example-select2">Account</label>
                                            <div class="col-md-6">
                                                <select id="accountid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                           <?php
						foreach ($account_list as $accounts):
						$accountname = strtoupper($accounts['accountname']);
						
						echo "<option value='".$accounts['accountid']."'>$accountname</option>";
						
						endforeach;
						?>
													
													
                                                </select>
                                            </div>
                                        </div>
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savesinglecontact();">Save</button>
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
	
	
	
	<!-- Regular Modal -->
			<div id="dean-modal" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Dean Names</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
									<input type="hidden" id="edit_deanid">
									
									
									<input type="hidden" id="dean_instcode" value="<?php echo $search_instcode_post;?>">
												
                                           
											
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Deans Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="deansname" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Designation</label>
                                            <div class="col-md-6">
                                                <input type="text" id="designation" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Assignment</label>
                                            <div class="col-md-6">
                                                <input type="text" id="assignment" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Baccalaureate</label>
                                            <div class="col-md-6">
                                                <input type="text" id="baccalaureate" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Masters</label>
                                            <div class="col-md-6">
                                                <input type="text" id="masters" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Doctoral</label>
                                            <div class="col-md-6">
                                                <input type="text" id="doctoral" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Status</label>
                                            <div class="col-md-6">
                                                <select id="dean_status" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
												<option value="ACTIVE" selected="selected">ACTIVE</option>
												<option value="INACTIVE">INACTIVE</option>
												<option value="DELETED">DELETED</option>
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Remarks</label>
                                            <div class="col-md-6">
                                              <textarea class="form-control" id="dean_remarks"></textarea>
                                            </div>
                                        </div>
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="savedean();">Save</button>
							<button type="button" id="updatebutton" class="btn btn-effect-ripple btn-primary" onclick="updatedean();">Update</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->	

	
		
	</div>
	<!-- END Main Container -->
	
	
	
</div>
<!-- END Page Container -->


