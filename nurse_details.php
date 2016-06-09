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
	<div class="row">        
        <div class="col-md-3"style="margin-top:3px;">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-md-9" style="margin-top:15px;">
		
		
		<h2 style="margin-bottom:10px;">Nurse Information</h2>
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nurse Name</th>
                                            <th>Contact Number</th>
                                            <th>Type</th>
                                            <th>National ID</th>
											
											<th>Sex</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
										<?php 
											$statement1 = $db->prepare("SELECT * FROM nurse_details");
										    $statement1->execute();
										    $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											   
											   
											$statement2 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement2->execute(array($row1['employee_id']));
										     $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result2 as $row2)
						                   {
										?>
										
									           
									
                                        <tr class="odd gradeX">

                                            <td class="center"> <?php echo $row2['e_name']; ?></td> 
                                            <td class="center"><?php echo $row2['e_contact_no']; ?></td>
                                            <td class="center"><?php echo $row1['nurse_type']; ?></td>
                                            <td class="center"><?php echo $row2['e_nid']; ?></td>
											<td class="center"><?php echo $row2['e_sex']; ?></td>
											
											<td>
										      <div class="btn-group-sm">
											  <a class="btn btn-primary fancybox" href="#inline1" title="view" ><i class="glyphicon glyphicon-asterisk"></i></a>
											  <!--Fancy Box-->
													  
											<div id="inline<?php echo $row1['nurse_id'];?>" style="display:none;width:700px;margin:10px 30px">
											<h3 style= "border-bottom: 2px solid #295498; color:#0C86AC;margin-bottom:10px;" ><strong>Nurse Details &nbsp; :</strong> <?php echo $row2['e_name']; ?></h3>	
											<img src="images/nurses_image/<?php echo $row2['e_image'];?>" width="450" height="400"><br>	
											<strong>Nurse's ID :</strong><p><?php echo $row1['nurse_id']; ?></p>
											
                                            <strong>Contact Number</strong></p><?php echo $row2['e_contact_no']; ?></p>
											<strong>Email</strong><p><?php echo $row2['e_email_id']; ?></p>
											<strong>Sex</strong><p><?php echo $row2['e_sex']; ?></p>
					
											<strong>Type</strong><p><?php echo $row1['nurse_type']; ?></p>
                                            <strong>National ID </strong> <p><?php echo $row2['e_nid']; ?></p>
											<img src="images/nurses_nid/<?php echo $row2['e_nid_image'];?>" width="450" height="400">	
									
										
														
														
													  </div>
													  <!--Fancy box End-->
											  

											  <a class="btn btn-success" href="patient_edit.php"><i class="glyphicon glyphicon-pencil"></i></a>
											  <a class="btn btn-danger" href="#" title="delete patient" data-toggle="modal" data-target="#patientmodal"><i class="glyphicon glyphicon-remove"></i></a>
											  
											 <!-- Modal -->
													<div id="patientmodal" class="modal fade " role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">DELETE Confirmation</h4>
														  </div>
														  <div class="modal-body">
															<h4>Are You Confirm To Delete This Element?</h4>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<a class="btn btn-danger btn-ok" href="product_delete.php?id=<?php echo $row['p_id']; ?>" >Confirm</a>
														  </div>
														</div>

													  </div>
													</div> 
											  
											  
											  
                                              </div>
                                            </td>
                                        </tr>
                                        
                                        <?php
										       }
										   }
										   ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
		
		
		
		
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>