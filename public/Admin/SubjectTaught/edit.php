<?php
include_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/subjectTaught/index.php'));
}
$id = h($_GET['id']);

if(is_post_request()){

    $SubjectTaught[] = array();
    $SubjectTaught['subjectId'] = h($id);
    $SubjectTaught['subjects'] = h($_POST['subjects']);
    $SubjectTaught['staff'] = h($_POST['staff']);
    $SubjectTaught['location'] = h($_POST['location']);
    $SubjectTaught['classs'] = h($_POST['classs']);
    $SubjectTaught['arm'] = h($_POST['arm']);
    $SubjectTaught['acadYr'] = h($_POST['acadYr']);
    $SubjectTaught['term'] = h($_POST['term']);

    


    $result = updateSubjectTaught($SubjectTaught);
    if($result === true){
        redirect_to(urlfor('/admin/SubjectTaught/show.php?id='.h(u($id))));
   }else{
       $errors = $result;
   }
}else{
    $subjectTaught = getSubjectTaughtByStaffId($id);
}
?>
<?php 


$pageHeading = $pageTitle = "Edit :". $subjectTaught['staffId'];
include_once(SHARED_PATH .'/adminHeader.php');
?>
    <main>
    <nav class="nav navbar-inline">
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjectTaught/new.php');?>"> Create New</a></li>
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/subjectTaught/index.php');?>"> Back to List</a></li>
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
           <form enctype="multipart/form-data" action="<?php echo urlFor('Admin/subjectTaught/edit.php?id='.$id);?>" name="regStaffForm" id="regStaffForm" method="post">
                <div class="col">
                    <select class="mr-2 mb-2 px-5 py-1" name="staff" id="staff">
                        <option value="">Choose Staff</option>
                        <?php 
                        $result = getStaff();
                        while($staff = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$staff['staffId']."\"";
                            if($staff['staffId'] == $subjectTaught['staffId']){
                                    echo " selected";
                                }
                            echo ">". $staff['staffLName'].' '.$staff['staffFName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 

                    <select class="mr-2 mb-2 px-5 py-1" name="location" id="location">
                        <option value="">Choose Location</option>
                        <?php 
                        $result = getLocation();
                        while($location = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$location['locId']."\"";
                            if($location['locId'] == $subjectTaught['locationId']){
                                    echo " selected";
                                }
                            echo ">". $location['locLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                </div>
                <div class="col">
                    <select class="mr-2 mb-2 px-4 py-1" name="subjects" id="subjects">
                        <option value="">Choose Subject</option>
                        <?php 
                        $result = getSubjects();
                        while($subjects = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$subjects['subId']."\"";
                            if($subjects['subId'] == $subjectTaught['subjectId']){
                                    echo " selected";
                                }
                            echo ">". $subjects['subjectLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                    <select class="mr-2 mb-2 px-5 py-1" name="acadYr" id="acadYr">
                        <option value="">Choose Acad Yr</option>
                        <?php 
                        $result = getAcadYr();
                        while($acadYr = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$acadYr['acadYrId']."\"";
                            if($acadYr['acadYrId'] == $subjectTaught['acadYrId']){
                                    echo " selected";
                                }
                            echo ">". $acadYr['longName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                </div>
                <div class="col">
                    <select class="mr-2 mb-2 px-5 py-1" name="classs" id="classs">
                        <option value="">Choose Class</option>
                        <?php 
                        $result = getClasss();
                        while($classs = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$classs['classsId']."\"";
                            if($classs['classsId'] == $subjectTaught['classsId']){
                                    echo " selected";
                                }
                            echo ">". $classs['classsLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                    <select class="mr-3 mb-2 px-5 py-1" name="term" id="term">
                        <option value="">Choose Term</option>
                        <?php 
                        $result = getTerm();
                        while($term = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$term['termId']."\"";
                            if($term['termId'] == $subjectTaught['termId']){
                                    echo " selected";
                                }
                            echo ">". $term['termLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                </div>
                <div class="col">
                    <select class="mr-2 mb-2 px-5 py-1" name="arm" id="arm">
                        <option value="">Choose Arm</option>
                        <?php 
                        $result = getArm();
                        while($arm = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$arm['armId']."\"";
                            if($arm['armId'] == $subjectTaught['armId']){
                                    echo " selected";
                                }
                            echo ">". $arm['armLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                </div>
                <div class="form-group p-2">
                    <input class="btn btn-primary form-control" type="submit" value="Update SubjectTaught">
                </div>
            </form>
        </div>
    </section>
</main>
<?php include_once(SHARED_PATH . '/adminFooter.php');?>
    </div>