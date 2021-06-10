<!-- 
 **** Staff/ index.php                                    *********
 **** Staff/ index.php                                    *********
 **** Staff/ index.php                                    *********
 **** Staff/ index.php                                    *********

	-->
	<?php
    include_once('../../../private/initialize.php');

    $pageHeading = "Staff";
    include_once(SHARED_PATH .'/adminHeader.php');
?>
<div class="row">
    <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
    </div>
</div>
<nav class="nav navbar-inline">
	<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/staff/new.php');?>"> Create New</a></li>
	<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>-->
    <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
</nav>

<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table ">
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Sex</a></th>
                <th>Image</a></th>
                <th><i class="fas fa-trash"></i>View</a></th>
                <th><i class="fas fa-trash"></i>Edit</a></th>
                <th><i class="fas fa-trash"></i>Delete</a></th>
            </tr>
            <?php 
                $staffs = getStaff();

                foreach($staffs as $staff){
            ?>
            <tr>
                <td><?php echo $staff['staffLName'];?></td>
                <td><?php echo $staff['staffFName'];?></td>
                <td><?php 
                $sex = getSexById($staff['sex']);
                echo $sex['longName'];
                ?></td>
                <td><img style="width:80px; height:80px;" src="<?php echo urlFor('/images/profilePix/'.$staff['staffImage']);?>"</td>
                <td><a href="<?php echo urlFor('/admin/staff/show.php?id='.$staff['staffId']);?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/staff/edit.php?id='.$staff['staffId']);?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/staff/delete.php?id='.$staff['staffId']);?>"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>
</div>