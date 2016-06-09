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
        <div class="col-md-3"style="margin-top:3px;">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-md-9" style="margin-top:15px;">
		
		
		<h2 style="margin-bottom:10px;">Rooms Information</h2>
		<div class="panel panel-default">
		
		
		             <div><br>
					    <h4 style="margin-left:20px;">Room Facilities</h4>
						<p style="margin-left:20px;">Our facilities include:</p>
					   <ol>
					      <li>Private and shared accommodation</li>
<li>En-suite bathrooms</li>
<li>Nurse call handset at each bed</li>
<li>Personal televisions</li>
<li>Direct dial bedside phones</li>
<li>Free local calls</li>
<li>Hudsons Coffee</li>
</ol>
					 
					 
					 
					 
					 
					 </div>
		
		
		
		
                        <div class="panel-heading">
                             All Rooms
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room No</th>
                                            <th>Room Type</th>
                                            <th>Room Status</th>
                                            <th>Nurse Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
										<?php 
											$statement1 = $db->prepare("SELECT * FROM rooms");
										    $statement1->execute();
										    $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											 
											$statement2 = $db->prepare("SELECT employee_id FROM nurse_details where nurse_id=?");
										    $statement2->execute(array($row1['nurse_id']));
										     $result2=$statement2->fetch();
				 
											   	   
											$statement3 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement3->execute(array($result2['employee_id']));
										     $result3=$statement3->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result3 as $row3)
						                   {
										?>
										
									           
									
                                        <tr class="odd gradeX">

                                            <td class="center"> <?php echo $row1['room_id']; ?></td> 
                                            <td class="center"><?php echo $row1['room_type']; ?></td>
                                            <td class="center"><?php echo $row1['room_status']; ?></td>
                                            <td class="center"><?php echo $row3['e_name']; ?></td>
											
											
                                        </tr>
                                        
                                        <?php
										   }
										   }
										   ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
		
		
		
		
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>