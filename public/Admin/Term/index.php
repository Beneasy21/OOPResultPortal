<?php
    include_once('../../../private/initialize.php');

    $pageHeading = "Term";
    include_once(SHARED_PATH .'/adminHeader.php');
?>
<div class="row">
    <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
    </div>
</div>
<nav class="nav navbar-inline">
	<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/term/new.php');?>"> Create New</a></li>
	<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/classs/index.php');?>"> Back to List</a></li>-->
    <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
</nav>

<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table ">
            <tr>
                <th>Long Name</th>
                <th>Short Name</th>
                <th>View</a></th>
                <th>Edit</a></th>
                <th><i class="fas fa-trash"></i>Delete</a></th>
            </tr>
            <?php 
                $terms = getTerm();
                foreach($terms as $term){
            ?>
            <tr>
                <td><?php echo $term['termLName'];?></td>
                <td><?php echo $term['termSName'];?></td>
                <td><a href="<?php echo urlFor('/admin/term/show.php?id='.$term['termId']);?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/term/edit.php?id='.$term['termId']);?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/term/delete.php?id='.$term['termId']);?>"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>

</div>