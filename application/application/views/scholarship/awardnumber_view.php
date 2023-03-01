
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
            <!-- Partial Responsive Block -->
		<form method="post" action="<?php echo base_url();?>awardnumber">
			<div class="col-sm-1">Search: </div>
             <div class="col-lg-2">
		
				<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Award Number" value="<?php //echo $keyword;?>">
			
			
			</div>
			
			
		<div class="col-lg-1">
			<button type="submit" class="btn btn-primary">Search</button>   
		</div>
	</form>
	
		<form method="post" action="awardnumber">
		<div class="col-md-1">Status: </div>
             <div class="col-lg-1">
		
			
			<select class="form-control" id="awardstatus" name="awardstatus">
				<option value="<?php echo $post_awardstatus;?>" selected="selected"><?php echo $post_awardstatus;?></option>
				
				<?php
					foreach($award_status as $astatus):
						echo "<option value='".$astatus['awardstatus']."'>".$astatus['awardstatus']."</option>";
					endforeach;
				?>
				<option value="All">All</option>
				
				
			</select>
			
		</div>
		
			<div class="col-md-1">Award Type: </div>
             <div class="col-lg-2">
		
			<select class="form-control" id="typecodefilter" name="typecodefilter"  placeholder="Scholarship Type">
				<option value="<?php echo $post_typecodefilter;?>" selected="selected"><?php echo $post_typecodefilter;?></option>
				<?php
					foreach($typecode_list as $typecodelist):
						echo "<option value='".$typecodelist['stypecode']."'>".$typecodelist['stypecode']." - ".$typecodelist['stypedescription']."</option>";
					endforeach;
				?>
				<option value="All">All</option>
			</select>
			
		</div>	
		<div class="col-lg-2">
			<button type="submit" class="btn btn-primary">View</button>   
			<a href="#add-award" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Award Number</a>
		</div>
		</form>
<div class="row"></div>	
	<div class="block full">
        <div class="block-title">
            
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="customer-table" class="table table-striped table-bordered table-vcenter table-hover ">
                <thead>
                    <tr>
						<th>Particular</th>
                        <th class="text-center" style="width: 200px;">Award Number</th>
                        <th>Students Name</th>
						
						<th>Remarks</th>
						<th>Award Status</th>
						<th></th>
						

                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($awardnumber_list as $awardnumber):
				$award_id = $awardnumber['awardid'];
				$award_number = $awardnumber['awardnumber'];
				
				echo "<tr>";
				echo "<td>".$awardnumber['particular']."</td>";
				echo "<td><strong>".$awardnumber['awardnumber']."</strong></td>";
				echo "<td>";
				if($awardnumber['award_status']=="Vacated" || $awardnumber['award_status']=="New"){
					echo "<button type='submit' class='btn btn-effect-ripple btn-success'  href='#assign-modal' data-toggle='modal' onClick='assignaward($award_id,\"$award_number\")'><i class='fa fa-user-plus'></i></button>";
				}else{
					echo "<a href='scholar/profile/".$awardnumber['scholarid']."'>".$awardnumber['granteename']."</a>";
				}
				"</td>";
				
				echo "<td>".$awardnumber['remarks']."</td>";
				echo "<td>".$awardnumber['award_status']."</td>";
				echo "<td>";
				//echo "<td><button onclick='deletegrantee(".$awardnumber['awardid'].");' type='reset' class='btn btn-xs btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				
				
				
				
				
				
				echo "<button type='submit' class='btn btn-effect-ripple btn-primary'  href='#edit-modal' data-toggle='modal' onclick='editaward(".$awardnumber['awardid'].");'><i class='fa fa-pencil-square'></i></button>";
				
				if($awardnumber['award_status']=="New"){
					echo "<button type='submit' class='btn btn-effect-ripple btn-danger' onclick='deleteaward(".$awardnumber['awardid'].");'><i class='fa fa-times'></i></button>";
				}
				
				
				echo "</td></tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
			 <!-- Regular Modal -->
                <div id="adddeliverymodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Delete Grantee</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<input type="hidden" id="granteeid">
						<label class="col-md-3 control-label text-right">Password</label>
                        <div class="col-md-7">
                            <input type="password" id="deletepassword" name="state-normal" class="form-control" tabindex="0">
                        </div>	
						
						
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="deletegrantee();">Delete</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
				<!-- Regular Modal -->
                <div id="edit-modal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Edit Award</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<input type="hidden" id="awardid">
						<label class="col-md-3 control-label text-right">Award #:</label>
                        <div class="col-md-7">
                            <input type="text" id="awardnumber" name="state-normal" class="form-control" tabindex="0" disabled>
                        </div>	
						<label class="col-md-3 control-label text-right">Award Status:</label>
                        <div class="col-md-7">
						
						<select class="form-control" id="award_status" name="award_status">
							<option value="Active">Active</option>
							<option value="New">New</option>
							<option value="Lapse">Lapse</option>
							<option value="Vacated">Vacated</option>
                         </select>
                        </div>	
						<label class="col-md-3 control-label text-right">Grantee:</label>
                        <div class="col-md-7">
                            <input type="hidden" id="scholarid">
                            <input type="text" id="granteename" name="state-normal" class="form-control" tabindex="0" disabled>
                        </div>	
						<label class="col-md-3 control-label text-right">Grantee Status:</label>
                        <div class="col-md-7">
							<select class="form-control" id="grantee_status" name="award_status">
								<option value="C - Active">C - Active</option>
								<option value="Inactive">Inactive</option>
								<option value="Terminated">Terminated</option>
								<option value="G - Graduated">G - Graduated</option>
								<option value="WV - Waived">WV - Waived</option>
								<option value="Unawarded">Unawarded</option>
							 </select>
                            
                        </div>	
						<label class="col-md-3 control-label text-right">Remarks:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="award_remarks"></textarea>
                        </div>	
						
						
					</div>
								<div class="row"></div>
								<!-- Input States Block -->
           
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="updateawardnumber();">Update</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
				<!-- Regular Modal -->
                <div id="add-award" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Add Award</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<label class="col-md-3 control-label text-right">Particular:</label>
                        <div class="col-md-7">
                            <input type="text" id="particular" name="state-normal" class="form-control" tabindex="0">
                        </div>	
						<label class="col-md-3 control-label text-right">Type Code:</label>
                        <div class="col-md-7">
                            <input type="text" id="stypecode" name="state-normal" class="form-control" tabindex="0" onchange="updatepreview();">
                        </div>	
						<label class="col-md-3 control-label text-right">Prefix:</label>
                        <div class="col-md-7">
                            <input type="text" id="prefix" name="state-normal" class="form-control" tabindex="0" onchange="updatepreview();">
                        </div>	
						
						<label for="state-success" class="col-md-3 control-label text-right">Middle </label>
                        <div class="col-md-7">
                            <input type="text" id="middle" name="state-normal" class="form-control" tabindex="0" placeholder="Increment" onchange="updatepreview();">
                        </div>	
						
						<label class="col-md-3 control-label text-right">Suffix:</label>
                        <div class="col-md-7">
                            <input type="text" id="suffix" name="state-normal" class="form-control" tabindex="0" onchange="updatepreview();">
                        </div>

						<label class="col-md-3 control-label text-right">Count:</label>
                        <div class="col-md-7">
                            <input type="number" id="award_count" name="state-normal" class="form-control" tabindex="0">
                        </div>	

						<label class="col-md-3 control-label text-right">Award # Preview:</label>
                        <div class="col-md-7">
                            <input type="text" id="award_preview" name="state-normal" class="form-control" tabindex="0" disabled>
                        </div>	
					<div class="row"></div>
						<label class="col-md-3 control-label text-right">Award Year:</label>
                        <div class="col-md-7">
                            <input type="text" id="awardslot_year" name="state-normal" class="form-control" tabindex="0">
                        </div>	
						
						
						
						
					</div>
								<div class="row"></div>
								<!-- Input States Block -->
           
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="addaward();">Add Award</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
			
				<!-- Regular Modal -->
                <div id="assign-modal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Assign Award</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<label class="col-md-3 control-label text-right">Award #:</label>
						<input type="hidden" id="assign_awardid" name="state-normal" class="form-control" tabindex="0">
                        <div class="col-md-7">
                            <input type="text" id="assign_awardnumber" name="state-normal" class="form-control" tabindex="0" disabled>
                        </div>	
						<label class="col-md-3 control-label text-right">Grantee:</label>
                        <div class="col-md-7">
                           <select id="assign_scholarid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
								<?php
									foreach($grantee_unawarded as $unawardedlist):
										echo "<option value=".$unawardedlist['scholarid'].">".$unawardedlist['firstname']." ".$unawardedlist['middlename']." ".$unawardedlist['lastname']."</option>";
									endforeach;
								?>
													
							</select>
						</div>
						<label class="col-md-3 control-label text-right">Remarks:</label>
						
                        <div class="col-md-7">
							<textarea id="assign_remarks" class="form-control"></textarea>
                           
                        </div>	
						
						
						
						
					</div>
								<div class="row"></div>
								<!-- Input States Block -->
           
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="assignaward_scholar();">Assign Award</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
			
 
 
			
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


