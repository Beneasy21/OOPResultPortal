<?php
include_once('../../../private/initialize.php');

$id = h($_GET['id']);

$AcadYr = getAcadYrById($id);

$pageHeading = $AcadYr['longName'];
include_once(SHARED_PATH .'/adminHeader.php');

?>


    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/acadyr/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/acadyr/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <div>
            <p>Acad Year Name  = <?php echo $AcadYr['longName'];?></p>
            <p>Acad Year Abbreviation  = <?php echo $AcadYr['shortName'];?></p>
            </div>
        </div>
    </div>

</div>