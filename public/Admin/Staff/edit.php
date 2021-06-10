<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/staff/index.php'));
}
$id = h($_GET['id']);

if(is_post_request()){

    $Staff[] = array();
    $Staff['id'] = $id;
    $Staff['lastName'] = h($_POST['lastName']);
    $Staff['firstName'] = h($_POST['firstName']);
    $Staff['hireDate'] = h($_POST['hireDate']);
    $Staff['sex'] = h($_POST['sex']);
    $Staff['staffCat'] = h($_POST['staffCategory']);
    $Staff['contactAdd'] = h($_POST['staffContactAdd']);
    $Staff['permAdd'] = h($_POST['staffPermAdd']);
    $Staff['email'] = $Staff['phone'] = $Staff['passWord'] = '12';
    $Staff['photo'] = $Staff['confirmPassWord'] = $Staff['userName'] = '12';
    
    


    $result = updateStaff($Staff);
    if($result === true){
        redirect_to(urlfor('/admin/Staff/show.php?id='.$id));
   }else{
       $errors = $result;
   }
}else{
    $staff = getStaffById($id);
}
?>
<?php 


$pageHeading = $pageTitle = "Edit : " .$staff['staffLName'] .'  '.$staff['staffFName'];
include_once(SHARED_PATH .'/adminHeader.php');
?>
    <main>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/staff/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/staff/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <div class="row text-center ">
        <section id="register">
        <div class="row text-center ">
           <form enctype="multipart/form-data" action="<?php echo urlFor('Admin/staff/edit.php?id='.$id);?>" name="regStaffForm" id="regStaffForm" method="post">
           
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="lastName" value="<?php echo $staff['staffLName'];?>" id="lastName" placeholder="Last Name">
                    <input class="" type="text" name="firstName" value="<?php echo $staff['staffFName'];?>" id="firstName" placeholder="First Name">
                </div>
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="hireDate" value="<?php echo $staff['hireDate'];?>" id="hireDate" placeholder="Date of Employment">
                    <select class="mr-2 mb-2 px-4 py-1" type="text" name="sex" id="sex" placeholder="Sex">
                        <option value="">Choose Sex</option>
                        <?php 
                            $result = getSex();
                            while($sex = mysqli_fetch_assoc($result)){
                                echo "<option value=\"".$sex['sexId']."\"";
                                if($sex['sexId'] == $staff['sex']){
                                    echo " selected";
                                }
                                echo ">". $sex['longName'];
                            }
                        mysqli_free_result($result);
                        ?>
                        
                    </select> 
                </div>
                <div class="col">
                    <select class="mr-2 mb-2 px-4 py-1" type="text" name="staffCategory" id="staffCategory" placeholder="Staff Category">
                        <option value="">Staff Category</option>
                        <?php 
                            $results = getStaffCat();
                            while($category = mysqli_fetch_assoc($results)){
                                echo "<option value=\"".$category['staffCatId']."\"";
                                if($category['staffCatId'] == $staff['staffCatId']){
                                    echo " selected";
                                }
                                echo ">". $category['longName'];
                            }
                        mysqli_free_result($results);
                        ?>
                    </select> 
                    <input class="mr-2 mb-2" type="text" name="staffContactAdd" value="<?php echo $staff['staffContactAdd'];?>" id="staffContactAdd" placeholder="Contact Address">
                </div>
                
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="staffPermAdd" value="<?php echo $staff['staffPermHomeAdd'];?>" id="staffPermAdd" placeholder="Perm Home Address">
                    
                </div>
                
                <div class="form-group p-2">
                    <input class="btn btn-primary form-control" type="submit" value="Update Staff">
                </div>
            </form>
        </div>
    </section>
</main>
<?php include_once(SHARED_PATH . '/adminFooter.php');?>
    </div>