
<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	


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
								<form  method="get" action="report_generate.php">
									<div class="form-group">
									    </label>Enter Patient ID:</label>
										<input type="number_format" class="form-control" id="inputName "name="id" placeholder="Enter Patient ID" required>
									</div>
                                    <div class="form-group">
									    </label>Enter Patient Name:</label>
										<input type="text" class="form-control" id="inputName "name="name" placeholder="Enter Patient ID" required>
									</div>

									<div class="form-group">
										<a href="report_generate.php?id=<?php echo $_POST['id']; ?>&name=<?php echo $_POST['name'];?>"><button type="submit" class="btn btn-primary" style="width:200px;margin-left:110px;">Submit</button></a>
									</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>