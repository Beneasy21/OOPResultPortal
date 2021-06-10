<?php
include_once('../../../private/initialize.php');

$pageHeading = "Add SubjectTaught";
include_once(SHARED_PATH .'/adminHeader.php');
?>

<?php 
if(is_post_request()){

    $SubjectTaught[] = array();
    $SubjectTaught['subjects'] = h($_POST['subjects']);
    $SubjectTaught['staff'] = h($_POST['staff']);
    $SubjectTaught['location'] = h($_POST['location']);
    $SubjectTaught['classs'] = h($_POST['classs']);
    $SubjectTaught['arm'] = h($_POST['arm']);
    $SubjectTaught['acadYr'] = h($_POST['acadYr']);
    $SubjectTaught['term'] = h($_POST['term']);

 
    //Adding value to the database using function
    $subjectTaught = addSubjectTaught($SubjectTaught);

    if($subjectTaught === true){
        $latestId = mysqli_insert_id($db);
        redirect_to(urlfor('/admin/subjectTaught/show.php?id='.$latestId));    
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
		<li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/SubjectTaught/index.php');?>"> Back to List</a></li>
        <li class="mr-4 p-2"><a class="btn btn-primary" href="<?php echo urlFor('/admin/index.php');?>"> Back to Admin Dashboard</a></li>
   </nav>
   <section id="register">
        <div class="row text-center ">
           <form enctype="multipart/form-data" action="<?php echo urlFor('Admin/subjectTaught/new.php');?>" name="regSubTaughtForm" id="regSSubTaughtForm" method="post">
            
                <div class="col">
                    <select class="mr-2 mb-2 px-5 py-1" name="staff" id="staff">
                        <option value="">Choose Staff</option>
                        <?php 
                        $result = getStaff();
                        while($staff = mysqli_fetch_assoc($result)){
                            echo "<option value=\"".$staff['staffId']."\"";
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
                            echo ">". $arm['armLName'];
                            }
                        mysqli_free_result($result);
                        ?>
                    </select> 
                    

                    
                </div>
                                
                
                <div class="form-group p-2">
                    <input class="btn btn-primary form-control" type="submit" value="Add Staff">
                </div>
            </form>
        </div>
    </section>
</main>
<?php  include(SHARED_PATH . '/adminFooter.php');?>