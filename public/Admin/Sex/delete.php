<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/Sex/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()){
    $Sex = deleteSexById($id);
    redirect_to(urlFor('/Admin/Sex/index.php'));
}else{
    $Sex = getSexById($id);
}


$pageHeading = $pageTitle =  "Delete Sex";
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
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <p> Are you sure you want to delete this Sex?</p>
        <p><?php echo $Sex['longName'];?></p>
        <form action="<?php echo urlFor('Admin/Sex/delete.php?id='.$id);?>" name="deleteSexForm" id="deleteSexForm" method="post">
            
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Delete Sex">
            </div>
        

        </form>
        </div>
    </div>

</div>
