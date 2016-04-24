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
			<div class="team-info">
				<div class="col-md-4 about-team-grids">
					<img src="images/d1.jpg" alt=""/>
					<div class="team-text">
						<h4><span>ANDERSON,</span> Surgeon</h4>
						<p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
					</div>
					<div class="caption">
						<ul>
							<li><a href="#"></a></li>
							<li><a href="#" class="f2"></a></li>
							<li><a href="#" class="f3"></a></li>
						</ul>
					</div>
				</div>
				<div class=" col-md-4 about-team-grids">
					<img src="images/d4.jpg" alt=""/>
					<div class="team-text">
						<h4><span>JESSICA,</span>Director</h4>
						<p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
					</div>
					<div class="caption">
						<ul>
							<li><a href="#"></a></li>
							<li><a href="#" class="f2"></a></li>
							<li><a href="#" class="f3"></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 about-team-grids">
					<img src="images/d3.jpg" alt=""/>
					<div class="team-text">
						<h4><span>ELIFS</span>Cardiologists</h4>				
						<p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
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
		</div>
	</div>
	<!--//about-team-->				
		
		</div>
     </div>
	
<?php include_once("footer.php");?>