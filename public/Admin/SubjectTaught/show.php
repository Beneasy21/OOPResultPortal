<?php
  include_once('../../../private/initialize.php');

  $id = h($_GET['id']);
                  
  $subjectTaught = getSubjectTaughtByStaffId($id);
  $staff = getStaffById($subjectTaught['staffId']);
  $location = getLocationById($subjectTaught['locationId']);
  $subjects = getSubjectById($subjectTaught['subjectId']);
  $acadYr = getAcadYrById($subjectTaught['acadYrId']);
  $classs = getClasssById($subjectTaught['classsId']);
  $arm = getArmById($subjectTaught['armId']); 
  $term = getTermById($subjectTaught['termId']);
  $staff = getStaffById($id);

  $pageHeading = $pageTitle = $staff['staffLName'] . ' ' . $staff['staffFName'].'  ('.$location['locLName'] .')';
  include_once(SHARED_PATH .'/adminHeader.php');

?>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/SubjectTaught/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/SubjectTaught/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   <div class="row">
      <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col text-left">
            <h3>
              <p>Subject: <?php echo $subjects['subjectLName'];?></p>
              <p>Academic Year: <?php echo $acadYr['longName'];?></p>
              <p>Term:<?php echo $term['termLName'];?></p>
              <p>Class: <?php echo $classs['classsLName'];?></p>
              <p>Arm: <?php echo $arm['armLName'];?></p>
            </h3>
          </div>
          <div class="col text-center">
            <div class="upload-profile-image d-flex justify-content-center">
              <div class="text-center">
                <img id="output" class="img rounded" style="width:220px; height: 220px;" src="<?php echo urlFor('/images/profilePix/'.$staff['staffImage']) ;?>" style="width:120px; height:120px;" alt="profile">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>