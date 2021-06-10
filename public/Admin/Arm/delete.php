<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/arm/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $Arm = deleteArmById($id);
    redirect_to(urlFor('/Admin/Arm/index.php'));
}else{
    $Arm = getArmById($id);
}


$pageHeading = $pageTitle =  "Delete Arm";
include_once(SHARED_PATH .'/adminHeader.php');

?>
 <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/arm/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/arm/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to delete this Arm?</p>
        <p><?php echo $Arm['armLName'];?></p>
        <form action="<?php echo urlFor('Admin/arm/delete.php?id='.$id);?>" name="deleteArmForm" id="deleteArmForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Arm">
            </div>
        </form>
        </div>
    </div>

</div>
