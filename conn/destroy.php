<?php

	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		header("location: ..\login_page.php");
		exit;
	}
	// Destroy session
	session_unset();
	Session_destroy();
	header ('location: ..\login_page.php');
    
?>