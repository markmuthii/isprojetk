<?php

//prevent direct access to this file
if (!empty($_SERVER["SCRIPT_FILENAME"]) && "connect.php" == basename($_SERVER["SCRIPT_FILENAME"])) {
	header("Location: ../");
	exit();
}

//include the config file
require_once "config.php";

//create connection to the database specified in the config
$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
