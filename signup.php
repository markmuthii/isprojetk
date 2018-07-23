<?php 
session_start();

// if (isset($_SESSION["username"])) {
//   header("Location: dashboard.php");
// }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A project by Mark Muthii, to help you in your IS Project">
    <meta name="author" content="Mark Muthii">
    <title>ISProje.TK | Sign Up</title>
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
          if (isset($_SESSION["signup_error"])) {
            echo "<p>" . $_SESSION['signup_error'] . "</p>";
            unset($_SESSION["signup_error"]);
          }
        ?>
      </div>
      <br>
      <form action="controls/ctrl.signup.php" method="POST" class="form-group">
        <input class="form-control" type="text" name="fname" placeholder="First Name" required autofocus>
        <br>
        <input class="form-control" type="text" name="lname" placeholder="Last Name" required autofocus>
        <br>
        <input class="form-control" type="email" name="email" placeholder="Email" required autofocus>
        <br>
        <input class="form-control" type="text" name="username" placeholder="Username" required autofocus>
        <br>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <br>
        <input class="form-control" type="password" name="cpass" placeholder="Confirm Password" required>
        <br>
        <input class="btn btn-primary" type="submit" name="signup" value="Sign Up">
      </form>
    </div>

  </main>

  <?php 
    include 'inc/footer.php';
    include 'inc/scripts.php';
  ?>
  
</body>
</html>