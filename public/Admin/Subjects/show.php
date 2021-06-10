<?php
include_once('../../../private/initialize.php');

$id = h($_GET['id']);

$Subject = getSubjectById($id);

$pageHeading = $Subject['subjectLName'];
include_once(SHARED_PATH .'/adminHeader.php');

?>


    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Subjects/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Subjects/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <div>
            <p>Subject Name  = <?php echo $Subject['subjectLName'];?></p>
            <p>Subject Abbreviation  = <?php echo $Subject['subjectSName'];?></p>
            </div>
        </div>
    </div>
<?php include_once(SHARED_PATH . '/adminFooter.php');?>
</div>