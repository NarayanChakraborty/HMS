<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>		
<?php
if(!isset($_REQUEST['id']))
{
	header("location:patient_details.php");
}
else
{
	
		$id=$_REQUEST['id'];
}

?>
	
	<!--banner-->
<?php include("header.php");?>
         
	<?php include_once("config.php");?>

<?php
if(isset($_POST['submit'])){
  try {
    if(empty($_POST['t_charge']))
    {
      throw new Exception("Treatment Charge Cannot be empty!");   
    }
    $total_charge=$_POST['t_charge']+$_POST['m_charge']+$_POST['r_charge'];
	$statement1=$db->prepare("insert into bill(patient_id,treatment_charge,medicine_charge,room_charge,total_charge) values(?,?,?,?,?)");
	$statement1->execute(array($id,$_POST['t_charge'],$_POST['m_charge'],$_POST['r_charge'],$total_charge));
	 $success_message="Bill details are inserted succesfully";
	
  }
catch (Exception $e) {
    $error_message = $e->getMessage();
  }
}
?>	

	<!--banner-->
	<div class="row"style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
			<div class="col-xs-12 col-sm-6 col-md-8">
		
			<div class="col-md-6 validation-grids widget-shadow" style="padding-top:20px;"data-example-id="basic-forms"> 
							<div class="form-title">
								<h4><u>Bill Entry Form :</u></h4>
								
									
																
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
								<form data-toggle="validator" method="post">
									<div class="form-group">
									    </label>Treatment Charge:</label>
										<input type="double" class="form-control"  name="t_charge" placeholder="Treatment Charge" required>
									</div>
									<form data-toggle="validator">
									<div class="form-group">
									    </label>Medicine Charge:</label>
										<input type="double" class="form-control" name="m_charge" placeholder="Medicine Charge" required>
									</div>
									<div class="form-group has-feedback">
									</label>Room Charge:</label>
										<input type="double" class="form-control"  placeholder="Room Charge" name="r_charge"  required>

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
     </div>
	
<?php include_once("footer.php");?>