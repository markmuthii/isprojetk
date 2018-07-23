<?php  

//prevent direct access to this file
if (!empty($_SERVER["SCRIPT_FILENAME"]) && "ctrl.fetchuploads.php" == basename($_SERVER["SCRIPT_FILENAME"])) {
	header("Location: ../");
	exit();
}

require_once "db/connect.php";

//return the uploads from database
function get_project_uploads() {
	global $db; // required, otherwise inaccessible

	$sql = $db->query("SELECT * FROM projects ORDER BY id DESC"); // latest first, since id is set to auto increment

	return $sql;
}

?>