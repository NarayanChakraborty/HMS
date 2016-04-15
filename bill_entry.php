	<!--banner-->
<?php include("header.php");?>
         
		

	<!--banner-->
	<div class="row">
        
        <div class="col-xs-6 col-md-4">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
			<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;"data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Bill Entry Form :</u></h4>
							</div><br>
							<div class="form-body">
								<form data-toggle="validator">
									<div class="form-group">
									    </label>Treatment Charge:</label>
										<input type="text" class="form-control" id="inputName" placeholder="Username" required>
									</div>
									<form data-toggle="validator">
									<div class="form-group">
									    </label>Medicine Charge:</label>
										<input type="text" class="form-control" id="inputName" placeholder="Degrees" required>
									</div>
									<div class="form-group has-feedback">
									</label>Room Charge:</label>
										<input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary" style="width:200px;margin-left:110px;">Save</button>
									</div>
								</form>
							</div>
						</div>
		
		</div>
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>