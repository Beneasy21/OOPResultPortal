<!-- 
 **** SubjectTaught/ index.php                            *********
 **** Staff/ index.php                                    *********
 **** Staff/ index.php                                    *********
 **** Staff/ index.php                                    *********

	-->
	<?php
    include_once('../../../private/initialize.php');

    $pageHeading = "Subject Taught";
    include_once(SHARED_PATH .'/adminHeader.php');
?>
<div class="row">
    <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
    </div>
</div>
<nav class="nav navbar-inline">
	<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjectTaught/new.php');?>"> Create New</a></li>
	<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>-->
    <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
</nav>

<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table ">
            <tr>
                <th>Staff</th>
                <th>Location</th>
                <th>Subject</th>
                <th>Acad Year</th>
                <th>Class</th>
                <th>Arm </th>
                <th>Term </th>
                <th><i class="fas fa-trash"></i>View</a></th>
                <th><i class="fas fa-trash"></i>Edit</a></th>
                <th><i class="fas fa-trash"></i>Delete</a></th>
            </tr>
            <?php 
                $subjectsTaught = getSubjectTaught();

                

                foreach($subjectsTaught as $subjectTaught){

                $staff = getStaffById($subjectTaught['staffId']);
                $location = getLocationById($subjectTaught['locationId']);
                $subjects = getSubjectById($subjectTaught['subjectId']);
                $acadYr = getAcadYrById($subjectTaught['acadYrId']);
                $classs = getClasssById($subjectTaught['classsId']);
                $arm = getArmById($subjectTaught['armId']); 
                $term = getTermById($subjectTaught['termId']);

            ?>
            <tr>
                <td><?php echo $staff['staffLName'] . '  '.$staff['staffFName'] ;?></td>
                <td><?php echo $location['locLName'];?></td>
                <td><?php echo $subjects['subjectLName'];?></td>
                <td><?php echo $acadYr['longName'];?></td>
                <td><?php echo $classs['classsLName'];?></td>
                <td><?php echo $arm['armLName'];?></td>
                <td><?php echo $term['termLName'];?></td>

                
                <td><a href="<?php echo urlFor('/admin/subjectTaught/show.php?id='.h($subjectTaught['staffId']));?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/subjectTaught/edit.php?id='.h($subjectTaught['staffId']));?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/subjectTaught/delete.php?id='.h($subjectTaught['staffId']));?>">Delete</a></td>
                
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>

<?php include(SHARED_PATH . '/adminFooter.php'); ?>
</div>