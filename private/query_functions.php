<?php
// =============================ADMIN===============================

// ------------------------- Start of Sex --------------------------
//*************** Getting Collection of Sex to display on index */


// --------  -----  PDO Version Prepared Statements ---------------------------
function getSex(){
	global $dbh;

	$sql = "SELECT * FROM tblSex ";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	//$result = mysqli_query($db, $sql);
	confirm_result_set($stmt);
	$Sex = 	$stmt->fetchAll();
	$stmt->closeCursor();
	return $Sex;
}


/*

// ...........................This is the normal mysqli version ....................
	function getSex(){
	global $db;

	$sql = "SELECT * FROM tblSex ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}
*/

//*************** Getting one Sex to display on show */
// --------  -----  PDO Version Prepared Statements ---------------------------
function getSexById($id){
	global $dbh;

	$sql = "SELECT * FROM tblSex ";
	$sql .= "WHERE sexId = :id";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	
	//$result = mysqli_query($db, $sql);
	confirm_result_set($stmt);

	$Sex = $stmt->fetch();
	//$Sex = mysqli_fetch_assoc($result);
	$stmt->closeCursor();
	return $Sex;
}
/*
 // .................. This is the normal mysqli process ...............
 // ................... getSexById ...........................
function getSexById($id){
	global $db;

	$sql = "SELECT * FROM tblSex ";
	$sql .= "WHERE sexId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$Sex = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Sex;
}*/

function addSex($Sex){
	try {
		global $dbh;

		$sql = "INSERT INTO tblSex(longName, shortName) ";
		$sql .= "VALUES (?,?)";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $Sex['longName'], PDO::PARAM_STR);
		$stmt->bindParam(2, $Sex['shortName'], PDO::PARAM_STR);
		$stmt->execute();

		if($stmt){
			//echo $sql;
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not ad record to the database ".DB_NAME.":" .$e->getMessage());		
	}
}
	
// .................. This is the normal mysqli method for  addSEx .................
/*function addSex($Sex){
	global $db;

	$sql = "INSERT INTO tblSex(longName, shortName) 
	VALUES ('".$Sex['longName']."', '".$Sex['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		//echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}
*/
//********************* Delete one sex at a time */
function deleteSexById($id){
	try {
		global $dbh;

		$sql = "DELETE FROM tblSex ";
		$sql .= "WHERE sexId = :id";
		$sql .= " LIMIT 1";

		echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		if($stmt){
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not delete the value" .$e->getMessage());		
	}
}

	
//*********************** Validating Sex ************
function validateSex($Sex){
	$errors = [];

	$longName = $Sex['longName'];
	if(is_blank($longName)){
		$errors[] = "The Full Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation can never be Empty";
	}
	return $errors;
}


//************ Updating Sex ************************ */
// ............... PDO process ..............
function updateSex($Sex){
	try {
		
		global $dbh;

		$errors = validateSex($Sex);
		if(!empty($errors)){
			return $errors;
		}

		$sql = "UPDATE tblSex SET ";
		$sql .= "longName=?,"; 
		$sql .= "shortName=?"; 
		$sql .= " WHERE sexId= ?";
		$sql .= " LIMIT 1";
		echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $Sex['longName'], PDO::PARAM_STR);
		$stmt->bindParam(2, $Sex['shortName'], PDO::PARAM_STR);
		$stmt->bindParam(3, $Sex['sexId'], PDO::PARAM_INT);
		//echo $sql;
		$stmt->execute();

		
		
		if($stmt){
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not update record".$e->getMessage());		
	}
}

// ............... Normal Mysqli process ..............
/*function updateSex($Sex){
	global $db;

	$errors = validateSex($Sex);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblSex SET ";
	$sql .= "longName='" .$Sex['longName']."',"; 
	$sql .= "shortName='" .$Sex['shortName']."'"; 
	$sql .= "WHERE sexId='".$Sex['sexId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}

}
*/
// ---------------------------------- End of Sex --------------------

// ------------------------- Start of AcadYr --------------------------
//*************** Getting Collection of AcadYr to display on index */
function getAcadYr(){
	global $db;

	$sql = "SELECT * FROM tblAcadYr ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Acad Yr to display on show */
function getAcadYrById($id){
	global $db;

	$sql = "SELECT * FROM tblAcadYr ";
	$sql .= "WHERE acadYrId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$acadYr = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $acadYr;
}

function addAcadYr($AcadYr){
	global $db;

	$sql = "INSERT INTO tblAcadYr(longName, shortName) 
	VALUES ('".$AcadYr['longName']."', '".$AcadYr['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Acad Yr at a time */
function deleteAcadYrById($id){
	global $db;

	$sql = "DELETE FROM tblAcadYr ";
	$sql .= "WHERE acadYrId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Acad Year ************
function validateAcadYr($AcadYr){
	$errors = [];

	$longName = $AcadYr['longName'];
	if(is_blank($longName)){
		$errors[] = "The Full Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation can never be Empty";
	}

	$shortName = $AcadYr['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating AcadYr ************************ */
function updateAcadYr($AcadYr){
	global $db;

	$errors = validateAcadYr($AcadYr);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblAcadYr SET ";
	$sql .= "longName='" .$AcadYr['longName']."',"; 
	$sql .= "shortName='" .$AcadYr['shortName']."'"; 
	$sql .= "WHERE acadYrId='".$AcadYr['acadYrId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}

}
// ---------------------------------- End of AAcademic Year --------------------


// ------------------------- Start of Classs --------------------------
//*************** Getting Collection of Classes to display on index */
function getClasss(){
	global $db;

	$sql = "SELECT * FROM tblClasss ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one classs to display on show */
function getClasssById($id){
	global $db;

	$sql = "SELECT * FROM tblClasss ";
	$sql .= "WHERE classsId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$classs = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $classs;
}

//Insert into Classes
function addClasss($Classs){
	global $db;

	$sql = "INSERT INTO tblclasss(classsLName, classsSName) 
	VALUES ('".$Classs['longName']."', '".$Classs['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Classs at a time */
function deleteClasssById($id){
	global $db;

	$sql = "DELETE FROM tblClasss ";
	$sql .= "WHERE classsId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Classes ************
function validateClasss($Classs){
	$errors = [];

	$longName = $Classs['longName'];
	if(is_blank($longName)){
		$errors[] = "The Full Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation can never be Empty";
	}

	$shortName = $Classs['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating Classs ************************ */
function updateClasss($Classs){
	global $db;

	$errors = validateClasss($Classs);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblClasss SET ";
	$sql .= "classsLName='" .$Classs['longName']."',"; 
	$sql .= "classsSName='" .$Classs['shortName']."'"; 
	$sql .= "WHERE classsId='".$Classs['classsId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Class --------------------


// ------------------------- Start of Arm --------------------------
//*************** Getting Collection of Arm to display on index */
function getArm(){
	global $db;

	$sql = "SELECT * FROM tblArm ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Arm to display on show */
function getArmById($id){
	global $db;

	$sql = "SELECT * FROM tblArm ";
	$sql .= "WHERE armId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $arm;
}

//Insert into Arm
function addArm($Arm){
	global $db;

	$sql = "INSERT INTO tblArm(armLName, armSName) 
	VALUES ('".$Arm['longName']."', '".$Arm['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Arm at a time */
function deleteArmById($id){
	global $db;

	$sql = "DELETE FROM tblArm ";
	$sql .= "WHERE armId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Arm ************
function validateArm($Arm){
	$errors = [];

	$longName = $Arm['longName'];
	if(is_blank($longName)){
		$errors[] = "The Arm Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The ArmName must be above 2 ";
	}

	$shortName = $Arm['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating Arm ************************ */
function updateArm($Arm){
	global $db;

	$errors = validateClasss($Classs);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblArm SET ";
	$sql .= "armLName='" .$Arm['longName']."',"; 
	$sql .= "armSName='" .$Arm['shortName']."'"; 
	$sql .= "WHERE armId='".$Arm['armId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Arm --------------------


// ------------------------- Start of Term --------------------------
//*************** Getting Collection of Term to display on index */
function getTerm(){
	global $db;

	$sql = "SELECT * FROM tblTerm ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Term to display on show */
function getTermById($id){
	global $db;

	$sql = "SELECT * FROM tblTerm ";
	$sql .= "WHERE termId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $arm;
}

//Insert into Term
function addTerm($Term){
	global $db;

	$errors = validateTerm($Term);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "INSERT INTO tblTerm(termLName, termSName) 
	VALUES ('".$Term['longName']."', '".$Term['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Term at a time */
function deleteTermById($id){
	global $db;

	$sql = "DELETE FROM tblTerm ";
	$sql .= "WHERE termId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Term ************
function validateTerm($Term){
	$errors = [];

	$longName = $Term['longName'];
	if(is_blank($longName)){
		$errors[] = "The Term Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The TermName must be above 2 ";
	}

	$shortName = $Term['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating Term ************************ */
function updateTerm($Term){
	global $db;

	$errors = validateTerm($Term);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblTerm SET ";
	$sql .= "termLName='" .$Term['longName']."',"; 
	$sql .= "termSName='" .$Term['shortName']."'"; 
	$sql .= "WHERE termId='".$Term['armId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Term --------------------


// ------------------------- Start of Staff --------------------------
//*************** Getting Collection of Staff to display on index */
function getStaff(){
	global $db;

	$sql = "SELECT * FROM tblStaff ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Staff to display on show */
function getStaffById($id){
	global $db;

	$sql = "SELECT * FROM tblStaff ";
	$sql .= "WHERE staffId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $arm;
}

//Insert into Staff
function addStaff($Staff){
	global $db;

	$errors = validateStaff($Staff);
	if(!empty($errors)){
		return $errors;
	}
	
	$sql = "INSERT INTO tblStaff(staffLName, staffFName, hireDate, sex, 
								 staffCatId, staffMail, staffPhone, staffContactAdd, 
								 staffPermHomeAdd, staffImage, staffUsername, staffPassword) 
			VALUES ('".$Staff['lastName']."', '".$Staff['firstName']."', '".$Staff['hireDate']."', '".$Staff['sex']."',
					'".$Staff['staffCat']."', '".$Staff['email']."', '".$Staff['phone']."', '".$Staff['contactAdd']."',
					'".$Staff['permAdd']."', '".$Staff['photo']."', '".$Staff['userName']."','".$Staff['hashedPassword']."')";

		//echo $sql;
	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Staff at a time */
function deleteStaffById($id){
	global $db;

	$sql = "DELETE FROM tblStaff ";
	$sql .= "WHERE StaffId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Staff ************
function validateStaff($Staff){
	$errors = [];

	if(is_blank($Staff['lastName'])){
        $errors[] = "The last name is empty";
    }
    if(is_blank($Staff['firstName'])){
        $errors[] = "The first name is empty";
    }
    if(is_blank($Staff['hireDate'])){
        $errors[] = "The hire Date is empty";
    }
    if(is_blank($Staff['sex'])){
        $errors[] = "The Sex name is empty";
    }
    if(is_blank($Staff['staffCat'])){
        $errors[] = "The Staff Category is empty";
    }
    if(is_blank($Staff['email'])){
        $errors[] = "The Email was not filled";
    }
    if(is_blank($Staff['phone'])){
        $errors[] = "The Phone number is empty";
    }
    if(is_blank($Staff['contactAdd'])){
        $errors[] = "The Contact Address is empty";
    }
    if(is_blank($Staff['permAdd'])){
        $errors[] = "The Permanent Address is empty";
    }
    if(is_blank($Staff['userName'])){
        $errors[] = "The Username is empty";
    }
    if(is_blank($Staff['passWord'])){
        $errors[] = "The Password Field is empty";
    }
    if(is_blank($Staff['photo'])){
        $errors[] = "Kindly Select a profile image";
    }
    if($Staff['passWord'] !== $Staff['confirmPassWord']){
        $errors[] = "Password and Confirm Password did not match";
    }


	return $errors;
}


//************ Updating Staff ************************ */
function updateStaff($Staff){
	global $db;

	$errors = validateStaff($Staff);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblStaff SET ";
	$sql .= "staffLName='" .$Staff['lastName']."',"; 
	$sql .= "staffFName='" .$Staff['firstName']."',"; 
	$sql .= "hireDate='" .$Staff['hireDate']."',"; 
	$sql .= "sex='" .$Staff['sex']."',"; 
	$sql .= "staffCatId='" .$Staff['staffCat']."',"; 
	$sql .= "staffContactAdd='" .$Staff['contactAdd']."',"; 
	$sql .= "staffPermHomeAdd='" .$Staff['permAdd']."'"; 
	$sql .= "WHERE staffId='".$Staff['id']."'";
	$sql .= " LIMIT 1";

	//echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

//Updating Staff Profile  Picture
function updateStaffPix($StaffPix){
	global $db;

	$sql = "UPDATE tblStaff SET ";
	$sql .= "staffImage='" .$StaffPix['photo']."'"; 
	$sql .= "WHERE staffId='".$StaffPix['id']."'";
	$sql .= " LIMIT 1";

	//echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}	
}

// ---------------------------------- End of Staff --------------------


// ------------------------- Start of Staff Category --------------------------
//*************** Getting Collection of Staff Category to display on index */
function getStaffCat(){
	global $db;
 
	$sql = "SELECT * FROM tblstaffCat ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Term to display on show */

function getStaffCatById($id){
	global $db;

	$sql = "SELECT * FROM tblstaffCat ";
	$sql .= "WHERE staffCatId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $arm;
}

//Insert into Term
function addStaffCat($staffCat){
	global $db;

	$errors = validateStaffCat($staffCat);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "INSERT INTO tblstaffCat(longName, shortName) 
	VALUES ('".$staffCat['longName']."', '".$staffCat['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Term at a time */

function deleteStaffCatById($id){
	global $db;

	$sql = "DELETE FROM tblstaffCat ";
	$sql .= "WHERE staffCatId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Term ************
function validateStaffCat($staffCat){
	$errors = [];

	$longName = $staffCat['longName'];
	if(is_blank($longName)){
		$errors[] = "The Term Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The TermName must be above 2 ";
	}

	$shortName = $staffCat['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating staff Category ************************ */

function updateStaffCat($staffCat){
	global $db;

	$errors = validateStaffCat($staffCat);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblStaffCat SET ";
	$sql .= "longName='" .$StaffCat['longName']."',"; 
	$sql .= "shortName='" .$StaffCat['shortName']."'"; 
	$sql .= "WHERE staffCatId='".$StaffCat['staffCatId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Staff Category --------------------


// ------------------------- Start of Subject --------------------------
//*************** Getting Collection of Subjects to display on index */
function getSubjects(){
	global $db;

	$sql = "SELECT * FROM tblSubjects ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Subject to display on show */
function getSubjectById($id){
	global $db;

	$sql = "SELECT * FROM tblSubjects ";
	$sql .= "WHERE subId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $arm;
}

//Insert into Subject
function addSubject($Subject){
	global $db;

	$errors = validateSubject($Subject);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "INSERT INTO tblSubjects(subjectLName, subjectSName) 
	VALUES ('".$Subject['longName']."', '".$Subject['shortName']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Subject at a time */
function deleteSubjectById($id){
	global $db;

	$sql = "DELETE FROM tblSubjects ";
	$sql .= "WHERE subId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Subjects ************
function validateSubject($Subject){
	$errors = [];

	$longName = $Subject['longName'];
	if(is_blank($longName)){
		$errors[] = "The Term Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The TermName must be above 2 ";
	}

	$shortName = $Subject['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}
	return $errors;
}


//************ Updating Subject ************************ */
function updateSubject($Subject){
	global $db;

	$errors = validateSubject($Subject);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblSubjects SET ";
	$sql .= "subjectLName='" .$Subject['longName']."',"; 
	$sql .= "subjectSName='" .$Subject['shortName']."'"; 
	$sql .= "WHERE subId='".$Subject['subjectId']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Subjects --------------------


// ------------------------- Start of Location --------------------------
//*************** Getting Collection of Locations to display on index */
function getLocation(){
	global $db;

	$sql = "SELECT * FROM tblLocation ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one Location to display on show */
function getLocationById($id){
	global $db;

	$sql = "SELECT * FROM tblLocation ";
	$sql .= "WHERE locId = '".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$location = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $location;
}

//Insert into Locations
function addLocation($Location){
	global $db;

	$errors = validateLocation($Location);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "INSERT INTO tblLocation(locLName, locSName, locAddress) 
	VALUES ('".$Location['longName']."', '".$Location['shortName']."', '".$Location['locAddress']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Location at a time at a time */
function deleteLocattionById($id){
	global $db;

	$sql = "DELETE FROM tblLocation ";
	$sql .= "WHERE locId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Subjects ************
function validateLocation($Location){
	$errors = [];

	$longName = $Location['longName'];
	if(is_blank($longName)){
		$errors[] = "The Term Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The TermName must be above 2 ";
	}

	$shortName = $Location['shortName'];
	if(is_blank($shortName)){
		$errors[] = "The Abbreviation can never be Empty";
	}elseif(!has_length($shortName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation must be more than 2 ";
	}

	$locAddress = $Location['locAddress'];
	if(is_blank($locAddress)){
		$errors[] = "The Address can never be Empty";
	}elseif(!has_length($locAddress, ['min' => 2, 'max' => 255])){
		$errors[] = "The Address must be more than 2 ";
	}

	return $errors;
}


//************ Updating Location ************************ */
function updateLocation($Location){
	global $db;

	$errors = validateLocation($Location);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblLocation SET ";
	$sql .= "locLName='" .$Location['longName']."',"; 
	$sql .= "locSName='" .$Location['shortName']."',"; 
	$sql .= "locAddress='" .$Location['locAddress']."'"; 
	$sql .= "WHERE locId='".$Location['locationId']."'";
	$sql .= " LIMIT 1";
	//echo $sql;

	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Location --------------------




// ------------------------- Start of SubjectTaught --------------------------
//*************** Getting Collection of Subjects to display on index */
function getSubjectTaught(){
	global $db;

	$sql = "SELECT * FROM tblSubjectTaught ";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

//*************** Getting one SubjectTaught to display on show */
function getSubjectTaughtByStaffId($id){
	global $db;

	$sql = "SELECT * FROM tblSubjectTaught ";
	$sql .= "WHERE staffId = '".$id."'";
	//echo $sql;
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	$subjectTaught = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $subjectTaught;
}

function getSubjectAllocatedByStaffId($id){
	global $db;

	$sql = "SELECT * FROM tblSubjectTaught ";
	$sql .= "WHERE staffId = '".$id."'";
	//echo $sql;
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	return $result;
}

//Insert into SubjectTaught
function addSubjecttaught($SubjectTaught){
	global $db;

	$errors = validateSubjectTaught($SubjectTaught);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "INSERT INTO tblSubjectTaught(subjectId, staffId, locationId, classsId, armId, acadYrId, termId) 
	VALUES ('".$SubjectTaught['subjects']."','".$SubjectTaught['staff']."','".$SubjectTaught['location']."',
			'".$SubjectTaught['classs']."','".$SubjectTaught['arm']."','".$SubjectTaught['acadYr']."', 
			'".$SubjectTaught['term']."' )";

	$result = mysqli_query($db,$sql);
	if($result){
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//********************* Delete one Subject at a time */
function deleteSubjectTaughtById($id){
	global $db;

	$sql = "DELETE FROM tblSubjectTaught ";
	$sql .= "WHERE subTaughtId = '".$id."' ";
	$sql .= "LIMIT 1";

	$res = mysqli_query($db,$sql);

	if($res){
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
//*********************** Validating Subjects ************
function validateSubjectTaught($SubjectTaught){
	$errors = [];

	$subjects = $SubjectTaught['subjects'];
	if(is_blank($subjects)){
		$errors[] = "The subject can never be Empty";
	}
	$staff = $SubjectTaught['staff'];
	if(is_blank($staff)){
		$errors[] = "The Staff can never be Empty";
	}

	$location = $SubjectTaught['location'];
	if(is_blank($location)){
		$errors[] = "The location can never be Empty";
	}

	$classs = $SubjectTaught['classs'];
	if(is_blank($classs)){
		$errors[] = "The class can never be Empty";
	}

	$arm = $SubjectTaught['arm'];
	if(is_blank($arm)){
		$errors[] = "The arm can never be Empty";
	}

	$acadYr = $SubjectTaught['acadYr'];
	if(is_blank($acadYr)){
		$errors[] = "The acad Year can never be Empty";
	}

	$term = $SubjectTaught['term'];
	if(is_blank($term)){
		$errors[] = "The term can never be Empty";
	}
	
	return $errors;
}


//************ Updating SubjectTaught ************************ */
function updateSubjectTaught($SubjectTaught){
	global $db;

	$errors = validateSubjectTaught($SubjectTaught);
	if(!empty($errors)){
		return $errors;
	}

	$sql = "UPDATE tblSubjectTaught SET ";
	$sql .= "subjectId='" .$SubjectTaught['subjects']."',"; 
	$sql .= "staffId='" .$SubjectTaught['staff']."',";
	$sql .= "locationId='" .$SubjectTaught['location']."',";  
	$sql .= "classsId='" .$SubjectTaught['classs']."',"; 
	$sql .= "armId='" .$SubjectTaught['arm']."',"; 
	$sql .= "acadYrId='" .$SubjectTaught['acadYr']."',"; 
	$sql .= "termId='" .$SubjectTaught['term']."'"; 
	$sql .= "WHERE staffId='".$SubjectTaught['staff']."'";
	$sql .= " LIMIT 1";
	echo $sql;
	$result = mysqli_query($db, $sql);
	if($result){
		return true;
	}else{
		//Update failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

// ---------------------------------- End of Subjects --------------------
/*
// --------  -----  PDO Version Prepared Statements ---------------------------
function getStudents(){
	global $dbh;

	$sql = "SELECT * FROM tblStudents ";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	//$result = mysqli_query($db, $sql);
	confirm_result_set($stmt);
	$Student = 	$stmt->fetchAll();
	$stmt->closeCursor();
	return $Student;
}



//*************** Getting one Sex to display on show */
// --------  -----  PDO Version Prepared Statements ---------------------------
/*function getStudentById($id){
	global $dbh;

	$sql = "SELECT * FROM tblStudents ";
	$sql .= "WHERE studId = :id";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	
	//$result = mysqli_query($db, $sql);
	confirm_result_set($stmt);

	$Student = $stmt->fetch();
	//$Sex = mysqli_fetch_assoc($result);
	$stmt->closeCursor();
	return $Student;
}

function addStudent($Student){
	try {
		global $dbh;

		$sql = "INSERT INTO tblStudents(studRegNo, studLName, studFName, studSex, dob, initialClass, currentClass, acadYrId, armId, parentName, studRegDate, studPix, studStatus, createdBy, studUsername, studPassword) ";
		$sql .= "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $Student['regNo'], PDO::PARAM_STR);
		$stmt->bindParam(2, $Student['lName'], PDO::PARAM_STR);
		$stmt->bindParam(3, $Student['fName'], PDO::PARAM_STR);
		$stmt->bindParam(4, $Student['sex'], PDO::PARAM_STR);
		$stmt->bindParam(5, $Student['dob'], PDO::PARAM_STR);
		$stmt->bindParam(6, $Student['iClass'], PDO::PARAM_INT);
		$stmt->bindParam(7, $Student['cClass'], PDO::PARAM_INT);
		$stmt->bindParam(8, $Student['acadYr'], PDO::PARAM_INT);
		$stmt->bindParam(9, $Student['arm'], PDO::PARAM_INT);
		$stmt->bindParam(10, $Student['parentName'], PDO::PARAM_STR);
		$stmt->bindParam(11, $Student['regDate'], PDO::PARAM_STR);
		$stmt->bindParam(12, $Student['studPix'], PDO::PARAM_STR);
		$stmt->bindParam(13, $Student['studStatus'], PDO::PARAM_INT);
		$stmt->bindParam(14, $Student['createdBy'], PDO::PARAM_INT);
		$stmt->bindParam(15, $Student['studUsername'], PDO::PARAM_STR);
		$stmt->bindParam(16, $Student['studPassword'], PDO::PARAM_STR);

		$stmt->execute();

		if($stmt){
			//echo $sql;
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not add record to the database".$e->getMessage());		
	}
}
	
//********************* Delete one sex at a time */
/*function deleteStudentById($id){
	try {
		global $dbh;

		$sql = "DELETE FROM tblStudents ";
		$sql .= "WHERE studId = :id";
		$sql .= " LIMIT 1";

		//echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		if($stmt){
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not delete the value" .$e->getMessage());		
	}
}

	
//*********************** Validating Sex ************
function validateStudent($Student){
	$errors = [];

	$longName = $Sex['longName'];

	if(is_blank($longName)){
		$errors[] = "The Full Name can never be Empty";
	}elseif(!has_length($longName, ['min' => 2, 'max' => 255])){
		$errors[] = "The Abbreviation can never be Empty";
	}
	return $errors;
}


//************ Updating Sex ************************ */
// ............... PDO process ..............
/*function updateSex($Sex){
	try {
		
		global $dbh;

		$errors = validateSex($Sex);
		if(!empty($errors)){
			return $errors;
		}

		$sql = "UPDATE tblSex SET ";
		$sql .= "longName=?,"; 
		$sql .= "shortName=?"; 
		$sql .= " WHERE sexId= ?";
		$sql .= " LIMIT 1";
		echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $Sex['longName'], PDO::PARAM_STR);
		$stmt->bindParam(2, $Sex['shortName'], PDO::PARAM_STR);
		$stmt->bindParam(3, $Sex['sexId'], PDO::PARAM_INT);
		//echo $sql;
		$stmt->execute();

		
		
		if($stmt){
			return true;
		}else{
		   $dbh->errorInfo();
		   $dbh = null;
		   exit;
		}
	} catch (Exception $e) {
		die("Could not update record".$e->getMessage());		
	}
}
*/








































//Get a stud Login 
//For one login per student
function fetch_studentLogin_by_id($id){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE studId='".$id."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);

	$student = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $student;
}



//Get a student
function fetch_student_by_id($id){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE studId='".$id."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);

	$student = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $student;
}


//Get Term Name
function find_termName($Term){
	global $db;

	$sql = "SELECT termName FROM tblTerm ";
	$sql .= "WHERE termId='".$Term."'";
	$result = mysqli_query($db,$sql);
	echo $sql;
	confirm_result_set($result);

	$term = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $term;
}

//Get Subject Name
function find_subjectName($subject){
	global $db;

	$sql = "SELECT * FROM tblsubjects ";
	$sql .= "WHERE subId='".$subject."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$subject = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $subject;
}

//Get Class Name
function find_className($class){
	global $db;

	$sql = "SELECT * FROM tblclass ";
	$sql .= "WHERE classsId='".$class."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$Class = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Class;
}

//Get Arm Name
function find_armName($arm){
	global $db;

	$sql = "SELECT * FROM tblarm ";
	$sql .= "WHERE armId='".$arm."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$Arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Arm;
}


//Getting names from ids Termly
function convert_id_to_name($Term, $Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SELECT resClass, termName, classsName, armName,acadYrName
	FROM results r
	INNER JOIN tblClass tc ON r.resclass = tc.classsId
	INNER JOIN tblTerm tt ON r.term = tt.termId
	INNER JOIN tblArm ta ON r.arm = ta.armId
	INNER JOIN tblacadYr tay ON r.acadYr = tay.acadYrId
	WHERE r.resClass = '".$CurrentClass."' AND r.term = '".$Term."' AND r.arm = '".$Arm."' 
	AND r.acadYr = '".$academicYear."'
	LIMIT 1";	

	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}

//Getting names from ids Annual
function convert_id_to_name_annual($Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SELECT resClass, termName, classsName, armName,acadYrName
	FROM results r
	INNER JOIN tblClass tc ON r.resclass = tc.classsId
	INNER JOIN tblTerm tt ON r.term = tt.termId
	INNER JOIN tblArm ta ON r.arm = ta.armId
	INNER JOIN tblacadYr tay ON r.acadYr = tay.acadYrId
	WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' 
	AND r.acadYr = '".$academicYear."'
	LIMIT 1";	

	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}


//Insert results
function insert_result($ca1, $ca2,$exam,$resId,$academicYear,$Term,$Arm,$CurrentClass,$Subject,$HIC,$LIC,$AIC,$examTotal,$Combination){
	global $db;

	$sql = "insert into results(ca1, ca2, exam, studId, acadYr, term, arm, resClass, subjects, chm, clm, cam, examTotal, combination) 
		Values($ca1, $ca2, $exam, '$resId', '$academicYear', '$Term', '$Arm', '$CurrentClass','$Subject',$HIC,$LIC,$AIC,$examTotal,'$Combination')";

	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

function insert_student($AdmNo,$Name,$Class,$Sex,$Arm,$House,$AcadYear,$Studentstatus,$StudDOB){
	global $db;

	$sql = "INSERT INTO students (studId,studName,sex,currentClass,arm,house,acadYr,studStatus,studDOB) 
	values('".$AdmNo."','".$Name."','".$Sex."','".$Class."','".$Arm."','".$House."','".$AcadYear."','".$StudentStatus."','".$StudDOB."')";
	
	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//insert subjects
function insert_subject($subject){
	global $db;

	$errors = validate_subject($subject);
	if(!empty($errors)){
		return $errors;
	}        

	$sql = "INSERT INTO subjects ";
	$sql .= "(menu_name, position, visible) ";
	$sql .= "VALUES (";
	$sql .= "'". $subject['menu_name']. "', ";
	$sql .= "'" .$subject['position']. "', ";
	$sql .= "'" .$subject['visible']. "'";
	$sql .= ")";
	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}


//Comments
function find_all_comments(){
	global $db;

	$sql = "SELECT * FROM comments";
	$commentSet = mysqli_query($db, $sql);
	confirm_result_set($commentSet);
	return $commentSet;
}

//student Status
function find_status(){
	global $db;

	$sql = "SELECT * FROM tblsstatus";
	$sstatus = mysqli_query($db, $sql);
	confirm_result_set($sstatus);
	return $sstatus;
}

function find_comments_by_id($id){
	global $db;

	$sql = "SELECT * FROM comments ";
	$sql .= "WHERE commId='".$id."'";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	$comment = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $comment;
}

function find_comments_by_id_and_term($id,$term){
	global $db;

	$sql = "SELECT * FROM comments ";
	$sql .= "WHERE commId='".$id."' AND term='".$term."' ";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	$comment = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $comment;
}

//Students
//All Students in a particular class and arm
function fetch_All_students_by_class_and_arm($studClass, $arm){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE currentClass='".$studClass."' AND arm='".$arm."'";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//inividual student for result page
function fetch_one_student_by_id($RegNo){
	global $db;

	$sql = "SELECT s.id,s.studId,s.studName,s.sex,tc.classsName,ta.armName,s.house,tay.acadYrName,s.arm   FROM students s
			INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
			INNER JOIN tblarm ta ON s.arm = ta.armId 
			INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
			where studId = '".$RegNo."' LIMIT 1";
			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;

}

function fetch_one_student($RegNo, $Session){
	global $db;

	$sql = "SELECT s.id,s.studId,s.studName,s.sex,tc.classsName,ta.armName,s.house,tay.acadYrName,s.arm   FROM students s
			INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
			INNER JOIN tblarm ta ON s.arm = ta.armId 
			INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
			where studId = '".$RegNo."' AND AcadYr = '".$Session."'";
			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;

}

function fetch_a_student_for_batch($RegNo, $Session){
	global $db;
	
	$sql = "SELECT s.id,s.studId,s.studName,s.house,s.sex,tc.classsName,ta.armName,tay.acadYrName,s.arm   
	FROM students s
	INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
	INNER JOIN tblarm ta ON s.arm = ta.armId 
	INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
	where s.studId = '".$RegNo."' AND s.AcadYr = '".$Session."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

function fetch_student_for_batch($Session, $Term, $Class, $Armm){
	global $db;

	$sql = "SELECT DISTINCT r.studId, s.studName,s.sex, tc.classsName,ta.armName,s.house,tay.acadYrName
		FROM results r
		INNER JOIN students s ON s.studId = r.studId
		INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
		INNER JOIN tblarm ta ON s.arm = ta.armId 
		INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
		where s.AcadYr = '$Session' and r.term = '$Term' and s.currentClass = '$Class' AND s.arm = '$Armm'";
		//echo $sql;
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		check_empty_record($result);
		return $result;
}

function fetch_a_studid_from_result($Session, $Class, $Arm){
	global $db;

	$sql = "Select distinct studId 
			FROM results 
			WHERE AcadYr = '$Session'  AND resclass = '$Class' AND arm = '$Arm'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}
//Result
//Termly result
function fetch_individual_result($RegNo,$Session, $Term, $Armm){
	global $db;

	$sql = "select r.*,ts.subName, t.termName from results  r
					INNER JOIN tblsubjects ts ON r.subjects = ts.subId
					INNER Join tblterm t ON r.term = t.termId
					where studId = '".$RegNo."' AND acadYr = '".$Session."' AND term = '".$Term."' 
					AND arm = '".$Armm."'ORDER BY r.resClass,
					 CASE `subjects`
					 WHEN '19' THEN 1
					 WHEN '35' THEN 2
					 WHEN '13' THEN 3
					 ELSE 4
					 END";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}


//Subjects
function fetch_all_subjects(){
	global $db;

	$sql = "SELECT *  FROM tblsubjects";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student classes
function fetch_all_studClass(){
	global $db;

	$sql = "SELECT *  FROM tblclass";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student Arms
function fetch_all_arms(){
	global $db;

	$sql = "SELECT *  FROM tblarm";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting term Arms
function fetch_all_terms(){
	global $db;

	$sql = "SELECT *  FROM tblterm";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student AcadYear
function fetch_all_acadYr(){
	global $db;

	$sql = "SELECT *  FROM tblacadyr";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}


function fetch_annual_result($RegNo, $Session){
	global $db;

	$sql = "SELECT r1.`subjects`,ts.subName,
			MAX(CASE WHEN r1.`term` = '1' THEN r1.`examTotal` END) 'First',
			MAX(CASE WHEN r1.`term` = '2' THEN r1.`examTotal` END) 'Second',
			MAX(CASE WHEN r1.`term` = '3' THEN r1.`examTotal` END) 'Third',
			MIN(CASE WHEN r2.`examTotal` != 0 THEN r2.`examTotal` END) as lowest,
			MAX(r2.`examTotal`) as highest,
			AVG(r2.`examTotal`) as Avgr
			FROM `results` r1
			LEFT OUTER JOIN `results` r2 ON r2.`subjects` = r1.`subjects`
			INNER JOIN tblsubjects ts ON r1.subjects = ts.subId
			WHERE r1.`studId` = '".$RegNo."' AND r2.`resClass` = r1.`resClass` AND r1.acadYr = '".$Session."'
			GROUP BY r1.`subjects`
			ORDER BY r1.`subjects` ASC";
			//echo $sql;
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		check_empty_record($result);
		return $result;
}


//Termly average and Sum
function fetch_termly_avg_n_sum($RegNo,$Session, $Term, $Armm){
	global $db;

	$sql = "select SUM(examTotal), AVG(examTotal) 
	FROM results WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND 
	term = '".$Term."' AND arm = '".$Armm."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//Annual Average and Sum
function fetch_annual_avg_n_sum($RegNo,$Session, $Armm){
	global $db;

	$sql = "select SUM(examTotal), AVG(examTotal) 
	FROM results 
	WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND arm = '".$Armm."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//Next term resumption date
function fetch_next_term($Session, $Term){
	global $db;

	$sql = "select * FROM nextterm WHERE  acadYr = '".$Session."' AND vterm = '".$Term."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

function get_session_name($Session){
	global $db;

	$sql = "select acadYrName FROM tblacadyr WHERE  AcadYrId = '".$Session."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;	
}


//Get Broadsheets Termly
function get_broadsheet_name($Term, $Arm, $academicYear, $CurrentClass, $subjects){
	global $db;

	$sql = "SELECT s.studName `Student Name`, $subjects, sum(examTotal) Total, Round(avg(examTotal),2) Average 
			FROM results r 
			inner join students s on r.studId = s.studId 
			WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' AND r.term = '".$Term."' AND r.acadYr = '".$academicYear."'
			group by r.resClass,  r.arm, r.acadYr,s.studName
			";

			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;
}



function get_broadsheet($Term, $Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SEt @@group_concat_max_len = 1024*300";
	mysqli_query($db,$sql);
	$sql = "SELECT GROUP_CONCAT(DISTINCT CONCAT('Sum(if(r.subjects = ''',`subjects`,''',r.ca1 + r.ca2,0)) as `',`subName`,'-CA`,
	     			Sum(if(r.subjects = ''',`subjects`,''',(r.exam),0)) as `',`subName`,'-Exam`,
					Sum(if(r.subjects = ''',`subjects`,''',(r.examTotal),0)) as `',`subName`,'-Total`')) subjects 
			FROM results 
			INNER JOIN tblsubjects tbs ON results.subjects = tbs.subId
			WHERE results.resClass ='".$CurrentClass."' AND results.arm = '".$Arm."' AND results.term = '".$Term."'  AND results.acadYr = '".$academicYear."'";
	
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}

//Get Broadsheets Termly
function get_annual_broadsheet_name($Arm, $academicYear, $CurrentClass, $subjects){
	global $db;

	$sql = "SELECT s.studName `Student Name`, $subjects, sum(examTotal) Total, Round(avg(examTotal),2) Average 
			FROM results r 
			inner join students s on r.studId = s.studId 
			WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' AND r.acadYr = '".$academicYear."'
			group by r.resClass,  r.arm, r.acadYr,s.studName
			";

			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;
}



function get_annual_broadsheet($Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SEt @@group_concat_max_len = 1024*300";
	mysqli_query($db,$sql);
	$sql = "SELECT GROUP_CONCAT(DISTINCT CONCAT('Sum(if(r.subjects = ''',`subjects`,''',r.ca1 + r.ca2,0)) as `',`subName`,'-CA`,
	     			Sum(if(r.subjects = ''',`subjects`,''',(r.exam),0)) as `',`subName`,'-Exam`,
					Sum(if(r.subjects = ''',`subjects`,''',(r.examTotal),0)) as `',`subName`,'-Total`')) subjects 
			FROM results 
			INNER JOIN tblsubjects tbs ON results.subjects = tbs.subId
			WHERE results.resClass ='".$CurrentClass."' AND results.arm = '".$Arm."' AND results.acadYr = '".$academicYear."'";
	
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}