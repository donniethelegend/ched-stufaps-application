<!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="<?=base_url()?>home" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide"><?php echo $this->session->userdata('office_name'); ?></span>
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="<?=base_url()?>home" class=""><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                <li class="<?php echo $heiclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">HEI</span></a>
                                    <ul>
										<li >
                                            <a href="<?=base_url()?>heidirectory" class="<?php echo $heilist;?>">HEI Directory</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>programapplication" class="<?php echo $programapplication;?>">Program Application</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>permitsrecognition" class="<?php echo $permits;?>">Permit & Recognition</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>programlist" class="<?php echo $programlist;?>">Program List</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>faculty" class="<?php //echo $facultylist;?>">Faculty List</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>deans" class="<?php echo $deanslist;?>">Deans List</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>buildings" class="<?php //echo $deanslist;?>">Building List</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>departments" class="<?php //echo $deanslist;?>">Department List</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>eteeap" class="<?php //echo $deanslist;?>">ETEEAP</a>
                                        </li>
										<li>
                                            <a href="#" class="sidebar-nav-submenu"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>PRC Graduates</a>
                                            <ul>
                                                <li>
                                                    <a href="<?=base_url()?>prcgraduates/search">Graduate Search</a>
                                                </li>
                                                <li>
                                                    <a href="<?=base_url()?>prcgraduates">Upload List</a>
                                                </li>
                                                
                                                
                                            </ul>
                                        </li>
										
									</ul>
								</li>
<!--
								<li class="<?php echo $scholarship;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Scholarship</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>scholarslist" class="<?php echo $scholarslist;?>">Grantee List</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>awardnumber" class="<?php //echo $scholarslist;?>">Award Number</a>
                                        </li>
										
										<li>
                                            <a href="<?=base_url()?>voucherlist" class="<?php echo $voucherlist;?>">Voucher List</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>paymentlist" class="<?php echo $paymentlist;?>">Payment List</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>accreditedheilist" class="<?php echo $accreditedhei;?>">Accredited HEI List</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>scholarshipapplicants" class="<?php echo $scholarshipapplicant;?>">Scholarship Applicants</a>
                                        </li>
										
										<li >
                                            <a href="#" class="hidden<?php //echo $programlist;?>">Settings</a>
                                        </li>
										
										
									</ul>
								</li>								
							
								<li class="<?php //echo $scholarship;?> hidden">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Personnel</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>employeelist" class="<?php echo $scholarslist;?>">Employee List</a>
                                        </li>

									</ul>
								</li>	
							-->	
								
								<li>
								<a href="<?=base_url()?>accounts" class="<?php echo $accounts;?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-group sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Accounts</span></a>
								</li>
								<li>
								<a href="<?=base_url()?>contacts" class="<?php echo $contacts;?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contacts</span></a>
								</li>	

								<!--<li>
									<a href="<?=base_url()?>phmap" class="<?php echo $contacts;?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">MAP</span></a>
								</li>-->								
									
								<li>
								<a href="<?=base_url()?>reports" class="<?php //echo $accounts;?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="hi hi-stats sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Reports</span></a>
								</li>
<!-- Settings-->
								<?php 
									$this->load->library('session');
									$this->session;
									$u_type =  $this->session->userdata('usertype');
								 ?>
								 <?php
									if($u_type=='admin'){
								 ?>
								 
								<li class="<?php echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span></a>
                                    <ul>

										<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>systemsettings" ><i class="gi gi-user sidebar-nav-icon"></i>System Settings</a>
                                        </li>
										
										<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>users" ><i class="gi gi-user sidebar-nav-icon"></i>Users</a>
                                        </li>
										
										<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>heiusers" ><i class="fa fa-users"></i> HEI Users</a>
                                        </li>
										
										<!--
										
										<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>trash"> <i class="fa fa-users"></i> Trash</a>
                                        </li>
										-->
										
										<!--<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>supervisor" ><i class="gi gi-user sidebar-nav-icon"></i>Supervisor</a>
                                        </li>
										
										
										<li>
                                            <a  class="<?php //echo $userssubclass;?>" href="<?=base_url()?>tools" ><i class="gi gi-user sidebar-nav-icon"></i>Tools</a>
                                        </li>
										-->
										
										

                                        </li>
									<?php } ?>	
                            </ul>
							
							
							
							
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        
                        <div class="text-center">
                            
                            <small>&copy; CHED RO1 HEMIS</small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->