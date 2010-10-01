<?php
	session_start();
	require_once 'libs/Db.php';
	if(!isset($_POST['fromHome']))
	{
		echo "<h3>Please do not access this page directly</h3>";
		exit();
	}
	
	$filter = array(
	"email"=> FILTER_VALIDATE_EMAIL,
	"password"=> array(
		"filter"=>FILTER_SANITIZE_STRING,
	),
	);
	$cleaned = filter_input_array(INPUT_POST,$filter);
	$email = $cleaned['email'];
	$pass = $cleaned['password'];
	
	$results = $mysql->query("SELECT user_id, user_fname, user_lname, user_email, user_access FROM users WHERE user_email='$email' AND user_password=SHA1('$pass') LIMIT 1");
	if($results)
	{
		while($row = $results->fetch_object())
		{
			$_SESSION['name'] = $row->user_fname . " " . $row->user_lname;
			$_SESSION['email'] = $row->user_email;
			$_SESSION['loggedIn'] = 1;
			$_SESSION['access'] = $row->user_access;
		}
		header("Location: index.php");
		exit();
	} else {
		header("Location: index.php");
		exit();
	}
?>