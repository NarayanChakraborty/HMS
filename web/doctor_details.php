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
		
		
		<h2 style="margin-bottom:10px;">Doctor Information</h2>
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
											<th>Degrees</th>
                                            <th>Contact Number</th>
                                            <th>Type</th>
											<th>Department</th>
                                            <th>National ID</th>
											<th>Email</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Abdul</td>
											<td>Msc in DMC</td>
                                            <td>01712345672</td>
                                            <td class="center">Permanent</td>
											<td class="center">Cardiology</td>
                                            <td class="center">6655234002871762</td>
											<td class="center">abdul@gmail.com</td>
											<td>
										      <div class="btn-group-sm">
											  <a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-asterisk"></i></a>
											  <a class="btn btn-success" href="#"><i class="glyphicon glyphicon-pencil"></i></a>
											  <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Hasan javed</td>
											<td>Msc in CMC</td>
                                            <td>01712345672</td>
                                            <td class="center">Visiting</td>
											<td class="center">Heart</td>
                                            <td class="center">6655234087541762</td>
											<td class="center">hasan345@gmail.com</td>
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