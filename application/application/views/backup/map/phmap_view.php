
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

						
						<input type="hidden" id="mapdetails" value="<?php echo $allheimap2;?>">
						<div class="row">
                            <div class="col-lg-12">
                                 
								<div class="col-md-12">
									<div id="map_div" style="width:100%;height: 500px"></div>
									
								</div>
                            </div>
                            
                        </div>
                        <!-- END Tables Row -->
				
				
				
				
				
				
                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
