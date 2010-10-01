<?php
    $header_message = "<h1>Titles in Production</h1>";
	include 'libs/header.php';
	require_once 'libs/Db.php';
    
    $q = "SELECT c.currentTitles_id, c.currentTitles_name, c.current_stage, a.author_firstname, a.author_lastname, a.author_email, e.editor_firstname, e.editor_lastname
FROM currentTitles AS c, authors AS a, editors AS e
WHERE c.author_id = a.author_id
AND c.editor_id = e.editor_id";
    if ($results = $mysql->query($q))
    {
        while ($records = $results->fetch_object())
        {
            echo "<div id='item'>Title: ".$records->currentTitles_name."<br />
    					Author: <a href='mailto:" . $records->author_email . "'>" .$records->author_firstname." " . $records->author_lastname . "</a><br />
						<h4 id='" . $records->currentTitles_id . "'>Stage: " . $records->current_stage . "</h4>
						<input type='text' name='stage' value='" . $records->current_stage . "' />
						<p>Editor: " . $records->editor_firstname . " " . $records->editor_lastname . "</div>";
        }
    }
    ?>
	</div>
</body>
</html>
