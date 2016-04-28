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

	<!--banner-->
	<div class="row">
        
        <div class="col-xs-6 col-md-3">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
		<div class="col-xs-12 col-sm-8 col-md-9">
                    
                   	<!--about-team-->
	<div class="about-team"> 
		<div class="container">
			<h3 class="title1">Meet Our <span>Doctors</span></h3>
			
									<?php 
											$statement1 = $db->prepare("SELECT * FROM doctor_details");
										    $statement1->execute();
										     $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											   
											   
											$statement2 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement2->execute(array($row1['employee_id']));
										     $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result2 as $row2)
						                   {
										?>
			
			<div class="team-info">
				<div class="col-md-4 about-team-grids">
					<img src="images/d1.jpg" alt=""/>
					<div class="team-text">
						<h4> <?php echo $row2['e_name']; ?> </h4>
						<p>Department:<?php 
						
						            $statement3 = $db->prepare("SELECT dept_name FROM departments where dept_id=?");
										                $statement3->execute(array($row1['department']));
														$result3 = $statement3->fetch();
														  
														  echo $result3['dept_name'];
						
						?></p>
						<p>Qualification:<?php echo $row1['doctor_qualification'];?></p>
					</div>
					<div class="caption">
						<ul>
							<li><a href="#"></a></li>
							<li><a href="#" class="f2"></a></li>
							<li><a href="#" class="f3"></a></li>
						</ul>
					</div>
				</div>

				
				<div class="clearfix"> </div>
			</div>
			
										   <?php
										   }
										   }
										   ?>
		</div>
	</div>
	<!--//about-team-->				
		
		</div>
     </div>
	
<?php include_once("footer.php");?>