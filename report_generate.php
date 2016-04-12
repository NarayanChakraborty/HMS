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
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;" data-example-id="basic-forms"> 
							<div class="form-title">
											
									    <label>Patient Name :Nahida Akter</label><br>
										<label>National  Id :0178263524273</label>
								
							</div><br>
							<div class="form-body">
								<form data-toggle="validator">


									<div class="form-group">
									</label>Enter Treatment Charge:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="NID Number" required>
									</div>
									<div class="form-group">
									</label>Enter Medicine Charge:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="NID Number" required>
									</div>
									<div class="form-group">
									</label>Room Charge:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="NID Number" required>
									</div>

									<div class="form-group">
										<a href="report_generate.php"><button type="submit" class="btn btn-primary" style="width:200px;margin-left:110px;">Submit</button></a>
									</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>