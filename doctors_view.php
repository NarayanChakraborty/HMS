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
									
									/* ===================== Pagination Code Starts ================== */
                          $adjacents = 7;
								
								$statement = $db->prepare("SELECT * FROM doctor_details ");
								$statement->execute();
								$total_pages = $statement->rowCount();
															
								$targetpage = $_SERVER['PHP_SELF'];   //your file name  (the name of this file)
								$limit = 3;                                 //how many items to show per page
								$page = @$_GET['page'];
								if($page) 
									$start = ($page - 1) * $limit;          //first item to display on this page
								else
								$start = 0;
											
									
									
									
									
									
									
									
									
											$statement1 = $db->prepare("SELECT * FROM doctor_details LIMIT $start, $limit");
										    $statement1->execute();
										    $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											   
											   
											$statement2 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement2->execute(array($row1['employee_id']));
										     $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
											 
											 
											 
											 													 
																				 
									 if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
									$prev = $page - 1;                          //previous page is page - 1
									$next = $page + 1;                          //next page is page + 1
									$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
									$lpm1 = $lastpage - 1;   
									$pagination = "";
									if($lastpage > 1)
									{   
										$pagination .= "<div class=\"pagination\">";
										if ($page > 1) 
											$pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
										else
											$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
										if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
											{   
												for ($counter = 1; $counter <= $lastpage; $counter++)
												{
													if ($counter == $page)
														$pagination.= "<span class=\"current\">$counter</span>";
													else
														$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";               

									  
												}
											}
										elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
											{
														
														if($page < 1 + ($adjacents * 2))        
												 {
												for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
													{
													if ($counter == $page)
														$pagination.= "<span class=\"current\">$counter</span>";
													else
														$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";               

									  
													}
													$pagination.= "...";
													$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
													$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
												 }
														
														 elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
												{
													$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
													$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
													$pagination.= "...";
												for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
													{
														if ($counter == $page)
															$pagination.= "<span class=\"current\">$counter</span>";
														else
															$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";       

											  
													}
													$pagination.= "...";
													$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
													$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
												}

											else
												{
												$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
												$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
												$pagination.= "...";
												for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
												{
													if ($counter == $page)
													$pagination.= "<span class=\"current\">$counter</span>";
													else
													$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
												}
												}
											}

												if ($page < $counter - 1) 
													$pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
												else
													$pagination.= "<span class=\"disabled\">next &#187;</span>";
													$pagination.= "</div>\n";       
												}
												/* ===================== Pagination Code Ends ================== */	
											 
											 
											 
											 
											 
						                    foreach( $result2 as $row2)
						                   {
										?>
			
			<div class="team-info">
				<div class="col-md-4 about-team-grids">
					<img src="images/doctors_image/<?php echo $row2['e_image'];?>" alt=""/>
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
		
				<div class="pagination">			  
<?php echo $pagination;?>	
</div>
		
		</div>
     </div>
	
<?php include_once("footer.php");?>