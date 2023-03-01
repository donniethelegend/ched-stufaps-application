
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                
				
				<!--rightsidebar here-->
				<?php //$this->load->view('rightsidebar_view'); ?>
				
                <!--main sidebar here -->
				<?php $this->load->view('hei_leftsidebar_view'); ?>

                <!-- Main Container -->
                <div id="main-container">
                      <?php $this->load->view('subheader_view'); ?>

<!-- Page content -->
<div id="page-content">
						<?php $this->load->view('programlist/heisubnav_view'); ?>
						
											
						
    <!-- Tables Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <h2>Details</h2>
			<div class="pull-right">
				<input type="hidden" id="pid" value="<?php echo $details['programid'];?>">
				<input type="hidden" id="instcode" value="<?php echo $details['instcode'];?>">
				<button type="submit" onclick="updateprogram(<?php echo $details['programid'];?>);" class="btn btn-effect-ripple btn-effect-ripple btn-primary">Save</button>
			</div>
        </div>
		<form action="page_forms_components.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="example-input-large">Program Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="mainprogram" placeholder="" value="<?php echo $details['mainprogram'];?>" disabled>
			</div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Program Code</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="mpcode" value="<?php echo $details['mpcode'];?>" disabled>
			</div>
			
			<div class="row"></div>
			
			
			<label class="col-sm-2 control-label" for="example-input-large">Major</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="major" value="<?php echo $details['major'];?>" disabled>
			</div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Major Code</label>
			<div class="col-sm-2">
				<input type="text" id="mjcode" class="form-control" value="<?php echo $details['mjcode'];?>" disabled>
			</div>
			
			<div class="row"></div>
			
			
			<label class="col-sm-2 control-label" for="example-input-large">Discipline</label>
			<div class="col-sm-4">
				<select id="discipline" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
					<option value="<?php echo $details['discipline'];?>"><?php echo $details['discipline'];?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
					<?php
					//echo "<option value='".$details->heitype."' selected>".$details->heitype."</option>";
					?>
					<option value="Agriculture, Forestry and Fisheries">Agriculture, Forestry and Fisheries</option>
					<option value="Architecture and Town Planning">Architecture and Town Planning</option>
					<option value="Business Administration and related">Business Administration and related</option>
					<option value="Education Science and Teacher Training">Education Science and Teacher Training</option>
					<option value="Engineering  and Technology">Engineering  and Technology</option>
					<option value="Fine and Applied Arts">Fine and Applied Arts</option>
					<option value="General">General</option>
					<option value="Home Economics">Home Economics</option>
					<option value="Humanities">Humanities</option>
					<option value="IT and Related">IT and Related</option>
					<option value="Law, Justice and Jurisrprudence">Law, Justice and Jurisrprudence</option>
					<option value="Maritime Education">Maritime Education</option>
					<option value="Mass Communication and Documentation">Mass Communication and Documentation</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Medical and Allied">Medical and Allied</option>
					<option value="Natural Science">Natural Science</option>
					<option value="Other Disciplines">Other Disciplines</option>
					<option value="Religion and Theology">Religion and Theology</option>
					<option value="Service Trades">Service Trades</option>
					<option value="Social and Behavioral Sciences">Social and Behavioral Sciences</option>
					<option value="Trade, Craft and Industrial">Trade, Craft and Industrial</option>
					
				</select>
			</div>
			
			<label class="col-sm-2 control-label hidden" for="example-input-large">Discipline 2</label>
			<div class="col-sm-4 hidden">
				<select id="discipline2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
					<option value="<?php echo $details['discipline2'];?>"><?php echo $details['discipline2'];?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
					<?php
					//echo "<option value='".$details->heitype."' selected>".$details->heitype."</option>";
					?>
					<option value="Agriculture, Forestry and Fisheries">Agriculture, Forestry and Fisheries</option>
					<option value="Architecture and Town Planning">Architecture and Town Planning</option>
					<option value="Business Administration and related">Business Administration and related</option>
					<option value="Education Science and Teacher Training">Education Science and Teacher Training</option>
					<option value="Engineering  and Technology">Engineering  and Technology</option>
					<option value="General">General</option>
					<option value="IT and Related">IT and Related</option>
					<option value="Law, Justice and Jurisrprudence">Law, Justice and Jurisrprudence</option>
					<option value="Maritime Education">Maritime Education</option>
					<option value="Mass Communication and Documentation">Mass Communication and Documentation</option>
					<option value="Medical and Allied">Medical and Allied</option>
					<option value="Natural Science">Natural Science</option>
					<option value="Other Disciplines">Other Disciplines</option>
					<option value="Religion and Theology">Religion and Theology</option>
					<option value="Service Trades">Service Trades</option>
					<option value="Social and Behavioral Sciences">Social and Behavioral Sciences</option>

					
				</select>
			</div>
			
			<div class="row"></div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Program Status</label>
			<div class="col-sm-3">
				<select class="form-control" id="pstatuscode">
					<option value="<?php echo $details['pstatuscode'];?>"><?php echo $details['pstatuscode'];?></option>
					<option value="CO">CO - Program currently offered and accepting students.</option>
					<option value="PO">PO - Program is being phased out but still has students.</option>
					<option value="DO">DO - Program has been discontinued and has no students.</option>
					<option value="NO">NO - Program has not been officially discontinued but has no students.</option>
					<option value="NA">NA - Not applicable, program is not operated by the institution.</option>
				</select>
			</div>
			
			<label class="col-sm-3 control-label" for="example-input-large">With Thesis/Disertation</label>
			<div class="col-sm-2">
				<select class="form-control" id="thesisdisert">
					<option value="<?php echo $details['thesisdisert'];?>"><?php echo $details['thesisdisert'];?></option>
					<option value="1">1 - YES</option>
					<option value="2">2 - NO</option>
				</select>
			</div>
			
			
			
			
			<div class="row"></div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Year Implemented</label>
			<div class="col-sm-2">
				<input type="text" id="pstatyear" class="form-control"  value="<?php echo $details['pstatyear'];?>">
			</div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Authority</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="authcat" placeholder="Category" value="<?php echo $details['authcat'];?>" disabled>
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="authserial" placeholder="Serial" value="<?php echo $details['authserial'];?>" disabled>
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="authyear" placeholder="Year" value="<?php echo $details['authyear'];?>" disabled>
			</div>
			
			<div class="row"></div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Program Mode</label>
			<div class="col-sm-3">
				<select class="form-control" id="pmcode">
					<option value="<?php echo $details['pmcode'];?>"><?php echo $details['pmcode'];?></option>
					<option value="SE">SE - Semestral</option>
					<option value="TR">TR - Trimestral</option>
					<option value="SD">SD - Semestral-Distance education delivery mode</option>
					<option value="TD">TD - Trimestral-Distance education delivery mode</option>
					<option value="DE">DE - Distance education at student's pace</option>
					<option value="OT">OT - Others, please specify</option>
				</select>
			</div>
			
			<label class="col-sm-1 control-label" for="example-input-large">Remarks</label>
			<div class="col-sm-6">
				<textarea class="form-control" id="remarks"><?php echo $details['remarks'];?></textarea>
			</div>
			
			<div class="row"></div>
			
			<label class="col-sm-2 control-label" for="example-input-large">Normal Length (In Years)</label>
			<div class="col-sm-2">
				<input type="text" id="nlyears" class="form-control" value="<?php echo $details['nlyears'];?>">
			</div>
			<label class="col-sm-2 control-label" for="example-input-large">Tuition per Unit</label>
			<div class="col-sm-2">
				<input type="text" id="tuitionperunit" class="form-control" value="<?php echo $details['tuitionperunit'];?>">
			</div>
			
			<div class="row"></div>
			<label class="col-sm-2 control-label" for="example-input-large">Program Credit (In Units)</label>
			<div class="col-sm-2">
				<input type="text" id="pcredit" class="form-control" value="<?php echo $details['pcredit'];?>">
			</div>
			<label class="col-sm-2 control-label" for="example-input-large">Program Fee</label>
			<div class="col-sm-2">
				<input type="text" id="programfee" class="form-control" value="<?php echo $details['programfee'];?>">
			</div>
			
			
			
			<div class="row"></div>
			
		
			<label class="col-sm-2 control-label" for="example-input-large">Program Level</label>
			<div class="col-sm-3">
				<select class="form-control" id="programlevel">
					<option value="<?php echo $details['programlevel'];?>"><?php echo $details['programlevel'];?></option>
					<option value="30">30</option>
					<option value="40">40</option>
					<option value="50">50</option>
					<option value="60">60</option>
					<option value="70">70</option>
					<option value="80">80</option>
					<option value="90">90</option>
				</select>
			</div>
			
			<label class="col-sm-1 control-label" for="example-input-large">Supervisor</label>
			<div class="col-sm-3">
				<select class="form-control" id="supervisor" disabled>
					<option value="<?php echo $details['supervisor'];?>"><?php echo $details['supervisor'];?></option>
					<?php
						foreach ($employee_list as $technical):
					
					
						echo "<option value='".$technical['name']."'>".$technical['name']."</option>";
						
						endforeach;
					?>
				</select>
			</div>
			<div class="row"></div>
			
			
			
			
			
			
		</div> <!-- end form group -->
		
		
		
		
		
		
		
		
		
		</form>
		<div class="row"></div>
		
	</div>
		
		<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Enrolment</a></li>
                                            <li><a href="#block-tabs-profile">Graduate</a></li>
                                           
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="block-tabs-home">
																				
										<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th>Year</th>
                        
                        <th>Credit</th>
						<th>Tuition</th>
						<th>Fee</th>
						<th>New M</th>
						<th>New F</th>
						<th>Old M</th>
						<th>Old F</th>
						<th>2nd M</th>
						<th>2nd F</th>
						<th>3rd M</th>
						<th>3rd F</th>
						<th>4th M</th>
						<th>4th F</th>
						<th>5th M</th>
						<th>5th F</th>
						<th>6th M</th>
						<th>6th F</th>
						<th>7th M</th>
						<th>7th F</th>
						<th>Sub M</th>
						<th>Sub F</th>
						<th>Total</th>
						<th></th>
                       <!--<th class="text-center" style="width: 75px;"></th> -->
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($enrolment_list as $elist):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				
				echo "<td>".$elist['edatayear']."</td>";
				if($current_ay['settings_value']!=$elist['edatayear']){
					echo "<td>".$elist['pcredit']."</td>";
					echo "<td>".$elist['tuitionperunit']."</td>";
					echo "<td>".$elist['programfee']."</td>";
					echo "<td>".$elist['newstudm']."</td>";
					echo "<td>".$elist['newstudf']."</td>";
					echo "<td>".$elist['oldstudm']."</td>";
					echo "<td>".$elist['oldstudf']."</td>";
					echo "<td>".$elist['secondm']."</td>";
					echo "<td>".$elist['secondf']."</td>";
					echo "<td>".$elist['thirdm']."</td>";
					echo "<td>".$elist['thirdf']."</td>";
					echo "<td>".$elist['fourthm']."</td>";
					echo "<td>".$elist['fourthf']."</td>";
					echo "<td>".$elist['fifthm']."</td>";
					echo "<td>".$elist['fifthf']."</td>";
					echo "<td>".$elist['sixthm']."</td>";
					echo "<td>".$elist['sixthf']."</td>";
					echo "<td>".$elist['seventhm']."</td>";
					echo "<td>".$elist['seventhf']."</td>";
					echo "<td>".$elist['totalmale']."</td>";
					echo "<td>".$elist['totalfemale']."</td>";
					echo "<td>".$elist['gtotal']."</td>";
					echo "<td></td>";
					
				}else{
					echo "<td><input id='pcredit-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['pcredit']."'></td>";
					echo "<td><input id='tuitionperunit-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['tuitionperunit']."'></td>";
					echo "<td><input id='programfee-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['programfee']."'></td>";
					echo "<td><input id='newstudm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['newstudm']."'></td>";
					echo "<td><input id='newstudf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['newstudf']."'></td>";
					echo "<td><input id='oldstudm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['oldstudm']."'></td>";
					echo "<td><input id='oldstudf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['oldstudf']."'></td>";
					echo "<td><input id='secondm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['secondm']."'></td>";
					echo "<td><input id='secondf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['secondf']."'></td>";
					echo "<td><input id='thirdm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['thirdm']."'></td>";
					echo "<td><input id='thirdf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['thirdf']."'></td>";
					echo "<td><input id='fourthm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['fourthm']."'></td>";
					echo "<td><input id='fourthf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['fourthf']."'></td>";
					echo "<td><input id='fifthm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['fifthm']."'></td>";
					echo "<td><input id='fifthf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['fifthf']."'></td>";
					echo "<td><input id='sixthm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['sixthm']."'></td>";
					echo "<td><input id='sixthf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['sixthf']."'></td>";
					echo "<td><input id='seventhm-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['seventhm']."'></td>";
					echo "<td><input id='seventhf-".$elist['programenrolmentid']."' style='width:70px;text-align:center;' type='number' value='".$elist['seventhf']."'></td>";
					echo "<td>".$elist['totalmale']."</td>";
					echo "<td>".$elist['totalfemale']."</td>";
					echo "<td>".$elist['gtotal']."</td>";
					echo "<td><button  class='btn btn-primary' title='Save' onClick='updateenr(".$elist['programenrolmentid'].")'><i class='gi gi-floppy_saved'></i></button></td>";
				}
				
								
				echo "</tr>";
				
				
				endforeach;
				
				
				?>
					
					
					
                </tbody>
            </table>
        </div>
										
										
										
										
							
										
										
										</div> <!--end enrolment-->
                                        <div class="tab-pane" id="block-tabs-profile">
										
										<div class="table-responsive">
            <table id="example-datatable2" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th>Year</th>
                        
                        <th>Graduate Male</th>
						<th>Graduate Female</th>
						<th>Total Graduate</th>
						<th></th>
						
                       <!--<th class="text-center" style="width: 75px;"></th> -->
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($graduate_list as $glist):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				
				echo "<td>".$glist['gdatayear']."</td>";
				if($current_ay['settings_value']!=$glist['gdatayear']){
					echo "<td>".$glist['gradm']."</td>";
					echo "<td>".$glist['gradf']."</td>";
					echo "<td>".$glist['gtotal']."</td>";
					echo "<td></td>";
				}else{
					echo "<td><input id='gmale-".$glist['programgraduateid']."' style='width:70px;text-align:center;' type='number' value='".$glist['gradm']."'></td>";
					echo "<td><input id='gfemale-".$glist['programgraduateid']."' style='width:70px;text-align:center;' type='number' value='".$glist['gradf']."'></td>";
					echo "<td>".$glist['gtotal']."</td>";
					echo "<td><button  class='btn btn-primary' title='Save' onClick='updategnr(".$glist['programgraduateid'].")'><i class='gi gi-floppy_saved'></i></button></td>";
				}
				
								
				echo "</tr>";
				
				
				endforeach;
				
				
				?>
					
					
					
                </tbody>
            </table>
        </div>
										
										</div><!-- end graduate -->
                                        <div class="tab-pane" id="block-tabs-settings">Settings..</div>
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
		
		
		
   </div> <!-- end column -->
</div> <!-- end row -->
						
						
						
						
						
						
						<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>School Year</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">School Year</label>
                                            <div class="col-md-6">
                                                <input type="text" id="programsy" name="state-normal" class="form-control" placeholder="2017-2018">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Position</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="programtable">
													<option value="Enrolment">Enrolment</option>
													<option value="Graduate">Graduate</option>
												</select>
                                            </div>
                                        </div>
										
										
									
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="saveprogramsy();">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->	
			
						
						
						
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->


