<?php 


if (isset($_POST["login"])) {

	session_start();

	require_once "../db/connect.php";

	$username = $db->real_escape_string($_POST["username"]);
	$password = $db->real_escape_string($_POST["password"]);

	$sql = $db->query("SELECT * FROM users WHERE username = '$username'");

	if ($sql->num_rows > 0) {

		$user = $sql->fetch_array();

		if ($user["email_confirmation"] == 1) {

			if (password_verify($password, $user["password"])) {

				$_SESSION["firstname"] = $user["fname"];
				$_SESSION["lastname"] = $user["lname"];
				$_SESSION["user_id"] = $user["id"];
				$_SESSION["username"] = $user["username"];
				$_SESSION["role"] = $user["role"];

				if ($_SESSION["role"] == "member") { // redirect to homepage if member
					header("Location: /");
					exit();
				}elseif ($_SESSION["role"] == "admin") { // redirect to admin homepage if admin
					header("Location: /admin/");
					exit();
				}
			}else{ // if password hash does not match

				$_SESSION["login_error"] = "Error Logging In. Please check your credentials.";
				header("Location: ../login.php");
				exit();
			}
		}else{ // if person has not confirmed their email yet

			$_SESSION["confirmemail"] = "You need to confirm your email before you can log in.";
			header("Location: ../login.php");
			exit();
		}
	}else{ // if username does not return a match from database

		$_SESSION["login_error"] = "Error Logging In. Please check your credentials.";
		header("Location: ../login.php");
		exit();
	}

}else{
	header("Location: ../login.php");
	exit();
}

?>