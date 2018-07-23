<?php

//prevent direct access to this file
if (!empty($_SERVER["SCRIPT_FILENAME"]) && "config.php" == basename($_SERVER["SCRIPT_FILENAME"])) {
	header("Location: ../");
	exit();
}

//SERVER CONFIGURATION - CHANGE TO SUIT YOUR SPECIFIC SETTINGS

//seerver host
define("DB_SERVER", "localhost");
//database username
define("DB_USER", "username");
//database password
define("DB_PASS", "password");
//database name
define("DB_NAME", "isprojetk");


//IF USING SMTP FOR SENDING MAIL

//Google username
define("G_UNAME", "username@gmail.com");
//Google password
define("G_PASS", "password");
//smtp host. change this if using a different provider such as Yahoo
define("G_HOST", "smtp.gmail.com");
