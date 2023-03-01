
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
                        <!-- First Row -->
                        <div class="row">
                            <!-- Simple Stats Widgets -->
                            <div class="col-sm-6 col-lg-3">
                                <a href="#" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-building text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalinstitution->totalinst;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">HEI </span>
                                    </div>
                                </a>
								
								
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="gi gi-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalcontacts->totalcontact;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Contacts</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-list text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalprograms->programtotal;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Active Programs</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-danger">
                                            <i class="gi gi-file text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-danger">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalpermits->permitstotal;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Permits & Recognition</span>
                                    </div>
                                </a>
                            </div>
							
							<!--<div class="col-sm-6">
                                        <a href="javascript:void(0)" class="widget">
                                            <div class="widget-content themed-background-info text-light-op">
                                                <i class="fa fa-fw fa-chevron-right"></i> <strong>h the Service Received</strong>
                                            </div>
                                            <div class="widget-content themed-background-muted text-center">
                                                <i class="fa fa-thumbs-o-up fa-3x text-info"></i>
												<h3>Strongly Agree</h3>
                                            </div>
                                            <div class="widget-content text-center">
                                                <strong><h2><span data-toggle="counter" data-to="<?php 
										//echo $totalstrongly->totalstrong;
										?>"></span> / <?php 
										//echo $totalsatisfied->totalsatisfied;
										?></strong></h2>
                                            </div>
                                        </a>
							</div> -->
							<!-- <div class="col-lg-6">
                                <div class="widget">
                                    <div class="widget-content widget-content-mini themed-background-dark-default text-light text-center">
                                        <i class="fa fa-bar-chart-o"></i> <strong>Satisfied with the Service Received </strong>
                                    </div>
                                   <input type="hidden" id="stronglyagree" value="<?php 
										//echo $totalstrongly->totalstrong;
										?>">
								   <input type="hidden" id="agree" value="<?php 
										//echo $totalagreelist->totalagree;
										?>">
                                    <div class="widget-content">
                                        <div id="widget-chart-pie" style="height: 280px;"></div>
                                    </div>
									
                                </div>
                            </div>
							
							<div class="col-lg-6">
                                <div class="widget">
                                    <div class="widget-content widget-content-mini themed-background-dark-default text-light text-center">
                                        <i class="fa fa-bar-chart-o"></i> <strong>Courteous and Helpful</strong>
                                    </div>
                                   <input type="hidden" id="cstronglyagree" value="<?php 
										//echo $courteoussa->totalstrong;
										?>">
								   <input type="hidden" id="cagree" value="<?php 
										//echo $courteousa->totalagree;
										?>">
                                    <div class="widget-content">
                                        <div id="widget-chart-pie2" style="height: 280px;"></div>
                                    </div>
									
                                </div>
                            </div> -->
							
                            <!-- END Simple Stats Widgets -->
                        </div>
                        <!-- END First Row -->

						 <div class="row">
							<!--<div class="col-sm-6 col-lg-12">
							<div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-muted">100%</span>
                                        HEMIS Collection
                                    </div>
								<a href="javascript:void(0)" class="widget-content themed-background-muted text-right clearfix">
                                        <img src="<?=base_url()?>/public/img/placeholders/avatars/avatar6.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar pull-left">
                                        <h2 class="widget-heading h3 text-muted">Collection</h2>
                                        <div class="progress progress-striped progress-mini active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                    </a>
								</div><!-- end widget-->
							<!--</div> -->
						 
						 </div> 
						
						<div class="row">
                            <div class="col-lg-6">
                                <!-- Partial Responsive Block -->
                                <div class="block">
                                    <!-- Partial Responsive Title -->
                                    <div class="block-title">
                                        <h2>Top 10 Program Enrolment (2016)</h2>
                                    </div>
                                    <!-- END Partial Responsive Title -->

                                    <!-- Partial Responsive Content -->
                                    <table class="table table-striped table-borderless table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Program Name</th>
                                                <th>Students</th>
                                            </tr>
                                        </thead>
                                        <tbody>
			<?php
				foreach ($toptenenroll as $topten):
				
				echo "<tr>";
				echo "<td>".$topten['mainprogram']."</td>";
				echo "<td>".$topten['totalenrollment']."</td></tr>";
				
				endforeach;
				?>
											
											
											
                                        </tbody>
                                    </table>
                                    <!-- END Partial Responsive Content -->
                                </div>
                                <!-- END Partial Responsive Block -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Partial Responsive Block -->
                                <div class="block">
                                    <!-- Partial Responsive Title -->
                                    <div class="block-title">
                                        <h2>Top 10 Program Graduates (2016)</h2>
                                    </div>
                                    <!-- END Partial Responsive Title -->

                                    <!-- Partial Responsive Content -->
                                    <table class="table table-striped table-borderless table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Program Name</th>
                                                <th>Graduates</th>
                                            </tr>
                                        </thead>
                                        <tbody>
			<?php
				foreach ($toptengraduate as $toptengrad):
				
				echo "<tr>";
				echo "<td>".$toptengrad['mainprogram']."</td>";
				echo "<td>".$toptengrad['totalgraduate']."</td></tr>";
				
				endforeach;
				?>
											
											
											
                                        </tbody>
                                    </table>
                                    <!-- END Partial Responsive Content -->
                                </div>
                                <!-- END Partial Responsive Block -->
                            </div>
                        </div>
                        <!-- END Tables Row -->
				<?php
				$data = array();
				$data2 = array();
				$k = 1;
				foreach ($discipline as $row):
				
					$data[] = array($k, $row['discipline']); 
					$data2[] = array($k, $row['total']); 
					$k++;
				endforeach;
				$jsondata = json_encode($data);
				$jsondata2 = json_encode($data2);
				echo "<input type='hidden' id='discipline' value='$jsondata'>";
				echo "<input type='hidden' id='noofstudent' value='$jsondata2'>";
				
				
				?>
						
                        <!-- Second Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-12">
                                <!-- Chart Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-muted">2016</span>
                                       Number of Programs per Discipline
                                    </div>
                                    <div class="widget-content border-bottom themed-background-muted">
                                        <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                                        <div id="chart-classic-dash" style="height: 393px;"></div>
                                    </div>
                                    <!-- <div class="widget-content widget-content-full">
                                        <div class="row text-center">
                                            <div class="col-xs-4 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><i class="gi gi-wallet text-dark push-bit"></i> <br><small>$ 41k</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom">
                                                <h3 class="widget-heading"><i class="gi gi-cardio text-dark push-bit"></i> <br><small>17k Sales</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom border-left">
                                                <h3 class="widget-heading"><i class="gi gi-life_preserver text-dark push-bit"></i> <br><small>3k+ Tickets</small></h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- END Chart Widget -->
                            </div>
							<?php
				$male = array();
				$female = array();
				$province = array();
				$k = 1;
				foreach ($enrollmentperprovince as $erow):
				
					$male[] = array($k, $erow['totalmale']); 
					$female[] = array($k, $erow['totalfemale']); 
					$province[] = array($k, $erow['province1']); 
					$k++;
				endforeach;
				$jsonmale = json_encode($male);
				$jsonfemale = json_encode($female);
				$jsonprovince = json_encode($province);
				echo "<input type='hidden' id='male' value='$jsonmale'>";
				echo "<input type='hidden' id='female' value='$jsonfemale'>";
				echo "<input type='hidden' id='province' value='$jsonprovince'>";
				
				
				?>
							<!-- chart 2 -->
							<div class="col-sm-6 col-lg-12">
                                <!-- Chart Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-muted">2016</span>
                                      Student Enrollment per Province
                                    </div>
                                    <div class="widget-content border-bottom themed-background-muted">
                                        <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                                        <div id="chart-classic-dash2" style="height: 393px;"></div>
                                    </div>
                                    <!-- <div class="widget-content widget-content-full">
                                        <div class="row text-center">
                                            <div class="col-xs-4 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><i class="gi gi-wallet text-dark push-bit"></i> <br><small>$ 41k</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom">
                                                <h3 class="widget-heading"><i class="gi gi-cardio text-dark push-bit"></i> <br><small>17k Sales</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom border-left">
                                                <h3 class="widget-heading"><i class="gi gi-life_preserver text-dark push-bit"></i> <br><small>3k+ Tickets</small></h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- END Chart Widget -->
                            </div>
							
							
							
                            <div class="col-sm-6 col-lg-4">
                                
                            </div>
                        </div>
                        <!-- END Second Row -->

                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
