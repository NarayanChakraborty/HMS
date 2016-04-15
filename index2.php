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
         
		

	<!--banner-->
	<div class="row"style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8"><h1 style="text-align:center;margin-left:-130px;margin-top:100px;padding-bottom:200px;">Welcome <br> To <br> Our Hospital Management System</h1></div>
     </div>
	
<?php include_once("footer.php");?>