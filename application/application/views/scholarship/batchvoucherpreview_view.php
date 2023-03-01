
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	
	<!--rightsidebar here-->
	<?php
	$baseurl = base_url();
	//$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php $this->load->view('leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php $this->load->view('heidirectory/subnav_view'); ?>
<!--  Row -->
	
	<div class="row">
                            
                            <div class="col-md-12 col-lg-12">
                                <!-- Tickets Block -->
                                <div class="block">
                                    <!-- Tickets Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#tickets-list">Voucher List</a></li>
                                            <li><a href="#batch-list">Batch List</a></li>
                                        </ul>
                                    </div>
                                    <!-- END Tickets Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <!-- Tickets List -->
                                        <div class="tab-pane active" id="tickets-list">
                                            <div class="block-content-full">
                                                <div class="table-responsive remove-margin-bottom">
                                                    <table class="table table-striped table-vcenter remove-margin-bottom" id="batchvouchertable">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">DV No.</th>
                                                                <th>Name</th>
                                                                <th>Semester</th>
                                                                <th>SY</th>
                                                                <th class="text-center">Amount</th>
                                                                <th class="text-center"><i class="fa fa-flash"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                          <?php
						foreach ($voucher_list as $vlist):
						
						echo "<tr>";
						echo "<td>".$vlist['dvno']."</td>";
						echo "<td>".$vlist['firstname']." ".$vlist['middlename']." ".$vlist['lastname']."</td>";
						echo "<td>".$vlist['vouchersemester']."</td>";
						echo "<td>".$vlist['vouchersy']."</td>";
						echo "<td>".$vlist['amount']."</td>";
						echo "<td class='text-center'><a class='btn btn-effect-ripple btn-sm btn-primary' href='".$baseurl."batchvoucher/printvoucher/".$vlist['voucherid']."' target='_blank'><i class='fa fa-print'></i></a><a href='#' data-toggle='tooltip' title='Cancel Voucher' onclick='deletevoucher(".$vlist['voucherid'].");' class='btn btn-effect-ripple btn-sm btn-danger' ><i class='fa fa-times'></i></a> </td>";
						echo "</tr>";
						//echo "<option value='".$stype['typecode']."'>".$stype['typedescription']."</option>";
						
						endforeach;
					?>                                       
                                                           
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- END Tickets List -->
					<!-- start batch list -->
					<div class="tab-pane" id="batch-list">
                                            <div class="block-content-full">
                                                <div class="table-responsive remove-margin-bottom">
                                                    <table class="table table-striped table-vcenter remove-margin-bottom" id="batchvouchertable">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Batch #</th>
                                                                <th  class="text-center">Date</th>
                                                                <th class="text-center">Count</th>
                                                                <th class="text-center"><i class="fa fa-flash"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                        <?php
						foreach ($voucher_batch as $vblist):
						
						echo "<tr>";
						echo "<td class='text-center'>".$vblist['batch']."</td>";
						echo "<td class='text-center'>".$vblist['voucherdate']."</td>";
						echo "<td class='text-center'>".$vblist['batchcount']."</td>";
						
						echo "<td class='text-center'><a href='".$baseurl."batchvoucher/batch/".$vblist['batch']."' data-toggle='tooltip' title='View Voucher' class='btn btn-effect-ripple btn-sm btn-primary' ><i class='fa fa-eye'></i></a></td>";
						echo "</tr>";
						
						endforeach;
					?>                                           
                                                           
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
					<!-- end batch list -->
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Tickets Block -->
                            </div>
                        </div>
                        <!-- END Tickets Content -->		

			
<!-- end row-->

		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->
<input type="hidden" id="lastvoucherid">

