<?php
    $header_message = "<h1>Add a Course</h1>";
	include 'libs/header.php';
	require_once 'libs/Db.php';
	?>
		
		<?php
			if(isset($_POST['setting']))
			{
				$course = strip_tags(trim($_POST['name']));
				$author = $_POST['author'];
				$editor = $_POST['editor'];
				$stage = strip_tags(trim($_POST['stage']));
				$addCourse = $mysql->query("INSERT INTO currentTitles (currentTitles_name, author_id, editor_id, current_stage) VALUES('$course',$author,$editor,'$stage')");
				if($addCourse)
				{
					echo "<h3>Course Added</h3>";
				} else {
					echo "<h3>Ooops. There was a problem.</h3>";
				}
			}
		?>
		<form method="POST" action="addTitle.php" id="addTitleForm" name="addTitleForm">
			<h5>Course Name: <input type="text" id="name" name="name" /></h5><br />
			<h5>Author: </h5><select id="author" name="author"> 
				<?php
					$results = $mysql->query("SELECT author_id, author_firstname, author_lastname FROM authors");
				?>
				<?php while($row = $results->fetch_object()): ?>
					<option value="<?php echo $row->author_id; ?>"><?php echo $row->author_firstname; ?> <?php echo $row->author_lastname; ?></option>
				<?php endwhile; ?>
			</select> <br />
			<h5>Editor: </h5><select id="editor" name="editor">
				<?php $getEditor = $mysql->query("SELECT editor_id, editor_firstname, editor_lastname FROM editors"); ?>
					<?php while($editor = $getEditor->fetch_object()): ?>
					<option value="<?php echo $editor->editor_id; ?>"><?php echo $editor->editor_firstname; ?> <?php echo $editor->editor_lastname; ?></option>
					<?php endwhile; ?>
			</select><br />
			<?php $mysql->close(); ?>
			<h5>Stage: <input type="text" id="stage" name="stage" value="Where is this?" /></h5><br />
			<input type="hidden" name="setting" value="true" />
			<input type="submit" id="subb" name="subb" value="Add a Course" />
		</form>
        <?php
        include 'libs/footer.inc.php';
        ?>