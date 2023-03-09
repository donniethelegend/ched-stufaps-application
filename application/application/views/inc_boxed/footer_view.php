<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light">
					

					<div class="navbar-collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; <?php echo date("Y");?>. <a href="#">StuFAPs Online Application</a> by <a href="https://chedro1.com" target="_blank">CHED Regional Office 1</a>
						</span>

						
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /boxed layout wrapper -->
<?php
		
		if($jsfile!=null){
			
			echo "<script src='".base_url()."public/js/$jsfile'></script>";
		}
		?>
		
	
</body>
</html>
