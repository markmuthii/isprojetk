<?php 
session_start();

if (isset($_SESSION["firstname"])) {
	header("Location: ./");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A project by Mark Muthii, to help you in your IS Project">
    <meta name="author" content="Mark Muthii">
    <title>ISProje.TK | Log In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
<body>

	<?php
		include 'inc/header.php'; 
	?>

  <main role="main" class="container text-center">
  	<div class="col-md-6 mx-auto my-3 p-3 bg-dark rounded box-shadow">
  		<div class="errors">
  			<?php  
  				if (isset($_SESSION["login_error"])) {
  					echo "<p>" . $_SESSION["login_error"] . "</p>";
  					unset($_SESSION["login_error"]);
  				}elseif (isset($_SESSION["confirmemail"])) {
            echo "<p>" . $_SESSION["confirmemail"] . "</p>";
            unset($_SESSION["confirmemail"]);
          }
  			?>
  		</div>
      <?php  

        if (isset($_SESSION["emailconfirmed"])) {
          echo "
            <div class='success'>
              <p>" . $_SESSION["emailconfirmed"] . "</p>
            </div>
          ";
        }

      ?>
  		<br>
			<form action="controls/ctrl.login.php" method="POST" class="form-group">
				<input class="form-control" type="text" name="username" placeholder="Username" required autofocus>
				<br>
				<input class="form-control" type="password" name="password" placeholder="Password" required>
				<br>
				<input class="btn btn-primary" type="submit" name="login" value="Log In">
			</form>
		</div>

  </main>

	<?php 
	  include 'inc/footer.php';
	  include 'inc/scripts.php';
	?>
	
</body>
</html>