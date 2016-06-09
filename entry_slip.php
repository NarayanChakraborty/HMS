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
         
		
<?php include_once("config.php");?>
	<!--banner-->
	<div class="row"style="min-height:450px;">
        
        <div class="col-xs-6 col-md-4">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
		
		
		<div id="printableArea">
			
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:40px;padding-left:30px;" data-example-id="basic-forms"> 
			                 
					<div class="navbar-header navbar-left">
					<h1><a href="index2.php"><img src="images/logo.png" alt="">Patient Care</a>
					<h5 style="margin-left:80px;margin-top:-10px;">Imargency:01713687237<h5>
					</h1>
					<br>
						
				</div>
							<div class="form-title" style="margin-top:130px;">
							      	<?php 
											
											
										
								  
								  
								  $statement=$db->prepare('SELECT * FROM patient_details ORDER BY p_id DESC LIMIT 1');
								  $statement->execute();
								  $result=$statement->fetchAll(PDO::FETCH_ASSOC);
								  foreach( $result as $row)
								  {
									  ?>
									  <table>
									  	   <tr> <td> <strong>Patient Name </strong></td><td><?php echo ": ".$row['p_name']; ?> </td> </tr>
											<tr> <td><strong>Patient ID     </strong></td><td><?php echo ": ".$row['p_id']; ?> </td> </tr>
                                             <tr> <td> <strong>Contact Number </strong></td><td><?php echo ": ".$row['p_contact_no']; ?></td> </tr>
											<tr> <td><strong>Sex             </strong></td><td><?php echo ": ".$row['p_sex']; ?> </td> </tr>
                                            <tr> <td><strong>National ID     </strong></td><td><?php echo ": ".$row['p_nid']; ?> </td> </tr>
											
											<tr> <td><?php 
											$statement1 = $db->prepare("SELECT employee_id FROM doctor_details where doctor_id=?");
										    $statement1->execute(array($row['p_doctor_id']));
										    $result1 = $statement1->fetch();
											$employee_id=$result1['employee_id'];
											
											            $statement2 = $db->prepare("SELECT e_name FROM employee_details where e_id=?");
										                $statement2->execute(array($employee_id));
														$result2 = $statement2->fetch();
														  
														  echo $result2['e_name'];
											
											?></td>
											</tr>
												
											<tr> <td><strong>Doctor Name    </strong></td><td><?php echo ": "; ?> </td> </tr>
											<tr> <td><strong>Entry Date       </strong></td><td><?php echo ": ".$row['p_entry_date']; ?></td> </tr>
											
									 </table>		
										<?php
									  
									  
								  }
										   ?>
							</div><br><br><br>
							<h5> THANKS FOR TAKING OUR SERVICE</h5><br>
				
								
                  <input type="button" href="javascript:void(0);" margin onclick="printPageArea('printableArea')" value= "print" />				
							
			</div>
		

	
		</div>
     </div>
	
	
	
	
<?php include_once("footer.php");?>