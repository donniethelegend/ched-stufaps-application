
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
                                <h3 class="modal-title"><strong>Add Supervisor</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        						
						<label class="col-md-3 control-label" for="state-normal">Name*</label>
                        <div class="col-md-7">
                            <input type="text" id="supervisor_name" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="saveuser" class="btn btn-effect-ripple btn-primary" onclick="savesupervisor();">Save</button>
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updateuser();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				<!-- Regular Modal -->
                <div id="deletemodal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Delete</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        						
						<label class="col-md-3 control-label" for="state-normal">Password</label>
						<input type="hidden" id="deletesuperid">
                        <div class="col-md-7">
                            <input type="password" id="delete_password" name="state-normal" class="form-control" tabindex="0" autocomplete="off" >
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="saveuser" class="btn btn-effect-ripple btn-primary" onclick="deletesuper();">delete</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
			
			
	<div class="block full">
        <div class="block-title">
		<h5>Supervisor List</h5>
			<button type="button" id="adduser" class="pull-right btn btn-effect-ripple btn-primary" href="#addusermodal" data-toggle="modal" onclick="addsupervisor();">Add Supervisor</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>Supervisor Name</th>
						
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($supervisor_list as $supervisors):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				echo "<td>".$supervisors['supervisorname']."</td>";
				
				
				/*if($users['linkeid']==0){
					$linkedeid = "All";
				}else{
					$linkedeid = $users['fname']." ".$users['lname'];
				}
				echo "<td>".$linkedeid."</td>";
			*/
			
				echo "<td class='center'>";
				/*if($linkedeid!="All"){
					echo " <button class='btn btn-primary' title='Edit User'  onClick='linkeidmodal(".$users['uid'].")'  data-toggle='modal' data-target='#linkemployee'><i class='fa fa-user'></i></button> ";
				}
				)*/
				
				echo "<button class='btn btn-primary' title='Edit User'  onClick='edituser(".$supervisors['supervisorid'].")'  data-toggle='modal' data-target='#addusermodal'><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletesupervisor(".$supervisors['supervisorid'].")'><i class='fa fa-times'></i></button>
				</td>";
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


