<?php
include_once('../../../private/initialize.php');

$pageHeading = "Add Staff";
include_once(SHARED_PATH .'/adminHeader.php');
?>

<?php 
if(is_post_request()){

    $Staff[] = array();
    $Staff['lastName'] = h($_POST['lastName']);
    $Staff['firstName'] = h($_POST['firstName']);
    $Staff['hireDate'] = h($_POST['hireDate']);
    $Staff['sex'] = h($_POST['sex']);
    $Staff['staffCat'] = h($_POST['staffCategory']);
    $Staff['email'] = h($_POST['staffMail']);
    $Staff['phone'] = h($_POST['staffPhone']);
    $Staff['contactAdd'] = h($_POST['staffContactAdd']);
    $Staff['permAdd'] = h($_POST['staffPermAdd']);
    $Staff['userName'] = h($_POST['staffUserName']);
    $Staff['passWord'] = h($_POST['staffPassword']);
    $Staff['confirmPassWord'] = h($_POST['confirmStaffPassword']);
    $Staff['photo'] = h($_FILES['profileUpload']['name'])  ?? '';
    
    //Move the photo to the profile picture folder
    $photoTemp = $_FILES['profileUpload']['tmp_name'];
    move_uploaded_file($photoTemp, '../../images/profilePix/'.$Staff['photo']);

    //Hashing the password
    $Staff['hashedPassword'] = password_hash($Staff['passWord'], PASSWORD_DEFAULT);

    //Adding value to the database using function
    $staffs = addStaff($Staff);

    if($staffs === true){
        $latestId = mysqli_insert_id($db);
        redirect_to(urlfor('/admin/staff/show.php?id='.$latestId));    
    }
}
?>
<main>
    <div class="row">
        <div class="col-xs-12 mx-auto">
            <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
    <div>
        <?php
        //foreach($errors as $error){
            //echo $error . '</br>';
        //}
        ?>
    </div>
    <nav class="nav navbar-inline text-center">
		<!--<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php //echo urlFor('/admin/AcadYr/new.php');?>"> Create new AcadYr</a></li>-->
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Staff/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   <section id="register">
        <div class="row text-center ">
           <form enctype="multipart/form-data" action="<?php echo urlFor('Admin/staff/new.php');?>" name="regStaffForm" id="regStaffForm" method="post">
            <!-- Start Profile pix area -->
           <div class="upload-profile-image d-flex justify-content-center">
               <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="<?php echo urlFor('images/cameraSolid.jpg');?>" alt="camera">
                    </div>
                    <!--<img class="img rounded-circle" src="<?php //echo urlfor('images/profilePix/default.png');?>"style="width120px; height:120px;" alt="profile">*/-->
                  <img id="output" class="img rounded-circle" src="../../images/profilePix/default.png"style="width:120px; height:120px;" alt="profile">
                    <small class="form-text text-black-50">Choose image</small>
                    <script type="text/javascript">
                        var loadFile = function(event){
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function(){
                                URL.revokeObjectURL(output.src)
                            }
                        };
                    </script>
                    <input type="file" class="form-control-file" name="profileUpload" id="upload-profile" onchange="loadFile(event)">
                </div>
            </div>
            <!-- End Profile pix area -->
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="lastName" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName'];}?>" id="lastName" placeholder="Last Name">
                    <input class="" type="text" name="firstName" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName'];}?>" id="firstName" placeholder="First Name">
                </div>
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="hireDate" value="<?php if(isset($_POST['hireDate'])){ echo $_POST['hireDate'];}?>" id="hireDate" placeholder="Date of Employment">
                    <select class="mr-2 mb-2 px-5 py-1" type="text" name="sex" id="sex" placeholder="Sex">
                        <option value="">Sex</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select> 
                </div>
                <div class="col">
                    <select class="mr-2 mb-2 px-4 py-1" type="text" name="staffCategory" id="staffCategory" placeholder="Staff Category">
                        <option value="">Staff Category</option>
                        <option value="1">Administrative</option>
                        <option value="2">Academic</option>
                    </select> 
                    <input class="mr-2 mb-2" type="text" name="staffMail" value="<?php if(isset($_POST['staffMail'])){ echo $_POST['staffMail'];}?>" id="staffMail" placeholder="Email Address">
                </div>
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="staffPhone" value="<?php if(isset($_POST['staffPhone'])){ echo $_POST['staffPhone'];}?>" id="staffPhone" placeholder="Phone">
                    <input class="mr-2 mb-2" type="text" name="staffContactAdd" value="<?php if(isset($_POST['staffContactAdd'])){ echo $_POST['staffContactAdd'];}?>" id="staffContactAdd" placeholder="Contact Address">
                </div>
                <div class="col">
                    <input class="mr-2 mb-2" type="text" name="staffPermAdd" value="<?php if(isset($_POST['staffPermAdd'])){ echo $_POST['staffPermAdd'];}?>" id="staffPermAdd" placeholder="Perm Home Address">
                    <input class="mr-2 mb-2" type="text" name="staffUserName" value="<?php if(isset($_POST['staffUserName'])){ echo $_POST['staffUserName'];}?>" id="staffUserName" placeholder="Username">
                </div>
                <div class="col">
                    <input class="mr-2 mb-2" type="password" name="staffPassword" id="staffPassword" placeholder="Password">
                    <input class="mr-2 mb-2" type="password" name="confirmStaffPassword" id="confirmStaffPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group p-2">
                    <input class="btn btn-primary form-control" type="submit" value="Add Staff">
                </div>
            </form>
        </div>
    </section>
</main>
<?php  include(SHARED_PATH . '/adminFooter.php');?>