<?php  
	session_start();

  // TO ACCESS THIS FILE, CHANGE THE ROLE OF ONE USER TO "admin" IN THE DATABASE AFTER SIGNING UP AND CONFIRMING EMAIL
	if (!isset($_SESSION["username"]) || $_SESSION["role"] != "admin") {
		header("Location: /");
		exit();
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A project by Mark Muthii, to help you in your IS Project">
    <meta name="author" content="Mark Muthii">
    <title>ISProje.TK | Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
<body>

	<?php
		include '../inc/header.php'; 
	?>

  <main role="main" class="container text-center">
  	<div class="col-md-6 mx-auto my-3 p-3 bg-dark rounded box-shadow">
  		<br>
			<form action="controls/ctrl.upload.php" method="POST" class="form-group">
				<input class="form-control" type="text" name="project_title" placeholder="Project Title" required autofocus>
				<br>
				<textarea class="form-control" name="project_description" placeholder="Project Description" required></textarea>
				<br>
				<input class="form-control" type="text" name="post_link" placeholder="Link to Post">
				<br>
				<input class="form-control" name="github_link" placeholder="Link to Code on Github">
				<br>
				<input class="btn btn-primary" type="submit" name="upload" value="Upload Project">
			</form>
		</div>

  </main>

	<?php 
	  include '../inc/footer.php';
	  include '../inc/scripts.php';
	?>
	
</body>
</html>