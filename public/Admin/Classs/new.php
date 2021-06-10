<?php
include_once('../../../private/initialize.php');


$pageHeading = "Add Class";
include_once(SHARED_PATH .'/adminHeader.php');

?>
<?php 
if(is_post_request()){

    $Classs[] = array();
    $Classs['longName'] = h($_POST['longName']);
    $Classs['shortName'] = h($_POST['shortName']);

   $addClasss = addClasss($Classs);
   $latestId = mysqli_insert_id($db);
   redirect_to(urlfor('/admin/classs/show.php?id='.$latestId));
    
}
?>

    <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <nav class="nav navbar-inline text-center">
		<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/AcadYr/new.php');?>"> Create new AcadYr</a></li>-->
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
    <div class="row text-center ">
       <div class="col-xs-12 col-sm-6 mx-auto shadow">
        <form action="<?php echo urlFor('Admin/classs/new.php');?>" name="regclasssForm" id="regAcadYrForm" method="post">
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="longName" id="longName" placeholder="Class">
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="shortName" id="shortName" placeholder="Abbreviation">
            </div>
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Add Class">
            </div>
        </form>
        </div>
    </div>

</div>