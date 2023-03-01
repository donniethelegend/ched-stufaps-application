
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
           <!-- <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Voucher</a> -->
			 <a href="<?=base_url()?>batchvoucher" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Batch Voucher</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>Student</th>
						<th>Date</th>
						<th>DV No</th>
						<th>ORS/BURS No</th>
                      <!--  <th>Contact No.</th> -->
						<th>Mode of Payment</th>
                        <th class="text-center">District</th>
						<th class="text-center">Amount</th>
						<th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($voucher_list as $voucher):
				$studentname = strtoupper($voucher['firstname']." ".$voucher['middlename']." ".$voucher['lastname']." ".$voucher['extension']);
				
				//echo $studentname;
				
				echo "<tr>";
				echo "<td>".$voucher['scholarid']."</td>";
				echo "<td><a href='".base_url()."scholar/profile/".$voucher['scholarid']."'>".$studentname."</td>";
				echo "<td>".$voucher['voucherdate']."</td>";
				echo "<td>".$voucher['dvno']."</td>";
				echo "<td>".$voucher['orsno']."</td>";
				//echo "<td>".$hei['instformownership']."</td>";
				//echo "<td>".$scholar['contactno']."</td>";
				echo "<td>".$voucher['modeofpayment']."</td>";
				echo "<td>".$voucher['congressionaldistrict']."</td>";
				echo "<td>".$voucher['amount']."</td>";
				echo "<td><button type='submit' class='btn btn-effect-ripple btn-primary'  href='#editprogram' data-toggle='modal' onclick='editprogram(".$voucher['scholarid'].");'><i class='fa fa-print'></i></button></td></tr>";
				
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


