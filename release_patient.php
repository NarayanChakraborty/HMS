	<!--banner-->
<?php include("header.php");?>
         
		

	<!--banner-->
	<div class="row">
        
        <div class="col-xs-6 col-md-4"style="min-height:400px;">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Provide Information:</u></h4>
							</div><br>
							<div class="form-body">
								<form data-toggle="validator">
									<div class="form-group">
									    </label>Enter Patient Name:</label>
										<input type="text" class="form-control" id="inputName" placeholder="Username" required>
									</div>

									<div class="form-group">
									</label>Enter National ID:</label>
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