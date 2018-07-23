<?php 

//email and token need to be set as get parameters
if (!isset($_GET["email"]) || !isset($_GET["token"])) {

	header("Location: signup.php");
	exit();

}else{

	session_start();

	include_once "db/connect.php";

	$email = $db->real_escape_string($_GET["email"]);
	$token = $db->real_escape_string($_GET["token"]);

	$query = $db->query("SELECT * FROM users WHERE email = '$email' AND token = '$token' AND email_confirmation = 0");

	if ($query->num_rows > 0) {

		$db->query("UPDATE users SET email_confirmation = 1, token = '' WHERE email = '$email'");
		$_SESSION["emailconfirmed"] = "Your email has been confirmed. You can now log in.";
		header("Location: login.php");
		
	}else{ // if email or token do not match, or email_confirmation is not 0
		
		$_SESSION["confirmemail"] = "There was an error confirming this email";
		header("Location: login.php");
	}

}

?>