<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


if (isset($_POST["signup"])) {

	session_start();

	require_once "../db/connect.php";

	$firstname = $db->real_escape_string($_POST["fname"]);
	$lastname = $db->real_escape_string($_POST["lname"]);
	$email = $db->real_escape_string($_POST["email"]);
	$username = $db->real_escape_string($_POST["username"]);
	$password = $db->real_escape_string($_POST["password"]);
	$cpass = $db->real_escape_string($_POST["cpass"]);

	if ($password != $cpass) {
		$_SESSION["signup_error"] = "Passwords do not match.";
		header("Location: ../signup.php");
		exit();
	}else{
		$check_email = $db->query("SELECT * FROM users WHERE email = '$email'");
		if ($check_email->num_rows > 0) {
			$_SESSION["signup_error"] = "Email already exists. Please use a different email.";
			header("Location: ../signup.php");
			exit();
		}else{
			$check_username = $db->query("SELECT * FROM users WHERE username = '$username'");
			if ($check_username->num_rows > 0) {
				$_SESSION["signup_error"] = "Username is already taken.";
				header("Location: ../signup.php");
				exit();
			}else{
				//hash password using current default PHP algorithm
				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				//generate random token for email verification
				$token = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#$^*";
				$token = str_shuffle($token);
				$token = substr($token, 0, 20);

				$signup_query = "INSERT INTO users (fname, lname, email, username, password, role, token, email_confirmation) VALUES ('$firstname', '$lastname', '$email', '$username', '$hashPass', 'member', '$token', 0)"; 

				include_once "../PHPMailer/Exception.php";
				include_once "../PHPMailer/PHPMailer.php";
				// include_once "../PHPMailer/SMTP.php";

				//create a new PHPMailer instance. Documentation can be found here: https://github.com/PHPMailer/PHPMailer
				$mail = new PHPMailer(false);
				//TO DO: GET SMTP WORKING

				// $mail->isSMTP();
				// $mail->Host = G_HOST;
				// $mail->SMTPAuth = true;
				// $mail->Username = G_UNAME;
				// $mail->Password = G_PASS;
				// $mail->SMTPSecure = "tls";
				// $mail->setFrom(G_UNAME);
				$mail->setFrom(E_FROM, E_FROM_NAME);
				$mail->addAddress($email, $firstname . " " . $lastname);
				$mail->addReplyTo(E_REPLY_TO, E_REPLY_TO_NAME);
				$mail->Subject = E_SUBJECT;
				$mail->isHTML(true);
				$mail->Body = "
					Hello $firstname, <br><br>

					To complete your registration on IS Proje.Tk, click the link below. If you did not initiate this request, simply ignore this email.<br><br>

					<a href='isproje.tk/confirmemail.php?email=$email&token=$token'>Verify Email</a>.<br><br>

					Regards, <br>
					Mark.
				";


				//this next part is a bit messy, but it works. So far. To be cleaned up later :)
				try {
					//send the email
					$sendmail = $mail->send();
					
				} catch (Exception $e) {
					$_SESSION["signup_error"] = "There was an error signing you up. Please try again.";
					header("Location: ../signup.php");
					exit();
				}
				
				if ($sendmail) {

					$signup = $db->query($signup_query);

					if ($signup) {
						$_SESSION["confirmemail"] = "You need to confirm your email before you can log in.";
						header("Location: ../login.php");
					}else{
						$_SESSION["signup_error"] = "There was an error signing you up. Please try again.";
						header("Location: ../signup.php");
						exit();
					}
					
				}else{
					$_SESSION["signup_error"] = "There was an error signing you up. Please try again.";
					header("Location: ../signup.php");
					exit();
				}
			}
		}
	}

}else{
	header("Location: ../");
	exit();
}

?>