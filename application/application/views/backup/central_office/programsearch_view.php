
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
                                        <form action="programsearch" method="post" onsubmit="return true;">
                                            
                                            <div class="form-group">
												
												<div class="col-md-11">
												<input type="text" name="programnamesearch" id="programnamesearch" class="form-control" placeholder="Program Name">
												
                                               
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
        <div class="block-title"><form method="post" action="programsearch/programsearchxls">
            <h1>Program Result 
			<?php if ($programresult!=null){?>
			<input type="hidden" name="programnamesearchxls" id="programnamesearchxls" value="<?php echo $programnamesearch;?>"><button class="btn btn-effect-ripple btn-success" type="submit"><i class="hi hi-download-alt"></i> Download Result</button> </form>
			<?php }?>
			</h1>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
						<th>HEI Name</th>
						<th>Institution Code</th>
						<th>Program Name</th>
						<th>Major</th>
						<th>Supervisor</th>
						<th>Program Status</th>
						<th>Authority</th>
						<th>Remarks</th>
						<th>Region</th>
						<th>Program Code</th>
						<th>Program Level</th>
						<th>Major</th>
						<th>Discipline</th>
                        

						
                       <!-- <th class="text-center" style="width: 75px;"></th> -->
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($programresult as $programlist):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$programlist['instname']."</td>";
				echo "<td>".$programlist['instcode']."</td>";
				echo "<td>".$programlist['mainprogram']."</td>";
				echo "<td>".$programlist['major']."</td>";
				echo "<td>".$programlist['supervisor']."</td>";
				echo "<td>".$programlist['pstatuscode']."</td>";
				echo "<td>".$programlist['authority']."</td>";
				echo "<td>".$programlist['remarks']."</td>";
				echo "<td>".$programlist['region']."</td>";
				echo "<td>".$programlist['mpcode']."</td>";
				echo "<td>".$programlist['programlevel']."</td>";
				echo "<td>".$programlist['major']."</td>";
				echo "<td>".$programlist['discipline_description']."</td>";
				
				
				//echo "<td></td> ";
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
       
