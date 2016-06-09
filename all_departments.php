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
         
<?php include_once("config.php");?>

<?php
    
	if(isset($_POST['form_edit_dept']))
	{
		try{
			if(empty($_POST['edit_dept_name']))
			{
				throw new Exception('Dept Name Can not be Empty');
			}
			
			$dept_name=mysql_real_escape_string($_POST['edit_dept_name']);
			$statement1=$db->prepare('update departments set dept_name=? where dept_id=?');
			$statement1->execute(array($dept_name,$_POST['hidden_id_for_edit_dept']));
						
			
			$success_message1='Department Name Successfully Updated';
		}
		catch(Exception $e)
		{
		    $error_message1=$e->getMessage();	
		}
	}



?>

<?php

     if(isset($_POST['form_add_dept']))
	 {
		 try{
			 
			
			  $dept_name=mysql_real_escape_string($_POST['dept_name']);
			  $statement2=$db->prepare('insert into departments (dept_name) values(?)');
			  $statement2->execute(array($dept_name));
			  $success_message2="New Department Success Fully Created";
		 }
		 catch(Exception $e)
		 {
			 $error_message2=$e->getMessage();
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
		
		
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa fa-bars"></i>All Departments</h3>
                </div>
              </div>
              <!-- page start-->
  
              <div class='row'>
			     
			    <div class='col-lg-1'>
				</div>
					<div class='col-lg-6'>
					<br>
				      <ol>  
						<?php 
				          
						  $statement=$db->prepare('Select * from departments ');
						  $statement->execute();
						  $result=$statement->fetchAll(PDO::FETCH_ASSOC);
						  foreach( $result as $row)
						  {
							  ?>
							  
							<li>  
							  <label style="width:50%;"><strong><?php echo $row['dept_name']; ?></strong></label>
							<a class="btn btn-info " data-toggle="modal" href="#myModal<?php echo $row['dept_id'];?>">
                                Edit
                              </a>
							 <!--
                              <a class="btn btn-danger " data-toggle="modal"
							  data-target="#MyModal<?php //echo $row['dept_id'];?>"  >
                                  Delete!
                              </a>
							  -->
							  
							<!-- Modal -->
							  <div class="modal fade" id="myModal<?php echo $row['dept_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									  <h4 class="modal-title">Edit This Department Name</h4>
									</div>
									<div class="modal-body">
									  <h4>Department Name :</h4>
									  <form method="post" data-toggle="validator" action="" enctype="multipart/form-data">
										<input type="text"value="<?php echo $row['dept_name'];?>"class="form-control" name="edit_dept_name" required><br>
										<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
										<input type="hidden" name="hidden_id_for_edit_dept" value="<?php echo $row['dept_id'];?>">
										<input type="submit" value="Update" class="btn btn-success" name="form_edit_dept">
									  </form>
									</div>         
								  </div>
								</div>
							  </div>
							  <!-- modal -->
							  
							  
							  <!-------------FOR Delete-------------->
							  
							  <!-- Modal -->
							  <!--
								<div id="MyModal<?php //echo $row['dept_id'];?>" class="modal fade " role="dialog">
								  <div class="modal-dialog">
									
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">DELETE Confirmation</h4>
									  </div>
									  <div class="modal-body">
										<h4>Are You Confirm To Delete This Element?</h4>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<a class="btn btn-danger btn-ok" href="delete_department.php?ID=<?php //echo $row['dept_id'];?>" >Confirm</a>
									  </div>
									</div>

								  </div>
								</div>
														  
													  
							  <!-------------FOR Delete-------------->
						   	</li><br>						  
						   <?php
						  }
						  ?>
						   
						</ol> 
						
					<?php	
					 if(isset($error_message1)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"> X</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message1;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message1)) {
                       ?>
                       <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"> X</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message1;?>
                       </div>
                       <?php
                        }
                      ?>
					 
					 <?php
                      if(isset($error_message2)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"> X</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message2;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message2)) {
                       ?>
                       <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove">X</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message2;?>
                       </div>
                       <?php
                        }
                      ?>					 
						
						
						
					<br><br><h3>New Department Name</h3>
                    <form enctype="multipart/form-data" data-toggle="validator" method="post">
                      <input type="text"name="dept_name"class="form-control" placeholder="Type Here.." required><br>
                      <input type="submit" value="Save" name="form_add_dept"class="btn btn-primary">
                  </form>
					</div>
					<div class="col-lg-5">
					</div>
			  </div>
			  
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
		
		</div>
     </div>
	
<?php include_once("footer.php");?>



