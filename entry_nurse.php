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
   
			
					/*---------------------------------Image Upload for doctor's Image ------------------------------*/
	
	if(getimagesize($_FILES['n_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image"); //access only image
		 }
		 if($_FILES['n_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'nurse_details' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['n_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f1=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['n_image']['tmp_name'],"images/nurses_image/".$f1);		
	
	
//=========================Image upload=============================//	
			
			
			
			
			
			/*---------------------------------Image Upload for doctor's nid ------------------------------*/
	
	if(getimagesize($_FILES['n_nid_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image"); //access only image
		 }
		 if($_FILES['n_nid_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'nurse_details' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['n_nid_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f2=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['n_nid_image']['tmp_name'],"images/nurses_nid/".$f2);		
	
	
//=========================Image upload=============================//

		
		
		$statement1=$db->prepare("insert into employee_details(e_name,e_contact_no,e_email_id,e_image,e_nid,e_nid_image,e_sex) values(?,?,?,?,?,?,?)");
		   $statement1->execute(array($_POST['n_name'],$_POST['n_contact_no'],$_POST['n_email'],$f1,$_POST['n_nid'],$f2,$_POST['n_sex']));
		   
           $last_id = $db->lastInsertId();
		   
		   $statement2=$db->prepare("insert into nurse_details(employee_id,nurse_type) values(?,?)");
		   $statement2->execute(array($last_id,$_POST['n_type']));
		   
		   
		   
		   $success_message="Nurse details is inserted succesfully";
		
  }catch (Exception $e) {
    $error_message = $e->getMessage();
  }
		
}
      		?>
		
		
<!--------------------------------------------->

	

	<!--banner-->
	<div class="row"style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4 style="color:#337ab7;font-size:18px;padding:10px;"  class="btn active"><u>Nurse Entry Form </u></h4>
								
																
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
								<form action="entry_nurse.php" method="post" data-toggle="validator" enctype="multipart/form-data">
									<div class="form-group">
									    <label>Enter Nurse Name:</label>
										<input type="text" class="form-control"data-toggle="validator" id="inputName" name="n_name" placeholder="Username" required>
									</div>

									<div class="form-group">
									<label>Contact No:</label>
									  <input type="number" min="1" data-toggle="validator" data-minlength="11" class="form-control" name="n_contact_no" placeholder="Contact Number" required>
									<span class="help-block with-errors">Please Enter Your 11 Digit Mobile Number</span>
									</div>
									
										  <div class="form-group has-feedback">
									<label>Enter Valid Email:</label>
										<input type="email" class="form-control" id="inputEmail" placeholder="Email" 
										name="n_email"data-error="Opps, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										<span class="help-block with-errors">Please enter a valid email address</span>
									</div>
									 <div class="form-group">
								   <label >Nurse Image</label>
								   <input type="file" id="exampleInputFile" name="n_image"> 
								   <p class="help-block">Input Nurse Image.</p>
								   </div> 

                                  <div class="form-group">
									<label >Nurse Type</label>
									<div >
										<select class="form-control m-bot15" name="n_type" required>
									  <option value="Permanent">Permanent</option>
									  <option value="Trainee">Trainee</option>
									</select>
									</div>
								   
									 <div class="form-group">
									<label>Enter National ID:</label>
									  <input type="" min="0" data-toggle="validator" data-minlength="17" class="form-control " 
									  name="n_nid" id="inputPassword" placeholder="NID Number" required>
									  <span class="help-block with-errors">Please Enter Your 17 Digit NID Number</span>
									  </div>
									
								   <div class="form-group">
								   <label>Attach NID Image</label>
								   <input type="file" id="exampleInputFile" name="n_nid_image"> 
								   <p class="help-block">Input National ID Image.</p>
								   </div> 

									<div class="form-group">
									<label>Sex:</label>
										<div class="radio">
											<label>
											  <input type="radio" name="n_sex" value="female" required>
											  Female
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="n_sex" value="male" required>
											Male
											</label>
										</div>
									</div>
								<div class="bottom">
											<div class="form-group">
												<button type="submit" name="submit" style="width:200px;margin-left:110px;margin-top:50px;"class="btn btn-primary disabled">Save</button>
											</div>
								</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>