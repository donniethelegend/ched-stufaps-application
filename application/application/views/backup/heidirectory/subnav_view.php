<div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1><?php 
					if($page=='index'){
						echo $details['instname'];
					}else{
						echo $details->instname;
					}
					
					 ?></h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>HEI</li>
                        <li><a href="#">HEI List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>