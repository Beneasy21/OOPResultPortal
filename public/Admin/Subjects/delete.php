<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/Subjects/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $Subject = deleteSubjectById($id);
    redirect_to(urlFor('/Admin/Subject/index.php'));
}else{
    $Subject = getSubjectById($id);
}


$pageHeading = $pageTitle =  "Delete Subject";
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
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p class="text-danger"> Are you sure you want to delete this Subject?</p>
        <p><?php echo $Subject['subjectLName'];?></p>
        <form action="<?php echo urlFor('Admin/subjects/delete.php?id='.$id);?>" name="deleteSubjectForm" id="deleteSubjectForm" method="post">
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Subject">
            </div>
        </form>
        </div>
    </div>

</div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?> 