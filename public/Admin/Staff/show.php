<?php
include_once('../../../private/initialize.php');

$id = h($_GET['id']);

$staff = getStaffById($id);
$sex = getSexById($staff['sex']);
$cat = getStaffCatById($staff['staffCatId']);

$pageHeading = $pageTitle = $staff['staffLName'] . ' ' . $staff['staffFName'];
include_once(SHARED_PATH .'/adminHeader.php');

?>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Staff/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/Staff/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   <div class="row">
        <div class="col-xs-12 mx-auto">
        <h1><?php echo $pageHeading;?></h1>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            
            <div class="row">
                 <div class="col text-left">
                    <h3>
                    <p>Sex: <?php echo $sex['longName'];?></p>
                    <p>Staff Category: <?php echo $cat['longName'];?></p>
                    <p>Email:<?php echo $staff['staffMail'];?></p>
                    <p>Phone: <?php echo $staff['staffPhone'];?></p>
                    <p>Contact Address: <?php echo $staff['staffContactAdd'];?></p>
                    <p>Perm Home Address: <?php echo $staff['staffPermHomeAdd'];?></p>
                    </h3>
                </div>
                <div class="col text-center">
                    <form enctype="multipart/form-data" action="<?php echo urlFor('Admin/staff/editProfilePix.php?id='.$id);?>" name="regStaffForm" id="regStaffForm" method="post">
                      <div class="upload-profile-image d-flex justify-content-center">
                        <div class="text-center">
                          
                          <img id="output" class="img rounded" style="width:220px; height: 220px;" src="<?php echo urlFor('/images/profilePix/'.$staff['staffImage']) ;?>" style="width:120px; height:120px;" alt="profile">
                          <small class="form-text text-black-50">Clck to Change</small>
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
                          <input type="submit" name="submit" value="Change Profile Pix">
                        </div>
                      </div>
                    </form>

                    </form> 
                </div>
            </div>
            
        </div>
                
        
    </div>

</div>
<?php include(SHARED_PATH . '/adminFooter.php'); ?>