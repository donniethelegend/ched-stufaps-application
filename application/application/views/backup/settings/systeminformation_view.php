
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php if ($utype=='Superadmin'){
		$this->load->view('central_office/central_leftsidebar_view'); 
	}else{
		$this->load->view('leftsidebar_view'); 

	}?>
	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php $this->load->view('inc/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
   
			<div class="col-md-6 col-lg-6">
				<!-- Unordered List Block -->
				<div class="block full">
					<!-- Unordered List Title -->
					<div class="block-title">
						<h2>About the System</h2>
					</div>
					<!-- END Unordered List Title -->

					<!-- Unordered List Content -->
					<p>
					This <strong>CHED Electronic Collection & Knowledge System (CHECKS)</strong> is a property of Philippine Commission on Higher Education (CHED) developed/enhanced by <strong>Elvin Casem</strong> and <strong>Christianne Lynnette Cabanban Casem </strong>under the leadership of <strong>Dr. Cherrie Melanie Ancheta-Diego</strong> of <strong>CHED Regional Office I</strong>
					<br>
					<br>
CHED Electronic Collection and Knowledge System (CHECKS) is a higher education portal
that simplifies information exchange for the CHED administrative and technical staff along
with the Higher Education Institution (HEIs) stakeholders through URL http://13.228.96.63/
that provides the following modules:<br><br>
a. Live Data Visualization – real-time presentation of data in pictorial/graphical
format.<br><br>
b. Dashboard Panel – A dashboard consists of different components and various
features that helps the users to organize and view data in a systematic way.<br><br>
c. Higher Education Institution Directory-This module displays basic and extensive information about the Higher
Education Institution, including the curriculum program profile, current total number of
Enrollees based from the submitted CHECKS document, permits and recognition, dean’s
profile. It also provides a facility to update the profile of HEI.<br><br>
d. Program Application -This refers to the “Permit Phase” as per MORPHE Section 56. The grant of
authority begins in the permit phase wherein the Regional office assess the completeness
of the documentary requirements in their application.<br><br>
e. Permit and Recognition

-This module displays the list of HEIs with their corresponding TP/GR Nos.

(Authority to Operate) and year of effectivity.<br><br>
f. Dean/Program Head List

-This refers to the directory of Deans and Program Heads of HEIs.<br><br>

g. Building List

-A newly added module that displays the inventory of building, classrooms

and laboratories in HEIs.<br><br>
h. Department List

-Displays the offered programs in HEIs.<br><br>

i. EETEAP

-Displays the HEIs offering Expanded Tertiary Education Equivalency and

Accreditation Program.<br><br>
The system is expected to operate with the following minimum requirements:
1. At least 5 mbps Internet Connection.<br>
2. Internet Browser<br>
a. Google Chrome v. 62 and above<br>
</p>
					<!-- END Unordered List Content -->
				</div>
				<!-- END Unordered List Block -->
			</div>
			<div class="col-md-6 col-lg-6">
				<!-- Unordered List Block -->
				<div class="block full">
					<!-- Unordered List Title -->
					<div class="block-title">
						<h2>System Requirements</h2>
					</div>
					<!-- END Unordered List Title -->

					<!-- Unordered List Content -->
					<ul>
						<li>Google Chrome</li>
						<li>Mozilla Firefox (Limited Dropdown/Search)</li>
						<li>Linux, Mac or Windows OS</li>
						
					</ul>
					<!-- END Unordered List Content -->
				</div>
				<!-- END Unordered List Block -->
			</div>
            <!-- Partial Responsive Block -->
			<div class="col-md-6 col-lg-12">
				<!-- Unordered List Block -->
				<div class="block full">
					<!-- Unordered List Title -->
					<div class="block-title">
						<h2>System Update</h2>
					</div>
					<!-- END Unordered List Title -->

					<!-- Unordered List Content -->
					<ul>
						<li>
							Update 2017-12-05
							<ul>
								<li>Added School Year Management (Central Office)</li>
								
							</ul>
						</li>
						<li>
							Update 2017-12-01
							<ul>
								<li>Updated Sidebar Menu</li>
								<li>Updated HEI Profile Fields</li>
								<li>Added Program Search</li>
								<li>Added Program by Region</li>
								
							</ul>
						</li>
						<li>
							Update 2017-11-22
							<ul>
								<li>Added logs for Regional Office</li>
								
							</ul>
						</li>
						<li>
							Update 2017-11-21
							<ul>
								<li>Added Dean Download</li>
								<li>Added Faculty Download</li>
								<li>Added Academic Year for CO</li>
								
							</ul>
						</li>
						<li>
							Update 2017-11-10
							<ul>
								<li>Added dropdown fields in authority (ticket #997968)</li>
								
							</ul>
						</li>
						<li>
							Update 2017-11-09
							<ul>
								<li>Edit and Update Permit & Recognition (ticket #362090)</li>
								<li>Download All Programs additional field (HEI Name) (ticket #890829)</li>
								<li>Additional Status under Program Application "Autonomous" (ticket #665477)</li>
								<li>Additional column(Total Enrolment, Total Graduate) in XLS download all programs (ticket #616600, #576555, #381436)</li>
							</ul>
						</li>
						<li>
							Update 2017-11-06
							<ul>
								<li>Move Save HEI Profile at the bottom (ticket #936345)</li>
							</ul>
						</li>
						<li>
							Update 2017-10-27
							<ul>
								<li>Restrict pages by user</li>
								<li>Download XLS for Central Office</li>
							</ul>
						</li>
						<li>
							Update 2017-10-25
							<ul>
								<li>Added delete formername</li>
								<li>Alter database table for formername</li>
								<li>Added system information page</li>
							</ul>
						</li>
						<li>
							Update 2017-10-23
							<ul>
								<li>Added Central Office Login</li>
								<li>Fixed map loading</li>
								<li>Fixed chart data display</li>
								
							</ul>
						</li>
						<li>
							Update 2017-10-20
							<ul>
								<li>Limit access to hei users</li>
								<li>Lock AY if not current AY</li>
								<li>Optimize query in adding new AY</li>
								<li>Update HEI User, Program List, Enrolment and Graduate Interface</li>
							</ul>
						</li>
						<li>
							Update 2017-10-19
							<ul>
								<li>Fixed breadcrumb</li>
								<li>Fixed hei profile interface</li>
								<li>Added HEI Login</li>
								<li>HEI login logs</li>
								
							</ul>
						</li>
						
					</ul>
					<!-- END Unordered List Content -->
				</div>
				<!-- END Unordered List Block -->
			</div>
			
			 
			 
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


