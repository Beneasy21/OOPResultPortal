<?php
include_once('../../../private/initialize.php');

$id = h($_GET['id']);

$Location = getLocationById($id);

$pageHeading = $Location['locLName'];
include_once(SHARED_PATH .'/adminHeader.php');

?>
    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Location/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Location/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <div>
            <p>Location Name  = <?php echo $Location['locLName'];?></p>
            <p>Location Abbreviation  = <?php echo $Location['locSName'];?></p>
            <p>Address  = <?php echo $Location['locAddress'];?></p>
            </div>
        </div>
    </div>

</div>