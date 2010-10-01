<?php
	if($_POST['id'])
	{
		$id = $_POST['id'];
		$stage = $_POST['stage'];
		require_once 'libs/Db.php';
		if($result = $mysql->query("UPDATE currentTitles SET current_stage='$stage' WHERE currentTitles_id=$id LIMIT 1"))
		{
			echo "Database changed";
		} else {
			echo "Problem";
		}
	}
?>