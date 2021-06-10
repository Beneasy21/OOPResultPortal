<?php
include_once('../../private/initialize.php');

$pageHeading = "Admin Dashboard";
include_once(SHARED_PATH .'/adminHeader.php');

?>
<main class="">
  <div class="row">
        <div class="col-xs-12 mx-auto">
            <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
            <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/new.php');?>"> Create new Admin</a></li>
            <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin List</a></li>
    </nav>


      <div class="row">
        <div class="col-xs-12 col-md-3 mb-4">
          <a  class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/Sex/') ;?>">Sex</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/acadYr/') ;?>">Acad Yr</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px " role="button" href="<?php echo urlfor('Admin/classs/') ;?>">Class</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/arm/') ;?>">Arm</a>
        </div>



        <div class="row border">
        <div class="col-xs-12 col-md-3 mb-4 border">
          <a  class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/Term/') ;?>">Term</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/staff/') ;?>">Staff</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px " role="button" href="<?php echo urlfor('Admin/subjects/') ;?>">Subject</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/subjectTaught/') ;?>">Subject Taught</a>
        </div>

        <!-- Third Row of the Items for CRUD-->
        <div class="row">
        <div class="col-xs-12 col-md-3 mb-4">
          <a  class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/Location/') ;?>">Location</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px" role="button" href="<?php echo urlfor('Admin/staff/') ;?>">Staff</a>
        </div>
        <div class="col-xs-12 col-md-3">
          <a class="btn btn-primary mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal; font-size: 40px " role="button" href="<?php echo urlfor('Admin/subjects/') ;?>">Subject</a>
        </div>
        <div class="col-xs-12 col-md-3 mb-3">
          <a class="btn btn-primary mr-2 btn-block option-button text-light" style=" font-size: 40px" role="button" href="<?php echo urlfor('Admin/students/') ;?>">Student</a>
        </div>

        <!-- Second Row of the Items for CRUD-->




        

            </div>
          </main>
<?php include_once(SHARED_PATH . '/adminFooter.php') ;?>