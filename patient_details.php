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
		
		
		<h2 style="margin-bottom:10px;">Patient Information</h2>
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Contact Number</th>
											<th>Email</th>
                                            <th>National ID</th>
											<th>Sex</th>
											<th>Doctor Name</th>
											<th>Room ID</th>
											<th>Entry</th>
											<th>Bill</th>
											<th>Release</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								 $statement=$db->prepare('Select * from patient_details');
								  $statement->execute();
								  $result=$statement->fetchAll(PDO::FETCH_ASSOC);
								  foreach( $result as $row)
								  {
									  ?>
									
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['p_name']; ?></td>
                                           
                                            <td><?php echo $row['p_contact_no'];?></td>
											<td class="center"><?php echo $row['p_email_id']; ?></td>
                                            <td class="center"><?php echo $row['p_nid']; ?></td>
											<td class="center"><?php  echo $row['p_sex']; ?></td>
											<td class="center">
											
											<?php 
											$statement1 = $db->prepare("SELECT employee_id FROM doctor_details where doctor_id=?");
										    $statement1->execute(array($row['p_doctor_id']));
										    $result1 = $statement1->fetch();
											$employee_id=$result1['employee_id'];
											
											            $statement2 = $db->prepare("SELECT e_name FROM employee_details where e_id=?");
										                $statement2->execute(array($employee_id));
														$result2 = $statement2->fetch();
														  
														  echo $result2['e_name'];
											
											?>
											</td>
											<td class="center"><?php echo $row['p_room_id']; ?></td>
											<td class="center"><?php echo $row['p_entry_date'];?></td>
											<td class="center"> <a class="btn btn-success" href="bill_entry.php?id=<?php echo $row['p_id']; ?>"title="create bill" style="width:40px;height:30px;">bill</a></td>
											<td class="center"></td>
											
											<td>
										      <div class="btn-group-sm">
											  <a class="btn btn-primary fancybox" href="#inline1" title="view" ><i class="glyphicon glyphicon-asterisk"></i></a>
											  <!--Fancy Box-->
													  
													  <div id="inline1" style="display:none;width:700px;margin:10px 30px">
														<h2>Hello</h2>
														
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
										?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
		
		
		
		
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>