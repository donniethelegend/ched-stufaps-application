
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
                                        <form action="facultysearch" method="post" onsubmit="return true;">
                                            
                                            <div class="form-group">
												
												<div class="col-md-11">
												<input type="text" name="facultynamesearch" id="facultynamesearch" class="form-control" placeholder="Lastname, Firstname MI.">
												
                                               
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
            <h1>Faculty Result</h1>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
						<th>Faculty Name</th>
						<th>Institution Code</th>
						<th>HEI Name</th>
						<th>Gender</th>
						<th>Description</th>
						<th>Highest Degree</th>
						<th>Rank</th>
						<th>Subjects</th>
						<th>Faculty Status</th>
						<th>Region</th>
                        

						
                       <th class="text-center" style="width: 75px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($facultyresult as $facultylist):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$facultylist['faculty_name']."</td>";
				echo "<td>".$facultylist['instcode']."</td>";
				echo "<td>".$facultylist['instname']."</td>";
				echo "<td>".$facultylist['faculty_gender']."</td>";
				echo "<td>".$facultylist['fullpart_description']."</td>";
				echo "<td>".$facultylist['highestdegree_description']."</td>";
				echo "<td>".$facultylist['rank_description']."</td>";
				echo "<td>".$facultylist['subjects']."</td>";
				echo "<td>".$facultylist['faculty_status']."</td>";
				echo "<td>".$facultylist['region']."</td>";
				
				
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
       
