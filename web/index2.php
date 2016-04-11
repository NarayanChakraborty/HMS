	<!--banner-->
<?php include("header.php");?>
         
		

	<!--banner-->
	<div class="row">
        
        <div class="col-xs-6 col-md-4">
		   
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
		<div class="col-xs-12 col-sm-6 col-md-8"><h1 style="text-align:center;margin-left:-130px;margin-top:100px;padding-bottom:200px;">Welcome <br> To <br> Our Hospital Management System</h1></div>
     </div>
	
<?php include_once("footer.php");?>