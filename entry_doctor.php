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
<!-------------------------------------------->
         		
		<?php include_once("config.php");?>
         <?php

if(isset($_POST['submit'])){
  try {
    if(empty($_POST['d_name']))
    {
      throw new Exception("Doctor Name Cannot be empty!");   
    }
    if(empty($_POST['d_contact_no']))
    {
      throw new Exception("Doctor Contact No can't be empty!");   
    }
    if(empty($_POST['d_email']))
    {
      throw new Exception("Doctor email Cannot be empty!");   
    }   
	if(empty($_POST['d_qualifications']))
    {
      throw new Exception("Doctor Qualifications Cannot be empty!");   
    }    
	if(empty($_POST['d_type']))
    {
      throw new Exception("Doctor Type Cannot be empty!");   
    }   
	if(empty($_POST['d_department_name']))
    {
      throw new Exception("Doctors department name Cannot be empty!");   
    }
    if(empty($_POST['d_nid']))
    {
      throw new Exception("Doctor national ID  Cannot be empty!");   
    } 
	if(empty($_POST['d_sex']))
    {
      throw new Exception("Sex name Cannot be empty!!");   
    }
			
			
					/*---------------------------------Image Upload for doctor's Image ------------------------------*/
	
	if(getimagesize($_FILES['d_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image"); //access only image
		 }
		 if($_FILES['d_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'doctor_details' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['d_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f1=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['d_image']['tmp_name'],"images/doctors_image/".$f1);		
	
	
//=========================Image upload=============================//	
			
			
			
			
			
			/*---------------------------------Image Upload for doctor's nid ------------------------------*/
	
	if(getimagesize($_FILES['d_nid_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image"); //access only image
		 }
		 if($_FILES['d_nid_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'doctor_details' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['d_nid_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f2=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['d_nid_image']['tmp_name'],"images/doctors_nid/".$f2);		
	
	
//=========================Image upload=============================//

		
		
		$statement1=$db->prepare("insert into employee_details(e_name,e_contact_no,e_email_id,e_image,e_nid,e_nid_image,e_sex) values(?,?,?,?,?,?,?)");
		   $statement1->execute(array($_POST['d_name'],$_POST['d_contact_no'],$_POST['d_email'],$f1,$_POST['d_nid'],$f2,$_POST['d_sex']));
		   
           $last_id = $db->lastInsertId();
		   
		   $statement2=$db->prepare("insert into doctor_details(employee_id,doctor_qualification,doctor_type,department) values(?,?,?,?)");
		   $statement2->execute(array($last_id,$_POST['d_qualifications'],$_POST['d_type'],$_POST['d_department_name']));
		   
		   
		   
		   $success_message="doctor details is inserted succesfully";
		
  }catch (Exception $e) {
    $error_message = $e->getMessage();
  }
		
}
      		?>
		
		
<!--------------------------------------------->
	<!--banner-->
	<div class="row">
        
        <div class="col-xs-6 col-md-4"style="min-height:400px;">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;"data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Doctor Entry Form :</u></h4>
								
															
								<?php
                      if(isset($error_message)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove">x</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message)) {
                       ?>
                        <div class="alert alert-block alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove">x</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message;?>
                       </div>
                       <?php
                        }
                      ?>
								
								
								
								
							</div><br>
							<div class="form-body">
								<form action="entry_doctor.php" method="post"  enctype="multipart/form-data">
									<div class="form-group">
									    <label>Enter Doctor Name:</label>
										<input type="text" class="form-control" id="inputName" name="d_name" placeholder="Username" required>
									</div>
									
									<div class="form-group">
									<label>Contact No:</label>
									  <input type="text" data-toggle="validator" data-minlength="12" class="form-control"  placeholder="Contact Number"
                                     	name="d_contact_no" required>
									</div>
								
									<label>Enter Valid Email:</label>
										<input type="email" class="form-control" id="inputEmail" placeholder="Email" 
										name="d_email" data-error="Bruh, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>

									
									
									<form data-toggle="validator">
									<div class="form-group">
									    <label>Qualifications:</label>
										<input type="text" class="form-control" id="inputName" name="d_qualifications" placeholder="Degrees" required>
									</div>
						
								   <div class="form-group">
								   <label>Doctor Image</label>
								   <input type="file" id="exampleInputFile" name="d_image"> 
								   <p class="help-block">Input Doctor Image.</p>
								   </div> 
								   
								   <div class="form-group">
									<label >Depertment</label>
									<div >
										<select class="form-control m-bot15" name="d_department_name" required>
									  <option></option>
									  <?php
									  $statement = $db->prepare("SELECT * FROM departments");
									  $statement->execute();
									  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
									  foreach ($result as $row) {
										?>
									  <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?></option>
									  <?php
									  }
									  ?>
									</select>
									</div>
								   </div>
								   
								   	 <div class="form-group">
									<label >Type</label>
									<div >
										<select class="form-control m-bot15" name="d_type" required>
									  <option value="Permanent">Permanent</option>
									  <option value="Trainee">Trainee</option>
									  <option value="Visiting">Visiting</option>
									</select>
									</div>
								   </div>
									<div class="form-group">
									<label>Enter National ID:</label>
									  <input type="text" data-toggle="validator" data-minlength="12" class="form-control" name="d_nid" placeholder="NID Number" required>
									</div>
									
								   <div class="form-group">
								   <label>Attach NID Image</label>
								   <input type="file" id="exampleInputFile" name="d_nid_image"> 
								   <p class="help-block">Input National ID Image.</p>
								   </div> 

									<div class="form-group">
									<label>Sex:</label>
										<div class="radio" >
											<label>
											  <input type="radio" name="d_sex" value="female" required>
											  Female
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="d_sex" value="male" required>
											Male
											</label>
										</div>
									</div>
								<div class="form-group">
										<input type="submit"  name="submit" style="width:200px;margin-left:110px;" value="save">
									</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>