
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
                                        <h2>Details</h2>
                                    </div>
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
									<div class="col-sm-6">
									  <p><?php //echo form_open_multipart('enrollmentlist/elupload');?> 
					   <form action="" method = "post" id="eluploadform" enctype="multipart/form-data">
					   <div class="col-sm-2">
						<label class="col-md-3 control-label" for="example-select2">HEI</label>
					   </div>
						<div class="col-sm-10">
						<select id="instcode" name="instcode" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." onchange="showprograms(this.value);">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
						<?php
							foreach ($activehei as $heis):
							$heiname = strtoupper($heis['instname']);
							
							echo "<option value='".$heis['instcode']."'>$heiname</option>";
							
							endforeach;
						?>
													
													
                                                </select>
					   </div>
					   
					   <div></div>
					   
					   
					   
					   
						
						 
						 
						 <div class="form-group">
                                   
                               
						 <input type = "file" name = "fileupload" id = "fileupload" size = "20" class="form-control"/> 
						 </div>
						  <div class="form-group">
						 <!-- <input class="btn btn-primary" type = "submit" value = "Upload"/> -->
						 <button type="button" class="btn btn-effect-ripple btn-primary" onclick="uploadel();" id="savebutton">Upload</button>
							</div>
					  </form> </p>
									</div>
									<div class="col-sm-6">
										<p>
											
										</p>
									  <p>Use the <a href="<?php echo base_url()."uploads/template/prcgraduate_template.csv";?>" class="btn btn-effect-ripple btn-primary" > <i class="fi fi-xls"></i> PRC Graduate List Template.csv</a> for uploading the list. Be sure to follow the format inside the template. Upon uploading, it will be verified by our records officer.</p>
									</div>
									<div class="row"></div>
                                  
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
                            </div>
</div>
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
                        <th class="text-center" >Institution Code</th>
                        <th class="text-center" >HEI</th>
                        <th style="width:380px;">Course</th>
						<th>Semester</th>
                        <th>School Year</th>
						<th>File</th>
						<th>Status</th>
                        <th class="text-center" ></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				/*
				foreach ($enrollment_list as $ellist):
				//$accountname = strtoupper($acnt['accountname']);
				echo "<tr>";
				echo "<td>".$ellist['instcode']."</td>";
				echo "<td>".$ellist['instname']."</td>";
				echo "<td>".$ellist['course']."</td>";
				echo "<td>".$ellist['semester']."</td>";
				//echo "<td>".$hei['instformownership']."</td>";
				//echo "<td>".$ellist['year_level']."</td>";
				echo "<td>".$ellist['school_year']."</td>";
				echo "<td><a href='".base_url()."/uploads/enrollment_list/".$ellist['filename']."'>".$ellist['filename']."</a> </td>";
				if($ellist['elstatus']=="DONE"){
					echo "<td><span class='label label-success'>".$ellist['elstatus']."</span></td>";
					echo "<td><a href='enrollmentlist/review/".$ellist['elid']."' type='reset' class='btn btn-effect-ripple btn-primary' data-toggle='tooltip' data-placement='top' title='View & Import'><i class='fa fa-cloud-upload'></i></a></td>";
				}else{
					echo "<td><span class='label label-danger'>".$ellist['elstatus']."</span></td>";
					echo "<td><a href='enrollmentlist/review/".$ellist['elid']."' type='reset' class='btn btn-effect-ripple btn-primary' data-toggle='tooltip' data-placement='top' title='View & Import'><i class='fa fa-cloud-upload'></i></a><button data-toggle='modal' data-target='#modal-regular' class='btn btn-primary'  onClick='editaccount(".$ellist['elid'].")'><i  data-toggle='tooltip' data-placement='top' title='Edit' class='fa fa-edit'></i></button><button  onclick='deletefile(".$ellist['elid'].");' type='reset' class='btn btn-effect-ripple btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-times'></i></button></td>";
				}
				//echo "<td>".$ellist['elstatus']."</td>";
				
				
				
				echo "</tr>";
				
				endforeach;
				*/
				
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
                                    
								<input type="hidden" id="accountid">
                                    <!-- Input States Content -->
                                    <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Account Name *</label>
                                            <div class="col-md-6">
                                                <input type="text" id="accountname" name="state-normal" class="form-control" >
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
                                            <label class="col-md-3 control-label" for="state-normal">Email</label>
                                            <div class="col-md-6">
                                                <input type="text" id="email" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="saveaccount();">Save</button>
							<button type="button" id="updatebutton" class="btn btn-effect-ripple btn-primary" onclick="updateaccount();">Update</button>
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


