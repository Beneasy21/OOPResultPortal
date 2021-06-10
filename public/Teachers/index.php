<?php
    require_once('../../private/initialize.php');

   session_start();

    //require_login();

    //$studId = h(u($_SESSION['stud_id'])) ?? '1000000';
   $staffId = '2';
  //  $staffId = h(u($_SESSION['staffId'])) ?? '2';

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/myStyles.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/custom.css'); ?>" />

    <title>Document</title>
</head>
<body>
	<div class="container tea">
		<header class="text-center header rounded">
			<div class="p-2">
				<img src="<?php echo urlFor('images/Header.png');?>"  alt="header pix" >	
			</div>
		</header>
		<div class="row p-2">
			<div class="col-md-3 ash rounded">
				<div class="text-center p-3">
					<img class="img rounded-circle" src="<?php echo urlFor('images/Logo.png');?>" alt="Logo pix" style="height: 120px; width:120px;">		
				</div>
				<p>Welcome, <?= $staff['staffLName'] ?? '';?><a href="<?php echo urlFor('teachers/logout.php');?>">Logout</a></p>			
				<ul>
					<li><a href="">Profile</a></li>
					<li><a href="">Assignments</a></li>
					
				</ul>
			</div>
			<div class="col-md-9 blue rounded">
				<!-- This is the first row on the right-->
				<div class="row">
					<div class="col-9" class="text-right">
						<!-- Here could be left empty. just fill it in	 -->
					</div>
					<div class="col-3" class="text-right">
						<img class="img rounded p-2" src="<?php echo urlFor('images/Logo.png');?>" alt="Logo pix" style="height: 160px; width:160px;">			
					</div>
				</div>	
				<div class="row">
					<div class="col">
						Subjects Allocated </br>
						<?php 
							$subjects = getSubjectAllocatedByStaffId($staffId);

							foreach ($subjects as $subject) {
								$sub = getSubjectById($subject['subjectId']);
								$classs = getClasssById($subject['classsId']);
								$arm = getArmById($subject['armId']); 
                				$term = getTermById($subject['termId']);
                				$acadYr = getAcadYrById($subject['acadYrId']);
                				$subjectDetails = $sub['subjectLName'] . ' - '. $classs['classsSName']. ' - '.$arm['armSName']. ' - '.$term['termSName']. ' - '.$acadYr['shortName'];
							?>

						 	 <ul> 
						 	 	<li>
						 	 		<a href="<?php echo urlFor('teachers/index.php?subId='.$subject['subjectId']);?>"><?php echo $subjectDetails;?></a>
						 	 		
						 	 	</li>
						 	 </ul>
						 <?php }?>
						  
					</div>
					
				</div>
			</div>
		</div>
		<footer class="text-center header rounded">
			<div class="p-2">
				&copy; <?php echo date("Y"). " ";?>   All rights reserved
			</div>
		</footer>
	</div>
	
	    
</body>
</html>