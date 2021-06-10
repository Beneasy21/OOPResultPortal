<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/staff/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $staff = deleteStaffById($id);
    redirect_to(urlFor('/Admin/staff/index.php'));
}else{
    $Staff = getStaffById($id);
}


$pageHeading = $pageTitle =  "Delete Staff";
include_once(SHARED_PATH .'/adminHeader.php');

?>
 <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/staff/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/staff/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to delete this Staff?</p>
        <p><?php echo $Staff['staffLName'].' '. $Staff['staffFName'];?></p>
        <p><img class="rounded" src="<?php echo urlFor('/images/profilePix/'.$Staff['staffImage']);?>" style="width: 120px; height: 120px"></p>
        <form action="<?php echo urlFor('Admin/staff/delete.php?id='.$id);?>" name="deleteStaffForm" id="deleteStaffForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Staff">
            </div>
        </form>
        </div>
    </div>

</div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>