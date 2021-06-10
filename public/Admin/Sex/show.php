<?php
include_once('../../../private/initialize.php');

$id = h($_GET['id']);

$Sex = getSexById($id);

$pageHeading = $Sex['longName'];
include_once(SHARED_PATH .'/adminHeader.php');
?>
    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/sex/new.php');?>"> Create new Sex</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/sex/index.php');?>"> Back to List</a></li>
   </nav>
   
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <div>
            <p>Sex Name  = <?php echo $Sex['longName'];?></p>
            <p>Sex Abbreviation  = <?php echo $Sex['shortName'];?></p>
            </div>
        </div>
    </div>

</div>