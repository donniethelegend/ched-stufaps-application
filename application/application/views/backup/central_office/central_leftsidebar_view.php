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
                                    <a href="<?=base_url()?>cohome" class=""><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                <li class="<?php echo $heiclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">HEI</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>heisearch" class="<?php echo $heilist;?>">HEI Search (National)</a>
                                        </li>
										
										<li>
                                            <a href="<?=base_url()?>heibyregion" class="<?php echo $heilist;?>">HEI by Region</a>
                                        </li>
										
										<!-- <li>
                                            <a href="<?=base_url()?>heireports" class="<?php echo $heilist;?>">HEI by Type</a>
                                        </li> -->
										
									</ul>
								</li>
								
								<li class="<?php echo $facultyclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Faculty</span></a>
                                    <ul>
										<li >
                                            <a href="<?=base_url()?>facultysearch" class="<?php //echo $heilist;?>">Faculty Search (National)</a>
                                        </li>
										
									</ul>
								</li>
								
								<li class="<?php echo $programclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Programs</span></a>
                                    <ul>
										<li >
                                            <a href="<?=base_url()?>programsearch" class="<?php //echo $heilist;?>">Program Search (National)</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>programbyregion" class="<?php //echo $heilist;?>">Program by Region</a>
                                        </li>
										<!-- <li>
                                            <a href="<?=base_url()?>heireports" class="<?php //echo $heilist;?>">Program by Level</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>heireports" class="<?php //echo $heilist;?>">Program by Discipline</a>
                                        </li> -->
										
									</ul>
								</li>
								
								<li class="<?php echo $enrolmentclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Enrolment</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>enrolmentbyprogram" class="<?php //echo $heilist;?>">Enrolment by Program</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>enrolmentbygender" class="<?php //echo $heilist;?>">Enrolment by Region (Gender)</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>enrolmentbydiscipline" class="<?php //echo $heilist;?>">Enrolment by Discipline</a>
                                        </li>
										
										<li >
                                            <a href="<?=base_url()?>enrolmentbycongdistrict" class="<?php //echo $heilist;?>">Enrolment by Congressional District</a>
                                        </li>
										
										
									</ul>
								</li>
							<li class="<?php echo $graduateclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Graduate</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>graduatebyprogram" class="<?php //echo $heilist;?>">Graduate by Program</a>
                                        </li>
									<li >
                                            <a href="<?=base_url()?>graduatebygender" class="<?php //echo $heilist;?>">Graduate by Region (Gender)</a>
                                        </li>
										
									 <li >
                                            <a href="<?=base_url()?>graduatebydiscipline" class="<?php //echo $heilist;?>">Graduate by Discipline</a>
                                        </li>
										
												<li >
                                            <a href="<?=base_url()?>graduatebycongdistrict" class="<?php //echo $heilist;?>">Graduate by Congressional District</a>
                                        </li> 
										
										
									</ul>
								</li>
							
							
								
								
													

<!-- Settings-->
								
								<li class="<?php //echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">System</span></a>
                                    <ul>
										<li >
                                            <a href="<?=base_url()?>loginbyregion" class="<?php //echo $heilist;?>">Login by Region</a>
                                        </li>
										<li >
                                            <a href="<?=base_url()?>academicyear" class="<?php //echo $heilist;?>">Academic Year</a>
                                        </li>

									</ul>
						
                                </li>
									
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