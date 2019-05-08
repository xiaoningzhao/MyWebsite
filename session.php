<?php
	session_start();

	$session_login = false;
	$session_name = "";
	$session_userid = "";
	
	if (isset($_SESSION["session_login"]) && $_SESSION["session_login"] === true) {
	    $session_login = $_SESSION["session_login"];
	    $session_name = $_SESSION["session_name"];
	    $session_userid = $_SESSION["session_userid"];
	} else {
	    $_SESSION["session_login"] = false;
	    //die("You are not login. Access denied.");
	}
?>