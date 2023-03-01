
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
                                <div class="col-sm-">
                                    <div class="header-section">
                                        <form action="enrolmentbydiscipline" method="post" onsubmit="return true;">
                                            
                                            <div class="form-group">
												
												<div class="col-md-2">
												<label>Academic Year: </label>
												<select id="academicyear" name="academicyear" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
												<?php
															 //echo "<option value='".$currentay."'>$currentay</option>";
															foreach($aylist as $academicyear):
															
																echo "<option value='".$academicyear['school_year']."'>".$academicyear['school_year']."</option>";
															endforeach;
														
													?>
													</select>
                                               
												</div>
												
												<div class="col-md-2">
												<label>Region: </label>
												<select id="region" name="region" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
												<?php
															
															foreach($regionlist_select as $region_list):
																	if($region_list['region_db']==$currentregion){
																		$selected = "selected='selected'";
																	}else{
																		$selected = "";
																	}
																echo "<option $selected value='".$region_list['region_db']."'>".$region_list['region_description']."</option>";
															endforeach;
														
													?>
													</select>
                                               
												</div>
												
												
												<div class="col-md-3">
												<label>Program Level: </label>
												<select id="programlevel" name="programlevel" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
														<?php echo "<option value='$currentprogramlevel'>$currentprogramlevel</option>";?>
														<option value="30">30 - Tech/Voc</option>
														<option value="40">40 - Pre-baccalaureate</option>
														<option value="50">50 - Baccalaureate</option>
														<option value="60">60 - Post Baccalaureate</option>
														<option value="80">80 - Masters</option>
														<option value="90">90 - Doctoral</option>
													</select>
                                               
												</div>
												
                                            </div>
												
											
											
											<div class="row" style="height:20px;"></div>
											
                                            <div class="">
                                                <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Search Results Header -->
						
					<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                       
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Enrolment by Discipline per Region</a></li>
                                            <li class="hidden"><a href="#block-tabs-profile">Download</a></li>
                                           <!-- <li><a href="#block-tabs-profile">Detailed</a></li> -->
                                            
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="block-tabs-home">
										 <!-- First Row -->
                        <div class="row">
						
						<div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-content widget-content-mini themed-background-dark-default text-light text-center">
                                        <i class="fa fa-bar-chart-o"></i> 
                                    </div>
                                    <div class="widget-content themed-background-muted">
                                       <div id="chart-container" ></div>
                                    </div>
									<!--
                                    <div class="widget-content">
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-book_open text-muted push"></i> <br><small>17k Sales</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-wallet text-muted push"></i> <br><small>$41k Earnings</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-life_preserver text-muted push"></i> <br><small>3165 Tickets</small></h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
							

                        
						</div>
								<!-- end content tab -->
										
										
										
										</div> <!-- end first tab -->
                                        <div class="tab-pane" id="block-tabs-profile">
										
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
						
						
						<th>Number of HEI</th>
						<th>Region</th>
						<th>Active HEI</th>
						<th>All HEI</th>
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				/*
				foreach ($totalheiperregion_table as $totalhei):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$totalhei['value']."</td>";
				echo "<td>".$totalhei['regionname']."</td>";
				
				
				
				//echo "<td></td> ";
				echo "<td><a href='heibyregion/instprofile/".$totalhei['region_db']."/ACTIVE' type='button' class='btn btn-effect-ripple btn-success' title='Download HEI'><i class='fa fa-download'></i></a></td> ";
				echo "<td><a href='heibyregion/instprofile/".$totalhei['region_db']."/ALL' type='button' class='btn btn-effect-ripple btn-success' title='Download HEI'><i class='fa fa-download'></i></a></td> ";

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
										
										
										
										
										</div>
                                        <div class="tab-pane" id="block-tabs-settings">Settings..</div>
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
					
					
					
					
                       
					
					
					
					
					
					
					
					
<!-- Multiple Grid Classes Block -->
                        <div class="block">
                            <!-- Multiple Grid Classes Title -->
                            <div class="block-title themed-background-info text-light-op">
                                <h2>Details</h2>
                            </div>
                            <!-- END Multiple Grid Classes Title -->
<!-- Partial Responsive Block -->
		<div class="block">
			<!-- Partial Responsive Title -->
			<div class="block-title">
				<h2>Enrolment by Discipline per Region</h2>
			</div>
			<!-- END Partial Responsive Title -->
 <div class="table-responsive">
			<!-- Partial Responsive Content -->
			 <table id="example-datatable-reports" class="table table-striped table-bordered table-vcenter">
				<thead>
					<tr>
						<th>Discipline</th>
						
						
						<th>Male</th>
						<th>Female</th>
						<th>Total Enrolment</th>
						<th>Percentage</th>
						
					</tr>
				</thead>
				<tbody>
				
				<?php
					foreach($totalenrolmentbyprogramlevel_table as $totalen):
					
					echo "<tr>";
					echo "<td>".$totalen['label']."</td>";
					echo "<td>".number_format($totalen['totalmale'])."</td>";
					echo "<td>".number_format($totalen['totalfemale'])."</td>";
					echo "<td>".number_format($totalen['totalen'])."</td>";
					echo "<td>".number_format($totalen['value'],2)."% </td>";
					echo "</tr>";
					
					endforeach;
				
				?>
					
				</tbody>
			</table>
	</div>
			<!-- END Partial Responsive Content -->
		</div>
		<!-- END Partial Responsive Block -->
                            
							
							
							
							
							
                        </div>
                        <!-- END Multiple Grid Classes Block -->
				<!-- Multiple Grid Classes Block -->					
					
					
					
					
					
					</div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
<?php
//print_r($totalenrolmentbyprogramlevel_table);
echo "<input type='hidden' id='region' value='".$regionlist."'>";
echo "<input type='hidden' id='region_values' value='".$totalenrolmentbyprogramlevel."'>";
//echo "<input type='hidden' id='region_values2' value='".$totalfemale."'>";

?>