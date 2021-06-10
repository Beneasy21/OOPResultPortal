<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/Location/index.php'));
}
$id = h($_GET['id']);

if(is_post_request()){

    $Location[] = array();
    $Location['locationId'] = $id;
    $Location['longName'] = h($_POST['longName']);
    $Location['shortName'] = h($_POST['shortName']);
    $Location['locAddress'] = h($_POST['address']);


    $result = updateLocation($Location);
    if($result === true){
        redirect_to(urlfor('/admin/Location/show.php?id='.$id));
   }else{
       $errors = $result;
   }
}else{
    $location = getLocationById($id);
}
?>
<?php 


$pageHeading = "Add Location";
include_once(SHARED_PATH .'/adminHeader.php');
?>
    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Location/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Location/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">

        <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <form action="<?php echo urlFor('Admin/Location/edit.php?id='.$id);?>" name="editLocationForm" id="editLocationForm" method="post">
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="longName" id="longName" value="<?php echo $location['locLName'];?>">
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="shortName" id="shortName" value="<?php echo $location['locSName'];?>">
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="address" id="address" value="<?php echo $location['locAddress'];?>">
            </div>
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Update Location">
            </div>

        </form>
        </div>
    </div>

</div>