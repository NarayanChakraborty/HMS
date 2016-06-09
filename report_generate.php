
<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	
<?php
if((!isset($_REQUEST['id']))&&(!isset($_REQUEST['name'])))
{
	header("location: release_patient.php");
}
else
{
		$id=$_REQUEST['id'];
		$name=$_REQUEST['name'];
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
	
		<div class="col-xs-12 col-sm-6 col-md-8" style="min-height:450px;margin-top:30px;">
			
		
			
			<div class="col-md-6 validation-grids widget-shadow" style="margin-left:30px;" data-example-id="basic-forms"> 
			                 
	         <div id="printableArea">

				<div class="navbar-header navbar-left col-md-12"style="padding-bottom:80px;margin-top:40px;">
					<h1><a href="index2.php"><img src="images/logo.png" alt="">Patient Care</a>
					<h5 style="margin-left:80px;margin-top:-10px;">Imargency:01713687237<h5>
					</h1>
						
				</div>
							<div  style="margin-left:30px;">
							        <?php
									
									 $statement3 = $db->prepare("SELECT * from bill,patient_details where bill.patient_id=? AND patient_details.p_name=?");
										                $statement3->execute(array($id,$name));
														
												$result3=$statement3->fetchAll();
												if($result3)
												{
		                                     foreach($result3 as $row3)
											 {
									
									?>
									   
										<label>Patient Nmae: <?php echo $row3['p_name']; ?></label><br>
								        <label>Treatment Charge : <?php echo $row3['treatment_charge']; ?></label><br>
										<label>Medicine Charge   :<?php echo $row3['medicine_charge']; ?> </label><br>
										<label>Room      Charge  : <?php echo $row3['room_charge']; ?></label><br>
										<label> Total            : <?php echo $row3['total_charge']; ?>  </label><br>
							</div><br><br><br>
							<h5> THANKS FOR TAKING OUR SERVICE</h5><br>
							<?php
							   $release_date= date('Y-m-d');
						   
						   
						   $statement=$db->prepare("update  patient_details set p_release_date=? where p_id=?");
		                   $statement->execute(array($release_date,$id));
						   
														}
														?>
														
														
					</div>	
               					
				<input type="button" href="javascript:void(0);" name="release" style="margin-left:200px;" onclick="printPageArea('printableArea')" value= "print" />	
				
												<?php
												}
												else{
													
													?>
													<h4> Sorry !!! <span style="color:#F00; font-family:'Roboto-Regular'; " >Wrong Information</span> .Try with valid information 
												                  </h4>
														
														
													<br><br><a href="release_patient.php">	<button style="padding:5px;margin-left:300px;font-size:14px;" class="label label-primary">Try Again</button></a>
														
														<?php
														
												}	  
														?>
								
                 			
							
			</div>
		
		</div>
		
		</div>

	
<?php include_once("footer.php");?>