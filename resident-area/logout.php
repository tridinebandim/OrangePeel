<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_USER_ID']);
	unset($_SESSION['SESS_DJ_NAME']);
	unset($_SESSION['SESS_USER_NAME']);
	header("location: ../../residentarea");
?>

