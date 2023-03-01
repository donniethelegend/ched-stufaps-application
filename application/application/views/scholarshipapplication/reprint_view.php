<style>
html {
  scroll-behavior: smooth;
}
</style>
				<!-- Content area -->
				<div class="content">

					
<!-- Form layouts -->



<div class="row">

<!-- Basic card -->
	<div class="col-md-12">
					<div class="card">
					<div class="card-header bg-white header-elements-inline">
						<h6 class="card-title">Re-Print Application Form</h6>
						
					</div>
					<br>
<div class="content d-flex justify-content-center align-items-center">				
				<!-- Login card -->
               
                                <form class="login-form" id="printpdf" name="form-login" action="<?= base_url()?>/application/reprint/reprintapplication" method="post" autocomplete="off"  onsubmit="login();return false">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                               
                                <span class="d-block text-muted">Enter your Application # and Mobile Number</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" id="applicationno" name="applicationno" class="form-control" placeholder="Application #" autocomplete="off">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
							
							

                            <div class="form-group form-group-feedback form-group-feedback-left">
							Mobile Number:
                                <div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<select name="mno" id="mno" class="form-control select-search required" data-fouc data-placeholder="Prefix">
										<option></option>
										
											<option value="63813">0813</option>
	<option value="63817">0817</option>
	<option value="63901">0901</option>
	<option value="63902">0902</option>
	<option value="63903">0903</option>
	<option value="63904">0904</option>
	<option value="63905">0905</option>
	<option value="63906">0906</option>
	<option value="63907">0907</option>
	<option value="63908">0908</option>
	<option value="63909">0909</option>
	<option value="63910">0910</option>
	<option value="63911">0911</option>
	<option value="63912">0912</option>
	<option value="63913">0913</option>
	<option value="63914">0914</option>
	<option value="63915">0915</option>
	<option value="63916">0916</option>
	<option value="63917">0917</option>
	<option value="63918">0918</option>
	<option value="63919">0919</option>
	<option value="63920">0920</option>
	<option value="63921">0921</option>
	<option value="63922">0922</option>
	<option value="63923">0923</option>
	<option value="63924">0924</option>
	<option value="63925">0925</option>
	<option value="63926">0926</option>
	<option value="63927">0927</option>
	<option value="63928">0928</option>
	<option value="63929">0929</option>
	<option value="63930">0930</option>
	<option value="63931">0931</option>
	<option value="63932">0932</option>
	<option value="63933">0933</option>
	<option value="63934">0934</option>
	<option value="63935">0935</option>
	<option value="63936">0936</option>
	<option value="63937">0937</option>
	<option value="63938">0938</option>
	<option value="63939">0939</option>
	<option value="63940">0940</option>
	<option value="63941">0941</option>
	<option value="63942">0942</option>
	<option value="63943">0943</option>
	<option value="63944">0944</option>
	<option value="63945">0945</option>
	<option value="63946">0946</option>
	<option value="63947">0947</option>
	<option value="63948">0948</option>
	<option value="63949">0949</option>
	<option value="63950">0950</option>
	<option value="63951">0951</option>
	<option value="63953">0953</option>
	<option value="63954">0954</option>
	<option value="63955">0955</option>
	<option value="63956">0956</option>
	<option value="63957">0957</option>
	<option value="63958">0958</option>
	<option value="63959">0959</option>
	<option value="63960">0960</option>
	<option value="63961">0961</option>
	<option value="63962">0962</option>
	<option value="63963">0963</option>
	<option value="63964">0964</option>
	<option value="63965">0965</option>
	<option value="63966">0966</option>
	<option value="63967">0967</option>
	<option value="63969">0969</option>
	<option value="63970">0970</option>
	<option value="63971">0971</option>
	<option value="63973">0973</option>
	<option value="63974">0974</option>
	<option value="63975">0975</option>
	<option value="63976">0976</option>
	<option value="63977">0977</option>
	<option value="63978">0978</option>
	<option value="63979">0979</option>
	<option value="63980">0980</option>
	<option value="63981">0981</option>
	<option value="63982">0982</option>
	<option value="63983">0983</option>
	<option value="63987">0987</option>
	<option value="63988">0988</option>
	<option value="63989">0989</option>
	<option value="63990">0990</option>
	<option value="63991">0991</option>
	<option value="63992">0992</option>
	<option value="63993">0993</option>
	<option value="63994">0994</option>
	<option value="63995">0995</option>
	<option value="63996">0996</option>
	<option value="63997">0997</option>
	<option value="63998">0998</option>
	<option value="63999">0999</option>
									
									</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="mno2" id="mno2" class="form-control required" placeholder="*******" data-mask="9999999" maxlength="7"> 
											</div>
										</div>

										
									</div>
                            </div>
							<div class="row">
							<div class="g-recaptcha" data-sitekey="6LfvgcgUAAAAACjGEjBkzbtuJnPWrZBHdvgD5ccr"></div>
							</div>
							
                            <div class="form-group">
                               <button class="btn btn-primary btn-block" >Download Application Form<i class="icon-circle-left2 ml-2"></i></button>
                            </div>

                           <button type="button" class="btn btn-light" id="sweet_error" style="visibility:hidden;"></button>
                           <button type="button" class="btn btn-light" id="sweet_html" style="visibility:hidden;"></button>
                           <button type="button" class="btn btn-light" id="sweet_download" style="visibility:hidden;"></button>
                        </div>
                    </div>
                </form>
                <!-- /login card -->
 </div>
						
					</div>
					<!-- /basic card -->
		</div>
</div>
		
		
		

					<div class="row" id="filloutform">
						

				
						
						
						
						
					</div>
					<!-- /row layouts -->
					

			
					
					

				</div>
				<!-- /content area -->
