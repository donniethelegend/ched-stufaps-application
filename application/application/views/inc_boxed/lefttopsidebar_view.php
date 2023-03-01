<body class="layout-boxed-bg sidebar-xs">

	<!-- Boxed layout wrapper -->
	<div class="d-flex flex-column flex-1 layout-boxed collapse">

		<!-- Main navbar -->
		<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">


			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<i class="icon-tree5"></i>
				</button>
				<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
					<i class="icon-paragraph-justify3"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbar-mobile">
			
			

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="https://stufaps.chedro1.com" target="_blank" class="navbar-nav-link">
							Home
						</a>
						
					</li>
					<li class="nav-item">
                                            <a href="<?= base_url() ?>" class="navbar-nav-link">
							Application Form
						</a>
						
					</li>
					
				
					
					<li class="nav-item">
						<a href="https://stufaps.chedro1.com/documentary-requirements/" class="navbar-nav-link">
							Requirements
						</a>
						
					</li>
					
					<li class="nav-item">
						<a href="#" class="navbar-nav-link" id="sweet_reprint">
							Re-Print Form
						</a>
						
					</li>
					
					<li class="nav-item">
						<a href="https://stufaps.chedro1.com/contacts/" class="navbar-nav-link">
							Contact Us
						</a>
						
					</li>
                                        <?php
                                        if(!$_SESSION['name']){
                                        ?>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link" id="sweet_myportal">
							MyPortal
						</a>
                                       
						
					</li>
                                        <?php 
                                        }
                                        else
                                        {
                                        ?>
					<li class="nav-item ">
					<div class="dropdown">
                                            <a class="navbar-nav-link dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">MyPortal
                                            <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                             
                                              <li role="presentation"><a role="menuitem" href="index.php/myportal">View My Portal</a></li>
                                              <li role="presentation"><a role="menuitem" href="index.php/myportal/logout">logout</a></li>
                                            </ul>
                                          </div>
						
					</li>
                                            <?php 
                                        }
                                       
                                        ?>
				
				</ul>
			</div>
		</div>
		<!-- /main navbar -->


		<!-- Page content -->
		<div class="page-content">

			