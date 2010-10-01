<?php
session_start();
if($_SESSION['loggedIn']) 
{
$loggedin = $_SESSION['loggedIn'];
$access  = $_SESSION['access'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Current Titles</title>
	<link rel="stylesheet" href="css/default.css" />
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<?php if($access == 'admin'): ?>
	<script type="text/javascript" src="libs/js/currentTitles.js"></script>
	<?php endif; ?>
	<script type="text/javascript">
		$(function(){
            $('[bob]').css('color', '#555')
			$('#loginLink').click(function(){
				$('#loginBlock').slideDown(600);
				return false;
			});
			/*
			$('#subb').click(function(){
				var email = $('#email').val();
				var password = $('#password').val();
				var fromHome = 1;
				
				$.ajax({
					url: 'login.php',
					type: 'post',
					data: 'email=' + email + '&password=' + password + 'fromHome=' + fromHome,
					
					success: function(resTXT)
					{
						
					}
				}); //end ajax
				return false;
			}); //end subb click
			*/
		});
	</script>
	<style type="text/css">

	</style>
</head>

<body>
	<div id="container">
		<?php echo $header_message; ?>
		<?php if($loggedin): ?>
			<h6>Hello <?php echo $_SESSION['name']; ?></h6>
		<?php endif; ?>
		<ul id="nav">
			<?php if(!isset($loggedin)): ?>
			<li><a id="home" href="index.php">Home</a></li>
			<li><a id="loginLink" href="">Login</a></li>
			<?php else: ?>
				<?php if($access == "admin"): ?>
			<li><a id="home" href="index.php">Home</a></li>
			<li><a id="addCourse" href="addTitle.php">Add a Course</a></li>
			<li><a id="addAuthor" href="addAuthor.php">Add an Author</a></li>
			<li><a id="addUser" href="addUser.php">Add a User</a></li>
			<li><a id="home" href="logout.php">Logout</a></li>
            <li><a id="editSheet" href="editSheet.php">Edit Sheet</a></li>
				<?php else: ?>
				<li><a id="home" href="index.php">Home</a></li>
				<li><a id="editSheet" href="editSheet.php">Edit Sheet</a></li>
				<li><a id="home" href="logout.php">Logout</a></li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
		<div style="clear:both;"></div>
		<?php if(!isset($loggedin)): ?>
		<div id="loginBlock">
			<form method="post" action="login.php" name="loginForm">
				<h5>email: </h5><input type="text" name="email" id="email" />
				<h5>password: </h5><input type="password" name="password" id="password" />
				<input type="hidden" name="fromHome" value="1" />
				<input type="submit" name="subb" id="subb" value="login" />
			</form>
		</div>	<!-- end loginBlock -->
		<?php endif; ?>
		