<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>CHED RO1 S.O.S.</title>

        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?=base_url()?>img/favicon.png">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?=base_url()?>img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?=base_url()?>public/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <!-- Login Container -->
        <div id="login-container">
            <!-- Login Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <i class="fa fa-cube"></i> <strong>CHED RO1 - S.O.S.</strong>
            </h1>
            <!-- END Login Header -->

			<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">HEI Login</a></li>
                                            <li><a href="#block-tabs-profile">RO Login</a></li>
                                           
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="block-tabs-home">
		<!-- Login Block -->
            <div class="block animation-fadeInQuickInv">
                <!-- Login Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                       
                    </div>
					
                    <h2>HEI User Login</h2>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form id="form-login" action="login_hei/verify" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="heiusername" name="heiusername" class="form-control" placeholder="Your username...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="heilogin-password" name="heilogin-password" class="form-control" placeholder="Your password..">
                        </div>
                    </div>
					 <div class="form-group">
                        <div class="col-xs-12">
							<select class="form-control" id="heiregioncode" name="heiregioncode">
								<?php
									foreach($regions as $regionlist):
										echo "<option value='".$regionlist['regioncode']."'>".$regionlist['region_description']."</option>";
									endforeach;
								?>
								
							</select>
                           
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                           
                        </div>
                        <div class="col-xs-4 text-right">
                            <button class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Login</button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->
            </div>
            <!-- END Login Block -->
										
										</div> <!--end login hei -->
                                        <div class="tab-pane" id="block-tabs-profile">
		<!-- Login Block -->
            <div class="block animation-fadeInQuickInv">
                <!-- Login Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                       
                    </div>
                    <h2>Regional Office Login</h2>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form id="form-login" action="login/verify" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Your username...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Your password..">
                        </div>
                    </div>
					 <div class="form-group">
                        <div class="col-xs-12">
							<select class="form-control" id="regioncode" name="regioncode">
								<?php
									foreach($regions as $regionlist):
										echo "<option value='".$regionlist['regioncode']."'>".$regionlist['region_description']."</option>";
									endforeach;
								?>
								
							</select>
                           
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                           
                        </div>
                        <div class="col-xs-4 text-right">
                            <button class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Login</button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->
            </div>
            <!-- END Login Block -->
										
										
										</div> <!-- end ro login -->
                                        
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
								
            

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small> &copy; <a href="http://chedro1.com" target="_blank">CHED RO1 S.O.S. </a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?=base_url()?>public/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url()?>public/js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_url()?>public/js/plugins.js"></script>
        <script src="<?=base_url()?>public/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url()?>public/js/pages/readyLogin.js"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
    </body>
</html>