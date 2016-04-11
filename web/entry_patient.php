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
												<li class=""><a href="#one">Patient</a></li> 
													<li class=""><a href="#two">Doctor</a></li> 
													<li class=""><a href="#three">Nurse</a></li> 
													<li class=""><a href="#four">Receiptionist</a></li> 
												</ul> 
			</li> 
		 </ul>
		
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;"data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Patient Entry Form :</u></h4>
							</div><br>
							<div class="form-body">
								<form data-toggle="validator">
									<div class="form-group">
									    </label>Enter Patient Name:</label>
										<input type="text" class="form-control" id="inputName" placeholder="Username" required>
									</div>
									<div class="form-group has-feedback">
									</label>Enter Valid Email:</label>
										<input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
									<div class="form-group">
									</label>Contact No:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="Contact Number" required>
									</div>
									<div class="form-group">
									</label >Patient Type</label>
									<div ><select name="selector1" style="width:415px;" class="form-control">
										<option>In Patient</option>
										<option>Out Patient</option>
									</select></div>
								   </div>
								   
									<div class="form-group">
									</label>Enter National ID:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="NID Number" required>
									</div>
									
									<div class="form-group">
									</label>Room ID:</label>
									  <input type="password" data-toggle="validator" data-minlength="12" class="form-control" id="inputPassword" placeholder="Room Number" required>
									</div>
									
									<div class="form-group">
									</label>Sex:</label>
										<div class="radio">
											<label>
											  <input type="radio" name="gender" required>
											  Female
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="gender" required>
											Male
											</label>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" style="width:200px;margin-left:110px;">Save</button>
									</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>