<?php  
  
  session_start();

  require_once "controls/ctrl.fetchuploads.php";

  $uploads = get_project_uploads();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A project by Mark Muthii, to help you in your IS Project">
    <meta name="author" content="Mark Muthii">
    <title>ISProje.TK | A Project By Mark Muthii</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <?php  
      include 'inc/header.php';
    ?>

    <main role="main" class="container">

      <?php  
        if (isset($_SESSION["firstname"])) {
          echo '
            <div class="jumbotron">
              Welcome ' . $_SESSION["firstname"] . '
            </div>
          ';
        }
      ?>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent Uploads</h6>

        <?php foreach ($uploads as $upload): ?>

          <div class="entry border-bottom border-gray">
            <div class="media text-muted pt-3">
              <p class="media-body mb-0 lh-125">
                <strong class="d-block text-gray-dark"><?php echo $upload["title"]; ?></strong>
                <?php echo $upload["description"]; ?>
              </p>
            </div>
            <p class="d-block text-left mt-3">
              <a href="<?php echo $upload["post_link"]; ?>">Read more</a> or <a href="<?php echo $upload["github_link"]; ?>">Get the code on Github</a>
            </p>
          </div>

        <?php endforeach ?>
        
      </div>
    </main><!-- /.container -->
    
    <?php 
      include 'inc/footer.php';
      include 'inc/scripts.php';
    ?>
    
  </body>
</html>
