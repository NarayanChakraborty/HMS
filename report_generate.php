
<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	
<?php
if(!isset($_REQUEST['id']))
{
	header("location: release_patient.php");
}
else
{
		$id=$_REQUEST['id'];
}

?>

	<!--banner-->
<?php include("header.php");?>
         <?php include_once("config.php");?>
		

	<!--banner-->
	<div class="row"style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:40px;padding=-left:30px;" data-example-id="basic-forms"> 
			                 
					<div class="navbar-header navbar-left">
					<h1><a href="index.html"><img src="images/logo.png" alt="">Patient Care</a>
					<h5 style="margin-left:80px;margin-top:-10px;">Imargency:01713687237<h5>
					</h1>
					<br>
						
				</div>
							<div class="form-title">
							        <?php
									
									 $statement3 = $db->prepare("SELECT * from bill where patient_id=?");
										                $statement3->execute(array($id));
												$result3=$statement3->fetchAll();
		                                     foreach($result3 as $row3)
											 {
									
									?>
								        <label>Treatment Charge : <?php echo $row3['treatment_charge']; ?></label><br>
										<label>Medicine Charge   :<?php echo $row3['medicine_charge']; ?> </label><br>
										<label>Room      Charge  : <?php echo $row3['room_charge']; ?></label><br>
										<label> Total            : <?php echo $row3['total_charge']; ?>  </label><br>
							</div><br><br><br>
							<h5> THANKS FOR TAKING OUR SERVICE</h5><br>
							<?php
														}
														?>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>