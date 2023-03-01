
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
				<?php $this->load->view('central_office/central_leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php $this->load->view('inc/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->
			
			 <!-- Regular Modal -->
                <div id="addusermodal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Add User</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
						
                        <label class="col-md-3 control-label" for="state-normal">School Year</label>
                        <div class="col-md-7">
                            <input type="text" id="school_year" name="state-normal" class="form-control" tabindex="0" placeholder="2017-2018">
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
								<i>*Save and Add empty SY Records for All Programs in All regions</i>
                                <button type="button" id="saveuser" class="btn btn-effect-ripple btn-primary" onclick="savesy();">Save</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
			
			 <!-- Regular Modal change password -->
                <div id="changepassword" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Change password</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">New Password</label>
                        <div class="col-md-7">
                            <input type="password" id="newpassword" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updatepassword();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				<!-- Regular Linked Employee -->
                <div id="linkemployee" class="modal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Change password</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="linkuid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">New Password</label>
                        <div class="col-md-7">
                           <select id="linkeid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
						<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
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
                                
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updatelinkeid();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
            
	<div class="block full">
        <div class="block-title">
		<h5>SY List</h5>
			<button type="button" id="adduser" class="pull-right btn btn-effect-ripple btn-primary" href="#addusermodal" data-toggle="modal">Add School Year</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>School Year</th>
                        <th>HEI Collection Access</th>
                        <th>Delete Status</th>
						
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($sy_list as $schoolyear):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				echo "<td>".$schoolyear['school_year']."</td>";
				echo "<td>";
				if($schoolyear['collection_status']==1){
						
						echo "<span class='label label-success'>Active</span>";
				}else{
						echo "<span class='label label-default'>Disabled</span>";
				}
				echo "</td>";
				
				echo "<td>";
				if($schoolyear['aydeleted']==1){
						echo "<span class='label label-danger'>Deleted</span>";
				}else{
						echo "<span class='label label-success'>Not Deleted</span>";
				}
				echo "</td>";
				
			
				echo "<td class='center'>";
				
				$yearstr = $schoolyear['school_year'];
				
					echo "<button class='btn btn-primary notification' title='Enable' id='notification' onClick='enablesy(".$schoolyear['syid'].",\"".$yearstr."\")'><i class='fa fa-check-square-o'></i></button>";
					echo "<button class='btn btn-default notification' title='Disable' id='notification' onClick='disablesy(".$schoolyear['syid'].")'><i class='fa fa-times'></i></button>";
					echo "<button class='btn btn-danger notification' title='Delete' id='notification' onClick='deletesy(".$schoolyear['syid'].")'><i class='fa fa-times'></i></button>";
				
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
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


