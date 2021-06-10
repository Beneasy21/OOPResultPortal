<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/classs/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $Classs = deleteClasssById($id);
    redirect_to(urlFor('/Admin/classs/index.php'));
}else{
    $Classs = getClasssById($id);
}


$pageHeading = $pageTitle =  "Delete Class";
include_once(SHARED_PATH .'/adminHeader.php');

?>
 <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/classs/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to delete this Class?</p>
        <p><?php echo $Classs['classsLName'];?></p>
        <form action="<?php echo urlFor('Admin/classs/delete.php?id='.$id);?>" name="deleteclasssForm" id="deleteclasssForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Class">
            </div>
        </form>
        </div>
    </div>

</div>
