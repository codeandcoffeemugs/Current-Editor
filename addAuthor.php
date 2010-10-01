<?php
    $header_message = "<h1>Add an Author</h1>";
	include 'libs/header.php';
	require_once 'libs/Db.php';
?>
<?php
	if(isset($_POST['iamset']))
	{
		$fname = strip_tags(trim($_POST['fname']));
		$lname = strip_tags(trim($_POST['lname']));
		$email = $_POST['author_email'];
		$addAuthor = $mysql->query("INSERT INTO authors (author_firstname, author_lastname, author_email) VALUES ('$fname','$lname','$email')");
		if(isset($addAuthor))
		{
			echo "<h4>Author added.</h4>";
		} else {
			echo "<h4>Fail!</h4>";
		}
	}
?>

<form method="post" action="addAuthor.php" id="addAuthor">
	<h5>First Name: <input type="text" id="fname" name="fname" /></h5><br />
	<h5>Last Name: <input type="text" id="lname" name="lname" /></h5><br />
	<h5>Email: <input type="text" id="author_email" name="author_email" /></h5><br />
	<input type="hidden" name="iamset" value="1" />
	<input type="submit" id="submit" value="Add an Author" />
</form>


<?php
include 'libs/footer.inc.php';
?>