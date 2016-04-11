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
											  <a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-asterisk"></i></a>
											  <a class="btn btn-success" href="#"><i class="glyphicon glyphicon-pencil"></i></a>
											  <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                           <td>parvin sultana</td> 
                                            <td>01712345672</td>
                                            <td class="center">parmanent</td>
                                            <td class="center">6655234002871762</td>
											<td class="center">01</td>
											<td class="center">Night</td>
											<td>
										      <div class="btn-group-sm">
											  <a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-asterisk"></i></a>
											  <a class="btn btn-success" href="#"><i class="glyphicon glyphicon-pencil"></i></a>
											  <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-remove"></i></a>
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