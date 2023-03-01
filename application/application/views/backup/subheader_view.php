<!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href=""><strong><?php echo $title;?></strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Search Form 
                            <li>
                                <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                                </form>
                            </li>-->
                            <!-- END Search Form -->

                            <!-- Alternative Sidebar Toggle Button -->
                            <li>
								 <?php 
									$this->load->library('session');
									$this->session;
									$u_name =  $this->session->userdata('name');
									$u_type =  $this->session->userdata('usertype');
								 ?>
                                <a href="javascript:void(0)">
                                    Hi! <?php echo $u_name;?> (<?php echo $u_type;?>)
                                </a>
                            </li> 
                            <!-- END Alternative Sidebar Toggle Button -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_url()?>/public/img/placeholders/avatars/avatar9.jpg" alt="avatar">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>Settings</strong>
                                    </li>
                                    <!-- <li>
                                        <a href="page_app_email.html">
                                            <i class="fa fa-inbox fa-fw pull-right"></i>
                                            Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_app_social.html">
                                            <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_app_media.html">
                                            <i class="fa fa-picture-o fa-fw pull-right"></i>
                                            Media Manager
                                        </a>
                                    </li>
                                    <li class="divider"><li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                                            <i class="gi gi-settings fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="systeminformation">
                                            <i class="gi gi-settings fa-fw pull-right"></i>
                                            System Information
                                        </a>
                                    </li> 
									 <li>
                                        <a id="adduser" href="#changepwmodal" data-toggle="modal">
                                            <i class="gi gi-settings fa-fw pull-right"></i>
                                            Change Password
                                        </a>
                                    </li> 
									<?php
									$usertype = $this->session->userdata('usertype');
									if($usertype=="superadmin"){
										echo "<li>
                                        <a href='".base_url()."users'>
                                            <i class='gi gi-user pull-right'></i>
                                            Users
                                        </a>
                                    </li>";
									}
									
									?>
                                    <li>
                                        <a href="<?=base_url()?>login/logout">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                            Log out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->
					
					 <!-- Regular Modal -->
                <div id="changepwmodal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Change Password</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form id="changepass_form" action="<?php echo base_url();?>change_pass" method="post" class="form-horizontal" >
                    <div class="form-group">
					<input type="hidden" id="uid" name="uid" name="state-normal" class="form-control" value="<?php echo $this->session->userdata('uid');?>">
                        
						
						<label class="col-md-3 control-label" for="state-normal">Current Password*</label>
                        <div class="col-md-7">
                            <input type="password" id="current_password" name="current_password" class="form-control" tabindex="0" >
                        </div>
						<div class="row"></div>
						<label class="col-md-3 control-label" for="state-normal">New Password*</label>
                        <div class="col-md-7">
                            <input type="password" id="new_password" name="new_password" class="form-control" tabindex="0" >
                        </div>
						

                    </div>
                    
               
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                
								<button type="button" class="btn btn-effect-ripple btn-primary" onclick="changpass();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" id="changepassclose">Close</button>
					 </form>			
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->