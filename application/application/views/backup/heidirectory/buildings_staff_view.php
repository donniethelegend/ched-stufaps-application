
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
            
	<div class="block full">
        <div class="block-title">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="addrecord();">Add Record</a>
			  <a href="<?=base_url()?>eteeap/eteeapxls" class="btn btn-effect-ripple btn-success" data-toggle="modal" target="_blank"><i class="hi hi-download-alt"></i> Download XLS</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                       
						<th>HEI</th>
                        <th>Building Name</th>
						<th>Floor Count</th>
						<th>Classroom Count</th>
						
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($buildings_list as $buildings):
				//$instcode = strtoupper($buildings['buildingid']);
				echo "<tr>";
				
				echo "<td><a href='#'>".$buildings['instname']."</a></td>";
				echo "<td>".$buildings['building_name']."</td>";
				echo "<td>".$buildings['floor_count']."</td>";
				echo "<td>".$buildings['classroom_count']."</td>";
				
				
				
				echo "<td><button data-toggle='modal' data-target='#modal-regular' class='btn btn-primary hidden' title='Edit Contact'  onClick='editeteeap(".$buildings['buildingid'].")'><i class='fa fa-edit'></i></button></td></tr>";
				
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
							<h3 class="modal-title"><strong>Add Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    <input type="hidden" id="eteeapid">

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select2">HEI</label>
                                            <div class="col-md-8">
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
                                            <label class="col-md-3 control-label" for="state-normal">Building Name *</label>
                                            <div class="col-md-8">
                                                <input type="text" id="building_name" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Floor Count:</label>
                                            <div class="col-md-6">
                                                <input type="number" id="floor_count" name="state-normal" class="form-control" value="">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Classroom Count</label>
                                            <div class="col-md-6">
                                                <input type="number" id="classroom_count" name="state-normal" class="form-control" value="">
                                            </div>
                                        </div>
										
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savebuilding();" id="savebutton">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatebuilding();" id="updatebutton">Update</button>
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


