<?php

  // Performs all actions necessary to log in an admin
  function log_in_admin($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    return true;
  }

//========     Student Login authentication     ==================
  function log_in_student($student) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['studId'] = $student['studId'];
    $_SESSION['lastLogin'] = time();
    $_SESSION['username'] = $student['studId'];
    return true;
  }


  function log_out_student(){
    unset($_SESSION['studId']);
    unset($_SESSION['lastLogin']);
    unset($_SESSION['username']);
    return true;
  }

  function is_logged_in(){
    return isset($_SESSION['studId']);
  }

  function require_login(){
    if(!is_logged_in()){
      redirect_to(urlFor('/students/login.php'));
    }
  }


?>
