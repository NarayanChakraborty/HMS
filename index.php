<?php 
include('config.php');
if(isset($_POST['login']))
{
    try{

	   $num=0;
	   $password=$_POST['password'];
	   $password=md5($password);
	  
	  $statement=$db->prepare("select * from admin where receptionist_name=? and receptionist_password=?");
	  $statement->execute(array($_POST['username'],$password));
	  $num=$statement->rowCount();

	  if($num>0)
	  {
	     session_start();
		 
		 $_SESSION['name']="snchousebd";
		 header('location: index2.php');
	  }
	  else
	  {
	   throw new Exception('Invalid Information');
	   }
	}
	catch(Exception $e)
	{
	$error_msg=$e->getMessage();
	}
}
?>


<?php include("header.php");?>
	<!--banner-->
	<div class="banner">
		<div class="container" >
		

		
		
			<section class="slider">
				
					<ul >
					
					
					
						<li >
						
						
																		<?php
								if(isset($error_msg))
								{
									?>
								      <div style="width:400px;text-align:center;margin:0 auto;" class="alert alert-block alert-danger fade in" >
                          <button  data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove">x</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_msg?>
                       </div>
					   <?php
								}
								?>
						
							<div class="banner-info">

					<div id="page-wrapper" >
					
					
					
					
					<div class="main-page login-page "style="margin-top:-80px;margin-bootom:30px;">
					<div class="widget-shadow">
					<div class="login-body">

						<form action="index.php" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="username" id="inputName" placeholder="Enter Your name" required>
							</div>
							<div class="form-group">
							<input type="password" data-toggle="validator" data-minlength="6" class="form-control"  name="password"placeholder="Enter Your Password" required>
							</div>
							<input type="submit" name="login" value="Sign In">
						</form>
					</div>
				</div>
				
			</div>
		</div>												
							</div>
						</li>
					</ul>
				</div>
			</section>
		</div>
			<!--banner-->
	
<?php include_once("footer.php");?>