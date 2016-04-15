<?php 
include('config.php');
if(isset($_POST['login']))
{
    try{
	   if(empty($_POST['username']))
	   {
	    throw new Exception('Username can not be empty');
	   }
	   	   if(empty($_POST['password']))
	   {
	    throw new Exception('Password can not be empty');
	   }
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
	   throw new Exception('Invalid Username and/or password');
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
							<div class="banner-info">
								<?php
								if(isset($error_msg))
								{
								  echo $error_msg;
								}
								?>
									
					<div id="page-wrapper" >
					<div class="main-page login-page "style="margin-top:-80px;margin-bootom:30px;">
					<div class="widget-shadow">
					<div class="login-body">

						<form action="index.php" method="POST">
							<input type="text" class="user" name="username" placeholder="Enter your Name" required="">
							<input type="password" name="password" class="lock" placeholder="password">
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