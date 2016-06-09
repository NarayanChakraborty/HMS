<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	
<?php
if(!isset($_REQUEST['eid']) ||(!isset($_REQUEST['did'])))
{
	header('location:doctor_details.php');
}
else
{
	$e_id=$_REQUEST['eid'];
	$d_id=$_REQUEST['did'];
}
?>

	<!--banner-->
<?php include("header.php");?>
<!-------------------------------------------->
         		
		<?php include_once("config.php");?>
         <?php

if(isset($_POST['submit'])){
  try {
    

			if(($_POST['d_image'])||$_POST['d_nid_image'])
			{
				throw new Exception("You Must Input the image Fields");
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
		$statement=$db->prepare("show table status like 'employee_details' ");
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
		
		
				 //To unlink previous image
				
				
                        $statement2=$db->prepare("select * from employee_details where e_id=?");
						$statement2->execute(array($e_id));
						$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach($result2 as $row2)
						{
							$real_path= "images/doctors_image/".$row2['e_image'];
						    unlink($real_path);
						}
		 
		 
	     
        //upload image to a folder
        move_uploaded_file($_FILES['d_image']['tmp_name'],"images/doctors_image/".$f1);		
	
	
//=========================Image upload=============================//	
			
			
			
			
			
			/*---------------------------------Image Upload for doctor's nid ------------------------------*/
	
	if(getimagesize($_FILES['d_nid_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image(nid)"); //access only image
		 }
		 if($_FILES['d_nid_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'employee_details' ");
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
	     
		 
		  //To unlink previous image
				
				
                        $statement2=$db->prepare("select * from employee_details where e_id=?");
						$statement2->execute(array($e_id));
						$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach($result2 as $row2)
						{
							$real_path= "images/doctors_nid/".$row2['e_nid_image'];
						    unlink($real_path);
						}
		 
		 
		 
        //upload image to a folder
        move_uploaded_file($_FILES['d_nid_image']['tmp_name'],"images/doctors_nid/".$f2);		
	
	
//=========================Image upload=============================//

		
		
		$statement1=$db->prepare("update  employee_details set e_name=?,e_contact_no=?,e_email_id=?,e_image=?,e_nid=?,e_nid_image=?,e_sex=? where e_id=?");
		   $statement1->execute(array($_POST['d_name'],$_POST['d_contact_no'],$_POST['d_email'],$f1,$_POST['d_nid'],$f2,$_POST['d_sex'],$e_id));
		   
		   
		   $statement2=$db->prepare("update  doctor_details set employee_id=?,doctor_qualification=?,doctor_type=?,department=? where doctor_id=?");
		   $statement2->execute(array($e_id,$_POST['d_qualifications'],$_POST['d_type'],$_POST['d_department_name']),$d_id);
		   
		   
		   
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
								
								
								
								<?php 
											$statement1 = $db->prepare("SELECT * FROM doctor_details");
										    $statement1->execute();
										     $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											   
											   
											$statement2 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement2->execute(array($e_id));
										     $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result2 as $row2)
						                   {
										    $d_name=$row2['e_name'];
											$d_contact_no=$row2['e_contact_no'];
											
											$d_email_id=$row2['e_email_id'];
											$d_nid=$row2['e_nid'];
											$d_nid_image=$row2['e_nid_image'];
											
											$d_sex=$row2['e_sex'];
											$doctor_id=$row1['doctor_id'];
											$d_qualifications=$row1['doctor_qualification'];
											$d_type=$row1['doctor_type'];
											
											 $department=$row1['department'];  
										   }
										   }
										?>
								
								
								
								
								
								
							</div><br>
							<div class="form-body">
								<form action="" method="post" data-toggle="validator" enctype="multipart/form-data">
									<div class="form-group">
									    <label>Enter Doctor Name:</label>
										<input type="text" class="form-control" value="<?php echo $d_name; ?>" id="inputName" name="d_name" placeholder="Username" required>
									</div>
									
									<div class="form-group">
									<label>Contact No:</label>
									  <input type="text" data-toggle="validator" data-minlength="11" value="<?php echo $d_contact_no; ?>" class="form-control"  placeholder="Contact Number"
                                     	name="d_contact_no" required>
										<span class="help-block with-errors">Please Enter Your 11 Digit Mobile Number</span>
									</div>
								
											  <div class="form-group has-feedback">
									<label>Enter Valid Email:</label>
										<input type="email" class="form-control" id="inputEmail" value="<?php echo $d_email_id; ?>" placeholder="Email" 
										name="d_email"data-error="Opps, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										<span class="help-block with-errors">Please enter a valid email address</span>
									</div>
									<div class="form-group">
									    <label>Qualifications:</label>
										<input type="text" class="form-control" id="inputName" value="<?php echo $d_qualifications; ?>" name="d_qualifications" placeholder="Degrees" required>
									</div>
						
						
									<label>Doctor's Previous Image</label>
						            <img src="images/doctors_image/<?php echo $row2['e_image'];?>" width="450" height="400"><br>
									
								   <div class="form-group">
								   <label>Update Doctor's  Image</label>
								   <input type="file"  id="exampleInputFile" name="d_image"> 
								   <p class="help-block">You Must Input Doctors Image.</p>
								   </div> 
								   
								   <div class="form-group">
									<label >Depertment</label>
									<div >
										<select class="form-control m-bot15" name="d_department_name" required>
									  <option>Select Depertment</option>
									  <?php
									  $statement3 = $db->prepare("SELECT * FROM departments");
									  $statement3->execute();
									  $result3 = $statement3->fetchAll(PDO::FETCH_ASSOC);
									  foreach ($result3 as $row3) {
										  if($row3['dept_id']==$department) {
										?><option value="<?php echo $row3['dept_id'];?>" selected><?php echo $row3['dept_name'];?></option><?php
									  }
									  else
									  {
										  ?><option value="<?php echo $row3['dept_id'];?>"><?php echo $row3['dept_name'];?></option><?php
									  }
									  
									  }
									  ?>
									</select>
									</div>
								   </div>
								   
								   	 <div class="form-group">
									<label >Doctor Type</label>
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
									  <input type="" min="0" data-toggle="validator" value="<?php echo $d_nid; ?>" data-minlength="17" class="form-control " 
									  name="d_nid" id="inputPassword" placeholder="NID Number" required>
									  <span class="help-block with-errors">Please Enter Your 17 Digit NID Number</span>
									  </div>
									  
									  
									<label>Previous NID Image</label>
									<img src="images/doctors_nid/<?php echo $row2['e_nid_image'];?>" width="450" height="400"><br>
									
									
								   <div class="form-group">
								   <label>Update NID Image</label>
								   <input type="file" id="exampleInputFile" name="d_nid_image"> 
								   <p class="help-block">You Must input National ID Image.</p>
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
											<div class="bottom">
											<div class="form-group">
												<button type="submit" name="submit" style="width:200px;margin-left:110px;margin-top:50px;"class="btn btn-primary disabled">Save</button>
											</div>
								</div>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>