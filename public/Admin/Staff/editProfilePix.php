<?php

	include_once('../../../private/initialize.php');
	session_start();

if(!isset($_GET['id'])){
    redirect_to(urlFor('/Admin/staff/index.php'));
}
$id = h($_GET['id']);

//$pageHeading = $pageTitle =  "Delete Staff";
//include_once(SHARED_PATH .'/adminHeader.php');

if(is_post_request()){

	$StaffPix[] = array();
	$StaffPix['id'] = $id;
	$StaffPix['photo'] = $_FILES['profileUpload']['name'];

//echo $StaffPix['id'], $StaffPix['photo'];

	//Getting and deleting the old profile pix
	$staffPix = getStaffById($id);
	$file = $_SERVER['DOCUMENT_ROOT'] .  "/fame/public/images/profilePix/".$staffPix['staffImage'];
	//echo $file, $staffPix['staffId'];	


	if(file_exists($file)){
		if(!unlink($file)){
			//Could not delete the file
			redirect_to(urlFor('/admin/staff/index.php'));
		}else{
			//Deleted the file from the folder,
			//Move new profile pics, update db, 
			//Back to show the staff profile
			$photoTemp = $_FILES['profileUpload']['tmp_name'];
			$filePath = urlFor('/images/profilePix/'.$StaffPix['photo']);
			move_uploaded_file($photoTemp, '../../images/profilePix/'.$StaffPix['photo']);		

			$newProfilePix = updateStaffPix($StaffPix);

			if($newProfilePix === true){
              redirect_to(urlfor('/admin/staff/show.php?id='.$staffPix['staffId']));    
    		}
		}
	}
	//No picture to delete. Go back to staff list
	//redirect_to(urlFor('/admin/staff/index.php'));*/
}


?>



