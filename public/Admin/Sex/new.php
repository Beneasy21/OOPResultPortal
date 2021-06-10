<?php
include_once('../../../private/initialize.php');


$pageHeading = "Add Sex";
include_once(SHARED_PATH .'/adminHeader.php');

?>
<?php 
if(is_post_request()){

    $Sex[] = array();
    $Sex['longName'] = h($_POST['longName']);
    $Sex['shortName'] = h($_POST['shortName']);

   $addSex = addSex($Sex);
   $latestId = $dbh->lastInsertId();
   redirect_to(urlfor('/admin/sex/show.php?id='.$latestId));
    
}
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
        <form action="<?php echo urlFor('Admin/Sex/new.php');?>" name="regSexForm" id="regSexForm" method="post">
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="longName" id="longName" placeholder="Long Name" required>
            </div>
            <div class="form-group ">
                <input class="form-control m-2" type="text" name="shortName" id="shortName" placeholder="Abbreviation" required="">
            </div>
            <div class="form-group p-2">
                <input class="btn btn-primary form-control" type="submit" value="Add Sex">
            </div>
        

        </form>
        </div>
    </div>

</div>