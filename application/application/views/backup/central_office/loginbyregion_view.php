
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
					<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Total Login per Region</a></li>
                                            <li><a href="#block-tabs-profile">Summary</a></li>
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
                                        <i class="fa fa-bar-chart-o"></i> <strong>Total Login per Region</strong>
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
            <h1>Login Result</h1>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
						
						<th>Total Login of Region</th>
						<th>Region</th>
						<th>Download Log</th>
						
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($totalloginperregion_table as $totalhei):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$totalhei['value']."</td>";
				echo "<td>".$totalhei['regionname']."</td>";
				
				
				
				//echo "<td></td> ";
				echo "<td><a href='loginbyregion/userlog/".$totalhei['region_db']."' type='button' class='btn btn-effect-ripple btn-success' title='Download HEI'><i class='fa fa-download'></i></a></td> ";
				

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
                                        <div class="tab-pane" id="block-tabs-settings">Settings..</div>
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
					
					
					
					
                       
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
<?php
//print_r($totalheiperregion);
echo "<input type='hidden' id='region' value='".$regionlist."'>";
echo "<input type='hidden' id='region_values' value='".$totalloginperregion."'>";

?>