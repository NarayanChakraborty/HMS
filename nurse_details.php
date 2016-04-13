	<!--banner-->
<?php include("header.php");?>
         
		

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
											<th>Room ID</th>
											<th>Shift</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Meghla </td> 
                                            <td>01712345672</td>
                                            <td class="center">Trainee</td>
                                            <td class="center">6655234002871762</td>
											<td class="center">01</td>
											<td class="center">Day</td>
											
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
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
		
		
		
		
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>