<?php

	  require_once('../../private/initialize.php');
	  session_start();

	  log_out_student();
	  redirect_to(url_for('students/login.php'));
?>