
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
			<?php $this->load->view('heidirectory/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <h2>List</h2>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">Code</th>
                        <th style="width:180px;">Institution Name</th>
						<th>Province</th>
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
				echo "<td><a href='heidirectory/institution/".$hei['instcode']."'>".$heiname."</a></td>";
				//echo "<td>".$hei['instformownership']."</td>";
				echo "<td>".$hei['province1']."</td>";
				echo "<td>".$hei['insttel']."</td>";
				echo "<td>".$hei['email']."</td>";
				echo "<td>".$hei['insthead']."</td>";
				echo "<td>".$hei['heitype']."</td></tr>";
				
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


