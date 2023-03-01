
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
                        <!-- First Row -->
						<!-- Search Results Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="header-section">
                                        <form action="cohome" method="post" onsubmit="return true;">
                                            
                                            <div class="form-group">
												
												<div class="col-md-11">
                                                <select id="map_region" name="map_region" class=" select-select2" data-placeholder="Choose Region" style="width: 100%;">
												<option></option>
												<?php
													foreach ($regionlist as $regions):
													
													if($regions['region_db']==$searchmapregion){
														$selected_region = "selected=selected";
													}else{
														$selected_region = "";
													}
													echo "<option value='".$regions['region_db']."' $selected_region>".$regions['region_description']."</option>";
													
													endforeach;
												?>
                                                </select>
												</div>
												
                                            </div>
												<div class="row"></div>
											
											
											<div class="row" style="height:20px;"></div>
											
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">View</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Search Results Header -->
						
                        <div class="row">
						<div class="col-lg-12">
                                <input type="hidden" id="mapdetails" value="<?php echo $allheimap2;?>">
								<div class="row">
									<div class="col-lg-12">
										 
										<div class="col-md-12">
											<div id="map_div" style="width:100%;height: 400px"></div>
											
										</div>
									</div>
									
								</div>
						</div>
							

                        
						</div>
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
<?php
//print_r($totalheiperregion);
//echo "<input type='hidden' id='region' value='".$regionlist."'>";
//echo "<input type='hidden' id='region_values' value='".$totalheiperregion."'>";

?>