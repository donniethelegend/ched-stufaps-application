
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
<div class="row">
                            <div class="col-lg-12">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>Enrollment List Details</h2>
                                    </div>
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
									<div class="col-sm-6">
									  <p><?php //echo form_open_multipart('ticket/do_upload');?> 
					   <form action = "" method = "">
						 <input type="hidden" id="ticketfileid" name="ticketfileid" value="<?php //echo $ticketid;?>">
						 
						 
						 <div class="form-group">
                                   
                               
						 <input type = "file" name = "assetimage" id = "assetimage" size = "20" class="form-control"/> 
						 </div>
						  <div class="form-group">
						 <input class="btn btn-primary" type = "submit" value = "Upload"/>
							</div>
					  </form> </p>
									</div>
									<div class="col-sm-6">
										<p>
											
										</p>
									  <p>Use the <a href="#" class="btn btn-effect-ripple btn-primary" > <i class="fi fi-xls"></i> Enrollment List Template.xls</a> for uploading the list. Be sure to follow the format inside the template. Upon uploading, it will be verified by our records officer.</p>
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
                        <th class="text-center" >ID</th>
                        <th style="width:380px;">Account Name</th>
						<th>Address</th>
                        <th>Tel. No.</th>
						<th>Email</th>
                        <th class="text-center" ></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				/*
				
				foreach ($accountslist as $acnt):
				$accountname = strtoupper($acnt['accountname']);
				echo "<tr>";
				echo "<td>".$acnt['accountid']."</td>";
				echo "<td><a href='#accountdetails'>".$accountname."</a></td>";
				//echo "<td>".$hei['instformownership']."</td>";
				echo "<td>".$acnt['address']."</td>";
				echo "<td>".$acnt['telno']."</td>";
				echo "<td>".$acnt['email']."</td>";
				echo "<td><button data-toggle='modal' data-target='#modal-regular' class='btn btn-primary' title='Edit Contact'  onClick='editaccount(".$acnt['accountid'].")'><i class='fa fa-edit'></i></button><button  onclick='deleteaccount(".$acnt['accountid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				
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


