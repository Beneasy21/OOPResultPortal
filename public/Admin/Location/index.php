<?php
    include_once('../../../private/initialize.php');

    $pageHeading = "Location";
    include_once(SHARED_PATH .'/adminHeader.php');
?>
<div class="row">
    <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
    </div>
</div>
<nav class="nav navbar-inline">
	<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/location/new.php');?>"> Create New</a></li>
	<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>-->
    <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
</nav>

<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table ">
            <tr>
                <th>Location Name</th>
                <th>Abbreviation</th>
                <th>Address</th>
                <th>View</a></th>
                <th>Edit</a></th>
                <th><i class="fas fa-trash"></i>Delete</a></th>
            </tr>
            <?php 
                $locations = getLocation();
                foreach($locations as $location){
            ?>
            <tr>
                <td><?php echo $location['locLName'];?></td>
                <td><?php echo $location['locSName'];?></td>
                <td><?php echo $location['locAddress'];?></td>
                <td><a href="<?php echo urlFor('/admin/location/show.php?id='.$location['locId']);?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/location/edit.php?id='.$location['locId']);?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/location/delete.php?id='.$location['locId']);?>"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>
<?php include_once(SHARED_PATH .'/adminFooter.php');?>
</div>