
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
						<?php $this->load->view('programlist/subnav_view'); ?>
    <!-- Tables Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <h2>List</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>Program Level</th>
                        <th>Program</th>
						<th>Major</th>
						<th>Supervisor</th>
                        <th style="width:120px;">Institution</th>
						<th>Authority</th>
                       <th class="text-center" style="width: 75px;"></th> -
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($allprograms as $prog):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$prog['programlevel']."</td>";
				echo "<td>".$prog['mainprogram']."</td>";
				echo "<td>".$prog['major']."</td>";
				echo "<td>".$prog['supervisor']."</td>";
				echo "<td>".$prog['instname']."</td>";
				
				
				echo "<td>".$prog['authcat']." No.  ".$prog['authserial'].", s. ".$prog['authyear']."</td>";
				
				echo "<td> <button type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				
				
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


