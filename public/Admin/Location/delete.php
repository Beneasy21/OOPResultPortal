<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/Location/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $Location = deleteLocationById($id);
    redirect_to(urlFor('/Admin/Location/index.php'));
}else{
    $Location = getLocationById($id);
}


$pageHeading = $pageTitle =  "Delete Location";
include_once(SHARED_PATH .'/adminHeader.php');

?>
 <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/location/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/location/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to delete this Location?</p>
        <p><?php echo $Location['locLName'];?></p>
        <form action="<?php echo urlFor('Admin/location/delete.php?id='.$id);?>" name="deleteLocForm" id="deleteLocForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Location">
            </div>
        </form>
        </div>
    </div>

</div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>