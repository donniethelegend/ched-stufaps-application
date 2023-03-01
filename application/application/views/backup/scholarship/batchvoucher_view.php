
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
<!--  Row -->
	
	<div class="row">
                            <div class="col-md-4 col-lg-3">
                                <!-- Menu Block -->
                                <div class="block full">
                                    <!-- Menu Title -->
                                    <div class="block-title clearfix">
									<input type="hidden" id="baseurl" value="<?=base_url()?>">
                                        <div class="block-options pull-right">
							<a href="#" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Batch Number">Batch #:<?php
							$lastbatchid = $maxbatchid;

							echo $lastbatchid; 
							echo "<input id='currentbatch' type='hidden' value='$lastbatchid'>";?>
							
							</a>
                                        </div>
                                        <h2>Filters</h2>
                                    </div>
                                    <!-- END Menu Title -->

                                    <!-- Menu Content -->
									<div class="row">
									<div class="form-group">
                                            
			<div class="col-md-12">
				<select onchange="updatestudentlist(this.value);" id="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Scholarship Type">
					<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
					
					<?php
						foreach ($scholarship_type as $stype):
						
						
						echo "<option value='".$stype['typecode']."'>".$stype['typedescription']."</option>";
						
						endforeach;
					?>                   
				</select>
			</div>
                                        </div>
									
									</div>
									<div class="row"><br></div>
									<div class="row">
									<div class="form-group">
                                            
                                            <div class="col-md-12">
                                                <select id="filteredstudent" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Search Student">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    
                                                </select>
                                            </div>
                                        </div>
									
									</div>
									<div class="row">
									<center>
									<br>
									<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addbatchvoucher();" id="savebutton">Add Voucher</button>
									</center>
                                    </div>
									<br>
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Fund Cluster</label></center>
                                            <div class="col-md-12">
                                                <select id="fundcluster" name="example-select" class="form-control" size="1">
                                                    <option value="101">101</option>
                                                    <option value="151">151</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Date</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="voucherdate"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php
												echo date("Y-m-d");
												?>" >
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Year</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="dvyear" class="form-control"  value="<?php echo date('Y');?>">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Month</label></center>
                                            <div class="col-md-12">
                                                <select class="form-control" id="dvmonth">
							<?php
							$mdate = date('m');
							echo "<option value='$mdate'>$mdate</option>";
							?>
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Start</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="dvnostart" class="form-control" onKeyUp="updatedvno();">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">DV No.</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="dvno" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">ORS/BURS No.</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="orsno" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Amount</label></center>
                                            <div class="col-md-12">
                                                <input type="text" id="amount" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Semester</label></center>
                                            <div class="col-md-12">
												<select class="form-control" id="semester">
												<option value="1st Semester">1st Semester</option>
												<option value="2nd Semester">2nd Semester</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">School Year</label></center>
                                            <div class="col-md-12">
                                                <select class="form-control" id="schoolyear">
												<option value="2015-2016">2015-2016</option>
												<option value="2016-2017" selected="selected">2016-2017</option>
												<option value="2017-2018">2017-2018</option>
												<option value="2018-2019">2018-2019</option>
												<option value="2019-2020">2019-2020</option>
												<option value="2020-2021">2020-2021</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
									<div class="form-group">
                                            <center><label class="col-md-12 control-label" for="example-select">Account Title</label></center>
                                            <div class="col-md-12">
												<select class="form-control" id="accounttitle">
												<option value="regular">Cash-MDS,Regular Account </option>
												<option value="special">Cash-MDS,SPECIAL ACCOUNT</option>
												<option value="lcca">Cash in Bank-LCCA-LBP</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
									
                                </div>
                                <!-- END Menu Block -->

                                
                            </div>
                            <div class="col-md-8 col-lg-9">
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
						/*foreach ($voucher_list as $vlist):
						
						echo "<tr>";
						echo "<td>".$vlist['batch']."</td>";
						echo "<td>".$vlist['batch']."</td>";
						echo "<td>".$vlist['batch']."</td>";
						echo "<td>".$vlist['batch']."</td>";
						echo "<td>".$vlist['batch']."</td>";
						echo "<td class='text-center'><a class='btn btn-effect-ripple btn-sm btn-primary' href='batchvoucher/printvoucher/' target='_blank'><i class='fa fa-print'></i></a><a href='#' data-toggle='tooltip' title='Cancel Voucher' class='btn btn-effect-ripple btn-sm btn-danger' ><i class='fa fa-times'></i></a> </td>";
						echo "</tr>";
						//echo "<option value='".$stype['typecode']."'>".$stype['typedescription']."</option>";
						
						endforeach;*/
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
						echo "<td class='text-center'><a href='batchvoucher/batch/".$vblist['batch']."' data-toggle='tooltip' title='View Voucher' class='btn btn-effect-ripple btn-sm btn-primary' ><i class='fa fa-eye'></i></a></td>";
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

