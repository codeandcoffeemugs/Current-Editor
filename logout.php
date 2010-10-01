<?php
 	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
		exit();
	}
	$_SESSION = array();
	session_destroy();
	
	setcookie('PHPSESSID','',time(-3600,'/','',0,0));
	
	header("Location: index.php");
?>