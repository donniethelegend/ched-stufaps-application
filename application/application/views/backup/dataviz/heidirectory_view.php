	<!-- Theme JS files -->
	<script src="<?=base_url()?>public/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?=base_url()?>public/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?=base_url()?>public/global_assets/js/demo_pages/datatables_basic.js"></script>
	<!-- /theme JS files -->


	<!--main sidebar here -->
	<?php $this->load->view('dataviz/inc/leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php //$this->load->view('dataviz/inc/pageheader_view'); ?>

			<!-- Content area -->
			<div class="content">

			<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-3">

								<!-- Members online -->
								<div class="card bg-teal-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $activehei;?></h3>
											<!--<span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span> -->
					                	</div>
					                	
					                	<div>
											Total Active HEI
											<!--<div class="font-size-sm opacity-75">489 avg</div> -->
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-3">

								<!-- Current server load -->
								<div class="card bg-pink-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $privatehei;?></h3>
											
					                	</div>
					                	
					                	<div>
											Private HEI
											
										</div>
									</div>

									<div id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-3">

								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $luchei;?></h3>
											
					                	</div>
					                	
					                	<div>
											LUC HEI
											<!--<div class="font-size-sm opacity-75">$37,578 avg</div> -->
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
							<div class="col-lg-3">

								<!-- Today's revenue -->
								<div class="card bg-danger-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $suchei;?></h3>
											
					                	</div>
					                	
					                	<div>
											SUC HEI
											<!--<div class="font-size-sm opacity-75">$37,578 avg</div> -->
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
						</div>
						<!-- /quick stats boxes -->
					

<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">HEI List</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						The <code>HEI list</code> ......
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th >Code</th>
								<th>Institution Name</th>
								<th>Address</th>
								<th>Tel. No.</th>
								<th>Email</th>
								<th class="text-center" >Institution Head</th>
								<th>Type</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($heidirectory as $hei):
								$heiname = strtoupper($hei['instname']);
								echo "<tr>";
								echo "<td>".$hei['instcode']."</td>";
								//echo "<td><a href='heidirectory/institution/".$hei['instcode']."'>".$heiname."</a></td>";
								echo "<td><a href='#'>".$heiname."</a></td>";
								//echo "<td>".$hei['instformownership']."</td>";
								echo "<td>".strtoupper($hei['street']).",".strtoupper($hei['municipality']).",".strtoupper($hei['province1'])." ".$hei['postalcode']."</td>";
								echo "<td>".$hei['insttel']."</td>";
								echo "<td>".$hei['email']."</td>";
								echo "<td>".$hei['insthead']."</td>";
								echo "<td>".$hei['heitype']."</td>";
								//echo "<td><button type='reset' class='btn btn-effect-ripple btn-warning'><i class='fa fa-exclamation-triangle'></i></button><button  onclick='deletehei(".$hei['heid'].");' type='reset' class='hidden btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
								echo "</tr>";
								endforeach;
								?>
							
							
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->























			




			</div>
			<!-- /content area -->

