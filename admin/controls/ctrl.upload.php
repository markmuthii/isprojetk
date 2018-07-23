<?php 	 

require_once '../../db/connect.php';

if (isset($_POST["upload"])) {

	$title = $db->real_escape_string($_POST["project_title"]);
	$description = $db->real_escape_string($_POST["project_description"]);
	$link = $db->real_escape_string($_POST["post_link"]);
	$github = $db->real_escape_string($_POST["github_link"]);

	$sql = $db->query("INSERT INTO projects (title, post_link, github_link, description) VALUES ('$title', '$link', '$github', '$description')");

	if ($sql) {
		header("Location: ../dashboard.php");
	}else{
		header("Location: ../upload.php?uploadFailed=1");
	}
	
}else{
	header("Location: ../upload.php");
}

?>