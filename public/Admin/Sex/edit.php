<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/Sex/index.php'));
}
$id = h($_GET['id']);

if(is_post_request()){

    $Sex[] = array();
    $Sex['sexId'] = $id;
    $Sex['longName'] = h($_POST['longName']);
    $Sex['shortName'] = h($_POST['shortName']);

    $result = updateSex($Sex);
    if($result === true){
        redirect_to(urlfor('/admin/sex/show.php?id='.$id));
   }else{
       $errors = $result;
   }
}else{
    $sex = getSexById($id);
}
?>
<?php 


$pageHeading = "Add Sex";
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
        <form action="<?php echo urlFor('Admin/Sex/edit.php?id='.$id);?>" name="editSexForm" id="editSexForm" method="post">
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="longName" id="longName" value="<?php echo $sex['longName'];?>">
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="shortName" id="shortName" value="<?php echo $sex['shortName'];?>">
            </div>
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Update Sex">
            </div>
        

        </form>
        </div>
    </div>

</div>