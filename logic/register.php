
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <h3>Super Striker</h3>
        </a>
    </nav>
    <div class="container">
      <?php
      include '../init.php';

      $cm = new CustomerFactory(getDB());
      $nu = new Customer(
          $_POST['newUsername'],
          $_POST['newDOB'],
          $_POST['newPassword']
      );

      if ($cm->byUsername($nu->username)) {
          $registermessage = "Username is already in use";
      } else {
          if ($nu->isOldEnough($nu->dob)) {

              if ($nu->validPassword($_POST['newPassword2'])) {
                  $cm->save($nu);
                  $currentUser = $cm->byUsername($_POST['username'])[0];
                  $registermessage = "User Created";
              } else {
                  $registermessage = "Password is not valid";
              }

          } else {
              $registermessage = "Not old enough";
          }
          echo $registermessage;
      }
      ?>
      <br>
      <!-- <a class="btn btn-primary" href="../loginPage.php">Back</a> -->
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
