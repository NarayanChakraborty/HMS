	
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
         
		<!---------------------------------------------------->
		<?php include_once("config.php");?>
         <?php
if(isset($_POST['submit'])){
  try {
    if(empty($_POST['p_name']))
    {
      throw new Exception("Patient Name Cannot be empty!");   
    }
    if(empty($_POST['p_contact_no']))
    {
      throw new Exception("Patient Contact No can't be empty!");   
    }
    if(empty($_POST['p_email']))
    {
      throw new Exception("Patient email Cannot be empty!");   
    }
    if(empty($_POST['p_nid']))
    {
      throw new Exception("Patient national ID  Cannot be empty!");   
    }


    if(empty($_POST['p_room_id']))
    {
        throw new Exception("Put 0 for No Room");
    }    
	if(empty($_POST['p_doctor_id']))
    {
      throw new Exception("Doctor ID Cannot be empty!!");   
    }  
	if(empty($_POST['p_sex']))
    {
      throw new Exception("Sex name Cannot be empty!!");   
    }
			
			/*---------------------------------Image Upload------------------------------*/
	
	if(getimagesize($_FILES['p_nid_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("Please select an image"); //access only image
		 }
		 if($_FILES['p_nid_image']['size']>2000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<2MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'patient_details' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['p_nid_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f1=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!=['.gif']))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['p_nid_image']['tmp_name'],"images/patients_nid/".$f1);		
	
	
//=========================Image upload=============================//
//==========================entry Date=============================//
        $entry_date= date('Y-m-d');
		
		$num=0;
		if(isset($_POST['p_room_id']))
		{
		   $statement = $db->prepare("SELECT * FROM room where room_id=?");
           $statement->execute(array($_POST['p_room_id']));
           $num = $statement->rowCount();
		  if($num>0)
		  {
                $p_room_id=$_POST['p_room_id'];
		  }
		  else
		  {
		   throw new Exception('Invalid Room No');
		   }
		   
		}
		
		$num1=0;
		if(isset($_POST['p_doctor_id']))
		{
		   $statement = $db->prepare("SELECT * FROM doctor_details where doctor_id=?");
           $statement->execute(array($_POST['p_doctor_id']));
           $num = $statement->rowCount();
		  if($num>0)
		  {
                $p_doctor_id=$_POST['p_doctor_id'];
		  }
		  else
		  {
		   throw new Exception('Invalid Doctor ID');
		   }
		   
		}
		
		
		$statement1=$db->prepare("insert into patient_details(p_name,p_contact_no,p_email_id,p_nid,p_nid_image,p_room_id,p_doctor_id,p_sex,p_entry_date,p_release_date) values(?,?,?,?,?,?,?,?,?)");
		   $statement1->execute(array($_POST['p_name'],$_post['p_contact_no'],$_POST['p_email'],$_POST['p_nid'],$row['p_nid_image'],$p_room_id,$p_doctor_id,$_POST['p_sex'],$entry_date,0));
		   
		   $success_message="Patient details is inserted succesfully";
		
  }catch (Exception $e) {
    $error_message = $e->getMessage();
  }
		
}
      		?>
		
		

	<!--banner-->
	<div class="row" style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;"data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Patient Entry Form :</u></h4>
								
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
								<form data-toggle="validator" meethod="POST" >
									<div class="form-group">
									    </label>Enter Patient Name:</label>
										<input type="text" class="form-control" id="inputName" placeholder="Username" name="p_name" required>
									</div>
									<div class="form-group">
									</label>Contact No:</label>
									  <input type="text" data-toggle="validator" data-minlength="12" class="form-control"  placeholder="Contact Number"
                                     	name="p_contact_no" required>
									</div>
									<div class="form-group has-feedback">
									</label>Enter Valid Email:</label>
										<input type="email" class="form-control" id="inputEmail" placeholder="Email" 
										name="p_email" data-error="Bruh, that email address is invalid" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>

								   
									<div class="form-group">
									</label>Enter National ID:</label>
									  <input type="text" data-toggle="validator" data-minlength="12" class="form-control" 
									  name="p_nid" id="inputPassword" placeholder="NID Number" required>
									</div>
									
									<div class="form-group">
								   </label>Attach NID Image</label>
								   <input type="file" id="exampleInputFile" name="p_nid_image"> 
								   <p class="help-block">Input National ID Image.</p>
								   </div> 
								   
									<div class="form-group">
									</label>Room ID:</label>
									
									 <?php
                                      $statement1 = $db->prepare("SELECT * FROM room WHERE room_status=0");
                                      $statement1->execute(array());
                                      $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($result1 as $row1) {
                                         # code...?>
                                         
                                      <li>
                                        <input type="number" data-toggle="validator" value="<?php echo $row1['room_id'] ; ?>" data-minlength="3" class="form-control" name="p_room_id" placeholder="Room Number" required>
                                      </li>
                                     <?php
                                       } 
                                      ?>
									
									
									
									
									  
									</div>
									
									<div class="form-group">
									</label>Doctor ID:</label>
									  <input type="number" data-toggle="validator" data-minlength="3" class="form-control" name="p_doctor_id" placeholder="Room Number" required>
									</div>
									<div class="form-group">
									</label>Sex:</label>
										<div class="radio">
											<label>
											  <input type="radio" name="p_sex"value="female" required>
											  Female
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="p_sex" value="male" required>
											Male
											</label>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="submit" style="width:200px;margin-left:110px;">Save</button>
									</div>
								</form>
							</div>
						</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>