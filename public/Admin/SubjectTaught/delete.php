<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/subjectTaught/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $subjectTaught = deletesubjectTaughtById($id);
    redirect_to(urlFor('/Admin/subjectTaught/index.php'));
}else{
    $subjectTaught = getsubjectTaughtByStaffId($id);
    $staff = getStaffById($subjectTaught['staffId']);
    $subject = getSubjectById($subjectTaught['subjectId']);
}


$pageHeading = $pageTitle =  "Delete SubjectTaught";
include_once(SHARED_PATH .'/adminHeader.php');

?>
 <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjectTaught/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjectTaught/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to deallocate this Subject?</p>
        <p><?php echo $staff['staffLName'] . ' '. $staff['staffFName']. ' - '. $subject['subjectLName'] ;?></p>
        <form action="<?php echo urlFor('Admin/term/delete.php?id='.$id);?>" name="deleteTermForm" id="deleteTermForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Term">
            </div>
        </form>
        </div>
    </div>

</div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>