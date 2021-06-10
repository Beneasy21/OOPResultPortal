<?php
    include_once('../../../private/initialize.php');

    $pageHeading = "Subject";
    include_once(SHARED_PATH .'/adminHeader.php');
?>
<div class="row">
    <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
    </div>
</div>
<nav class="nav navbar-inline">
	<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjects/new.php');?>"> Create New</a></li>
	<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>-->
    <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
</nav>

<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table">
            <tr>
                <th>Long Name</th>
                <th>Short Name</th>
                <th>View</a></th>
                <th>Edit</a></th>
                <th><i class="fas fa-trash"></i>Delete</a></th>
            </tr>
            <?php 
                $subjects = getSubjects();
                foreach($subjects as $subject){
            ?>
            <tr>
                <td><?php echo $subject['subjectLName'];?></td>
                <td><?php echo $subject['subjectSName'];?></td>
                <td><a href="<?php echo urlFor('/admin/subjects/show.php?id='.$subject['subId']);?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/subjects/edit.php?id='.$subject['subId']);?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/subjects/delete.php?id='.$subject['subId']);?>"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>
</div>
<?php include_once(SHARED_PATH . '/adminFooter.php');?>