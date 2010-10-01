<?php
    $header_message = "<h1>Courses in Production</h1>";
	include 'libs/header.php';
	require_once 'libs/Db.php';
    
    $q = "SELECT c.currentTitles_id, c.currentTitles_name, c.current_stage, a.author_firstname, a.author_lastname, a.author_email, e.editor_firstname, e.editor_lastname
FROM currentTitles AS c, authors AS a, editors AS e
WHERE c.author_id = a.author_id
AND c.editor_id = e.editor_id";
$results = $mysql->query($q);
    if ($results)
    {
        while ($records = $results->fetch_object())
        {
        	$bgColor = $bgColor == 'back1' ? 'back2' : 'back1';
            echo "<div id='item' class='$bgColor'><p>Title: ".$records->currentTitles_name."</p>
    					Author: <a href='mailto:" . $records->author_email . "'>" .$records->author_firstname." " . $records->author_lastname . "</a><br />
						<h4 bob='hi' id='" . $records->currentTitles_id . "'>Stage: " . $records->current_stage . "</h4>";
						if($access == "admin") { echo "<input type='text' name='stage' value='" . $records->current_stage . "' />"; }
						echo "<p>Editor: " . $records->editor_firstname . " " . $records->editor_lastname . "</div>\n";
        }
    }
    ?>
	<?php
	include 'libs/footer.inc.php';
	?>
