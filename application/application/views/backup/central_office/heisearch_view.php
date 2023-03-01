
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
					<!-- Search Results Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="header-section">
                                        <form action="heisearch" method="post" onsubmit="return true;">
                                            
                                            <div class="form-group">
												
												<div class="col-md-11">
												<input type="text" name="heisearch" id="heisearch" class="form-control" placeholder="Search HEI Name">
												
                                               
												</div>
												
                                            </div>
												<div class="row"></div>
											
											
											<div class="row" style="height:20px;"></div>
											
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Search Results Header -->
					
					<!-- Tables Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <h1>HEI Result</h1>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th style="width:100px;">Institution Code</th>
						<th>HEI</th>
						<th>HEI Type</th>
						<th>Address</th>
						<th>Contact No.</th>
						<th>Head</th>
						<th>Region</th>
                        

						
                       <th class="text-center" style="width: 75px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($heiresult as $heilist):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$heilist['instcode']."</td>";
				echo "<td>".$heilist['instname']."</td>";
				echo "<td>".$heilist['insttype']."</td>";
				echo "<td>".$heilist['street'].",".$heilist['municipality'].",".$heilist['province1']."</td>";
				echo "<td>".$heilist['insttel']." ".$heilist['instfax']." ".$heilist['insttelhead']."</td>";
				echo "<td>".$heilist['insthead']."</td>";
				echo "<td>".$heilist['region']."</td>";
				
				echo "<td></td> ";
				//echo "<td><button  onclick='deleteprogram(".$heilist['heid'].");' type='reset' class='btn btn-effect-ripple btn-danger' title='Delete'><i class='fa fa-times'></i></button> ";

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
       
