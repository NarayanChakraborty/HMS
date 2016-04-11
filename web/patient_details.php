	<!--banner-->
<?php include("header.php");?>
         
		

	<!--banner-->
	<div class="row">
        
        <div class="col-md-3">
		   
		  <ul>
		    <li><a href="entry_patient.php" class="btn btn-secondary btn-lg active" id="button" role="button">Entry Patient</a></li>
			<li><a href="entry_doctor.php" class="btn btn-secondary btn-lg active" id="button" role="button">Entry Doctor</a></li>
			<li><a href="entry_nurse.php" class="btn btn-secondary btn-lg active" id="button" role="button">Entry Nurse</a></li>
		    <li class="dropdown"> <a href="#"  id="button" class="dropdown-toggle btn btn-secondary btn-lg active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Query Information<span class="caret"></span></a> 
												<ul class="dropdown-menu" aria-labelledby="navbarDrop1">
												<li class=""><a href="patient_details.php">Patient</a></li> 
													<li class=""><a href="#two">Doctor</a></li> 
													<li class=""><a href="#three">Nurse</a></li> 
													<li class=""><a href="#four">Receiptionist</a></li> 
									</ul> 
			</li> 
		 </ul>
		
		</div>
		<div class="col-md-9">
		
		
		<h2>Patient Information</h2>
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
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Patient Type</th>
                                            <th>National ID</th>
											<th>Entry Date</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Abdul</td>
                                            <td>abdul@gmail.com</td>
                                            <td>01712345672</td>
                                            <td class="center">Inpatient</td>
                                            <td class="center">6655234002871762</td>
											<td class="center">02/4/2016</td>
											<td>
										      <div class="btn-group">
											  <a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-asterisk"></i></a>
											  <a class="btn btn-success" href="#"><i class="glyphicon glyphicon-pencil"></i></a>
											  <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Taijul</td>
                                            <td>taijul@yahoo.com</td>
                                            <td>01818765234</td>
                                            <td class="center">Outpatient</td>
                                            <td class="center">1884532179078656</td>
											<td class="center">20/3/2016</td>
											<td>
										      <div class="btn-group">
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