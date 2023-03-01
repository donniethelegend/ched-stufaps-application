
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
<div class="row" id="list-details">
                            <div class="col-lg-12">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>PRC Graduate List</h2>
                                    </div>
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
									<div class="col-sm-12">
									  <p><?php //echo form_open_multipart('enrollmentlist/elupload');?> 
	  <form method="post" action="<?php echo base_url();?>enrollmentlist/search">
					   <div class="col-sm-1">
						<label class="col-md-2 control-label" for="example-select2">Student Name</label>
					   </div>
						<div class="col-sm-4">
							<input type="text" id="keyword" name="keyword" class="form-control" value="<?php echo $keyword;?>" >
					   </div>
					 
					   
					   
					   		<div class="col-lg-4">
			<button type="submit" class="btn btn-primary">Search</button>   
			<!--<a href="<?php echo base_url()."enrollmentlist/downloadelresult";?>" class="btn btn-effect-ripple btn-success" ><i class="fa fa-cloud-download"></i> Download Result (.xls)</a> -->
		</div>
		</form>
					   
					   
						
						 
						 
						 <div class="form-group">
                                   
                               
						<!--  <input type = "file" name = "fileupload" id = "fileupload" size = "20" class="form-control"/> -->
						 </div>
						  <div class="form-group">
						 <!-- <input class="btn btn-primary" type = "submit" value = "Upload"/> -->
						<!-- <button type="button" class="btn btn-effect-ripple btn-primary" onclick="uploadel();" id="savebutton">Upload</button> -->
							</div>
					  </form> </p>
									</div>
									<div class="col-sm-6">
										<p>
											
										</p>
									  <p> 
									  
									 </p>
									</div>
									<div class="row"></div>
                                  
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
                            </div>
</div>

 <!-- Small Modal -->
                                    <div id="modal-small" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" id="closemodal" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title"><strong>Import In Progress...</strong></h3>
                                                </div>
                                                <div class="modal-body">
                                                    This window will close automatically after importing.
													<p style="text-align:center;"><i class="fa fa-spinner fa-2x fa-spin text-success"></i></p>
                                                </div>
                                                <div class="modal-footer">
                                                   <!-- <button type="button" class="btn btn-effect-ripple btn-primary">Save</button>
                                                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Small Modal -->
									
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            
			<?php //print_r($heidirectory);?>
			
			<a href="#modal-regular" onclick="addaccountbutton();" class=" hidden btn btn-effect-ripple btn-primary" data-toggle="modal">Add Account</a>
			
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >HEI</th>
                        <th class="text-center" >Student Name</th>
                        <th class="text-center" >Address</th>
						<th class="text-center" >Year Level</th>
                        <th class="text-center" >Semester</th>
                        <th class="text-center" >SY</th>
                        <th class="text-center" >Gender</th>
                        <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
						 <th class="text-center" >subject</th>
                        <th class="text-center" >units</th>
                        <th class="text-center" >Remarks</th>
						
                       <!-- <th style="width:380px;">Course</th>
						<th>Year Level</th>
                        <th>School Year</th>
						<th>File</th>
						<th>Status</th>
                        <th class="text-center" ></th> -->
                    </tr>
                </thead>
                <tbody>
				<?php
				
				/*
				foreach ($result_list as $result):
				//$accountname = strtoupper($acnt['accountname']);
				echo "<tr>";
				echo "<td>".$result['instname']."</td>";
				echo "<td>".$result['nameofstudent']."</td>";
				echo "<td>".$result['eladdress']."</td>";
				echo "<td>".$result['data_year_level']."</td>";
				echo "<td>".$result['data_semester']."</td>";
				echo "<td>".$result['data_school_year']."</td>";

				echo "<td>".$result['gender']."</td>";
				echo "<td>".$result['subject1']."</td>";
				echo "<td>".$result['units1']."</td>";
				echo "<td>".$result['subject2']."</td>";
				echo "<td>".$result['units2']."</td>";
				echo "<td>".$result['subject3']."</td>";
				echo "<td>".$result['units3']."</td>";
				echo "<td>".$result['subject4']."</td>";
				echo "<td>".$result['units4']."</td>";
				echo "<td>".$result['subject5']."</td>";
				echo "<td>".$result['units5']."</td>";
				echo "<td>".$result['subject6']."</td>";
				echo "<td>".$result['units6']."</td>";
				echo "<td>".$result['subject7']."</td>";
				echo "<td>".$result['units7']."</td>";
				echo "<td>".$result['subject8']."</td>";
				echo "<td>".$result['units8']."</td>";
				echo "<td>".$result['subject9']."</td>";
				echo "<td>".$result['units9']."</td>";
				echo "<td>".$result['subject10']."</td>";
				echo "<td>".$result['units10']."</td>";
				echo "<td>".$result['remarks']."</td>";
				/*echo "<td>".$ellist['course']."</td>";
				//echo "<td>".$hei['instformownership']."</td>";
				echo "<td>".$ellist['year_level']."</td>";
				echo "<td>".$ellist['school_year']."</td>";
				echo "<td>".$ellist['filename']." <a href='enrollmentlist/review/".$ellist['elid']."' type='reset' class='btn btn-effect-ripple btn-primary' data-toggle='tooltip' data-placement='top' title='View & Import'><i class='fa fa-cloud-upload'></i></a></td>";
				echo "<td>".$ellist['elstatus']."</td>";
				echo "<td><button data-toggle='modal' data-target='#modal-regular' class='btn btn-primary' title='Edit Contact'  onClick='editaccount(".$ellist['elid'].")'><i class='fa fa-edit'></i></button><button  onclick='deleteaccount(".$ellist['elid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td>";*/
				//echo "</tr>";
				
				//endforeach;
				
				
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


