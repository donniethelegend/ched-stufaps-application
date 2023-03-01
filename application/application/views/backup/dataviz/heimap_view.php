
	<!--main sidebar here -->
	<?php $this->load->view('dataviz/inc/leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php //$this->load->view('dataviz/inc/pageheader_view'); ?>

			<!-- Content area -->
			<div class="content">

						
				<!-- Pie and donut -->
				<div class="row">
					<div class="col-xl-12">

						 <input type="hidden" id="mapdetails" value="<?php echo $allheimap2;?>">
								<div class="row">
									<div class="col-lg-12">
										 
										<div class="col-md-12">
											<div id="map_div" style="width:100%;height: 400px"></div>
											
										</div>
									</div>
									
								</div>

					</div>
					
					
					

					
				</div>	<!--end row-->
				<!-- /pie and donut -->



			</div>
			<!-- /content area -->

