
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
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Permit</a>
			  <a href="<?=base_url()?>functions/permitsxls" class="btn btn-effect-ripple btn-success" data-toggle="modal" target="_blank"><i class="hi hi-download-alt"></i> Download XLS</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Date</th>
						<th>HEI</th>
                        <th>Program</th>
						<th>Authority</th>
						<th>Effectivity</th>
						<th>Program Level</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($permits_list as $permits):
				$instcode = strtoupper($permits['instcode']);
				echo "<tr>";
				echo "<td class='text-center'>".$permits['permitdate']."</td>";
				echo "<td><a href='heidirectory/institution/$instcode'>".$permits['instname']."</a></td>";
				echo "<td>".$permits['programname']."</td>";
				echo "<td>".$permits['specialpermit']." No. ".$permits['permitno'].", s. ".$permits['seriesyear']."</td>";
				echo "<td>".$permits['effectivitydate']."</td>";
				echo "<td>".$permits['programlevel']."</td>";
				
				echo "<td><button  onclick='deletecontact(".$permits['permitid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				
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
							<h3 class="modal-title"><strong>Add Permit Details</strong></h3>
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
                                            <label class="col-md-3 control-label" for="state-normal">Date</label>
                                            <div class="col-md-6">
                                                <input type="text" id="permitdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Program Name *</label>
                                            <div class="col-md-6">
                                                <input type="text" id="programname" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Permit</label>
                                            <div class="col-md-6">
                                                <select id="specialpermit" class="form-control" onchange="generatespno();">
												<option value=""></option>
												<option value="GR">GR</option>
												<option value="GP">GP</option>
												<option value="SP">SP</option>
												<option value="COPC">COPC</option>
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Permit No.</label>
                                            <div class="col-md-6">
                                                <input type="text" id="permitno" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Series</label>
                                            <div class="col-md-6">
                                                <input type="text" id="seriesyear" name="state-normal" class="form-control" value="<?php echo $current_year; ?>">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Effectivity Date:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="effectivitydate" name="state-normal" class="form-control" value="">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Program Level</label>
                                            <div class="col-md-6">
                                                <input type="text" id="programlevel" name="state-normal" class="form-control" value="">
                                            </div>
                                        </div>
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savepermits();">Save</button>
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


