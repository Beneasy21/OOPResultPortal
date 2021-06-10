<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/arm/index.php'));
}
$id = h($_GET['id']);

if(is_post_request()){

    $Arm[] = array();
    $Arm['armId'] = $id;
    $Arm['longName'] = h($_POST['longName']);
    $Arm['shortName'] = h($_POST['shortName']);

    $result = updateArm($Arm);
    if($result === true){
        redirect_to(urlfor('/admin/Arm/show.php?id='.$id));
   }else{
       $errors = $result;
   }
}else{
    $Arm = getArmById($id);
}
?>
<?php 


$pageHeading = "Add Arm";
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
        <form action="<?php echo urlFor('Admin/arm/edit.php?id='.$id);?>" name="editArmForm" id="editArmForm" method="post">
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="longName" id="longName" value="<?php echo $Arm['armLName'];?>">
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="shortName" id="shortName" value="<?php echo $Arm['armSName'];?>">
            </div>
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Update Arm">
            </div>

        </form>
        </div>
    </div>

</div>