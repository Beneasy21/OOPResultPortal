<?php
include_once('../../../private/initialize.php');

$pageHeading = "Defining a Sex";
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
                $url = "localhost/fame/public/api/read.php";
                $client = curl_init($url);
                curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                $response = curl_exec($client);
 
                $Sex = json_decode($response);



                //$Sex = getSex();
                foreach($Sex as $sex){
                    var_dump($sex);
            ?>
            <tr>
                <td><?php echo $sex->longName;?></td>
                <td><?php echo $sex->shortName;?></td>
                <td><a href="<?php echo urlFor('/admin/sex/show.php?id='.$sex['sexId']);?>">View</a></td>
                <td><a href="<?php echo urlFor('/admin/sex/edit.php?id='.$sex['sexId']);?>">Edit</a></td>
                <td><a href="<?php echo urlFor('/admin/sex/delete.php?id='.$sex['sexId']);?>"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            <?php     
               }?>
        </table>
    </div>
    </div>

</div>